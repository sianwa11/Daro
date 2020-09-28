<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{config('app.name')}}</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon-32x31.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x194.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{ mix('/css/codebase.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/corporate.css') }}"> -->
    @yield('css_after')

<!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<body>
    <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed page-header-inverse main-content-boxed">

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
                    <ul class="nav-main-header">
                        <!-- Authentication Links -->
                        @guest
                            {{-- if logged out--}}
                        @else
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                    <!-- END Header Navigation -->
                </div>
                <!-- END Middle Section -->

                <!-- Right Section -->
                <div class="content-header-section">

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


        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        </div>
    <!-- END Page Container -->

    <!-- Codebase Core JS -->
    <script src="{{ mix('js/codebase.app.js') }}"></script>

    <!-- Laravel Scaffolding JS -->
    <script src="{{ mix('js/laravel.app.js') }}"></script>

    @yield('js_after')
</body>

</html>
