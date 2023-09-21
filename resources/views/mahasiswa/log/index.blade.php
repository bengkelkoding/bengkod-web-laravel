<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    <x-header />

    <div class="mx-52 max-md:mx-24 flex flex-col max-lg:justify-center max-lg:items-center">
        <div class="flex justify-between flex-wrap items-center max-lg:justify-center">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Log Kegiatan
                                            Mahasiswa </span>

                                            @if ($allow_insert == 0)
                                            <button type="button"
                                            class="btn btn-outline-dark rounded-pill" disabled><i class="ti ti-plus"></i>
                                            Tidak dapat input log</button>
                                            @else
                                            <a href="{{route('logs.create')}}"
                                                class="btn btn-outline-dark rounded-pill"><i class="ti ti-plus"></i>
                                                Tambah Data</a>
                                            @endif
                                    </p>

                                </div>
                                <div class="col">

                                    <form class="flex items-center">
                                        <label for="simple-search" class="sr-only">Search</label>
                                        <div class="relative w-full">
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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col">Hari</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
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
                                </tbody>
                            </table>
                            {{ $logs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
