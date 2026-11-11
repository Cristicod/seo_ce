<?php
// =============================================================================
// API SEARCH LIVE JSON (Piese Auto)
// =============================================================================
header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: public, max-age=60');

require_once __DIR__ . '/data-products.php';

$query = $_GET['q'] ?? $_GET['s'] ?? '';
$results = search_autoparts($query);

echo json_encode(array_values($results), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

