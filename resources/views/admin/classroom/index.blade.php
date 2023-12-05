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
                <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Kelas</span></p>
                
                <div class="table-responsive">
                    <table class="table table-striped max-md:min-w-[250vw]">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Kuota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($classroom as $key => $class)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$class->name}}</td>
                                <td>{{$class->description}}</td>
                                <td>{{$class->day}}</td>
                                <td>{{$class->time}}</td>
                                <td>{{$class->quota}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
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