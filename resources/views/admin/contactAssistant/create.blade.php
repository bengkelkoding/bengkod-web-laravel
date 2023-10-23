<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="container-fluid">
        <a href="{{ url()->previous() }}" class="btn btn-outline-dark rounded-pill mb-4"><i class="ti ti-arrow-left"></i> Back</a>
          <div class="card">
            <div class="card-body">
            <p class="fw-semibold mb-4"><span class="card-title mr-4">Tambah Kontak Asisten</span></p>
            <form method="POST" action="{{ route('admin.contact-assistant.store') }}">
                @csrf
                <!-- Nama -->
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Nama Asisten')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <x-input-label for="phone_number" :value="__('Nomor Telepon')" />
                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

                <!-- Select Option Course -->
                <div class="mb-3">
                    <x-input-label for="id_kursus" :value="__('Nama Kursus')" />
                    <select class="form-select" name="id_kursus">
                        <option selected value="">Pilih Kursus</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->judul}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('id_kursus')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('Tambah Asisten') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</x-admin>
