@extends('layouts.master_auth')

@section('content')

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Assignment submissions <small>.</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th>Name</th>
                    <th class="d-none d-sm-table-cell">Email</th>
                    <th>Status</th>
                    <th>File</th>
                    <th class="d-none d-sm-table-cell">Grade</th>
                </tr>
                </thead>
                <tbody>
                @forelse($students as $student)
                    <tr>
                        <td class="font-w600">{{$student->name}}</td>
                        <td class="d-none d-sm-table-cell">{{$student->email}}</td>
                        <td>
                            @if(array_search($student->id, array_column($subArray, 'user_id')) !== false)
                                @forelse($submissions as $submission)
                                    @if($student->id == $submission->user_id)
                                        @if(array_search($submission->id, array_column($marksArray, 'assignment_submission_id')) !== false)
                                            <span class="badge badge-success">Graded <i class="fa fa-check"></i></span>
                                            <button type="button" class="btn btn-sm btn-square btn-alt-success" data-toggle="modal" data-target="#edit_marks-{{$student->id}}"><i class="fa fa-edit mr-5"></i></button>
                                            @break
                                        @else
                                            <button type="button" class="btn btn-alt-primary" data-toggle="modal" data-target="#marks-{{$student->id}}">Mark</button>
                                            @break
                                        @endif
                                    @endif
                                @empty
                                @endforelse
                            @else
                                <span class="badge badge-danger">Not submitted</span>
                            @endif
{{--                            @if(array_search($student->id, array_column($subArray, 'user_id')) !== false)
                                <button type="button" class="btn btn-alt-primary" data-toggle="modal" data-target="#marks-{{$student->id}}">Mark</button>
                            @else
                                <span class="badge badge-danger">Not submitted</span>
                            @endif--}}
                        </td>
                        <td>
                            @forelse($submissions as $submission)
                                @if($student->id == $submission->user_id)
                                    <a class="block" href="{{asset('storage/assignment_submissions/'.$assignment->title.'/user-'.$student->id.'/'.$submission->files)}}" target="_blank">
                                        <i class="fa fa-file-text mr-5 mb-5"></i>{{$submission->files}}
                                    </a>
                                    @break
                                @endif
                            @empty
                            @endforelse
                        </td>
                        <td>
                            @forelse($submissions as $submission)
                                @if($student->id == $submission->user_id)
                                    @forelse($marks as $m)
                                        @if($submission->id == $m->assignment_submission_id)
                                            <span class="text-black">{{$m->mark}}/100</span>
                                            @break
                                        @endif
                                    @empty
                                    @endforelse
                                @endif
                            @empty
                            @endforelse
                        </td>
                    </tr>
                    @include('teacher.modals.mark_assignment')
                    @include('teacher.modals.edit_marked_assignment')
                @empty
                    <span>No submissions/students yet</span>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

{{-- For the datatables in submissions table --}}
@section('js_after')
    <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>


    {{-- Page JS Code --}}
    <script src="{{asset('js/pages/tables_datatables.js')}}"></script>
@endsection

