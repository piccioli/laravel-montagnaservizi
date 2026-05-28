@extends('layouts.app')

@section('title', 'Comunicazione')
@section('description', 'Social media, newsletter e comunicati per le Sezioni CAI. Comunicazione professionale su misura per il mondo alpinistico.')

@section('content')

<section class="ms-hero ms-hero--inner">
    <img src="{{ Storage::url('hero/hero-servizi.webp') }}"
         alt="Sentiero alpino — i servizi di Montagna Servizi per le Sezioni CAI"
         class="ms-hero__bg-img"
         width="1440" height="500"
         loading="eager"
         role="presentation">
    <div class="l-container">
        <div class="ms-hero__inner">
            <span class="ms-hero__eyebrow"><a href="/servizi" style="color:inherit;opacity:.7;">Servizi</a> &rsaquo; Comunicazione</span>
            <h1>Comunicazione</h1>
            <p class="ms-hero__sub">Raccontiamo la tua Sezione al mondo con un linguaggio autentico e vicino ai valori CAI.</p>
        </div>
    </div>
</section>

<section class="l-section">
    <div class="l-container">
        <div class="ms-service-layout">
            <div class="ms-service-body">
                <p class="ms-lead">Una comunicazione efficace è oggi indispensabile anche per le Sezioni CAI. Gestiamo i canali social, progettiamo newsletter periodiche, redigiamo comunicati stampa e produciamo materiali grafici coerenti con l'identità visiva del Club Alpino Italiano.</p>

                <h2>Cosa includiamo</h2>
                <div class="ms-service-list">
                    @forelse($services as $service)
                        <div class="ms-service-list-item">
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->description }}</p>
                            @if($service->body)
                                <a href="/servizi/comunicazione/{{ $service->slug }}" class="ms-link">Approfondisci &rarr;</a>
                            @endif
                        </div>
                    @empty
                        <p class="ms-empty-state">I servizi di questa categoria sono in fase di aggiornamento.</p>
                    @endforelse
                </div>

                <h2>A chi è rivolto</h2>
                <p>Sezioni CAI che vogliono aumentare la propria visibilità sul territorio, coinvolgere i soci con contenuti di qualità e attrarre nuovi iscritti attraverso una presenza digitale curata.</p>
            </div>
            <aside class="ms-service-sidebar">
                <div class="ms-service-sidebar-box">
                    <h3>Hai bisogno di questo servizio?</h3>
                    <p>Raccontaci le esigenze della tua Sezione: ti risponderemo entro 48 ore.</p>
                    <a href="{{ route('contatti', ['source' => 'comunicazione']) }}" class="ms-btn ms-btn--primary" style="display:block;text-align:center;margin-top:1rem;">
                        Richiedi informazioni
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
