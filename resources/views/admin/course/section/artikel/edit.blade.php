<x-guest-layout>
    <form method="POST" action="{{ route('artikel.update', $artikel->id) }}">
        @csrf
        @method('put')
        <!-- Id kursus -->
        <div>
            <x-input-label for="id_section" :value="__('Id Section')" />
            <x-text-input id="id_section" class="block mt-1 w-full" type="text" name="id_section" :value="$artikel->id_section" required autofocus autocomplete="id_section" />
            <x-input-error :messages="$errors->get('id_section')" class="mt-2" />
        </div>

        <!-- Nama section -->
        <div>
            <x-input-label for="nama" :value="__('Nama Artikel')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="$artikel->nama" required autofocus autocomplete="nama" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- Nama section -->
        <div>
            <x-input-label for="isi" :value="__('Isi Artikel')" />
            <x-text-input id="isi" class="block mt-1 w-full" type="text" name="isi" :value="$artikel->isi" required autofocus autocomplete="isi" />
            <x-input-error :messages="$errors->get('isi')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Update Artikel') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
