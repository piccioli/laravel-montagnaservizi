@extends('layouts.app')

@section('title', 'Home')
@section('description', 'Montagna Servizi SCPA offre servizi di segreteria, comunicazione, contabilità e consulenza alle Sezioni e ai Gruppi Regionali del Club Alpino Italiano.')

@section('content')

{{-- Hero --}}
<section class="ms-hero">
    <div class="l-container">
        <div class="ms-hero__inner">
            <span class="ms-hero__eyebrow">Servizi per le Sezioni CAI</span>
            <h1>Il supporto professionale<br>per il tuo CAI</h1>
            <p class="ms-hero__sub">
                Segreteria, comunicazione, contabilità e consulenza:
                tutto ciò di cui la tua Sezione ha bisogno, in un unico partner.
            </p>
            <div class="ms-hero__ctas">
                <a href="/servizi" class="ms-btn ms-btn--white">Scopri i servizi</a>
                <a href="{{ config('services.typeform.url') }}" target="_blank" rel="noopener" class="ms-btn ms-btn--outline-white">Contattaci</a>
            </div>
        </div>
    </div>
</section>

{{-- Value proposition --}}
<section class="l-section">
    <div class="l-container">
        <div class="ms-vp-grid">
            <div class="ms-vp-item">
                <span class="ms-vp-icon">🏔️</span>
                <h3>Expertise CAI</h3>
                <p>Conosciamo le specificità delle Sezioni CAI: normativa, Veryfico, rapporti con il CAI Centrale.</p>
            </div>
            <div class="ms-vp-item">
                <span class="ms-vp-icon">⚡</span>
                <h3>Efficienza operativa</h3>
                <p>Processi rodati, risposta rapida e interlocutori dedicati per ogni Sezione cliente.</p>
            </div>
            <div class="ms-vp-item">
                <span class="ms-vp-icon">🤝</span>
                <h3>Prossimità</h3>
                <p>Siamo una cooperativa: condividiamo i valori associativi del CAI e operiamo in logica mutualistica.</p>
            </div>
        </div>
    </div>
</section>

{{-- Servizi --}}
<section class="l-section l-section--gray">
    <div class="l-container">
        <div class="l-section-header">
            <h2>I nostri servizi</h2>
            <p class="l-section-lead">Supporto professionale per le Sezioni e i Gruppi Regionali del CAI.</p>
        </div>
        <div class="ms-service-grid">
            <x-service-card icon="📋" title="Segreteria Operativa"  description="Gestione corrispondenza, verbali e comunicazioni." href="/servizi/segreteria-operativa" />
            <x-service-card icon="📢" title="Comunicazione"         description="Social media, newsletter e comunicati CAI."         href="/servizi/comunicazione" />
            <x-service-card icon="📊" title="Contabilità Veryfico"  description="Tenuta contabilità con software CAI-specific."       href="/servizi/contabilita-veryfico" />
            <x-service-card icon="⚖️" title="Consulenze"            description="Consulenza legale e amministrativa CAI."             href="/servizi/consulenze" />
            <x-service-card icon="🎯" title="Fundraising"           description="Bandi, contributi e raccolta fondi."                 href="/servizi/fundraising" />
        </div>
    </div>
</section>

{{-- News --}}
<section class="l-section">
    <div class="l-container">
        <div class="l-section-header">
            <h2>Ultime notizie</h2>
            <p class="l-section-lead">Aggiornamenti e comunicazioni per le Sezioni CAI.</p>
        </div>
        <div class="ms-news-grid">
            @foreach($latestNews as $article)
                <x-news-card :article="$article" />
            @endforeach
        </div>
        <div style="text-align:center;margin-top:2.5rem">
            <a href="/news" class="ms-btn ms-btn--outline">Vedi tutte le news</a>
        </div>
    </div>
</section>

{{-- CTA finale --}}
<section class="l-section l-section--green">
    <div class="l-container">
        <div class="ms-cta-strip">
            <h2>Pronti a supportare la tua Sezione</h2>
            <p>Raccontaci le tue esigenze: ti risponderemo entro 48 ore.</p>
            <a href="{{ config('services.typeform.url') }}" target="_blank" rel="noopener" class="ms-btn ms-btn--white">
                Contattaci
            </a>
        </div>
    </div>
</section>

@endsection
