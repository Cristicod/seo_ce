<?php
// =============================================================================
// CONFIGURARE GLOBALĂ — AutoPiese Pro
// =============================================================================
// ROL ARHITECTURAL:
// 1. Single Source of Truth (Sursă Unică de Adevăr) pentru toate URL-urile,
//    datele de identificare ale entității economice și politicile comerciale.
// 2. Protecție XSS centralizată prin funcția e().
// 3. Detectare automată a activelor minificate generate prin Node.js / esbuild.
// =============================================================================

// Date de identificare Brand & Entitate (folosite în Schema.org Organization)
define('SITE_NAME',     'AutoPiese Pro');
define('SITE_TAGLINE',  'Piese Auto Originale & Aftermarket Premium');
define('SITE_DOMAIN',   'http://localhost:8000');
define('SITE_BASE',     SITE_DOMAIN . '/seo');
define('SITE_LANG',     'ro');
define('SITE_LOCALE',   'ro_RO');
define('SITE_PHONE',    '+40-800-123-456');
define('SITE_YEAR',     date('Y'));

// Politici Comerciale & Semnale de Încredere (E-E-A-T / Google Merchant)
define('WARRANTY_MONTHS', 24); // Garanție legală de conformitate 2 ani (Directiva UE)
define('RETURN_DAYS',     30); // Drept de retur extins 30 zile calendaristice

/**
 * Detectare automată asset CSS:
 * Dacă există versiunea comprimată (style.min.css), o servim prioritar în producție.
 * În caz contrar, se folosește fișierul sursă de dezvoltare (style.css).
 */
function asset_css(): string {
    return file_exists(__DIR__ . '/../style.min.css') ? 'style.min.css' : 'style.css';
}

/**
 * Detectare automată asset JavaScript:
 * Încarcă script.min.js comprimat via esbuild (-52% reducere de bandă).
 */
function asset_js(): string {
    return file_exists(__DIR__ . '/../script.min.js') ? 'script.min.js' : 'script.js';
}

/**
 * Helper de securitate: Escapare XSS (Cross-Site Scripting)
 * Convertește caracterele speciale în entități HTML sigure (UTF-8).
 */
function e(string $text): string {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Helper de rutare: Generează URL-uri absolute canonice.
 * Previne conținutul duplicat cerut de motoarele de căutare (Canonical Tags).
 */
function site_url(string $path = ''): string {
    return SITE_BASE . '/' . ltrim($path, '/');
}
