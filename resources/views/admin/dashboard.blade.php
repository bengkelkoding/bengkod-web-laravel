<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-5 ">
        <div class="container   ">

            {{-- 
                1. kelas.
                2. berapa yang diatas rata"
                3. dibawah rata-rata.
                4. rata-rata semester

            --}}
            <!-- component -->
            <div class="flex flex-wrap justify-center mt-6 gap-5 ">

                <!-- Start Card -->
                <div
                    class="bg-blue-600 pt-1 px-2 bg-gradient-to-b from-blue-400 to-blue-500 rounded-xl shadow-lg w-64 h-72">
                    <h1 class="font-bold text-xl text-center">Kelas 🏛️</h1>
                    <div class="flex justify-center">
                        <div
                            class="flex justify-center p-4 items-center bg-blue-400 ring-2 ring-blue-300 rounded-lg shadow-xl w-32 mt-3">

                            <p class="text-5xl text-center">
                                {{ $totalClass }}
                            </p>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-white font-semibold">Kelas</p>
                        <div class="mt-2">
                            <p class="text-gray-200">Terdapat sekelas terdiri dari beberapa topik bahasan.</p>
                        </div>
                        <a href="{{ url('admin/classroom') }}">
                            <button
                                class="group relative mt-2 h-9 w-48 overflow-hidden rounded-2xl bg-green-500 text-lg font-bold text-white">
                                Lihat Kelas
                                <div
                                    class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30">
                                </div>
                            </button>
                        </a>

                    </div>
                </div>
                <!--End Card -->

                <!-- Start Card -->
                <div
                    class="bg-blue-600 pt-1 px-2 bg-gradient-to-b from-yellow-300 to-yellow-400 rounded-xl shadow-lg w-64 h-72">
                    <h1 class="font-bold text-xl text-center">Lulus 😄</h1>
                    <div class=" flex justify-center">
                        <div
                            class="flex justify-center p-4 items-center bg-yellow-300 ring-2 ring-yellow-100 rounded-lg shadow-xl w-32 mt-3">
                            <p class="text-5xl text-center">
                                {{ $passed }}
                            </p>
                        </div>
                    </div>
                    <div class="p-4 text-center text-white font-semibold">
                        <p>Lulus Diatas 70</p>
                        <p>Total Mhs = {{ $studentCount }}</p>
                    </div>
                </div>
                <!--End Card -->

                <!-- Start Card -->
                <div
                    class="bg-blue-600 pt-1 px-2 bg-gradient-to-b from-pink-400 to-pink-500 rounded-xl shadow-lg w-64 h-72">
                    <h1 class="font-bold text-xl text-center">Tidak Lulus 😔</h1>
                    <div class=" flex justify-center">
                        <div
                            class="flex justify-center p-4 items-center bg-pink-300 ring-2 ring-pink-200 rounded-lg shadow-xl w-32 mt-3">
                            <p class="text-5xl text-center">
                                {{ $unPassed }}
                            </p>
                        </div>
                    </div>
                    <div class="p-4 text-center text-white font-semibold">
                        <p>Tidak Lulus, Dibawah 70</p>
                        <p>Total Mhs = {{ $studentCount }}</p>

                    </div>
                </div>
                <!--End Card -->

                <!-- Start Card -->
                <div
                    class="bg-blue-600 pt-1 px-2 bg-gradient-to-b from-indigo-400 to-indigo-500 rounded-xl shadow-lg w-64 h-72">
                    <h1 class="font-bold text-xl text-center">Nilai Rata-Rata 📖</h1>
                    <div class=" flex justify-center">
                        <div
                            class="flex justify-center p-4 items-center bg-indigo-300 ring-2 ring-indigo-200 rounded-lg shadow-xl w-32 mt-3">
                            <p class="text-5xl text-center">
                                {{ $totalAverage }}
                            </p>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-white font-semibold text-center">Nilai Rata-Rata</p>

                    </div>
                </div>
                <!--End Card -->
            </div>
        </div>
    </div>


    </div>


</x-admin>
