<?php

namespace Database\Factories;

use App\Models\ConstructionSite;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<ConstructionSite>
 */
class ConstructionSiteFactory extends Factory
{
    public function definition(): array
    {
        $title = 'Chantier '.fake()->unique()->words(3, true);

        return [
            'project_id' => Project::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'location' => fake()->city(),
            'status' => 'in_progress',
            'progress_percentage' => fake()->numberBetween(5, 95),
            'start_date' => now()->subMonths(2),
            'expected_completion_date' => now()->addYear(),
            'description' => fake()->paragraph(),
            'is_published' => false,
        ];
    }
}
