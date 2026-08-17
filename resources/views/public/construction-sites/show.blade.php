@extends('layouts.public')

@section('title', $constructionSite->title.' — Vertcity')
@section('meta-description', \Illuminate\Support\Str::limit($constructionSite->description ?: 'Suivez l’avancement de ce chantier Vertcity.', 155))

@section('content')
    <section class="relative min-h-[600px] overflow-hidden bg-[#153827]">
        <img src="{{ $constructionSite->cover_image_path ? asset('storage/'.$constructionSite->cover_image_path) : asset('images/vertcity-residence-principale.png') }}"
            alt="{{ $constructionSite->title }}" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-[#10281d]/95 via-[#10281d]/35 to-black/25"></div>
        <div class="relative mx-auto flex min-h-[600px] max-w-7xl items-end px-6 pb-16 pt-36 text-white lg:px-10">
            <div class="max-w-3xl">
                <span class="rounded-full bg-[#b8dc79] px-3 py-1.5 text-xs font-semibold text-[#153827]">{{ $constructionSite->status_label }}</span>
                @if ($constructionSite->project)
                    <p class="mt-5 text-sm font-semibold uppercase tracking-[0.18em] text-[#b8dc79]">{{ $constructionSite->project->title }}</p>
                @endif
                <h1 class="heading-hero mt-3 text-4xl leading-tight md:text-6xl">{{ $constructionSite->title }}</h1>
                @if ($constructionSite->location)
                    <p class="mt-5 text-lg text-white/75 glow-soft">⌖ {{ $constructionSite->location }}</p>
                @endif
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 py-20 lg:px-10">
        <div class="grid gap-12 lg:grid-cols-[1.4fr_0.7fr]">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[#79a84c]">Suivi des travaux</p>
                <h2 class="heading-section mt-4 text-3xl">État d’avancement</h2>
                <p class="mt-6 whitespace-pre-line leading-8 text-slate-600">{{ $constructionSite->description ?: 'Les travaux progressent selon les étapes prévues. Retrouvez ici les mises à jour et les photos du chantier.' }}</p>
            </div>
            <aside class="panel-luminous rounded-2xl bg-[#edf1e9] p-7">
                <div class="flex items-end justify-between">
                    <span class="text-sm font-semibold text-[#315f41]">Progression globale</span>
                    <strong class="text-3xl text-[#315f41]">{{ $constructionSite->progress_percentage }}%</strong>
                </div>
                <div class="mt-4 h-3 overflow-hidden rounded-full bg-white shadow-[inset_0_1px_3px_rgba(16,40,29,0.15)]">
                    <div class="h-full rounded-full bg-[#79a84c] shadow-[0_0_14px_2px_rgba(121,168,76,0.75)]" style="width: {{ $constructionSite->progress_percentage }}%"></div>
                </div>
                <dl class="mt-7 space-y-5 text-sm">
                    @if ($constructionSite->start_date)
                        <div class="flex justify-between gap-4 border-b border-[#d7e0d1] pb-4">
                            <dt class="text-slate-500">Début des travaux</dt>
                            <dd class="font-semibold">{{ $constructionSite->start_date->format('d/m/Y') }}</dd>
                        </div>
                    @endif
                    @if ($constructionSite->expected_completion_date)
                        <div class="flex justify-between gap-4">
                            <dt class="text-slate-500">Livraison prévue</dt>
                            <dd class="font-semibold">{{ $constructionSite->expected_completion_date->format('d/m/Y') }}</dd>
                        </div>
                    @endif
                </dl>
            </aside>
        </div>

        @if ($constructionSite->photos->isNotEmpty())
            <div class="mt-20">
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[#79a84c]">Galerie</p>
                <h2 class="heading-section mt-4 text-3xl">Photos du chantier</h2>
                <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($constructionSite->photos as $photo)
                        <figure class="card-luminous overflow-hidden rounded-2xl bg-slate-100">
                            <img src="{{ asset('storage/'.$photo->image_path) }}" alt="{{ $photo->caption ?: $constructionSite->title }}" class="aspect-[4/3] h-full w-full object-cover">
                            @if ($photo->caption)
                                <figcaption class="p-4 text-sm text-slate-500">{{ $photo->caption }}</figcaption>
                            @endif
                        </figure>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    <section class="bg-[#153827] px-6 py-20 text-center text-white">
        <p lang="ar" dir="rtl" class="text-arabic glow-arabic text-3xl font-semibold">نبني اليوم لنعيش أفضل غدًا</p>
        <p class="mx-auto mt-4 max-w-xl text-white/65 glow-soft">Nous suivons chaque étape avec exigence pour construire durablement.</p>
    </section>
@endsection
