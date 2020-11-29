<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentMark extends Model
{
    protected $guarded = [];
    protected $table = 'assignment_marks';

    public function assignment_submission()
    {
        return $this->belongsTo(AssignmentSubmission::class);
    }
}
