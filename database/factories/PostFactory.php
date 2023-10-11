<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::get()->random()->id,
            'title' => fake()->unique()->sentence('1'),
            'content' => fake()->sentence(),
            'preview_image' => fake()->image(),
            'main_image' => fake()->image(),
            'category_id' => Category::get()->random()->id,
        ];
    }
}
