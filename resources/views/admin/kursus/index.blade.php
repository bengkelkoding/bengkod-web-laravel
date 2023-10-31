<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="mx-5 text-black text-2xl font-medium">
        Kursus Yang Tersedia
    </div>

    <div class="mx-5 flex flex-wrap justify-evenly">
        <div class="box-border p-1 border mt-5 rounded-md ">
            <div class="box-border h-auto shadow-lg flex justify-between items-center max-lg:justify-center flex-wrap m-3 rounded-md pr-3 max-md:pr-0 max-md:pb-3">
                <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0 max-md:p-0">
                    <img src="{{ asset('assets/img/img1.png') }}" alt="" width="90px" height="90px" class="rounded max-md:my-3">
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="h-auto max-md:pl-2">
                        <h1 class="text-black font-bold text-[20px] max-md:my-2">Web Developer</h1>
                    </div>
                    <x-tombol-universal href="{{-- env('APP_URL_QUARTO').$user->course->url --}}" target="_blank" class="px-6 h-auto max-md:mr-0 max-md:mb-0 ">Lihat Kursus</x-tombol-universal>
                </div>
            </div>
        </div>
        <div class="box-border p-1 border mt-5 rounded-md ">
            <div class="box-border h-auto shadow-lg flex justify-between items-center max-lg:justify-center flex-wrap m-3 rounded-md pr-3 max-md:pr-0 max-md:pb-3">
                <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0 max-md:p-0">
                    <img src="{{ asset('assets/img/img2.png') }}" alt="" width="90px" height="90px" class="rounded max-md:my-3">
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="h-auto max-md:pl-2">
                        <h1 class="text-black font-bold text-[20px] max-md:my-2">Mobile Developer</h1>
                    </div>
                    <x-tombol-universal href="{{-- env('APP_URL_QUARTO').$user->course->url --}}" target="_blank" class="px-6 h-auto max-md:mr-0 max-md:mb-0 ">Lihat Kursus</x-tombol-universal>
                </div>
            </div>
        </div>
        <div class="box-border p-1 border mt-5 rounded-md ">
            <div class="box-border h-auto shadow-lg flex justify-between items-center max-lg:justify-center flex-wrap m-3 rounded-md pr-3 max-md:pr-0 max-md:pb-3">
                <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0 max-md:p-0">
                    <img src="{{ asset('assets/img/img3.png') }}" alt="" width="90px" height="90px" class="rounded max-md:my-3">
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="h-auto max-md:pl-2">
                        <h1 class="text-black font-bold text-[20px] max-md:my-2">Data Science</h1>
                    </div>
                    <x-tombol-universal href="{{-- env('APP_URL_QUARTO').$user->course->url --}}" target="_blank" class="px-6 h-auto max-md:mr-0 max-md:mb-0 ">Lihat Kursus</x-tombol-universal>
                </div>
            </div>
        </div>
        <div class="box-border p-1 border mt-5 rounded-md ">
            <div class="box-border h-auto shadow-lg flex justify-between items-center max-lg:justify-center flex-wrap m-3 rounded-md pr-3 max-md:pr-0 max-md:pb-3">
                <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0 max-md:p-0">
                    <img src="{{ asset('assets/img/img4.png') }}" alt="" width="90px" height="90px" class="rounded max-md:my-3">
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="h-auto max-md:pl-2">
                        <h1 class="text-black font-bold text-[20px] max-md:my-2">Game Developer</h1>
                    </div>
                    <x-tombol-universal href="{{-- env('APP_URL_QUARTO').$user->course->url --}}" target="_blank" class="px-6 h-auto max-md:mr-0 max-md:mb-0 ">Lihat Kursus</x-tombol-universal>
                </div>
            </div>
        </div>
        <div class="box-border p-1 border mt-5 rounded-md ">
            <div class="box-border h-auto shadow-lg flex justify-between items-center max-lg:justify-center flex-wrap m-3 rounded-md pr-3 max-md:pr-0 max-md:pb-3">
                <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0 max-md:p-0">
                    <img src="{{ asset('assets/img/img5.png') }}" alt="" width="90px" height="90px" class="rounded max-md:my-3">
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="h-auto max-md:pl-2">
                        <h1 class="text-black font-bold text-[20px] max-md:my-2">Computer Vision</h1>
                    </div>
                    <x-tombol-universal href="{{-- env('APP_URL_QUARTO').$user->course->url --}}" target="_blank" class="px-6 h-auto max-md:mr-0 max-md:mb-0 ">Lihat Kursus</x-tombol-universal>
                </div>
            </div>
        </div>
</x-admin>
