@extends('layouts.admin')

@section('title', 'Projets')
@section('page-title', 'Projets')

@section('content')
    <div class="mb-7 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h2 class="heading-section text-2xl">Gestion des projets</h2>
            <p class="mt-2 text-slate-500">Créez les projets qui pourront ensuite apparaître sur le site public.</p>
        </div>
        <a href="{{ route('admin.projets.create') }}" class="btn-glow-dark inline-flex items-center justify-center rounded-xl bg-[#153827] px-5 py-3 text-sm font-semibold text-white hover:bg-[#214f39]">
            + Nouveau projet
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <section class="card-luminous overflow-hidden rounded-2xl border border-slate-200/70 bg-white">
        @if ($projects->isEmpty())
            <div class="grid min-h-96 place-items-center p-8 text-center">
                <div>
                    <div class="mx-auto mb-4 grid h-14 w-14 place-items-center rounded-2xl bg-[#e7f0df] text-xl text-[#376127]">◇</div>
                    <h3 class="text-lg font-semibold">Aucun projet</h3>
                    <p class="mt-2 text-sm text-slate-400">Commencez par ajouter votre premier projet immobilier.</p>
                    <a href="{{ route('admin.projets.create') }}" class="mt-6 inline-flex rounded-xl bg-[#153827] px-5 py-3 text-sm font-semibold text-white">Créer un projet</a>
                </div>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="border-b border-slate-100 bg-slate-50/70 text-xs font-semibold uppercase tracking-wider text-slate-400">
                        <tr>
                            <th class="px-6 py-4">Projet</th>
                            <th class="px-6 py-4">Statut</th>
                            <th class="px-6 py-4">Budget</th>
                            <th class="px-6 py-4">Visibilité</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($projects as $project)
                            @php
                                $statusClasses = match ($project->status) {
                                    'new' => 'bg-blue-50 text-blue-700',
                                    'in_progress' => 'bg-amber-50 text-amber-700',
                                    'completed' => 'bg-emerald-50 text-emerald-700',
                                    default => 'bg-slate-100 text-slate-600',
                                };
                            @endphp
                            <tr class="hover:bg-slate-50/60">
                                <td class="px-6 py-4">
                                    <div class="flex min-w-64 items-center gap-4">
                                        @if ($project->image_path)
                                            <img src="{{ asset('storage/'.$project->image_path) }}" alt="" class="h-12 w-16 rounded-lg object-cover">
                                        @else
                                            <div class="grid h-12 w-16 place-items-center rounded-lg bg-[#eef3e9] text-[#70a744]">◇</div>
                                        @endif
                                        <div>
                                            <p class="font-semibold text-slate-800">{{ $project->title }}</p>
                                            <p class="mt-1 text-sm text-slate-400">{{ $project->location ?: 'Localisation non renseignée' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="{{ $statusClasses }} inline-flex rounded-full px-3 py-1 text-xs font-semibold">{{ $project->status_label }}</span>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-600">
                                    {{ $project->budget !== null ? number_format((float) $project->budget, 0, ',', ' ').' DA' : '—' }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="{{ $project->is_published ? 'text-emerald-600' : 'text-slate-400' }} text-sm font-medium">
                                        {{ $project->is_published ? 'Publié' : 'Brouillon' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.projets.edit', $project) }}" class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 hover:border-[#70a744] hover:text-[#376127]">Modifier</a>
                                        <form method="POST" action="{{ route('admin.projets.destroy', $project) }}" onsubmit="return confirm('Supprimer définitivement ce projet ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-lg border border-red-100 px-3 py-2 text-xs font-semibold text-red-500 hover:bg-red-50">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($projects->hasPages())
                <div class="border-t border-slate-100 px-6 py-4">{{ $projects->links() }}</div>
            @endif
        @endif
    </section>
@endsection
