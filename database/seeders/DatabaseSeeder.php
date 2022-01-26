<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ProductstateSeeder::class,
            CategorySeeder::class,
            PricetypeSeeder::class,
<<<<<<< HEAD
            ProductSeeder::class,
            PriceSeeder::class
=======
            StateSeeder::class,
            OrderSeeder::class,
            ProductSeeder::class,
            PriceSeeder::class,
            OrderrowSeeder::class,
            AddresstypeSeeder::class,
            AddressSeeder::class,
>>>>>>> develop
        ]);
    }
}
