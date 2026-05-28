@extends('layouts.app')

@section('title', 'Consulenze')
@section('description', 'Consulenza legale e amministrativa per le Sezioni CAI. Normativa associativa, GDPR, contratti e rapporti con gli enti.')

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
            <span class="ms-hero__eyebrow"><a href="/servizi" style="color:inherit;opacity:.7;">Servizi</a> &rsaquo; Consulenze</span>
            <h1>Consulenze</h1>
            <p class="ms-hero__sub">Supporto legale e amministrativo specializzato per navigare la complessità normativa delle associazioni CAI.</p>
        </div>
    </div>
</section>

<section class="l-section">
    <div class="l-container">
        <div class="ms-service-layout">
            <div class="ms-service-body">
                <p class="ms-lead">Le Sezioni CAI si trovano sempre più spesso ad affrontare sfide normative complesse: Codice del Terzo Settore, GDPR, contratti con fornitori e istruttori, rapporti con Comuni e altri enti pubblici. Il nostro team di consulenti offre risposte concrete e pratiche.</p>

                <h2>Cosa includiamo</h2>
                <div class="ms-service-list">
                    @forelse($services as $service)
                        <div class="ms-service-list-item">
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->description }}</p>
                            @if($service->body)
                                <a href="/servizi/consulenze/{{ $service->slug }}" class="ms-link">Approfondisci &rarr;</a>
                            @endif
                        </div>
                    @empty
                        <p class="ms-empty-state">I servizi di questa categoria sono in fase di aggiornamento.</p>
                    @endforelse
                </div>

                <h2>A chi è rivolto</h2>
                <p>Presidenti, segretari e direttivi di Sezioni CAI che si trovano di fronte a decisioni legali o amministrative complesse e hanno bisogno di un parere esperto prima di procedere.</p>
            </div>
            <aside class="ms-service-sidebar">
                <div class="ms-service-sidebar-box">
                    <h3>Hai bisogno di questo servizio?</h3>
                    <p>Raccontaci le esigenze della tua Sezione: ti risponderemo entro 48 ore.</p>
                    <a href="{{ route('contatti', ['source' => 'consulenze']) }}" class="ms-btn ms-btn--primary" style="display:block;text-align:center;margin-top:1rem;">
                        Richiedi informazioni
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
