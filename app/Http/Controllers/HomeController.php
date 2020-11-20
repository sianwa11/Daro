<?php

namespace App\Http\Controllers;

use App\User;
use App\VirtualClass;
use App\VirtualClassStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get the ids of the classes user has joined
        $virtual_class_ids = VirtualClassStudent::where('user_id', \auth()->user()->id)
            ->pluck('virtual_class_id');

        // Exclude them from "joinable" classes
        $virtual_classes = VirtualClass::whereNotIn('id',$virtual_class_ids)->where('suspended',0)->get();

        return view('student.home', [
            'virtual_classes' => $virtual_classes
        ]);
    }

    public function previewClass($id)
    {
        $class_preview = VirtualClass::findOrFail($id); // get class details
        $user = User::findOrFail($class_preview->user_id); // get teacher of class

        return view('student.virtual_class.preview_class', [
            'class_preview' => $class_preview,
            'user' => $user,
        ]);
    }
}
