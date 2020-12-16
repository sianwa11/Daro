@extends('layouts.master_auth')

@section('content')
    {{-- Hero --}}
    <div class="bg-image" style=" height: 300px;
        background-image: url('{{asset('/media/photos/photo14@2x.jpg')}}');">
        <div class="bg-black-op">
            <div class="content content-top text-center">
                <div class="py-50">
                    <h1 class="font-w700 text-white mb-10">{{$virtual_class->class_name}}</h1>
                    <h2 class="h4 font-w400 text-white-op">{{$virtual_class->description}}</h2>

                    <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5"
                    data-toggle="modal" data-target="#modal-slideup">
                        <i class="fa fa-edit mr-5"></i> Edit
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Hero --}}

    {{-- Include Adding of content to class --}}
    <!-- Block Tabs Animated Slide Up -->
    <div class="block">
        <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#btabs-animated-posts">Class Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#btabs-animated-assignments">Assignments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#btabs-animated-students">Students</a>
            </li>
        </ul>
        <div class="block-content tab-content overflow-hidden">
            @include('teacher.virtualclass.sections.class_posts')
            @include('teacher.virtualclass.sections.class_assignments')
            @include('teacher.virtualclass.sections.class_students')
        </div>
    </div>
    <!-- END Block Tabs Animated Slide Up -->
@endsection

@section('modals')
    @include('teacher.modals.edit_class')
@endsection

{{-- For the datatables in class_assignments table --}}
@section('js_after')
    @include('layouts.datatables.datatables_plugins')
@endsection

