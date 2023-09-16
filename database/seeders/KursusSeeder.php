<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kursus')->insert([
            'image' => 'assets/img/img1.png',
            'judul' => 'Web Developer',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=a56764040f7c92578bb2c011f845aae9',
            'description' => 'Pelatihan Web Developer terbagi menjadi dua tahap (kelas) yaitu Junior Web Developer dan Web Developer. Materi yang diajarkan pada kedua kelas berbeda namun berkelanjutan. Pada modul Junior Web Developer berisi tentang dasar-dasar dari pemrograman web dengan permasalahan yang sering dialami mahasiswa. Sedangkan pada modul Web Developer berisi materi pemrograman web dengan menggunakan framework. Sehingga peserta yang lulus pada setiap kelas berhak melanjutkan ke kelas selanjutnya.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'image' => 'assets/img/img2.png',
            'judul' => 'Mobile Developer',
            'author' => 'Fahri Firdausillah, Syaifur Rohman, dkk',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=1d63721b0fb4c25cbae5c02375064885',
            'description' => 'Dikursus ini kita akan belajar Mobile Developer menggunakan Flutter. Flutter adalah sebuah SDK (Software Development Kit) open source yang dikembangkan oleh Google. Tujuan utamanya adalah untuk memudahkan pembuatan aplikasi yang dapat berjalan di berbagai platform, atau yang biasa disebut sebagai multi-platform. Dengan Flutter, pengembang dapat membangun aplikasi untuk sistem operasi Android, iOS, Web, Windows, Linux, dan MacOS dengan menggunakan kode yang sama, tanpa perlu menulis ulang kode secara terpisah. Selain itu, Flutter juga dapat digunakan baik sebagai bagian dari aplikasi native yang sudah ada maupun sebagai dasar pembangunan aplikasi baru.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'image' => 'assets/img/img3.png',
            'judul' => 'Data Science',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=05523a261ba32a27ed36e885a86f9fed',
            'description' => 'Selamat datang dalam modul pembelajaran online tentang Data Science. Modul ini dirancang untuk memberi Anda pemahaman yang komprehensif tentang konsep, metode, dan aplikasi yang terkait dengan Data Science. Dalam era digital yang terus berkembang, Data Science telah menjadi elemen kunci dalam pengambilan keputusan yang informasional dan cerdas di berbagai bidang, mulai dari bisnis hingga penelitian ilmiah.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'image' => 'assets/img/img5.png',
            'judul' => 'Computer Vision',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=a82f3db817c535a4bae230a7ce1aebdd',
            'description' => 'Kursus ini dirancang sebagai panduan komprehensif untuk memahami dan menerapkan teknik computer vision menggunakan bahasa pemrograman Python. Kursus ini ditujukan untuk individu yang berminat dalam bidang computer vision, baik mereka yang baru memulai perjalanan mereka atau mereka yang sudah memiliki pengalaman dasar dalam bidang ini dan ingin memperdalam pengetahuan mereka. Kursus ini mencakup berbagai topik mulai dari konsep dasar computer vision dan image processing, hingga teknik machine learning dan deep learning yang canggih yang digunakan dalam aplikasi computer vision. Selain itu, kursus ini juga mencakup bagian penting tentang etika dalam computer vision, suatu topik yang sering diabaikan tetapi sangat penting.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'image' => 'assets/img/img4.png',
            'judul' => 'Game Programming',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=60ffabea50867a5af1ab63905905c95a',
            'description' => 'Kursus Game Programming adalah peluang untuk memasuki dunia yang mendebarkan dari pengembangan permainan. Anda akan mempelajari dasar-dasar pemrograman, grafika, fisika, dan desain permainan untuk menciptakan pengalaman bermain yang seru dan memukau. Anda akan mengembangkan keterampilan dalam membuat permainan dari awal hingga selesai, memungkinkan Anda untuk menjelajahi kreativitas Anda dan mewujudkan ide-ide permainan Anda sendiri. Bersiaplah untuk merambah ke dalam dunia game development yang penuh tantangan dan mendebarkan dengan kursus ini!',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
