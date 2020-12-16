<?php

namespace App\Http\Controllers\Teacher;

use App\Chart;
use App\Http\Controllers\Controller;
use App\VirtualClass;
use App\VirtualClassStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassStatsController extends Controller
{
    public function index()
    {
        $class_ids = VirtualClass::where('user_id', auth()->user()->id)->pluck('id'); //get the classes that the teacher teaches

        $enrolled_class_id = VirtualClassStudent::whereIn('virtual_class_id', $class_ids)->pluck('virtual_class_id')
            ->unique()->all(); // get the id's of classes with students enrolled in them

        $class_names = VirtualClass::whereIn('id', $enrolled_class_id)->pluck('class_name')
            ->all(); // get the names of all classes

        $students_array = DB::table('virtual_class_students')
            ->select('virtual_class_id', DB::raw('count(*) as total'))
            ->whereIn('virtual_class_id', $class_ids)
            ->groupBy('virtual_class_id')
            ->pluck('total', 'virtual_class_id')->all(); // gets no of students per class

        $assignments_array = DB::table('virtual_class_assignments')
            ->select('virtual_class_id', DB::raw('count(*) as total'))
            ->whereIn('virtual_class_id', $class_ids)
            ->groupBy('virtual_class_id')
            ->pluck('total', 'virtual_class_id')->all();

        $class_posts_array = DB::table('virtual_class_posts')
            ->select('virtual_class_id', DB::raw('count(*) as total'))
            ->whereIn('virtual_class_id', $class_ids)
            ->groupBy('virtual_class_id')
            ->pluck('total', 'virtual_class_id')->all();


        if (empty($students_array))
        {
            $students_array[] = 0;
        }


        $chart = new Chart();
        $chart->labels = (array_values($class_names));
        $chart->students = (array_values($students_array));
        $chart->assignments = (array_values($assignments_array));
        $chart->class_posts = (array_values($class_posts_array));


        return view('teacher.class_stats.index', [
            'class_names' => $class_names,
            'chart' => $chart
        ]);
    }

}
