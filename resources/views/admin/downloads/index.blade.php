@extends('layouts.master_auth')

@section('content')

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Download history.</h3>
        </div>
        <div class="block-content block-content-full">
            @forelse($download_history->sortByDesc('created_at') as $details)
                <ul class="list list-timeline list-timeline-modern pull-t">
                    <li>
                        <div class="list-timeline-time">{{$details->created_at->diffForHumans()}}</div>
                        <i class="list-timeline-icon fa fa-file-o bg-gray-darker"></i>
                        <div class="list-timeline-content">
                            <a href="{{action('Admin\DownloadHistoryController@oops')}}" class="font-w600" target="_blank">{{$details->filename}}</a>
                            <br>
                        </div>
                    </li>
                </ul>
            @empty
                <ul class="list list-timeline list-timeline-modern pull-t">
                    <li>
                        <i class="list-timeline-icon fa fa-close bg-gray-darker"></i>
                        <div class="list-timeline-content">
                            <p>Empty</p>
                        </div>
                    </li>
                </ul>
            @endforelse
        </div>
    </div>

@endsection
