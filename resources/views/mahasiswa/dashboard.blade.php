

<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>
    @dd($user->kursus)
    <h2>Kursus Anda:</h2>
        <ul>
            @if($user->kursus)
                <img src="{{$user->kursus->image}}">
                <li>{{ $user->kursus->id }}</li>
                <li>{{ $user->kursus->judul }}</li>
                <li>{{ $user->kursus->author }}</li>
                <li>{{ $user->kursus->hari }}</li>
                <li>{{ $user->kursus->jam }}</li>
                <li>{{ $user->kursus->url }}</li>
            @else
                <li>Anda belum mendaftar ke kursus manapun.</li>
            @endif
        </ul>
</x-app-layout>
