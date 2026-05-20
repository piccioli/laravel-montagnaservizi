@php
    $typeformUrl = config('services.typeform.url');
    $currentPath = request()->path();
@endphp

<header class="ms-header" role="banner">
    <div class="l-container">
        <div class="ms-header__inner">

            {{-- Logo --}}
            <a href="/" class="ms-header__logo" aria-label="Montagna Servizi SCPA — Home">
                {{-- TODO Fase 5: sostituire con <img src="/images/logo.svg" alt="Montagna Servizi" height="36"> --}}
                <div class="ms-header__logo-text">
                    Montagna Servizi
                    <span>SCPA</span>
                </div>
            </a>

            {{-- Nav desktop --}}
            <nav class="ms-header__nav" aria-label="Navigazione principale">
                <a href="/chi-siamo" class="{{ str_starts_with($currentPath, 'chi-siamo') ? 'active' : '' }}">Chi siamo</a>
                <a href="/servizi"   class="{{ str_starts_with($currentPath, 'servizi')   ? 'active' : '' }}">Servizi</a>
                <a href="/news"      class="{{ str_starts_with($currentPath, 'news')       ? 'active' : '' }}">News</a>
            </nav>

            {{-- CTA desktop --}}
            <div class="ms-header__cta">
                <a href="{{ $typeformUrl }}" target="_blank" rel="noopener" class="ms-btn ms-btn--primary">
                    Contattaci
                </a>
            </div>

            {{-- Hamburger --}}
            <button class="ms-header__hamburger"
                    x-data
                    @click="$dispatch('open-mobile-menu')"
                    aria-label="Apri menu"
                    aria-expanded="false">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <line x1="3" y1="6"  x2="21" y2="6"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
            </button>

        </div>
    </div>
</header>

{{-- Mobile drawer --}}
<div x-data="{ open: false }"
     x-on:open-mobile-menu.window="open = true"
     x-show="open"
     x-cloak
     class="ms-mobile-menu"
     @click.self="open = false"
     role="dialog"
     aria-label="Menu mobile"
     aria-modal="true">

    <div class="ms-mobile-menu__drawer"
         x-transition:enter="transition ease-out duration-250"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full">

        <div class="ms-mobile-menu__head">
            <div class="ms-header__logo-text">Montagna Servizi <span>SCPA</span></div>
            <button class="ms-mobile-menu__close" @click="open = false" aria-label="Chiudi menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6"  y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>

        <nav class="ms-mobile-menu__nav" aria-label="Menu mobile">
            <a href="/chi-siamo" @click="open = false">Chi siamo</a>
            <a href="/servizi"   @click="open = false">Servizi</a>
            <a href="/news"      @click="open = false">News</a>
        </nav>

        <div class="ms-mobile-menu__cta">
            <a href="{{ $typeformUrl }}" target="_blank" rel="noopener" class="ms-btn ms-btn--primary">
                Contattaci
            </a>
        </div>

    </div>
</div>
