@if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
        <p class="font-semibold">Veuillez corriger les informations suivantes :</p>
        <ul class="mt-2 list-inside list-disc space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-6 xl:grid-cols-[1.5fr_1fr]">
    <div class="space-y-6">
        <section class="rounded-2xl border border-slate-200/80 bg-white p-6 lg:p-8">
            <h3 class="mb-6 font-semibold">Informations du chantier</h3>
            <div class="grid gap-5 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="title" class="mb-2 block text-sm font-semibold text-slate-700">Titre du chantier *</label>
                    <input id="title" name="title" value="{{ old('title', $constructionSite?->title) }}" required maxlength="255"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-[#70a744] focus:ring-4 focus:ring-[#70a744]/10"
                        placeholder="Ex. Travaux Résidence Les Oliviers">
                </div>
                <div>
                    <label for="project_id" class="mb-2 block text-sm font-semibold text-slate-700">Projet associé</label>
                    <select id="project_id" name="project_id" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none focus:border-[#70a744]">
                        <option value="">Aucun projet</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" @selected((string) old('project_id', $constructionSite?->project_id) === (string) $project->id)>{{ $project->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="location" class="mb-2 block text-sm font-semibold text-slate-700">Localisation</label>
                    <input id="location" name="location" value="{{ old('location', $constructionSite?->location) }}" maxlength="255"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-[#70a744]"
                        placeholder="Ville, quartier ou adresse">
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">Description des travaux</label>
                    <textarea id="description" name="description" rows="7" maxlength="5000"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-[#70a744] focus:ring-4 focus:ring-[#70a744]/10"
                        placeholder="Décrivez les travaux réalisés et les prochaines étapes...">{{ old('description', $constructionSite?->description) }}</textarea>
                </div>
            </div>
        </section>

        <section class="rounded-2xl border border-slate-200/80 bg-white p-6 lg:p-8">
            <h3 class="mb-6 font-semibold">Planning et avancement</h3>
            <div class="grid gap-5 sm:grid-cols-3">
                <div>
                    <label for="start_date" class="mb-2 block text-sm font-semibold text-slate-700">Date de début</label>
                    <input id="start_date" name="start_date" type="date" value="{{ old('start_date', $constructionSite?->start_date?->format('Y-m-d')) }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-[#70a744]">
                </div>
                <div>
                    <label for="expected_completion_date" class="mb-2 block text-sm font-semibold text-slate-700">Livraison prévue</label>
                    <input id="expected_completion_date" name="expected_completion_date" type="date" value="{{ old('expected_completion_date', $constructionSite?->expected_completion_date?->format('Y-m-d')) }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-[#70a744]">
                </div>
                <div>
                    <label for="progress_percentage" class="mb-2 block text-sm font-semibold text-slate-700">Avancement (%) *</label>
                    <input id="progress_percentage" name="progress_percentage" type="number" min="0" max="100" value="{{ old('progress_percentage', $constructionSite?->progress_percentage ?? 0) }}" required
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-[#70a744]">
                </div>
            </div>
        </section>

        <section class="rounded-2xl border border-slate-200/80 bg-white p-6 lg:p-8">
            <h3 class="font-semibold">Galerie d’avancement</h3>
            <p class="mt-1 text-sm text-slate-400">Ajoutez jusqu’à 8 photos par enregistrement.</p>

            @if ($constructionSite?->photos?->isNotEmpty())
                <div class="mt-5 grid grid-cols-2 gap-4 sm:grid-cols-3">
                    @foreach ($constructionSite->photos as $photo)
                        <label class="group relative cursor-pointer overflow-hidden rounded-xl">
                            <img src="{{ asset('storage/'.$photo->image_path) }}" alt="" class="aspect-square w-full object-cover">
                            <span class="absolute inset-x-0 bottom-0 flex items-center gap-2 bg-black/65 px-3 py-2 text-xs text-white">
                                <input name="remove_photos[]" type="checkbox" value="{{ $photo->id }}" class="accent-red-500">
                                Supprimer
                            </span>
                        </label>
                    @endforeach
                </div>
            @endif

            <label for="photos" class="mt-5 grid cursor-pointer place-items-center rounded-xl border border-dashed border-slate-300 px-5 py-9 text-center hover:border-[#70a744]">
                <span class="text-sm font-semibold text-slate-600">Ajouter des photos</span>
                <span class="mt-1 text-xs text-slate-400">JPG, PNG ou WebP — sélection multiple</span>
            </label>
            <input id="photos" name="photos[]" type="file" accept=".jpg,.jpeg,.png,.webp" multiple class="sr-only">
        </section>
    </div>

    <div class="space-y-6">
        <section class="rounded-2xl border border-slate-200/80 bg-white p-6">
            <h3 class="mb-5 font-semibold">État et publication</h3>
            <label for="status" class="mb-2 block text-sm font-semibold text-slate-700">Statut *</label>
            <select id="status" name="status" required class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none focus:border-[#70a744]">
                @foreach (\App\Models\ConstructionSite::STATUSES as $value => $label)
                    <option value="{{ $value }}" @selected(old('status', $constructionSite?->status ?? 'planned') === $value)>{{ $label }}</option>
                @endforeach
            </select>
            <label class="mt-5 flex cursor-pointer items-start gap-3 rounded-xl bg-slate-50 p-4">
                <input name="is_published" type="checkbox" value="1" @checked(old('is_published', $constructionSite?->is_published ?? false)) class="mt-0.5 h-4 w-4 accent-[#58883a]">
                <span>
                    <span class="block text-sm font-semibold text-slate-700">Publier sur le site</span>
                    <span class="mt-1 block text-xs leading-5 text-slate-400">Le chantier et sa galerie seront visibles publiquement.</span>
                </span>
            </label>
        </section>

        <section class="rounded-2xl border border-slate-200/80 bg-white p-6">
            <h3 class="mb-5 font-semibold">Image principale</h3>
            @if ($constructionSite?->cover_image_path)
                <img src="{{ asset('storage/'.$constructionSite->cover_image_path) }}" alt="" class="mb-4 aspect-video w-full rounded-xl object-cover">
            @endif
            <label for="cover_image" class="grid cursor-pointer place-items-center rounded-xl border border-dashed border-slate-300 px-5 py-8 text-center hover:border-[#70a744]">
                <span class="text-sm font-semibold text-slate-600">{{ $constructionSite?->cover_image_path ? 'Remplacer l’image' : 'Choisir une image' }}</span>
                <span class="mt-1 text-xs text-slate-400">JPG, PNG ou WebP — 4 Mo maximum</span>
            </label>
            <input id="cover_image" name="cover_image" type="file" accept=".jpg,.jpeg,.png,.webp" class="sr-only">
        </section>

        <div class="flex gap-3">
            <a href="{{ route('admin.chantiers.index') }}" class="flex-1 rounded-xl border border-slate-200 px-5 py-3 text-center text-sm font-semibold text-slate-600">Annuler</a>
            <button type="submit" class="flex-1 rounded-xl bg-[#153827] px-5 py-3 text-sm font-semibold text-white hover:bg-[#214f39]">{{ $submitLabel }}</button>
        </div>
    </div>
</div>
