<?php

namespace App\Http\Controllers;

use App\Models\ConstructionSite;
use App\Models\Project;
use Illuminate\View\View;

class PublicSiteController extends Controller
{
    public function home(): View
    {
        $projects = $this->publishedProjects()
            ->latest()
            ->take(6)
            ->get();

        return view('public.home', compact('projects'));
    }

    public function newProjects(): View
    {
        $title = 'Projets neufs';
        $subtitle = 'Découvrez nos nouveaux programmes immobiliers conçus pour votre avenir.';
        $projects = $this->publishedProjects()
            ->where('status', 'new')
            ->latest()
            ->paginate(9);

        return view('public.projects.index', compact('projects', 'subtitle', 'title'));
    }

    public function constructionSites(): View
    {
        $title = 'Chantiers en cours';
        $subtitle = 'Suivez l’évolution de nos réalisations immobilières en toute transparence.';
        $constructionSites = ConstructionSite::query()
            ->with(['project', 'photos'])
            ->where('is_published', true)
            ->where('status', 'in_progress')
            ->latest()
            ->paginate(9);

        return view('public.construction-sites.index', compact('constructionSites', 'subtitle', 'title'));
    }

    public function showConstructionSite(ConstructionSite $constructionSite): View
    {
        abort_unless($constructionSite->is_published, 404);
        $constructionSite->load(['project', 'photos']);

        return view('public.construction-sites.show', compact('constructionSite'));
    }

    public function show(Project $project): View
    {
        abort_unless($project->is_published, 404);

        return view('public.projects.show', compact('project'));
    }

    private function publishedProjects()
    {
        return Project::query()->where('is_published', true);
    }
}
