<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ride;
use Carbon\Carbon;

class RideFactory extends Factory
{
    protected $model = Ride::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' =>  $this->faker->unique()->numberBetween(1,1000),
            'date' => Carbon::now(),
            'grade' => $this->faker->numberBetween(1,5),
            'description' => 'Obicni opis',
            'driver' => $this->faker->numberBetween(1,10),
            'car' => $this->faker->numberBetween(1,10),
        ];
    }
}
