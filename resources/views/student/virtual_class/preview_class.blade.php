@extends('layouts.master_auth')

@section('content')

    <div class="content">
        <div class="block block-rounded block-fx-shadow">
            <div class="block-content p-0 bg-image" style="background-image: url({{asset('media/photos/photo27@2x.jpg')}});">
                <div class="px-20 py-150 bg-black-op text-center rounded-top">
                    <h5 class="font-size-h1 font-w300 text-white mb-10">{{$class_preview->class_name}} &bull; by {{$user->name}}</h5>
                    <h4 class="font-w300 text-white mb-10">{{$user->email}}</h4>
{{--                    <span class="badge badge-primary text-uppercase font-w700 py-10 px-15">Join Class</span>--}}
                </div>
            </div>
            <div class="block-content bg-body-light">
                <div class="row py-10">
                    <div class="col-6 col-md-5">
                        <p>
                            <i class="fa fa-fw fa-user text-muted mr-5"></i> <strong>2</strong> Students
                        </p>
                    </div>
                    <div class="col-6 col-md-5">
                        <p>
                            <i class="fa fa-fw fa-video-camera text-muted mr-5"></i> <strong>1</strong> Lessons
                        </p>
                    </div>
                    <div class="col-6 col-md">
                        <p>
                            <i class="fa fa-fw fa-book text-muted mr-5"></i> <strong>1</strong> Assignments
                        </p>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-md-6 order-md-1 py-20">
                        <p>{{$class_preview->description}}</p>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full border-top clearfix">
                <a class="btn btn-hero btn-alt-danger float-right" href="javascript:void(0)">
                    <i class="fa fa-heart"></i>
                </a>
                <button type="button" class="btn btn-hero btn-alt-primary" data-toggle="modal"
                data-target="#modal-joinclass">
                    <i class="fa fa-plus mr-5"></i> Join Class
                </button>
            </div>
        </div>
    </div>

    {{-- Join class modal --}}
    @include('student.modals.join_class')
    {{-- End Join class modal --}}

@endsection
