<?php
// =============================================================================
// <HEAD> PARTAJAT — AutoPiese Pro
// =============================================================================
// ROL ARHITECTURAL & SEO:
// 1. Centralizează toate directivele critice de indexare pentru Googlebot și crawlere AI.
// 2. Previne conținutul duplicat prin directiva canonică generată dinamic.
// 3. Implementează cele mai noi API-uri web: View Transitions & Speculation Rules.
// 4. Optimizează Core Web Vitals prin preconnect către CDN-uri și serverele de fonturi.
// =============================================================================

$og_type        = $og_type ?? 'website';
$og_image       = $og_image ?? site_url('images/disc-brembo-front.svg');
$og_price       = $og_price ?? null;
$prerender_urls = $prerender_urls ?? ['disc-frana-brembo.php', 'kit-ambreiaj-sachs.php'];
$json_ld        = $json_ld ?? '';
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- View Transitions API: permite tranziții native animate și fluide între pagini în Chrome 126+ -->
    <meta name="view-transition" content="same-origin">

    <!-- 1. Titlu Unic & Descriptiv (Google recomandă sub 60 de caractere pentru a nu fi trunchiat în SERP) -->
    <title><?= e($page_title) ?></title>

    <!-- 2. Meta Description persuasivă (150-160 caractere, crește CTR-ul în rezultatele de căutare) -->
    <meta name="description" content="<?= e($meta_desc) ?>">

    <!-- 3. Directiva Canonical: indică versiunea originală preferată, eliminând riscul de penalizare pentru conținut duplicat -->
    <link rel="canonical" href="<?= $canonical_url ?>">

    <!-- 4. Directiva Robots: instruiește motoarele să indexeze pagina și să afișeze miniaturi mari (max-image-preview:large) -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- 5. Open Graph Protocol (Facebook, WhatsApp, LinkedIn, Discord & motoare de căutare vizuală) -->
    <meta property="og:locale" content="<?= SITE_LOCALE ?>">
    <meta property="og:type" content="<?= $og_type ?>">
    <meta property="og:title" content="<?= e($page_title) ?>">
    <meta property="og:description" content="<?= e($meta_desc) ?>">
    <meta property="og:url" content="<?= $canonical_url ?>">
    <meta property="og:site_name" content="<?= SITE_NAME ?>">
    <meta property="og:image" content="<?= $og_image ?>">
<?php if ($og_price): ?>
    <!-- Atribute speciale Open Graph & Product Graph pentru preț, monedă și promoții -->
    <meta property="og:price:amount" content="<?= $og_price['amount'] ?>">
    <meta property="og:price:currency" content="<?= $og_price['currency'] ?>">
    <meta property="product:price:amount" content="<?= $og_price['amount'] ?>">
    <meta property="product:price:currency" content="<?= $og_price['currency'] ?>">
    <?php if (!empty($og_price['old_amount'])): ?>
    <meta property="product:original_price:amount" content="<?= $og_price['old_amount'] ?>">
    <meta property="product:original_price:currency" content="<?= $og_price['currency'] ?>">
    <meta property="product:sale_price:amount" content="<?= $og_price['amount'] ?>">
    <meta property="product:sale_price:currency" content="<?= $og_price['currency'] ?>">
    <?php endif; ?>
    <meta property="product:availability" content="in stock">
    <meta property="product:condition" content="new">
<?php endif; ?>

    <!-- 6. Twitter Card (optimizat pentru partajare pe rețeaua X / Twitter) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($page_title) ?>">
    <meta name="twitter:description" content="<?= e($meta_desc) ?>">
    <meta name="twitter:image" content="<?= $og_image ?>">

    <!-- 7. Preconnect (Core Web Vitals - LCP & TTFB): inițiază handshake-ul TCP/TLS înainte de solicitarea resurselor -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

    <!-- Fonturi moderne & Framework CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- CSS Minificat Automat via esbuild (Node.js) -->
    <link rel="stylesheet" href="<?= asset_css() ?>">

    <!-- 8. Speculation Rules API (Chrome 121+): preia și randează în background paginile țintă pentru latență de 0ms la click -->
<?php if (!empty($prerender_urls)): ?>
    <script type="speculationrules">
    {
      "prerender": [{ "source": "list", "urls": <?= json_encode($prerender_urls) ?> }],
      "prefetch":  [{ "source": "list", "urls": <?= json_encode($prerender_urls) ?> }]
    }
    </script>
<?php endif; ?>

<?php if ($json_ld): ?>
    <!-- 9. Date Structurate JSON-LD (Schema.org): comunicare directă cu Google pentru Rich Snippets și asistenții AI (GEO) -->
    <?= $json_ld ?>
<?php endif; ?>
