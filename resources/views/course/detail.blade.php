<x-universal-layout>
    <div
        class="border-box flex max-xl:flex-col p-5 items-center justify-evenly mx-12 max-xl:mx-0 bg-blue-50 rounded-3xl h-[400px] max-md:h-auto my-10">
        <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0 my-10">
            <img src="{{ asset($course->image) }}" alt="Gambar Kursus" width="200px" height="200px"
                class="rounded-lg sm:mb-2 mr-4">
            <div class="h-auto ml-[40px] max-md:ml-0">
                <h1 class="text-black font-semibold text-[40px] max-md:text-left xs:text-center">{{ $course->title }}
                </h1>
                <p class="text-[#828282] text-[14px] xs:text-center md:text-left">
                    <img src="{{ asset('assets\admin\icons\users-solid.png') }}" alt="" class="inline mr-2 ">
                    {{ $course->users_count }} Mahasiswa Terdaftar
                </p>
                <p class="text-[#828282] text-[14px] xs:text-center md:text-left">
                    <img src="{{ asset('assets\admin\icons\calendar-days-solid.png') }}" alt=""
                        class="inline mr-2">
                    {{ $course->day }}
                </p>
                <p class="text-[#828282] text-[14px] xs:text-center md:text-left">
                    <img src="{{ asset('assets\admin\icons\clock-solid.png') }}" alt="" class="inline mr-2">
                    {{ $course->hour }}
                </p>

            </div>
            {{-- page button --}}
            <div
                class="p-3 lg:ml-5 box-border w-[20rem] h-[12rem] max-md:h-24 xs:mt-4 bg-white flex flex-col max-xl:flex-row  items-center justify-center rounded-2xl">
                @auth
                    <!-- <p>{{}}</p> -->
                    @if (!is_null(auth()->user()->id_course) || auth()->user()->name == 'admin')
                        @if (auth()->user()->id_course == $course->id || auth()->user()->name == 'admin')
                            <x-tombol-universal href="{{ env('APP_URL_QUARTO') . $course->url }}"
                                class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full ">Belajar
                                Sekarang</x-tombol-universal>
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
                            <input type="hidden" name="kursus_id" value="{{ $course->id }}">
                            <x-tombol-universal type="submit"
                                class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full ">Daftar
                                Kursus</x-tombol-universal>
                            <x-tombol-universal href="{{ env('APP_URL_O_QUARTO') . $course->url_overview }}"
                                class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full ">Overview
                                Kursus</x-tombol-universal>
                        </form>
                    @endif
                @else
                    <x-tombol-universal href="{{ url('login') }}"
                        class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full ">Daftar
                        Kursus</x-tombol-universal>
                    <x-tombol-universal href="{{ env('APP_URL_O_QUARTO') . $course->url_overview }}"
                        class="text-white font-semibold py-2 max-xl:mb-0 max-xl:mr-5 px-10 rounded-md mb-5 w-full ">Overview
                        Kursus</x-tombol-universal>
                @endauth
            </div>
        </div>
    </div>

    <div class="w-screen px-4 flex justify-center mx-auto border-y max-md:flex-col">
        <div class="justify-start w-[50%] pb-10 pt-4 px-8 border-r max-md:border-none max-md:w-full">
            <h1 class="text-[28px] font-medium text-center mb-2 ml-2 mt-3">Deskripsi</h1>
            <p class="text-[14px] text-justify ml-2">{{ $course->description }}</p>
        </div>

        <div class="box-border ml-3 w-[30%] pb-10 pt-4 px-8 max-md:w-full max-md:ml-0">
            <h1 class="text-[28px] font-medium text-center mb-2 ml-2 mt-3">Bab Yang Akan Dipelajari</h1>
            <ol class="list-disc ml-8">
                @foreach ($tools as $tool)
                    <li class="bg-blue-50 my-3 rounded-full p-3">{{ $tool }}</li>
                @endforeach
            </ol>
        </div>
    </div>
</x-universal-layout>
