@extends('layouts.admin')

@section('title', 'Nouveau chantier')
@section('page-title', 'Nouveau chantier')

@section('content')
    <div class="mb-7">
        <a href="{{ route('admin.chantiers.index') }}" class="text-sm font-medium text-slate-400 hover:text-[#376127]">← Retour aux chantiers</a>
        <h2 class="mt-3 text-2xl font-semibold tracking-tight">Créer un chantier</h2>
        <p class="mt-2 text-slate-500">Enregistrez le planning, l’avancement et les premières photos.</p>
    </div>

    <form method="POST" action="{{ route('admin.chantiers.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.construction-sites._form', ['submitLabel' => 'Créer'])
    </form>
@endsection
