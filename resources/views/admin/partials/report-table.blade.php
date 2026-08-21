<div class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-lg">
    <div class="flex items-center gap-2.5 bg-gradient-to-r {{ $accent }} px-5 py-3.5">
        <svg class="h-5 w-5 shrink-0 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        <h3 class="truncate text-sm font-bold uppercase tracking-wide text-white">{{ $title }}</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full min-w-[640px] text-sm">
            <thead>
                <tr class="border-b-2 border-slate-300 bg-gradient-to-r from-slate-100 via-slate-200/90 to-slate-100">
                    @foreach ($columns as $column)
                        <th class="px-4 py-3.5 text-center text-[11px] font-bold uppercase tracking-[0.12em] whitespace-nowrap text-slate-600">{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($rows as $row)
                    <tr class="hover:bg-[#edf5e4]/70">
                        @foreach ($row as $cell)
                            <td class="px-4 py-2.5 text-center text-slate-700">{{ $cell }}</td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) }}" class="px-4 py-10 text-center text-slate-400">
                            <svg class="mx-auto mb-2 h-8 w-8 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Aucune donnée disponible
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
