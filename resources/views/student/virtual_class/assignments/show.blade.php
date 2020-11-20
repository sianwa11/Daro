@extends('layouts.master_auth')

@section('content')
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title ml-10">Class Assignments</h3>
        </div>
        <div class="block-content">
            <p>
                View and submit your assignments from here
            </p>
            <div id="accordion" role="tablist" aria-multiselectable="true">
                @forelse($class_assignments as $assignments)
                    <div class="block block-bordered block-rounded mb-2">
                    <div class="block-header" role="tab" id="accordion_h{{$assignments->id}}">
                        <a class="font-w600" data-toggle="collapse" data-parent="#accordion" href="#accordion_q{{$assignments->id}}" aria-expanded="true" aria-controls="accordion_q{{$assignments->id}}">
                            <i class="si si-notebook mr-1"></i>{{$assignments->title}}
                        </a>
                        <a class="font-w600">
                            <i class="si si-clock mr-1"></i> <span class="text-success">Due {{$assignments->due_date}}, {{$assignments->time}}</span>
                        </a>
                    </div>
                    <div id="accordion_q{{$assignments->id}}" class="collapse @if($loop->iteration == 1) show @endif" role="tabpanel" aria-labelledby="accordion_h{{$assignments->id}}" data-parent="#accordion">
                        <div class="block-content">
                            <p class="text text-black h5"> Instructions: {{$assignments->instructions}}</p>
                            <p class="text text-black"> Assignment files below </p>
                            @forelse($assignments->assignment_files as $files)
                                <a class="block" href="{{asset('storage/assignment_files/'.$files->files)}}" target="_blank">
                                    <i class="fa fa-folder-open mr-5 mb-5"></i> {{$files->files}}
                                </a>
                            @empty
                            @endforelse

                            {{-- Checks if assignment has been submitted --}}
                            @if(array_search($assignments->id, array_column($subArray, 'virtual_class_assignment_id')) !== false)
                                <div class="alert alert-success d-flex align-items-center justify-content-between mb-15" role="alert">
                                    <div class="flex-fill mr-10">
                                        <p class="mb-0">Your assignment has been successfully submitted, your marks will be available soon</p>
                                    </div>
                                    <div class="flex-00-auto">
                                        <i class="fa fa-fw fa-2x fa-check"></i>
                                    </div>
                                </div>
                            @else
                                {{-- Assignment submission form --}}
                                <div class="block-content block-content-full">
                                    <form action="/class/{{$assignments->id}}/assignment" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="files">Select file:</label>
                                            <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file">
                                            @error('file')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group row">
                                            <button type="submit" class="btn btn-rounded btn-dual-secondary">
                                                <i class="fa fa-upload"></i> Upload assignment
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                {{-- End Assignment submission form --}}
                            @endif

                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
