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
            <h3 class="mb-6 font-semibold">Informations générales</h3>
            <div class="grid gap-5 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="title" class="mb-2 block text-sm font-semibold text-slate-700">Titre du projet *</label>
                    <input id="title" name="title" value="{{ old('title', $project?->title) }}" required maxlength="255"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-[#70a744] focus:ring-4 focus:ring-[#70a744]/10"
                        placeholder="Ex. Résidence Les Oliviers">
                </div>
                <div>
                    <label for="location" class="mb-2 block text-sm font-semibold text-slate-700">Localisation</label>
                    <input id="location" name="location" value="{{ old('location', $project?->location) }}" maxlength="255"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-[#70a744] focus:ring-4 focus:ring-[#70a744]/10"
                        placeholder="Ville, quartier ou adresse">
                </div>
                <div>
                    <label for="property_type" class="mb-2 block text-sm font-semibold text-slate-700">Type de bien *</label>
                    <select id="property_type" name="property_type" required class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none focus:border-[#70a744]">
                        @foreach (\App\Models\Project::PROPERTY_TYPES as $value => $label)
                            <option value="{{ $value }}" @selected(old('property_type', $project?->property_type ?? 'residence') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">Description</label>
                    <textarea id="description" name="description" rows="7" maxlength="5000"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-[#70a744] focus:ring-4 focus:ring-[#70a744]/10"
                        placeholder="Présentez le projet, ses atouts et ses caractéristiques...">{{ old('description', $project?->description) }}</textarea>
                </div>
            </div>
        </section>

        <section class="rounded-2xl border border-slate-200/80 bg-white p-6 lg:p-8">
            <h3 class="mb-6 font-semibold">Planning et budget</h3>
            <div class="grid gap-5 sm:grid-cols-3">
                <div>
                    <label for="start_date" class="mb-2 block text-sm font-semibold text-slate-700">Date de début</label>
                    <input id="start_date" name="start_date" type="date" value="{{ old('start_date', $project?->start_date?->format('Y-m-d')) }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-[#70a744]">
                </div>
                <div>
                    <label for="end_date" class="mb-2 block text-sm font-semibold text-slate-700">Date de fin</label>
                    <input id="end_date" name="end_date" type="date" value="{{ old('end_date', $project?->end_date?->format('Y-m-d')) }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-[#70a744]">
                </div>
                <div>
                    <label for="budget" class="mb-2 block text-sm font-semibold text-slate-700">Budget (DA)</label>
                    <input id="budget" name="budget" type="number" min="0" step="0.01" value="{{ old('budget', $project?->budget) }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-[#70a744]" placeholder="0">
                </div>
            </div>
        </section>
    </div>

    <div class="space-y-6">
        <section class="rounded-2xl border border-slate-200/80 bg-white p-6">
            <h3 class="mb-5 font-semibold">Publication</h3>
            <label for="status" class="mb-2 block text-sm font-semibold text-slate-700">Statut *</label>
            <select id="status" name="status" required class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none focus:border-[#70a744]">
                @foreach (\App\Models\Project::STATUSES as $value => $label)
                    <option value="{{ $value }}" @selected(old('status', $project?->status ?? 'new') === $value)>{{ $label }}</option>
                @endforeach
            </select>
            <label class="mt-5 flex cursor-pointer items-start gap-3 rounded-xl bg-slate-50 p-4">
                <input name="is_published" type="checkbox" value="1" @checked(old('is_published', $project?->is_published ?? false)) class="mt-0.5 h-4 w-4 accent-[#58883a]">
                <span>
                    <span class="block text-sm font-semibold text-slate-700">Publier sur le site</span>
                    <span class="mt-1 block text-xs leading-5 text-slate-400">Le projet sera visible dans la future vitrine publique.</span>
                </span>
            </label>
        </section>

        <section class="rounded-2xl border border-slate-200/80 bg-white p-6">
            <h3 class="mb-5 font-semibold">Image principale</h3>
            @if ($project?->image_path)
                <img src="{{ asset('storage/'.$project->image_path) }}" alt="" class="mb-4 aspect-video w-full rounded-xl object-cover">
            @endif
            <label for="image" class="grid cursor-pointer place-items-center rounded-xl border border-dashed border-slate-300 px-5 py-8 text-center hover:border-[#70a744]">
                <span class="text-sm font-semibold text-slate-600">{{ $project?->image_path ? 'Remplacer l’image' : 'Choisir une image' }}</span>
                <span class="mt-1 text-xs text-slate-400">JPG, PNG ou WebP — 4 Mo maximum</span>
            </label>
            <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp" class="sr-only">
        </section>

        <div class="flex gap-3">
            <a href="{{ route('admin.projets.index') }}" class="flex-1 rounded-xl border border-slate-200 px-5 py-3 text-center text-sm font-semibold text-slate-600">Annuler</a>
            <button type="submit" class="flex-1 rounded-xl bg-[#153827] px-5 py-3 text-sm font-semibold text-white hover:bg-[#214f39]">
                {{ $submitLabel }}
            </button>
        </div>
    </div>
</div>
