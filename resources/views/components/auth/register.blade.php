<x-universal-layout>
    <div class="w-[100%] flex justify-center items-center">
        <div class="w-[500px] my-40">
            <x-judul-form>{{__('Buat Akun Mahasiswa')}}</x-judul-form>
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
        
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
        
                <!-- NIM -->
                <div class="mt-4">
                    <x-input-label for="nim" :value="__('Nomor Induk Mahasiswa')" />
                    <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required autofocus autocomplete="" />
                    <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                </div>
        
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email Mahasiswa')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Pilih Kursus -->
                <div class="mt-4">
                    <x-input-label for="id_kursus" :value="__('Pilih Kursus')" />
                    <select id="id_kursus" name="id_kursus" class="block mt-1 w-full" required>
                        <option value="" disabled selected>Pilih Kursus</option>
                        <option value="1">Web Developer</option>
                        <option value="2">Mobile Developer</option>
                        <option value="3">Data Science</option>
                        <option value="4">Computer Vision</option>
                        <option value="5">Game Programming</option>
                    </select>
                    <x-input-error :messages="$errors->get('id_kursus')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
        
                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-universal-layout>
