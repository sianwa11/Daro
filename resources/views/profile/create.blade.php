@extends('layouts.master_auth')

@section('content')
    <div class=""> {{-- fix positioning later --}}
        <!-- Material (floating) Register -->
        <div class="block block-themed">
            <div class="block-header bg-gd-lake">
                <h3 class="block-title">Kindly add your additional information</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <form action="/profile" method="post">
                    @csrf

                    {{-- First name --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="firstname" name="firstname">
                                <label for="firstname">First Name</label>
                            </div>
                        </div>
                        @error('firstname')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    {{-- End First name --}}

                    {{-- Last name --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="lastname" name="lastname">
                                <label for="lastname">Last Name</label>
                            </div>
                        </div>
                        @error('lastname')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    {{-- End Last name --}}

                    {{-- Phone no --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="phone_number" name="phone_number">
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
                                <input type="text" class="form-control" id="address" name="address">
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
                                <input type="text" class="form-control" id="city" name="city">
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
                                <input type="text" class="form-control" id="country" name="country">
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
                                <input type="text" class="form-control" id="school" name="school">
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
                </form>
            </div>
        </div>
        <!-- END Material (floating) Register -->
    </div>
@endsection
