<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Section</title>
</head>
<body>
    <h1>Daftar Section - {{ $kursus->judul }}</h1>
    <ul>
        @foreach ($kursus->sections as $section)
            <li>
                {{ $section->nama_section }}
                <ul>
                    @foreach ($section->artikels as $artikel)
                        <li>
                            <a href="{{ route('kursus.artikel', [$kursus->id, $section->id, $artikel->id]) }}">
                                {{ $artikel->judul }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>
