<?php

namespace Modules\Rest\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Rest\Entities\Rest;

class RestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'space' => rand(80, 200),
            'price' => rand(500, 10000),
            'description' => fake()->realText(),
        ];
    }
}

