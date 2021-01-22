@extends('layouts.master_auth')

@section('css_before')
    <link rel="stylesheet" href="{{asset('css/video_chat/style.css')}}">
@endsection

@section('content')

    <div class="row justify-content-center mt-auto">
        <div class="col-md-4">
            <!-- Bootstrap Register -->
            <div class="block block-themed">
                <div class="block-header bg-gd-leaf">
                    <h3 class="block-title">Start Video call</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="register1-username">Passcode</label>
                        <div class="col-12">
                            <input type="text" class="form-control" value="{{$passcode}}" id="username-input" readonly>
                        </div>
                    </div>
                    <button class="btn btn-alt-primary" onclick="sendUsername()">
                    <i class="fa fa-send mr-5"></i>    Send
                    </button>
                    <button class="btn btn-alt-success" onclick="startCall()">
                        <i class="fa fa-phone mr-5"></i> Start Call
                    </button>
                </div>
            </div>
            <!-- END Bootstrap Register -->
        </div>
    </div>


    <div id="video-call-div">
        <video muted id="local-video" autoplay></video>
        <video id="remote-video" autoplay></video>
        <div class="call-action-div">
            <button class="btn btn-alt-primary" onclick="muteVideo()">
               <i class="fa fa-microphone-slash"></i> Mute Video
            </button>
            <button class="btn btn-alt-primary" onclick="muteAudio()">
                <i class="fa fa-video-camera"></i> Mute Audio
            </button>
            <button class="btn btn-alt-danger" onclick="endCall()">
                <i class="fa fa-close"></i> End Call
            </button>
        </div>
    </div>

    <script src="{{asset('js/video_chat/sender.js')}}"></script>

@endsection
