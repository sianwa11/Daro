<?php

namespace App\Http\Controllers;

use App\AssignmentMark;
use App\Chart;
use App\VirtualClassAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentChartController extends Controller
{
    public function index($id)
    {
        $assignment = VirtualClassAssignment::findOrFail($id);
        $submissions = $assignment->assignment_submissions()->pluck('id'); // fetch all submissions of the particular assignment
        $average_mark = AssignmentMark::whereIn('assignment_submission_id', $submissions)->avg('mark');
        $marks_array = DB::table('assignment_marks')
            ->select('mark')
            ->whereIn('assignment_submission_id', $submissions)
            ->pluck('mark')->all();

        if (!empty($marks_array))
        {
            // generate random colours for the marks
            for ($i=0; $i<count($marks_array); $i++)
            {
                $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
            }
        }else
        {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }



        $chart = new Chart();
        $chart->labels = (array_keys($marks_array));
        $chart->dataset = (array_values($marks_array));
        $chart->colours = $colours;



        return view('teacher.virtualclass.assignments.chart.index', [
            'chart' => $chart,
            'average_mark' => $average_mark,
            'assignment' => $assignment,
        ]);
    }
}
