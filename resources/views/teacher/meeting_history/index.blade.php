@extends('layouts.master_auth')

@section('content')
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Meeting History <small>.</small></h3>
{{--            <a href="" class="btn btn-alt-success">
                <i class="mr-5 fa fa-file-excel-o"></i> Export as csv
            </a>--}}
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center"></th>
                    <th>Meeting Passcode</th>
                    <th class="d-none d-sm-table-cell">Created</th>
                    <th class="d-none d-sm-table-cell">Duration</th>
                    <th class="d-none d-sm-table-cell">Attendance</th>
                </tr>
                </thead>
                <tbody>
                @forelse($meeting_details->sortByDesc('created_at') as $details)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td class="text-center">{{$details->video_chat_password}}</td>
                        <td class="font-w600">{{date('l jS \of F Y', strtotime($details->created_at))}}</td>
                        <td class="d-none d-sm-table-cell">
                            {{\Carbon\Carbon::parse($details->ended_at)
                            ->diffInMinutes(\Carbon\Carbon::parse($details->created_at))}} minutes
                        </td>
                        <td></td>
                    </tr>
                @empty
                    <p> No meeting info </p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js_after')
    @include('layouts.datatables.datatables_plugins')
@endsection
