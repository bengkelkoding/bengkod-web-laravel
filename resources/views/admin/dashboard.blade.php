<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div> --}}

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-[500px] h-[400px] rounded border-2 border-indigo-500/100 mt-3">
            <h1 class="font-bold text-[28px] text-center py-3">Upload CSV</h1>

            <div class="h-[30vh] mb-[-20px] flex items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md mb-3">
                <img src="{{ asset('assets/admin/icons/upload.png') }}" width="58px" height="58px">
            </div>

            <form action="/import" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="file" name="csv_file">
                </div>
                <div class="flex justify-center items-center my-3">
                    <button type="submit" class="bg-[#114D91] rounded w-[116px] h-auto hover:bg-cyan-500"><span class="text-[14px] text-white">Import CSV</span></button>
                </div>
            </form>
        </div>
    </div>


</x-admin>
