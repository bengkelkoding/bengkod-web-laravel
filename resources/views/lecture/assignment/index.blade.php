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
                    <div class="flex">
                        <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Penugasan </span></p>
                        <a href="{{route('lecture.assignment.create')}}"
                            class="btn btn-outline-dark rounded-pill flex-none w-30 h-10"><i class="ti ti-plus"></i>Tambah Data</a>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="flex">
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
                    <div class="alert alert-success alert-dismissible fade show my-5" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
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
                                @forelse ($assignments as $key => $assign)
                                @php
                                    $start = \Carbon\Carbon::parse($assign->start_time)->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm');
                                    $deadline = \Carbon\Carbon::parse($assign->deadline)->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm');
                                @endphp
                                <tr class="clickable cursor-pointer" data-href="{{ route('lecture.assignment.show', $assign->id) }}">
                                   <th scope="row">{{ $assignments->firstItem() + $key}}</th>
                                   <td>{{ $assign->title }}</td>
                                   <td>{{ Str::limit($assign->description, 15, '...') }}</td>
                                   <td>{{ $start }}</td>
                                   <td>{{ $deadline }}</td>
                                   <td>
                                        @empty($assign->task_file)
                                        <span class="badge bg-danger">Belum ada file</span>
                                        @else
                                        <a href="{{ asset('storage/task/'.$assign->task_file) }}" class="btn btn-outline-dark rounded-pill"><i class="ti ti-download"></i> Download</a>
                                        @endif
                                   </td>
                                   <td>
                                        <!-- <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                            </button> -->
                                            <ul class="flex">
                                                <!-- <li><a class="dropdown-item" href="{{-- route('lecture.assignment.show', $assign->id) --}}"><i class="ti ti-eye"></i>Detail</a> </li> -->
                                                <li class="mr-2">
                                                    <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-yello-600 bg-yellow-200 last:mr-0 mr-1">
                                                        <a class="dropdown-item" href="{{ route('lecture.assignment.edit', $assign->id) }}"><i class="ti ti-edit"></i> Edit</a>
                                                    </span>
                                                </li>
                                                <form action="{{ route('lecture.assignment.destroy', $assign->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <li>
                                                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-rose-600 bg-rose-200 last:mr-0 mr-1">
                                                            <button type="submit" class="dropdown-item uppercase"><i class="ti ti-trash"></i> Hapus</button>
                                                        </span>
                                                    </li>
                                                </form>
                                            </ul>
                                        <!-- </div> -->
                                   </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="7">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $assignments->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get all elements with the class "clickable-row"
        const rows = document.querySelectorAll(".clickable");

        // Add a click event listener to each "clickable-row"
        rows.forEach(function(row) {
            row.addEventListener("click", function() {
            // Get the URL from the "data-href" attribute
            const url = row.getAttribute("data-href");

            // Redirect to the URL when the row is clicked
            window.location.href = url;
            });
        });
    </script>
</x-admin>
