<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Comment::class;
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(), // Automatically create a related post
            'author' => $this->faker->name,
            'content' => $this->faker->sentence,
        ];
    }
}
