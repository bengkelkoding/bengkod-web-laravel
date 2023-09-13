<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Relation with Web Developer
        DB::table('section')->insert([
            'id_kursus' => 1,
            'nama_section' => 'Pengantar',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 1,
            'nama_section' => 'Konsep',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 1,
            'nama_section' => 'Studi Kasus',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Relation with Mobile Developer
        DB::table('section')->insert([
            'id_kursus' => 2,
            'nama_section' => 'Pengantar',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 2,
            'nama_section' => 'Konsep',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 2,
            'nama_section' => 'Studi Kasus',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Relation with Data Science
        DB::table('section')->insert([
            'id_kursus' => 3,
            'nama_section' => 'Pengantar',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 3,
            'nama_section' => 'Konsep',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 3,
            'nama_section' => 'Studi Kasus',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Relation with Computer Vision
        DB::table('section')->insert([
            'id_kursus' => 4,
            'nama_section' => 'Pengantar',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 4,
            'nama_section' => 'Konsep',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 4,
            'nama_section' => 'Studi Kasus',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Relation with Game Programming
        DB::table('section')->insert([
            'id_kursus' => 5,
            'nama_section' => 'Pengantar',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 5,
            'nama_section' => 'Konsep',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 5,
            'nama_section' => 'Studi Kasus',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('section')->insert([
            'id_kursus' => 5,
            'nama_section' => 'Contoh Produk',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
