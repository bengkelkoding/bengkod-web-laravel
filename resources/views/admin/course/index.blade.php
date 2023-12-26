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
                <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Kursus</span><a href="{{route('admin.course.create')}}" class="btn btn-outline-dark rounded-pill"><i class="ti ti-plus"></i> Tambah Data</a></p>
                
                <div class="table-responsive">
                    <table class="table table-striped max-md:min-w-[250vw]">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kursus</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $key => $course)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->author}}</td>
                                <td>
                                    <div class="flex">
                                        <span class="text-xs font-semibold inline-block py-1 px-2 rounded text-yello-600 bg-green-200 uppercase last:mr-0 mr-2">
                                            <a href="{{ env('APP_URL_QUARTO').$course->url }}"><i class="ti ti-link"></i> Kursus Full</a>
                                        </span>
                                        <span class="text-xs font-semibold inline-block py-1 px-2 rounded text-yello-600 bg-blue-200 uppercase last:mr-0 mr-2">
                                            <a href="{{ env('APP_URL_O_QUARTO').$course->url_overview }}"><i class="ti ti-link"></i> Overview Kursus</a>
                                        </span>
                                        <span class="text-xs font-semibold inline-block py-1 px-2 rounded text-yello-600 bg-yellow-200 uppercase last:mr-0 mr-2">
                                            <a href="{{route('admin.course.edit', $course->id)}}"><i class="ti ti-edit"></i> Edit</a>
                                        </span>
                                        <form method="POST" action="{{ route('admin.course.destroy', $course->id) }}">
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
            </div>
          </div>
        </div>
    </div>
</x-admin>
