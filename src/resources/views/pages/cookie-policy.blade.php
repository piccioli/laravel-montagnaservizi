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

            <h2>2. Cookie tecnici (necessari)</h2>
            <p>Questi cookie sono necessari per il funzionamento del sito e non richiedono il consenso dell'utente:</p>
            <ul>
                <li><strong>ms_cookie_consent</strong>: memorizza la scelta dell'utente riguardo ai cookie non tecnici (localStorage, persistente 12 mesi).</li>
                <li><strong>laravel_session</strong>: cookie di sessione PHP/Laravel per la gestione delle sessioni autenticate (solo area admin, scadenza sessione).</li>
                <li><strong>XSRF-TOKEN</strong>: cookie di sicurezza anti-CSRF generato da Laravel (solo area admin).</li>
            </ul>

            <h2>3. Cookie analitici (con consenso)</h2>
            <p>Attivati solo previa accettazione del banner cookie:</p>
            <ul>
                <li><strong>Google Tag Manager / Google Analytics 4</strong>: raccoglie dati di navigazione aggregati e anonimi (pagine visitate, durata sessione, provenienza). I dati sono trattati da Google LLC nel rispetto del GDPR.</li>
            </ul>

            <h2>4. Cookie di terze parti</h2>
            <p>Il modulo di contatto è erogato tramite iframe di <strong>Typeform SL</strong>. L'apertura della pagina <a href="/contatti">/contatti</a> comporta l'applicazione della <a href="https://www.typeform.com/help/a/typeform-s-cookie-policy-360029551011/" rel="noopener noreferrer" target="_blank">cookie policy di Typeform</a>.</p>

            <h2>5. Gestione delle preferenze</h2>
            <p>L'utente può modificare o revocare il proprio consenso in qualsiasi momento agendo sul banner che compare alla prima visita oppure svuotando il localStorage del browser. È inoltre possibile configurare il browser per bloccare o eliminare i cookie.</p>

            <h2>6. Titolare del trattamento</h2>
            <p><strong>Montagna Servizi SCPA</strong> — Via Petrella 19, Milano<br>
            Email: <a href="mailto:info@montagnaservizi.com">info@montagnaservizi.com</a></p>

            <p class="ms-legal-note"><em>Ultimo aggiornamento: maggio 2026.</em></p>

        </div>
    </div>
</section>

@endsection
