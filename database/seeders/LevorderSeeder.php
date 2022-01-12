<?php

namespace Database\Seeders;

use App\Models\Levorder;
use Illuminate\Database\Seeder;

class LevorderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Levorder::factory()
        ->times(10)
        ->create();
    }
}
