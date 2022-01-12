<?php

namespace Database\Factories;

use App\Models\Levorder;
use App\Models\Levorderstate;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevorderrowFactory extends Factory
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
            'levorder_id' => Levorder::all()->random()->id,
            'expected' => $this->faker->date,
            'levorderstate_id' => Levorderstate::all()->random()->id
        ];
    }
}
