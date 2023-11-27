<?php
$gambar = [
    'https://mahasiswa.dinus.ac.id/images/foto/A/A11/2021/A11.2021.13716.jpg',
    'https://mahasiswa.dinus.ac.id/images/foto/A/A11/2021/A11.2021.13716.jpg',
    'https://mahasiswa.dinus.ac.id/images/foto/A/A11/2021/A11.2021.13716.jpg',
    'https://mahasiswa.dinus.ac.id/images/foto/A/A11/2021/A11.2021.13717.jpg',
    // tambahkan gambar lainnya sesuai kebutuhan
];

?>

<x-universal-layout>

    {{-- Headline --}}
    <div class="min-w-screen">
        {{-- 1 --}}
        <div class="headline1 flex max-lg:flex-col my-5 mx-11  lg:mx-20  justify-between max-lg:items-center">
            <div class="mt-5">
                <p class="font-medium text-7xl">Mari Belajar Mengubah Ide menjadi kode</p>
                <p class="mt-5">Ayo Mulai Petualangan Belajarmu Bersama Kami!</p>
                <div
                    class="btnUi text-white bg-primary-color w-28 text-center p-2 rounded-md mt-4 hover:bg-white hover:border hover:border-primary-color hover:text-primary-color">
                    <a href="{{ route('login') }}">
                        <button>Bergabung</button>
                    </a>
                </div>
            </div>
            <div class="relative
                        mt-5 md:mt-0">
                <img src="assets\img\Home1.png" class="w-[50vw]" loading="lazy" alt="Gambar Mengajar" />
                <div
                    class="absolute shadow-[0_4px_20px_0_rgba(0,0,0,0.55)] bottom-[30px] left-[-105px] max-md:left-[-55px] flex flex-col justify-center items-center bg-white px-7 py-5 rounded-md">
                    <div class="flex text-black font-[400] justify-between items-center">
                        <p class="text-[42px] mr-5">+20</p>
                        <p class="text-[14px]">Mentor<br>berpengalaman</p>

                    </div>
                    <div class="flex gap-1">
                        @foreach ($gambar as $index => $item)
                            <img src="{{ asset($item) }}" alt="gambar wajah {{ $index }}"
                                class="{{ 'rounded-full aspect-square ml-[-16px] w-10 h-fit' }}" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- 2 --}}
        <div class="whyUS mx-auto  w-[90%] p-4 h-auto">
            <h1 class="text-l font-bold md:text-xl text-center mb-5">Kenapa Kami?</h1>
            <div class="flex justify-center flex-wrap gap-4 lg:justify-around ">
                <div class="boxExplain1  w-80 p-4 flex items-center gap-4 justify-center rounded-md shadow-xl">
                    {{-- icon --}}
                    <div class="iconBox bg-yellow-200 p-3  rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined">
                            bookmark_manager
                        </span>
                    </div>
                    <div class="whyUs_detail">
                        <h1 class="font-bold">Proyek Koding Praktis</h1>
                        <p class="text-sm">Dapatkan pengalaman langsung dengan proyek-proyek koding yang relevan
                            untuk
                            meningkatkan
                            keterampilanmu.</p>
                    </div>
                </div>
                <div class="boxExplain2  w-80 p-4 flex items-center gap-4 justify-center rounded-md shadow-xl">
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
                <div class="boxExplain3  w-80 p-4 flex items-center gap-4 justify-center rounded-md shadow-xl">
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

    {{-- About --}}
    <div class="h-auto mx-auto bg-[#005AFF] rounded-lg flex flex-col px-10 py-5 my-20 w-[80%] text-white">
        <div class="text-black border-box bg-white w-1/3 mx-auto text-center p-2 h-auto rounded-xl border-2 ">
            <h1 class="text-l font-bold md:text-xl">Tentang Kami</h1>
        </div>
        <div class="containerCard flex flex-col md:flex-row mt-6 justify-center md:gap-5 lg:pl-10 lg:gap-20">
            {{-- box1 --}}
            <div class="boxAbout1 lg:w-1/3">
                <img src="assets\img\h61.jpg" class="h-72 object-cover overflow-hidden rounded-3xl mb-4" loading="lazy"
                    alt="Lobby H6 1">
                {{-- dataCard --}}
                <div class="dataCard flex  items-center text-black my-3 justify-between gap-2">
                    <div class="dataCard1 gap-2 bg-green-300 w-60 h-28 rounded flex items-center justify-center">
                        <p class="text-6xl font-bold">5</p>
                        <p class="font-bold text-xl">TOP <br><span class="font-normal">Course</span></p>
                    </div>
                    <div class="dataCard1  bg-yellow-300 w-60 h-28 rounded flex flex-col items-center justify-center">
                        <p class="text-4xl font-bold">120</p>
                        <p class="text-xl">Member</p>
                    </div>
                </div>
            </div>

            {{-- box2 --}}
            <div class="boxAbout2 w-full">
                <h1 class="text-xl font-bold">Mengenal Bengkel Koding</h1>
                <p class="text-justify mt-6 lg:w-[70%]">Program ini adalah inisiatif dari Program Studi Teknik
                    Informatika
                    Universitas
                    Dian
                    Nuswantoro yang
                    bertujuan untuk membantu mahasiswa memahami dunia teknologi. Kami menyediakan materi pembelajaran,
                    pelatihan praktis, dan dukungan untuk membantu dalam pengembangan skill dibidang minat.</p>
            </div>
        </div>

    </div>

    <div class="w-[100%] my-30 flex flex-col justify-center items-center relative">
        <div
            class="w-[490px] h-[30px] rounded-b-xl bg-blue-500/10 absolute z-[-10] top-[30px] max-md:w-[100%] max-md:h-[58px]">
        </div>
        <h1 class="text-4xl font-medium text-center max-md:text-[38px]" id="kursus">Kursus di Bengkel Koding</h1>
        <div class="max-w-[70%] flex my-[5em] items-center overflow-x-scroll snap-mandatory snap-x">
            @foreach ($kursuses as $kursus)
                <div class="snap-center">
                    <div
                        class="m-[8px] border-2 rounded-md hover:shadow-xl bg-white min-w-[250px] flex flex-col justify-center transition ease-in-out duration-150">
                        <div class="m-4 py-1">
                            <img src="{{ $kursus->image }}" loading="lazy" alt=""
                                class="w-full h-auto rounded-md object-cover" />
                            <p class="text-[20px] font-semibold mt-1">{{ $kursus->judul }}</p>
                            <p class="font-medium leading-1 text-gray-500 text-[14px] mt-2">
                                <img src="assets\admin\icons\users-solid.png" loading="lazy" alt=""
                                    class="inline mr-2">
                                {{ $kursus->users_count }} mahasiswa terdaftar
                            </p>
                            <p class="font-medium leading-1 text-gray-500 text-[14px]">
                                <img src="assets\admin\icons\calendar-days-solid.png" loading="lazy" alt=""
                                    class="inline mr-2">
                                {{ $kursus->hari }}
                            </p>
                            <p class="font-medium leading-1 text-gray-500 text-[14px]">
                                <img src="assets\admin\icons\clock-solid.png" alt="" loading="lazy"
                                    class="inline mr-2">
                                {{ $kursus->jam }}
                            </p>
                            <div
                                class="btnUi text-white bg-primary-color w-full text-center p-2 rounded-md mt-4 hover:bg-white hover:border hover:border-primary-color hover:text-primary-color">
                                <a href="/kursus/{{ $kursus->id }}">
                                    <button>Belajar Sekarang</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- join --}}
    <div class="h-auto mx-auto bg-[#005AFF] rounded-lg p-20 my-20 w-[80%] text-white">
        <div class="flex flex-col justify-center items-center ">
            <h2 class=" text-xl font-semibold mb-7">Tunggu Apa Lagi?</h2>
            <div class="text-center md:flex md:justify-center md:items-center">
                <p class=" text-xs ">Ayo Mulai Petualangan Belajarmu Bersama Kami!</p>
            </div>
            <div
                class="btnUi text-[#005AFF] font-bold bg-white w-28 text-center p-2 rounded-md mt-4 hover:bg-[#005AFF] hover:border hover:border-white hover:text-white">
                <a href="{{ route('login') }}">
                    <button>Bergabung</button>
                </a>
            </div>
        </div>
    </div>

</x-universal-layout>
