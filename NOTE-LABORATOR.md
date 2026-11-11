# 📋 Fișă de Sinteză pentru Laborator — AutoPiese Pro
> **Ce să citești cu 5 minute înainte de a începe laboratorul!**

---

## 1. Ideea Principală (Pitch de 30 de secunde)
> *„Proiectul meu, **AutoPiese Pro**, este un magazin online de piese auto dezvoltat în PHP modern, construit special pentru noul standard de căutare **SEO + GEO (Generative Engine Optimization)**. Nu ne mai optimizăm doar pentru linkurile albastre Google, ci pentru a fi **citați direct ca sursă în Google AI Overviews, ChatGPT și Perplexity**.”*

---

## 2. Cele 5 Puncte Cheie de Menționat la Fiecare Întrebare

### A. Backend & PHP (De ce e modern?)
* **PHP Modular (DRY)**: Toate paginile partajează folderul `includes/` (`config.php`, `head.php`, `header.php`, `footer.php`, `lightbox.php`). Orice modificare se propagă instant.
* **Securitate**: Versiunile vechi (&le; PHP 8.2) au atins End-of-Life sau au avut vulnerabilități critice RCE rezolvate în octombrie 2026. Codul nostru rulează pe PHP 8.3/8.4+ cu funcții de protecție XSS (`e()`).

### B. Frontend & HTML Semantic
* **Etichete semantice native**: `<main>` unic per pagină, `<article>` pentru produs, `<section>`, `<nav>`, `<aside>`, `<footer>`. Ierarhie strictă `<h1>` &rarr; `<h2>` &rarr; `<h3>` fără salturi.
* **`<dialog>` HTML5 nativ**: Folosit pentru galeria Lightbox (zoom imagine mare), oferind închidere automată la tasta Escape și focus trapping nativ accesibil.
* **Speculation Rules API**: Pre-randează automat paginile de produs în background în Chrome &rarr; **Latență 0ms la navigare!**
* **View Transitions API**: Tranziții fluide între pagini activate nativ (`view-transition: same-origin`).

### C. Optimizare Imagini & Core Web Vitals
* **Regula celor 3 imagini**: Frontal, unghi ventilație/mecanism, profil cote tehnice.
* **Zero CLS (Cumulative Layout Shift = 0)**: Dimensiuni explicite `width` și `height` pe toate pozele + `aspect-ratio: 4/3` în CSS.
* **LCP &lt; 1.2s**: `fetchpriority="high"` pe imaginea principală, `loading="lazy"` pe restul.
* **INP &lt; 50ms**: Răspuns instantaneu la interacțiunea cu utilizatorul.

### D. CSS Modern fără Dependențe
* **Cascade Layers (`@layer`)**: `reset, base, layout, components, utilities` — zero conflicte de specificitate, fără `!important`.
* **Selectorul părinte `:has()`**: `.ap-search-form:has(input:focus)` colorează iconița de căutare în roșu când utilizatorul tastează.
* **CSS Nesting nativ**: Fără preprocesoare (fără SASS sau PostCSS).

### E. Node.js & esbuild Automation
* Comprimare automată în fundal: `npm run watch`.
* La fiecare `CMD+S`, esbuild comprimă fișierele în sub 10ms:
  * `style.css` (22 KB) &rarr; `style.min.css` (12.3 KB) — **-43.9%**
  * `script.js` (14 KB) &rarr; `script.min.js` (6.7 KB) — **-52.0%**
* PHP detectează automat versiunea `.min` pe disc.

### F. SEO Tehnic & GEO (Generative Engine Optimization)
* **Date Structurate Schema.org JSON-LD**:
  * `Product`, `Offer`, `AggregateRating`, `Review` (recenzii semnate de mecanici RAR pentru Rich Snippets cu stele aurii în Google).
  * `BreadcrumbList`, `Organization`, `WebSite` cu `SearchAction`.
* **Google Merchant Center Feed (`feed.xml`)**: RSS 2.0 cu namespace `xmlns:g` pentru Google Shopping.
* **Direct Answer Box**: Casetă densă sub H1 cu răspunsuri directe (dimensiuni, compatibilitate, preț) ușor de parsat de boții AI.
* **`llms.txt`**: Standard emergent 2026 pentru ghidarea AI-ului.
* **`robots.txt`**: Permite explicit `GPTBot`, `PerplexityBot`, `ClaudeBot`, `Google-Extended` și blochează filtrele duplicate.
* **E-E-A-T**: Recomandări scrise de ingineri mecanici autorizați RAR, verificare gratuită VIN.

---

## 3. Linkuri Rapide pentru Demonstrație în Laborator
* **Prezentarea Interactivă (Slides)**: `http://localhost:8000/seo/prezentare.html`
* **Catalogul Magazinului**: `http://localhost:8000/seo/index.php`
* **Produs 1 (Discuri Brembo 312mm)**: `http://localhost:8000/seo/disc-frana-brembo.php`
* **Produs 2 (Kit Ambreiaj Sachs 240mm)**: `http://localhost:8000/seo/kit-ambreiaj-sachs.php`
* **Feed Google Merchant**: `http://localhost:8000/seo/feed.xml`
* **Ghid AI GEO**: `http://localhost:8000/seo/llms.txt`

