@extends('layouts.app')

@section('title', 'Servizi')
@section('description', 'Segreteria, comunicazione, contabilità, consulenza e fundraising: tutti i servizi Montagna Servizi per le Sezioni CAI.')

@section('content')

<section class="ms-hero ms-hero--inner">
    <div class="l-container">
        <div class="ms-hero__inner">
            <span class="ms-hero__eyebrow">I nostri servizi</span>
            <h1>Supporto professionale<br>per le Sezioni CAI</h1>
            <p class="ms-hero__sub">Cinque aree di competenza per coprire tutte le esigenze operative della tua Sezione.</p>
        </div>
    </div>
</section>

<section class="l-section">
    <div class="l-container">
        <div class="ms-service-grid">
            <x-service-card
                icon="📋"
                title="Segreteria Operativa"
                description="Gestione corrispondenza, verbali, convocazioni e tutte le comunicazioni ufficiali della tua Sezione."
                href="/servizi/segreteria-operativa" />
            <x-service-card
                icon="📢"
                title="Comunicazione"
                description="Social media, newsletter, comunicati stampa e materiali grafici pensati per il mondo CAI."
                href="/servizi/comunicazione" />
            <x-service-card
                icon="📊"
                title="Contabilità Veryfico"
                description="Tenuta della contabilità con il software ufficiale CAI. Prima nota, bilanci e reportistica."
                href="/servizi/contabilita-veryfico" />
            <x-service-card
                icon="⚖️"
                title="Consulenze"
                description="Supporto legale e amministrativo su normativa associativa, contratti, GDPR e rapporti con enti."
                href="/servizi/consulenze" />
            <x-service-card
                icon="🎯"
                title="Fundraising"
                description="Ricerca e gestione di bandi, contributi pubblici e raccolta fondi per i progetti della tua Sezione."
                href="/servizi/fundraising" />
        </div>
    </div>
</section>

<section class="l-section l-section--green">
    <div class="l-container">
        <div class="ms-cta-strip">
            <h2>Non sai da dove iniziare?</h2>
            <p>Raccontaci la tua situazione: ti aiutiamo a capire di cosa ha bisogno la tua Sezione.</p>
            <a href="{{ config('services.typeform.url') }}" target="_blank" rel="noopener" class="ms-btn ms-btn--white">
                Parla con noi
            </a>
        </div>
    </div>
</section>

@endsection
