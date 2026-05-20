@extends('layouts.app')

@section('title', $activeSlug ? ($categories->firstWhere('slug', $activeSlug)?->name . ' — News') : 'News')
@section('description', 'Aggiornamenti, comunicazioni ed approfondimenti per le Sezioni CAI da Montagna Servizi.')

@section('content')

<section class="ms-hero ms-hero--inner">
    <div class="l-container">
        <div class="ms-hero__inner">
            <span class="ms-hero__eyebrow">News e aggiornamenti</span>
            <h1>Ultime notizie</h1>
            <p class="ms-hero__sub">Comunicazioni, eventi e approfondimenti per le Sezioni CAI.</p>
        </div>
    </div>
</section>

{{-- Filter bar --}}
@if($categories->isNotEmpty())
<div class="ms-filter-bar-wrap">
    <div class="l-container">
        <div class="ms-filter-bar">
            <a href="{{ route('news.index') }}"
               class="ms-filter-chip {{ ! $activeSlug ? 'active' : '' }}">
                Tutte
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('news.index', ['categoria' => $cat->slug]) }}"
                   class="ms-filter-chip {{ $activeSlug === $cat->slug ? 'active' : '' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>
@endif

<section class="l-section">
    <div class="l-container">

        @if($articles->isNotEmpty())
            <div class="ms-news-grid">
                @foreach($articles as $article)
                    <x-news-card :article="$article" />
                @endforeach
            </div>

            <div style="margin-top:3rem;">
                {{ $articles->links() }}
            </div>
        @else
            <p class="ms-empty-state">
                Nessun articolo trovato
                @if($activeSlug) nella categoria selezionata @endif.
            </p>
        @endif

    </div>
</section>

@endsection
