<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="{{ app()->isProduction() ? 'index,follow' : 'noindex,nofollow' }}">

    <title>@yield('title', 'Montagna Servizi SCPA') — Servizi per le Sezioni CAI</title>
    <meta name="description" content="@yield('description', 'Montagna Servizi SCPA offre servizi di segreteria, comunicazione, contabilità e consulenza alle Sezioni e ai Gruppi Regionali del Club Alpino Italiano.')">

    {{-- Open Graph --}}
    <meta property="og:title"       content="@yield('title', 'Montagna Servizi SCPA')">
    <meta property="og:description" content="@yield('description', 'Servizi per le Sezioni CAI')">
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ url()->current() }}">
    @hasSection('og_image')
    <meta property="og:image"       content="@yield('og_image')">
    @endif

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">

    {{-- Design system --}}
    <link rel="stylesheet" href="/css/app.css">

    {{-- Google Tag Manager (head) --}}
    @if(config('services.gtm.container_id'))
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ config('services.gtm.container_id') }}');</script>
    @endif

    @stack('head')
</head>
<body>

{{-- Google Tag Manager (body) --}}
@if(config('services.gtm.container_id'))
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('services.gtm.container_id') }}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
@endif

{{-- Skip to content --}}
<a class="skip-to-content" href="#main-content">Vai al contenuto principale</a>

{{-- Header --}}
<x-header />

{{-- Main --}}
<main id="main-content">
    @yield('content')
</main>

{{-- Footer --}}
<x-footer />

{{-- Cookie banner --}}
@if(config('services.cookie_banner_enabled'))
<div x-data="cookieBanner()" x-cloak>
    <div x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="ms-cookie-banner"
         role="dialog"
         aria-label="Informativa cookie">
        <div>
            <p>
                Questo sito utilizza cookie tecnici necessari al funzionamento e, previo consenso,
                cookie analitici (Google Analytics). Consulta la
                <a href="/cookie-policy">Cookie Policy</a> e la <a href="/privacy-policy">Privacy Policy</a>.
            </p>
            <div class="ms-cookie-banner__actions">
                <button @click="accept()" class="ms-btn ms-btn--primary ms-btn--sm">Accetto</button>
                <button @click="reject()" class="ms-btn ms-btn--outline-white ms-btn--sm">Solo necessari</button>
            </div>
        </div>
    </div>
</div>
@endif

{{-- Alpine.js --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

<script>
function cookieBanner() {
    return {
        show: !localStorage.getItem('ms_cookie_consent'),
        accept() {
            localStorage.setItem('ms_cookie_consent', 'all');
            this.show = false;
        },
        reject() {
            localStorage.setItem('ms_cookie_consent', 'necessary');
            this.show = false;
        },
    }
}
</script>

@stack('scripts')
</body>
</html>
