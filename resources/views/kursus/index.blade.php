<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus</title>
    <style>
        body {
            display: flex;
            margin: 0;
            height:100%;
        }

        .sidebar {
            width: 250px;
            padding: 20px;
            background-color: #333;
            color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #fff;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .sidebar h2 {
            font-size: 18px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .sidebar h3 {
            font-size: 16px;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul ul {
            margin-left: 15px;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            display: block;
            padding: 5px 20px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        iframe {
            width: 100%;
            height: 500px;
            border: none;
        }

        /* Menambahkan animasi saat hover pada tautan artikel */
        .sidebar a:hover {
            background-color: #555;
            transform: scale(1.05); /* Menambahkan efek scaling saat hover */
        }

    </style>
</head>
<body>
    <div class="sidebar">
        <h1>Daftar Kursus</h1>
        @foreach ($kursus as $k)
            <h2>{{ $k->judul }}</h2>
            <ul>
                @foreach ($k->sections as $section)
                    <li>
                        <h3> - {{ $section->nama_section }}</h3>
                        <ul>
                            @foreach ($section->artikels as $artikel)
                                <li>
                                    <a href="javascript:void(0);" onclick="tampilkanArtikel('{{ route('kursus.artikel', [$k->id, $section->id, $artikel->id]) }}')">
                                        {{ $artikel->nama }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        
        @endforeach
    </div>

    <div class="content">
        
        <iframe id="artikel-iframe" src="" width="100%" height="500" frameborder="0"></iframe>
    </div>

    <script>
        function tampilkanArtikel(url) {
            document.getElementById('artikel-iframe').src = url;
        }
    </script>
</body>
</html>
