<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'kode' => 'MHS01',
            'name' => 'Fadly Sofyansyah',
            'email' => 'ian@gmail.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'kode' => 'DSN01',
            'name' => 'Arif Saputra',
            'email' => 'arif@gmail.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'kode' => 'ADMN01',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'kode' => 'SPRADMN',
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
        ]);
        $user->assignRole($role4);
    }
}
