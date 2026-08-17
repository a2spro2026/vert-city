<article class="card-luminous group overflow-hidden rounded-2xl bg-white ring-1 ring-slate-200/60 hover:-translate-y-1">
    <a href="{{ route('public.construction-sites.show', ['constructionSite' => $site->slug]) }}" class="block">
        <div class="relative aspect-[4/3] overflow-hidden bg-[#dfe8d9]">
            <img src="{{ $site->cover_image_path ? asset('storage/'.$site->cover_image_path) : asset('images/vertcity-residence-principale.png') }}"
                alt="{{ $site->title }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-transparent to-transparent"></div>
            <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1.5 text-xs font-semibold text-[#274a35] backdrop-blur">
                {{ $site->status_label }}
            </span>
            @if ($site->location)
                <span class="absolute bottom-4 left-4 text-sm font-medium text-white">⌖ {{ $site->location }}</span>
            @endif
            @if ($site->photos->isNotEmpty())
                <span class="absolute bottom-4 right-4 rounded-full bg-black/35 px-3 py-1 text-xs font-medium text-white backdrop-blur">▧ {{ $site->photos->count() }} photos</span>
            @endif
        </div>
        <div class="p-6">
            @if ($site->project)
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#79a84c]">{{ $site->project->title }}</p>
            @endif
            <h3 class="font-display mt-2 text-xl font-semibold text-[#18251e]">{{ $site->title }}</h3>
            <div class="mt-5">
                <div class="mb-2 flex items-center justify-between text-xs font-semibold">
                    <span class="text-slate-400">Avancement des travaux</span>
                    <span class="text-[#315f41]">{{ $site->progress_percentage }}%</span>
                </div>
                <div class="h-2 overflow-hidden rounded-full bg-slate-100 shadow-[inset_0_1px_2px_rgba(16,40,29,0.12)]">
                    <div class="h-full rounded-full bg-[#79a84c] shadow-[0_0_10px_1px_rgba(121,168,76,0.7)]" style="width: {{ $site->progress_percentage }}%"></div>
                </div>
            </div>
            <p class="mt-4 line-clamp-2 text-sm leading-6 text-slate-500">{{ $site->description ?: 'Suivez les principales étapes et l’évolution de ce chantier immobilier.' }}</p>
            <span class="mt-5 inline-flex text-sm font-semibold text-[#315f41]">Voir l’avancement →</span>
        </div>
    </a>
</article>
