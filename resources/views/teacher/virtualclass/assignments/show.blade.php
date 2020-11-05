@extends('layouts.master_auth')

@section('content')
    {{-- Page Content --}}
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Assignment: {{$assignment->title}}
                    <form action="/virtual_class/{{$assignment->virtual_class_id}}">
                        @csrf
                        <button type="submit" class="btn btn-alt-primary mr-5 mb-5">
                            <i class="fa fa-backward mr-5"></i> Back to class
                        </button>
                    </form>
                </h3>
                <button type="button" class="btn btn-alt-info mr-10" data-toggle="modal"
                        data-target="#modal-editAssignment-{{$assignment->id}}">
                    <i class="fa fa-pencil"></i> Edit
                </button>

                <button type="button" class="btn btn-alt-danger mr-10" data-toggle="modal"
                        data-target="#modal-deleteAssignment-{{$assignment->id}}">
                    <i class="fa fa-trash"></i> Delete
                </button>

                <button type="button" class="btn btn-alt-success" data-toggle="modal" data-target="#">
                    <i class="fa fa-download"></i> Submissions
                </button>
            </div>
            <div class="block-content">
                <p>{{$assignment->instructions}}</p>
            </div>

        </div>

        <div class="row gutters-tiny">
            <div class="col-sm-6">
                <div class="block block-bordered block-rounded">
                    <div class="block-content block-content-full">
                        <div class="py-50 text-center">
                            <div class="h2 mb-0">0 turned in</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="block block-bordered block-rounded">
                    <div class="block-content block-content-full">
                        <div class="py-50 text-center">
                            <div class="h2 mb-0">0 Assigned</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Page Content --}}

    {{-- Modals --}}
    @include('teacher.modals.edit_assignment')
    @include('teacher.modals.delete_assignment')
    {{-- End Modals --}}
@endsection
