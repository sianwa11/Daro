{{-- Class Posts Section --}}
    <div class="tab-pane fade fade-up show active" id="btabs-animated-posts" role="tabpanel">
        <h4 class="font-w400">Class Posts</h4>

        {{-- Post content form --}}
        <div class="block block-themed">
            <div class="block-content">
                <form action="/virtual_class/{{$virtual_class->id}}/virtual_class_posts" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <textarea class="form-control" id="post_description" name="post_description" rows="7"></textarea>
                                <label for="post_desc">Share with the class</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="file" class="form-control-file" id="post_files" name="post_files" accept="application/pdf">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-alt-info">
                                <i class="fa fa-share mr-5"></i> Send
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- End Post content form --}}

        {{-- Display posts made in this class --}}
        @forelse($class_posts->sortByDesc('created_at') as $posts)
            <div class="block">
                <div class="block-content">
                    <ul class="list list-timeline pull-t">
                        <li>
                            <div class="list-timeline-time dropdown">{{$posts->created_at->diffForHumans()}}
                                <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(27px, 28px, 0px);">
                                    <form action="/virtual_class_post/{{$posts->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="si si-trash mr-5"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <i class="list-timeline-icon fa fa-newspaper-o bg-gray-darker"></i>
                            <div class="list-timeline-content">
                                <p class="font-w600">{{$posts->post_description}}</p>
                                @if(is_null($posts->post_files))
                                @else
                                    {{-- <embed src="{{asset('storage/class-'.$posts->virtual_class_id.'/files/'.$posts->post_files)}}"
                                           style="width:1100px; height:200px;" frameborder="0">--}}
                                    <a class="block" href="{{asset('storage/class-'.$posts->virtual_class_id.'/files/'.$posts->post_files)}}" target="_blank">
                                        <i class="fa fa-folder-open mr-5 mb-5"></i>Resource
                                    </a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        @empty

        @endforelse
    </div>
{{-- End class Posts Section --}}

