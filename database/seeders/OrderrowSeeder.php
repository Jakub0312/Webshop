<?php

namespace Database\Seeders;

use App\Models\Orderrow;
use Illuminate\Database\Seeder;

class OrderrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orderrow::factory()
            ->times(10)
            ->create();
    }
}
