<?php

namespace Database\Seeders;

use App\Models\Productstate;
use Illuminate\Database\Seeder;

class ProductstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Productstate::factory()
        ->times(10)
        ->create();
    }
}
