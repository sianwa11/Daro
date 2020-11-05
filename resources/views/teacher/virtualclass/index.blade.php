@extends('layouts.master_auth')

@section('content')

    <div class="content">
        {{-- Breadcrumb --}}
        <nav class="breadcrumb mb-0">
            <span class="breadcrumb-item">
                <a href="/"> <i class="si si-home"></i> Home</a>
                {{--- Create class button --}}
                <button type="button" class="btn-block-option" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus-circle"></i> Create class
                </button>
                <h2>My classes</h2>
            </span>
        </nav>
        {{-- End Breadcrumb --}}

        {{-- Class Cards --}}
            <div class="row">
                @forelse($virtual_classes as $classes)
                <div class="col-md-6 col-xl-3">
                    <div class="block block-themed text-center">
                        <div class="block-content block-content-full block-sticky-options pt-30 bg-primary-dark">
                            <div class="block-options">
                                <div class="dropdown">
                                    <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(27px, 28px, 0px);">
                                        <a id="btnCopy" class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-copy mr-5"></i>Copy Invite Link
                                        </a>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#modal-archive-{{$classes->id}}">
                                            <i class="fa fa-fw fa-archive mr-5"></i>Archive
                                        </button>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/virtual_class/{{$classes->id}}">
                                            <i class="fa fa-fw fa-arrow-right mr-5"></i>Go to class
                                        </a>
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
                    @include('teacher.modals.archive_class')
                @empty

                    <div class="content content-full">
                        <div class="py-30 text-center">
                            <div class="display-3 text-flat">
                                <i class="fa fa-times-circle-o"></i> No Classes
                            </div>
                            <h2 class="h3 font-w400 text-muted mb-50">When you create a class on the Home page it comes here</h2>
                        </div>
                    </div>

                @endforelse
            </div>
        {{-- End Class Cards--}}
    </div>

    {{-- Modal to create class from this page --}}
    @section('modals')
        @include('teacher.modals.create_class')
    @endsection
@endsection


