@extends('layouts.app')

@section('title', 'Home')
@section('description', 'Montagna Servizi SCPA offre servizi di segreteria, comunicazione, contabilità e consulenza alle Sezioni e ai Gruppi Regionali del Club Alpino Italiano.')

@section('content')

{{-- Hero --}}
<section class="ms-hero ms-hero--photo">
    <img src="{{ Storage::url('hero/hero-home.webp') }}"
         alt="Lago alpino in Valsavarenche — paesaggio del Sentiero Italia CAI"
         class="ms-hero__bg-img"
         width="1920" height="1080"
         loading="eager" fetchpriority="high"
         role="presentation">
    <div class="l-container">
        <div class="ms-hero__inner">
            <span class="ms-hero__eyebrow">Servizi per le Sezioni CAI</span>
            <h1>Il supporto professionale<br>per le Sezioni CAI</h1>
            <p class="ms-hero__sub">
                Segreteria, consulenze, contabilità e fundraising: tutto ciò di cui la tua Sezione ha bisogno, in un unico partner affidabile.
            </p>
            <div class="ms-hero__ctas">
                <a href="/servizi" class="ms-btn ms-btn--white">Scopri i servizi</a>
                <a href="{{ config('services.typeform.url') }}" target="_blank" rel="noopener" class="ms-btn ms-btn--outline-white">Contattaci</a>
            </div>
        </div>
    </div>
</section>

{{-- Chi siamo — intro breve --}}
<section class="l-section">
    <div class="l-container">
        <div class="ms-about-brief">
            <p class="ms-about-brief__text">
                Montagna Servizi SCPA è la cooperativa del Club Alpino Italiano che supporta Sezioni e Gruppi Regionali nella gestione quotidiana. Offriamo segreteria operativa, consulenze specialistiche, strumenti digitali come Veryfico e servizi di fundraising per permettere alle realtà CAI di concentrarsi su ciò che conta: la montagna e la comunità.
            </p>
            <a href="/chi-siamo" class="ms-btn ms-btn--outline">Scopri chi siamo</a>
        </div>
    </div>
</section>

{{-- Value proposition --}}
<section class="l-section l-section--gray">
    <div class="l-container">
        <div class="ms-vp-grid">
            <div class="ms-vp-item">
                <span class="ms-vp-icon">🤝</span>
                <h3>Affidabilità</h3>
                <p>Siamo il partner di riferimento del CAI: presenti, responsabili, con processi rodati e risposte rapide per ogni Sezione.</p>
            </div>
            <div class="ms-vp-item">
                <span class="ms-vp-icon">🎓</span>
                <h3>Competenza</h3>
                <p>Team specializzato in Terzo Settore, fiscalità associativa e strumenti digitali: conosciamo a fondo il mondo CAI.</p>
            </div>
            <div class="ms-vp-item">
                <span class="ms-vp-icon">🏔️</span>
                <h3>Prossimità</h3>
                <p>Siamo una cooperativa: condividiamo i valori del CAI e costruiamo risposte su misura per ogni realtà territoriale.</p>
            </div>
        </div>
    </div>
</section>

{{-- Servizi --}}
<section class="l-section">
    <div class="l-container">
        <div class="l-section-header">
            <h2>I nostri servizi</h2>
            <p class="l-section-lead">Cinque aree di competenza per coprire tutte le esigenze operative della tua Sezione.</p>
        </div>
        <div class="ms-service-grid">
            <x-service-card icon="📋" title="Segreteria Operativa"  description="Segreteria a distanza e in presenza per alleggerire il carico amministrativo quotidiano." href="/servizi/segreteria-operativa" />
            <x-service-card icon="📢" title="Comunicazione"         description="Newsletter, social media e presenza a eventi per valorizzare le attività della tua Sezione." href="/servizi/comunicazione" />
            <x-service-card icon="📊" title="Contabilità Veryfico"  description="Gestione contabile con Veryfico, il software CAI. Bilanci ETS conformi e dichiarazioni fiscali." href="/servizi/contabilita-veryfico" />
            <x-service-card icon="⚖️" title="Consulenze"            description="Consulenze specialistiche in Terzo Settore, fiscalità associativa, diritto e trasformazione ETS." href="/servizi/consulenze" />
            <x-service-card icon="🎯" title="Fundraising"           description="Ricerca bandi, scrittura progetti e rendicontazione: da fondi europei a contributi ministeriali." href="/servizi/fundraising" />
        </div>
    </div>
</section>

{{-- News --}}
<section class="l-section">
    <div class="l-container">
        <div class="l-section-header">
            <h2>Ultime notizie</h2>
            <p class="l-section-lead">Aggiornamenti, comunicazioni e approfondimenti dal mondo di Montagna Servizi e del Club Alpino Italiano.</p>
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
            <h2>Pronto a dare una mano alla tua Sezione</h2>
            <p>Raccontaci le tue esigenze: costruiamo insieme la soluzione più adatta. Ti rispondiamo entro 48 ore.</p>
            <a href="{{ config('services.typeform.url') }}" target="_blank" rel="noopener" class="ms-btn ms-btn--white">
                Scrivici
            </a>
        </div>
    </div>
</section>

@endsection
