<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConstructionSiteRequest;
use App\Models\ConstructionSite;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ConstructionSiteController extends Controller
{
    public function index(): View
    {
        $constructionSites = ConstructionSite::query()
            ->with('project')
            ->withCount('photos')
            ->latest()
            ->paginate(10);

        return view('admin.construction-sites.index', compact('constructionSites'));
    }

    public function create(): View
    {
        return view('admin.construction-sites.create', [
            'constructionSite' => null,
            'projects' => Project::query()->orderBy('title')->get(),
        ]);
    }

    public function store(ConstructionSiteRequest $request): RedirectResponse
    {
        $data = collect($request->validated())
            ->except(['cover_image', 'photos', 'remove_photos'])
            ->all();
        $data['slug'] = $this->uniqueSlug($data['title']);

        if ($request->hasFile('cover_image')) {
            $data['cover_image_path'] = $request->file('cover_image')->store('construction-sites/covers', 'public');
        }

        $constructionSite = ConstructionSite::query()->create($data);
        $this->storeGalleryPhotos($request, $constructionSite);

        return redirect()
            ->route('admin.chantiers.index')
            ->with('success', 'Le chantier a été créé avec succès.');
    }

    public function edit(ConstructionSite $constructionSite): View
    {
        $constructionSite->load('photos');

        return view('admin.construction-sites.edit', [
            'constructionSite' => $constructionSite,
            'projects' => Project::query()->orderBy('title')->get(),
        ]);
    }

    public function update(ConstructionSiteRequest $request, ConstructionSite $constructionSite): RedirectResponse
    {
        $data = collect($request->validated())
            ->except(['cover_image', 'photos', 'remove_photos'])
            ->all();

        if ($constructionSite->title !== $data['title']) {
            $data['slug'] = $this->uniqueSlug($data['title'], $constructionSite);
        }

        if ($request->hasFile('cover_image')) {
            $newPath = $request->file('cover_image')->store('construction-sites/covers', 'public');
            if ($constructionSite->cover_image_path) {
                Storage::disk('public')->delete($constructionSite->cover_image_path);
            }
            $data['cover_image_path'] = $newPath;
        }

        $constructionSite->update($data);
        $this->removeGalleryPhotos($request->input('remove_photos', []), $constructionSite);
        $this->storeGalleryPhotos($request, $constructionSite);

        return redirect()
            ->route('admin.chantiers.index')
            ->with('success', 'Le chantier a été mis à jour.');
    }

    public function destroy(ConstructionSite $constructionSite): RedirectResponse
    {
        $constructionSite->load('photos');

        Storage::disk('public')->delete(
            $constructionSite->photos->pluck('image_path')->push($constructionSite->cover_image_path)->filter()->all()
        );

        $constructionSite->delete();

        return redirect()
            ->route('admin.chantiers.index')
            ->with('success', 'Le chantier a été supprimé.');
    }

    private function storeGalleryPhotos(ConstructionSiteRequest $request, ConstructionSite $constructionSite): void
    {
        $sortOrder = (int) $constructionSite->photos()->max('sort_order');

        foreach ($request->file('photos', []) as $photo) {
            $constructionSite->photos()->create([
                'image_path' => $photo->store('construction-sites/gallery', 'public'),
                'sort_order' => ++$sortOrder,
            ]);
        }
    }

    private function removeGalleryPhotos(array $photoIds, ConstructionSite $constructionSite): void
    {
        $photos = $constructionSite->photos()->whereKey($photoIds)->get();
        Storage::disk('public')->delete($photos->pluck('image_path')->all());
        $constructionSite->photos()->whereKey($photoIds)->delete();
    }

    private function uniqueSlug(string $title, ?ConstructionSite $ignoredSite = null): string
    {
        $baseSlug = Str::slug($title) ?: 'chantier';
        $slug = $baseSlug;
        $suffix = 2;

        while (ConstructionSite::query()
            ->where('slug', $slug)
            ->when($ignoredSite, fn ($query) => $query->whereKeyNot($ignoredSite->getKey()))
            ->exists()) {
            $slug = "{$baseSlug}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
