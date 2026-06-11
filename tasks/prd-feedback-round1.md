# PRD: Feedback Round 1 — Fix e miglioramenti post-UAT

## Introduction

Raccolta del primo giro di feedback dal team Montagna Servizi (Sara Mariani, Riccardo Bernasconi, Lorena Sava) dopo la revisione del sito UAT. Il PRD copre **bug fix, piccoli miglioramenti UI e aggiornamento dati societari** in un'unica release patch. Le nuove sezioni richieste (Progetti, Lavora con noi, MDI, FAQ) sono fuori scope e verranno trattate in una release separata.

Fonte: `Raccolta feedback sito MS .docx.pdf` — 28 maggio 2026.

---

## Goals

- Correggere tutti i bug segnalati che compromettono l'usabilità (Typeform, bio troncate, location IOF)
- Sostituire le emoji con icone SVG professionali in tutta la home page
- Aggiungere il link LinkedIn istituzionale
- Aggiornare i dati societari con indirizzo completo, CAP e PEC
- Affinare il copy di Veryfico per evitare fraintendimenti con il CAI

---

## User Stories

### US-001: Fix language Typeform — impostare italiano nel form
**Description:** Come utente, voglio che il form di contatto sia in italiano così non mi confondo con una lingua straniera.

**Acceptance Criteria:**
- [ ] Accedere alle impostazioni del form su typeform.com → Languages → impostare Italiano come lingua principale
- [ ] Verificare su UAT che il form si apra in italiano
- [ ] **Nota:** questa è un'operazione manuale su typeform.com, non una modifica al codice

---

### US-002: Fix bio team troncate su /chi-siamo
**Description:** Come visitatore, voglio leggere per intero le bio dei membri del team così posso capire le loro competenze.

**Acceptance Criteria:**
- [ ] Le bio nel `TeamMemberSeeder` (e/o nel DB via admin) accorciate a max 2 righe di testo visibile (~200 caratteri)
- [ ] Nessun overflow o testo tagliato visivamente nella card su `/chi-siamo`
- [ ] Il testo completo è leggibile senza espanditore (le bio sono semplicemente più brevi)
- [ ] Verificare su mobile e desktop

---

### US-003: Aggiungere link LinkedIn nel footer
**Description:** Come visitatore, voglio trovare il link alla pagina LinkedIn di Montagna Servizi per seguire gli aggiornamenti aziendali.

**Acceptance Criteria:**
- [ ] Link `https://it.linkedin.com/company/montagna-servizi-scpa` aggiunto nel footer
- [ ] Apre in nuova scheda (`target="_blank" rel="noopener noreferrer"`)
- [ ] Icona LinkedIn SVG affiancata al link (o come icona standalone)
- [ ] Verificare che il link sia visibile e funzionante su desktop e mobile

---

### US-004: Sostituire emoji con icone SVG nella home page
**Description:** Come visitatore, voglio vedere icone professionali al posto delle emoji così la home page trasmette un'immagine più istituzionale.

**Acceptance Criteria:**
- [ ] Le 3 emoji nella sezione "value proposition" (🤝 🎓 🏔️) sostituite con icone SVG coerenti con il tema (es. Heroicons — `users`, `academic-cap`, `map-pin` o equivalenti)
- [ ] Le 5 emoji nelle card servizi (📋 📢 📊 ⚖️ 🎯) sostituite con icone SVG coerenti per categoria
- [ ] Il componente `<x-service-card>` aggiornato per accettare SVG inline al posto di un carattere emoji
- [ ] Le icone SVG sono inline nel Blade (nessuna dipendenza npm / CDN esterna)
- [ ] Dimensioni e colori coerenti con il design system esistente (colore primario `var(--ms-primary)` o neutro)
- [ ] Verificare il rendering su desktop e mobile

**Libreria suggerita:** [Heroicons](https://heroicons.com/) — MIT license, SVG ottimizzati, pronti per uso inline.

---

### US-005: Aggiornare dati societari completi
**Description:** Come utente o ente che consulta il sito per dati fiscali, voglio trovare indirizzo completo e PEC corretti.

**Acceptance Criteria:**
- [ ] Footer: indirizzo aggiornato a `Via Errico Petrella 19 — 20124 Milano (MI)`
- [ ] Footer: aggiunta PEC `montagnaserviziscpa@legalmail.it`
- [ ] `privacy-policy.blade.php`: indirizzo aggiornato
- [ ] `note-legali.blade.php`: indirizzo aggiornato, aggiunta PEC
- [ ] Verificare che non rimangano occorrenze di `Via Petrella 19` senza CAP

---

### US-006: Fix copy Veryfico nella pagina `/servizi/contabilita-veryfico`
**Description:** Come responsabile MS, voglio che Veryfico sia descritto in modo neutro rispetto al CAI per evitare ambiguità commerciali.

**Acceptance Criteria:**
- [ ] Rimuovere o riformulare le frasi che presentano Veryfico come "software adottato dal Club Alpino Italiano" (o simili) nel `ServiceSeeder` e/o nel DB
- [ ] La descrizione indica che Veryfico è lo strumento con cui Montagna Servizi lavora, senza implicare una relazione ufficiale esclusiva CAI→Veryfico
- [ ] Testo aggiornato sia nella `description` breve che nel `body` HTML del servizio

---

### US-007: Verifica e fix location Italian Outdoor Festival
**Description:** Come utente, voglio leggere la città corretta per ogni evento citato nel sito.

**Acceptance Criteria:**
- [ ] Nella pagina `/servizi/comunicazione/presenza-eventi-fiere`, verificare che Italian Outdoor Festival sia associato a **Gardone Riviera** (non Milano)
- [ ] Se il `ServiceSeeder` già contiene la location corretta, verificare che il DB UAT sia allineato (potrebbe essere necessario un re-seed)
- [ ] Fa' la cosa giusta! rimane associato a Milano (corretto)

---

## Functional Requirements

- FR-1: Il form Typeform su `/contatti` deve aprirsi in italiano
- FR-2: Le bio del team su `/chi-siamo` devono essere leggibili per intero senza overflow o troncatura
- FR-3: Il footer deve contenere il link LinkedIn istituzionale con icona
- FR-4: Tutte le emoji nella home page (sezione VP + 5 card servizi) devono essere sostituite da icone SVG inline
- FR-5: Il componente `<x-service-card>` deve accettare SVG come parametro `icon`
- FR-6: Footer, privacy-policy e note-legali devono riportare `Via Errico Petrella 19 — 20124 Milano (MI)` e PEC `montagnaserviziscpa@legalmail.it`
- FR-7: La descrizione del servizio Veryfico non deve contenere affermazioni che possano creare ambiguità con la relazione CAI-Veryfico
- FR-8: La pagina presenza eventi-fiere deve citare Gardone Riviera per l'Italian Outdoor Festival

---

## Non-Goals (Out of Scope)

- Nuove sezioni: Progetti, Lavora con noi, Manifestazione di interesse, FAQ → release separata
- Sostituzione foto team AI-generated → in attesa di foto reali dal team
- Modifica alla struttura di navigazione
- Modifiche al sistema di autenticazione admin
- Ottimizzazione performance immagini (segnalata genericamente — da affrontare con dati specifici)

---

## Technical Considerations

- Le icone SVG per `<x-service-card>` richiedono di cambiare il parametro `icon` da stringa emoji a stringa SVG o componente Blade. Valutare se passare SVG inline come slot o come stringa `{!! $icon !!}`.
- Heroicons è disponibile su [heroicons.com](https://heroicons.com/) con SVG scaricabili — nessuna dipendenza npm, copia diretta nei Blade.
- Il `ServiceSeeder` usa `truncate()` + insert: le modifiche ai testi vanno fatte nel seeder (non solo nel DB) per persistere nei re-seed UAT.
- Il `TeamMemberSeeder` segue lo stesso pattern — accorciare le bio direttamente nel seeder.
- Indirizzo completo da usare in tutti i file: `Via Errico Petrella 19 — 20124 Milano (MI)` (fonte: carta intestata feedback).

---

## Success Metrics

- Zero segnalazioni di Typeform in inglese dopo il fix
- Nessun testo troncato visibile su `/chi-siamo` a 1440px e 390px
- Link LinkedIn raggiungibile dal footer in un click
- Nessuna emoji visibile nella home page
- Dati societari completi e coerenti su tutte le pagine legali e footer

---

## Open Questions

- Per le icone SVG dei 5 servizi: Riccardo e Lorena hanno preferenze su stile (outline vs solid) o su icone specifiche per categoria?
- La "Contabilità Veryfico" come icona suggerita: chart-bar? calculator? Da confermare con il team.
- Per la pagina Veryfico: il copy alternativo deve essere fornito dal team MS o elaborato da Alessio P. + AI?
