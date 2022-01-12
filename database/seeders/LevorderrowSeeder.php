<?php

namespace Database\Seeders;

use App\Models\Levorderrow;
use Illuminate\Database\Seeder;

class LevorderrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Levorderrow::factory()
        ->times(10)
        ->create();
    }
}
