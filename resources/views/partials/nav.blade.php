@php
    $links = [
        ['route' => 'home', 'label' => 'Home'],
        ['route' => 'about', 'label' => 'About'],
        ['route' => 'customers.index', 'label' => 'Customer Accounts'],
        ['route' => 'users.index', 'label' => 'User Accounts'],
    ];
@endphp

<header class="topbar">
    <div class="container topbar-inner">
        <a href="{{ route('home') }}" class="brand" aria-label="{{ config('app.name') }} home">
            <span class="brand-mark" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M7 20h10M12 16v4M7 8h4M7 12h2"/></svg>
            </span>
            <span class="brand-name">{{ config('app.name') }}</span>
        </a>

        <nav class="nav" aria-label="Main navigation">
            @foreach ($links as $link)
                <a href="{{ route($link['route']) }}"
                   class="nav-link {{ request()->routeIs($link['route']) ? 'is-active' : '' }}"
                   @if (request()->routeIs($link['route'])) aria-current="page" @endif>
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>
    </div>
</header>
