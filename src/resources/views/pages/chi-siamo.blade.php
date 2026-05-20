@extends('layouts.app')

@section('title', 'Chi siamo')
@section('description', 'Montagna Servizi SCPA: mission, valori, team e governance. Una cooperativa al servizio delle Sezioni CAI.')

@section('content')

{{-- Hero compatto --}}
<section class="ms-hero ms-hero--inner">
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
            <h2>Mission e valori</h2>
            <p class="l-section-lead">Nata per supportare le Sezioni CAI, Montagna Servizi SCPA opera in logica mutualistica e collaborativa.</p>
        </div>
        <div class="ms-vp-grid">
            <div class="ms-vp-item">
                <span class="ms-vp-icon">🏔️</span>
                <h3>Expertise CAI</h3>
                <p>Conosciamo in profondità le specificità delle Sezioni CAI: normativa, software Veryfico, rapporti con il CAI Centrale e le strutture regionali.</p>
            </div>
            <div class="ms-vp-item">
                <span class="ms-vp-icon">🤝</span>
                <h3>Spirito mutualistico</h3>
                <p>Siamo una cooperativa: condividiamo i valori associativi del CAI e operiamo mettendo al centro le esigenze dei soci prima del profitto.</p>
            </div>
            <div class="ms-vp-item">
                <span class="ms-vp-icon">⚡</span>
                <h3>Efficienza operativa</h3>
                <p>Processi rodati, risposta rapida e interlocutori dedicati per ogni Sezione cliente. Meno burocrazia, più risultati.</p>
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
            <a href="#" class="ms-btn ms-btn--outline" download>
                Scarica lo Statuto (PDF)
            </a>
        </div>
    </div>
</section>

@endsection
