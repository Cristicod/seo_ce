<?php
// =============================================================================
// CONFIGURARE GLOBALĂ — AutoPiese Pro
// Sursă unică de adevăr pentru URL-uri, brand, și setări site
// =============================================================================

define('SITE_NAME',     'AutoPiese Pro');
define('SITE_TAGLINE',  'Piese Auto Originale & Aftermarket Premium');
define('SITE_DOMAIN',   'http://localhost:8000');
define('SITE_BASE',     SITE_DOMAIN . '/seo');
define('SITE_LANG',     'ro');
define('SITE_LOCALE',   'ro_RO');
define('SITE_PHONE',    '+40-800-123-456');
define('SITE_YEAR',     date('Y'));

// Garanție & Politici
define('WARRANTY_MONTHS', 24);
define('RETURN_DAYS',     30);

// Detectare automată fișiere comprimate (Node.js esbuild)
function asset_css(): string {
    return file_exists(__DIR__ . '/../style.min.css') ? 'style.min.css' : 'style.css';
}

function asset_js(): string {
    return file_exists(__DIR__ . '/../script.min.js') ? 'script.min.js' : 'script.js';
}

// Helper: escape HTML safe
function e(string $text): string {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

// Helper: URL absolut pentru o pagină din /seo/
function site_url(string $path = ''): string {
    return SITE_BASE . '/' . ltrim($path, '/');
}
