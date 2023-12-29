<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Dosen') }}
        </h2>
    </x-slot>


    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
                <p class="fw-semibold mb-4"><span class="card-title mr-4">Daftar Kelas yang di kelola</span></p>

                <div class="table-responsive">
                    <table class="table table-striped max-md:min-w-[250vw] text-center">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Kursus</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Kuota</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            @forelse($classroom as $key => $class)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$class->name}}</td>
                                <td>{{$class->course->title}}</td>
                                <td>{{$class->description}}</td>
                                <td>{{$class->day}}</td>
                                <td>{{$class->time}}</td>
                                <td>{{$class->quota}}</td>
                                <td>
                                    <div class="flex text-center">
                                        <span class="text-xs font-semibold py-1 px-2 rounded text-yello-600 bg-blue-200 uppercase last:mr-0 mr-2">
                                            <a href="{{ url('lecture/classroom/' . $class->id . '/student') }}"><i class="ti ti-user"></i> Siswa</a>
                                        </span>
                                        <span class="text-xs font-semibold py-1 px-2 rounded text-yello-600 bg-orange-200 uppercase last:mr-0 mr-2">
                                            <a href="{{ url('lecture/classroom/' . $class->id . '/assignment') }}"><i class="ti ti-pencil"></i> Penugasan</a>
                                        </span>
                                        <span class="text-xs font-semibold py-1 px-2 rounded text-yello-600 bg-purple-200 uppercase last:mr-0 mr-2">
                                            <a href="{{ url('lecture/classroom/' . $class->id . '/class-information') }}"><i class="ti ti-link"></i> Informasi</a>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Kosong</td>
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
