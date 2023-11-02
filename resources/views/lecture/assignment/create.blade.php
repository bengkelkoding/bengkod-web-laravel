<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Dosen') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="container-fluid">
            <a href="{{ url()->previous() }}" class="btn btn-outline-dark rounded-pill mb-4"><i
                    class="ti ti-arrow-left"></i> Back</a>
            <div class="card">
                <div class="card-body">
                    <h1 class="fw-semibold mb-4 text-l">Tambah Penugasan</h1>
                    <form method="POST" action="{{ route('lecture.assignment.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Judul -->
                        <div class="mb-3">
                            <x-input-label class="inline" for="judul" :value="__('Judul')" /><span class="text-red-500">*</span>
                            <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul"
                                :value="old('judul')" required autofocus autocomplete="judul" />
                            <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                        </div>

                        <!-- Judul -->
                        <div class="mb-3">
                            <x-input-label class="inline" for="deskripsi" :value="__('Deskripsi')" /><span class="text-red-500">*</span>
                            <textarea name="deskripsi" id="deskripsi"
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                                cols="20" rows="8" required autofocus autocomplete="deskripsi">{{ old('deskripsi') }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        <!-- File Soal -->
                        <div class="mb-3">
                            <x-input-label for="file_soal" :value="__('File Soal')" />
                            <div class="flex items-center justify-center w-full" id="areaDrop">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">DOC, DOCX, PDF, OR ZIP (MAX
                                            10MB)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" name="file_soal" class="hidden" onchange="masukInput()"/>
                                </label>
                            </div>
                            <p id="namaFile"></p>
                            <x-input-error :messages="$errors->get('file_soal')" class="mt-2" />
                        </div>

                        <!-- Waktu Mulai -->
                        <div class="mb-3">
                            <x-input-label class="inline" for="waktu_mulai" :value="__('Waktu Mulai')" /><span class="text-red-500">*</span>
                            <div class="relative mb-3 mt-3" data-te-date-timepicker-init data-te-input-wrapper-init="true">
                                <input type="text"
                                    class=" bg-gray-50 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai') }}"/>
                                <label for="form1"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.5rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.5rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Select
                                    a time</label>
                            </div>
                            <x-input-error :messages="$errors->get('waktu_mulai')" class="mt-2" />
                        </div>

                        <!-- Deadline -->
                        <div class="mb-3">
                            <x-input-label class="inline" for="waktu_mulai" :value="__('Deadline')" /><span class="text-red-500">*</span>
                            <div class="relative mb-3 mt-3" data-te-date-timepicker-init data-te-input-wrapper-init data-te-disable-past="true">
                                <input type="text"
                                    class=" bg-gray-50 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="form1" name="deadline" value="{{ old('deadline') }}" />
                                <label for="form1"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.5rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.5rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Select
                                    a time</label>
                            </div>
                            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ml-4">
                                {{ __('Tambah Penugasan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
        <script>
            const tempatDrop = document.getElementById('areaDrop')
            const tempatLabel = document.getElementById('namaFile')
            const tempatInput = document.getElementById('dropzone-file')

            function masukInput() {
                tempatLabel.innerHTML = tempatInput.files[0].name
            }

            tempatDrop.addEventListener('dragover', (e) => {
                e.preventDefault();
            });

            tempatDrop.addEventListener('dragleave', () => {
            });

            tempatDrop.addEventListener('drop', (e) => {
                e.preventDefault();
                tempatInput.files = e.dataTransfer.files
                masukInput()
            });
        </script>
        <script type="text/javascript">
            $( document ).ready(function() {
                console.log('ready');
            });
            import {
                Datetimepicker,
                Input,
                initTE,
            } from "tw-elements";

            initTE({
                Datetimepicker,
                Input
            });
        </script>
    </x-slot>
</x-admin>
