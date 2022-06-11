<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pedro Adrian Sánchez Cárdenas',
            'email' => 'it@domain.com',
            'phone' => '9999999999',
            'password' => Hash::make('Pedro41217')
        ]);

        User::create([
            'name' => 'Rodrigo Diaz Serviran',
            'email' => 'it2@domain.com',
            'phone' => '9999999998',
            'password' => Hash::make('Rodrigo2012')
        ]);
    }
}
