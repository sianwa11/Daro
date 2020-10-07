<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBiodata extends Model
{
    protected $guarded = [];

    protected $table = 'user_biodata';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
