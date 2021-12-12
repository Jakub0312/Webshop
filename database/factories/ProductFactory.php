<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\ProductState;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'category_id' => Category::all()->random()->id,
            'description' => $this->faker->paragraph(5),
            'specifications' => $this->faker->paragraph(5),
            'productstate_id' => ProductState::all()->random()->id,
            'stock' => $this->faker->numberBetween(0, 500)
        ];
    }
}
