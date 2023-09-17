<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    <div class="box-content flex w-100% p-4 bg-gradient-to-l from-cyan-500 to-blue-500 mt ">
        <div class="box-content h-auto mb-[40px] mx-24 max-md:mx-12">
            <h1 class="text-white font-bold text-[32px] mt-7">Selamat pagi, {{ auth()->user()->name }}!</h1>
            <p class="text-white mt-2 text-[16px]">Jika kamu tidak sanggup menahan lelahnya belajar, <br>Maka bersiaplah menahan perihnya kebodohan.</p>
            <p class="text-white">~ Imam Syafi’i</p>
        </div>
    </div>

    <div class="mx-52 max-md:mx-24 flex flex-col max-lg:justify-center max-lg:items-center">
        <div class="flex justify-between flex-wrap items-center max-lg:justify-center">
        @if(!$user->course)
            <div class="box-border p-1 border mt-12 rounded-md">
                <h3 class="text-black font-bold ml-4 my-2 text-[14px] max-md:w-full max-md:text-center max-md:ml-0">Kursus Anda</h3>
                <div class="box-border h-auto shadow-lg flex justify-between items-center max-lg:justify-center flex-wrap m-3 rounded-md">
                    <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0 max-md:p-0">
                        <img src="{{ asset($user->course->image) }}" alt="" width="90px" height="90px" class="rounded max-md:my-3">
                        <div class="h-auto pl-5 max-md:pl-2">
                            <h1 class="text-black font-bold text-[20px] max-md:my-2">{{ $user->course->judul }}</h1>
                            <p class="text-[#828282] text-[12p2x]">
                                <img src="assets\admin\icons\users-solid.png" alt="" class="inline mr-2">
                                {{ $member_count }} Mahasiswa Terdaftar</p>
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
                        <x-tombol-universal href="{{ env('APP_URL_QUARTO').$user->course->url }}" class="px-6 h-auto mr-6 max-md:mr-0 mb-5 max-md:mb-0 ">Belajar Sekarang</x-tombol-universal>
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

        <div class="box-border h-auto p-3 border my-12 mb-15 flex flex-col justify-center rounded">
            <h3 class="text-black font-bold mb-2 text-[14px] text-center">Submit Tugas</h3>
            @if($tugas === null || $tugas->status === 0)
            <div class="h-[30vh] border ml-1 p-2 mb-[-20px] flex items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md cursor-pointer" id="upload-icon" onclick="openInputFile()">
                <img src="{{ asset('assets/admin/icons/upload.png') }}" width="58px" height="58px" onclick="openInputFile()" class="cursor-pointer">
            @else
            <div class="h-[30vh] border ml-1 p-2 mb-[-20px] flex items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md">
                <img src="{{ asset('assets/admin/icons/upload.png') }}" width="58px" height="58px">
            @endif
            </div>
            <form action="{{ route('simpan-tugas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file_tugas" id="tugas" onchange="uploadIcon()" class="hidden">

                @isset($tugas)
                <div class="text-black-500 mt-4 ml-1 text-xs break-all">
                    <a id="current_saved" href="{{ url('storage/tugas/' . $tugas->file_tugas) }}" class="">{{ $tugas->file_tugas }}</a>
                </div>
                @endisset

                @if($errors->any())
                    <div class="text-red-500 mt-2 ml-1 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="w-100% h-auto flex justify-center items-center">
                    @if($tugas === null || $tugas->status === 0)
                    <button type="submit" class="w-[116px] h-auto mt-5 bg-[#114D91] py-1 rounded-md text-white flex justify-center items-center text-xl font hover:bg-cyan-500"><span class="text-[14px]">Simpan</span></button>
                    @else
                    <button class="w-[116px] h-auto mt-5 bg-gray-500 py-1 rounded-md text-white flex justify-center items-center text-xl font cursor-not-allowed" disabled><span class="text-[14px]">Simpan</span></button>
                    @endempty
                </div>
            </form>

            @isset($tugas)
            <form action="{{ route('submit-tugas') }}" method="POST" >
                @csrf
                <input type="hidden" name="check_value" value="{{ $tugas === null ? '0' : '1' }}">
                <div class=" w-100% h-auto flex justify-center items-center mb-3">
                    <button type="submit" class="w-[116px] h-auto bg-gray-500 mt-2 py-1 rounded-md text-white flex justify-center items-center text-xl font {{ $tugas->status === 1 ? 'cursor-not-allowed' : 'hover:bg-cyan-500' }}" {{ $tugas->status === 1 ? 'disabled' : '' }}><span class="text-[14px]">Submit</span></button>
                </div>
            </form>
            @endisset
        </div>
        @else
        <div class="h-screen w-full p-4 border-4 m-3 flex justify-center items-center flex-col bg-gray-300/50">
            <h1 class="text-black font-bold text-[40px] mb-2">Anda belum mendaftar ke kursus manapun.</h1>
            <button class="text-black font-bold text-[20px] w-[100px] h-[30px] bg-[#114D91] rounded hover:bg-cyan-500" ><a href="{{url('/#kursus') }}" class="text-[14px] text-white">Pilih Kursus</a></button>
        </div>
        @endif
    </div>

    <script>
        const dropArea = document.getElementById('upload-icon');
        const fileContainer = document.getElementById('tugas');

        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('bg-green-400');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('bg-green-400');
        });

        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('bg-green-400');

            fileContainer.files = e.dataTransfer.files;
            // currSaved.removeAttribute('href');
            // currSaved.innerHTML = input.files[0].name;
            uploadIcon()
        });

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
                currentSaved.setAttribute('class', 'text-black-500 mt-4 ml-1 text-xs');
                icon.after(currentSaved);
            }

            if (input.value !== '') {
                currentSaved.removeAttribute('href');
                currentSaved.innerHTML = input.files[0].name;
            } else {
                icon.innerHTML = '<img src="{{ asset('assets/admin/icons/upload.png') }}" width="58px" height="58px" onclick="openInputFile()" class="cursor-pointer">';
                currentSaved.innerHTML = '';
            }
        }
    </script>
</x-app-layout>
