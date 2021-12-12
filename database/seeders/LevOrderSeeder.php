<?php

namespace Database\Seeders;

use App\Models\LevOrder;
use Illuminate\Database\Seeder;

class LevOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LevOrder::factory()
        ->times(10)
        ->create();
    }
}
