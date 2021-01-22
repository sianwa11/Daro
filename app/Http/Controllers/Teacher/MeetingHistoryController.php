<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\VideoChat;
use Illuminate\Http\Request;

class MeetingHistoryController extends Controller
{
    public function index()
    {
        $meeting_details = VideoChat::where('user_id', auth()->user()->id)->get();

        return view('teacher.meeting_history.index', [
            'meeting_details' => $meeting_details
        ]);
    }
}
