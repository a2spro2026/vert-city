@extends('layouts.admin')

@section('title', 'Modifier le chantier')
@section('page-title', 'Modifier le chantier')

@section('content')
    <div class="mb-7">
        <a href="{{ route('admin.chantiers.index') }}" class="text-sm font-medium text-slate-400 hover:text-[#376127]">← Retour aux chantiers</a>
        <h2 class="mt-3 text-2xl font-semibold tracking-tight">Modifier {{ $constructionSite->title }}</h2>
        <p class="mt-2 text-slate-500">Actualisez l’avancement, le planning et les photos du chantier.</p>
    </div>

    <form method="POST" action="{{ route('admin.chantiers.update', $constructionSite) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.construction-sites._form', ['submitLabel' => 'Enregistrer'])
    </form>
@endsection
