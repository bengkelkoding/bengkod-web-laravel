<x-universal-layout>
    <!-- <img src="http://bengkelkoding.dinus.ac.id/assets/1.jpg" alt="Lobby H6" class="w-[100%] h-auto"> -->
    <div class="relative w-[100%] overflow-hidden">
        <div class="w-[100%] h-96 hidden slide bg-contain ">
            <img src="assets\img\h61.jpg" class="w-full h-96 object-cover overflow-hidden" alt="Lobby H6 1">
        </div>
        <div class="hidden slide bg-contain bg-center">
            <img src="assets\img\h62.jpg" class="w-full h-96 object-cover" alt="Lobby H6 2">
        </div>
        <div class="hidden slide bg-contain ">
            <img src="assets\img\h63.jpg" class="w-full h-96 object-cover" alt="Lobby H6 3">
        </div>
    </div>
    <div class="w-[100%] my-36 flex flex-col justify-center items-center relative">
        <div class="w-[320px] h-[30px] rounded-b-xl bg-blue-500/10 absolute z-[-10] top-[30px] max-md:w-[100%] "></div>
        <h1 class="text-4xl font-medium max-md:text-[38px]">Bengkel Koding</h1>
        <p class="text-center mt-9 max-md:w-[90vw] w-[35vw] text-[18px]">
            Merupakan program yang diselenggarakan oleh Program Studi
            Teknik Informatika Universitas Dian Nuswantoro untuk membantu
            mahasiswa memahami pembelajaran dibidang ilmu teknologi.
        </p>
    </div>

    <div class="w-[100%] my-30 flex flex-col justify-center items-center relative">
        <div class="w-[490px] h-[30px] rounded-b-xl bg-blue-500/10 absolute z-[-10] top-[30px] max-md:w-[100%] max-md:h-[58px]"></div>
        <h1 class="text-4xl font-medium text-center max-md:text-[38px]" id="kursus">Kursus di Bengkel Koding</h1>
        <div class="max-w-[70%] flex my-[5em] items-center mx-auto lg:overflow-y-scroll max-md:overflow-y-scroll max-lg:overflow-x-scroll scrollbar-hide">
            @foreach ($kursuses as $kursus)
            <a href="/kursus/{{ $kursus->id }}">
            <div class="m-[8px] border-2 rounded-md hover:drop-shadow-md bg-white min-w-[250px] flex flex-col justify-center transition ease-in-out duration-150">
                <div class="m-4 py-1">
                    <img src="{{ $kursus->image }}" alt="" class="w-full h-auto rounded-md object-cover"/>
                    <p class="text-[20px] font-semibold mt-1">{{ $kursus->judul }}</p>
                    <p class="font-medium leading-1 text-gray-500 text-[14px] mt-2">
                        <img src="assets\admin\icons\users-solid.png" alt="" class="inline mr-2">
                        {{ $kursus->users_count }} mahasiswa terdaftar
                    </p>
                    <p class="font-medium leading-1 text-gray-500 text-[14px]">
                        <img src="assets\admin\icons\calendar-days-solid.png" alt="" class="inline mr-2">
                        {{ $kursus->hari }}
                    </p>
                    <p class="font-medium leading-1 text-gray-500 text-[14px]">
                        <img src="assets\admin\icons\clock-solid.png" alt="" class="inline mr-2">
                        {{ $kursus->jam }}
                    </p>
                </div>
            </div>
            </a>
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
