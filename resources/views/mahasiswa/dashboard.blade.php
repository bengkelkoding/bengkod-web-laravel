<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- <div>
                        <img src="/assets/admin/images/backgrounds/image5.png" alt="">
                    </div> -->
                    <div class="box-border h-[296px] w-full p-4 bg-gradient-to-r from-blue-500 to-indigo-500  ">
                        <h1 class="text-white text-[32px] font-poppins font-bold pt-[43px] pl-[61px]">Selamat Datang {{__("Nama Mahasiswa")}}</h1>
                        <p class="text-white text-[24px] font-poppins font-[100] pl-[61px]">Semoga diberi kemudahan belajar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
