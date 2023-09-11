<x-universal-layout>
    <div class="mt-5 h-[60vh] flex justify-center items-center">
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
                        <!-- <input type="text" id="token" placeholder="Masukan Token" required class="w-[300px] h-[30px] rounded border-[#F1F1F1] mb-[20px]" ></input> -->
                        <!-- <button type="button" class="bg-[#114D91] w-[300px] h-[30px] rounded text-[#FFF]">aktifkan token</button> -->
                    </form>
                </div>
            </div>
        </div>
</x-universal-layout>