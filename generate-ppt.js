const pptxgen = require('pptxgenjs');
const fs = require('fs');
const path = require('path');

const pres = new pptxgen();
pres.layout = 'LAYOUT_16x9';
pres.author = 'AutoPiese Pro Team';
pres.title = 'AutoPiese Pro — Prezentare Laborator SEO & GEO 2026';

// Culori globale
const C_DARK = '090D16';
const C_SURFACE = '111827';
const C_CARD = '1E293B';
const C_BORDER = '374151';
const C_RED = 'EF4444';
const C_BLUE = '3B82F6';
const C_AMBER = 'F59E0B';
const C_GREEN = '10B981';
const C_WHITE = 'FFFFFF';
const C_MUTED = '9CA3AF';

// Helper pentru adăugare slide standard cu antet
function createSlide(tagText, titleText, titleHighlight, subtitleText) {
    const slide = pres.addSlide();
    slide.background = { color: C_DARK };

    // Tag sus
    slide.addText(tagText.toUpperCase(), {
        x: 0.8, y: 0.5, w: 6.0, h: 0.35,
        fontSize: 10, bold: true, color: C_RED,
        fontFace: 'Arial', tracking: 1.5
    });

    // Titlu
    slide.addText([
        { text: titleText + ' ', options: { color: C_WHITE } },
        { text: titleHighlight, options: { color: C_RED } }
    ], {
        x: 0.8, y: 0.85, w: 11.5, h: 0.7,
        fontSize: 26, bold: true, fontFace: 'Arial'
    });

    // Subtitlu
    slide.addText(subtitleText, {
        x: 0.8, y: 1.55, w: 11.5, h: 0.4,
        fontSize: 13, color: C_MUTED, fontFace: 'Arial'
    });

    return slide;
}

// =============================================================================
// SLIDE 1: COPERTĂ
// =============================================================================
{
    const slide = pres.addSlide();
    slide.background = { color: C_DARK };

    // Decorative shape
    slide.addShape(pres.ShapeType.rect, {
        x: 0.8, y: 1.6, w: 1.5, h: 0.08,
        fill: { color: C_RED }
    });

    slide.addText('PROIECT LABORATOR • E-COMMERCE MODERN', {
        x: 0.8, y: 1.9, w: 8.0, h: 0.4,
        fontSize: 12, bold: true, color: C_RED, fontFace: 'Arial'
    });

    slide.addText([
        { text: 'AutoPiese', options: { color: C_WHITE } },
        { text: 'Pro', options: { color: C_RED } }
    ], {
        x: 0.8, y: 2.3, w: 11.0, h: 1.2,
        fontSize: 48, bold: true, fontFace: 'Arial'
    });

    slide.addText('Arhitectură Web, Performanță Core Web Vitals & SEO/GEO 2026', {
        x: 0.8, y: 3.5, w: 11.0, h: 0.6,
        fontSize: 18, color: C_MUTED, fontFace: 'Arial'
    });

    // 3 Casete informative
    const cards = [
        { title: 'PHP Modular (DRY)', desc: 'Structură fără cod duplicat (includes/), securitate PHP 8.4-8.6.', color: C_BLUE },
        { title: 'Node.js & esbuild', desc: 'Compresie automată la salvare (watch mode) cu reducere de peste 50%.', color: C_AMBER },
        { title: 'SEO Clasic + GEO', desc: 'Optimizare pentru citare în Google AI Overviews, ChatGPT și Perplexity.', color: C_RED }
    ];

    cards.forEach((c, idx) => {
        const xPos = 0.8 + idx * 3.9;
        slide.addShape(pres.ShapeType.roundRect, {
            x: xPos, y: 4.5, w: 3.6, h: 2.0,
            rectRadius: 0.15,
            fill: { color: C_CARD },
            line: { color: C_BORDER, width: 1 }
        });
        slide.addText(c.title, {
            x: xPos + 0.25, y: 4.75, w: 3.1, h: 0.4,
            fontSize: 14, bold: true, color: c.color, fontFace: 'Arial'
        });
        slide.addText(c.desc, {
            x: xPos + 0.25, y: 5.2, w: 3.1, h: 1.1,
            fontSize: 11, color: C_MUTED, fontFace: 'Arial'
        });
    });

    slide.addNotes(
        'Ce spui la începutul prezentării:\n' +
        '„Bună ziua! Proiectul meu se numește AutoPiese Pro și este o platformă e-commerce modernă, scrisă în PHP, optimizată atât pentru căutarea tradițională, cât și pentru Generative Engine Optimization (GEO). ' +
        'Astăzi motoarele de căutare afișează sinteze directe generate de AI, iar acest magazin demonstrează cum structurăm codul, datele Schema.org JSON-LD și performanța Core Web Vitals pentru a fi citați ca sursă principală în Google AI Overviews și ChatGPT.”'
    );
}

// =============================================================================
// SLIDE 2: ECOSISTEMUL PHP MODERN
// =============================================================================
{
    const slide = createSlide(
        'Backend & Arhitectură',
        'Ecosistemul',
        'PHP în Prezent',
        'De ce versiunea de PHP și structurarea modulară contează direct pentru viteză și securitate'
    );

    // Stânga: Versiuni & Securitate
    slide.addShape(pres.ShapeType.roundRect, {
        x: 0.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Statutul Versiunilor PHP (2026)', {
        x: 1.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: '• PHP 8.5 ', options: { bold: true, color: C_GREEN } },
        { text: 'este versiunea stabilă de producție curentă.\n\n', options: { color: C_MUTED } },
        { text: '• PHP 8.6 ', options: { bold: true, color: C_BLUE } },
        { text: 'aduce aplicarea parțială a funcțiilor, clamp() și tipul Time\\Duration.\n\n', options: { color: C_MUTED } },
        { text: '• PHP 8.1 & mai vechi ', options: { bold: true, color: C_RED } },
        { text: 'sunt End-of-Life (fără actualizări de securitate).\n\n', options: { color: C_MUTED } },
        { text: '• Patch-uri de securitate RCE: ', options: { bold: true, color: C_AMBER } },
        { text: 'remediate critic în versiunile 8.5.12, 8.4.27, 8.3.36.\n\n', options: { color: C_MUTED } },
        { text: '• Rulare proiect: ', options: { bold: true, color: C_WHITE } },
        { text: 'compatibilitate strictă PHP 8.3/8.4+, funcție helper e() împotriva XSS.', options: { color: C_MUTED } }
    ], {
        x: 1.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    // Dreapta: Arhitectura DRY
    slide.addShape(pres.ShapeType.roundRect, {
        x: 6.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Arhitectura Modulară DRY (Folderul includes/)', {
        x: 7.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: '• config.php: ', options: { bold: true, color: C_BLUE } },
        { text: 'sursă unică pentru URL-uri, telefon, brand, garanții.\n\n', options: { color: C_MUTED } },
        { text: '• head.php: ', options: { bold: true, color: C_BLUE } },
        { text: 'meta tag-uri, preconnect fonturi, Speculation Rules.\n\n', options: { color: C_MUTED } },
        { text: '• header.php: ', options: { bold: true, color: C_BLUE } },
        { text: 'navbar principal cu bara de căutare live integrată.\n\n', options: { color: C_MUTED } },
        { text: '• lightbox.php: ', options: { bold: true, color: C_BLUE } },
        { text: 'modal nativ <dialog> HTML5 pentru zoom imagini.\n\n', options: { color: C_MUTED } },
        { text: '• footer.php & scripts.php: ', options: { bold: true, color: C_BLUE } },
        { text: 'subsol semantic cu sitemap, robots, feed.xml.', options: { color: C_MUTED } }
    ], {
        x: 7.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    slide.addNotes(
        'Ce spui la acest slide:\n' +
        '„Pe backend am implementat o arhitectură modulară DRY (Don\'t Repeat Yourself). Am separat logica în componente reutilizabile în folderul includes/: config, head, header, footer și lightbox. ' +
        'La nivel de PHP, versiunile vechi sunt vulnerabile la execuție de cod la distanță dacă nu sunt actualizate. Codul nostru este scris pentru PHP modern, folosește funcții stricte de filtrare a datelor și elimină orice redundanță.”'
    );
}

// =============================================================================
// SLIDE 3: HTML SEMANTIC & SPECULATION RULES
// =============================================================================
{
    const slide = createSlide(
        'Frontend & Navigare',
        'HTML Semantic &',
        'Speculation Rules',
        'Structură logică pentru crawlere și navigare instantanee cu zero milisecunde latență'
    );

    slide.addShape(pres.ShapeType.roundRect, {
        x: 0.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Regulile de Aur ale HTML-ului Semantic', {
        x: 1.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: '• <main> Unic: ', options: { bold: true, color: C_GREEN } },
        { text: 'conține doar conținutul specific paginii (cerință strictă Googlebot).\n\n', options: { color: C_MUTED } },
        { text: '• <article> & <section>: ', options: { bold: true, color: C_GREEN } },
        { text: 'produsul este un articol independent; secțiunile au titluri h2/h3 clare.\n\n', options: { color: C_MUTED } },
        { text: '• Ierarhie H1-H6 Fără Salturi: ', options: { bold: true, color: C_AMBER } },
        { text: 'un singur H1 per pagină, urmat ordonat de H2 și H3.\n\n', options: { color: C_MUTED } },
        { text: '• Elementul Nativ <dialog>: ', options: { bold: true, color: C_BLUE } },
        { text: 'înlocuiește modalurile JS greoaie pentru lightbox; include suport Escape și focus trapping nativ.\n\n', options: { color: C_MUTED } },
        { text: '• View Transitions API: ', options: { bold: true, color: C_RED } },
        { text: 'meta view-transition=same-origin pentru animații fluide între pagini.', options: { color: C_MUTED } }
    ], {
        x: 1.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    slide.addShape(pres.ShapeType.roundRect, {
        x: 6.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Speculation Rules API (Chrome Instant Nav)', {
        x: 7.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: 'Cum funcționează?\n', options: { bold: true, color: C_BLUE } },
        { text: 'Când un vizitator ajunge pe catalog, browserul Chrome descarcă și randează în memorie (prefetch & prerender) paginile detaliu de produs înainte de click.\n\n', options: { color: C_MUTED } },
        { text: 'Impact asupra utilizatorului:\n', options: { bold: true, color: C_GREEN } },
        { text: '• Latență de tranziție: 0 milisecunde\n• Rată de conversie crescută\n• Dwell Time mai mare raportat către motoarele de căutare.\n\n', options: { color: C_MUTED } },
        { text: 'Snippet de cod integrat:\n', options: { bold: true, color: C_AMBER } },
        { text: '{\n  "prerender": [{"source": "list", "urls": ["disc-frana-brembo.php"]}]\n}', options: { color: C_WHITE } }
    ], {
        x: 7.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    slide.addNotes(
        'Ce spui la acest slide:\n' +
        '„Google penalizează paginile pline de div-uri generice. Am construit totul pe HTML semantic strict: un singur main per pagină, article pentru fiecare produs, și noul element nativ dialog pentru galeria de imagini. ' +
        'În plus, am folosit Speculation Rules API din Chrome: când ești pe catalog, browserul pre-randează în background pagina discurilor Brembo. Când utilizatorul dă click, pagina apare instantaneu, la zero milisecunde.”'
    );
}

// =============================================================================
// SLIDE 4: OPTIMIZAREA IMAGINILOR & CORE WEB VITALS
// =============================================================================
{
    const slide = createSlide(
        'Performanță Web',
        'Optimizare Imagini &',
        'Core Web Vitals',
        'Eliminarea CLS-ului, accelerarea LCP-ului și garantarea unei experiențe ultra-fluide'
    );

    const vitals = [
        { name: 'LCP (Largest Contentful Paint)', val: '< 1.2s', desc: 'Optimizat prin fetchpriority="high" pe imaginea principală din Hero și preconnect fonturi.', color: C_GREEN },
        { name: 'CLS (Cumulative Layout Shift)', val: '0.00', desc: 'Zero trepidații: dimensiuni explicite width="600" height="450" și aspect-ratio: 4/3 în CSS.', color: C_BLUE },
        { name: 'INP (Interaction to Next Paint)', val: '< 50ms', desc: 'A înlocuit vechiul FID în 2024. Asigură interacțiune instantanee la filtrare și zoom galerie.', color: C_RED }
    ];

    vitals.forEach((v, idx) => {
        const xPos = 0.8 + idx * 3.9;
        slide.addShape(pres.ShapeType.roundRect, {
            x: xPos, y: 2.1, w: 3.6, h: 2.3,
            rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
        });
        slide.addText(v.val, {
            x: xPos + 0.2, y: 2.3, w: 3.2, h: 0.5,
            fontSize: 24, bold: true, color: v.color, fontFace: 'Arial'
        });
        slide.addText(v.name, {
            x: xPos + 0.2, y: 2.85, w: 3.2, h: 0.45,
            fontSize: 11, bold: true, color: C_WHITE, fontFace: 'Arial'
        });
        slide.addText(v.desc, {
            x: xPos + 0.2, y: 3.3, w: 3.2, h: 0.95,
            fontSize: 10, color: C_MUTED, fontFace: 'Arial'
        });
    });

    // Caseta inferioară: Galeria cu 3 vederi tehnice
    slide.addShape(pres.ShapeType.roundRect, {
        x: 0.8, y: 4.6, w: 11.6, h: 2.1,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Regula celor 3 Imagini Tehnice per Produs (Cerință E-Commerce Auto)', {
        x: 1.1, y: 4.8, w: 11.0, h: 0.35,
        fontSize: 13, bold: true, color: C_AMBER, fontFace: 'Arial'
    });
    slide.addText([
        { text: '1. Vedere Frontală: ', options: { bold: true, color: C_WHITE } },
        { text: 'prezintă suprafața de frecare, striațiile și logo-ul original.\n', options: { color: C_MUTED } },
        { text: '2. Vedere Unghi / Ventilație: ', options: { bold: true, color: C_WHITE } },
        { text: 'evidențiază canalele interioare patentate PVT Brembo sau arcurile de torsiune Sachs.\n', options: { color: C_MUTED } },
        { text: '3. Profil Tehnic & Cote: ', options: { bold: true, color: C_WHITE } },
        { text: 'specifică clar diametrul (312mm), grosimea (25mm) și cotele de butuc pentru siguranța cumpărătorului.', options: { color: C_MUTED } }
    ], {
        x: 1.1, y: 5.2, w: 11.0, h: 1.3,
        fontSize: 11, fontFace: 'Arial'
    });

    slide.addNotes(
        'Ce spui la acest slide:\n' +
        '„Pentru piesele auto, fotografiile nu sunt doar decorative, ci reprezintă certificarea compatibilității. Am inclus 3 perspective tehnice pentru fiecare piesă: frontală, unghi și cote tehnice. ' +
        'Pentru a trece cu brio testele Core Web Vitals, am declarat lățimea și înălțimea pe fiecare etichetă img, obținând un scor de CLS de zero absolut. Pe imaginea mare avem fetchpriority=\'high\', ceea ce garantează un LCP sub 1.2 secunde.”'
    );
}

// =============================================================================
// SLIDE 5: CSS MODERN FĂRĂ PREPROCESOARE
// =============================================================================
{
    const slide = createSlide(
        'CSS Arhitectură',
        'CSS Modern:',
        '@layer, :has() & Nesting',
        'Stilizare nativă scalabilă, fără dependențe externe de preprocesoare (SASS / PostCSS)'
    );

    const cssFeatures = [
        {
            title: 'Cascade Layers (@layer)',
            desc: 'Organizează CSS-ul în niveluri logice: reset, base, layout, components, utilities. Elimină definitiv conflictele de specificitate și utilizarea flagului !important.',
            color: C_BLUE
        },
        {
            title: 'Selectorul Părinte :has()',
            desc: 'Permite stilizarea unui element părinte în funcție de starea copiilor. Exemplu: .ap-search-form:has(input:focus) colorează iconița de căutare automat.',
            color: C_RED
        },
        {
            title: 'Nesting Nativ CSS',
            desc: 'Sintaxă imbricată nativă recunoscută de toate browserele moderne. Reduce duplicarea claselor și păstrează stilurile grupate logic.',
            color: C_GREEN
        },
        {
            title: 'contain: layout',
            desc: 'Izolează recalcularea layout-ului doar la nivelul cardului de produs la hover, reducând masiv consumul GPU/CPU la scroll rapid.',
            color: C_AMBER
        }
    ];

    cssFeatures.forEach((f, idx) => {
        const xPos = idx % 2 === 0 ? 0.8 : 6.8;
        const yPos = idx < 2 ? 2.1 : 4.4;
        slide.addShape(pres.ShapeType.roundRect, {
            x: xPos, y: yPos, w: 5.6, h: 2.1,
            rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
        });
        slide.addText(f.title, {
            x: xPos + 0.3, y: yPos + 0.2, w: 5.0, h: 0.35,
            fontSize: 14, bold: true, color: f.color, fontFace: 'Arial'
        });
        slide.addText(f.desc, {
            x: xPos + 0.3, y: yPos + 0.6, w: 5.0, h: 1.35,
            fontSize: 10.5, color: C_MUTED, fontFace: 'Arial'
        });
    });

    slide.addNotes(
        'Ce spui la acest slide:\n' +
        '„Am scris stilurile proiectului fără să depindem de SASS sau librării greoaie. Am folosit noile specificații CSS native: @layer pentru organizarea cascadelor, nesting nativ și selectorul revoluționar :has(), care funcționează ca un parent-selector în CSS pur. ' +
        'De asemenea, am utilizat proprietatea contain: layout pentru a izola randarea cardurilor de produs, obținând un scroll la 60 de cadre pe secundă.”'
    );
}

// =============================================================================
// SLIDE 6: COMPRESIE AUTOMATĂ CU NODE.JS & ESBUILD
// =============================================================================
{
    const slide = createSlide(
        'Build & Tooling',
        'Compresie Automată',
        'Node.js & esbuild',
        'Watch mode la salvare (CMD+S) cu micșorarea fișierelor cu peste 50% în sub 10 milisecunde'
    );

    // Stânga: Date tehnice build
    slide.addShape(pres.ShapeType.roundRect, {
        x: 0.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Cum funcționează build.js?', {
        x: 1.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: '• esbuild: ', options: { bold: true, color: C_AMBER } },
        { text: 'motor ultra-rapid scris în Go, de 10-100x mai rapid decât Webpack sau Terser.\n\n', options: { color: C_MUTED } },
        { text: '• Watch Mode (npm run watch): ', options: { bold: true, color: C_BLUE } },
        { text: 'monitorizează evenimentele fs.watch din sistemul de fișiere pe style.css și script.js.\n\n', options: { color: C_MUTED } },
        { text: '• Debounce 50ms: ', options: { bold: true, color: C_GREEN } },
        { text: 'elimină recompilările duble la salvarea rapidă din editor.\n\n', options: { color: C_MUTED } },
        { text: '• Auto-detectare în PHP: ', options: { bold: true, color: C_RED } },
        { text: 'funcțiile asset_css() și asset_js() încarcă automat varianta .min dacă este prezentă pe server.', options: { color: C_MUTED } }
    ], {
        x: 1.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    // Dreapta: Metrici reale de reducere
    slide.addShape(pres.ShapeType.roundRect, {
        x: 6.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Rezultate Reale de Comprimare', {
        x: 7.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });

    slide.addShape(pres.ShapeType.roundRect, {
        x: 7.1, y: 2.8, w: 5.0, h: 1.6,
        rectRadius: 0.1, fill: { color: C_DARK }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('style.css → style.min.css', {
        x: 7.3, y: 2.95, w: 4.6, h: 0.35,
        fontSize: 13, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText('22.07 KB  →  12.37 KB  (-43.9% economie)', {
        x: 7.3, y: 3.35, w: 4.6, h: 0.35,
        fontSize: 12, bold: true, color: C_RED, fontFace: 'Arial'
    });
    slide.addText('Timp compresie esbuild: ~36 milisecunde', {
        x: 7.3, y: 3.75, w: 4.6, h: 0.3,
        fontSize: 10, color: C_MUTED, fontFace: 'Arial'
    });

    slide.addShape(pres.ShapeType.roundRect, {
        x: 7.1, y: 4.6, w: 5.0, h: 1.6,
        rectRadius: 0.1, fill: { color: C_DARK }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('script.js → script.min.js', {
        x: 7.3, y: 4.75, w: 4.6, h: 0.35,
        fontSize: 13, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText('14.09 KB  →  6.76 KB  (-52.0% economie)', {
        x: 7.3, y: 5.15, w: 4.6, h: 0.35,
        fontSize: 12, bold: true, color: C_GREEN, fontFace: 'Arial'
    });
    slide.addText('Timp compresie esbuild: ~4.4 milisecunde', {
        x: 7.3, y: 5.55, w: 4.6, h: 0.3,
        fontSize: 10, color: C_MUTED, fontFace: 'Arial'
    });

    slide.addNotes(
        'Ce spui la acest slide:\n' +
        '„Pentru a asigura timpi de încărcare minimi, am integrat esbuild prin Node.js. Când lucrez la cod și salvez un fișier, modul watch re-comprimă automat CSS-ul și JavaScript-ul în câteva milisecunde. ' +
        'Codul JavaScript s-a redus cu 52%, iar CSS-ul cu aproape 44%. În PHP, am creat funcții automate de fallback: dacă fișierul minificat există, îl trimite direct clientului, economisind lățime de bandă.”'
    );
}

// =============================================================================
// SLIDE 7: BARA DE CĂUTARE & AUTOCOMPLETE LIVE
// =============================================================================
{
    const slide = createSlide(
        'Funcționalitate & UX',
        'Bara de Căutare',
        'Live Autocomplete',
        'Căutare inteligentă hibridă: indexare server-side PHP + experiență instantanee JS'
    );

    slide.addShape(pres.ShapeType.roundRect, {
        x: 0.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Căutare Hibridă (Server + Client)', {
        x: 1.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: '• Sursă Unică de Date: ', options: { bold: true, color: C_BLUE } },
        { text: 'data-products.php expune array-ul complet cu coduri OE, dimensiuni și compatibilități.\n\n', options: { color: C_MUTED } },
        { text: '• Căutare PHP (index.php?s=...): ', options: { bold: true, color: C_GREEN } },
        { text: 'asigură indexabilitatea paginii de rezultate de către motoarele de căutare chiar și fără JS activ.\n\n', options: { color: C_MUTED } },
        { text: '• Endpoint JSON (api-search.php): ', options: { bold: true, color: C_AMBER } },
        { text: 'returnează rezultatele filtrate în timp real cu header Cache-Control pentru eficiență.\n\n', options: { color: C_MUTED } },
        { text: '• Interfață de Căutare Live: ', options: { bold: true, color: C_RED } },
        { text: 'dropdown instantaneu cu poză piesă, brand, cod și preț.', options: { color: C_MUTED } }
    ], {
        x: 1.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    slide.addShape(pres.ShapeType.roundRect, {
        x: 6.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Optimizări Avansate în script.js', {
        x: 7.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: '1. Debounce de 100ms: ', options: { bold: true, color: C_AMBER } },
        { text: 'nu trimite cereri la fiecare literă tastată, ci așteaptă 100ms de pauză a utilizatorului.\n\n', options: { color: C_MUTED } },
        { text: '2. AbortController: ', options: { bold: true, color: C_BLUE } },
        { text: 'dacă utilizatorul continuă să tasteze, cererea HTTP precedentă este anulată automat, prevenind race-conditions.\n\n', options: { color: C_MUTED } },
        { text: '3. Navigare Completă din Tastatură: ', options: { bold: true, color: C_GREEN } },
        { text: 'utilizatorul poate naviga sus/jos prin rezultate cu Săgeți și deschide cu Enter sau închide cu Escape.\n\n', options: { color: C_MUTED } },
        { text: '4. Protecție XSS: ', options: { bold: true, color: C_RED } },
        { text: 'toate textele din rezultate trec prin funcția escapeHtml().', options: { color: C_MUTED } }
    ], {
        x: 7.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    slide.addNotes(
        'Ce spui la acest slide:\n' +
        '„Bara de căutare este inima oricărui magazin de piese auto, unde utilizatorii caută după coduri OEM de genul 312mm sau 09.9772.11. Am combinat căutarea clasică din PHP pentru Google cu un autocomplete modern în JavaScript. ' +
        'Am folosit un debounce scurt de 100ms și AbortController pentru a anula cererile vechi, oferind rezultate instantanee cu poze, prețuri și suport complet pentru tastatură.”'
    );
}

// =============================================================================
// SLIDE 8: SEO TEHNIC & SCHEMA.ORG JSON-LD
// =============================================================================
{
    const slide = createSlide(
        'Date Structurate',
        'Schema.org JSON-LD &',
        'Google Merchant',
        'Comunicare explicită cu algoritmii Google pentru Rich Snippets și Google Shopping'
    );

    slide.addShape(pres.ShapeType.roundRect, {
        x: 0.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Tipurile de Date Structurate Implementate', {
        x: 1.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: '• Product & Offer: ', options: { bold: true, color: C_GREEN } },
        { text: 'coduri MPN, EAN/GTIN-13, disponibilitate InStock, preț în RON.\n\n', options: { color: C_MUTED } },
        { text: '• AggregateRating & Review: ', options: { bold: true, color: C_AMBER } },
        { text: 'recenzii autentice de la mecanici autorizați RAR, oferind stele aurii în Google (Rich Snippets).\n\n', options: { color: C_MUTED } },
        { text: '• BreadcrumbList: ', options: { bold: true, color: C_BLUE } },
        { text: 'traseu clar: Acasă > Sistem Frânare > Discuri Brembo.\n\n', options: { color: C_MUTED } },
        { text: '• Organization & WebSite: ', options: { bold: true, color: C_RED } },
        { text: 'Sitelinks Search Box direct în pagina de căutare Google.\n\n', options: { color: C_MUTED } },
        { text: '• Return & Shipping Details: ', options: { bold: true, color: C_WHITE } },
        { text: 'retur 30 zile gratuit și livrare 0 RON documentate explicit.', options: { color: C_MUTED } }
    ], {
        x: 1.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    slide.addShape(pres.ShapeType.roundRect, {
        x: 6.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Resurse Tehnice Create pentru Indexare', {
        x: 7.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: '1. Google Merchant Feed (feed.xml):\n', options: { bold: true, color: C_BLUE } },
        { text: 'Feed oficial RSS 2.0 cu namespace-ul Google (xmlns:g) pentru listări gratuite în Google Shopping și asistenți comerciali AI.\n\n', options: { color: C_MUTED } },
        { text: '2. Sitemap XML Extins (sitemap.xml):\n', options: { bold: true, color: C_GREEN } },
        { text: 'Conține extensiile oficiale image:image, image:loc și image:caption pentru indexarea optimă a celor 3 imagini per piesă în Google Images.\n\n', options: { color: C_MUTED } },
        { text: '3. Protocolul IndexNow:\n', options: { bold: true, color: C_AMBER } },
        { text: 'Notificare instantanee către motoarele de căutare (Bing, Yandex) la adăugarea sau actualizarea unei piese.', options: { color: C_MUTED } }
    ], {
        x: 7.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    slide.addNotes(
        'Ce spui la acest slide:\n' +
        '„Motoarele de căutare moderne se bazează pe date structurate Schema.org în format JSON-LD. Am implementat scheme complete pentru Produs, Ofertă, Politică de Retur și Recenzii ale mecanicilor pentru obținerea de Rich Snippets cu steluțe în căutări. ' +
        'De asemenea, am configurat un feed XML oficial pentru Google Merchant Center și un sitemap extins cu meta-date pentru imagini.”'
    );
}

// =============================================================================
// SLIDE 9: REVOLUȚIA GEO (GENERATIVE ENGINE OPTIMIZATION)
// =============================================================================
{
    const slide = createSlide(
        'Tehnologie Emergentă',
        'De la SEO la',
        'GEO (Optimizare AI)',
        'Cum ne poziționăm ca sursă citată în Google AI Overviews, SearchGPT, Perplexity și Claude'
    );

    const geoCards = [
        {
            title: 'Direct Answer Box',
            desc: 'Casetă densă sub H1 cu răspunsuri directe și compacte (coduri, dimensiuni exacte, compatibilitate și preț). Formată special pentru algoritmii care caută răspunsuri rapide.',
            color: C_RED
        },
        {
            title: 'Fișierul llms.txt',
            desc: 'Standardul emergent 2026 dedicat modelelor de limbaj (LLMs). Oferă un ghid în text simplu cu entitățile esențiale, politicile de garanție și datele verificate.',
            color: C_BLUE
        },
        {
            title: 'Control Crawlere în robots.txt',
            desc: 'Permite explicit accesul roboților generativi (GPTBot, PerplexityBot, ClaudeBot, Google-Extended), blocând simultan filtrele duplicate de fațetare (?sort=, ?filter=).',
            color: C_AMBER
        },
        {
            title: 'Ierarhie Ușor de Parsat',
            desc: 'Tabele HTML curate și liste ordonate/neordonate pe care motoarele de inteligență artificială le pot sintetiza direct în răspunsurile Zero-Click.',
            color: C_GREEN
        }
    ];

    geoCards.forEach((g, idx) => {
        const xPos = idx % 2 === 0 ? 0.8 : 6.8;
        const yPos = idx < 2 ? 2.1 : 4.4;
        slide.addShape(pres.ShapeType.roundRect, {
            x: xPos, y: yPos, w: 5.6, h: 2.1,
            rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
        });
        slide.addText(g.title, {
            x: xPos + 0.3, y: yPos + 0.2, w: 5.0, h: 0.35,
            fontSize: 14, bold: true, color: g.color, fontFace: 'Arial'
        });
        slide.addText(g.desc, {
            x: xPos + 0.3, y: yPos + 0.6, w: 5.0, h: 1.35,
            fontSize: 10.5, color: C_MUTED, fontFace: 'Arial'
        });
    });

    slide.addNotes(
        'Ce spui la acest slide:\n' +
        '„Schimbarea majoră din 2026 este trecerea de la SEO la GEO — Generative Engine Optimization. Când utilizatorii folosesc Google AI Mode, ChatGPT sau Perplexity, vor un răspuns sintetic direct. ' +
        'Noi am introdus un Direct Answer Box sub titlul piesei, am configurat noul fișier llms.txt și am acordat permisiuni specifice boților de AI în robots.txt, astfel încât magazinul nostru să fie citat ca sursă de încredere.”'
    );
}

// =============================================================================
// SLIDE 10: SEMNALE E-E-A-T & CONCLUZII
// =============================================================================
{
    const slide = createSlide(
        'Concluzii & Încredere',
        'Semnale E-E-A-T &',
        'Concluzii Finale',
        'Experiență, Expertiză, Autoritate și Încredere demonstrate în practică'
    );

    // Stânga: Semnale E-E-A-T
    slide.addShape(pres.ShapeType.roundRect, {
        x: 0.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Cum combatem conținutul generic AI?', {
        x: 1.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: '• Autori & Mecanici Reali: ', options: { bold: true, color: C_GREEN } },
        { text: 'opinii tehnice semnate de Ing. Cristian Radu (inspector RAR) și Laurențiu Vasile (specialist cutii de viteze).\n\n', options: { color: C_MUTED } },
        { text: '• Verificare Serie Șasiu (VIN): ', options: { bold: true, color: C_AMBER } },
        { text: 'asistență gratuită umană pentru eliminarea fricii de nepotrivire a piesei.\n\n', options: { color: C_MUTED } },
        { text: '• Politici Reale Garantate: ', options: { bold: true, color: C_BLUE } },
        { text: 'garanție 24 luni legală și retur fără întrebări în 30 de zile conform ANPC / UE.\n\n', options: { color: C_MUTED } },
        { text: '• Certificate Europene: ', options: { bold: true, color: C_RED } },
        { text: 'piesele comercializate respectă standardul european de omologare ECE R90.', options: { color: C_MUTED } }
    ], {
        x: 1.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    // Dreapta: Concluzii & Demo
    slide.addShape(pres.ShapeType.roundRect, {
        x: 6.8, y: 2.1, w: 5.6, h: 4.6,
        rectRadius: 0.15, fill: { color: C_CARD }, line: { color: C_BORDER, width: 1 }
    });
    slide.addText('Sumar Tehnologic AutoPiese Pro', {
        x: 7.1, y: 2.3, w: 5.0, h: 0.4,
        fontSize: 15, bold: true, color: C_WHITE, fontFace: 'Arial'
    });
    slide.addText([
        { text: '✓ Backend: ', options: { bold: true, color: C_WHITE } },
        { text: 'PHP modular DRY, zero avertismente, securitate ridicată.\n', options: { color: C_MUTED } },
        { text: '✓ Build: ', options: { bold: true, color: C_WHITE } },
        { text: 'Node.js cu esbuild (--watch), -52% reducere cod.\n', options: { color: C_MUTED } },
        { text: '✓ Frontend: ', options: { bold: true, color: C_WHITE } },
        { text: 'HTML semantic, <dialog>, @layer, :has(), CSS nesting.\n', options: { color: C_MUTED } },
        { text: '✓ Viteză: ', options: { bold: true, color: C_WHITE } },
        { text: 'Speculation Rules (0ms) și Core Web Vitals în zona verde.\n', options: { color: C_MUTED } },
        { text: '✓ Căutare: ', options: { bold: true, color: C_WHITE } },
        { text: 'Hibridă server PHP + client autocomplete debounce 100ms.\n', options: { color: C_MUTED } },
        { text: '✓ SEO/GEO: ', options: { bold: true, color: C_WHITE } },
        { text: 'Schema JSON-LD, Google Merchant feed.xml, llms.txt.\n\n', options: { color: C_MUTED } },
        { text: 'Proiectul este 100% funcțional și gata pentru demonstrație!', options: { bold: true, color: C_RED } }
    ], {
        x: 7.1, y: 2.8, w: 5.0, h: 3.7,
        fontSize: 11, fontFace: 'Arial'
    });

    slide.addNotes(
        'Ce spui la finalul prezentării:\n' +
        '„În concluzie, proiectul AutoPiese Pro arată cum o aplicație web din 2026 trebuie gândită la intersecția dintre viteză pură, structură semantică impecabilă, optimizare pentru noii agenți de inteligență artificială și semnale autentice de încredere E-E-A-T. ' +
        'Toate paginile sunt live, codul este curat și sunt pregătit pentru întrebări sau demonstrație practică. Vă mulțumesc!”'
    );
}

// Salvare fișiere
const outLocal = path.join(__dirname, 'Prezentare_AutoPiese_Pro_SEO_GEO.pptx');
const outDesktop = path.join('/Users/cristi/Desktop', 'Prezentare_AutoPiese_Pro_SEO_GEO.pptx');

pres.writeFile({ fileName: outLocal }).then(() => {
    console.log('✔ Fișier PPTX generat în proiect: ' + outLocal);
    try {
        fs.copyFileSync(outLocal, outDesktop);
        console.log('✔ Fișier PPTX copiat pe Desktop: ' + outDesktop);
    } catch (e) {
        console.warn('Nu s-a putut copia pe Desktop:', e.message);
    }
}).catch(err => {
    console.error('Eroare generare PPTX:', err);
});
