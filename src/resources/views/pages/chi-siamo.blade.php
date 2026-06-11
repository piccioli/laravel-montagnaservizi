@extends('layouts.app')

@section('title', 'Chi siamo')
@section('description', 'Montagna Servizi SCPA: mission, valori, team e governance. Una cooperativa al servizio delle Sezioni CAI.')

@section('content')

{{-- Hero compatto --}}
<section class="ms-hero ms-hero--inner">
    <img src="{{ Storage::url('hero/hero-chi-siamo.webp') }}"
         alt="Escursionisti in cammino su sentiero alpino"
         class="ms-hero__bg-img"
         width="1440" height="500"
         loading="eager"
         role="presentation">
    <div class="l-container">
        <div class="ms-hero__inner">
            <span class="ms-hero__eyebrow">Chi siamo</span>
            <h1>Una cooperativa<br>al servizio del CAI</h1>
        </div>
    </div>
</section>

{{-- Anchor nav --}}
<nav class="ms-anchor-nav" aria-label="Sezioni della pagina">
    <div class="l-container">
        <div class="ms-anchor-nav__list">
            <a href="#mission">Mission e valori</a>
            <a href="#team">Il team</a>
            <a href="#governance">Governance</a>
        </div>
    </div>
</nav>

{{-- Mission e valori --}}
<section class="l-section" id="mission">
    <div class="l-container">
        <div class="l-section-header">
            <h2>La nostra missione</h2>
            <p class="l-section-lead">Montagna Servizi SCPA è nata per permettere alle Sezioni CAI di concentrarsi su ciò che conta davvero — la montagna, la comunità e le persone — liberandole dal peso della gestione amministrativa quotidiana.</p>
        </div>
        <div class="ms-vp-grid">
            <div class="ms-vp-item">
                <span class="ms-vp-icon">🤝</span>
                <h3>Affidabilità</h3>
                <p>Siamo il partner di riferimento del CAI: presenti, responsabili, con processi rodati e risposte rapide. Ogni Sezione sa di poter contare su di noi.</p>
            </div>
            <div class="ms-vp-item">
                <span class="ms-vp-icon">🎓</span>
                <h3>Competenza</h3>
                <p>Team specializzato in Terzo Settore, fiscalità associativa, software Veryfico e strumenti digitali: conosciamo il mondo CAI in profondità.</p>
            </div>
            <div class="ms-vp-item">
                <span class="ms-vp-icon">🏔️</span>
                <h3>Prossimità</h3>
                <p>Siamo una cooperativa: condividiamo i valori del CAI e costruiamo risposte su misura per ogni realtà territoriale, grande o piccola.</p>
            </div>
        </div>
    </div>
</section>

{{-- Team --}}
<section class="l-section l-section--gray" id="team">
    <div class="l-container">
        <div class="l-section-header">
            <h2>Il team</h2>
            <p class="l-section-lead">Le persone che lavorano ogni giorno per le Sezioni CAI.</p>
        </div>
        @if($teamMembers->isNotEmpty())
            <div class="ms-team-grid">
                @foreach($teamMembers as $member)
                    <x-team-card :member="$member" />
                @endforeach
            </div>
        @else
            <p class="ms-empty-state">Il team è in aggiornamento. Torna presto!</p>
        @endif
    </div>
</section>

{{-- Governance --}}
<section class="l-section" id="governance">
    <div class="l-container">
        <div class="l-section-header">
            <h2>Governance</h2>
            <p class="l-section-lead">Organi di amministrazione e controllo della cooperativa.</p>
        </div>
        @if($governanceMembers->isNotEmpty())
            <div class="ms-governance-grid">
                @foreach($governanceMembers as $member)
                    <x-governance-card :member="$member" />
                @endforeach
            </div>
        @else
            <p class="ms-empty-state">Le informazioni di governance sono in aggiornamento.</p>
        @endif

        <div style="margin-top:2.5rem; text-align:center;">
            <a href="/documents/statuto-montagna-servizi.pdf" class="ms-btn ms-btn--outline" download>
                Scarica lo Statuto (PDF)
            </a>
        </div>
    </div>
</section>

@endsection
