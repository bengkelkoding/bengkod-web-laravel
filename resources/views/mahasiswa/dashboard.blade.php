<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    <div class="box-content flex w-100% p-4 bg-gradient-to-l from-cyan-500 to-blue-500 mt ">
        <div class="box-content h-auto mb-[40px] mx-24 max-md:mx-12">
            <h1 class="text-white font-bold text-[32px] mt-7">Selamat pagi, {{ auth()->user()->name }}!</h1>
            <p class="text-white mt-2 text-[16px]">Jika kamu tidak sanggup menahan lelahnya belajar, Maka bersiaplah menahan perihnya kebodohan.</p>
            <p class="text-white">~ Imam Syafi’i</p>
        </div>
    </div>

    <div class="mx-52 max-md:mx-24 flex flex-col max-md:justify-center max-md:items-center">
        <div class="flex justify-between flex-wrap items-center  max-md:justify-center">
        @if($user->course)
            <div class="box-border p-1 border mt-12 rounded">
                <h3 class="text-black font-bold ml-2 my-2 text-[14px]">Kursus Anda</h3>
                <div class="box-border h-auto shadow-lg flex justify-between items-center max-md:justify-center flex-wrap">
                    <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0">
                        <img src="{{ $user->course->image }}" alt="" width="90px" height="90px" class="rounded">
                        <div class=" h-auto pl-5">
                            <h1 class="text-black font-bold text-[20px]">{{ $user->course->judul }}</h1>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\users-solid.png" alt="" class="inline mr-2">
                                10 Mahasiswa Terdaftar</p>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\calendar-days-solid.png" alt="" class="inline mr-2">
                                {{ $user->course->hari }}</p>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\clock-solid.png" alt="" class="inline mr-2">
                                {{ $user->course->jam }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <x-tombol-universal href="{{env('APP_URL_QUARTO') . $user->kursus->url }}" class="px-6 h-auto mr-6 max-md:mr-0 mb-5">Belajar Sekarang</x-tombol-universal>
                    </div>
                </div>
            </div>

            <div class="border-box w-[150px] h-[141px] border mt-10 flex flex-col justify-center items-center rounded">
                <h3 class="text-black font-bold mb-2 text-[14px]">Nilai Akhir</h3>
                <div class="border-box w-[125px] h-[86px] bg-[#00C1361A] flex justify-center items-center rounded">
                    @forelse($tugasMahasiswa as $tugas)
                        <h1 class="text-[#00C136] text-[40px] font-bold">{{ $tugas->nilai_akhir }}</h1>
                    @empty
                        <h1 class="text-[#c10000] text-[40px] font-bold">-</h1>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="box-border h-auto w-[136px] p-1 border my-12 mb-15 flex flex-col justify-center rounded">
            <h3 class="text-black font-bold mb-2 text-[14px] text-center">Submit Tugas</h3>
            <div class="w-[116px] h-auto border ml-1 p-2 mb-[-20px] flex items-center justify-center" id="upload-icon">
                @if($tugas === null || $tugas->status === 0)
                <img src="assets\admin\icons\upload.png" width="58px" height="58px" onclick="openInputFile()" class="cursor-pointer">
                @else
                <img src="assets\admin\icons\upload.png" width="58px" height="58px">
                @endif
            </div>
            <form action="{{ route('simpan-tugas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file_tugas" id="tugas" onchange="uploadIcon()" class="hidden">

                @isset($tugas)
                <div class="text-black-500 mt-4 ml-1 text-xs break-all">
                    <a id="current_saved" href="{{ url('storage/tugas/' . $tugas->file_tugas) }}">{{ $tugas->file_tugas }}</a>
                </div>
                @endisset

                @if($errors->any())
                    <div class="text-red-500 mt-2 ml-1 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                @if($tugas === null || $tugas->status === 0)
                <button type="submit" class="w-[116px] h-auto mr-5 ml-1 bg-[#114D91] mt-4 py-1 rounded-md text-white flex justify-center items-center text-xl font hover:bg-cyan-500"><span class="text-[14px]">Simpan</span></button>
                @else
                <button class="w-[116px] h-auto mr-5 ml-1 bg-gray-500 mt-4 py-1 rounded-md text-white flex justify-center items-center text-xl font cursor-not-allowed" disabled><span class="text-[14px]">Simpan</span></button>
                @endempty
            </form>

            @isset($tugas)
            <form action="{{ route('submit-tugas') }}" method="POST">
                @csrf
                <input type="hidden" name="check_value" value="{{ $tugas === null ? '0' : '1' }}">
                <button type="submit" class="w-[116px] h-auto mr-5 ml-1 bg-gray-500 mt-2 py-1 rounded-md text-white flex justify-center items-center text-xl font {{ $tugas->status === 1 ? 'cursor-not-allowed' : 'hover:bg-cyan-500' }}" {{ $tugas->status === 1 ? 'disabled' : '' }}><span class="text-[14px]">Submit</span></button>
            </form>
            @endisset
        </div>
        @else
            <li>Anda belum mendaftar ke kursus manapun.</li>
        @endif
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
