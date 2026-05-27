@extends('layouts.app')

@section('title', 'Contabilità Veryfico')
@section('description', 'Tenuta della contabilità CAI con software Veryfico. Prima nota, bilanci e reportistica per le Sezioni CAI.')

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
            <span class="ms-hero__eyebrow"><a href="/servizi" style="color:inherit;opacity:.7;">Servizi</a> &rsaquo; Contabilità Veryfico</span>
            <h1>Contabilità Veryfico</h1>
            <p class="ms-hero__sub">Gestiamo la contabilità della tua Sezione con il software ufficiale CAI, in totale conformità con le linee guida del CAI Centrale.</p>
        </div>
    </div>
</section>

<section class="l-section">
    <div class="l-container">
        <div class="ms-service-layout">
            <div class="ms-service-body">
                <p class="ms-lead">Veryfico è il software contabile adottato dal Club Alpino Italiano per la gestione economico-finanziaria delle Sezioni. Il nostro team è specializzato nell'utilizzo di questa piattaforma e garantisce una tenuta accurata, puntuale e conforme alle normative del Terzo Settore.</p>

                <h2>Cosa includiamo</h2>
                <div class="ms-service-list">
                    @forelse($services as $service)
                        <div class="ms-service-list-item">
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->description }}</p>
                            @if($service->body)
                                <a href="/servizi/contabilita-veryfico/{{ $service->slug }}" class="ms-link">Approfondisci &rarr;</a>
                            @endif
                        </div>
                    @empty
                        <p class="ms-empty-state">I servizi di questa categoria sono in fase di aggiornamento.</p>
                    @endforelse
                </div>

                <h2>A chi è rivolto</h2>
                <p>Sezioni CAI che necessitano di supporto nella gestione contabile, in particolare quelle prive di un tesoriere dedicato o che vogliono garantire la massima correttezza nei rapporti con il CAI Centrale e gli enti pubblici.</p>
            </div>
            <aside class="ms-service-sidebar">
                <div class="ms-service-sidebar-box">
                    <h3>Hai bisogno di questo servizio?</h3>
                    <p>Raccontaci le esigenze della tua Sezione: ti risponderemo entro 48 ore.</p>
                    <a href="{{ config('services.typeform.url') }}?source=contabilita-veryfico" target="_blank" rel="noopener" class="ms-btn ms-btn--primary" style="display:block;text-align:center;margin-top:1rem;">
                        Richiedi informazioni
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
