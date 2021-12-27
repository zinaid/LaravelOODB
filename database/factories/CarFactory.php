<?php

namespace Database\Factories;
use App\Models\Car;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Malo Auto', 'Limuzina', 'Karavan', 'Dzip']),
            'year' => now(),
            'engine' => $this->faker->randomDigit(),
            'code' => $this->faker->unique()->numberBetween(1,1000),
            'air_condition' => $this->faker->numberBetween(0,1),
            'brand' => $this->faker->numberBetween(1,3),
        ];
    }
}
