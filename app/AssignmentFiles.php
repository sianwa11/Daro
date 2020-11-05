<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentFiles extends Model
{
    protected $guarded = [];
    protected $table = 'virtual_class_assignment_files';

    public function virtual_class_assignment()
    {
        return $this->belongsTo(VirtualClassAssignment::class);
    }
}
