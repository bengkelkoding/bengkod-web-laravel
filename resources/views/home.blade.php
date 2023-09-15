<x-universal-layout>
    <!-- <img src="http://bengkelkoding.dinus.ac.id/assets/1.jpg" alt="Lobby H6" class="w-[100%] h-auto"> -->
    <div class="relative w-[100%] m-0">
        <div class="hidden slide">
            <img src="assets\img\h61.jpg" class="w-[100%] h-96" alt="Lobby H6 1">
        </div>
        <div class="hidden slide">
            <img src="assets\img\h62.jpg" class="w-[100%] h-96" alt="Lobby H6 2">
        </div>
        <div class="hidden slide">
            <img src="assets\img\h63.jpg" class="w-[100%] h-96" alt="Lobby H6 3">
        </div>
    </div>
    <div class="w-[100%] my-36 flex flex-col justify-center items-center relative">
        <div class="w-[400px] h-[30px] rounded-b-xl bg-gray-300 absolute z-[-10] top-[30px] max-md:w-[100%] "></div>
        <h1 class="text-5xl max-md:text-[40px]">Bengkel Koding</h1>
        <p class="text-center mt-9 max-md:w-[90vw] w-[70vw] text-[18px]">
            Merupakan program yang diselenggarakan oleh Program Studi
            Teknik Informatika Universitas Dian Nuswantoro untuk membantu
            mahasiswa memahami pembelajaran dibidang ilmu teknologi.
        </p>
    </div>

    <div class="w-[100%] my-30 flex flex-col justify-center items-center relative">
        <div class="w-[600px] h-[30px] rounded-b-xl bg-gray-300 absolute z-[-10] top-[30px] max-md:w-[100%] max-md:h-[58px]"></div>
        <h1 class="text-5xl text-center max-md:text-[40px]">Kursus di Bengkel Koding</h1>
        <div class="max-w-[70%] flex flex-wrap justify-center my-[5em] items-center mx-auto">
            @foreach ($kursuses as $kursus)
            <div class="m-[15px] border-2 rounded-md drop-shadow-md bg-white max-w-[350px] flex flex-col justify-center">
                <div class="m-4 py-1">
                    <img src="{{ $kursus->image }}" alt="" class="w-64 h-64 rounded-md object-cover shadow-md"/>
                    <p class="text-[25px] mt-1">{{ $kursus->judul }}</p>
                    <p class="font-medium leading-1 text-gray-500 text-[13px] mt-2">
                        <img src="assets\admin\icons\users-solid.png" alt="" class="inline mr-2">
                        {{ $kursus->users_count }} mahasiswa terdaftar
                    </p>
                    <p class="font-medium leading-1 text-gray-500 text-[13px]">
                        <img src="assets\admin\icons\calendar-days-solid.png" alt="" class="inline mr-2">
                        {{ $kursus->hari }}
                    </p>
                    <p class="font-medium leading-1 text-gray-500 text-[13px]">
                        <img src="assets\admin\icons\clock-solid.png" alt="" class="inline mr-2">
                        {{ $kursus->jam }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- contoh iterasi konten kursus --}}
    {{-- @foreach ($kursuses as $kursus)
        <img src="{{$kursus->image}}">
        <li>{{ $kursus->judul }}</li>
        <li>{{ $kursus->author }}</li>
        <li>{{ $kursus->hari }}</li>
        <li>{{ $kursus->jam }}</li>
    @endforeach --}}

    <script>
        let slideIndex = 0;

        function showSlides() {
            const slides = document.querySelectorAll('.slide');
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }
            slides[slideIndex - 1].style.display = 'block';
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }

        showSlides();

    </script>
</x-universal-layout>
