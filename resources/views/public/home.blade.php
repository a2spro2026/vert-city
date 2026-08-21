@extends('layouts.public')

@section('content')
    <section class="relative aspect-[4/3] max-h-[88vh] min-h-[520px] w-full overflow-hidden bg-[#0a1622] sm:min-h-[600px]">
        <img
            src="{{ asset('images/vertcity-residence-principale.png') }}?v={{ filemtime(public_path('images/vertcity-residence-principale.png')) }}"
            alt="Résidence immobilière Vertcity"
            width="1024"
            height="768"
            class="absolute inset-0 h-full w-full object-cover object-[48%_40%]"
        >
        {{-- Voile léger seulement derrière le texte (soleil à gauche) --}}
        <div class="absolute inset-y-0 left-0 w-[min(100%,36rem)] bg-gradient-to-r from-[#071018]/50 via-[#071018]/20 to-transparent"></div>

        <div class="relative mx-auto flex h-full max-w-7xl items-center px-6 pb-16 pt-28 lg:px-10">
            <div class="max-w-xl text-white drop-shadow-[0_2px_20px_rgba(0,0,0,0.55)]">
                <p class="mb-5 text-sm font-semibold uppercase tracking-[0.25em] text-[#b8dc79] glow-eyebrow">Promotion immobilière</p>
                <p lang="ar" dir="rtl" class="text-arabic glow-arabic mb-4 w-fit text-3xl font-semibold md:text-4xl">بيتك يبدأ من هنا</p>
                <h1 class="heading-hero text-4xl leading-[1.08] md:text-6xl lg:text-7xl">Des espaces pensés pour mieux vivre.</h1>
                <p class="mt-6 max-w-lg text-base leading-8 text-white/90 glow-soft md:text-lg">Vertcity imagine et réalise des résidences durables, modernes et harmonieuses pour accompagner vos projets de vie.</p>
                <div class="mt-9 flex flex-wrap gap-3">
                    <a href="{{ route('public.projects.new') }}" class="btn-glow-primary rounded-full bg-[#b8dc79] px-6 py-3.5 text-sm font-semibold text-[#153827] transition hover:bg-white">Découvrir nos projets</a>
                    <a href="{{ route('public.projects.construction') }}" class="btn-glow-outline rounded-full border border-white/40 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white hover:text-[#153827]">Voir les chantiers</a>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 py-24 lg:px-10">
        <div class="grid items-end gap-8 md:grid-cols-2">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[#79a84c]">Notre savoir-faire</p>
                <h2 class="heading-section mt-4 text-4xl leading-tight md:text-5xl">L’immobilier pensé pour votre avenir.</h2>
            </div>
            <p class="max-w-xl leading-8 text-slate-500 md:justify-self-end">De la conception à la livraison, Vertcity place la qualité architecturale, le confort et la transparence au cœur de chaque réalisation.</p>
        </div>

        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach ([
                ['number' => '01', 'title' => 'Résidences & appartements', 'text' => 'Des espaces lumineux, fonctionnels et conçus pour le quotidien.'],
                ['number' => '02', 'title' => 'Maisons contemporaines', 'text' => 'Une architecture soignée qui conjugue intimité, confort et élégance.'],
                ['number' => '03', 'title' => 'Chantiers maîtrisés', 'text' => 'Un suivi rigoureux et transparent à chaque étape de la construction.'],
            ] as $service)
                <article class="card-luminous halo-light overflow-hidden rounded-2xl border border-slate-200/70 bg-white p-7">
                    <span class="text-xs font-bold text-[#79a84c]">{{ $service['number'] }}</span>
                    <h3 class="font-display mt-10 text-xl font-semibold">{{ $service['title'] }}</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-500">{{ $service['text'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="bg-[#edf1e9] py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-10">
            <div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[#67913f]">Nos réalisations</p>
                    <h2 class="heading-section mt-4 text-4xl">Projets à découvrir</h2>
                </div>
                <a href="{{ route('public.projects.new') }}" class="text-sm font-semibold text-[#315f41]">Voir tous les projets →</a>
            </div>

            @if ($projects->isNotEmpty())
                <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($projects as $project)
                        @include('public.projects._card')
                    @endforeach
                </div>
            @else
                <div class="mt-12 grid gap-6 md:grid-cols-3">
                    @foreach ([
                        ['title' => 'Résidences modernes', 'text' => 'Des programmes conçus autour du confort et de la qualité de vie.', 'position' => 'object-left'],
                        ['title' => 'Appartements lumineux', 'text' => 'Des intérieurs fonctionnels dans des environnements harmonieux.', 'position' => 'object-center'],
                        ['title' => 'Chantiers suivis', 'text' => 'Une réalisation maîtrisée et une information transparente.', 'position' => 'object-right'],
                    ] as $feature)
                        <article class="card-luminous group overflow-hidden rounded-2xl bg-white">
                            <div class="aspect-[4/3] overflow-hidden">
                                <img src="{{ asset('images/vertcity-residence-principale.png') }}" alt="{{ $feature['title'] }}" class="{{ $feature['position'] }} h-full w-full object-cover transition duration-700 group-hover:scale-105">
                            </div>
                            <div class="p-6">
                                <h3 class="font-display text-xl font-semibold">{{ $feature['title'] }}</h3>
                                <p class="mt-3 text-sm leading-6 text-slate-500">{{ $feature['text'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="relative overflow-hidden bg-[#153827] py-24 text-white">
        <div class="absolute inset-0 opacity-15 [background-image:radial-gradient(circle_at_80%_30%,#b8dc79_0,transparent_35%)]"></div>
        <div class="relative mx-auto max-w-4xl px-6 text-center">
            <p lang="ar" dir="rtl" class="text-arabic glow-arabic text-4xl font-semibold md:text-5xl">معًا نبني مكانًا يشبه أحلامكم</p>
            <p class="mx-auto mt-5 max-w-2xl text-lg text-white/70 glow-soft">Ensemble, construisons un lieu à la hauteur de vos rêves.</p>
            <a href="{{ route('public.projects.new') }}" class="btn-glow-primary mt-9 inline-flex rounded-full bg-white px-6 py-3.5 text-sm font-semibold text-[#153827]">Explorer les programmes</a>
        </div>
    </section>
@endsection
