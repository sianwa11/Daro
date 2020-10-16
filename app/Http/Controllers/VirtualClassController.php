<?php

namespace App\Http\Controllers;

use App\VirtualClass;
use Illuminate\Http\Request;

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

        return view('teacher.virtualclass.index', compact('virtual_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
        return view('teacher.virtualclass.show', compact('virtual_class'));
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
        return redirect('/virtual_class/'.$id)->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }

    public function validatedData()
    {
        return \request()->validate([
            'class_name' => 'required',
            'description' => 'required',
        ]);
    }
}
