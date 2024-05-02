<?php

use Illuminate\Database\Seeder;
use App\Models\Analytic;

class AnalyticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Analytic::factory()->count(50)->create();
    }
}
