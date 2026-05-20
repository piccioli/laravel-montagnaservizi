@extends('layouts.app')

@section('title', 'Cookie Policy')
@section('description', 'Informativa sui cookie utilizzati dal sito Montagna Servizi SCPA.')

@section('content')

<section class="ms-hero ms-hero--inner">
    <div class="l-container">
        <div class="ms-hero__inner">
            <span class="ms-hero__eyebrow">Informativa legale</span>
            <h1>Cookie Policy</h1>
        </div>
    </div>
</section>

<section class="l-section">
    <div class="l-container">
        <div class="ms-legal-content">

            <p class="ms-lead">Questo sito utilizza cookie e tecnologie simili per garantire il corretto funzionamento, analizzare il traffico e migliorare l'esperienza utente. Di seguito forniamo informazioni dettagliate sui cookie impiegati.</p>

            <h2>1. Cosa sono i cookie</h2>
            <p>I cookie sono piccoli file di testo che i siti web memorizzano nel browser dell'utente durante la visita. Possono essere "di sessione" (eliminati alla chiusura del browser) o "persistenti" (conservati per un periodo definito).</p>

            <h2>2. Cookie tecnici</h2>
            <p>Questi cookie sono necessari per il funzionamento del sito e non richiedono il consenso dell'utente:</p>
            <ul>
                <li><strong>ms_cookie_consent</strong>: memorizza la scelta dell'utente riguardo ai cookie (localStorage, persistente 12 mesi).</li>
                <li>Cookie di sessione PHP/Laravel per la gestione delle sessioni autenticate (solo area admin).</li>
            </ul>

            <h2>3. Cookie analitici</h2>
            <p>Utilizzati per raccogliere informazioni aggregate sull'utilizzo del sito:</p>
            <ul>
                <li><strong>Google Tag Manager</strong> (se attivato): gestisce i tag di misurazione. Richiede consenso. Prima dell'accettazione, GTM è in modalità di sola configurazione.</li>
            </ul>

            <h2>4. Cookie di terze parti</h2>
            <p>Il modulo di contatto è gestito tramite <strong>Typeform</strong> (terza parte). L'accesso al modulo comporta l'applicazione della cookie policy di Typeform.</p>

            <h2>5. Gestione delle preferenze</h2>
            <p>L'utente può revocare il proprio consenso in qualsiasi momento agendo sul banner che compare alla prima visita. È inoltre possibile configurare il browser per bloccare o eliminare i cookie.</p>

            <p class="ms-legal-note"><em>Documento in fase di revisione finale — contenuto definitivo disponibile nella versione di produzione del sito.</em></p>

        </div>
    </div>
</section>

@endsection
