<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>
    <div class="box-content flex w-100% p-4 bg-gradient-to-l from-cyan-500 to-blue-500 mt ">
        <div class="box-content h-auto mb-[40px] mx-24 max-md:mx-12">
            <h1 class="text-white font-bold text-[32px] mt-7">Selamat pagi, {{ auth()->user()->name }}!</h1>
            <p class="text-white mt-2 text-[16px]">Jika kamu tidak sanggup menahan lelahnya belajar, Maka bersiaplah menahan perihnya kebodohan.</p>
            <p class="text-white">~ Imam Syafi’i</p>
        </div>
    </div>
    <div class="mx-52 max-md:mx-24 flex flex-col max-md:justify-center max-md:items-center">
        <div class="flex justify-between flex-wrap items-center  max-md:justify-center">
        @if($user->kursus)
            <div class="box-border p-1 border mt-12 rounded">
                <h3 class="text-black font-bold ml-2 my-2 text-[14px]">Kursus Anda</h3>
                <div class="box-border h-auto shadow-lg flex justify-between items-center max-md:justify-center flex-wrap">
                    <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0">
                        <img src="{{ $user->kursus->image }}" alt="" width="90px" height="90px" class="rounded">
                        <div class="w-[170px] h-auto pl-5">
                            <h1 class="text-black font-bold text-[20px]">{{ $user->kursus->judul }}</h1>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\users-solid.png" alt="" class="inline mr-2">
                                10 Mahasiswa Terdaftar</p>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\calendar-days-solid.png" alt="" class="inline mr-2">
                                {{ $user->kursus->hari }}</p>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\clock-solid.png" alt="" class="inline mr-2">
                                {{ $user->kursus->jam }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <x-tombol-universal href="{{ $user->kursus->url }}" class="px-6 h-auto mr-6 max-md:mr-0 mb-5"><span class="text-[14px]">Belajar Sekarang</span></x-tombol-universal>
                    </div>
                </div>
            </div>
            <div class="border-box w-[150px] h-[141px] border mt-10 flex flex-col justify-center items-center rounded">
                <h3 class="text-black font-bold mb-2 text-[14px]">Nilai Akhir</h3>
                <div class="border-box w-[125px] h-[86px] bg-[#00C1361A] flex justify-center items-center rounded">
                    <h1 class="text-[#00C136] text-[40px] font-bold">100</h1>
                </div>
            </div>
        </div>
        <div class="box-border h-auto w-[136px] p-1 border my-12 flex flex-col justify-center rounded">
            <h3 class="text-black font-bold mb-2 text-[14px] text-center">Submit Tugas</h3>
            <div class="w-[116px] h-auto border ml-1 p-2 mb-[-20px] flex items-center justify-center">
                <img src="assets\admin\icons\upload.png" alt="" width="58px" height="58px">
            </div>
            <x-tombol-universal href="{{ $user->kursus->url }}" class="w-[116px] h-auto mr-5 ml-1"><span class="text-[14px]">Belajar Sekarang</span></x-tombol-universal>
        </div>
        @else
            <li>Anda belum mendaftar ke kursus manapun.</li>
        @endif
    </div>
</x-app-layout>
