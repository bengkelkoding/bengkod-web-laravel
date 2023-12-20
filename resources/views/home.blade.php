<?php
$gambar = [
    'https://mahasiswa.dinus.ac.id/images/foto/A/A11/2021/A11.2021.13716.jpg',
    'https://mahasiswa.dinus.ac.id/images/foto/A/A11/2021/A11.2021.13480.jpg',
    'https://mahasiswa.dinus.ac.id/images/foto/A/A11/2021/A11.2021.13544.jpg',
    'https://mahasiswa.dinus.ac.id/images/foto/A/A11/2021/A11.2021.13370.jpg',
    'https://mahasiswa.dinus.ac.id/images/foto/A/A11/2021/A11.2021.13717.jpg',
    'https://mahasiswa.dinus.ac.id/images/foto/A/A11/2021/A11.2021.13708.jpg',
    // tambahkan gambar lainnya sesuai kebutuhan
];
?>
<x-universal-layout>
    <div class="container mx-auto">
        <!-- <div class="relative w-[100%] overflow-hidden">
            <div class="w-[100%] h-96 hidden slide bg-contain ">
                <img src="assets\img\h61.jpg" class="w-full h-96 object-cover overflow-hidden" alt="Lobby H6 1">
            </div>
            <div class="hidden slide bg-contain bg-center">
                <img src="assets\img\h62.jpg" class="w-full h-96 object-cover" alt="Lobby H6 2">
            </div>
            <div class="hidden slide bg-contain ">
                <img src="assets\img\h63.jpg" class="w-full h-96 object-cover" alt="Lobby H6 3">
            </div>
        </div> -->
        {{-- Headline --}}
        <div class="">
            {{-- 1 --}}
            <div
                class="headline1 flex flex-col lg:flex-row my-5 md:my-10 lg:mx-20  justify-between max-lg:items-center items-center">
                <div class="mt-4 md:mt-5 text-center lg:text-left">
                    <p class="font-medium text-3xl md:text-5xl lg:text-6xl">Mari Belajar Mengubah Ide menjadi Kode</p>
                    <p class="mt-2 md:mt-5 text-lg md:text-2xl">Ayo Mulai Petualangan Belajarmu Bersama Kami!</p>
                    <!-- <div class="btnUi text-white bg-primary-color w-28 text-center p-2 rounded-md mt-4 hover:bg-white hover:border hover:border-primary-color hover:text-primary-color">
                        <a href="{{ route('login') }}">
                            <button>Bergabung</button>
                        </a>
                    </div> -->
                </div>
                <div class="relative mt-5 md:mt-10 lg:mt-0">
                    <div
                        class="relative w-[80vw] h-[80vw] md:w-[60vw] md:h-[60vw] lg:w-[30vw] lg:h-[30vw] rounded-xl overflow-hidden">
                        <div class="w-full slide">
                            <img src="assets\img\dokumentasi-1.png" class="w-full" loading="lazy"
                                alt="Gambar Mengajar" />
                        </div>
                        <div class="w-full slide">
                            <img src="assets\img\dokumentasi-2.png" class="w-full" loading="lazy"
                                alt="Gambar Mengajar" />
                        </div>
                        <div class="w-full slide">
                            <img src="assets\img\dokumentasi-3.png" class="w-full" loading="lazy"
                                alt="Gambar Mengajar" />
                        </div>
                        <div class="w-full slide">
                            <img src="assets\img\dokumentasi-4.png" class="w-full" loading="lazy"
                                alt="Gambar Mengajar" />
                        </div>
                    </div>
                    <div
                        class="absolute shadow-[0_4px_20px_0_rgba(0,0,0,0.25)] bottom-[15px] md:bottom-[30px] left-[-20px] md:left-[-105px] flex flex-col justify-center items-center bg-white px-4 py-2 md:px-7 md:py-5 rounded-md">
                        <div class="flex text-black font-[400] justify-between items-center mb-2 md:mb-4 lg:mb-6">
                            <p class="text-xl md:text-[42px] mr-3 lg:mr-5">+20</p>
                            <p class="text-xs md:text-[14px]">Mentor<br>berpengalaman</p>
                        </div>
                        <div class="flex gap-1">
                            @foreach ($gambar as $index => $item)
                                <div
                                    class="rounded-full aspect-square ml-[-10px] md:ml-[-16px] w-6 h-6 md:w-10 md:h-10 overflow-hidden">
                                    <img src="{{ asset($item) }}" alt="gambar wajah {{ $index }}"
                                        class="{{ '' }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2 --}}
            <div class="whyUS mx-auto w-full md:w-[90%] p-4 h-auto my-20">
                <h1 class="text-2xl font-bold md:text-3xl text-center mb-5">Mengapa Kami?</h1>
                <div class="flex justify-center flex-wrap gap-4 lg:justify-around ">
                    <div
                        class="boxExplain1 w-80 2xl:w-96 p-4 flex items-center gap-4 justify-center rounded-md shadow-xl hover:shadow-none border transition ease-in-out duration-250">
                        {{-- icon --}}
                        <div class="iconBox bg-yellow-200 p-3  rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined">
                                bookmark_manager
                            </span>
                        </div>
                        <div class="whyUs_detail">
                            <h1 class="font-bold">Proyek Koding Praktis</h1>
                            <p class="text-sm">Dapatkan pengalaman langsung dengan proyek-proyek koding yang relevan
                                untuk meningkatkan keterampilanmu.</p>
                        </div>
                    </div>
                    <div
                        class="boxExplain2 w-80 2xl:w-96 p-4 flex items-center gap-4 justify-center rounded-md shadow-xl hover:shadow-none border transition ease-in-out duration-250">
                        {{-- icon --}}
                        <div class="iconBox bg-green-200 p-3  rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined">
                                contacts
                            </span>
                        </div>
                        <div class="whyUs_detail">
                            <h1 class="font-bold">Live Class Interaktif</h1>
                            <p class="text-sm">Bergabunglah dalam kelas langsung yang interaktif untuk belajar dari
                                instruktur terbaik.</p>
                        </div>
                    </div>
                    <div
                        class="boxExplain3 w-80 2xl:w-96 p-4 flex items-center gap-4 justify-center rounded-md shadow-xl hover:shadow-none border transition ease-in-out duration-250">
                        {{-- icon --}}
                        <div class="iconBox bg-orange-200 p-3  rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined">
                                partner_exchange
                            </span>
                        </div>
                        <div class="whyUs_detail">
                            <h1 class="font-bold">Dukungan 1-on-1</h1>
                            <p class="text-sm">Kami memberikan dukungan pribadi untuk membantu kamu mencapai tujuan
                                belajarmu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About bengkel koding -->
        <div class="h-auto mx-auto bg-primary-color rounded-2xl flex flex-col my-28 md:w-[80%] text-white p-10">
            <h1 class="text-center lg:hidden mx-auto text-2xl md:text-3xl font-bold">Mengenal Bengkel Koding</h1>
            <div
                class="containerCard flex flex-col lg:flex-row mt-6 lg:mt-0 justify-center md:gap-5 lg:pl-10 lg:gap-20 md:p-5">
                {{-- box1 --}}
                <!-- <div class="boxAbout1 lg:w-[90%]">
                    <img src="assets\img\h61.jpg" class="h-72 object-cover overflow-hidden " loading="lazy"
                        alt="Lobby H6 1">
                </div> -->
                <div class="relative w-full h-max overflow-hidden rounded-lg">
                    <div class="hidden slide2 bg-contain">
                        <img src="assets\img\h61.jpg" class="h-40 md:h-60 lg:h-72 object-cover overflow-hidden"
                            alt="Lobby H6 1">
                    </div>
                    <div class="hidden slide2 bg-contain bg-center">
                        <img src="assets\img\h62.jpg" class="h-40 md:h-60 lg:h-72 object-cover overflow-hidden"
                            alt="Lobby H6 2">
                    </div>
                    <div class="hidden slide2 bg-contain ">
                        <img src="assets\img\h63.jpg" class="h-40 md:h-60 lg:h-72 object-cover overflow-hidden"
                            alt="Lobby H6 3">
                    </div>
                </div>
                {{-- box2 --}}
                <div class="boxAbout2">
                    <h1 class="hidden lg:block mx-auto text-xl font-bold md:text-3xl">Mengenal Bengkel Koding</h1>
                    <p class="lg:text-justify my-6 text-base md:text-lg">Bengkel Koding merupakan program yang
                        diselenggarakan oleh Program Studi Teknik Informatika Universitas Dian Nuswantoro untuk membantu
                        mahasiswa memahami pembelajaran dibidang ilmu teknologi.</p>
                    {{-- dataCard --}}
                    <div class="dataCard flex  items-center text-black my-3 gap-4">
                        <div
                            class="dataCard1 gap-2 bg-green-300 w-44 h-16 xl:w-48 xl:h-20 2xl:w-60 2xl:h-28 rounded flex items-center justify-center">
                            <p class="text-4xl md:text-6xl  font-bold">5</p>
                            <p class="font-bold text-base md:text-xl">TOP <br><span class="font-normal">Course</span>
                            </p>
                        </div>
                        <div
                            class="dataCard1  bg-yellow-300 w-44 h-16 xl:w-48 xl:h-20 2xl:w-60 2xl:h-28 rounded flex flex-col items-center justify-center">
                            <p class="text-2xl md:text-4xl font-bold">120</p>
                            <p class="text-base md:text-xl">Member</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kursus di bengkel koding -->
        <div class="w-[100%] my-28 flex flex-col justify-center items-center relative">
            <!-- <div
                class="w-[490px] h-[30px] rounded-b-xl bg-blue-500/10 absolute z-[-10] top-[30px] max-md:w-[100%] max-md:h-[58px]">
            </div> -->
            <!-- <h1 class="text-4xl font-medium text-center max-md:text-[38px]" id="kursus">Kursus di Bengkel Koding</h1> -->
            <h1 class="mx-auto text-2xl font-bold md:text-3xl">Kursus di Bengkel Koding</h1>
            <div class="max-w-[82%] flex my-5 items-center overflow-x-scroll snap-mandatory snap-x pb-5">
                @foreach ($courses as $course)
                    <div class="snap-center">
                        <div
                            class="m-[8px] border-2 rounded-md hover:shadow-xl bg-white min-w-[250px] flex flex-col justify-center transition ease-in-out duration-250">
                            <div class="m-4 py-1">
                                <img src="{{ $course->image }}" loading="lazy" alt=""
                                    class="w-full h-auto rounded-md object-cover" />
                                <p class="text-[20px] font-semibold mt-1">{{ $course->title }}</p>
                                <p class="font-medium leading-1 text-gray-500 text-[14px] mt-2">
                                    <img src="assets\admin\icons\users-solid.png" loading="lazy" alt=""
                                        class="inline mr-2">
                                    {{ $course->users_count }} mahasiswa terdaftar
                                </p>
                                <p class="font-medium leading-1 text-gray-500 text-[14px]">
                                    <img src="assets\admin\icons\calendar-days-solid.png" loading="lazy"
                                        alt="" class="inline mr-2">
                                    {{ $course->day }}
                                </p>
                                <p class="font-medium leading-1 text-gray-500 text-[14px]">
                                    <img src="assets\admin\icons\clock-solid.png" alt="" loading="lazy"
                                        class="inline mr-2">
                                    {{ $course->hour }}
                                </p>
                                <div
                                    class="btnUi text-white bg-primary-color w-full text-center p-2 rounded-md mt-4 hover:bg-white border border-primary-color hover:text-primary-color">
                                    <a href="/course/{{ $course->id }}">
                                        <button>Belajar Sekarang</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--
        <div class="h-auto mx-auto bg-primary-color rounded-lg p-20 my-28 w-[80%] text-white">
            <div class="flex flex-col justify-center items-center ">
                <h2 class=" text-xl font-semibold mb-6">Tunggu Apa Lagi?</h2>
                <div class="text-center md:flex md:justify-center md:items-center">
                    <p class=" text-lg">Ayo Mulai Petualangan Belajarmu Bersama Kami!</p>
                </div>
                <div
                    class="btnUi text-primary-color font-bold bg-white w-28 text-center p-2 rounded-md mt-4 hover:bg-[#005AFF] hover:border hover:border-white hover:text-white">
                    <a href="{{ route('login') }}">
                        <button>Bergabung</button>
                    </a>
                </div>
            </div>
        </div> -->
    </div>
    <script>
        let slideIndex = 0;
        let slideIndex2 = 0;

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
            setTimeout(showSlides, 5000);
        }

        function showSlides2() {
            const slides = document.querySelectorAll('.slide2');
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }
            slideIndex2++;
            if (slideIndex2 > slides.length) {
                slideIndex2 = 1;
            }
            slides[slideIndex2 - 1].style.display = 'block';
            setTimeout(showSlides2, 5000);
        }

        showSlides();
        showSlides2();
    </script>
</x-universal-layout>
