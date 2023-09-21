<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    <x-header />
    
    <div class="mx-52 max-md:mx-24 flex flex-col max-lg:justify-center max-lg:items-center">
        @if($user->course)
        <div class="flex justify-between flex-wrap items-center max-lg:justify-center">
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
                        <x-tombol-universal href="{{ env('APP_URL_QUARTO').$user->course->url }}" target="_blank" class="px-6 h-auto mr-6 max-md:mr-0 mb-5 max-md:mb-0 ">Belajar Sekarang</x-tombol-universal>
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

        <div class="box-border h-auto p-3 border mt-12 flex flex-col justify-center rounded max-lg:w-full">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                <p class="text-[25px] font-black">Penugasan</p>
            </div>
            <ol class="list-decimal my-3 ml-7 text-base">
                <li><a href="#">Ini tugas pertama</a></li>
                <li><a href="#">Ini tugas kedua</a></li>
                <li><a href="#">Ini tugas ketiga</a></li>
                <li><a href="#">Ini tugas keempat</a></li>
                <li><a href="#">Ini tugas kelima</a></li>
            </ol>
        </div>

        <div class="box-border h-auto p-3 border my-12 mb-15 flex flex-col justify-center rounded">
            <h3 class="text-black font-bold mb-2 text-[14px] text-center">Submit Projek Akhir</h3>
            @if($tugas === null || $tugas->status === 0)
            <div class="h-[30vh] border ml-1 p-2 mb-[-20px] flex flex-col items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md cursor-pointer" id="upload-icon" onclick="openInputFile()">
                <img src="{{ asset('assets/admin/icons/drag_drop.png') }}" width="58px" height="58px" class="cursor-pointer invert">
                <h4 class="mx-5 mt-4 text-center">Seret File atau Klik Disini Untuk Upload File</h4>
            </div>
            @else
            <div class="h-[30vh] border ml-1 p-2 mb-[-20px] flex flex-col items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md">
                <img src="{{ asset('assets/admin/icons/drag_drop.png') }}" width="58px" height="58px" class="invert">
                <h4 class="mx-5 mt-4 text-center">Semoga Mendapatkan Hasil Terbaik!</h4>
            </div>
            @endif
            <form action="{{ route('simpan-tugas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file_tugas" id="tugas" onchange="uploadIcon()" class="hidden">

                @isset($tugas)
                <div class="text-black-500 mt-4 ml-1 text-xs break-all">
                    <a id="current_saved" href="{{ url('storage/tugas/' . $tugas->file_tugas) }}" class="">{{ $tugas->file_tugas }}</a>
                </div>
                @endisset

                @if($errors->any())
                    <div class="text-red-500 mt-4 ml-1 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="w-100% h-auto flex justify-center items-center">
                    @if($tugas === null)
                    <button type="submit" class="w-[116px] h-auto mt-5 bg-[#114D91] py-1 rounded-md text-white flex justify-center items-center text-xl font hover:bg-cyan-500"><span class="text-[14px]">Upload File</span></button>
                    @elseif($tugas->status === 0)
                    <button type="submit" class="w-[116px] h-auto mt-5 bg-[#114D91] py-1 rounded-md text-white flex justify-center items-center text-xl font hover:bg-cyan-500"><span class="text-[14px]">Update File</span></button>
                    @else
                    <button class="w-[116px] h-auto mt-5 bg-gray-500 py-1 rounded-md text-white flex justify-center items-center text-xl font cursor-not-allowed" disabled><span class="text-[14px]">File Telah Tersimpan</span></button>
                    @endif
                </div>
            </form>

            @isset($tugas)
            <div class=" w-100% h-auto flex justify-center items-center mb-3">
                <button id="summit" onclick="yakin()" class="w-[116px] h-auto bg-gray-500 mt-2 py-1 rounded-md text-white flex justify-center items-center text-xl font {{ $tugas->status === 1 ? 'cursor-not-allowed' : 'hover:bg-cyan-500' }}" {{ $tugas->status === 1 ? 'disabled' : '' }}><span class="text-[14px]">Submit File</span></button>
            </div>
            @endisset

            <form action="{{ route('submit-tugas') }}" method="POST" >
                @csrf
                <input type="hidden" name="check_value" value="{{ $tugas === null ? '0' : '1' }}">
                <input id="realSubmit" type="submit" class="hidden">
            </form>

        </div>
        @else
        <div class="max-w-screen-md mx-auto sm:px-6 px-3 lg:px-8 w-full lg:w-[600px] h-[400px] rounded border-2 bg-gray-300/50 my-5 flex justify-center items-center flex-col">
            <h1 class="text-black font-bold text-[24px] mb-3">Anda belum mendaftar ke kursus manapun.</h1>
            <button class="text-black font-bold text-[20px] w-[130px] h-[40px] bg-[#114D91] rounded hover:bg-cyan-500" ><a href="{{url('/#kursus') }}" class="text-[16px] text-white">Pilih Kursus</a></button>
        </div>
        @endif
    </div>

    <script>
        function yakin() {
            const tombollSubmit = document.getElementById('realSubmit')
            const yakin = window.confirm("Apakah Kamu Yakin? File Yang Telah Disubmit Tidak Bisa Dibatalkan!");
            if (yakin) {
                tombollSubmit.click()
            } else {
                console.log("gagal")
            }
        }

        const dropArea = document.getElementById('upload-icon');
        const fileContainer = document.getElementById('tugas');
        var buttonSubmit = document.getElementById('summit');

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
                currentSaved.innerHTML = input.files[0].name;
            } else {
                currentSaved.innerHTML = input.files[0].name;
            }

            if (input.value !== '') {
                buttonSubmit.classList.add('hidden')
                currentSaved.removeAttribute('href');
                currentSaved.innerHTML = input.files[0].name;
            } else {
                icon.innerHTML = '<img src="{{ asset('assets/admin/icons/drag_drop.png') }}" width="58px" height="58px" class="cursor-pointer invert"><h4>Seret File atau Klik Disini Untuk Upload File</h4>';
                currentSaved.innerHTML = '';
            }
        }
    </script>
</x-app-layout>
