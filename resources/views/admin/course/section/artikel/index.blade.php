Artikel Index <br>

@foreach ($artikels as $artikel)

    {{ $artikel->id . ". " . $artikel->nama}} <br>
    {{ $artikel->isi}}
    <form method="POST" action="{{ route('artikel.destroy', $artikel->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form> <br>
    
@endforeach