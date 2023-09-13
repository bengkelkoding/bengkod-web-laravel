<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikel')->insert([
            'id_section' => '1',
            'nama' => 'Pengantar',
            'isi' => 'Ini isi pengantar',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('artikel')->insert([
            'id_section' => '2',
            'nama' => 'Konsep Dasar Web Programming',
            'isi' => 'Ini isi',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('artikel')->insert([
            'id_section' => '2',
            'nama' => 'Pengenalan Tools',
            'isi' => 'Ini isi',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('artikel')->insert([
            'id_section' => '2',
            'nama' => 'Responsive Web Design',
            'isi' => 'Ini isi',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('artikel')->insert([
            'id_section' => '3',
            'nama' => 'To Do List',
            'isi' => 'Ini isi',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('artikel')->insert([
            'id_section' => '3',
            'nama' => 'Poliklinik',
            'isi' => 'Ini isi',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
