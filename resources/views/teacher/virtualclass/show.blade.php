@extends('layouts.master_auth')

@section('content')
    {{-- Hero --}}
    <div class="bg-image" style="background-image: url('{{asset('/media/photos/photo14@2x.jpg')}}');">
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

    {{-- Breadcrumb --}}
    <div class="content">
        <nav class="breadcrumb mb-0">
                <span class="breadcrumb-item">
                    <b>Of all the hard jobs around, one of the hardest is being a good teacher.</b>
                    <strong style="color: midnightblue">~ Maggie Gallagher</strong>
                </span>
        </nav>
    </div>
    {{-- End Breadcrumb --}}

    {{-- Include Adding of content to class --}}

@endsection

@section('modals')
    @include('teacher.modals.edit_class')
@endsection
