<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>
    <div class="box-content h-[210px] w-100% p-4 bg-gradient-to-l from-cyan-500 to-blue-500 ">
        <div class="box-content w-[441px] h-auto ml-[190px] mb-[40px]">
            <h1 class="text-white font-bold text-[32px] mt-7">Selamat pagi, Arif Saputra!</h1>
            <p class="text-white mt-2 text-[16px] w-[427]">Jika kamu tidak sanggup menahan lelahnya belajar, Maka bersiaplah menahan perihnya kebodohan.</p>
            <p class="text-white">~ Imam Syafi’i</p>
        </div>
    </div>

    <div class="box-border h-40 w-[700px] p-1 border ml-[190px] mt-12">
        <h3 class="text-black font-bold ml-2 mb-2 text-[14px]">Kursus Anda</h3>
        <div class="box-border h-auto w-[662px] shadow-lg ml-2 flex justify-between items-center">
            <div class="mr-5 p-2 flex">
                <img src="assets\admin\backgrounds\web-dev 1.png" alt="" >
                <div class="w-[170px] h-auto pl-5">
                    <h1 class="text-black font-bold text-[20px]">Web Developer</h1>
                    <p class="text-[#828282] text-[12px]">
                        <img src="assets\admin\icons\users-solid.png" alt="" class="inline mr-2">
                        10 Mahasiswa Terdaftar</p>
                    <p class="text-[#828282] text-[12px]">
                        <img src="assets\admin\icons\calendar-days-solid.png" alt="" class="inline mr-2">
                        Senin - Jum'at</p>
                    <p class="text-[#828282] text-[12px]">
                        <img src="assets\admin\icons\clock-solid.png" alt="">
                        09.30 - 12.00 / 12.30 - 15.00
                    </p>
                </div>
            </div>
            <div>
                <x-tombol-universal class="w-[180px] h-auto mr-5 mb-5"><span class="text-[14px]">Belajar Sekarang</span></x-tombol-universal>
            </div>
        </div>
    </div>

    <div class="box-border h-40 w-[700px] p-1 border ml-[190px] mt-12">
        <h3 class="text-black font-bold ml-2 mb-2 text-[14px]">Kursus Anda</h3>
        <div class="box-border h-auto w-[662px] shadow-lg ml-2 flex justify-between items-center">
            <div class="mr-5 p-2 flex">
                <img src="assets\admin\backgrounds\web-dev 1.png" alt="" >
                <div class="w-[170px] h-auto pl-5">
                    <h1 class="text-black font-bold text-[20px]">Web Developer</h1>
                    <p class="text-[#828282] text-[12px]">10 Mahasiswa Terdaftar</p>
                    <p class="text-[#828282] text-[12px]">Senin - Jum'at</p>
                    <p class="text-[#828282] text-[12px]">09.30 - 12.00 / 12.30 - 15.00</p>
                </div>
            </div>
            <div>
                <x-tombol-universal class="w-[180px] h-auto mr-5 mb-5"><span class="text-[14px]">Belajar Sekarang</span></x-tombol-universal>
            </div>
        </div>
    </div>



    <h2>Kursus Anda:</h2>
        <ul>
            @if($user->kursus)
                <img src="{{$user->kursus->image}}">
                <li>{{ $user->kursus->id }}</li>
                <li>{{ $user->kursus->judul }}</li>
                <li>{{ $user->kursus->author }}</li>
                <li>{{ $user->kursus->hari }}</li>
                <li>{{ $user->kursus->jam }}</li>
                <li>{{ $user->kursus->url }}</li>
            @else
                <li>Anda belum mendaftar ke kursus manapun.</li>
            @endif
        </ul>
</x-app-layout>
