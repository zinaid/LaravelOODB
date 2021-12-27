<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;
class DriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::factory()->count(10)->create();
    }
}
