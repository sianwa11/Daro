<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualClassStudent extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'virtual_class_students';

    public function virtual_class()
    {
        return $this->belongsTo(VirtualClass::class);
    }
}
