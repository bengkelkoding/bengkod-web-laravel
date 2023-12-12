@php
use Carbon\Carbon;

$currentTime = Carbon::now('Asia/Jakarta');
$hour = $currentTime->hour;

if ($hour >= 5 && $hour < 12) {
    $selamat = "Pagi";
} elseif ($hour >= 12 && $hour < 15) {
    $selamat = "Siang";
} elseif ($hour >= 15 && $hour < 18) {
    $selamat = "Sore";
} else {
    $selamat = "Malam";
}
@endphp

<x-app-layout>
    <div class="box-content container mx-auto rounded-lg my-10 p-4 bg-gradient-to-l from-blue-500 to-cyan-500 mb-2">
        <div class="text-center text-white py-20">
            <h1 class="text-4xl text-white font-semibold">Selamat {{ $selamat }}, {{ auth()->user()->name }}!</h1>
            <p class="mt-3 text-lg">Jika kamu tidak sanggup menahan lelahnya belajar, Maka bersiaplah menahan perihnya kebodohan.</p>
            <p class="text-lg">~ Imam Syafi’i ~</p>
        </div>
    </div>
    <div class="container mx-auto mt-10 max-w-2xl">
        @if(count($classrooms) > 0)
            <div class="bg-white rounded-md h-max p-4 w-full">
                <p class="text-black font-bold mb-2 text-lg text-center">Kelas Anda</p>
                @foreach($classrooms as $c)
                <div class="p-4 mb-3 border rounded-lg flex gap-4 justify-between shadow-sm hover:shadow-none items-center">
                    <div>
                        <p class="text-lg font-semibold">{{$c->name}}</p>
                        <p class="text-black/50">{{$c->description}}</p>
                        <div class="flex gap-4 text-black/50 mt-2">
                            <p>Hari: <span class="text-black">{{$c->day}}</span></p>
                            <p>Jam: <span class="text-black">{{$c->time}}</span></p>
                        </div>
                    </div>
                    <a href="/student/class/{{ $c->id }}" class="border border-primary-color bg-primary-color h-max min-w-max px-4 py-2 rounded-md text-white hover:bg-primary-color/80">Detail Kelas</a>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-warning/10 text-warning p-4 text-center rounded-md">
                <p>Anda belum masuk kelas!</p>
            </div>
        @endif
    </div>
</x-app-layout>
