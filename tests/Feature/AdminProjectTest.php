<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProjectTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create();
    }

    public function test_admin_can_view_projects_list(): void
    {
        $project = Project::factory()->create();

        $this->actingAs($this->admin)
            ->get(route('admin.projets.index'))
            ->assertOk()
            ->assertSee($project->title);
    }

    public function test_admin_can_create_project(): void
    {
        $this->actingAs($this->admin)
            ->post(route('admin.projets.store'), [
                'title' => 'Résidence Les Oliviers',
                'location' => 'Alger',
                'property_type' => 'residence',
                'description' => 'Un nouveau projet résidentiel.',
                'status' => 'new',
                'start_date' => '2026-09-01',
                'end_date' => '2027-09-01',
                'budget' => 15000000,
                'is_published' => '1',
            ])
            ->assertRedirect(route('admin.projets.index'));

        $this->assertDatabaseHas('projects', [
            'title' => 'Résidence Les Oliviers',
            'slug' => 'residence-les-oliviers',
            'is_published' => true,
        ]);
    }

    public function test_duplicate_titles_receive_unique_slugs(): void
    {
        Project::factory()->create([
            'title' => 'Vert Parc',
            'slug' => 'vert-parc',
        ]);

        $this->actingAs($this->admin)
            ->post(route('admin.projets.store'), [
                'title' => 'Vert Parc',
                'property_type' => 'residence',
                'status' => 'new',
            ]);

        $this->assertDatabaseHas('projects', ['slug' => 'vert-parc-2']);
    }

    public function test_admin_can_update_project(): void
    {
        $project = Project::factory()->create();

        $this->actingAs($this->admin)
            ->put(route('admin.projets.update', $project), [
                'title' => 'Projet mis à jour',
                'property_type' => 'apartment',
                'status' => 'in_progress',
                'is_published' => '1',
            ])
            ->assertRedirect(route('admin.projets.index'));

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'Projet mis à jour',
            'status' => 'in_progress',
            'is_published' => true,
        ]);
    }

    public function test_admin_can_delete_project(): void
    {
        $project = Project::factory()->create();

        $this->actingAs($this->admin)
            ->delete(route('admin.projets.destroy', $project))
            ->assertRedirect(route('admin.projets.index'));

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    public function test_project_dates_are_validated(): void
    {
        $this->actingAs($this->admin)
            ->post(route('admin.projets.store'), [
                'title' => 'Projet invalide',
                'property_type' => 'residence',
                'status' => 'new',
                'start_date' => '2027-01-01',
                'end_date' => '2026-01-01',
            ])
            ->assertSessionHasErrors('end_date');
    }
}
