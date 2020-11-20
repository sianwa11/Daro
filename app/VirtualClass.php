<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualClass extends Model
{
    use SoftDeletes; // soft delete virtual class from DB

    protected $guarded = [];
    protected $table = 'virtual_classes';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function virtual_class_post()
    {
        return $this->hasMany(VirtualClassPost::class);
    }

    public function virtual_class_assignment()
    {
        return $this->hasMany(VirtualClassAssignment::class);
    }

    public function virtual_class_students()
    {
        return $this->hasMany(VirtualClassStudent::class);
    }
}
