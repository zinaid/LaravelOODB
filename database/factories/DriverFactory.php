<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Driver;

class DriverFactory extends Factory
{

    protected $model = Driver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->name(),
            'lastname' => $this->faker->lastname(),
            'level' => $this->faker->numberBetween(1,5),
            'description' => 'Obicni opis vozaca',
        ];
    }
}
