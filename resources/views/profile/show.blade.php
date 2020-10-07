@extends('layouts.master_auth')

@section('content')

    <!-- User Info -->
    <div class="bg-image bg-image-bottom"
         style="background-image: url('{{asset('/media/photos/photo13@2x.jpg')}}');">
        <div class="bg-primary-dark-op py-30">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-15">
                    <a class="img-link" href="">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('/media/avatars/avatar15.jpg')}}" alt="">
                    </a>
                </div>
                <!-- END Avatar -->

                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">{{auth()->user()->name}}</h1>

                @forelse($biodata as $data)
                <h2 class="h5 text-white-op">
                    School <a class="text-primary-light" href="javascript:void(0)">{{$data->school}}</a>
                </h2>
                @empty

                @endforelse
                <!-- END Personal -->

                <!-- Actions -->
                @foreach($biodata as $data)
                <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5">
                    <a href="/profile/{{$data->user_id}}/edit"><i class="fa fa-edit mr-5"></i> Edit Profile</a>
                </button>
                @endforeach
                <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-primary mb-5">
                    <a href="/"><i class="fa fa-dashboard mr-5"></i> Dashboard</a>
                </button>
                <!-- END Actions -->
            </div>
        </div>
    </div>
    <!-- END User Info -->

    <!-- Edit Profile -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-user fa-fw mr-5 text-muted"></i> Personal Info
            </h3>
        </div>
        <div class="block-content">
                @forelse($biodata as $data)
                    <div class="row items-push">
                        <div class="col-lg-7 offset-lg-1">
                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control form-control-lg" value="{{$data->firstname}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control form-control-lg" value="{{$data->lastname}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control form-control-lg" value="{{$data->phone_number}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>School</label>
                                <input class="form-control form-control-lg" value="{{$data->school}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control form-control-lg" value="{{$data->address}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input class="form-control form-control-lg" value="{{$data->city}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input class="form-control form-control-lg" value="{{$data->country}}" readonly>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Fill in user info</p>
                @endforelse
        </div>
    </div>
    <!-- END Edit Profile -->

@endsection
