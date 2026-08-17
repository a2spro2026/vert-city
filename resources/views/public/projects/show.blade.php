@extends('layouts.public')

@section('title', $project->title.' — Vertcity')
@section('meta-description', \Illuminate\Support\Str::limit($project->description ?: 'Découvrez ce projet immobilier Vertcity.', 155))

@section('content')
    <section class="relative min-h-[620px] overflow-hidden bg-[#153827]">
        <img src="{{ $project->image_path ? asset('storage/'.$project->image_path) : asset('images/vertcity-residence-principale.png') }}"
            alt="{{ $project->title }}" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-[#10281d]/95 via-[#10281d]/35 to-black/25"></div>
        <div class="relative mx-auto flex min-h-[620px] max-w-7xl items-end px-6 pb-16 pt-36 text-white lg:px-10">
            <div class="max-w-3xl">
                <div class="mb-5 flex flex-wrap gap-2">
                    <span class="rounded-full bg-white/15 px-3 py-1.5 text-xs font-semibold backdrop-blur">{{ $project->property_type_label }}</span>
                    <span class="rounded-full bg-[#b8dc79] px-3 py-1.5 text-xs font-semibold text-[#153827]">{{ $project->status_label }}</span>
                </div>
                <h1 class="heading-hero text-4xl leading-tight md:text-6xl">{{ $project->title }}</h1>
                @if ($project->location)
                    <p class="mt-5 text-lg text-white/75 glow-soft">⌖ {{ $project->location }}</p>
                @endif
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-12 px-6 py-20 lg:grid-cols-[1.5fr_0.7fr] lg:px-10">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[#79a84c]">Présentation</p>
            <h2 class="heading-section mt-4 text-3xl">À propos du projet</h2>
            <div class="mt-6 whitespace-pre-line text-base leading-8 text-slate-600">{{ $project->description ?: 'Ce programme immobilier a été imaginé pour offrir un cadre de vie confortable, moderne et durable.' }}</div>
        </div>
        <aside class="panel-luminous rounded-2xl bg-[#edf1e9] p-7">
            <p class="text-sm font-semibold text-[#315f41]">Informations</p>
            <dl class="mt-6 space-y-5 text-sm">
                <div class="flex justify-between gap-4 border-b border-[#d7e0d1] pb-4">
                    <dt class="text-slate-500">Type</dt>
                    <dd class="font-semibold">{{ $project->property_type_label }}</dd>
                </div>
                <div class="flex justify-between gap-4 border-b border-[#d7e0d1] pb-4">
                    <dt class="text-slate-500">État</dt>
                    <dd class="font-semibold">{{ $project->status_label }}</dd>
                </div>
                @if ($project->start_date)
                    <div class="flex justify-between gap-4 border-b border-[#d7e0d1] pb-4">
                        <dt class="text-slate-500">Démarrage</dt>
                        <dd class="font-semibold">{{ $project->start_date->translatedFormat('F Y') }}</dd>
                    </div>
                @endif
            </dl>
            <p class="mt-7 text-xs leading-5 text-slate-500">Pour les disponibilités et davantage d’informations, contactez directement notre équipe commerciale.</p>
        </aside>
    </section>

    <section class="bg-[#153827] px-6 py-20 text-center text-white">
        <p lang="ar" dir="rtl" class="text-arabic glow-arabic text-3xl font-semibold">خطوتك الأولى نحو بيتك الجديد</p>
        <h2 class="heading-invert mt-4 text-2xl">Votre projet commence ici.</h2>
        <p class="mx-auto mt-4 max-w-xl text-white/55">Notre équipe est à votre écoute pour vous présenter cette réalisation.</p>
    </section>
@endsection
