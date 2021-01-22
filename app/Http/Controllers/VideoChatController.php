<?php

namespace App\Http\Controllers;

use App\Notifications\VideoChatStarted;
use App\User;
use App\VideoChat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VideoChatController extends Controller
{
    public function index()
    {
        // generate passcode
        try {
            $passcode = random_int(100000, 900000);
        } catch (\Exception $e) {
        }

        return view('teacher.video_chat.index', compact('passcode'));
    }

    public function receiver()
    {
        return view('student.video_chat.index');
    }

    public function saveVideoChat()
    {
        $user_id = auth()->user()->id;
        $video_chat_password = $_GET['video_chat_password'];

        $video_chat = new VideoChat();
        $video_chat->user_id = $user_id;
        $video_chat->video_chat_password = $video_chat_password;
        $video_chat->save(); // save in DB

        // notify users(will later fix this to users who have subbed to class, this is wrong!)
        $users = User::where('role', 'student')->get();
        foreach ($users as $user) {
            // notify students
            $user->notify(new VideoChatStarted($video_chat_password, $user_id));
        }
    }

    public function endVideoChat()
    {
        // get video password
        $video_chat_password = $_GET['video_chat_password'];
        // update end time
        VideoChat::where('video_chat_password', $video_chat_password)
        ->update(['ended_at' => Carbon::now()]);
    }
}
