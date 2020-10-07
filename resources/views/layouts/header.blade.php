 <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="content-header-section">
                <!-- Logo -->
                <div class="content-header-item">
                    <a class="font-w700 mr-5" href="#">
                        <i class="si si-book-open"></i>
                        <span class="font-size-xl text-dual-primary-dark">{{ config('app.name') }}</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Left Section -->

            <!-- Middle Section -->
            <div class="content-header-section">
                <!-- Header Navigation -->
                <!--Desktop Navigation, mobile navigation can be found in #sidebar-->

                <!-- END Header Navigation -->
            </div>
            <!-- END Middle Section -->

            <!-- Right Section -->
            <div class="content-header-section">
                @auth
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
                            <a class="dropdown-item" href="#">
                                <i class="si si-note mr-5"></i> Invoices
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

        <!-- Header Loader -->
        <div id="page-header-loader" class="overlay-header bg-primary">
            <div class="content-header content-header-fullrow text-center">
                <div class="content-header-item">
                    <i class="fa fa-sun-o fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

 @section('js_after')
     <script src="{{ mix('js/laravel.app.js') }}"></script>
 @endsection
