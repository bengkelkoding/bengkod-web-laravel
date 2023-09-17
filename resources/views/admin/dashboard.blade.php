<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-5 ">

        <div class="max-w-screen-md mx-auto sm:px-6 px-3 lg:px-8 w-full lg:w-[500px] h-[400px] rounded border-2 border-indigo-500/100 mt-3">
            <h1 class="font-bold text-[28px] text-center py-3">Upload CSV</h1>

            <div class="h-[30vh] flex flex-col items-center justify-center bg-gray-400/30 drop-shadow-lg rounded-md cursor-pointer" id="upload-icon" onclick="openInputFile()">
                <img src="{{ asset('assets/admin/icons/drag_drop.png') }}" width="58px" height="58px" class="invert">
                <h4>Seret File atau Klik Disini Untuk Upload File</h4>
            </div>

            <form action="/import" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="file" id="csv_file" name="csv_file" class="hidden" onchange="uploadIcon()">
                </div>
                @if($errors->any())
                    <div id="errors" class="text-red-500 mt-1 ml-1 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="flex justify-center items-center mt-9">
                    <button type="submit" class="bg-[#114D91] rounded-md w-[116px] text-xl h-auto hover:bg-cyan-500"><span class="text-[14px] text-white">Import CSV</span></button>
                </div>
            </form>
        </div>

    </div>
    <script>
        const dropArea = document.getElementById('upload-icon');
        const fileContainer = document.getElementById('csv_file');

        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('bg-green-400');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('bg-green-400');
        });

        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('bg-green-400');

            fileContainer.files = e.dataTransfer.files;
            uploadIcon()
        });

        function openInputFile() {
            let input = document.getElementById('csv_file');
            input.click();
        }

        function uploadIcon() {
            let input = document.getElementById('csv_file');
            let icon = document.getElementById('upload-icon');
            let currentSaved = document.getElementById('current_saved');
            let errors = document.getElementById('errors');

            if(currentSaved === null) {
                currentSaved = document.createElement('a');
                currentSaved.setAttribute('id', 'current_saved');
                currentSaved.setAttribute('class', 'text-black-500 mt-6 ml-1 text-xs');
                icon.after(currentSaved);
            }

            if (input.value !== '') {
                currentSaved.innerHTML = input.files[0].name;
                if (errors !== null) {
                    errors.remove()
                }
            }
        }
    </script>

</x-admin>
