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
                <a href="{{ route('contatti') }}" class="ms-btn ms-btn--outline-white">Contattaci</a>
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
                <span class="ms-vp-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" /></svg></span>
                <h3>Affidabilità</h3>
                <p>Siamo il partner di riferimento del CAI: presenti, responsabili, con processi rodati e risposte rapide per ogni Sezione.</p>
            </div>
            <div class="ms-vp-item">
                <span class="ms-vp-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 3.741-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" /></svg></span>
                <h3>Competenza</h3>
                <p>Team specializzato in Terzo Settore, fiscalità associativa e strumenti digitali: conosciamo a fondo il mondo CAI.</p>
            </div>
            <div class="ms-vp-item">
                <span class="ms-vp-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg></span>
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
            <x-service-card title="Segreteria Operativa" description="Segreteria a distanza e in presenza per alleggerire il carico amministrativo quotidiano." href="/servizi/segreteria-operativa">
                <x-slot:icon><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" /></svg></x-slot:icon>
            </x-service-card>
            <x-service-card title="Comunicazione" description="Newsletter, social media e presenza a eventi per valorizzare le attività della tua Sezione." href="/servizi/comunicazione">
                <x-slot:icon><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 1 8.835-2.535m0 0A23.74 23.74 0 0 1 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" /></svg></x-slot:icon>
            </x-service-card>
            <x-service-card title="Contabilità Veryfico" description="Gestione contabile con Veryfico per Sezioni CAI. Bilanci ETS conformi e dichiarazioni fiscali." href="/servizi/contabilita-veryfico">
                <x-slot:icon><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" /></svg></x-slot:icon>
            </x-service-card>
            <x-service-card title="Consulenze" description="Consulenze specialistiche in Terzo Settore, fiscalità associativa, diritto e trasformazione ETS." href="/servizi/consulenze">
                <x-slot:icon><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" /></svg></x-slot:icon>
            </x-service-card>
            <x-service-card title="Fundraising" description="Ricerca bandi, scrittura progetti e rendicontazione: da fondi europei a contributi ministeriali." href="/servizi/fundraising">
                <x-slot:icon><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" /></svg></x-slot:icon>
            </x-service-card>
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
            <a href="{{ route('contatti') }}" class="ms-btn ms-btn--white">
                Scrivici
            </a>
        </div>
    </div>
</section>

@endsection
