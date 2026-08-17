<?php

namespace Tests\Feature;

use App\Models\ConstructionSite;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminConstructionSiteTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    public function test_admin_can_view_construction_sites(): void
    {
        $site = ConstructionSite::factory()->create();

        $this->actingAs($this->admin)
            ->get(route('admin.chantiers.index'))
            ->assertOk()
            ->assertSee($site->title);
    }

    public function test_admin_can_create_construction_site(): void
    {
        $project = Project::factory()->create();

        $this->actingAs($this->admin)
            ->post(route('admin.chantiers.store'), [
                'project_id' => $project->id,
                'title' => 'Chantier Résidence Horizon',
                'location' => 'Alger',
                'status' => 'in_progress',
                'progress_percentage' => 35,
                'start_date' => '2026-01-01',
                'expected_completion_date' => '2027-01-01',
                'description' => 'Le gros œuvre est en cours.',
                'is_published' => '1',
            ])
            ->assertRedirect(route('admin.chantiers.index'));

        $this->assertDatabaseHas('construction_sites', [
            'title' => 'Chantier Résidence Horizon',
            'slug' => 'chantier-residence-horizon',
            'progress_percentage' => 35,
            'is_published' => true,
        ]);
    }

    public function test_admin_can_update_construction_progress(): void
    {
        $site = ConstructionSite::factory()->create(['progress_percentage' => 20]);

        $this->actingAs($this->admin)
            ->put(route('admin.chantiers.update', $site), [
                'project_id' => $site->project_id,
                'title' => $site->title,
                'status' => 'in_progress',
                'progress_percentage' => 60,
                'is_published' => '1',
            ])
            ->assertRedirect(route('admin.chantiers.index'));

        $this->assertDatabaseHas('construction_sites', [
            'id' => $site->id,
            'progress_percentage' => 60,
            'is_published' => true,
        ]);
    }

    public function test_admin_can_delete_construction_site(): void
    {
        $site = ConstructionSite::factory()->create();

        $this->actingAs($this->admin)
            ->delete(route('admin.chantiers.destroy', $site))
            ->assertRedirect(route('admin.chantiers.index'));

        $this->assertDatabaseMissing('construction_sites', ['id' => $site->id]);
    }

    public function test_progress_cannot_exceed_one_hundred_percent(): void
    {
        $this->actingAs($this->admin)
            ->post(route('admin.chantiers.store'), [
                'title' => 'Chantier invalide',
                'status' => 'in_progress',
                'progress_percentage' => 120,
            ])
            ->assertSessionHasErrors('progress_percentage');
    }
}
