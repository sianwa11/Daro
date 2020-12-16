<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadHistory extends Model
{
    protected $guarded = [];
    protected $table = 'download_history';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
