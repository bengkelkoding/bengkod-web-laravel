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
            <p class="fw-semibold mb-4"><span class="card-title mr-4">Tambah Kursus</span></p>
            <form method="POST" action="{{ route('kursus.store') }}">
                @csrf
                <!-- Judul -->
                <div class="mb-3">
                    <x-input-label for="title" :value="__('Judul')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Thumbnail -->
                <div class="mb-3">
                    <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" name="thumbnail" />
                            </label>
                        </div>
                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                </div>

                <!-- Author -->
                <div class="mb-3">
                    <x-input-label for="author" :value="__('Author')" />
                    <x-text-input id="author" class="block mt-1 w-full" type="text" name="author" :value="old('author')" required autofocus autocomplete="author" />
                    <x-input-error :messages="$errors->get('author')" class="mt-2" />
                </div>

                <!-- Hari -->
                <div class="mb-3">
                    <x-input-label for="day" :value="__('Hari')" />
                    <x-text-input id="day" class="block mt-1 w-full" type="text" name="day" :value="old('day')" required autofocus autocomplete="day" />
                    <x-input-error :messages="$errors->get('day')" class="mt-2" />
                </div>

                <!-- Jam -->
                <div class="mb-3">
                    <x-input-label for="hour" :value="__('Jam')" />
                    <x-text-input id="hour" class="block mt-1 w-full" type="text" name="hour" :value="old('hour')" required autofocus autocomplete="hour" />
                    <x-input-error :messages="$errors->get('hour')" class="mt-2" />
                </div>

                <!-- URL -->
                <div class="mb-3">
                    <x-input-label for="url" :value="__('Url')" />
                    <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url')" required autofocus autocomplete="jam" />
                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('Tambah Kursus') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</x-admin>
