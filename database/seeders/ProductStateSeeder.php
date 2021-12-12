<?php

namespace Database\Seeders;

use App\Models\ProductState;
use Illuminate\Database\Seeder;

class ProductStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductState::factory()
        ->times(10)
        ->create();
    }
}
