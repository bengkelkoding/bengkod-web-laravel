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
            <p class="fw-semibold mb-4"><span class="card-title mr-4">Tambah Mahasiswa</span></p>
            <form method="POST" action="{{ route('admin.lecture.update', $lecture->id) }}">
                @csrf
                @method('PATCH')

                <!-- NIM -->
                <div class="mb-3">
                    <x-input-label for="npp" :value="__('NPP')" />
                    <x-text-input id="npp" class="block mt-1 w-full" type="text" name="kode" :value="$lecture->kode" required autofocus autocomplete="npp" />
                    <x-input-error :messages="$errors->get('npp')" class="mt-2" />
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Nama Mahasiswa')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$lecture->name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$lecture->email" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Select Option  -->
                <div class="mb-3">
                    <x-input-label for="course" :value="__('Nama Kursus')" />
                    <select class="form-select" name="id_kursus">
                        <option selected disabled>{{$lecture->id_kursus}}</option>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->id}} - {{$course->judul}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('course')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('Edit Mahasiswa') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</x-admin>
