<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    <div class="mx-48 max-md:mx-4 flex flex-col max-lg:justify-center max-lg:items-center border rounded-md p-10 my-5 bg-yellow-300">
        <a href="{{ url('mahasiswa') }}" class="max-md:ml-2 text-xl font-medium px-2 transition ease-in-out duration-150 text-gray-500 hover:text-gray-700">< Kembali</a>
        <h3 class="text-black font-bold text-2xl max-md:w-full max-md:text-center max-md:ml-0 mt-7 bg-green-300">Detail Penugasan</h3>
        <div class="mt-7 h-auto shadow-lg flex flex-col items-center justify-center rounded-md bg-red-300">
            <div class="p-9 max-md:mr-0 max-md:p-0 h-auto pl-5 max-md:pl-2 bg-blue-300">
                <h1 class="text-black font-bold text-xl max-md:my-2 mb-4 max-md:text-center">{{ $assignment->judul }}</h1>
                <div class="mb-4 bg-yellow-300 max-md:w-auto">
                    <p class="pr-5">Deskripsi :</p>
                    <p class="max-w-[500px] ml-5 text-justify">{{ $assignment->deskripsi }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, impedit? Alias, blanditiis accusamus ea expedita cumque inventore illo quidem, culpa dicta officiis ipsa quasi neque atque error reiciendis nostrum excepturi. Autem dicta porro neque libero molestiae. Ipsa, aut asperiores! Alias provident qui non consequuntur, corrupti fugit error quo, quibusdam porro ipsam sunt. Exercitationem quam est earum accusamus. Itaque maiores molestiae ipsam consequuntur alias doloribus repellat soluta velit facere voluptatum ex maxime, accusantium expedita amet pariatur exercitationem, odit laborum asperiores! Pariatur, nobis. Voluptatum quidem eum et illum quo, sequi tempora ex eaque dolor, harum sapiente esse, incidunt ipsa maiores fugit beatae!</p>
                </div>
                <table class="">
                    @if (isset($assignment->file_soal))
                    <tr>
                        <td class="pr-5">File</td>
                        <td class="pr-3">:</td>
                        <td class="min-w-[500px]"><a href="{{ url('storage/soal/' . $assignment->file_soal) }}">{{ $assignment->file_soal }}</a></td>
                    </tr>
                    @endif
                    <tr>
                        <td class="pr-5">Waktu Mulai</td>
                        <td class="pr-3">:</td>
                        <td class="min-w-[500px]">{{ $assignment->waktu_mulai }}</td>
                    </tr>
                    <tr>
                        <td class="pr-5">Waktu Selesai</td>
                        <td class="pr-3">:</td>
                        <td class="min-w-[500px]">{{ $assignment->deadline }}</td>
                    </tr>
                </table>
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
            
        </div>
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