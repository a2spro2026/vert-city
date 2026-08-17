@extends('layouts.admin')

@section('title', 'Modifier le projet')
@section('page-title', 'Modifier le projet')

@section('content')
    <div class="mb-7">
        <a href="{{ route('admin.projets.index') }}" class="text-sm font-medium text-slate-400 hover:text-[#376127]">← Retour aux projets</a>
        <h2 class="mt-3 text-2xl font-semibold tracking-tight">Modifier {{ $project->title }}</h2>
        <p class="mt-2 text-slate-500">Mettez à jour les informations et la visibilité du projet.</p>
    </div>

    <form method="POST" action="{{ route('admin.projets.update', $project) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.projects._form', ['submitLabel' => 'Enregistrer'])
    </form>
@endsection
