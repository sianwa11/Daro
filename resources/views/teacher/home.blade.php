@extends('layouts.master_auth')

@section('content')
    <div class="card-body mt-20">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p>Hello {{auth()->user()->name}}, you are logged in as teacher</p>
    </div>
@endsection
