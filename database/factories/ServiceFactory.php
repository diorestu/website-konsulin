<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(2), 'name' => fake()->sentence(3), 'summary' => fake()->sentence(),
            'description' => fake()->paragraph(), 'scope' => ['Pembahasan kebutuhan'], 'preparation' => ['Profil usaha'],
            'sort_order' => 20, 'is_active' => true, 'related_services' => [],
        ];
    }
}
