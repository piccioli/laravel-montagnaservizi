@extends('layouts.app')

@section('title', 'Fundraising')
@section('description', 'Ricerca e gestione di bandi, contributi pubblici e raccolta fondi per le Sezioni CAI.')

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
            <span class="ms-hero__eyebrow"><a href="/servizi" style="color:inherit;opacity:.7;">Servizi</a> &rsaquo; Fundraising</span>
            <h1>Fundraising</h1>
            <p class="ms-hero__sub">Aiutiamo le Sezioni CAI a trovare le risorse economiche per realizzare i propri progetti.</p>
        </div>
    </div>
</section>

<section class="l-section">
    <div class="l-container">
        <div class="ms-service-layout">
            <div class="ms-service-body">
                <p class="ms-lead">Molte Sezioni CAI hanno progetti ambiziosi ma risorse limitate. Il nostro servizio di fundraising identifica le opportunità di finanziamento più adatte — bandi regionali, nazionali ed europei, sponsorizzazioni locali, donazioni — e segue l'intero processo dalla candidatura alla rendicontazione.</p>

                <h2>Cosa includiamo</h2>
                <div class="ms-service-list">
                    @forelse($services as $service)
                        <div class="ms-service-list-item">
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->description }}</p>
                            @if($service->body)
                                <a href="/servizi/fundraising/{{ $service->slug }}" class="ms-link">Approfondisci &rarr;</a>
                            @endif
                        </div>
                    @empty
                        <p class="ms-empty-state">I servizi di questa categoria sono in fase di aggiornamento.</p>
                    @endforelse
                </div>

                <h2>A chi è rivolto</h2>
                <p>Sezioni CAI che vogliono finanziare rifugi, sentieri, corsi di alpinismo, attività giovanili o progetti ambientali ma non sanno come accedere ai contributi disponibili.</p>
            </div>
            <aside class="ms-service-sidebar">
                <div class="ms-service-sidebar-box">
                    <h3>Hai bisogno di questo servizio?</h3>
                    <p>Raccontaci le esigenze della tua Sezione: ti risponderemo entro 48 ore.</p>
                    <a href="{{ route('contatti', ['source' => 'fundraising']) }}" class="ms-btn ms-btn--primary" style="display:block;text-align:center;margin-top:1rem;">
                        Richiedi informazioni
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
