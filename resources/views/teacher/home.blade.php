@extends('layouts.master_auth')

@section('content')
    <!-- Page Content -->
    <div class="bg-white">
        <!-- Breadcrumb -->
        <div class="content">
            <nav class="breadcrumb mb-0">
                <a class="breadcrumb-item" href="#">Home</a>
                <span class="breadcrumb-item active">Dashboard</span>
            </nav>
        </div>
        <!-- END Breadcrumb -->

        <!-- Content -->
        <div class="content">
            <!-- Icon Navigation -->
            <div class="row gutters-tiny push">
                <div class="col-6 col-md-4 col-xl-2" data-toggle="modal" data-target="#exampleModal">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-book-open fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">Create Class</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{action('Teacher\MeetingHistoryController@index')}}">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="fa fa-history fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">Meeting History</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{route('virtual_class.index')}}">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-drawer fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">My Classes</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{action('Teacher\ClassStatsController@index')}}">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-pie-chart fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">Class Stats</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center"
                       href="{{action('VideoChatController@index')}}" target="_blank">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-camcorder fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">Video Chat</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{action('Teacher\DocumentController@index')}}">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-info fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">Class Info</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END Icon Navigation -->
        </div>
        <!-- END Content -->
    </div>
    <!-- END Page Content -->
@endsection

@section('modals')
    @include('teacher.modals.create_class')
@endsection
