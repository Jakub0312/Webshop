<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Addresstype;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address,
            'zipcode' => $this->faker->postcode,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'addresstype_id' => Addresstype::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
