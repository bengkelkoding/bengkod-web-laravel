<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>
    <div class="box-content h-[210px] w-100% p-4 bg-gradient-to-l from-cyan-500 to-blue-500 mt ">
        <div class="box-content h-auto ml-[190px] mb-[40px]">
            <h1 class="text-white font-bold text-[32px] mt-7">Selamat pagi, {{ auth()->user()->name }}!</h1>
            <p class="text-white mt-2 text-[16px] w-[427px]">Jika kamu tidak sanggup menahan lelahnya belajar, Maka bersiaplah menahan perihnya kebodohan.</p>
            <p class="text-white">~ Imam Syafi’i</p>
        </div>
    </div>

    <div class="flex justify-between items-center">
    @if($user->kursus)
        <div class="box-border h-40 w-[700px] p-1 border ml-[190px] mt-12 rounded">
            <h3 class="text-black font-bold ml-2 mb-2 text-[14px]">Kursus Anda</h3>
            <div class="box-border h-auto w-[662px] shadow-lg ml-2 flex justify-between items-center">
                <div class="mr-5 p-2 flex">
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
                    <x-tombol-universal href="{{ $user->kursus->url }}" class="w-[180px] h-auto mr-5 mb-5"><span class="text-[14px]">Belajar Sekarang</span></x-tombol-universal>
                </div>
            </div>
        </div>
    @else
        <li>Anda belum mendaftar ke kursus manapun.</li>
    @endif

        <div class="border-box w-[150px] h-[141px] border mt-10 mr-[390px] flex flex-col justify-center items-center rounded">
            <h3 class="text-black font-bold mb-2 text-[14px]">Nilai Akhir</h3>
            <div class="border-box w-[125px] h-[86px] bg-[#00C1361A] flex justify-center items-center rounded">
                <h1 class="text-[#00C136] text-[40px] font-bold">100</h1>
            </div>
        </div>
    </div>

    <div class="box-border h-auto w-[136px] p-1 border ml-[190px] mt-12 flex flex-col justify-center rounded">
        <h3 class="text-black font-bold mb-2 text-[14px] text-center">Submit Tugas</h3>
        <div class="w-[116px] h-auto border ml-1 p-2 mb-[-20px] flex items-center justify-center" id="upload-icon">
            @if($tugas === null || $tugas->status === 0)
            <img src="{{ asset('admin/icons/upload.png') }}" width="58px" height="58px" onclick="openInputFile()" class="cursor-pointer">
            @else
            <img src="{{ asset('admin/icons/upload.png') }}" width="58px" height="58px">
            @endif
        </div>
        <form action="{{ route('simpan-tugas') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file_tugas" id="tugas" onchange="uploadIcon()" class="hidden">

            @isset($tugas)
            <div class="text-black-500 mt-2 ml-1 text-xs">
                <a id="current_saved" href="{{ url('storage/tugas/' . $tugas->file_tugas) }}">{{ $tugas->file_tugas }}</a>
            </div>
            @endisset

            @if($tugas === null || $tugas->status === 0)
            <button type="submit" class="w-[116px] h-auto mr-5 ml-1 bg-[#114D91] mt-4 py-1 rounded-md text-white flex justify-center items-center text-xl font hover:bg-cyan-500"><span class="text-[14px]">Simpan</span></button>
            @else
            <button class="w-[116px] h-auto mr-5 ml-1 bg-[#114D91] mt-4 py-1 rounded-md text-white flex justify-center items-center text-xl font cursor-not-allowed" disabled><span class="text-[14px]">Simpan</span></button>
            @endempty
        </form>

        @isset($tugas)
        <form action="{{ route('submit-tugas') }}" method="POST">
            @csrf
            <input type="hidden" name="check_value" value="{{ $tugas === null ? '0' : '1' }}">
            <button type="submit" class="w-[116px] h-auto mr-5 ml-1 bg-[#114D91] mt-2 py-1 rounded-md text-white flex justify-center items-center text-xl font {{ $tugas->status === 1 ? 'cursor-not-allowed' : 'hover:bg-cyan-500' }}" {{ $tugas->status === 1 ? 'disabled' : '' }}><span class="text-[14px]">Submit</span></button>
        </form>
        @endisset
    </div>

    <script>
        function openInputFile() {
            let input = document.getElementById('tugas');
            input.click();
        }

        function uploadIcon() {
            let input = document.getElementById('tugas');
            let icon = document.getElementById('upload-icon');
            let currentSaved = document.getElementById('current_saved');

            if(currentSaved === null) {
                currentSaved = document.createElement('a');
                currentSaved.setAttribute('id', 'current_saved');
                currentSaved.setAttribute('class', 'text-black-500 mt-2 ml-1 text-xs');
                icon.after(currentSaved);
            }

            if (input.value !== '') {
                currentSaved.removeAttribute('href');
                currentSaved.innerHTML = input.files[0].name;
            } else {
                icon.innerHTML = '<img src="{{ asset('admin/icons/upload.png') }}" width="58px" height="58px" onclick="openInputFile()" class="cursor-pointer">';
                currentSaved.innerHTML = '';
            }
        }
    </script>
</x-app-layout>
