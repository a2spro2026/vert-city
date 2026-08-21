@php
    $tone = $tone ?? 'light';
    $size = $size ?? 'md';
    $showTagline = $showTagline ?? false;
    $sizes = [
        'sm' => ['mark' => 'h-9 w-9', 'text' => 'text-lg', 'gap' => 'gap-2.5'],
        'md' => ['mark' => 'h-11 w-11', 'text' => 'text-xl', 'gap' => 'gap-3'],
        'lg' => ['mark' => 'h-14 w-14', 'text' => 'text-2xl', 'gap' => 'gap-3.5'],
    ];
    $s = $sizes[$size] ?? $sizes['md'];
@endphp

<a href="{{ $href ?? route('home') }}" class="brand-lockup brand-lockup--{{ $tone }} inline-flex items-center {{ $s['gap'] }} {{ $class ?? '' }}">
    <span class="brand-emblem {{ $s['mark'] }}">
        <img src="{{ asset('images/vertcity-logo.png') }}" alt="Vertcity" class="h-full w-full object-contain" width="112" height="112">
    </span>
    <span class="leading-tight">
        <span class="brand-wordmark font-display {{ $s['text'] }} font-bold tracking-[0.14em]">
            VERT<span class="brand-wordmark-accent">CITY</span>
        </span>
        @if ($showTagline)
            <span class="brand-tagline mt-0.5 block text-[10px] font-medium tracking-[0.18em] uppercase">Promotion immobilière</span>
        @endif
    </span>
</a>
