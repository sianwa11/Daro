@extends('layouts.master_auth')

@section('content')

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">My classmates</h3>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-striped table-vcenter">
                    <thead>
                        <h1>Classmates</h1>
                    </thead>
                    <tbody>
                    @forelse($classmates as $details)
                        <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('media/avatars/avatar14.jpg')}}" alt="">
                        </td>
                        <td class="font-w600">{{$details->name}}</td>
                        <td>{{$details->email}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Chat">
                                    <i class="fa fa-envelope"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td class="text-center text-danger font-w700">No classmates yet</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
