<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StudentsExport;
use App\Http\Controllers\Controller;
use App\Notifications\UserRestored;
use App\Notifications\UserSuspended;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::withTrashed()->where('role', 'student')->get(); //get all students

        $courses = DB::table('virtual_class_students')
            ->select('user_id', DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->pluck('total', 'user_id')->all();


        return view('admin.students.index', [
            'students' => $students,
            'no_of_courses' => $courses
        ]);
    }

    public function export_csv()
    {
        // repetition is bad I will find a better way of doing it
        $students = User::withTrashed()->where('role', 'student')->get(); //get all students

        $courses = DB::table('virtual_class_students')
            ->select('user_id', DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->pluck('total', 'user_id')->all();

        $filename = 'students-'.Carbon::now().'.csv';
        $this->downloadHistory($filename);

        return Excel::download(new StudentsExport($students, $courses), $filename);
    }

    private function downloadHistory($filename)
    {
        auth()->user()->download_history()->create([
            'filename' => $filename
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * suspend users in the system using soft delete,
     * the function is used to suspend both teachers and students
     */
    public function suspend_user($id)
    {
        $user = User::findOrFail($id);
        $user->suspended = 1;
        $user->save(); // change suspended to 1

        $user->delete(); // soft delete user

        // delete class if it's a teacher
        if ($user->role = 'teacher') {$user->virtual_class()->delete();}

        $user->notify(new UserSuspended()); // user is notified of the suspension

        return redirect()->back()->with('toast_success', 'Account suspended');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * restores users in the system using soft delete's restore method,
     * the function is used to restore both teachers and students
     */
    public function restore_user($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->suspended = 0;
        $user->save(); // change suspended to 0

        $user->restore(); // restore the user

        // restore class if it's a teacher
        if ($user->role = 'teacher') {$user->virtual_class()->restore();}

        $user->notify(new UserRestored()); // user is notified

        return redirect()->back()->with('toast_success', 'Account restored');
    }

}
