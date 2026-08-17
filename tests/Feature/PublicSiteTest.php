<?php

namespace Tests\Feature;

use App\Models\ConstructionSite;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicSiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_displays_real_estate_content(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Des espaces pensés pour mieux vivre.')
            ->assertSee('بيتك يبدأ من هنا');
    }

    public function test_only_published_new_projects_are_listed(): void
    {
        $published = Project::factory()->create([
            'title' => 'Résidence publiée',
            'status' => 'new',
            'is_published' => true,
        ]);
        $draft = Project::factory()->create([
            'title' => 'Résidence brouillon',
            'status' => 'new',
            'is_published' => false,
        ]);

        $this->get(route('public.projects.new'))
            ->assertOk()
            ->assertSee($published->title)
            ->assertDontSee($draft->title);
    }

    public function test_only_published_active_sites_appear_on_construction_page(): void
    {
        $published = ConstructionSite::factory()->create([
            'title' => 'Chantier Vert Horizon',
            'status' => 'in_progress',
            'is_published' => true,
        ]);
        $draft = ConstructionSite::factory()->create([
            'title' => 'Chantier non publié',
            'status' => 'in_progress',
            'is_published' => false,
        ]);

        $this->get(route('public.projects.construction'))
            ->assertOk()
            ->assertSee($published->title)
            ->assertDontSee($draft->title);
    }

    public function test_draft_construction_site_detail_is_not_public(): void
    {
        $site = ConstructionSite::factory()->create(['is_published' => false]);

        $this->get(route('public.construction-sites.show', ['constructionSite' => $site->slug]))
            ->assertNotFound();
    }

    public function test_draft_project_detail_is_not_public(): void
    {
        $project = Project::factory()->create(['is_published' => false]);

        $this->get(route('public.projects.show', ['project' => $project->slug]))
            ->assertNotFound();
    }
}
