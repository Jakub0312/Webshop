<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'orderdate' => Carbon::now(),
            'user_id' => User::all()->random()->id,
            'state_id' => State::all()->random()->id,
        ];
    }
}
