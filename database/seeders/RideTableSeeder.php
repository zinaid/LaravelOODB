<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ride;

class RideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ride::factory()->count(10)->create();
    }
}
