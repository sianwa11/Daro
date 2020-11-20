<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualClassAssignment extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'virtual_class_assignments';

    public function virtual_class()
    {
        return $this->belongsTo(VirtualClass::class);
    }

    public function assignment_files()
    {
        return $this->hasMany(AssignmentFiles::class);
    }

    public function assignment_submissions()
    {
        return $this->hasMany(AssignmentSubmission::class);
    }
}
