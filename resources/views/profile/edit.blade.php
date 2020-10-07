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
            <!-- END Personal -->

                <!-- Actions -->
                    <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5">
                        <a href="/profile/{{auth()->user()->id}}"><i class="fa fa-user mr-5"></i>Profile</a>
                    </button>
                <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-primary mb-5">
                    <a href="/"><i class="fa fa-dashboard mr-5"></i> Dashboard</a>
                </button>
                <!-- END Actions -->
            </div>
        </div>
    </div>
    <!-- END User Info -->
<div class="">
    <!-- Material (floating) Register -->
    <div class="block block-themed">
        <div class="block-header bg-corporate">
            <h3 class="block-title"><i class="fa fa-edit"></i>Edit your information</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <form action="/profile/{{$user_id}}" method="post">
                @method('PATCH')

                @csrf

                @forelse($biodata as $data)
                    {{-- Phone no --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                       value="{{$data->phone_number}}">
                                <label for="phone_number">Phone Number</label>
                            </div>
                        </div>
                        @error('phone_number')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    {{-- End Phone no --}}

                    {{-- Address --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="address" name="address"
                                value="{{$data->address}}">
                                <label for="address">Address</label>
                            </div>
                        </div>
                        @error('address')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    {{-- End Address --}}

                    {{-- City --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="city" name="city"
                                value="{{$data->city}}">
                                <label for="city">City</label>
                            </div>
                        </div>
                        @error('city')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    {{-- End City --}}

                    {{-- Cuuntry --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="country" name="country"
                                value="{{$data->country}}">
                                <label for="country">Country</label>
                            </div>
                        </div>
                        @error('country')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    {{-- End Country--}}

                    {{-- School --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="school" name="school"
                                value="{{$data->school}}">
                                <label for="school">School</label>
                            </div>
                        </div>
                        @error('school')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    {{-- End School --}}

                    {{-- Submit Button --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-alt-success" style="color: darkgreen">
                                <i class="fa fa-plus mr-5"></i> Submit
                            </button>
                        </div>
                    </div>
                    {{-- End Submit Button --}}

                @empty
                    <p>No info</p>
                @endforelse
            </form>
        </div>
    </div>
    <!-- END Material (floating) Register -->
</div>
@endsection
