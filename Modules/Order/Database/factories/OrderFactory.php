<?php

namespace Modules\Order\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Auth\Database\Seeders\UserSeeder;
use Modules\Rest\Database\Seeders\RestDatabaseSeeder;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Order\Entities\Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'user_id' => 1,
            'rest_id' => rand(1, 100),
            'price' => rand(500, 2000),
        ];
    }
}

