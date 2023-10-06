<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Log Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Log</span></p>
                    <div class="flex max-md:flex-col">
                        <div class="col">
                            <form>
                                <div class="flex inline">
                                    <label>
                                        Show
                                        <select class="rounded-md" name="per_page" id="per_page" onchange="this.form.submit()">
                                            <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
                                            <option value="25" {{ request()->per_page == 25 ? 'selected' : '' }}>25</option>
                                            <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
                                            <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>100</option>
                                        </select>
                                        entries
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="ti ti-certificate"></i>
                                    </div>
                                    <input type="text" id="simple-search"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                           placeholder="Search" name="search">
                                </div>
                                <button type="submit"
                                        class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped max-md:min-w-[250vw]">
                            <thead>
                            <tr>
                                <th scope="col">NIM</th>
                                <th scope="col">Mahasiswa</th>
                                <th scope="col">Kursus</th>
                                <th scope="col">Log Pesan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($logs as $key => $log)
                                <tr>
                                    <td>{{ $log->mahasiswa->kode }}</td>
                                    <td>{{ $log->mahasiswa->name }}</td>
                                    <td>{{ $log->kursus->judul }}</td>
                                    <td>{{ $log->pesan }}</td>
                                    <td>{{ $log->created_at }}</td>
                                    <td>
                                        <form action="{{ route('lecture.log.update', $log->id) }}" method="post" onsubmit="return confirm('Yakin untuk verifikasi {{$log->mahasiswa->name}} ?')">
                                            @csrf
                                            @method('PATCH')

                                            <select id="small" name="status" class="mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0">Reset</option>
                                                <option value="1">Verifikasi</option>
                                                <option value="2">Tolak</option>
                                            </select>

                                            <button type="submit"> Save</button>
                                        </form>
                                    </td>
                                    <td>
                                        <span
                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-yello-600 bg-blue-200 uppercase last:mr-0 mr-2" >
                                            @if($log->status == 0)
                                                Belum diverifikasi
                                            @elseif($log->status == 1)
                                                Terverifikasi
                                            @else
                                                Ditolak
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Data Kosong</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
