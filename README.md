# 🚗 AutoPiese Pro — Arhitectură E-Commerce SEO + GEO (Generative Engine Optimization 2026)

Proiect demonstrativ complet pentru laborator, implementat în **PHP modern** și optimizat pentru **Google SEO clasic**, **Core Web Vitals** și **GEO (Generative Engine Optimization)** pentru citare în motoarele AI (Google AI Overviews, SearchGPT, Perplexity, Claude, Gemini).

---

## 🎯 Prezentare pentru Laborator

Deschide direct în browser prezentarea interactivă (slide-uri cu note de prezentare):
👉 **[`http://localhost:8000/seo/prezentare.html`](http://localhost:8000/seo/prezentare.html)**
*(Taste: `Săgeată Dreapta`/`Spațiu` = următorul slide, `Săgeată Stânga` = slide anterior, `F` = Fullscreen, `N` = Note vorbitor)*

---

## 📂 Structura Proiectului (Modulară, DRY)

```text
seo/
├── includes/                   # Componente PHP partajate (DRY)
│   ├── config.php              # Configurare globală (URL-uri, brand, politici)
│   ├── head.php                # <head> comun, meta, preconnect, Speculation Rules
│   ├── header.php              # Navbar + bară de căutare live integrată
│   ├── footer.php              # Footer semantic cu linkuri tehnice
│   ├── lightbox.php            # Modal <dialog> HTML5 nativ pentru galerie
│   └── scripts.php             # Încărcare Bootstrap & script.min.js
├── images/                     # Grafice vectoriale produse auto (Brembo & Sachs)
├── api-search.php              # Endpoint JSON pentru autocomplete live
├── data-products.php           # Sursă unică de date piese auto (PHP array)
├── index.php                   # Catalog principal + căutare hibridă
├── disc-frana-brembo.php       # Pagină produs: Discuri Frână Brembo Max 312mm
├── kit-ambreiaj-sachs.php      # Pagină produs: Kit Ambreiaj Sachs 240mm
├── prezentare.html             # PPT interactiv pentru laborator (Slide Deck)
├── style.css / style.min.css   # CSS modern (@layer, :has(), nesting)
├── script.js / script.min.js   # JS nativ (fără framework-uri, <dialog>, debounce)
├── build.js                    # Script Node.js de compresie automată (esbuild)
├── package.json                # Scripturi npm (build, watch, dev)
├── llms.txt                    # Standard emergent 2026 pentru boți AI
├── robots.txt                  # Politică diferențiată boți AI vs motoare clasice
├── sitemap.xml                 # Sitemap XML cu extensii Google Image
└── feed.xml                    # Feed Google Merchant Center RSS 2.0 (Shopping)
```

---

## 🚀 Comprimare Automată CSS + JS (Node.js & esbuild)

La fiecare salvare (`CMD+S` / `CTRL+S`), esbuild recomprimă automat fișierele în sub 10ms:

```bash
cd /Users/cristi/Sites/localhost/seo
npm run watch
```

Rezultate compresie:
* **CSS:** `style.css` (22 KB) → `style.min.css` (12.3 KB) — **-43.9%**
* **JavaScript:** `script.js` (14 KB) → `script.min.js` (6.7 KB) — **-52.0%**

---

## 🧠 Tehnologii & Standarde Implementate

1. **PHP:** Arhitectură modulară DRY, cod compatibil PHP 8.4–8.6, escapare XSS prin `e()`, zero warning-uri.
2. **HTML Semantic:** `<main>`, `<article>`, `<section>`, `<nav>`, `<header>`, `<footer>`, `<dialog>`, tabele de date.
3. **Speculation Rules API:** Prefetch și prerender automat în fundal în Chrome (latență 0ms la navigare).
4. **View Transitions API:** Tranziții fluide între pagini activate nativ (`view-transition: same-origin`).
5. **CSS Modern:** `@layer` (reset, base, layout, components, utilities), `:has()`, CSS nesting nativ.
6. **Date Structurate JSON-LD (Schema.org):** `Product`, `Offer`, `AggregateRating`, `Review`, `BreadcrumbList`, `Organization`, `WebSite` cu `SearchAction`.
7. **GEO (Generative Engine Optimization):**
   * *Direct Answer Box* sub `<h1>` pentru extragere facilă de către Google AI Overviews și ChatGPT.
   * Fișier `llms.txt` cu specificații verificate.
   * Crawlere AI permise explicit în `robots.txt` (`GPTBot`, `PerplexityBot`, `ClaudeBot`, `Google-Extended`).
8. **E-E-A-T:** Recomandări semnate de ingineri mecanici autorizați RAR, verificare gratuită VIN.
