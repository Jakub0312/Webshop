<?php

namespace Database\Seeders;

use App\Models\Levorderstate;
use Illuminate\Database\Seeder;

class LevorderstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Levorderstate::factory()
        ->times(10)
        ->create();
    }
}
