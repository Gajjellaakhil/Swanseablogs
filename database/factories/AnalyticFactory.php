<?php

namespace Database\Factories;

use App\Models\Analytic;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnalyticFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Analytic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => function () {
                return Article::factory()->create()->id;
            },
            'views_count' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
