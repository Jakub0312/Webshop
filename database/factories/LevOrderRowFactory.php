<?php

namespace Database\Factories;

use App\Models\LevOrder;
use App\Models\LevOrderState;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevOrderRowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(0, 100),
            'product_id' => Product::all()->random()->id,
            'levorder_id' => LevOrder::all()->random()->id,
            'expected' => $this->faker->date,
            'levorderstate_id' => LevOrderState::all()->random()->id
        ];
    }
}
