Section Index <br>

@foreach ($sections as $section)

    {{ $section->id . ". " . $section->nama_section}}
    <form method="POST" action="{{ route('section.destroy', $section->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form> <br>
    
@endforeach