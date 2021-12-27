<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Mercedes', 'Audi', 'Citroen']),
            'country' => $this->faker->randomElement(['DE', 'FR', 'AU', 'BA']),
        ];
    }
}

