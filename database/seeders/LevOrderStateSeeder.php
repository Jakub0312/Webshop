<?php

namespace Database\Seeders;

use App\Models\LevOrderState;
use Illuminate\Database\Seeder;

class LevOrderStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LevOrderState::factory()
        ->times(10)
        ->create();
    }
}
