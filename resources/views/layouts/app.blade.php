<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>

        <link href="{{ asset('css/custom-scrollbar.css') }}" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="{{ asset('assets/admin/images/logos/LogoUdinus.png') }}" />
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="shortcut icon" type="image/png" href="{{asset('assets/admin/images/logos/LogoUdinus.png')}}" />
        <link rel="stylesheet" href="{{asset('assets/admin/css/styles.min.css')}}"/>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-100 font-sans antialiased text-black">
        <nav class="sticky top-0 right-0 left-0 z-10 bg-white">
            <div class="container mx-auto h-[60px] flex item-center justify-between">
                <a href="{{ url('/') }}" class="flex gap-2 items-center hover:text-black">
                    <img src="{{ asset('assets\img\logo-bengkod-new-nobg.png') }}" alt="BK" class="w-[34px]">
                    <p class="ml-1 text-xl font-medium">Bengkel Koding</p>
                </a>
                <div class="flex gap-10 items-center">
                    <div class="flex text-medium items-center gap-10 transition ease-in-out duration-150">
                        <ul>
                            <li><a href=" {{url('/student') }}" class="hover:text-primary-color">Home</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{url('history') }}" class="hover:text-primary-color">Logs</a></li>
                        </ul>
                    </div>
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
                                    <div class="body-wrapper relative">
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
        <!--  Header End -->
        <!-- Page Content -->
        <div class="min-h-screen">
            {{ $slot }}
        </div>
        <footer class="w-full flex flex-col">
            <div class="container px-0 lg:px-6 2xl:px-0 mx-auto flex justify-between items-center py-3 text-[#828282] flex-col text-center gap-4 md:flex-row">
                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets\img\Udinus_logo.png') }}" alt="" class="h-10">
                    <div class="h-10 w-0.5 bg-slate-300 rounded-lg"></div>
                    <img src="{{ asset('assets\img\logo-bengkod-new-nobg.png') }}" alt="" class="h-10">
                    <p>Bengkel Koding</p>
                </div>
                <!-- </div> -->
                <p>Bengkel Koding © 2023 All rights reserved.</p>
            </div>
        </footer>
        <script src="{{asset('assets/admin/libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/sidebarmenu.js')}}"></script>
        <script src="{{asset('assets/admin/js/app.min.js')}}"></script>
        <script src="{{asset('assets/admin/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/admin/libs/simplebar/dist/simplebar.js')}}"></script>
        <script src="{{asset('assets/admin/js/dashboard.js')}}"></script>
    </body>
</html>
