@extends('layouts.master_auth')

@section('content')
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Dynamic Table <small>Full</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center"></th>
                    <th>Class name</th>
                    <th>Assignments</th>
                    <th>Posts</th>
                    <th>Students</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Storage</th>
                </tr>
                </thead>
                <tbody>
                @forelse($classes as $class)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="font-w600">{{$class->class_name}}</td>
                        <td class="d-none d-sm-table-cell">{{$class->virtual_class_assignment->count()}}</td>
                        <td class="d-none d-sm-table-cell">{{$class->virtual_class_post->count()}}</td>
                        <td class="d-none d-sm-table-cell">{{$class->virtual_class_students->count()}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-{{$class->id}}" title="Class storage">
                                <i class="si si-graph"></i>
                            </button>
                        </td>
                    </tr>
                    @include('teacher.modals.class_storage')
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js_after')
    @include('layouts.datatables.datatables_plugins')
    @include('layouts.piecharts.easypiechart')
@endsection
