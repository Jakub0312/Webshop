<?php

namespace Database\Factories;

use App\Models\Levorder;
use App\Models\Levorderstate;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevorderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' =>$this->faker->date
        ];
    }
}
