<?php

namespace Database\Seeders;

use App\Models\LevOrderRow;
use Illuminate\Database\Seeder;

class LevOrderRowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LevOrderRow::factory()
        ->times(10)
        ->create();
    }
}
