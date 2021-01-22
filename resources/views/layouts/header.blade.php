 <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="content-header-section">
                <!-- Logo -->
                <div class="content-header-item">
                    <a class="font-w700 mr-5" href="/">
                        <i class="si si-book-open"></i>
                        <span class="font-size-xl text-dual-primary-dark">{{ config('app.name') }}</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="content-header-section">
                @auth

                    @isRole('student')
                        {{-- Notifications --}}
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="badge badge-primary badge-pill">{{auth()->user()->unreadNotifications()->count()}}</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
                                <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifications</h5>
                                <ul class="list-unstyled my-20">
                                    @forelse(auth()->user()->unreadNotifications as $notification)
                                        <li>
                                            @if($notification->type == 'App\Notifications\AssignmentGraded')
                                            <a class="text-body-color-dark media mb-15" href="/notifications">
                                                <div class="ml-5 mr-15">
                                                    <i class="fa fa-fw fa-check text-success"></i>
                                                </div>
                                                <div class="media-body pr-10">
                                                    <p class="mb-0">{{$notification->data['assignment_title']}} graded</p>
                                                    <p class="mb-0">Score: <strong>{{$notification->data['mark']}}/100.</strong></p>
                                                    <div class="text-muted font-size-sm font-italic">{{$notification->created_at->diffForHumans()}}</div>
                                                </div>
                                            </a>
                                            @endif
                                                @if($notification->type == 'App\Notifications\VideoChatStarted')
                                                    <a class="text-body-color-dark media mb-15" href="/notifications">
                                                        <div class="ml-5 mr-15">
                                                            <i class="fa fa-fw fa-check text-success"></i>
                                                        </div>
                                                        <div class="media-body pr-10">
                                                            <p class="mb-0">Meeting started, password: {{$notification->data['video_chat_password']}}</p>
                                                            <div class="text-muted font-size-sm font-italic">{{$notification->created_at->diffForHumans()}}</div>
                                                        </div>
                                                    </a>
                                                @endif
                                        </li>
                                    @empty
                                        <li>
                                            <a class="text-body-color-dark media mb-15">
                                                <div class="ml-5 mr-15">
                                                    <i class="fa fa-fw fa-smile-o text-primary-dark"></i>
                                                </div>
                                                <div class="media-body pr-10">
                                                    <p class="mb-0">Wow, such empty</p>
                                                </div>
                                            </a>
                                        </li>
                                    @endforelse
                                </ul>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center mb-0" href="/notifications">
                                    <i class="fa fa-flag mr-5"></i> View All
                                </a>
                            </div>
                        </div>
                        {{-- End Notifications --}}

                        <div class="btn-group">
                            <form action="/myclasses">
                                @csrf
                                <button type="submit" class="btn btn-rounded btn-dual-secondary" >
                                    <i class="fa fa-navicon"></i> My Classes
                                </button>
                            </form>
                        </div>
                    @endisRole

                    <!-- User Dropdown -->
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{auth()->user()->name}}</span>
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                            <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>

                            @isRole('admin')
                                {{-- Add admin links here --}}
                            @else
                                {{-- Teacher and student profile link --}}
                                <a class="dropdown-item" href="/profile/create" data-toggle="layout" data-action="side_overlay_toggle">
                                    <i class="si si-user mr-5"></i> Profile
                                </a>
                            @endisRole

                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">
                                <span><i class="si si-envelope-open mr-5"></i> Inbox</span>
                                <span class="badge badge-primary">3</span>
                            </a>

                            @isRole('teacher')
                                {{-- Teachers only links --}}
                                <a class="dropdown-item" href="/virtual_class" data-toggle="layout" data-action="side_overlay_toggle">
                                    <i class="si si-drawer mr-5"></i> My Classes
                                </a>

                                <a class="dropdown-item" href="/archived" data-toggle="layout" data-action="side_overlay_toggle">
                                    <i class="fa fa-archive mr-5"></i> Archived Classes
                                </a>
                            @endisRole

                            <a class="dropdown-item" href="/">
                                <i class="si si-home mr-5"></i> Dashboard
                            </a>
                            <div class="dropdown-divider"></div>

                            <!-- Toggle Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                <i class="si si-wrench mr-5"></i> Settings
                            </a>
                            <!-- END Side Overlay -->

                            <div class="dropdown-divider"></div>
                            <form action="{{ url('/logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="si si-logout mr-5"></i> Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- END User Dropdown -->
                @endauth
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

    </header>
 <!-- END Header -->

 {{-- Bruuh for some reason I have to put these here and idk why it's not working in master_auth
      I shall therefore comment out all the weird stuff--}}
{{-- @section('js_after')--}}
     {{-- Laravel Scaffolding JS --}}
     <script src="{{ mix('js/laravel.app.js') }}"></script>

     {{-- Page JS Plugins --}}
{{--     <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>


     --}}{{-- Page JS Code --}}{{--
     <script src="{{asset('js/pages/tables_datatables.js')}}"></script>--}}
{{-- @endsection--}}
