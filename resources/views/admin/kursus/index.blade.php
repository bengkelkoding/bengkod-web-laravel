<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="fw-semibold mb-4"><span class="card-title mr-4">Tabel Kursus  </span><button type="button" class="btn btn-outline-dark rounded-pill"><i class="ti ti-plus"></i> Tambah Data</button></p>

                </div>
                <div class="col">

                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="ti ti-certificate"></i>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search" required>
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


              <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col" style="width:15%">Thumbnail</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td><img src="https://plus.unsplash.com/premium_photo-1675063044882-522a7d281b2f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2788&q=80" class="rounded mx-auto d-block" alt="..."></td>
                    <td>Junior Web Developer</td>
                    <td>Senin</td>
                    <td>09:00</td>
                    <td>Bengkel Koding</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('admin/kursus/show') }}"><i class="ti ti-eye"></i> Detail</a></li>
                            <li><a class="dropdown-item" href="#"><i class="ti ti-edit"></i> Edit</a></li>
                            <li><a class="dropdown-item" href="#"><i class="ti ti-trash"></i> Hapus</a></li>
                        </ul>
                    </div>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
