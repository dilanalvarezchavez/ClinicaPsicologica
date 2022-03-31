<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 =  Role::create(['name' => 'Admin']);
        $role2 =  Role::create(['name' => 'User']);

        Permission::create(['name' => 'index-user'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'store-user'])->assignRole($role1);
        Permission::create(['name' => 'update-user'])->assignRole($role1);
        Permission::create(['name' => 'destroy-user'])->assignRole($role1);

        Permission::create(['name' => 'index-paper'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'store-paper'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'update-paper'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'destroy-paper'])->assignRole($role1);

        Permission::create(['name' => 'index-rol'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'store-rol'])->assignRole($role1);
        Permission::create(['name' => 'update-rol'])->assignRole($role1);
        Permission::create(['name' => 'destroy-rol'])->assignRole($role1);
    }
}
