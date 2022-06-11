<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Super-Admin'
        ]);

        Role::create([
            'name' => 'Owner'
        ]);

        Role::create([
            'name' => 'Admin'
        ]);

        Role::create([
            'name' => 'Receptionist'
        ]);

        Role::create([
            'name' => 'Maid'
        ]);

        Role::create([
            'name' => 'Guest'
        ]);
    }
}
