@extends('layouts.master_auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Success') }}</div>
                        <div class="card-body">
                            <p>You have successfully registered you can now
                                <a href="{{route('login')}}" class="btn btn-success">Login</a></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
