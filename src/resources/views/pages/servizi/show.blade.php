@extends('layouts.app')

@section('title', $service->title . ' — ' . $categoryName)
@section('description', $service->description)

@section('content')

<section class="ms-hero ms-hero--inner">
    <div class="l-container">
        <div class="ms-hero__inner">
            <span class="ms-hero__eyebrow">
                <a href="/servizi" style="color:inherit;opacity:.7;">Servizi</a>
                &rsaquo;
                <a href="/servizi/{{ $categorySlug }}" style="color:inherit;opacity:.7;">{{ $categoryName }}</a>
            </span>
            @if($service->subtitle)
                <p class="ms-service-badge">{{ $service->subtitle }}</p>
            @endif
            <h1>{{ $service->title }}</h1>
            <p class="ms-hero__sub">{{ $service->description }}</p>
        </div>
    </div>
</section>

<section class="l-section">
    <div class="l-container">
        <div class="ms-service-layout">

            <div class="ms-service-body">
                @if($service->body)
                    <div class="ms-prose">
                        {!! $service->body !!}
                    </div>
                @else
                    <p class="ms-lead">{{ $service->description }}</p>
                    <p style="color:var(--ms-muted);">Contenuto dettagliato in arrivo. <a href="{{ config('services.typeform.url') }}?source={{ $categorySlug }}" target="_blank" rel="noopener" class="ms-link">Contattaci</a> per maggiori informazioni su questo servizio.</p>
                @endif
            </div>

            <aside>
                <div class="ms-service-sidebar-box">
                    <p class="ms-service-sidebar-box__cat">{{ $categoryName }}</p>
                    <h3>Hai bisogno di questo servizio?</h3>
                    <p>Raccontaci le esigenze della tua Sezione: ti risponderemo entro 48 ore.</p>
                    <a href="{{ config('services.typeform.url') }}?source={{ $categorySlug }}"
                       target="_blank" rel="noopener"
                       class="ms-btn ms-btn--primary"
                       style="display:block;text-align:center;margin-top:1rem;">
                        Richiedi informazioni
                    </a>
                </div>
            </aside>

        </div>

        <div class="ms-article-nav" style="margin-top:3rem;">
            <a href="/servizi/{{ $categorySlug }}" class="ms-btn ms-btn--outline">
                &larr; Torna a {{ $categoryName }}
            </a>
        </div>
    </div>
</section>

@endsection
