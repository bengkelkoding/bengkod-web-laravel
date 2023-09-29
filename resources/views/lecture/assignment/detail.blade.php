<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Dosen') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <a href="{{ url('lecture/assignment') }}" class="btn btn-outline-dark rounded-pill mb-4"><i
                class="ti ti-arrow-left"></i>
            Back</a>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Detail Penugasan :
                                {{ $assignment->judul }} </span></p>
                        <div class="col">
                            <form>
                                <div class="flex">
                                    <label>
                                        Show
                                        <select class="rounded-md" name="per_page" id="per_page"
                                            onchange="this.form.submit()">
                                            <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10
                                            </option>
                                            <option value="25" {{ request()->per_page == 25 ? 'selected' : '' }}>25
                                            </option>
                                            <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50
                                            </option>
                                            <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>
                                                100
                                            </option>
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
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover max-md:min-w-[250vw]">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Status</th>
                                    <th>File Tugas</th>
                                    <th>Nilai</th>
                                    <th>Nilai Tersimpan</th>
                                    <th>Tanggal Submit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswa as $key => $m)
                                    <tr>
                                        <td>{{ $mahasiswa->firstItem() + $key }}</td>
                                        <td>{{ $m->kode }}</td>
                                        <td>{{ $m->name }}</td>
                                        <td>
                                            @if (!isset($m->tugas))
                                                {{ __('Belum input tugas') }}
                                            @else
                                                @if ($m->tugas->status === 0)
                                                    {{ __('Tugas belum disubmit') }}
                                                @elseif ($m->tugas->status === 1)
                                                    {{ __('Tugas telah disubmit') }}
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @isset($m->tugas)
                                                @if ($assignment->deadline < now('Asia/Jakarta') && $m->tugas->status === 0)
                                                    <form action="{{ route('lecture.force-submit', $m->tugas->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" class="btn btn-primary bg-blue-400">
                                                            <i class="ti ti-download"></i> Force Submit</button>
                                                    </form>
                                                @elseif ($m->tugas->status === 0)
                                                    <button class="btn btn-primary" disabled><i class="ti ti-download"></i>
                                                        Download</button>
                                                @else
                                                    <a class="btn btn-primary"
                                                        href="{{ url('storage/tugas/' . $m->tugas->file_tugas) }}"><i
                                                            class="ti ti-download"></i> Download</a>
                                                @endif
                                            @else
                                                <div class="alert alert-danger py-2 px-3 mb-0" role="alert">
                                                    {{ __('Belum ada file tugas') }}
                                                </div>
                                            @endisset
                                        </td>
                                        <td>
                                            @isset($m->tugas)
                                                @if ($m->tugas->status === 0)
                                                    <form action="{{ route('lecture.student.update', $m->tugas->id) }}"
                                                        method="POST" class="flex">
                                                        <input type="number" name="nilai" id="nilai"
                                                            class="form-control rounded-md w-20 py-2 px-3 h-9"
                                                            value="{{ (int) $m->tugas->nilai_akhir }}" disabled>
                                                        <button
                                                            class="btn btn-primary focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm text-center mr-2 mb-2 py-2 px-3 ml-1 w-55"
                                                            disabled><i class="ti ti-device-floppy"></i> Simpan</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('lecture.student.update', $m->tugas->id) }}"
                                                        method="POST" class="flex">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="number" name="nilai" id="nilai"
                                                            class="form-control rounded-md w-20 py-2 px-3 h-9"
                                                            value="{{ (int) $m->tugas->nilai_akhir }}">
                                                        <button type="submit"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 py-2 px-3 ml-1 w-55"><i
                                                                class="ti ti-device-floppy"></i> Simpan</button>
                                                    </form>
                                                @endif
                                            @else
                                                @if ($assignment->deadline < now('Asia/Jakarta'))
                                                    <form action="{{ route('lecture.autoZero', $assignment->id) }}"
                                                        method="POST" class="flex">
                                                        @csrf
                                                        <input type="hidden" name="id_mhs" value="{{ $m->id }}">
                                                        <input type="hidden" name="id_kursus"
                                                            value="{{ $assignment->id_kursus }}">
                                                        <input type="hidden" name="nilai_akhir" id="nilai_akhir"
                                                            value="0">
                                                        <button type="submit"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 py-2 px-3 ml-1 w-55"><i
                                                                class="ti ti-device-floppy"></i>Auto 0</button>
                                                    </form>
                                                @else
                                                    <div class="alert alert-danger py-2 px-3 mb-0 w-60" role="alert">
                                                        {{ __('Belum ada tugas') }}
                                                    </div>
                                                @endif
                                            @endisset
                                        </td>
                                        <td>
                                            @isset($m->tugas)
                                                @isset($m->tugas->nilai_akhir)
                                                    {{ $m->tugas->nilai_akhir }}
                                                @else
                                                    {{ __('-') }}
                                                @endisset
                                            @else
                                                {{ __('-') }}
                                            @endisset
                                        </td>
                                        <td>
                                            @isset($m->tugas)
                                                {{ \Carbon\Carbon::parse($m->tugas->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, d F Y, h:i') }}
                                            @else
                                                {{ __('-') }}
                                            @endisset
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $mahasiswa->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin>
