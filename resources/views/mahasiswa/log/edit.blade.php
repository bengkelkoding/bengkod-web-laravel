<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    <div class="box-content flex w-100% p-4 bg-gradient-to-l from-cyan-500 to-blue-500 mb-2">
        <div class="box-content h-auto mb-[40px] mx-24 max-md:mx-12">
            <h1 class="text-white font-bold text-[32px] mt-7">Selamat pagi, {{ auth()->user()->name }}!</h1>
            <p class="text-white mt-2 text-[16px]">Jika kamu tidak sanggup menahan lelahnya belajar, <br>Maka bersiaplah
                menahan perihnya kebodohan.</p>
            <p class="text-white">~ Imam Syafi’i</p>
        </div>
    </div>

    <div class="mx-52 max-md:mx-24 flex flex-col max-lg:justify-center max-lg:items-center">
        <div class="flex justify-between flex-wrap items-center max-lg:justify-center">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-bold text-[20px] mt-7">Update Log Aktivitas Hari Ini</h3>
                        </div>
                        <div class="card-body">
                            @if ($allow_access)
                            @error('pesan')
                            <div class="alert alert-danger" role="alert">
                                There are some errors regarding your inputs :
                                <ul class="mt-1.5 ml-4 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @enderror
                            <form action="{{ route('logs.update', $log->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label for="pesan">Pesan</label>
                                    <textarea class="form-control" id="pesan" rows="3" name="pesan">{{ old('pesan', $log->pesan) }}</textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="btn btn-primary bg-[#5D87FF]">Submit</button>
                                </div>
                            </form>
                            @else
                            <div class="alert alert-danger" role="alert">
                                Anda tidak dapat mengakses halaman ini
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
