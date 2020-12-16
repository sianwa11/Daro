@extends('layouts.master_auth')

@section('content')

    <div class="content">
        <div class="row">
            {{-- Class Details --}}
            <div class="col-lg-4 col-xl-3">
                {{-- Class Name --}}
                <div class="block block-rounded text-center font-w600">
                    <div class="block-content block-content-full bg-gd-sea"></div>
                    <div class="block-content block-content-full">
                        {{$class->class_name}}<br>
                        <a class="text-muted font-w400" href="javascript:void(0)">by {{$teacher->name}}</a>
                    </div>
                </div>
                {{-- End Class Name --}}

                {{-- Due Assignments --}}
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title font-w600">Reminder</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        @forelse($class_assignments as $assignment)
                            <a class="font-w600" href="javascript:void(0)">{{$assignment->title}}</a>
                            @if(\Carbon\Carbon::now()->greaterThan(\Carbon\Carbon::parse($assignment->due_date)->format('Y-m-d')))
                                <p class="text-danger">Due {{\Carbon\Carbon::parse($assignment->due_date)->format('Y-m-d')}}</p>
                            @else
                                <p class="text-black">Due {{\Carbon\Carbon::parse($assignment->due_date)->format('Y-m-d')}}</p>
                            @endif

                        @empty

                        @endforelse
                    </div>
                </div>
                {{-- End Due Assignments --}}
            </div>
            {{-- End Class details --}}

            <!-- Updates -->
            <div class="col-lg-4 col-xl-6">
                <div class="block block-rounded">
                    <div class="block-content block-content-full bg-primary-light">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control border-0" placeholder="What’s happening?">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary border-0">
                                        <i class="fa fa-pencil-square-o mr-5"></i> Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @forelse($class_posts->sortByDesc('created_at') as $posts)
                        <div class="block-content block-content-full border-t">
                            <div class="media">
                                <img class="img-avatar img-avatar48 mr-20" src="{{asset('media/avatars/avatar9.jpg')}}" alt="">
                                <div class="media-body">
                                    <p class="mb-0">
                                        <a class="font-w600" href="javascript:void(0)">{{$teacher->name}}</a>
                                        <a class="text-muted" href="javascript:void(0)">{{$teacher->email}}</a>
                                        <em class="text-muted">&bull; {{$posts->created_at->diffForHumans()}}</em>
                                    </p>
                                    <p>
                                        {{$posts->post_description}}
                                    </p>
                                    @if(is_null($posts->post_files))
                                    @else
                                        <a class="block" href="{{asset('storage/class-'.$posts->virtual_class_id.'/files/'.$posts->post_files)}}" target="_blank">
                                            <i class="fa fa-folder-open mr-5 mb-5"></i>Resource
                                        </a>
                                    @endif
                                    <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary mr-10">
                                        <i class="fa fa-fw fa-comment-o"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary mr-10">
                                        <i class="fa fa-fw fa-retweet"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary mr-10">
                                        <i class="fa fa-fw fa-heart-o"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary mr-10">
                                        <i class="fa fa-fw fa-envelope-o"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="block-content block-content-full border-t">
                            <div class="media">
                                <div class="media-body">
                                    <p>No posts yet...</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- END Updates -->

            {{-- Extra --}}
            <div class="col-lg-4 col-xl-3">
                {{-- Class Contents --}}
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title font-w600">Class Contents</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <ul class="nav-users pull-all">
                            <li>
                                <a href="/class/{{$class->id}}/assignments">
                                    <img class="img-avatar" src="{{asset('media/photos/photo14.jpg')}}">
                                    <i class="fa fa-arrow-right text-success"></i> Class Assignments
                                </a>
                            </li>

                            <li>
                                <a href="/class/{{$class->id}}/classmates">
                                    <img class="img-avatar" src="{{asset('media/avatars/avatar11.jpg')}}">
                                    <i class="fa fa-arrow-right text-success"></i> Classmates
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="block-content block-content-full border-t">
                        <a href="javascript:void(0)">
                            <i class="fa fa-search mr-5"></i>
                        </a>
                    </div>
                </div>
                {{-- Class Contents --}}

                {{-- About --}}
                <div class="block block-rounded">
                    <div class="block-content block-content-full text-muted font-size-sm">
                        &copy; <span class="js-year-copy"></span>
                        <a class="text-muted ml-5" href="javascript:void(0)">{{config('app.name')}}</a>
                        <a class="text-muted ml-5" href="javascript:void(0)">Copyright</a>
                    </div>
                    <div class="block-content block-content-full border-t">
                        <a href="javascript:void(0)">
                            <i class="fa fa-external-link-square mr-5"></i> FAQs
                        </a>
                    </div>
                </div>
                {{-- END About --}}
            </div>
            {{-- END Extra --}}
        </div>
    </div>

@endsection
