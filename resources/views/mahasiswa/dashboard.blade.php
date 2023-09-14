

<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    <div class="py-9 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>ini isi dashboard</div>
    </div>

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
