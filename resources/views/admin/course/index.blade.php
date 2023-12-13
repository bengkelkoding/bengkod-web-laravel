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
                <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Kursus</span></p>
                
                <div class="table-responsive">
                    <table class="table table-striped max-md:min-w-[250vw]">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kursus</th>
                            <th scope="col">Author</th>
                            <th scope="col">Lihat Kursus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $key => $course)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->author}}</td>
                                <td><a class="bg-[#114D91] py-1 rounded-md text-white flex justify-center items-center text-[14px] hover:bg-cyan-500 focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ env('APP_URL_QUARTO').$course->url }}" class="px-6 h-auto" target="_blank">Kursus</a></td>
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
