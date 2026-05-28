<footer class="ms-footer" role="contentinfo">
    <div class="l-container">

        <div class="ms-footer__grid">

            {{-- Colonna 1: info azienda --}}
            <div>
                <div class="ms-footer__logo-text">Montagna Servizi SCPA</div>
                <div class="ms-footer__info">
                    <p>
                        <strong>Sede legale:</strong> Via Petrella 19 — Milano<br>
                        P.IVA 11790660960<br>
                        <strong>Cod. Interscambio SDI:</strong> M5UXCR1
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
                <a href="/privacy-policy">Privacy Policy</a>
                <a href="/cookie-policy">Cookie Policy</a>
                <a href="/note-legali">Note legali</a>
            </div>
        </div>

    </div>
</footer>
