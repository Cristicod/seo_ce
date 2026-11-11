<?php
// =============================================================================
// <HEAD> PARTAJAT — AutoPiese Pro
// Variabile necesare înainte de includere:
//   $page_title    (string) — titlul paginii
//   $meta_desc     (string) — meta description
//   $canonical_url (string) — URL canonical
//   $og_type       (string) — 'website' sau 'product' (implicit: 'website')
//   $og_image      (string) — URL imagine OG (opțional)
//   $og_price      (array)  — ['amount' => '489.00', 'currency' => 'RON'] (opțional)
//   $prerender_urls(array)  — URL-uri pentru Speculation Rules (opțional)
//   $json_ld       (string) — bloc JSON-LD complet (opțional)
// =============================================================================

$og_type        = $og_type ?? 'website';
$og_image       = $og_image ?? site_url('images/disc-brembo-front.svg');
$og_price       = $og_price ?? null;
$prerender_urls = $prerender_urls ?? ['disc-frana-brembo.php', 'kit-ambreiaj-sachs.php'];
$json_ld        = $json_ld ?? '';
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- View Transitions API (tranziții animate între pagini în Chrome 126+) -->
    <meta name="view-transition" content="same-origin">

    <!-- Titlu & Descriere -->
    <title><?= e($page_title) ?></title>
    <meta name="description" content="<?= e($meta_desc) ?>">

    <!-- Canonical & Robots -->
    <link rel="canonical" href="<?= $canonical_url ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- Open Graph -->
    <meta property="og:locale" content="<?= SITE_LOCALE ?>">
    <meta property="og:type" content="<?= $og_type ?>">
    <meta property="og:title" content="<?= e($page_title) ?>">
    <meta property="og:description" content="<?= e($meta_desc) ?>">
    <meta property="og:url" content="<?= $canonical_url ?>">
    <meta property="og:site_name" content="<?= SITE_NAME ?>">
    <meta property="og:image" content="<?= $og_image ?>">
<?php if ($og_price): ?>
    <meta property="og:price:amount" content="<?= $og_price['amount'] ?>">
    <meta property="og:price:currency" content="<?= $og_price['currency'] ?>">
<?php endif; ?>

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($page_title) ?>">
    <meta name="twitter:description" content="<?= e($meta_desc) ?>">
    <meta name="twitter:image" content="<?= $og_image ?>">

    <!-- Preconnect (Core Web Vitals — LCP & TTFB) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

    <!-- Fonturi & Framework CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- CSS Comprimat Automat via Node.js / esbuild -->
    <link rel="stylesheet" href="<?= asset_css() ?>">

    <!-- Speculation Rules API — Prefetch & Prerender instantaneu (Chrome 121+) -->
<?php if (!empty($prerender_urls)): ?>
    <script type="speculationrules">
    {
      "prerender": [{ "source": "list", "urls": <?= json_encode($prerender_urls) ?> }],
      "prefetch":  [{ "source": "list", "urls": <?= json_encode($prerender_urls) ?> }]
    }
    </script>
<?php endif; ?>

<?php if ($json_ld): ?>
    <!-- Date Structurate JSON-LD (Schema.org) — SEO + GEO -->
    <?= $json_ld ?>
<?php endif; ?>
