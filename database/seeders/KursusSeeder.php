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
            'judul' => 'Web Developer',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'judul' => 'Mobile Developer',
            'author' => 'Fahri Firdausillah, Syaifur Rohman, dkk',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'judul' => 'Data Science',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'judul' => 'Computer Vision',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'judul' => 'Game Programming',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
