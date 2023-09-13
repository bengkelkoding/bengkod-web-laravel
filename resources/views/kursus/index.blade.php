Kursus Index <br>

@foreach ($kursuses as $kursus)

    {{ $kursus->judul}}
    <form method="POST" action="{{ route('kursus.destroy', $kursus->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form> <br>
    
@endforeach