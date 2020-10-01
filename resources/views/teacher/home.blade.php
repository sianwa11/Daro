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
                <div class="col-6 col-md-4 col-xl-2">
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
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="javascript:void(0)">
                        <div class="ribbon-box">5</div>
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-envelope fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">Inbox</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-drawer fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">My Classes</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-users fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">Students</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-camcorder fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">Start Stream</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-docs fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600">Documents</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END Icon Navigation -->
        </div>
        <!-- END Content -->
    </div>
    <!-- END Page Content -->
{{--    <div class="card-body mt-20">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p>Hello {{auth()->user()->name}}, you are logged in as teacher</p>
    </div>--}}
@endsection
