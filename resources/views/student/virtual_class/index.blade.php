@extends('layouts.master_auth')

@section('content')

    <h2 class="content-heading">My classes</h2>
    <div class="row">
        @forelse($my_classes as $class)
            <div class="col-md-6 col-xl-3">
                <div class="block block-themed text-center">
                    <div class="block-content block-content-full block-sticky-options pt-30 bg-flat">
                        <div class="block-options block-options-left">
                            <div class="dropdown">
                                <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-navicon"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-home mr-5"></i>Home
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-pencil mr-5"></i>Profile
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-users mr-5"></i>Friends
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-bell mr-5"></i>Notifications
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="block-options">
                            <div class="dropdown">
                                <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-cog mr-5"></i>Settings
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-hand-stop-o mr-5"></i>Privacy
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-envelope-o mr-5"></i>Messages
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-flat-dark">
                        <div class="font-w600 text-white mb-5">
                            <a href="/class/{{$class->id}}">
                                {{$class->class_name}}
                            </a>
                        </div>
                        <div class="font-size-sm text-white-op">{{$class->description}}</div>
                    </div>
                    <div class="block-content">
                        <div class="row items-push">
                            <div class="col">
                                <div class="mb-5"><i class="si si-calendar fa-2x"></i></div>
                                <small>Created</small>
                                <div class="font-size-sm text-muted">{{$class->created_at->diffForHumans()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="content content-full">
                <div class="py-30 text-center">
                    <div class="display-3 text-flat">
                        <i class="fa fa-times-circle-o"></i> You haven't joined any classes yet
                    </div>
                </div>
            </div>

        @endforelse
    </div>

@endsection
