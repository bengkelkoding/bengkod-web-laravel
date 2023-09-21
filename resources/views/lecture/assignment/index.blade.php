<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Dosen') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="flex">
                                <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Penugasan </span></p>
                                <a href="{{route('lecture.assignment.create')}}"
                                    class="btn btn-outline-dark rounded-pill flex-none w-30 h-10"><i class="ti ti-plus"></i>Tambah Data</a>
                            </div>
                        </div>
                        <div class="col">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="ti ti-certificate"></i>
                                    </div>
                                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search" name="search">
                                </div>
                                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Waktu Mulai</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">File Soal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $num = 1 ; @endphp
                            @forelse ($assignments as $assign)
                            @php
                                $mulai = \Carbon\Carbon::parse($assign->waktu_mulai)->locale('id');
                                $deadline = \Carbon\Carbon::parse($assign->deadline)->locale('id');
                            @endphp
                            <tr>
                               <td>{{ $num }}</td>
                               <td>{{ $assign->judul }}</td>
                               <td>{{ Str::limit($assign->deskripsi, 15, '...') }}</td>
                               <td>{{ $mulai->settings(['formatFunction' => 'translatedFormat'])->format('l, d F Y, h:m') }}</td>
                               <td>{{ $deadline->settings(['formatFunction' => 'translatedFormat'])->format('l, d F Y, h:m') }}</td>
                               <td>
                                    @empty($assign->file_soal)
                                    <span class="badge bg-danger">Belum ada file</span>
                                    @else
                                    <a href="{{ asset('storage/soal/'.$assign->file_soal) }}" class="btn btn-outline-dark rounded-pill"><i class="ti ti-download"></i> Download</a>
                                    @endif
                               </td>
                               <td>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="ti ti-eye"></i>Detail</a> </li>
                                            <li><a class="dropdown-item" href="{{ route('lecture.assignment.edit', $assign->id) }}"><i class="ti ti-edit"></i> Edit</a></li>
                                            <form action="{{ route('lecture.assignment.destroy', $assign->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <li><button type="submit" class="dropdown-item"><i class="ti ti-trash"></i> Hapus</button></li>
                                            </form>
                                        </ul>
                                    </div>
                               </td>
                            </tr>
                            @php
                                $num++;
                            @endphp
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $assignments->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin>
