<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Mahasiswa') }}
        </h2>
    </x-slot>

        <div class="py-9 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white relative sm:rounded-lg">
                    <img src="assets\admin\backgrounds\bg_dashboard.png" class="absolute" alt="background_dashboard">
                    <h1 class="text-white absolute text-[32px] font-poppins font-bold top-[30px] left-[61px]">Selamat Datang {{__("Nama Mahasiswa")}}</h1>
                    <p class="text-white absolute text-[24px] font-poppins font-[100px] top-[70px] left-[61px]">Semoga diberi kemudahan belajar</p>
            </div>
        </div>
</x-app-layout>
