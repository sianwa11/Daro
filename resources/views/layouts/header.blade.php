@extends('layouts.master_auth')
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
    </div>
