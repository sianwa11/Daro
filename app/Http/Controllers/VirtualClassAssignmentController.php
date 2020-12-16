<?php

namespace App\Http\Controllers;

use App\AssignmentFiles;
use App\AssignmentMark;
use App\AssignmentSubmission;
use App\Notifications\AssignmentGraded;
use App\User;
use App\VirtualClass;
use App\VirtualClassAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VirtualClassAssignmentController extends Controller
{
    public function create($id)
    {
        return view('teacher.virtualclass.assignments.create',[
            'virtual_class_id' => $id
        ]);
    }

    public function store(VirtualClass $virtualClass)
    {
        $data = \request()->validate([
            'title' => 'required',
            'instructions'=> '',
            'due_date' => 'required',
            'time' => 'required',
        ]);

        // create a new assignment
        $assignment = $virtualClass->virtual_class_assignment()->create($data);
        if (\request()->hasFile('files'))
        {
            $files = \request()->file('files');
            foreach ($files as $file)
            {
                $fileName = $file->getClientOriginalName(); // get Filename
                $file->storeAs('public/class-'.$virtualClass->id.'/assignment-'.$assignment->id.'/files', $fileName); // Store in path
                // store file name in database
                AssignmentFiles::create([
                    'virtual_class_assignment_id' => $assignment->id,
//                    'assignment_id' => $assignment->id,
                    'files' => $fileName
                ]);
            }

        }

        return redirect('/assignment/'.$assignment->id)->with('toast_success', 'Created');
    }

    public function show($id)
    {
        $assignment = VirtualClassAssignment::find($id);// find the assignment
        $class = VirtualClass::find($assignment->virtual_class_id); // the class the assignment belongs to

        $submissions = $assignment->assignment_submissions();// get submissions of the assignment
        $students = $class->virtual_class_students(); // students enrolled to the class

        return view('teacher.virtualclass.assignments.show',[
            'assignment' => $assignment,
            'submissions' => $submissions->count(),
            'students_assigned' => $students->count(),
        ]);
    }

    public function showSubmissions($id)
    {
        $assignment = VirtualClassAssignment::findOrFail($id);// find the assignment
        $class = VirtualClass::findOrFail($assignment->virtual_class_id); // the class the assignment belongs to
        $user_ids = $class->virtual_class_students()->pluck('user_id'); // get id's of users in the class

        $students = User::whereIn('id', $user_ids)->get(); // fetch the students in the class
        $submissions = $assignment->assignment_submissions()->get(); // fetch all submissions of the particular assignment

        // ensure the collection is not empty
        if ($submissions->isNotEmpty())
        {
            foreach ($submissions as $s)
            {
                $subArray[] = $s->toArray(); // convert the object to an array
            }
        }else
        {
            $subArray[] = 1; // dummy data
        }

        $marks = AssignmentMark::all(); // get all marked assignments & convert to array
        if ($marks->isNotEmpty())
        {
            foreach ($marks as $m)
            {
                $marksArray[] = $m->toArray(); // convert the object to an array
            }
        }else
        {
            $marksArray[] = 1; // dummy data
        }


        return view('teacher.virtualclass.assignments.submissions.show',[
            'students' => $students,
            'subArray' => $subArray,
            'submissions' => $submissions,
            'assignment' => $assignment,
            'marksArray' => $marksArray,
            'marks' => $marks,
        ]);
    }

    public function gradeAssignment($student_id, $assignment_id)
    {
        $data = \request()->validate([
            'mark' => 'required|numeric|between:0,100'
        ]);

        // variables to be used in notification
        $user = User::findOrFail($student_id); // get the student to notify
        $mark = $data['mark'];
        $assignment_title = VirtualClassAssignment::findOrFail($assignment_id)->title;

        $submission = AssignmentSubmission::where('virtual_class_assignment_id', $assignment_id)
            ->where('user_id', $student_id)->first(); //  get the submission made

        $submission->assignment_marks()->create($data); // add marks to the DB
        $user->notify(new AssignmentGraded($mark, $assignment_title)); // notify the user

        return redirect()->back()->with('toast_success', 'Assignment Graded');

    }

    public function updateGradedAssignment($student_id, $assignment_id)
    {
        $data = \request()->validate([
            'mark' => 'required|numeric|between:0,100'
        ]);

        $submission = AssignmentSubmission::where('virtual_class_assignment_id', $assignment_id)
            ->where('user_id', $student_id)->first(); //  get the submission made

        $submission->assignment_marks()->update($data); // edit the marks

        return redirect()->back()->with('toast_success', 'Assignment grade updated');
    }

    public function update($id)
    {
        // update the assignment data
        VirtualClassAssignment::where('id', $id)->update($this->validatedData());
        return redirect('/assignment/'.$id)->with('toast_success', 'Updated');
    }

    public function validatedData()
    {
        return \request()->validate([
            'title' => 'required',
            'instructions'=> '',
            'due_date' => 'required',
            'time' => 'required'
        ]);
    }

    public function destroy($id)
    {
        // set deleted_at to null
        VirtualClassAssignment::where('id', $id)->delete();

/*        $virtual_class_id = DB::table('virtual_class_assignments')
            ->select('virtual_class_id')
            ->where('id', $id)
            ->get();*/

         return redirect('/virtual_class')->with('toast_success', 'Assignment Deleted');
         // I will find a better way to redirect this later
    }
}
