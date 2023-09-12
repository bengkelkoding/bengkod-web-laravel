<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Kursus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar a {
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .sub-kursus {
            padding-left: 20px;
            font-size: 16px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
                .navigation {
            margin-top: 20px;
            text-align: center;
        }

        .navigation button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .navigation button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="#">Kursus 1</a>
        <div class="sub-kursus">
            <a href="#">Sub Kursus 1.1</a>
            <a href="#">Sub Kursus 1.2</a>
            <a href="#">Sub Kursus 1.3</a>
            <a href="#">Sub Kursus 1.4</a>
            <a href="#">Sub Kursus 1.5</a>
        </div>
        <a href="#">Kursus 2</a>
        <div class="sub-kursus">
            <a href="#">Sub Kursus 2.1</a>
            <a href="#">Sub Kursus 2.2</a>
            <a href="#">Sub Kursus 2.3</a>
            <a href="#">Sub Kursus 2.4</a>
            <a href="#">Sub Kursus 2.5</a>
        </div>
        <!-- Tambahkan kursus lain dan sub-kursus di sini -->
    </div>

    <div class="content">
        <h1>Kursus 1</h1>
        <p>
            Ini adalah konten dari Kursus 1. Isi kursus dapat ditampilkan di sini.
        </p>

        <!-- Tombol Navigasi -->
        <div class="navigation">
            <button id="prevButton">Kursus Sebelumnya</button>
            <button id="nextButton">Kursus Selanjutnya</button>
        </div>
    </div>
</body>
</html>
