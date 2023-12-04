<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->insert([
            'image' => 'assets/img/img1.png',
            'title' => 'Junior Web Developer',
            'author' => 'Bengkel Koding',
            'day' => 'Senin - Jumat',
            'hour' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=a56764040f7c92578bb2c011f845aae9',
            'url_overview' => 'index.php?page=c6e190b284633c48e39e55049da3cce8',
            'description' => 'Pelatihan Web Developer terbagi menjadi dua tahap (kelas) yaitu Junior Web Developer dan Web Developer. Materi yang diajarkan pada kedua kelas berbeda namun berkelanjutan. Pada modul Junior Web Developer berisi tentang dasar-dasar dari pemrograman web dengan permasalahan yang sering dialami mahasiswa. Sedangkan pada modul Web Developer berisi materi pemrograman web dengan menggunakan framework. Sehingga peserta yang lulus pada setiap kelas berhak melanjutkan ke kelas selanjutnya.',
            'tools' => 'Konsep Dasar Web Programming,Pengenalan Tools,Responsive Web Design,Front Page,Konsep Database,dll',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('course')->insert([
            'image' => 'assets/img/img2.png',
            'title' => 'Mobile Developer',
            'author' => 'Fahri Firdausillah, Syaifur Rohman, dkk',
            'day' => 'Senin - Jumat',
            'hour' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=1d63721b0fb4c25cbae5c02375064885',
            'url_overview' => 'index.php?page=87d17f4624a514e81dc7c8e016a7405c',
            'description' => 'Dicourse ini kita akan belajar Mobile Developer menggunakan Flutter. Flutter adalah sebuah SDK (Software Development Kit) open source yang dikembangkan oleh Google. Tujuan utamanya adalah untuk memudahkan pembuatan aplikasi yang dapat berjalan di berbagai platform, atau yang biasa disebut sebagai multi-platform. Dengan Flutter, pengembang dapat membangun aplikasi untuk sistem operasi Android, iOS, Web, Windows, Linux, dan MacOS dengan menggunakan kode yang sama, tanpa perlu menulis ulang kode secara terpisah. Selain itu, Flutter juga dapat digunakan baik sebagai bagian dari aplikasi native yang sudah ada maupun sebagai dasar pembangunan aplikasi baru.',
            'tools' => 'Pengenalan Flutter,Dasar Pemrograman Dart,Antarmuka Pengguna Routing dan Navigasi,Pengujian dan Debungging,Akses Data Lokal,dll',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('course')->insert([
            'image' => 'assets/img/img3.png',
            'title' => 'Data Science',
            'author' => 'Bengkel Koding',
            'day' => 'Senin - Jumat',
            'hour' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=05523a261ba32a27ed36e885a86f9fed',
            'url_overview' => 'index.php?page=f6068daa29dbb05a7ead1e3b5a48bbee',
            'description' => 'Selamat datang dalam modul pembelajaran online tentang Data Science. Modul ini dirancang untuk memberi Anda pemahaman yang komprehensif tentang konsep, metode, dan aplikasi yang terkait dengan Data Science. Dalam era digital yang terus berkembang, Data Science telah menjadi elemen kunci dalam pengambilan keputusan yang informasional dan cerdas di berbagai bidang, mulai dari bisnis hingga penelitian ilmiah.',
            'tools' => 'Data Science Tools,Data Understanding,Telaah Data,Validasi Data,Menentukan Objek atau Memilik Data,dll',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('course')->insert([
            'image' => 'assets/img/img5.png',
            'title' => 'Computer Vision',
            'author' => 'Bengkel Koding',
            'day' => 'Senin - Jumat',
            'hour' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=a82f3db817c535a4bae230a7ce1aebdd',
            'url_overview' => 'index.php?page=912c1d9581bfa3729dc4d44db615cf31',
            'description' => 'course ini dirancang sebagai panduan komprehensif untuk memahami dan menerapkan teknik computer vision menggunakan bahasa pemrograman Python. course ini ditujukan untuk individu yang berminat dalam bidang computer vision, baik mereka yang baru memulai perjalanan mereka atau mereka yang sudah memiliki pengalaman dasar dalam bidang ini dan ingin memperdalam pengetahuan mereka. course ini mencakup berbagai topik mulai dari konsep dasar computer vision dan image processing, hingga teknik machine learning dan deep learning yang canggih yang digunakan dalam aplikasi computer vision. Selain itu, course ini juga mencakup bagian penting tentang etika dalam computer vision, suatu topik yang sering diabaikan tetapi sangat penting.',
            'tools' => 'Pengenalan Komputer Vision,Python,Dasar-Dasar Pemrosesan Gambar,Ekstraksi Fitur,Konsep Dasar Machine Learning,dll',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('course')->insert([
            'image' => 'assets/img/img4.png',
            'title' => 'Game Programming',
            'author' => 'Bengkel Koding',
            'day' => 'Senin - Jumat',
            'hour' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=60ffabea50867a5af1ab63905905c95a',
            'url_overview' => 'index.php?page=63d72051e901c069f8aa1b32aa0c43bb',
            'description' => 'course Game Programming adalah peluang untuk memasuki dunia yang mendebarkan dari pengembangan permainan. Anda akan mempelajari dasar-dasar pemrograman, grafika, fisika, dan desain permainan untuk menciptakan pengalaman bermain yang seru dan memukau. Anda akan mengembangkan keterampilan dalam membuat permainan dari awal hingga selesai, memungkinkan Anda untuk menjelajahi kreativitas Anda dan mewujudkan ide-ide permainan Anda sendiri. Bersiaplah untuk merambah ke dalam dunia game development yang penuh tantangan dan mendebarkan dengan course ini!',
            'tools' => 'Download dan Install Unity,Menghubungkan Object,Animation Sprite 2D,Persiapan Asset Game,Android Deployment,dll',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
