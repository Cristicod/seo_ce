<?php
// =============================================================================
// API SEARCH LIVE JSON (AutoPiese Pro)
// =============================================================================
// ROL:
// 1. Endpoint REST ultra-ușor pentru funcționalitatea de Autocomplete în timp real.
// 2. Optimizat pentru latență redusă: returnează direct JSON comprimat fără template HTML.
// 3. Cache HTTP (max-age=60): permite browserului să păstreze interogările frecvente
//    în cache-ul local pentru 60 secunde, reducând încărcarea serverului.
// =============================================================================

header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: public, max-age=60');

require_once __DIR__ . '/data-products.php';

// Acceptă atât parametrul 'q' (standard API) cât și 's' (standard WordPress/Search)
$query = $_GET['q'] ?? $_GET['s'] ?? '';
$results = search_autoparts($query);

// JSON_UNESCAPED_UNICODE: păstrează diacriticele românești curate (ș, ț, ă, î, â) în loc de \u015f
// JSON_UNESCAPED_SLASHES: păstrează căile URL curate fără slash-uri escapate (images/disc.svg)
echo json_encode(array_values($results), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
