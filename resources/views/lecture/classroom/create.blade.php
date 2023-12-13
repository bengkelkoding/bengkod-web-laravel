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
            <p class="fw-semibold mb-4"><span class="card-title mr-4">Tambah Kelas</span></p>
            <form method="POST" action="{{ route('admin.classroom.store') }}">
                @csrf
                <!-- Nama -->
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Nama Kelas')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Select Option Course -->
                <div class="mb-3">
                    <x-input-label for="id_kursus" :value="__('Nama Kursus')" />
                    <select class="form-select" name="id_course">
                        <option selected value="">Pilih Kursus</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('id_course')" class="mt-2" />
                </div>
                <!-- Select Option Lecture -->
                <div class="mb-3">
                    <x-input-label for="id_kursus" :value="__('Nama Dosen')" />
                    <select class="form-select" name="id_lecture">
                        <option selected value="">Pilih Dosen</option>
                        @foreach($lectures as $lecture)
                            <option value="{{$lecture->id}}">{{$lecture->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('id_lecture')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <x-input-label for="description" :value="__('Deskripsi')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Day -->
                <div class="mb-3">
                    <x-input-label for="day" :value="__('Hari')" />
                    <x-text-input id="day" class="block mt-1 w-full" type="text" name="day" :value="old('day')" required autofocus autocomplete="day" />
                    <x-input-error :messages="$errors->get('day')" class="mt-2" />
                </div>

                <!-- Time -->
                <div class="mb-3">
                    <x-input-label for="time" :value="__('Waktu')" />
                    <x-text-input id="time" class="block mt-1 w-full" type="text" name="time" :value="old('time')" required autofocus autocomplete="time" />
                    <x-input-error :messages="$errors->get('time')" class="mt-2" />
                </div>

                <!-- Quota -->
                <div class="mb-3">
                    <x-input-label for="quota" :value="__('Kuota')" />
                    <x-text-input id="quota" class="block mt-1 w-full" type="number" name="quota" :value="old('quota')" required autofocus autocomplete="quota" />
                    <x-input-error :messages="$errors->get('quota')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Tambah Kelas') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</x-admin>
