<?php

namespace Database\Seeders;

use App\Models\Pricetype;
use Illuminate\Database\Seeder;

class PricetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pricetype::factory()
        ->times(10)
        ->create();
    }
}
