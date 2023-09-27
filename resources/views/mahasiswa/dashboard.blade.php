@php
use Carbon\Carbon;

$currentTime = Carbon::now('Asia/Jakarta');
$hour = $currentTime->hour;

if ($hour >= 5 && $hour < 12) {
    $selamat = "Pagi";
} elseif ($hour >= 12 && $hour < 15) {
    $selamat = "Siang";
} elseif ($hour >= 15 && $hour < 18) {
    $selamat = "Sore";
} else {
    $selamat = "Malam";
}
@endphp

<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    {{-- @forelse ($asistant as $as)
            {{$as->name}}
        @empty
            kosong
        @endforelse --}}

        <div class="box-content w-100% p-4 bg-gradient-to-l from-cyan-500 to-blue-500 mb-2">
            <div class="grid lg:grid-cols-12 gap-4 max-lg:flex max-lg:justify-center max-lg:flex-col">
                <div class="col-span-6 max-md:col-span-12 h-auto mb-[40px] max-lg:mb-3 mx-24 max-md:mx-2">
                    <h1 class="text-white font-bold text-[32px] mt-7">Selamat {{ $selamat }}, {{ auth()->user()->name }}!</h1>
                    <p class="text-white mt-2 text-[16px]">Jika kamu tidak sanggup menahan lelahnya belajar, <br>Maka bersiaplah menahan perihnya kebodohan.</p>
                    <p class="text-white">~ Imam Syafi’i</p>
                </div>
                @forelse ($asistant as $as)
                <div class="col-span-6 xs:col-span-6 mx-24 max-md:mx-2 max-md:max-w-[100%] xl:mt-4">
                    <h3 class="text-white font-bold mx-2 my-2 text-md max-md:w-full text-center max-md:ml-0">Kontak Asisten</h3>
                    <div class="box-border p-2 border rounded-md">
                        <div class="overflow-x-auto">
                                <table class="w-full text-xs text-left">
                                    <thead class="text-xs text-gray-50">
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3">
                                                Nama
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                No. Telp
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-gray-100">
                                            <th scope="row" class="px-3 py-3 whitespace-nowrap ">
                                                {{$as->name}}
                                            </th>
                                            <td class="px-3 py-3">
                                                {{$as->phone_number}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                        </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>


    <div class="mx-52 max-md:mx-4 flex flex-col max-lg:justify-center max-lg:items-center mb-5">
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
                    {{-- @dd(empty($tugasMahasiswa[0])) --}}
                    {{-- @forelse($tugasMahasiswa as $tugas)
                        <h1 class="text-[#00C136] text-[40px] font-bold">{{ $tugas->nilai_akhir }}</h1>
                        @empty
                        <h1 class="text-[#c10000] text-[40px] font-bold">-</h1>
                        @endforelse --}}
                    @if (empty($tugasMahasiswa[0]))
                        <h1 class="text-[#c10000] text-[40px] font-bold">-</h1>
                    @else
                        @php
                        $totalNilai = 0;
                        foreach ($tugasMahasiswa as $key => $value) {
                            $totalNilai += $value->nilai_akhir;
                        }
                        $rata_rata = $totalNilai / count($tugasMahasiswa);
                        @endphp
                        <h1 class="text-[#00C136] text-[40px] font-bold">{{ $rata_rata }}</h1>
                    @endif
                </div>
            </div>

        </div>

        {{-- penugasan  --}}
        <div class="box-border h-auto p-3 border mt-12 flex flex-col justify-center rounded max-lg:w-full">
            <p class="text-[25px] font-black mb-2">Penugasan</p>

            <div class="overflow-auto rounded-lg shadow hidden md:block">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">No.</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Details</th>
                            <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                            <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Waktu Dibuka</th>
                            <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Deadline</th>
                            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @php
                            $no = 1;
                        @endphp
                        @forelse($assignments as $as)
                        @php
                            $waktu_mulai = \Carbon\Carbon::parse($as->waktu_mulai)
                                            ->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm');
                            $deadline = \Carbon\Carbon::parse($as->deadline)
                                            ->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm');
                        @endphp
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                {{ $no }}
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="{{ route('detail-tugas', $as->id) }}" class="font-bold text-blue-500 hover:underline">{{ $as->judul }}</a>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                @isset($tugas)
                                    @if($tugas->where('id_assignment', $as->id)->first() !== null)
                                        @php
                                            $tugas_mhs = $tugas->where('id_assignment', $as->id)->first();
                                        @endphp
                                        @if($tugas_mhs->file_tugas === null)
                                        <span
                                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">Belum Submit</span>
                                        @elseif($tugas_mhs->status === 0)
                                        <span
                                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">Belum Submit</span>
                                        @elseif($tugas_mhs->status === 1)
                                        <span
                                            class="p-1.5 text-xs font-medium uppercase tracking-wider ttext-green-800 bg-green-200 rounded-lg bg-opacity-50">Submit</span>
                                        @endif
                                    @else
                                    <span
                                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-50">Belum Upload</span>
                                    @endif
                                @else
                                    <span
                                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-50">Belum Upload</span>
                                @endisset
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                {{ $waktu_mulai }}
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                {{ $deadline }}
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                @isset($tugas)
                                    @if($tugas->where('id_assignment', $as->id)->first() !== null)
                                        @if($tugas_mhs->nilai_akhir === null)
                                        Belum dinilai
                                        @else
                                        {{ $tugas_mhs->nilai_akhir }}
                                        @endif
                                    @else
                                    Belum upload
                                    @endif
                                @else
                                Belum upload
                                @endisset
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @empty
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center" colspan="6">Belum ada tugas</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Mobile View --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
                @php
                    $no = 1;
                @endphp
                @forelse($assignments as $as)
                @php
                    $waktu_mulai = \Carbon\Carbon::parse($as->waktu_mulai)->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm');
                    $deadline = \Carbon\Carbon::parse($as->deadline)->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm');
                @endphp

                <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                    <p>{{ $no }}</p>
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="text-gray-500">{{ $waktu_mulai }}</div>
                        <div>
                            @isset($tugas)
                                @php
                                    $tugas_mhs = $tugas->where('id_assignment', $as->id)->first();
                                @endphp
                                @if($tugas_mhs === null)
                                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-50">Belum Upload</span>
                                @elseif($tugas_mhs->file_tugas === null)
                                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">Belum Submit</span>
                                @elseif($tugas_mhs->status === 0)
                                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">Belum Submit</span>
                                @elseif($tugas_mhs->status === 1)
                                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Submit</span>
                                @endif
                            @else
                                <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-50">Belum Upload</span>
                            @endisset
                        </div>
                    </div>
                    <div class="text-sm text-gray-700">
                        <a href="{{ route('detail-tugas', $as->id) }}" class="text-blue-500 font-bold hover:underline">{{ $as->judul }}</a>
                    </div>
                    <div class="text-sm font-medium text-black">
                        @isset($tugas)
                            @if($tugas_mhs === null)
                                Belum Upload
                            @elseif($tugas_mhs->nilai_akhir === null)
                                Belum dinilai
                            @else
                                {{ $tugas_mhs->nilai_akhir }}
                            @endif
                        @else
                            Belum Upload
                        @endisset
                    </div>
                </div>

            @php
                $no++;
            @endphp
        @empty
            <div class="bg-white p-4 rounded-lg shadow text-center">Belum ada tugas</div>
        @endforelse
    </div>
                {{-- <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                    <div class="flex items-center space-x-2 text-sm">
                        <div>1</div>
                        <div class="text-gray-500">10/10/2021</div>
                        <div>
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Submit
                            </span>
                        </div>
                    </div>
                    <div class="text-sm text-gray-700">
                        <a href="#" class="text-blue-500 font-bold hover:underline">Web Development</a>
                    </div>
                    <div class="text-sm font-medium text-black">100</div>
                </div>

                <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                    <div class="flex items-center space-x-2 text-sm">
                        <div>2</div>
                        <div class="text-gray-500">10/10/2021</div>
                        <div>
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-50">Belum Submit
                            </span>
                        </div>
                    </div>
                    <div class="text-sm text-gray-700">
                        <a href="#" class="text-blue-500 font-bold hover:underline">Mobile Development</a>
                    </div>
                    <div class="text-sm font-medium text-black">-</div>
                </div>

                <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                    <div class="flex items-center space-x-2 text-sm">
                        <div>
                            <a href="#" class="text-blue-500 font-bold hover:underline">3</a>
                        </div>
                        <div class="text-gray-500">10/10/2021</div>
                        <div>
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Submit
                            </span>
                        </div>
                    </div>
                    <div class="text-sm text-gray-700">
                        <a href="#" class="text-blue-500 font-bold hover:underline">Game Development</a>
                    </div>
                    <div class="text-sm font-medium text-black">80</div>
                </div>
            </div> --}}
        </div>

        {{-- submit proyek akhir --}}
        {{-- <div class="box-border h-auto p-3 border my-12 mb-15 flex flex-col justify-center rounded">
            <h3 class="text-black font-bold mb-2 text-[14px] text-center">Submit Projek Akhir</h3>
            @if($tugas === null || $tugas->status === 0)
            <div class="h-[30vh] border ml-1 p-2 mb-[-20px] flex flex-col items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md cursor-pointer" id="upload-icon" onclick="openInputFile()">
                <img src="{{ asset('assets/admin/icons/drag_drop.png') }}" width="58px" height="58px" class="cursor-pointer invert">
                <h4 class="mx-5 mt-4 text-center">Seret File atau Klik Disini Untuk Upload File <br> Maksimal 10MB</h4>
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

        </div> --}}
        @else
        <div class="max-w-screen-md mx-auto sm:px-6 px-3 lg:px-8 w-full lg:w-[600px] h-[400px] rounded border-2 bg-gray-300/50 my-5 flex justify-center items-center flex-col">
            <h1 class="text-black font-bold text-[24px] mb-3">Anda belum mendaftar ke kursus manapun.</h1>
            <button class="text-black font-bold text-[20px] w-[130px] h-[40px] bg-[#114D91] rounded hover:bg-cyan-500" ><a href="{{url('/#kursus') }}" class="text-[16px] text-white">Pilih Kursus</a></button>
        </div>
        @endif
    </div>
</x-app-layout>


        {{-- @forelse ($asistant as $as)
            {{$as->name}}
        @empty
            kosong
        @endforelse --}}
