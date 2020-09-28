@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Dashboard') }}</div>

                    <div class="card-body mb-20">
                        {{ Auth::user()->name }}
                        <p>This means you've logged in</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
