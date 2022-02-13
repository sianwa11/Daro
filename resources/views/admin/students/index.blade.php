we@extends('layouts.master_auth')

@section('content')

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Students<small>.</small></h3>
            <a href="{{action('Admin\StudentController@export_csv')}}" class="btn btn-alt-success">
                <i class="mr-5 fa fa-file-excel-o"></i> Export as csv
            </a>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center"></th>
                    <th>Name</th>
                    <th class="d-none d-sm-table-cell">Email</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Courses</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                    <th class="text-center" style="width: 15%;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($students as $info)
                    <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="font-w600">{{$info->name}}</td>
                    <td class="d-none d-sm-table-cell">{{$info->email}}</td>
                    <td class="d-none d-sm-table-cell">
                        @forelse($no_of_courses as $key => $count)
                            @if($key == $info->id)
                                {{$count}}
                            @endif
                        @empty

                        @endforelse
                    </td>
                    <td class="d-none d-sm-table-cell">
                        @if($info->suspended == 0)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Suspended</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Contact Student">
                            <i class="fa fa-envelope"></i>
                        </button>
                        @if($info->suspended == 0)
                            <button type="button" class="btn btn-sm btn-alt-danger" data-toggle="modal" data-target="#modal-suspend-{{$info->id}}" data-toggle="tooltip" title="Suspend">
                                <i class="fa fa-trash"></i>
                            </button>
                        @else
                            <button type="button" class="btn btn-sm btn-alt-success" data-toggle="modal" data-target="#modal-restore-{{$info->id}}" data-toggle="tooltip" title="Restore">
                                <i class="fa fa-undo"></i>
                            </button>
                        @endif
                    </td>
                </tr>
                    {{-- Suspend and restore Student Modals --}}
                    @include('admin.modals.suspend_user')
                    @include('admin.modals.restore_user')
                    {{-- End Suspend and restore Student Modals --}}
                @empty

                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

{{-- For the datatables in submissions table --}}
@section('js_after')
    @include('layouts.datatables.datatables_plugins')
@endsection
