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
            <p class="fw-semibold mb-4"><span class="card-title mr-4">Edit Kursus</span></p>
            <form method="POST" action="{{ route('admin.course.update', $course->id) }}">
                @csrf
                @method('PATCH')
                <!-- Judul -->
                <div class="mb-3">
                    <x-input-label for="title" :value="__('Judul')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$course->title" required autofocus autocomplete="title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <x-input-label for="image" :value="__('Gambar ')" />
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" name="image" value="$course->image" />
                            </label>
                        </div>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <x-input-label for="description" :value="__('Deskripsi')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$course->description" required autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Tools -->
                <div class="mb-3">
                    <x-input-label for="tools" :value="__('Tool')" />
                    <x-text-input id="tools" class="block mt-1 w-full" type="text" name="tools" :value="$course->tools" required autofocus autocomplete="tools" />
                    <x-input-error :messages="$errors->get('tools')" class="mt-2" />
                </div>

                <!-- Author -->
                <div class="mb-3">
                    <x-input-label for="author" :value="__('Penulis')" />
                    <x-text-input id="author" class="block mt-1 w-full" type="text" name="author" :value="$course->author" required autofocus autocomplete="author" />
                    <x-input-error :messages="$errors->get('author')" class="mt-2" />
                </div>

                <!-- Hari -->
                <div class="mb-3">
                    <x-input-label for="day" :value="__('Hari')" />
                    <x-text-input id="day" class="block mt-1 w-full" type="text" name="day" :value="$course->day" required autofocus autocomplete="day" />
                    <x-input-error :messages="$errors->get('day')" class="mt-2" />
                </div>

                <!-- Jam -->
                <div class="mb-3">
                    <x-input-label for="hour" :value="__('Jam')" />
                    <x-text-input id="hour" class="block mt-1 w-full" type="text" name="hour" :value="$course->hour" required autofocus autocomplete="hour" />
                    <x-input-error :messages="$errors->get('hour')" class="mt-2" />
                </div>

                <!-- URL -->
                <div class="mb-3">
                    <x-input-label for="url" :value="__('Link Kursus')" />
                    <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="$course->url" required autofocus autocomplete="jam" />
                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                </div>

                <!-- Overview URL -->
                <div class="mb-3">
                    <x-input-label for="url_overview" :value="__('Link Preview Kursus')" />
                    <x-text-input id="url_overview" class="block mt-1 w-full" type="text" name="url_overview" :value="$course->url_overview" required autofocus autocomplete="jam" />
                    <x-input-error :messages="$errors->get('url_overview')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('Edit Kursus') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</x-admin>
