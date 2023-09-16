
<x-universal-layout>
            {{-- <div class="box-border p-1 border rounded "> --}}
                {{-- <h3 class="text-black font-bold ml-2 my-2 text-[14px]">Kursus Anda</h3> --}}
                <div class="box-border h-40  shadow-lg flex justify-center items-center max-md:justify-center flex-wrap">
                    <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0  mt-3">
                        <img src="{{ asset($kursus->image) }}" alt="" width="90px" height="90px" class="rounded">
                        <div class=" h-auto pl-5">
                            <h1 class="text-black font-bold text-[20px]">{{ $kursus->judul }}</h1>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\users-solid.png" alt="" class="inline mr-2">
                                {{-- $member_count --}} Mahasiswa Terdaftar</p>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\calendar-days-solid.png" alt="" class="inline mr-2">
                                {{ $kursus->hari }}
                            </p>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\clock-solid.png" alt="" class="inline mr-2">
                                {{ $kursus->jam }}
                            </p>
                        </div>
                    </div>
                    <div>
                        @auth
                            <x-tombol-universal href="{{ url($kursus->url) }}" class="px-6 h-auto mr-6 max-md:mr-0 mb-5">Belajar Sekarang</x-tombol-universal>
                        @else
                            <x-tombol-universal href="{{ url('login') }}" class="px-6 h-auto mr-6 max-md:mr-0 mb-5">Daftar Kursus</x-tombol-universal>
                        @endauth
                    </div>
                </div>

                <div class="h-auto w-[80vw] p-4 flex mx-auto">
                    <div class="justify-start w-[70%] mr-3">
                        <h1 class="text-[32px] font-bold text-center mb-2 ml-2">Deskripsi</h1>
                        <p class="text-[14px] text-justify ml-2">{{ $kursus->description }}</p>
                    </div>

                    <div class="box-border ml-3 w-[30%]">
                        <h1 class="text-[32px] font-bold text-center mb-2 ml-2">Tools</h1>
                        <ol class="list-disc ml-5">
                            <li >VS Code</li>
                            <li >Browser</li>
                            <li >Web Server</li>
                          </ol>
                    </div>
                </div>
            {{-- </div> --}}
</x-universal-layout>