<x-guest-layout>
    <form method="POST" action="{{ route('kursus.store') }}">
        @csrf
        <!-- Judul -->
        <div>
            <x-input-label for="judul" :value="__('Judul')" />
            <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul" :value="old('judul')" required autofocus autocomplete="judul" />
            <x-input-error :messages="$errors->get('judul')" class="mt-2" />
        </div>

        <!-- Author -->
        <div>
            <x-input-label for="author" :value="__('Author')" />
            <x-text-input id="author" class="block mt-1 w-full" type="text" name="author" :value="old('author')" required autofocus autocomplete="author" />
            <x-input-error :messages="$errors->get('author')" class="mt-2" />
        </div>

        <!-- Author -->
        <div>
            <x-input-label for="hari" :value="__('Hari')" />
            <x-text-input id="hari" class="block mt-1 w-full" type="text" name="hari" :value="old('hari')" required autofocus autocomplete="hari" />
            <x-input-error :messages="$errors->get('hari')" class="mt-2" />
        </div>

        <!-- Jam -->
        <div>
            <x-input-label for="jam" :value="__('Jam')" />
            <x-text-input id="jam" class="block mt-1 w-full" type="text" name="jam" :value="old('jam')" required autofocus autocomplete="jam" />
            <x-input-error :messages="$errors->get('jam')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Tambah Kursus') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
