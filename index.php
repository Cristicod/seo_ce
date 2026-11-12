<?php
// =============================================================================
// PAGINA PRINCIPALĂ — Catalog Piese Auto (AutoPiese Pro)
// SEO + GEO 2026: Schema Organization, WebSite SearchAction, Speculation Rules
// =============================================================================
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/data-products.php';

// Căutare
$search_term = trim($_GET['s'] ?? '');
$products = search_autoparts($search_term);

// Meta
$page_title = $search_term !== ''
    ? 'Căutare: ' . e($search_term) . ' — ' . SITE_NAME
    : SITE_NAME . ' — Piese Auto Originale & Aftermarket Premium';

$meta_desc = 'Comandă piese auto originale și aftermarket cu verificare gratuită după serie șasiu (VIN). Discuri frână, kituri ambreiaj. Livrare în 24h, garanție 2 ani.';

$canonical_url = site_url('index.php') . ($search_term !== '' ? '?s=' . urlencode($search_term) : '');

// JSON-LD: Organization + WebSite cu SearchAction
$json_ld = '<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "' . site_url('#organization') . '",
      "name": "' . SITE_NAME . '",
      "url": "' . site_url('index.php') . '",
      "logo": "' . site_url('images/disc-brembo-front.svg') . '",
      "sameAs": [],
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "' . SITE_PHONE . '",
        "contactType": "customer service",
        "areaServed": "RO",
        "availableLanguage": "Romanian"
      }
    },
    {
      "@type": "WebSite",
      "@id": "' . site_url('#website') . '",
      "url": "' . site_url('index.php') . '",
      "name": "' . SITE_NAME . '",
      "publisher": { "@id": "' . site_url('#organization') . '" },
      "potentialAction": {
        "@type": "SearchAction",
        "target": "' . site_url('index.php?s={search_term_string}') . '",
        "query-input": "required name=search_term_string"
      }
    }
  ]
}
</script>';

$active_page = 'catalog';
$prerender_urls = ['disc-frana-brembo.php', 'kit-ambreiaj-sachs.php'];
?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG ?>">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body>

<?php require __DIR__ . '/includes/header.php'; ?>

<!-- ===== HERO ===== -->
<section class="ap-hero">
    <div class="container position-relative" style="z-index:1">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <p class="text-warning fw-bold small text-uppercase mb-2">
                    <i class="bi bi-shield-check me-1"></i> Verificare Gratuită după Serie Șasiu (VIN)
                </p>
                <h1 class="ap-hero-title">
                    Piese Auto <span>Originale</span><br>&amp; Aftermarket Premium
                </h1>
                <p class="ap-hero-sub">
                    Găsește instantaneu piese conforme specificațiilor OE pentru orice automobil.
                    Discuri de frână, kituri ambreiaj și consumabile cu garanție <?= WARRANTY_MONTHS ?> luni.
                </p>

                <!-- Căutare rapidă din Hero -->
                <div class="bg-white p-2 rounded-4 shadow-lg mb-3" style="max-width:560px;">
                    <form action="index.php#catalog" method="GET" class="d-flex align-items-center gap-2">
                        <i class="bi bi-search text-muted ms-2 fs-5"></i>
                        <input type="text"
                               name="s"
                               class="form-control border-0 shadow-none ps-1"
                               placeholder="Caută după denumire, cod sau model (ex: Brembo, Sachs, 312mm)..."
                               value="<?= e($search_term) ?>">
                        <button type="submit" class="btn btn-danger fw-bold px-4 py-2 text-nowrap rounded-3">
                            Caută Piesă
                        </button>
                    </form>
                </div>

                <div class="d-flex gap-3 flex-wrap">
                    <span class="small text-white-50"><i class="bi bi-check2 text-warning me-1"></i>Peste 150.000 de repere</span>
                    <span class="small text-white-50"><i class="bi bi-check2 text-warning me-1"></i>Verificare tehnică VIN</span>
                    <span class="small text-white-50"><i class="bi bi-check2 text-warning me-1"></i>Retur <?= RETURN_DAYS ?> zile</span>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <i class="bi bi-car-front-fill" style="font-size:8rem; color:rgba(255,255,255,0.15);"></i>
            </div>
        </div>
    </div>
</section>

<!-- ===== BANDA BENEFICII ===== -->
<div class="bg-white border-bottom py-3">
    <div class="container">
        <div class="row text-center g-2">
            <div class="col-6 col-md-3">
                <span class="small fw-semibold"><i class="bi bi-truck text-danger me-1"></i> Livrare Rapidă 24h</span>
            </div>
            <div class="col-6 col-md-3">
                <span class="small fw-semibold"><i class="bi bi-arrow-repeat text-danger me-1"></i> Retur <?= RETURN_DAYS ?> Zile</span>
            </div>
            <div class="col-6 col-md-3">
                <span class="small fw-semibold"><i class="bi bi-shield-check text-danger me-1"></i> Garanție <?= WARRANTY_MONTHS / 12 ?> Ani</span>
            </div>
            <div class="col-6 col-md-3">
                <span class="small fw-semibold"><i class="bi bi-headset text-danger me-1"></i> Consultanță Tehnică VIN</span>
            </div>
        </div>
    </div>
</div>

<!-- ===== CATALOG PRODUSE / REZULTATE CĂUTARE ===== -->
<main class="container py-5" id="catalog">
    <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4 pb-2 border-bottom">
        <div>
            <?php if ($search_term !== ''): ?>
                <h2 class="fw-bold mb-1">
                    Rezultate căutare: <span class="text-danger">"<?= e($search_term) ?>"</span>
                </h2>
                <p class="text-muted small mb-0">Au fost găsite <?= count($products) ?> piese conform criteriilor tale.</p>
            <?php else: ?>
                <h2 class="fw-bold mb-1">Catalog Piese Auto Recomandate</h2>
                <p class="text-muted small mb-0">Piese cu cel mai înalt rating de fiabilitate, conforme specificațiilor OE</p>
            <?php endif; ?>
        </div>

        <?php if ($search_term !== ''): ?>
            <a href="index.php#catalog" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1">
                <i class="bi bi-x-circle"></i> Resetează căutarea
            </a>
        <?php endif; ?>
    </div>

    <?php if (empty($products)): ?>
        <div class="text-center py-5 bg-white rounded-3 border">
            <i class="bi bi-search text-muted" style="font-size:3.5rem;"></i>
            <h3 class="fw-bold mt-3">Nicio piesă găsită pentru "<?= e($search_term) ?>"</h3>
            <p class="text-muted small mb-4" style="max-width:500px; margin:0 auto;">
                Verifică dacă ai tastat corect sau încearcă o căutare după brand
                (<strong>Brembo</strong>, <strong>Sachs</strong>), dimensiune
                (<strong>312mm</strong>, <strong>240mm</strong>) sau categorie
                (<strong>frână</strong>, <strong>ambreiaj</strong>).
            </p>
            <a href="index.php#catalog" class="btn btn-danger fw-bold px-4 py-2">
                Vezi Catalogul Complet
            </a>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($products as $p): ?>
            <div class="col-sm-6 col-lg-4">
                <div class="ap-product-card h-100 d-flex flex-column" itemscope itemtype="https://schema.org/Product">
                    <div class="ap-card-img">
                        <span class="ap-card-badge <?= $p['badge_class'] ?> text-white"><?= $p['badge'] ?></span>
                        <img src="<?= $p['image'] ?>"
                             alt="<?= e($p['name']) ?>"
                             itemprop="image"
                             width="320" height="210"
                             loading="lazy"
                             decoding="async">
                    </div>
                    <div class="ap-card-body d-flex flex-column flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="ap-card-brand mb-0" itemprop="brand"><?= $p['brand'] ?></span>
                            <span class="badge bg-light text-dark border small">Cod: <span itemprop="mpn"><?= $p['code'] ?></span></span>
                        </div>
                        <h3 class="ap-card-title" itemprop="name"><?= $p['name'] ?></h3>
                        <p class="ap-card-specs flex-grow-1" itemprop="description"><?= $p['specs'] ?></p>
                        <div class="ap-card-price-row mt-auto" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                            <meta itemprop="priceCurrency" content="RON">
                            <meta itemprop="priceValidUntil" content="2027-12-31">
                            <link itemprop="availability" href="https://schema.org/InStock">
                            <link itemprop="itemCondition" href="https://schema.org/NewCondition">
                            <div>
                                <ins class="text-decoration-none" aria-label="Preț actual">
                                    <data class="ap-price" value="<?= $p['price'] ?>.00" itemprop="price"><?= $p['price'] ?> Lei</data>
                                </ins>
                                <del class="ap-price-old" aria-label="Preț vechi de listă">
                                    <data value="<?= $p['price_old'] ?>.00"><?= $p['price_old'] ?> Lei</data>
                                </del>
                            </div>
                            <span class="ap-discount">În Stoc</span>
                        </div>
                        <a href="<?= $p['url'] ?>" class="ap-card-btn mt-2" itemprop="url">
                            <i class="bi bi-eye me-1"></i> Vezi Detalii &amp; Galerie
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>
