<x-universal-layout>
    <!-- <div class="mt-5 h-[60vh] flex justify-center items-center">
            <div class="bg-white border p-[50px] rounded-md">
                <h3 class="font-bold text-[24px] text-center font-inter mb-[5px]">Aktivasi Token</h3>
                <p class="text-[14px] text-center mt-[-10px] mb-5">Aktifkan token kelas belajar anda disini</p>
                <div>
                    <form>
                        <x-text-input id="token" class="px-1 block mt-1 w-full border" type="token" name="token" :value="old('token')" placeholder="Aktivasi Token" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('token')" class="mt-2" />
                        <x-tombol-universal class="mt-3">
                        {{ __('Aktivasi Token') }}
                        </x-tombol-universal>
                    </form>
                </div>
            </div>
        </div> -->

        <div class="w-[100%] flex justify-center items-center">
        <div class="w-[300px] my-40">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <h3 class="font-bold text-[24px] text-center font-inter mb-[5px]">Aktivasi Token</h3>
            <p class="text-[14px] text-center mt-[-10px] mb-[70px]">Aktifkan token kelas belajar anda disini</p>
            <form method="POST" action="">
                @csrf
                <div>
                    <x-text-input id="token" class="block mt-1 w-full px-2 py-2 " type="text" name="token" :value="old('token')" required autofocus autocomplete="username" placeholder="Masukan Token"/>
                    <x-input-error :messages="$errors->get('token')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="flex justify-center items-center w-[100%]">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-universal-layout>