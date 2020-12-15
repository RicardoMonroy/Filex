<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'admin.config']);
        Permission::create(['name' => 'admin.user']);
        Permission::create(['name' => 'admin.landing']);
        Permission::create(['name' => 'admin.roles']);
        Permission::create(['name' => 'admin.permissions']);

        $programmer = Role::create(['name' => 'Programmer']);
        $admin = Role::create(['name' => 'Admin']);
        $basic = Role::create(['name' => 'Basic']);
        $premium = Role::create(['name' => 'Premium']);

        $programmer->givePermissionTo(Permission::all());
        $admin->givePermissionTo([
            'admin.config',
            'admin.user',
            'admin.landing',
            'admin.roles',
        ]);

        $user = User::find(1);
        $user->assignRole($programmer);
    }
}