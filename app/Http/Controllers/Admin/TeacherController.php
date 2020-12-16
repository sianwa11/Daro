<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TeachersExport;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::withTrashed()->where('role', 'teacher')->get(); //get all teachers

        $classes = DB::table('virtual_classes')
            ->select('user_id', DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->pluck('total', 'user_id')->all();


        return view('admin.teachers.index', [
            'teachers' => $teachers,
            'no_of_classes' => $classes,
        ]);
    }

    public function export_csv()
    {
        // repetition is bad I will find a better way of doing it
        $teachers = User::withTrashed()->where('role', 'teacher')->get(); //get all teachers

        $classes = DB::table('virtual_classes')
            ->select('user_id', DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->pluck('total', 'user_id')->all();

        $filename = 'teachers-'.Carbon::now().'.csv';
        $this->downloadHistory($filename);

        return \Maatwebsite\Excel\Facades\Excel::download(new TeachersExport($teachers, $classes), $filename);
    }

    private function downloadHistory($filename)
    {
        auth()->user()->download_history()->create([
            'filename' => $filename
        ]);
    }
}
