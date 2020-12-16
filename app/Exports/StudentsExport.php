<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class StudentsExport implements FromView
{
    public function __construct($students, $courses)
    {
        $this->students = $students;
        $this->courses = $courses;
    }

    public function view(): View
    {
        return view('admin.students.dummy_index', [
            'students' => $this->students,
            'no_of_courses' => $this->courses
        ]);
    }
}
