@extends('layouts.master_auth')

@section('content')

    <div class="container">
        <div class="block mt-30">
            <div class="block-header block-header-default">
                <h3 class="block-title">Notifications</h3>
                <div class="block-options">
                </div>
            </div>
            <div class="block-content">
                <ul class="list list-timeline pull-t">
                    @forelse($notifications as $notification)
                        @if($notification->type == 'App\Notifications\AssignmentGraded')
                            <li>
                                <div class="list-timeline-time">{{$notification->created_at->diffForHumans()}}</div>
                                <i class="list-timeline-icon fa fa-check bg-info"></i>
                                <div class="list-timeline-content">
                                    <p class="font-w600">The assignment, '{{$notification->data['assignment_title']}}' has been graded, you scored
                                    <strong>{{$notification->data['mark']}}/100.</strong> More details can be found in the assignments page</p>
                                </div>
                            </li>
                        @endif
                    @empty
                        <div class="list-timeline-content">
                            <p class="font-w600">You currently have no notifications</p>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

@endsection
