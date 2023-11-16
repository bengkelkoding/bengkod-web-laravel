<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="shortcut icon" type="image/png" href="{{asset('assets/admin/images/logos/LogoUdinus.png')}}" />
        <link rel="stylesheet" href="{{asset('assets/admin/css/styles.min.css')}}" />

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
                <header class=" bg-[#114D91] sticky top-0 flex items-center justify-center z-10">
                    <nav class="w-[90%] max-md:w-[100%] px-4 flex max-md:flex-col justify-between items-center text-center">
                        <p class="text-xl max-md:text-2xl font-semibold text-white cursor-default max-lg:mb-1">Bengkel Koding</p>
                        <div class="flex justify-between items-center ">
                            @if (isset(auth()->user()->course))
                            <ul class="text-xl font-medium text-white mr-5">
                                <li><a href=" {{route('logs.index') }}" class="hover:text-white hover:border-b-2 pb-1 px-3 transition ease-in-out duration-150">Logs</a></li>
                            </ul>
                            @endif
                            <ul class="text-xl font-medium text-white mr-5">
                                <li><a href="{{url('history') }}" class="hover:text-white hover:border-b-2 pb-1 px-3 transition ease-in-out duration-150">History</a></li>
                            </ul>
                            <ul class="text-xl font-medium text-white mr-5">
                                <li><a href=" {{url('/') }}" class="hover:text-white hover:border-b-2 pb-1 px-3 transition ease-in-out duration-150">Home</a></li>
                            </ul>
                            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                        aria-expanded="false">

                                        <img src="{{asset('assets/admin/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
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
        <script src="{{asset('assets/admin/libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/sidebarmenu.js')}}"></script>
        <script src="{{asset('assets/admin/js/app.min.js')}}"></script>
        <script src="{{asset('assets/admin/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/admin/libs/simplebar/dist/simplebar.js')}}"></script>
        <script src="{{asset('assets/admin/js/dashboard.js')}}"></script>
    </body>
</html>
