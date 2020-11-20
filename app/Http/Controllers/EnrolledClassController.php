<?php

namespace App\Http\Controllers;

use App\AssignmentFiles;
use App\AssignmentSubmission;
use App\User;
use App\VirtualClass;
use App\VirtualClassAssignment;
use App\VirtualClassPost;
use App\VirtualClassStudent;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class EnrolledClassController extends Controller
{
    public function index()
    {
        // Get the id of the class the user is enrolled in
        $virtual_class_ids = VirtualClassStudent::where('user_id', \auth()->user()->id)
            ->pluck('virtual_class_id');

        // Display only the active classes that the user has enrolled in through the extracted id
        $my_classes = VirtualClass::whereIn('id',$virtual_class_ids)->where('suspended',0)->get();

        return view('student.virtual_class.index', [
            'my_classes' => $my_classes,
        ]);
    }

    public function show($id)
    {
        $class = VirtualClass::findOrFail($id); // The class
        $teacher = User::findOrFail($class->user_id); // Teacher of the class
        $class_posts = VirtualClassPost::where('virtual_class_id', $class->id)->get(); // The class posts


        return view('student.virtual_class.show', [
            'class' => $class,
            'teacher' => $teacher,
            'class_posts' => $class_posts
        ]);
    }

    public function showAssignments($id)
    {
        $class_assignments = VirtualClassAssignment::where('virtual_class_id', $id)
            ->get(); // get all class assignments

        $submissions = AssignmentSubmission::where('user_id', auth()->user()->id)
            ->get(); // get all submissions made by the logged in student

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

        return view('student.virtual_class.assignments.show', [
            'class_assignments' => $class_assignments,
            'subArray' => $subArray
        ]);
    }

    public function uploadAssignments($id)
    {
        // validate that a file is included
        \request()->validate([
            'file' => 'required',
        ]);

        $assignment = VirtualClassAssignment::findOrFail($id); // get the assignment

        if (\request()->hasFile('file'))
        {
            $destination_path = 'public/assignment_submissions/'.$assignment->title.'/user-'.auth()->user()->id.'/';
            $file = \request()->file('file');
            $file_name = $file->getClientOriginalName(); // get file name
            \request()->file('file')->storeAs($destination_path, $file_name);

            $assignment->assignment_submissions()->create([
                'user_id' => auth()->user()->id,
                'files' => $file_name
            ]);

            return redirect()->back()->with('toast_success', 'Assignment submitted');
        }

    }

    public function showClassmates($id)
    {
        // get ids of students in the class except logged in user
        $loggedInId = [$id => auth()->user()->id];
        $user_ids = VirtualClassStudent::whereNotIn('user_id', $loggedInId)
            ->where('virtual_class_id', $id)->pluck('user_id');

        // classmates in the class
        $classmates = User::whereIn('id', $user_ids)->get();


        return view('student.virtual_class.classmates.show', compact('classmates'));
    }

}
