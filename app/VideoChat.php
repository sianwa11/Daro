<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoChat extends Model
{
    protected $guarded = [];
    protected $table = 'video_chat';
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
