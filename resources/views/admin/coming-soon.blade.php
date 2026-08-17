@extends('layouts.admin')

@section('title', $title)
@section('page-title', $title)

@section('content')
    <section class="grid min-h-[60vh] place-items-center rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-center">
        <div class="max-w-md">
            <div class="mx-auto mb-5 grid h-14 w-14 place-items-center rounded-2xl bg-[#e7f0df] text-xl text-[#376127]">◇</div>
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#70a744]">Prochaine étape</p>
            <h2 class="mt-3 text-2xl font-semibold">Module {{ $title }}</h2>
            <p class="mt-3 leading-7 text-slate-500">La navigation est prête. Les fonctionnalités de ce module seront ajoutées lors de sa phase de développement.</p>
            <a href="{{ route('admin.dashboard') }}" class="mt-7 inline-flex rounded-xl bg-[#153827] px-5 py-3 text-sm font-semibold text-white">Retour au tableau de bord</a>
        </div>
    </section>
@endsection
