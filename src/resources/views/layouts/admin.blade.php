<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title', 'Admin') — Montagna Servizi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
    @stack('head')
</head>
<body class="ms-admin-body">

<div class="ms-admin-layout">

    {{-- Sidebar --}}
    <aside class="ms-admin-sidebar">
        <div class="ms-admin-sidebar__brand">
            <span class="ms-admin-sidebar__brand-text">Montagna Servizi</span>
            <span class="ms-admin-sidebar__brand-sub">Pannello Admin</span>
        </div>
        <nav class="ms-admin-nav">
            <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
                Dashboard
            </a>
            <a href="/admin/news" class="{{ request()->is('admin/news*') ? 'active' : '' }}">
                News
            </a>
            <a href="/admin/categories" class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
                Categorie news
            </a>
            <a href="/admin/services" class="{{ request()->is('admin/services*') ? 'active' : '' }}">
                Servizi
            </a>
            <a href="/admin/team" class="{{ request()->is('admin/team*') ? 'active' : '' }}">
                Team
            </a>
            <a href="/admin/governance" class="{{ request()->is('admin/governance*') ? 'active' : '' }}">
                Governance / CdA
            </a>
            <a href="/admin/users" class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                Utenti
            </a>
        </nav>
        <div class="ms-admin-sidebar__foot">
            <a href="/" target="_blank" class="ms-admin-sidebar__view-site">Vedi il sito →</a>
            <form method="POST" action="/admin/logout">
                @csrf
                <button type="submit" class="ms-admin-sidebar__logout">Esci</button>
            </form>
        </div>
    </aside>

    {{-- Main --}}
    <div class="ms-admin-main">
        <header class="ms-admin-topbar">
            <h1 class="ms-admin-topbar__title">@yield('title', 'Dashboard')</h1>
            <div class="ms-admin-topbar__actions">@yield('actions')</div>
        </header>

        @if(session('success'))
        <div class="ms-admin-alert ms-admin-alert--success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="ms-admin-alert ms-admin-alert--error">{{ session('error') }}</div>
        @endif

        <div class="ms-admin-content">
            @yield('content')
        </div>
    </div>

</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
@stack('scripts')
</body>
</html>
