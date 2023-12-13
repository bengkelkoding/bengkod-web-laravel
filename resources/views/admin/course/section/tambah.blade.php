<x-guest-layout>
    <form method="POST" action="{{ route('section.store') }}">
        @csrf
        <!-- Id kursus -->
        <div>
            <x-input-label for="id_kursus" :value="__('Id Kursus')" />
            <x-text-input id="id_kursus" class="block mt-1 w-full" type="text" name="id_kursus" :value="old('id_kursus')" required autofocus autocomplete="id_kursus" />
            <x-input-error :messages="$errors->get('id_kursus')" class="mt-2" />
        </div>

        <!-- Nama section -->
        <div>
            <x-input-label for="nama_section" :value="__('Nama Section')" />
            <x-text-input id="nama_section" class="block mt-1 w-full" type="text" name="nama_section" :value="old('nama_section')" required autofocus autocomplete="nama_section" />
            <x-input-error :messages="$errors->get('nama_section')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Tambah Kursus') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
