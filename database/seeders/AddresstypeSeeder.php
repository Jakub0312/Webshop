<?php

namespace Database\Seeders;

use App\Models\Addresstype;
use Illuminate\Database\Seeder;

class AddresstypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Addresstype::factory()->create([
            'name' => 'Shipping address'
        ]);

        Addresstype::factory()->create([
            'name' => 'Billing address'
        ]);

        Addresstype::factory()->create([
            'name' => 'Shipping + Billing address'
        ]);
    }
}
