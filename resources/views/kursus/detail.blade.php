<x-universal-layout>
    <div
        class="border-box  flex max-xl:flex-col p-5 items-center gap-10 justify-evenly mx-12 max-xl:mx-0 bg-blue-50 rounded-3xl h-[400px] max-md:h-auto my-10">
        <div class="flex mb-5 max-md:flex-col">
            <img src="{{ asset($kursus->image) }}" alt="" class="rounded-2xl mr-5 max-md:mr-0">
            <div class="">
                <div class="flex mt-2 mb-7">
                    <h2 class="text-2xl mr-3 font-semibold text-[32px]">{{ $kursus->judul }}</h2>
                    <div class="border-box flex bg-[#EDFCB2] gap-3 p-3 rounded-xl max-md:flex-col max-md:items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                        <p>{{ $kursus->users_count }}</p>
                    </div>
                </div>
                <div class="flex flex-row my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <p class="ml-2">{{ $kursus->hari }}</p>
                </div>
                <div class="flex flex-row mt-2 mb-7 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <p class="ml-2">{{ $kursus->jam }}</p>
                </div>
                <div class="deskripsi text-justify">
                    {{ $kursus->description }}
                </div>
            </div>

        </div>

        <div
            class="box-border w-[50vw] h-[12rem] max-md:h-24 p-5 bg-white flex flex-col max-xl:flex-row  items-center justify-center rounded-2xl">

            @auth
                <!-- <p>{{}}</p> -->
                @if (!is_null(auth()->user()->id_kursus) || auth()->user()->name == 'admin')
                    @if (auth()->user()->id_kursus == $kursus->id || auth()->user()->name == 'admin')
                        <x-tombol-universal href="{{ env('APP_URL_QUARTO') . $kursus->url }}"
                            class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full">Belajar
                            Sekarang</x-tombol-universal>
                    @else
                        <div class="alert alert-warning my-5 ml-3 max-md:ml-0 bg-[#ff0000] p-2 rounded-md bg-opacity-50">
                            Anda sudah terdaftar pada kursus lain!
                        </div>
                    @endif
                @else
                    <form action="{{ route('update.kursus') }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin mendaftar ke kursus ini?')">
                        @csrf
                        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                        <x-tombol-universal type="submit"
                            class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full">Daftar
                            Kursus</x-tombol-universal>
                        <x-tombol-universal href="{{ env('APP_URL_O_QUARTO') . $kursus->url_overview }}"
                            class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full">Overview
                            Kursus</x-tombol-universal>
                    </form>
                @endif
            @else
                <x-tombol-universal href="{{ url('login') }}"
                    class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full">Daftar
                    Kursus</x-tombol-universal>
                <x-tombol-universal href="{{ env('APP_URL_O_QUARTO') . $kursus->url_overview }}"
                    class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full">Overview
                    Kursus</x-tombol-universal>
            @endauth
        </div>
    </div>
    </div>
    {{-- <div class="pb-3 box-border w-full flex justify-center items-center max-md:justify-center flex-wrap">
        <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0 my-10">
            <img src="{{ asset($kursus->image) }}" alt="Gambar Kursus" width="200px" height="200px" class="rounded">
            <div class=" h-auto ml-[40px] max-md:ml-0">
                <h1 class="text-black font-semibold text-[40px] max-md:text-left">{{ $kursus->judul }}</h1>
                <p class="text-[#828282] text-[14px]">
                    <img src="{{ asset('assets\admin\icons\users-solid.png') }}" alt="" class="inline mr-2">
                    {{ $kursus->users_count }} Mahasiswa Terdaftar
                </p>
                <p class="text-[#828282] text-[14px]">
                    <img src="{{ asset('assets\admin\icons\calendar-days-solid.png') }}" alt=""
                        class="inline mr-2">
                    {{ $kursus->hari }}
                </p>
                <p class="text-[#828282] text-[14px]">
                    <img src="{{ asset('assets\admin\icons\clock-solid.png') }}" alt="" class="inline mr-2">
                    {{ $kursus->jam }}
                </p>
                <div>
                    @auth
                        <!-- <p>{{}}</p> -->
                        @if (!is_null(auth()->user()->id_kursus) || auth()->user()->name == 'admin')
                            @if (auth()->user()->id_kursus == $kursus->id || auth()->user()->name == 'admin')
                                <x-tombol-universal href="{{ env('APP_URL_QUARTO') . $kursus->url }}"
                                    class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full">Belajar Sekarang</x-tombol-universal>
                            @else
                                <div
                                    class="alert alert-warning my-5 ml-3 max-md:ml-0 bg-[#ff0000] p-2 rounded-md bg-opacity-50">
                                    Anda sudah terdaftar pada kursus lain!
                                </div>
                            @endif
                        @else
                            <form action="{{ route('update.kursus') }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin mendaftar ke kursus ini?')">
                                @csrf
                                <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                                <x-tombol-universal type="submit" class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full">Daftar
                                    Kursus</x-tombol-universal>
                                <x-tombol-universal href="{{ env('APP_URL_O_QUARTO') . $kursus->url_overview }}"
                                    class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full">Overview Kursus</x-tombol-universal>
                            </form>
                        @endif
                    @else
                        <x-tombol-universal href="{{ url('login') }}" class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full">Daftar
                            Kursus</x-tombol-universal>
                        <x-tombol-universal href="{{ env('APP_URL_O_QUARTO') . $kursus->url_overview }}"
                            class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full">Overview Kursus</x-tombol-universal>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="w-screen px-4 flex justify-center mx-auto border-y max-md:flex-col">
        <div class="justify-start w-[50%] pb-10 pt-4 px-8 border-r max-md:border-none max-md:w-full">
            <h1 class="text-[28px] font-medium text-center mb-2 ml-2 mt-3">Deskripsi</h1>
            <p class="text-[14px] text-justify ml-2">{{ $kursus->description }}</p>
        </div>

        <div class="box-border ml-3 w-[30%] pb-10 pt-4 px-8 max-md:w-full max-md:ml-0">
            <h1 class="text-[28px] font-medium text-center mb-2 ml-2 mt-3">Bab Yang Akan Dipelajari</h1>
            <ol class="list-disc ml-8">
                @foreach ($tools as $tool)
                    <li>{{ $tool }}</li>
                @endforeach
            </ol>
        </div>
    </div> --}}
</x-universal-layout>
