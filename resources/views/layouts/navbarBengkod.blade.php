<!-- @php
$haloo = "Some value"; // Define the haloo variable
@endphp -->

<nav x-data="{ open: false }" class="w-screen h-[10vh] bg-[#114D91] flex items-center justify-center">
    <div class="w-[90%] h-[100%] text-white flex items-center justify-between px-5">
        <a href="{{ url('/') }}" class="text-4xl font-medium ">Bengkel Koding</a>
        <div class="w-[45%] flex justify-end items-center text-xl">
            <a href="{{ route('learning') }}" class="ml-5">Learning</a> <!-- href ke route(learning)-->
            <a href="{{ route('activate-token') }}" class="ml-5">Aktivasi Token</a> <!-- href ke route(actToken)-->
            @if (True) <!-- nanti logicnya ganti -->
            <div>
                @auth
                    @php
                    $tes = Auth::user()->roles()->pluck('name')->first();
                    if($tes == 'mahasiswa'){
                        $url = 'mahasiswa';
                    }else if($tes == 'dosen'){
                        $url = 'dosen';
                    }else{
                        $url = 'dashboard';
                    }
                    @endphp
                    <a href="{{ url($url) }}" class="ml-5">Dashboard</a>
                @else
                    <x-tombol-login href="{{ route('login') }}">Masuk</x-tombol-login>
                @endauth
            @endif
            </div>
        </div>
    </div>
</nav>