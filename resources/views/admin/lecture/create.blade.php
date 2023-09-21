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
            <p class="fw-semibold mb-4"><span class="card-title mr-4">Tambah Dosen</span></p>
            <form method="POST" action="{{ route('admin.lecture.store') }}">
                @csrf

                <!-- NIM -->
                <div class="mb-3">
                    <x-input-label for="kode" :value="__('NPP')" />
                    <x-text-input id="kode" class="block mt-1 w-full" type="text" name="kode" :value="old('kode')" required autofocus autocomplete="kode" />
                    <x-input-error :messages="$errors->get('kode')" class="mt-2" />
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Nama Dosen')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Select Option  -->
                <div class="mb-3">
                    <x-input-label for="course" :value="__('Nama Kursus')" />
                    <select class="form-select" name="course">
                        <option selected>Pilih Kursus</option>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->id}} - {{$course->judul}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('course')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('Tambah Dosen') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</x-admin>
