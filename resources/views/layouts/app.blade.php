<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="shortcut icon" type="image/png" href="{{asset('admin/images/logos/LogoUdinus.png')}}" />
        <link rel="stylesheet" href="{{asset('admin/css/styles.min.css')}}" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="page-wrapper relative" id="" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
            {{-- @include('layouts.navigation') --}}

            <div class="body-wrapper relative">
                <!--  Header Start -->
                @if (isset($header))
                <header class="app-header bg-[#114D91] sticky top-0">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <ul class="navbar-nav">
                            <li>
                                <p class="ml-10 p-2 mr-5 text-4xl font-medium text-white cursor-default">Bengkel Koding</p>
                            </li>
                        </ul>
                        <ul class="ml-12 text-xl font-medium text-white">
                            <li><a href=" {{url('/') }}" class="hover:text-white hover:border-b-2 pb-1 px-3 transition ease-in-out duration-150">Home</a></li>
                        </ul>
                        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                aria-expanded="false">

                                <img src="{{asset('admin/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                <div class="message-body">
                                    <a href="{{route('profile.edit')}}" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                                </div>
                            </li>
                            </ul>
                        </div>
                    </nav>
                </header>
            @endif
            <!--  Header End -->
            
                <!-- Page Content -->
                <div class="min-h-screen">
                    {{ $slot }}
                </div>
            </div>
        </div>

        @include('layouts.footerBengkod')
        <script src="{{asset('admin/libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admin/js/sidebarmenu.js')}}"></script>
        <script src="{{asset('admin/js/app.min.js')}}"></script>
        <script src="{{asset('admin/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
        <script src="{{asset('admin/libs/simplebar/dist/simplebar.js')}}"></script>
        <script src="{{asset('admin/js/dashboard.js')}}"></script>
    </body>
</html>
