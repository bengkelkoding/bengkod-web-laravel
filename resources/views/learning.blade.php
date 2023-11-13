@php
$srcGambar = array('https://img.freepik.com/free-vector/hand-drawn-indonesian-national-education-day-illustration_23-2148904425.jpg?size=626&ext=jpg&ga=GA1.2.1086889577.1694323104&semt=sph','https://img.freepik.com/free-vector/large-school-building-scene_1308-32058.jpg?size=626&ext=jpg&ga=GA1.2.1086889577.1694323104&semt=sph');
$judul = array('sekolah 1', 'sekolah2');
$jmlMhs = array('9','35');
$hari = array('Senin - Jumat','Sabtu dan Minggu');
$jam = array('09.00-12.00','13.00-24.00');
$link = array('https://google.com','https://wikipedia.com')
@endphp

<x-universal-layout>
    <div class="max-w-[70%] flex flex-wrap  justify-center my-[5em] items-center mx-auto">
        @php
        for($i=0;$i < sizeof($jam);$i++){
        @endphp
        <x-kartu-pelatihan :srcGambar="$srcGambar[$i]" :judul="$judul[$i]" :jmlMhs="$jmlMhs[$i]" :hari="$hari[$i]" :jam="$jam[$i]" :link="$link[$i]"/>
        <x-kartu-pelatihan :srcGambar="$srcGambar[$i]" :judul="$judul[$i]" :jmlMhs="$jmlMhs[$i]" :hari="$hari[$i]" :jam="$jam[$i]" :link="$link[$i]"/>
        <x-kartu-pelatihan :srcGambar="$srcGambar[$i]" :judul="$judul[$i]" :jmlMhs="$jmlMhs[$i]" :hari="$hari[$i]" :jam="$jam[$i]" :link="$link[$i]"/>
        @php
        }
        @endphp
    </div>
</x-universal-layout>