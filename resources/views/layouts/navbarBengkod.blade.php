<!-- @php
$haloo = "Some value"; // Define the haloo variable
@endphp -->

<nav x-data="{ open: false }" class="sticky top-0 right-0 left-0 h-[10vh] z-10 bg-[#114D91] flex items-center justify-center max-md:h-auto max-md:py-4">
    <div class="w-[90%] h-[100%] text-white flex items-center justify-between px-5 max-md:flex-col">
        <a href="{{ url('/') }}" class="text-4xl font-medium max-md:mb-3">Bengkel Koding</a>
        <div class="w-[45%] flex justify-end items-center text-xl max-md:justify-center max-md:mb-3">
            <a href="{{ route('learning') }}" class="ml-5">Learning</a> <!-- href ke route(learning)-->
            <a href="{{ route('activate-token') }}" class="ml-5 max-md:whitespace-nowrap ">Aktivasi Token</a> <!-- href ke route(actToken)-->
        </div>
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
</nav>