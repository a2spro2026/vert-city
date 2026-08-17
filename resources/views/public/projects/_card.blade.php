<article class="card-luminous group overflow-hidden rounded-2xl bg-white ring-1 ring-slate-200/60 hover:-translate-y-1">
    <a href="{{ route('public.projects.show', ['project' => $project->slug]) }}" class="block">
        <div class="relative aspect-[4/3] overflow-hidden bg-[#dfe8d9]">
            @if ($project->image_path)
                <img src="{{ asset('storage/'.$project->image_path) }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
            @else
                <img src="{{ asset('images/vertcity-residence-principale.png') }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/45 via-transparent to-transparent"></div>
            <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1.5 text-xs font-semibold text-[#274a35] backdrop-blur">
                {{ $project->property_type_label }}
            </span>
            @if ($project->location)
                <span class="absolute bottom-4 left-4 text-sm font-medium text-white">⌖ {{ $project->location }}</span>
            @endif
        </div>
        <div class="p-6">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#79a84c]">{{ $project->status_label }}</p>
            <h3 class="font-display mt-2 text-xl font-semibold text-[#18251e]">{{ $project->title }}</h3>
            <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-500">{{ $project->description ?: 'Un programme immobilier pensé pour offrir confort, qualité et sérénité.' }}</p>
            <span class="mt-5 inline-flex text-sm font-semibold text-[#315f41]">Découvrir le projet →</span>
        </div>
    </a>
</article>
