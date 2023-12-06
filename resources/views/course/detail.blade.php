<x-universal-layout>
    <div class="container mx-auto border-box flex max-xl:flex-col items-center bg-blue-50 rounded-3xl h-[400px] my-10">
        <div class="flex items-center gap-10 mx-auto">
            <img src="{{ asset($course->image) }}" alt="Gambar Kursus" width="200px" height="200px"
                class="rounded-lg">
            <div class="">
                <h1 class="text-black font-semibold text-3xl mb-2">{{ $course->title }}</h1>
                <p class="text-[#828282] text-base">
                    <img src="{{ asset('assets\admin\icons\users-solid.png') }}" alt="" class="inline mr-2 ">
                    {{ $course->users_count }} Mahasiswa Terdaftar
                </p>
                <p class="text-[#828282] text-base">
                    <img src="{{ asset('assets\admin\icons\calendar-days-solid.png') }}" alt=""
                        class="inline mr-2">
                    {{ $course->day }}
                </p>
                <p class="text-[#828282] text-base mb-6">
                    <img src="{{ asset('assets\admin\icons\clock-solid.png') }}" alt="" class="inline mr-2">
                    {{ $course->hour }}
                </p>
                @auth
                    <!-- <p>{{}}</p> -->
                    @if (!is_null(auth()->user()->id_course) || auth()->user()->name == 'admin')
                        @if (auth()->user()->id_course == $course->id || auth()->user()->name == 'admin')
                            <x-tombol-universal href="{{ env('APP_URL_QUARTO') . $course->url }}"
                                class="text-white font-semibold py-2 px-10 rounded-md mb-5 w-full ">Belajar Sekarang</x-tombol-universal>
                        @else
                            <div
                                class="alert alert-warning my-5 max-md:ml-0 bg-[#ff0000] p-2 rounded-md bg-opacity-50">
                                Anda sudah terdaftar pada kursus lain!
                            </div>
                        @endif
                    @else
                        <form action="{{ route('update.kursus') }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin mendaftar ke kursus ini?')">
                            @csrf
                            <input type="hidden" name="kursus_id" value="{{ $course->id }}">
                            <x-tombol-universal type="submit"
                                class="text-white font-semibold py-2 px-10 rounded-md w-full ">Daftar Kursus</x-tombol-universal>
                            <x-tombol-universal href="{{ env('APP_URL_O_QUARTO') . $course->url_overview }}"
                                class="text-white font-semibold py-2 px-10 rounded-md w-full ">Overview Kursus</x-tombol-universal>
                        </form>
                    @endif
                @else
                    <x-tombol-universal href="{{ url('login') }}"
                        class="text-white font-semibold py-2 px-10 rounded-md w-full ">Daftar Kursus</x-tombol-universal>
                    <x-tombol-universal href="{{ env('APP_URL_O_QUARTO') . $course->url_overview }}"
                        class="text-white font-semibold py-2 px-10 rounded-md w-full ">Overview Kursus</x-tombol-universal>
                @endauth
            </div>
        </div>
    </div>
    <div class="container px-10 grid grid-cols-3 mx-auto gap-10 mb-10">
        <div class="">
            <div class="">
                <h1 class="text-xl font-medium text-center mb-3 ml-2 mt-3">Deskripsi</h1>
                <p class="text-base text-justify ml-2">{{ $course->description }}</p>
            </div>
            <div class="mt-10">
                <h1 class="text-xl font-medium text-center mb-3 ml-2 mt-3">Bab Yang Akan Dipelajari</h1>
                <ol class="list-disc text-base">
                    @foreach ($tools as $tool)
                        <li class="bg-blue-50 my-3 rounded-full py-2 px-6 list-none">{{ $tool }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
        <div class="col-span-2">
            <div class="">
                <h1 class="text-xl font-medium text-center mb-3 ml-2 mt-3">Daftar Kelas</h1>
                <div>This is Class</div>
            </div>
        </div>
    </div>
</x-universal-layout>
