<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    <div class="box-border flex flex-col justify-center p-8 m-5 ">
        <a href="{{ url('mahasiswa') }}"
            class="text-xl font-medium px-2 transition ease-in-out duration-150 text-gray-500 hover:text-gray-700">
            < Kembali</a>
                <h3 class="text-black font-bold text-2xl max-md:w-auto max-md:ml-0 mt-7">Detail Penugasan</h3>
                <div class="p-2 mt-7 box-border h-auto w-auto shadow-lg flex flex-col rounded-md overflow-hidden">
                    <h1 class="text-black font-bold text-xl max-md:my-2 mb-4 ">{{ $assignment->judul }}</h1>
                    <p>Deskripsi :</p>
                    <p class="text-justify md-pl-0 mb-2">{{ $assignment->deskripsi }}</p>
                    <table class="">
                        @if (isset($assignment->file_soal))
                            <tr>
                                <td class="">File Soal</td>
                                <td class="pr-3">:</td>
                                <td class="min-w-auto"><a
                                        href="{{ url('storage/soal/' . $assignment->file_soal) }}">{{ $assignment->file_soal }}</a>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td class="">Waktu Dibuka</td>
                            <td class="pr-3">:</td>
                            <td class="min-w-[500px]">
                                {{ \Carbon\Carbon::parse($assignment->waktu_mulai)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, d F Y, H:i') }}
                                ({{ \Carbon\Carbon::parse($assignment->waktu_mulai, 'Asia/Jakarta')->setTimezone('Asia/Jakarta')->locale('id')->settings(['formatFunction' => 'translatedFormat'])->diffForHumans() }})
                            </td>
                        </tr>
                        <tr>
                            <td class="">Waktu Ditutup</td>
                            <td class="pr-3">:</td>
                            <td class="min-w-[500px]">
                                {{ \Carbon\Carbon::parse($assignment->deadline)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, d F Y, H:i') }}
                                ({{ \Carbon\Carbon::parse($assignment->deadline, 'Asia/Jakarta')->setTimezone('Asia/Jakarta')->locale('id')->settings(['formatFunction' => 'translatedFormat'])->diffForHumans() }})
                            </td>
                        </tr>
                    </table>
                    <div class="box-border h-auto p-3 border my-12 mb-15 flex flex-col justify-center rounded">
                        {{-- @dd($assignment->id) --}}
                        <h3 class="text-black font-bold mb-2 text-[14px] text-center">Submit Tugas</h3>
                        @if ($assignment->waktu_mulai < now('Asia/Jakarta') && $assignment->deadline < now('Asia/Jakarta'))
                            <div class="h-[30vh] border p-2 mb-3 flex flex-col items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md">
                                Maaf tugas sudah ditutup!
                            </div>
                        @elseif($assignment->waktu_mulai > now('Asia/Jakarta') && $assignment->deadline > now('Asia/Jakarta'))
                            <div class="h-[30vh] border p-2 mb-3 flex flex-col items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md">
                                Maaf tugas belum dibuka!
                            </div>
                        @elseif($assignment->waktu_mulai < now('Asia/Jakarta') && $assignment->deadline > now('Asia/Jakarta'))
                            @if ($tugas === null || $tugas->status === 0)
                                <div class="h-[30vh] border p-2 mb-3 flex flex-col items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md cursor-pointer"
                                    id="upload-icon" onclick="openInputFile()">
                                    <img src="{{ asset('assets/admin/icons/drag_drop.png') }}" width="58px"
                                        height="58px" class="cursor-pointer invert">
                                    <h4 class="mx-5 mt-4 text-center">Seret File atau Klik Disini Untuk Upload File <br>
                                        Maksimal 10MB</h4>
                                </div>
                            @else
                                <div
                                    class="h-[30vh] border p-2 mb-3 flex flex-col items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md">
                                    <img src="{{ asset('assets/admin/icons/drag_drop.png') }}" width="58px"
                                        height="58px" class="invert">
                                    <h4 class="mx-5 mt-4 text-center">Semoga Mendapatkan Hasil Terbaik!</h4>
                                </div>
                            @endif
                            <form action="{{ route('simpan-tugas', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_assignment" class="hidden"
                                    value="{{ $assignment->id }}">
                                <input type="file" name="file_tugas" id="tugas" onchange="uploadIcon()"
                                    class="hidden">

                                @isset($tugas)
                                    <div class="text-black-500 mt-4 ml-1 text-xs break-all">
                                        <a id="current_saved" href="{{ url('storage/tugas/' . $tugas->file_tugas) }}"
                                            class="">{{ $tugas->file_tugas }}</a>
                                    </div>
                                @endisset

                                @if ($errors->any())
                                    <div class="text-red-500 mt-4 ml-1 text-sm">
                                        {{ $errors->first() }}
                                    </div>
                                @endif
                                <div class="w-100% h-auto flex justify-center items-center">
                                    @if ($tugas === null)
                                        <button type="submit"
                                            class="w-[116px] h-auto mt-5 bg-[#114D91] py-1 rounded-md text-white flex justify-center items-center text-xl font hover:bg-cyan-500"><span
                                                class="text-[14px]">Upload File</span></button>
                                    @elseif($tugas->status === 0)
                                        <button type="submit"
                                            class="w-[116px] h-auto mt-5 bg-[#114D91] py-1 rounded-md text-white flex justify-center items-center text-xl font hover:bg-cyan-500"><span
                                                class="text-[14px]">Update File</span></button>
                                    @else
                                        <button
                                            class="w-[116px] h-auto mt-5 bg-gray-500 py-1 rounded-md text-white flex justify-center items-center text-xl font cursor-not-allowed"
                                            disabled><span class="text-[14px]">File Telah Tersimpan</span></button>
                                    @endif
                                </div>
                            </form>

                            @isset($tugas)
                                <div class=" w-100% h-auto flex justify-center items-center mb-3">
                                    <button id="summit" onclick="yakin()"
                                        class="w-[116px] h-auto bg-gray-500 mt-2 py-1 rounded-md text-white flex justify-center items-center text-xl font {{ $tugas->status === 1 ? 'cursor-not-allowed' : 'hover:bg-cyan-500' }}"
                                        {{ $tugas->status === 1 ? 'disabled' : '' }}><span class="text-[14px]">Submit
                                            File</span></button>
                                </div>
                            @endisset

                            <form action="{{ route('submit-tugas') }}" method="POST">
                                @csrf
                                <input type="hidden" name="check_value" value="{{ $tugas === null ? '0' : '1' }}">
                                <input id="realSubmit" type="submit" class="hidden">
                            </form>
                    </div>
                    @endif
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

            if (currentSaved === null) {
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
                icon.innerHTML =
                    '<img src="{{ asset('assets/admin/icons/drag_drop.png') }}" width="58px" height="58px" class="cursor-pointer invert"><h4>Seret File atau Klik Disini Untuk Upload File</h4>';
                currentSaved.innerHTML = '';
            }
        }
    </script>
</x-app-layout>
