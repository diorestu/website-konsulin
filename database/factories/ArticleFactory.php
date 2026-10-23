<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return ['title' => fake()->sentence(4), 'slug' => fake()->unique()->slug(3), 'excerpt' => fake()->sentence(),
            'content' => '<p>'.fake()->paragraph().'</p>', 'status' => 'draft'];
    }
}
