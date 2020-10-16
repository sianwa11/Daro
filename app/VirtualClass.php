<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VirtualClass extends Model
{
    protected $guarded = [];
    protected $table = 'virtual_classes';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
