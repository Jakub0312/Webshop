<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@webshop.nl',
            'password' => Hash::make('test1234')
        ]);
        $customer->assignRole('customer');

        $buyer = User::factory()->create([
            'name' => 'Buyer',
            'email' => 'buyer@webshop.nl',
            'password' => Hash::make('test1234')
        ]);
        $buyer->assignRole('buyer');

        $sales = User::factory()->create([
            'name' => 'Sales',
            'email' => 'sales@webshop.nl',
            'password' => Hash::make('test1234')
        ]);
        $sales->assignRole('sales');

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@webshop.nl',
            'password' => Hash::make('test1234')
        ]);
        $admin->assignRole('admin');
    }
}
