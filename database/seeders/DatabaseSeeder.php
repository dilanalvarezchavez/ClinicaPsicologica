<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call([
            RolSeeder::class
        ]);
        User::create([
            'dni' => '1713177655 ',
            'name' => 'Fabian Romero',
            'phone' => '0992927892',
            'password' => bcrypt('GsFdjE@2021.12')

        ])->assignRole('Admin');
    }
}
