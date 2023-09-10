<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
            'name' => 'ian',
            'email' => 'ian@gmail.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'arif',
            'email' => 'arif@gmail.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
        ]);
        $user->assignRole($role4);
    }
}
