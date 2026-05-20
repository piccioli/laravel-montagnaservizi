<footer class="ms-footer" role="contentinfo">
    <div class="l-container">

        <div class="ms-footer__grid">

            {{-- Colonna 1: info azienda --}}
            <div>
                <div class="ms-footer__logo-text">Montagna Servizi SCPA</div>
                <div class="ms-footer__info">
                    <p>
                        <strong>Sede legale:</strong> [indirizzo definitivo]<br>
                        P.IVA 11790660960<br>
                        <strong>Cod. Interscambio SDI:</strong> M5UXCR1<br>
                        REA: [numero REA]
                    </p>
                    <p>
                        <a href="mailto:info@montagnaservizi.com">info@montagnaservizi.com</a>
                    </p>
                </div>
            </div>

            {{-- Colonna 2: menu --}}
            <div>
                <div class="ms-footer__col-label">Navigazione</div>
                <nav class="ms-footer__nav" aria-label="Menu footer">
                    <a href="/">Home</a>
                    <a href="/chi-siamo">Chi siamo</a>
                    <a href="/servizi">Servizi</a>
                    <a href="/news">News</a>
                </nav>
            </div>

            {{-- Colonna 3: newsletter --}}
            <div>
                <div class="ms-footer__col-label">Newsletter</div>
                <p class="ms-footer__newsletter-note">
                    Aggiornamenti e comunicazioni per le Sezioni CAI ogni due settimane.
                </p>
                @if(config('services.brevo.embed_code'))
                    {!! config('services.brevo.embed_code') !!}
                @else
                    <div class="ms-newsletter-placeholder">
                        <p>Form iscrizione newsletter — integrazione Brevo configurata in Fase 6.</p>
                        <div class="ms-newsletter-form">
                            <input type="email" placeholder="La tua email" disabled>
                            <button class="ms-btn ms-btn--primary" disabled>Iscriviti</button>
                        </div>
                    </div>
                @endif
            </div>

        </div>

        {{-- Subfooter --}}
        <div class="ms-footer__sub">
            <span>&copy; {{ date('Y') }} Montagna Servizi SCPA — Tutti i diritti riservati</span>
            <div class="ms-footer__legal">
                <a href="/privacy-policy">Privacy Policy</a>
                <a href="/cookie-policy">Cookie Policy</a>
                <a href="/note-legali">Note legali</a>
            </div>
        </div>

    </div>
</footer>
