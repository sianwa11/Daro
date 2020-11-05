<?php

namespace App\Http\Controllers;

use App\AssignmentFiles;
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
                $file->storeAs('public/assignment_files', $fileName); // Store in path
                // store file name in database
                AssignmentFiles::create([
                    'assignment_id' => $assignment->id,
                    'files' => $fileName
                ]);
            }

        }

        return redirect('/assignment/'.$assignment->id)->with('toast_success', 'Created');
    }

    public function show($id)
    {
        $assignment = VirtualClassAssignment::find($id);
        return view('teacher.virtualclass.assignments.show',[
            'assignment' => $assignment
        ]);
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
