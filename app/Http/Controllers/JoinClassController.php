<?php

namespace App\Http\Controllers;

use App\VirtualClass;
use Illuminate\Http\Request;

class JoinClassController extends Controller
{
    public function joinClass($id)
    {

        $class_preview = VirtualClass::findOrFail($id); // get the previewed class
        $data = [
            'user_id' => auth()->user()->id // get users id
        ];

        if ($class_preview->class_code == \request()->class_code) // compare class codes
        {
            $class_preview->virtual_class_students()->create($data);

            // Redirect to enrolled class
            return redirect('/class/'.$class_preview->id);
            //->with('toast_success', 'Successfully joined');
        }
    }
}
