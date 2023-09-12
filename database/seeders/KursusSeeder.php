<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kursus')->insert([
            'id' => 'KWD23',
            'judul' => 'Web Developer',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('kursus')->insert([
            'id' => 'KMD23',
            'judul' => 'Mobile Developer',
            'author' => 'Fahri Firdausillah, Syaifur Rohman, dkk',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);       
        
        DB::table('kursus')->insert([
            'id' => 'KDS23',
            'judul' => 'Data Science',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);        
        
        DB::table('kursus')->insert([
            'id' => 'KCV23',
            'judul' => 'Computer Vision',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);        
        
        DB::table('kursus')->insert([
            'id' => 'KGP23',
            'judul' => 'Game Programming',
            'author' => 'Bengkel Koding',
            'hari' => 'Senin - Jumat',
            'jam' => '09.30 - 12.00 / 12.30 - 15.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
