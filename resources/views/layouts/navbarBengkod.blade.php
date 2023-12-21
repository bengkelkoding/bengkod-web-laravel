<!-- @php
    $haloo = 'Some value'; // Define the haloo variable
@endphp -->

<nav x-data="{ open: false }"
    class="sticky top-0 right-0 left-0 p-4 z-10 bg-white flex items-center justify-center shadow-lg shadow-primary-color/5 bg-white/60 backdrop-blur">
    <div class="container h-[25px] text-primary-color flex items-center justify-between">
        <a href="{{ url('/') }}" class="flex gap-2 items-center text-center">
            <img src="{{ asset('assets\img\logo-bengkod-new-nobg.png') }}" alt="BK" class="w-[34px]">
            <p href="{{ url('/') }}" class="ml-1 text-xl font-medium">Bengkel Koding</p>
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
                        } elseif ($user == 'assistant') {
                            $url = 'assistant';
                        } else {
                            $url = 'dashboard';
                        }
                    @endphp
                    <a href="{{ url($url) }}"
                        class="ml-5 text-medium hover:text-slate-300 items-center gap-10 transition ease-in-out duration-150">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="border border-primary-color px-5 py-2 items-center rounded-md font-medium text-l hover:text-white hover:bg-primary-color text-primary-color bg-white focus:bg-primary-color active:bg-primary-color focus:outline-none focus:ring-2 focus:ring-black-500 focus:ring-offset-2 transition ease-in-out duration-150">Masuk</a>
                @endauth
        @endif
    </div>

    </div>
</nav>
