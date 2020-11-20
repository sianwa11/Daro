<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    protected $guarded = [];
    protected $table = 'virtual_class_assignment_submissions';

    public function virtual_class_assignment()
    {
        return $this->belongsTo(VirtualClassAssignment::class);
    }
}
