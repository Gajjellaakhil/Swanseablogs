<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'body' => $this->faker->paragraph,
            'user_id' => User::factory(),
            'article_id' => Article::factory(),
        ];
    }
}
