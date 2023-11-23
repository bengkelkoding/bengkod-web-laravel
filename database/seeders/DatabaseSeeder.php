<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

                // \App\Models\User::factory()->create([
        //     'kode' => rand(10,100));
        //     'name' => 'arif',
        //     'email' => 'arif@gmail.com',
        //     'password' => bcrypt('password'),
        // ]);

        $this->call([
            PermissionSeeder::class,
            KursusSeeder::class,
        ]);
    }
}
