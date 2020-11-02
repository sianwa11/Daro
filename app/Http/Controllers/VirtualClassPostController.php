<?php

namespace App\Http\Controllers;

use App\VirtualClass;
use App\VirtualClassPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VirtualClassPostController extends Controller
{

    public function store(VirtualClass $virtualClass)
    {
        // validate the post
        \request()->validate([
            'post_description' => 'required'
        ]);

        $post = \request()->all();
        // check if a file exists
        if (\request()->hasFile('post_files'))
        {
            $destination_path = 'public/class-'.$virtualClass->id.'/files'; // save files according to class id's
            $file = \request()->file('post_files');
            $file_name = $file->getClientOriginalName();
            $path = \request()->file('post_files')->storeAs($destination_path, $file_name);

            $post['post_files'] = $file_name;
        }
        $virtualClass->virtual_class_post()->create($post);

        return redirect('/virtual_class/'.$virtualClass->id)->with('toast_success', 'Post Created');
    }

    public function destroy($id)
    {
        // set deleted_at to null
        VirtualClassPost::where('id', $id)->delete();
        return Redirect::back()->with('toast_info', 'Post Deleted');
    }
}
