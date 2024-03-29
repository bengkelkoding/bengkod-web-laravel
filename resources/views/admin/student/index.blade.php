<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
                <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Mahasiswa</span><a href="{{route('admin.student.create')}}" class="btn btn-outline-dark rounded-pill"><i class="ti ti-plus"></i> Tambah Data</a></p>
                <div class="flex max-md:flex-col">
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
                <div class="table-responsive">
                    <table class="table table-striped max-md:min-w-[250vw]">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Kursus</th>
                            <th scope="col">Asistensi</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $key => $student)
                            <tr>
                                <th scope="row">{{$students->firstItem() + $key}}</th>
                                <td>
                                    @isset($student->course->title)
                                        {{$student->course->title}}
                                    @endisset

                                    @empty($student->course->title)
                                            <span class="text-xs font-semibold inline-block py-1 px-2 rounded text-rose-600 bg-red-200 uppercase last:mr-0 mr-1">
                                                Belum Terdaftar
                                            </span>
                                    @endempty
                                </td>
                                <td>
                                    @isset($student->assistant->name)
                                        {{$student->assistant->name}}
                                    @endisset

                                    @empty($student->assistant->name)
                                        <span class="text-xs font-semibold inline-block py-1 px-2 rounded text-rose-600 bg-red-200 uppercase last:mr-0 mr-1">
                                                Belum Ada
                                            </span>
                                    @endempty
                                </td>
                                <td>{{$student->code}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>
                                    <div class="flex">
                                        <span class="text-xs font-semibold inline-block py-1 px-2 rounded text-yello-600 bg-yellow-200 uppercase last:mr-0 mr-2">
                                            <a href="{{route('admin.student.edit', $student->id)}}"><i class="ti ti-edit"></i> Edit</a>
                                        </span>
                                        <form method="POST" action="{{ route('admin.student.destroy', $student->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <span class="text-xs font-semibold inline-block py-1 px-2 rounded text-rose-600 bg-rose-200 uppercase last:mr-0 mr-1">
                                                <button class="uppercase" type="submit"><i class="ti ti-trash"></i> Delete</button>
                                            </span>
                                        </form>
                                    </div>
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
                {{ $students->withQueryString()->links() }}
            </div>
          </div>
        </div>
    </div>
</x-admin>
