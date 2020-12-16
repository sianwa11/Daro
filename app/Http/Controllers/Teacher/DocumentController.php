<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\VirtualClass;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $classes = VirtualClass::where('user_id', auth()->user()->id)->with('virtual_class_assignment',
            'virtual_class_students', 'virtual_class_post')->get(); // get the teachers classes with relationships

        return view('teacher.class_documents.index', [
            'classes' => $classes,
            'sum' => $sum = 0,
        ]);
    }
}
