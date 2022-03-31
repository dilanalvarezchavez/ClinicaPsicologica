<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AuthorizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUsers();
        $this->createRoles();
        $this->createPermissions();
        $this->assignRolePermissions();
        $this->assignUserRoles();
    }

    private function createUsers()
    {
        $password = bcrypt('root');

        User::factory()->create(
            [
                'dni' => '1724034184',
                'name' => 'Bryan',
                'password' => $password,
            ]
        );
    }

    private function createRoles()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'guest']);
    }

    private function createPermissions()
    {
        // Permission::create(['name' => 'view-users']);
        // Permission::create(['name' => 'store-users']);
        // Permission::create(['name' => 'update-users']);
        // Permission::create(['name' => 'delete-users']);

        // Permission::create(['name' => 'download-files']);
        // Permission::create(['name' => 'upload-files']);
        // Permission::create(['name' => 'read-files']);
        // Permission::create(['name' => 'write-files']);
        // Permission::create(['name' => 'delete-files']);

        $permissions = [
            // //Operaciones sobre tabla roles
            // 'ver-rol',
            // 'crear-rol',
            // 'editar-rol',
            // 'borrar-rol',

            // //Operacions sobre tabla paper
            // 'ver-paper',
            // 'crear-paper',
            // 'editar-paper',
            // 'borrar-paper',
            //operaciones sobre usuarios
            'view-users',
            'store-users',
            'update-users',
            'delete-users'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }

    private function assignRolePermissions()
    {
        $role = Role::firstWhere('name', 'admin');
        $role->syncPermissions(Permission::get());
    }

    private function assignUserRoles()
    {
        $user = User::find(1);
        $user->assignRole('admin');
    }
}
