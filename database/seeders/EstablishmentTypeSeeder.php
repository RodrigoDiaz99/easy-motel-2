<?php

namespace Database\Seeders;

use App\Models\Establishment_type;
use Illuminate\Database\Seeder;

class EstablishmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Establishment_type::create([
            'name' => 'Hotel',
            'user_created_at' => 1
        ]);

        Establishment_type::create([
            'name' => 'Motel',
            'user_created_at' => 1
        ]);
    }
}
