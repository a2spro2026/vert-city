@php
    $items = [
        ['route' => 'admin.dashboard', 'label' => 'Tableau de bord', 'icon' => '⌂'],
        ['route' => 'admin.fournisseurs', 'label' => 'Fournisseurs', 'icon' => '◆'],
        ['route' => 'admin.chantiers.index', 'active' => 'admin.chantiers.*', 'label' => 'Chantiers', 'icon' => '▦'],
        ['route' => 'admin.facturation', 'label' => 'Facturation', 'icon' => '▤'],
        ['route' => 'admin.charges', 'label' => 'Charges', 'icon' => '↘'],
        ['route' => 'admin.projets.index', 'active' => 'admin.projets.*', 'label' => 'Projets', 'icon' => '◇'],
        ['route' => 'admin.configuration', 'label' => 'Configuration', 'icon' => '⚙'],
    ];
@endphp

<div class="space-y-1">
    @foreach ($items as $item)
        <a href="{{ route($item['route']) }}"
            class="{{ request()->routeIs($item['active'] ?? $item['route']) ? 'bg-white text-[#153827] shadow-[0_10px_26px_-12px_rgba(0,0,0,0.65),inset_0_1px_0_rgba(255,255,255,0.9)]' : 'text-white/65 hover:bg-white/8 hover:text-white' }} flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition">
            <span class="grid h-6 w-6 place-items-center text-base">{{ $item['icon'] }}</span>
            {{ $item['label'] }}
        </a>
    @endforeach
</div>

<form method="POST" action="{{ route('admin.logout') }}" class="mt-8 border-t border-white/10 pt-5">
    @csrf
    <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-white/55 transition hover:bg-red-400/10 hover:text-red-200">
        <span class="grid h-6 w-6 place-items-center">↪</span>
        Déconnexion
    </button>
</form>
