@extends('layouts.master_auth')

@section('content')

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Classes<small>.</small></h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th class="text-center"></th>
                <th>Class</th>
                <th class="d-none d-sm-table-cell">Instructor</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Students</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Assignments</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Files</th>
                <th class="text-center" style="width: 15%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($classes as $class)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="font-w600">{{$class->class_name}}</td>
                    <td class="d-none d-sm-table-cell">{{$class->user->name}}</td>
                    <td class="d-none d-sm-table-cell">{{$class->virtual_class_students->count()}}</td>
                    <td class="d-none d-sm-table-cell">{{$class->virtual_class_assignment->count()}}</td>
                    <td class="d-none d-sm-table-cell">
                        {{count(\Illuminate\Support\Facades\Storage::allFiles('public/class-'.$class->id))}}
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-class-{{$class->id}}" data-title="Used space">
                            <i class="si si-graph"></i>
                        </button>
                    </td>
                </tr>
                {{-- Class statistics --}}
                @include('admin.modals.class_stats')
                {{-- End class statistics --}}
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



