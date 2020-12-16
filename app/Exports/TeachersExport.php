<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TeachersExport implements FromView
{
    public function __construct($teachers, $classes)
    {
        $this->teachers = $teachers;
        $this->classes = $classes;
    }

    public function view(): View
    {
        return view('admin.teachers.dummy_index', [
            'teachers' => $this->teachers,
            'no_of_classes' => $this->classes,
        ]);
    }
}
