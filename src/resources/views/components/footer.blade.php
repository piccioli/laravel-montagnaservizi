<footer class="ms-footer" role="contentinfo">
    <div class="l-container">

        <div class="ms-footer__grid">

            {{-- Colonna 1: info azienda --}}
            <div>
                <div class="ms-footer__logo-text">Montagna Servizi SCPA</div>
                <div class="ms-footer__info">
                    <p>
                        <strong>Sede legale:</strong> Via Decorati al Valor Civile 15<br>
                        20138 Milano (MI)<br>
                        P.IVA 11790660960<br>
                        <strong>SDI:</strong> M5UXCR1
                    </p>
                    <p>
                        <a href="mailto:info@montagnaservizi.com">info@montagnaservizi.com</a><br>
                        <a href="mailto:montagnaserviziscpa@legalmail.it" style="font-size:.8125rem;opacity:.8;">PEC: montagnaserviziscpa@legalmail.it</a>
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
                    Aggiornamenti sui servizi, novità normative e opportunità per le Sezioni CAI — ogni due settimane.
                </p>
                <div x-data="newsletterForm()" x-cloak>
                    <form @submit.prevent="submit" x-show="!success">
                        <div class="ms-newsletter-form">
                            <input type="email"
                                   x-model="email"
                                   placeholder="La tua email"
                                   :disabled="loading"
                                   required
                                   autocomplete="email">
                            <button type="submit"
                                    class="ms-btn ms-btn--primary ms-btn--sm"
                                    :disabled="loading">
                                <span x-text="loading ? 'Invio…' : 'Iscriviti'">Iscriviti</span>
                            </button>
                        </div>
                        <p x-show="error"
                           x-text="error"
                           class="ms-newsletter-msg ms-newsletter-msg--error"
                           style="display:none"></p>
                    </form>
                    <p x-show="success"
                       class="ms-newsletter-msg ms-newsletter-msg--success"
                       style="display:none">
                        Iscritto con successo! Controlla la tua email.
                    </p>
                </div>
                {{-- Fallback statico per no-JS --}}
                <noscript>
                    <form method="POST" action="/newsletter/subscribe" class="ms-newsletter-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="email" name="email" placeholder="La tua email" required autocomplete="email">
                        <button type="submit" class="ms-btn ms-btn--primary ms-btn--sm">Iscriviti</button>
                    </form>
                </noscript>
            </div>

        </div>

        {{-- Subfooter --}}
        <div class="ms-footer__sub">
            <span>
                &copy; {{ date('Y') }} Montagna Servizi SCPA — Tutti i diritti riservati
                <span class="ms-footer__version">v{{ config('app.version') }}</span>
            </span>
            <div class="ms-footer__legal">
                <a href="https://it.linkedin.com/company/montagna-servizi-scpa" target="_blank" rel="noopener noreferrer" aria-label="Montagna Servizi su LinkedIn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width:1.1rem;height:1.1rem;vertical-align:middle;" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg> LinkedIn</a>
                <a href="/privacy-policy">Privacy Policy</a>
                <a href="/cookie-policy">Cookie Policy</a>
                <a href="/note-legali">Note legali</a>
            </div>
        </div>

    </div>
</footer>
