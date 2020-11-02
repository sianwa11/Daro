<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualClassPost extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'virtual_class_posts';

    public function virtual_class()
    {
        return $this->belongsTo(VirtualClass::class);
    }
}
