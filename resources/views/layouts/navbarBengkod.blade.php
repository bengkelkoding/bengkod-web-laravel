<!-- @php
$haloo = "Some value"; // Define the haloo variable
@endphp -->

<nav x-data="{ open: false }" class="sticky top-0 right-0 left-0 py-4 z-10 bg-[#114D91] flex items-center justify-center max-md:h-auto max-md:py-4">
    <div class="w-[90%] h-[100%] text-white flex items-center justify-between px-5 max-md:flex-col">
    <a href="{{ url('/') }}" class="text-4xl font-medium max-md:mb-3">Bengkel Koding</a>
        @if (True) <!-- nanti logicnya ganti -->
        <div>
            @auth
                @php
                $tes = Auth::user()->roles()->pluck('name')->first();
                if($tes == 'mahasiswa'){
                    $url = 'mahasiswa';
                }else if($tes == 'dosen'){
                    $url = 'lecture';
                }else{
                    $url = 'dashboard';
                }
                @endphp
                <a href="{{ url($url) }}" class="ml-5 text-2xl hover:border-b-2 pb-1 px-3 transition ease-in-out duration-150 active:bg-transparent focus:bg-transparent ">Dashboard</a>
            @else
                <x-tombol-login href="{{ route('login') }}" class="">Masuk</x-tombol-login>
            @endauth
        @endif
        </div>

    </div>
</nav>
