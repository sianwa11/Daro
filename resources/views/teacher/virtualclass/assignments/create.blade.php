@extends('layouts.master_auth')

@section('content')
    {{-- Create Assignment Form --}}
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title"> Create Assignment </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <form action="/virtual_class/{{$virtual_class_id}}/assignment" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="title">Title</label>
                                <input type="text" class="form-control form-control-lg" id="title" name="title" value="{{ old('title') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="due_date">Due Date</label>
                                <input type="date" class="form-control form-control-lg" id="due_date" name="due_date" value="{{ old('due_date') }}"
                                       min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="mega-bio">Instructions</label>
                                <textarea class="form-control form-control-lg" id="instructions" name="instructions" value="{{ old('instructions') }}"
                                          rows="11" placeholder="Instructions on the assignment..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="time">Time</label>
                                <input class="form-control form-control-lg" type="time" id="time" name="time" value="{{ old('time') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="files">Select files:</label>
                                <input class="form-control form-control-lg" type="file" id="files" name="files[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-check mr-5"></i> Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- End Create Assignment Form --}}
@endsection


