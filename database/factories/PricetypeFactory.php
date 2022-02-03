<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Productstate;
use Illuminate\Database\Eloquent\Factories\Factory;

class PricetypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
