<?php

namespace Database\Factories;

use App\Models\PriceType;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomFloat(2, 2, 7),
            'effdate' => $this->faker->date,
            'product_id' => Product::all()->random()->id,
            'pricetype_id' => PriceType::all()->random()->id,
        ];
    }
}
