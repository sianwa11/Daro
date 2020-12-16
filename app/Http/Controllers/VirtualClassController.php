<?php

namespace App\Http\Controllers;

use App\User;
use App\VirtualClass;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VirtualClassController extends Controller
{
    /**
     * Display a listing of all the virtual classes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // take a further look at the where later
        $virtual_classes = auth()->user()->virtual_class()->where('suspended', 0)->get();
        $class_code = (string) Str::uuid(); // random class code (will be used in /virtual_class page)

        return view('teacher.virtualclass.index', [
            'virtual_classes' => $virtual_classes,
            'class_code' => $class_code,
        ]);
    }


/*    public function create()
    {
        //
    }*/

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Random string generated from Teachers home controller
        $data = \request()->validate([
            'class_name' => 'required',
            'description' => 'required',
            'class_code' => 'required',
        ]);

        // create the class
        $virtual_class = auth()->user()->virtual_class()->create($data);

        // redirect to show
        return redirect('/virtual_class/'.$virtual_class->id)->with('success', 'Your class has been created'); // change redirect later
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $virtual_class = VirtualClass::find($id);

        $class_posts = $virtual_class->virtual_class_post()->get(); // get the class posts
        $class_assignments = $virtual_class->virtual_class_assignment()->get(); // get class assignments
        $student_ids = $virtual_class->virtual_class_students()
            ->get()->pluck('user_id'); // get students enrolled in that class

        $students = User::whereIn('id', $student_ids)->get();

        return view('teacher.virtualclass.show', [
            'virtual_class' => $virtual_class,
            'class_posts' => $class_posts,
            'class_assignments' => $class_assignments,
            'students' => $students
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified class data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        VirtualClass::where('id', $id)->update($this->validatedData());
        return redirect('/virtual_class/'.$id)->with('toast_success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     * But in this case do not actually destroy from DB
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VirtualClass::where('id', $id)->update(array('suspended'=> 1));
        return redirect('/virtual_class')->with('toast_success', 'Class archived');
    }

    public function archived()
    {
        // get classes where suspended == 1
        $archived_classes = auth()->user()->virtual_class()->where('suspended', 1)->get();

        return view('teacher.virtualclass.archived', compact('archived_classes'));
    }

    /**
     * Restores archived classes.
     * @param $id
     */
    public function restore($id)
    {
        VirtualClass::where('id', $id)->update(array('suspended' => 0));
        return redirect('/archived')->with('toast_success', 'Class restored');
    }

    /**
     * Permanently delete a virtual class.
     * Teacher will not have access to the class no more
     * @param $id
     */
    public function deletePermanently($id)
    {
        // set deleted_at to null
        VirtualClass::where('id', $id)->delete();
        return redirect('/archived')->with('toast_success', 'Deleted');
    }

    public function validatedData()
    {
        return \request()->validate([
            'class_name' => 'required',
            'description' => 'required',
        ]);
    }
}
