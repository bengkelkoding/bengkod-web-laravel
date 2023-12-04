<!-- @php
    $haloo = 'Some value'; // Define the haloo variable
@endphp -->

<nav x-data="{ open: false }"
    class="sticky top-0 right-0 left-0 py-4 z-10 bg-primary-color flex items-center justify-center max-md:py-4 px-0 lg:px-6 2xl:px-0">
    <div class="container h-[25px] text-white flex items-center justify-between">
        <a href="{{ url('/') }}" class="flex gap-2 items-center">
            <img src="assets\img\logo-bengkod.png" alt="BK" class="w-[26px]">
            <p href="{{ url('/') }}" class="ml-1 text-xl font-medium max-md:mb-1">Bengkel Koding</p>
        </a>
        @if (true)
            <!-- nanti logicnya ganti -->
            <div>
                @auth
                    @php
                        $user = Auth::user()
                            ->roles()
                            ->pluck('name')
                            ->first();
                        if ($user == 'student') {
                            $url = 'student';
                        } elseif ($user == 'lecture') {
                            $url = 'lecture';
                        } else {
                            $url = 'dashboard';
                        }
                    @endphp
                    <a href="{{ url($url) }}"
                        class="ml-5 text-xl hover:border-b-2 pb-1 px-3 transition ease-in-out duration-150 active:bg-transparent focus:bg-transparent ">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="border hover:border-white px-5 py-2 items-center border-transparent rounded-md font-medium text-l hover:text-white hover:bg-primary-color text-primary-color bg-white focus:bg-primary-color active:bg-primary-color focus:outline-none focus:ring-2 focus:ring-black-500 focus:ring-offset-2 transition ease-in-out duration-150">Masuk</a>
                @endauth
        @endif
    </div>

    </div>
</nav>
