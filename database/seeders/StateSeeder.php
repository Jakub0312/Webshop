<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::factory()->create([
            'name' => 'Placed'
        ]);
        State::factory()->create([
            'name' => 'Being processed'
        ]);
        State::factory()->create([
            'name' => 'Ready for shipping'
        ]);
        State::factory()->create([
            'name' => 'Shipped'
        ]);
        State::factory()->create([
            'name' => 'Delivered!'
        ]);
        State::factory()->create([
            'name' => 'Cancelled!'
        ]);
    }
}

