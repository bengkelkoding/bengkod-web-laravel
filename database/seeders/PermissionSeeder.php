<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view modul']);
        Permission::create(['name' => 'create modul']);
        Permission::create(['name' => 'edit modul']);
        Permission::create(['name' => 'delete modul']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'mahasiswa']);
        $role1->givePermissionTo('view modul');

        $role2 = Role::create(['name' => 'dosen']);
        $role2->givePermissionTo('view modul');
        $role2->givePermissionTo('create modul');
        $role2->givePermissionTo('edit modul');
        $role2->givePermissionTo('delete modul');

        $role3 = Role::create(['name' => 'admin']);
        $role3->givePermissionTo(Permission::all());

        $role4 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'id_kursus' => '1',
            'kode' => 'MHS01',
            'name' => 'Muhammad Roynaldy',
            'email' => 'roy@bengkelkoding.id',
            'password' => Hash::make('bengkelkoding'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'id_kursus' => '2',
            'kode' => 'MHS02',
            'name' => 'Samuel Andrey',
            'email' => 'sam@bengkelkoding.id',
            'password' => Hash::make('bengkelkoding'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'id_kursus' => '3',
            'kode' => 'MHS03',
            'name' => 'Muhammad hafizh Dzaky',
            'email' => 'hafizh@bengkelkoding.id',
            'password' => Hash::make('bengkelkoding'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'id_kursus' => '4',
            'kode' => 'MHS04',
            'name' => 'Rajendra Nohan',
            'email' => 'rano@bengkelkoding.id',
            'password' => Hash::make('bengkelkoding'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'kode' => 'DSN01',
            'name' => 'Arif Saputra',
            'email' => 'arif@bengkelkoding.id',
            'password' => Hash::make('bengkelkoding'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'kode' => 'DSN02',
            'name' => 'Sri Winarno',
            'email' => 'sri@bengkelkoding.id',
            'password' => Hash::make('bengkelkoding'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'kode' => 'DSN03',
            'name' => 'Adhitya Nugraha',
            'email' => 'adhitya@bengkelkoding.id',
            'password' => Hash::make('bengkelkoding'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'kode' => 'DSN04',
            'name' => 'Ardytha Luthfiarta',
            'email' => 'ardytha@bengkelkoding.id',
            'password' => Hash::make('bengkelkoding'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'kode' => 'ADMN01',
            'name' => 'admin',
            'email' => 'admin@bengkelkoding.id',
            'password' => Hash::make('bengkelkoding'),
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'kode' => 'SPRADMN',
            'name' => 'superadmin',
            'email' => 'superadmin@bengkelkoding.id',
            'password' => Hash::make('bengkelkoding'),
        ]);
        $user->assignRole($role4);
    }
}
