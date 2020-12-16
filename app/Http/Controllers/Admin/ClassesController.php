<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\VirtualClass;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = VirtualClass::with('user', 'virtual_class_assignment',
        'virtual_class_students')->get(); // get the class with its relationships

        //dd(Storage::disk('public')->size('class-1/assignment-1/files/SetupActivity.txt'));
/*        $files = Storage::disk('public')->allFiles('class-1/');
        $sum = 0;
        foreach ($files as $key => $dir)
        {
            $sum += Storage::disk('public')->size($dir);
        }
        dd($sum); // the size in bytes*/


        return view('admin.classes.index', [
            'classes' => $classes,
            'sum' => $sum = 0,
        ]);
    }
}
