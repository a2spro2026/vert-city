<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->unique()->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'location' => fake()->city(),
            'property_type' => 'residence',
            'description' => fake()->paragraph(),
            'status' => 'new',
            'start_date' => now()->addMonth(),
            'end_date' => now()->addYear(),
            'budget' => fake()->numberBetween(1_000_000, 100_000_000),
            'is_published' => false,
        ];
    }
}
