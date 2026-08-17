@extends('layouts.public')

@section('title', $title.' — Vertcity')
@section('meta-description', $subtitle)

@section('content')
    <section class="relative overflow-hidden bg-[#153827] px-6 pb-20 pt-40 text-white">
        <div class="absolute inset-0 opacity-15 [background-image:radial-gradient(circle_at_80%_20%,#b8dc79_0,transparent_35%)]"></div>
        <div class="relative mx-auto max-w-7xl lg:px-4">
            <p lang="ar" dir="rtl" class="text-arabic glow-arabic mb-3 w-fit text-xl font-semibold">نصنع مساحات للحياة</p>
            <h1 class="heading-hero text-4xl md:text-6xl">{{ $title }}</h1>
            <p class="mt-5 max-w-2xl text-lg leading-8 text-white/70 glow-soft">{{ $subtitle }}</p>
        </div>
    </section>

    <section class="mx-auto min-h-[500px] max-w-7xl px-6 py-20 lg:px-10">
        @if ($projects->isNotEmpty())
            <div class="grid gap-7 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($projects as $project)
                    @include('public.projects._card')
                @endforeach
            </div>
            @if ($projects->hasPages())
                <div class="mt-12">{{ $projects->links() }}</div>
            @endif
        @else
            <div class="panel-luminous grid min-h-80 place-items-center rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-center">
                <div>
                    <div class="mx-auto mb-4 grid h-14 w-14 place-items-center rounded-2xl bg-[#edf3e8] text-xl text-[#67913f]">◇</div>
                    <h2 class="font-display text-xl font-semibold">Les prochaines réalisations arrivent</h2>
                    <p class="mt-3 max-w-md text-sm leading-6 text-slate-500">Notre équipe prépare actuellement de nouveaux programmes. Revenez bientôt pour les découvrir.</p>
                    <a href="{{ route('home') }}" class="btn-glow-dark mt-6 inline-flex rounded-full bg-[#153827] px-5 py-3 text-sm font-semibold text-white">Retour à l’accueil</a>
                </div>
            </div>
        @endif
    </section>
@endsection
