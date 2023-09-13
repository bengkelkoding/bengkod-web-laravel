@props(['srcGambar','judul','jmlMhs','hari','jam','link'=>'/'])

<div {{ $attributes->merge(['class'=>'m-[15px] border-2 rounded-md drop-shadow-md bg-white max-w-[350px] flex flex-col justify-center']) }}>
    <div class="m-4 py-1">
        <img src="{{ $srcGambar }}" alt="" srcset="" class="w-64 h-64 rounded-md object-cover shadow-md"/>
        <p class="text-[25px] mt-1">{{ $judul }}</p>
        <p class="font-medium leading-1 text-gray-500 text-[13px] mt-2">{{ $jmlMhs }}</p>
        <p class="font-medium leading-1 text-gray-500 text-[13px]">{{ $hari }}</p>
        <p class="font-medium leading-1 text-gray-500 text-[13px]">{{ $jam }}</p>
        <!-- <a href="{{ $link }}">Klik aku</a> -->
        <x-tombol-universal href="{{ $link }}">Belajar Sekarang</x-tombol-universal>
    </div>
</div>