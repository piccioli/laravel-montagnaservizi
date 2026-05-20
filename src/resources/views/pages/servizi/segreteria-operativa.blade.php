@extends('layouts.app')

@section('title', 'Segreteria Operativa')
@section('description', 'Gestione professionale di corrispondenza, verbali, convocazioni e comunicazioni per le Sezioni CAI.')

@section('content')

<section class="ms-hero ms-hero--inner">
    <div class="l-container">
        <div class="ms-hero__inner">
            <span class="ms-hero__eyebrow"><a href="/servizi" style="color:inherit;opacity:.7;">Servizi</a> &rsaquo; Segreteria Operativa</span>
            <h1>Segreteria Operativa</h1>
            <p class="ms-hero__sub">Gestiamo la burocrazia quotidiana della tua Sezione così che tu possa concentrarti sulla montagna.</p>
        </div>
    </div>
</section>

<section class="l-section">
    <div class="l-container">
        <div class="ms-service-layout">
            <div class="ms-service-body">
                <p class="ms-lead">La segreteria operativa è il cuore pulsante di ogni Sezione CAI. Offriamo un servizio completo che comprende la gestione di tutta la corrispondenza in entrata e in uscita, la redazione di verbali assembleari e di consiglio, la preparazione delle convocazioni e la gestione dei rapporti con il CAI Centrale.</p>

                <h2>Cosa includiamo</h2>
                <div class="ms-service-list">
                    @forelse($services as $service)
                        <div class="ms-service-list-item">
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->description }}</p>
                            @if($service->body)
                                <a href="/servizi/segreteria-operativa/{{ $service->slug }}" class="ms-link">Approfondisci &rarr;</a>
                            @endif
                        </div>
                    @empty
                        <p class="ms-empty-state">I servizi di questa categoria sono in fase di aggiornamento.</p>
                    @endforelse
                </div>

                <h2>A chi è rivolto</h2>
                <p>Sezioni CAI di qualsiasi dimensione che vogliono alleggerire il carico amministrativo del direttivo e del segretario, garantendo al contempo continuità operativa e qualità delle comunicazioni.</p>
            </div>
            <aside class="ms-service-sidebar">
                <div class="ms-service-sidebar-box">
                    <h3>Hai bisogno di questo servizio?</h3>
                    <p>Raccontaci le esigenze della tua Sezione: ti risponderemo entro 48 ore.</p>
                    <a href="{{ config('services.typeform.url') }}?source=segreteria-operativa" target="_blank" rel="noopener" class="ms-btn ms-btn--primary" style="display:block;text-align:center;margin-top:1rem;">
                        Richiedi informazioni
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
