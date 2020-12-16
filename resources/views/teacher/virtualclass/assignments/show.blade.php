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

                <form action="/assignment/{{$assignment->id}}/submissions">
                    @csrf
                    <button type="submit" class="btn btn-alt-success">
                        <i class="fa fa-upload"></i> Submissions
                    </button>
                </form>
            </div>
            <div class="block-content">
                <p>{{$assignment->instructions}}</p>
            </div>

        </div>

        <div class="row gutters-tiny">
            <div class="col-xl-4">
                <div class="block block-bordered block-rounded">
                    <div class="block-content block-content-full">
                        <div class="py-50 text-center">
                            <div class="h2 mb-0">{{$submissions}} turned in</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                @if($students_assigned > 0)
                <div class="js-pie-chart pie-chart" data-percent="{{($submissions * 100)/$students_assigned}}" data-line-width="5" data-size="100" data-bar-color="#9ccc65" data-track-color="#e9e9e9">
                    <span>{{$submissions}}<br><small class="text-muted">/{{$students_assigned}}</small></span>
                </div>
                @else
                <div class="js-pie-chart pie-chart" data-percent="0" data-line-width="5" data-size="100" data-bar-color="#9ccc65" data-track-color="#e9e9e9">
                    <span>0<br><small class="text-muted">/0</small></span>
                </div>
                @endif
            </div>
            <div class="col-xl-4">
                <div class="block block-bordered block-rounded">
                    <div class="block-content block-content-full">
                        <div class="py-50 text-center">
                            <div class="h2 mb-0">{{$students_assigned}} Assigned</div>
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

@section('js_after')
    @include('layouts.piecharts.easypiechart')
@endsection
