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
                <div class="flex max-md:flex-col">
                    <div class="col">
                        <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Mahasiswa</span><a href="{{route('admin.student.create')}}" class="btn btn-outline-dark rounded-pill"><i class="ti ti-plus"></i> Tambah Data</a></p>
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
                            @php
                            $num = 1;
                            @endphp
                            @forelse($students as $student)
                            <tr>
                                <th scope="row">{{$num++}}</th>
                                <td>
                                @isset($student->course->judul)
                                    {{$student->course->judul}}
                                @endisset
                                </td>
                                <td>
                                @isset($student->assistant->name)
                                    {{$student->assistant->name}}
                                @endisset
                                </td>
                                <td>{{$student->kode}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>
                                    <a href="{{route('admin.student.edit', $student->id)}}">Edit</a>
                                    <form method="POST" action="{{ route('admin.student.destroy', $student->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
    </div>
</x-admin>
