@extends('layouts.master_auth')

@section('content')
    <!-- Page Content -->
    <div class="bg-white">
        <!-- Breadcrumb -->
        <div class="content">
            <nav class="breadcrumb mb-0">
                <span class="breadcrumb-item">Hello <strong style="color: midnightblue">{{auth()->user()->name}}</strong>,
                    you are logged in as student</span>
            </nav>
        </div>
        <!-- END Breadcrumb -->

        <!-- Content -->
        <div class="content">

        </div>
        <!-- END Content -->
    </div>
    <!-- END Page Content -->
@endsection
