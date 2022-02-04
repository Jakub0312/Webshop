<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create([
            'name' => 'Processors'
        ]);
        Category::factory()->create([
            'name' => 'Graphics Cards'
        ]);
        Category::factory()->create([
            'name' => 'Motherboards'
        ]);
        Category::factory()->create([
            'name' => 'Ram'
        ]);
        Category::factory()->create([
            'name' => 'Harddrives'
        ]);
        Category::factory()->create([
            'name' => 'SSD (Solid State Drive)'
        ]);
        Category::factory()->create([
            'name' => 'Power Supplies'
        ]);
        Category::factory()->create([
            'name' => 'Cases'
        ]);
        Category::factory()->create([
            'name' => 'Fans'
        ]);
    }
}
