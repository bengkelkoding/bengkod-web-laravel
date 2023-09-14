<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>
    <div class="box-content h-[210px] w-100% p-4 bg-gradient-to-l from-cyan-500 to-blue-500 ">
        <div class="box-content w-[441px] h-auto ml-[190px] mb-[40px]">
            <h1 class="text-white font-bold text-[32px] mt-7">Selamat pagi, Arif Saputra!</h1>
            <p class="text-white mt-2 text-[16px] w-[427] text-[16px]">Jika kamu tidak sanggup menahan lelahnya belajar, Maka bersiaplah menahan perihnya kebodohan.</p>
            <p class="text-white">~ Imam Syafi’i</p>
        </div>
    </div>

    <div class="box-border h-40 w-[700px] p-1 border-4 ml-[190px] mt-12">
        <h3 class="text-black font-bold ml-2">Kursus Anda</h3>
        <div class="box-border h-auto w-[662px] shadow-lg ml-2 flex justify-center items-center ">
            <div class="mr-5">
                <img src="assets\admin\backgrounds\web-dev 1.png" alt="" class="">
            </div>
            <div class="mr-20">
                <x-tombol-universal class="w-[180px] h-auto">Belajar Sekarang</x-tombol-universal>
            </div>
            <div>
                <x-tombol-universal class="w-[180px] h-auto">Belajar Sekarang</x-tombol-universal>
            </div>
        </div>
    </div>
</x-app-layout>
