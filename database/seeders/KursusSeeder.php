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
            'url' => 'index.php?page=',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'image' => 'assets/img/img2.png',
            'judul' => 'Mobile Developer',
            'author' => 'Fahri Firdausillah, Syaifur Rohman, dkk',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'image' => 'assets/img/img3.png',
            'judul' => 'Data Science',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'image' => 'assets/img/img4.png',
            'judul' => 'Computer Vision',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'image' => 'assets/img/img5.png',
            'judul' => 'Game Programming',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'url' => 'index.php?page=',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
