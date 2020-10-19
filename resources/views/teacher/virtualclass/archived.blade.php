@extends('layouts.master_auth')

@section('content')

    <div class="content">
        {{-- Breadcrumb --}}
        <nav class="breadcrumb mb-0">
            <span class="breadcrumb-item">
                <a href="/"> <i class="si si-home"></i> Home</a>
                <h2>Archived classes</h2>
            </span>
        </nav>
        {{-- End Breadcrumb --}}

        {{-- Class Cards --}}
        <div class="row">
            @forelse($archived_classes as $classes)
                <div class="col-md-6 col-xl-3">
                    <div class="block block-themed text-center">
                        <div class="block-content block-content-full block-sticky-options pt-30 bg-primary-dark">
                            <div class="block-options">
                                <div class="dropdown">
                                    <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(27px, 28px, 0px);">
                                        <button class="dropdown-item" data-toggle="modal" data-target="#modal-restore-{{$classes->id}}">
                                            <i class="fa fa-fw fa-undo mr-5"></i>Restore
                                        </button>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#modal-delete-{{$classes->id}}">
                                            <i class="text-danger fa fa-fw fa-trash mr-5"></i><b class="text-danger">Delete</b>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <img class="img-avatar img-avatar-thumb" src="{{asset('/media/photos/photo14@2x.jpg')}}" alt="">
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-primary">
                            <div class="font-w600 text-white mb-5">{{$classes->class_name}}</div>
                            <div class="font-size-sm text-white-op">{{$classes->description}}</div>
                        </div>
                        <div class="block-content">
                            <div class="row items-push">
                                <div class="col">
                                    <div class="mb-5"><i class="si si-calendar fa-2x"></i></div>
                                    <div class="font-size-sm text-muted">Created: {{date('d-m-Y', strtotime($classes->created_at))}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('teacher.modals.restore_class')
                @include('teacher.modals.delete_class')
            @empty

                <div class="content content-full">
                    <div class="py-30 text-center">
                        <div class="display-3 text-flat">
                            <i class="fa fa-times-circle-o"></i> No Archived Classes
                        </div>
                        <h2 class="h3 font-w400 text-muted mb-50">When you archive a class on the classes page it comes here</h2>
                    </div>
                </div>

            @endforelse
        </div>
        {{-- End Class Cards--}}
    </div>

@endsection
