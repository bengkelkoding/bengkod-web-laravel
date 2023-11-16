<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    <div class="box-content w-100% p-4 bg-gradient-to-l from-cyan-500 to-blue-500 mb-2">
        <div class="grid lg:grid-cols-12 gap-4 max-lg:flex max-lg:justify-center max-lg:flex-col">
            <div class="col-span-6 max-md:col-span-12 h-auto mb-[40px] max-lg:mb-3 mx-24 max-md:mx-2">
                <h1 class="text-white font-bold text-[32px] mt-7">Selamat pagi, Muhammad Roynaldi!</h1>
                <p class="text-white mt-2 text-[16px]">Jika kamu tidak sanggup menahan lelahnya belajar, <br>Maka bersiaplah menahan perihnya kebodohan.</p>
                <p class="text-white">~ Imam Syafi’i</p>
            </div>
        </div>
    </div>


    <div class="mx-52 max-md:mx-0 max-md:block flex flex-col max-lg:justify-center max-lg:items-center  max-md:overflow-x-scroll">
        <div class="flex justify-between flex-wrap items-center max-lg:justify-center">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <a href="" class="text-[17px] font-medium transition ease-in-out duration-150 hover:text-gray-700">< Kembali</a>
                            <div class="flex max-md:flex-col justify-between w-full">
                                <div class="mb-3">
                                    <p class="fw-semibold mb-2">
                                        <span class="card-title mr-4">
                                            Tabel Absensi Mahasiswa
                                        </span>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <form class="flex items-center">
                                        <label for="simple-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <i class="ti ti-certificate"></i>
                                            </div>
                                            <input type="text" id="simple-search"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                                placeholder="Search" required>
                                        </div>
                                        <button type="submit"
                                            class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                            <span class="sr-only">Search</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table max-w-[100vw]" >
                                    <thead>
                                        <tr>
                                            <th scope="col">Sesi</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Akses Status</th>
                                            <th scope="col">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roomLogs as $roomLog)
                                        <tr class="">
                                            <td>
                                                @if($roomLog->session == 'A')
                                                    Pagi
                                                @elseif($roomLog->session == 'B')
                                                    Siang
                                                @elseif($roomLog->session == 'C')
                                                    Pagi & Siang
                                                @endif
                                            </td>
                                            <td>
                                                <p class="{{ ($roomLog->status == 'check-in') ? 'bg-green-500' : 'bg-red-500'}} w-[80px] rounded h-auto text-center text-white text-[16px]">
                                                    {{ $roomLog->status }}
                                                </p>
                                            </td>
                                            <td>{{ $roomLog->access_status }}</td>
                                            <td>{{ $roomLog->accessed }}</td>
                                        </tr>
                                    @endforeach

                                        {{-- @php
                                        $no = 1;
                                        @endphp
                                        @forelse ($logs as $log)
                                        @php
                                        $hari = \Carbon\Carbon::parse($log->created_at)->locale('id');
                                        $date = \Carbon\Carbon::parse($log->created_at->format('Y-m-d'));
                                        $now = \Carbon\Carbon::parse(now()->format('Y-m-d'));
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ Str::limit($log->pesan, 15, '...') }}</td>
                                            <td>{{$hari->settings(['formatFunction' => 'translatedFormat'])->format('l')}}</td>
                                            <td>{{$hari->settings(['formatFunction' => 'translatedFormat'])->format('d F Y')}}</td>
                                            <td>{{ $log->status == 0 ? 'Belum diapprove' : 'Sudah diapprove' }} </td>
                                            <td>
                                                @if ($date->diffInDays($now) >= 1)
                                                <button class="btn btn-primary bg-[#5D87FF]" disabled>Tidak dapat edit</button>
                                                @else
                                                <a href="{{ route('logs.edit', $log->id) }}" class="btn btn-primary bg-[#5D87FF]"><i class="ti ti-edit"></i> Edit</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Kosong</td>
                                        </tr>
                                        @endforelse
                                    </tbody> --}}
                                </table>
                            </div>
                            {{-- {{ $logs->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
