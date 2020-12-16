<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DownloadHistoryController extends Controller
{
    public function index()
    {
        $download_history = User::find(auth()->user()->id)->download_history()->get();

        return view('admin.downloads.index', compact('download_history'));
    }

    public function oops()
    {
        return view('admin.downloads.oops');
    }
}
