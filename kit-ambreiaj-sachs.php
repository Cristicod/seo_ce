<?php
// =============================================================================
// PAGINA PRODUS — Kit Ambreiaj Complet cu Volantă Masă Dublă Sachs 240mm
// SEO + GEO 2026: Product Schema, E-E-A-T, Direct Answer Box
// =============================================================================
require_once __DIR__ . '/includes/config.php';

$page_title    = 'Kit Ambreiaj cu Volantă Sachs 240mm — 2.199 Lei | ' . SITE_NAME;
$meta_desc     = 'Cumpără Kit Ambreiaj complet cu Volantă Masă Dublă Sachs (Cod 2290 601 050) la 2.199 Lei. Compatibil 2.0 TDI VW Golf, Passat, Audi A4. Garanție 24 luni.';
$canonical_url = site_url('kit-ambreiaj-sachs.php');
$og_type       = 'product';
$og_image      = site_url('images/kit-sachs-front.svg');
$og_price      = ['amount' => '2199.00', 'old_amount' => '2650.00', 'currency' => 'RON'];
$active_page   = 'sachs';
$prerender_urls = ['index.php', 'disc-frana-brembo.php'];
$lightbox_title = 'Kit Ambreiaj Sachs 240mm (2290 601 050)';

// JSON-LD: BreadcrumbList + Product
$json_ld = '<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Acasă", "item": "' . site_url('index.php') . '" },
        { "@type": "ListItem", "position": 2, "name": "Transmisie & Ambreiaj", "item": "' . site_url('index.php#transmisie') . '" },
        { "@type": "ListItem", "position": 3, "name": "Kit Ambreiaj Sachs 240mm", "item": "' . site_url('kit-ambreiaj-sachs.php') . '" }
      ]
    },
    {
      "@type": "Product",
      "@id": "' . site_url('kit-ambreiaj-sachs.php#product') . '",
      "name": "Kit Ambreiaj Complet cu Volantă Masă Dublă Sachs 240mm (Cod 2290 601 050)",
      "image": [
        "' . site_url('images/kit-sachs-front.svg') . '",
        "' . site_url('images/kit-sachs-angle.svg') . '",
        "' . site_url('images/kit-sachs-side.svg') . '"
      ],
      "description": "Kit ambreiaj complet Sachs cu volantă bimasa (DMF), placă de presiune XTend, disc ambreiaj 240mm (23 dinți), rulment presiune hidraulic CSC și set șuruburi. Compatibil motoare 2.0 TDI Grupul VAG.",
      "sku": "SACHS-2290601050",
      "mpn": "2290 601 050",
      "gtin13": "4013872741984",
      "brand": { "@type": "Brand", "name": "Sachs" },
      "offers": {
        "@type": "Offer",
        "url": "' . site_url('kit-ambreiaj-sachs.php') . '",
        "priceCurrency": "RON",
        "price": "2199.00",
        "priceValidUntil": "2027-12-31",
        "valueAddedTaxIncluded": true,
        "priceSpecification": [
          {
            "@type": "UnitPriceSpecification",
            "priceType": "https://schema.org/ListPrice",
            "price": "2650.00",
            "priceCurrency": "RON"
          },
          {
            "@type": "UnitPriceSpecification",
            "priceType": "https://schema.org/SalePrice",
            "price": "2199.00",
            "priceCurrency": "RON"
          }
        ],
        "itemCondition": "https://schema.org/NewCondition",
        "availability": "https://schema.org/InStock",
        "seller": { "@type": "Organization", "name": "' . SITE_NAME . '" },
        "shippingDetails": {
          "@type": "OfferShippingDetails",
          "shippingRate": { "@type": "MonetaryAmount", "value": "0.00", "currency": "RON" },
          "deliveryTime": {
            "@type": "ShippingDeliveryTime",
            "transitTime": { "@type": "QuantitativeValue", "minValue": 1, "maxValue": 2, "unitCode": "DAY" }
          }
        },
        "hasMerchantReturnPolicy": {
          "@type": "MerchantReturnPolicy",
          "applicableCountry": "RO",
          "returnPolicyCategory": "https://schema.org/MerchantReturnFiniteReturnWindow",
          "merchantReturnDays": ' . RETURN_DAYS . ',
          "returnMethod": "https://schema.org/ReturnByMail",
          "returnFees": "https://schema.org/FreeReturn"
        }
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.9",
        "reviewCount": "94",
        "bestRating": "5",
        "worstRating": "1"
      },
      "review": [{
        "@type": "Review",
        "author": { "@type": "Person", "name": "Laurențiu Vasile (Mecanic Cutii de Viteze)" },
        "datePublished": "2026-09-24",
        "reviewBody": "Kitul Sachs cu volantă bimasa elimină complet vibrațiile la plecarea de pe loc. Montaj fără probleme pe Passat 2.0 TDI.",
        "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" }
      }]
    }
  ]
}
</script>';

$specs_table = [
    'Producător'          => 'ZF Sachs (Germania)',
    'Cod MPN'             => '2290 601 050',
    'Cod EAN / GTIN-13'   => '4013872741984',
    'Diametru Disc'       => '240 mm',
    'Profil Butuc / Dinți' => '23 dinți (21.8 × 24.2 mm)',
    'Tip Volantă'         => 'Masă dublă (DMF / ZMS — pentru diesel / cuplu mare)',
    'Echipare Motor'      => 'Vehicule cu volantă bimasa din fabrică',
    'Conținut Kit'        => 'Volantă, placă, disc, rulment hidraulic, șuruburi',
    'Coduri OEM VAG'      => '03L 105 266 E, 03L 105 266 DE, 03L 105 266 CL',
];

$compatibility = [
    ['VW Passat B7 (362)',      '2010 – 2014', '2.0 TDI (140CP / 170CP), Cutie Manuală 6 trepte'],
    ['VW Golf 6 (5K1)',         '2008 – 2013', '2.0 TDI (140CP / 170CP GTD)'],
    ['Skoda Superb 2 (3T4)',    '2008 – 2015', '2.0 TDI (140CP / 170CP)'],
    ['Audi A4 B8 (8K2)',        '2008 – 2015', '2.0 TDI (136CP / 143CP / 177CP)'],
];

$kit_contents = [
    'Volantă cu masă dublă (ZMS / Dual-Mass Flywheel)',
    'Placă de presiune ambreiaj auto-ajustabilă (XTend)',
    'Disc ambreiaj cu diametru 240mm (23 dinți)',
    'Rulment de presiune hidraulic (CSC inclus)',
    'Set complet șuruburi de fixare volantă incluse',
    'Vaselină specială Sachs pentru gresare caneluri',
];
?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG ?>">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body>

<?php require __DIR__ . '/includes/header.php'; ?>

<!-- Breadcrumb -->
<nav class="bg-white border-bottom py-2" aria-label="Cale navigare breadcrumb">
    <div class="container">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="index.php" class="text-primary">Acasă</a></li>
            <li class="breadcrumb-item"><a href="index.php#transmisie" class="text-primary">Transmisie</a></li>
            <li class="breadcrumb-item active fw-semibold" aria-current="page">Kit Ambreiaj Sachs cu Volantă</li>
        </ol>
    </div>
</nav>

<main class="container py-5">
    <article itemscope itemtype="https://schema.org/Product">
        <div class="row g-5 mb-5">

            <!-- Galerie Imagini -->
            <section class="col-lg-5" aria-labelledby="gallery-sachs-heading">
                <h2 id="gallery-sachs-heading" class="visually-hidden">Galerie Imagini Kit Ambreiaj Sachs</h2>
                <div class="ap-product-gallery">
                    <div class="ap-gallery-main" role="button" tabindex="0" aria-label="Apasă pentru a mări imaginea">
                        <span class="ap-card-badge bg-primary text-white" style="position:absolute; top:16px; left:16px; z-index:2;">Kit Complet 4 Piese</span>
                        <div class="ap-main-img-wrapper">
                            <img id="ap-main-image"
                                 src="images/kit-sachs-front.svg"
                                 alt="Kit Ambreiaj cu Volantă Masă Dublă Sachs 240mm - Vedere frontală ansamblu"
                                 width="600" height="450"
                                 fetchpriority="high"
                                 decoding="async">
                        </div>
                        <div class="ap-zoom-hint">
                            <i class="bi bi-arrows-fullscreen" aria-hidden="true"></i> Mărește piesa
                        </div>
                    </div>
                    <div class="ap-thumbnails" role="tablist" aria-label="Selecție fotografii kit ambreiaj">
                        <button type="button" class="ap-thumb-btn active" role="tab" aria-selected="true"
                                data-full="images/kit-sachs-front.svg"
                                data-title="Kit Ambreiaj Sachs — Vedere Frontală (Placă Presiune &amp; Disc)"
                                data-alt="Kit Ambreiaj Sachs - Vedere frontală">
                            <img src="images/kit-sachs-front.svg" alt="Vedere frontală" width="180" height="135" loading="lazy" decoding="async">
                            <span class="ap-thumb-label">Frontal</span>
                        </button>
                        <button type="button" class="ap-thumb-btn" role="tab" aria-selected="false"
                                data-full="images/kit-sachs-angle.svg"
                                data-title="Kit Ambreiaj Sachs — Mecanism &amp; Arcuri Torsiune"
                                data-alt="Kit Ambreiaj Sachs - Unghi mecanism">
                            <img src="images/kit-sachs-angle.svg" alt="Unghi mecanism" width="180" height="135" loading="lazy" decoding="async">
                            <span class="ap-thumb-label">Mecanism</span>
                        </button>
                        <button type="button" class="ap-thumb-btn" role="tab" aria-selected="false"
                                data-full="images/kit-sachs-side.svg"
                                data-title="Kit Ambreiaj Sachs — Profil Tehnic Volantă Bimasa &amp; Rulment"
                                data-alt="Kit Ambreiaj Sachs - Profil volantă">
                            <img src="images/kit-sachs-side.svg" alt="Profil volantă" width="180" height="135" loading="lazy" decoding="async">
                            <span class="ap-thumb-label">Volantă</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- Info + GEO -->
            <section class="col-lg-7" aria-labelledby="sachs-title">
                <p class="text-muted small fw-bold text-uppercase mb-1">
                    <span itemprop="brand">Sachs (ZF)</span> • Calitate Prim Montaj (OEM)
                </p>
                <h1 id="sachs-title" class="ap-product-title" itemprop="name">
                    Kit Ambreiaj Complet cu Volantă Masă Dublă Sachs (240mm) — Cod 2290 601 050
                </h1>

                <!-- GEO Direct Answer Box -->
                <div class="ap-geo-box mb-3">
                    <div class="d-flex align-items-center gap-2 mb-1 text-primary fw-bold small text-uppercase">
                        <i class="bi bi-robot"></i> Răspuns Rapid &bull; Specificații Esențiale:
                    </div>
                    <p class="small mb-0 text-dark">
                        <strong>Ce conține:</strong> Pachet complet 4 piese originale Sachs (cod <strong>2290 601 050</strong> / GTIN <strong>4013872741984</strong>): volantă bimasa, placă presiune XTend, disc ambreiaj 240mm (23 dinți), rulment hidraulic CSC și șuruburi.<br>
                        <strong>Compatibilitate:</strong> Motoare 2.0 TDI din Grupul VAG (VW Passat B7, Golf 6, Audi A4 B8, Skoda Superb 2 cu transmisie manuală 6 trepte).<br>
                        <strong>Preț:</strong> 2.199 Lei, livrare gratuită 24h, <?= WARRANTY_MONTHS ?> luni garanție.
                    </p>
                </div>

                <!-- Rating -->
                <div class="d-flex align-items-center gap-2 mb-3" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                    <div style="color:#f59e0b;" aria-label="Evaluare 4.9 din 5 stele">
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                    </div>
                    <span class="fw-bold small" itemprop="ratingValue">4.9</span>
                    <span class="text-muted small">(<span itemprop="reviewCount">94</span> recenzii mecanici)</span>
                    <span class="text-success small fw-semibold"><i class="bi bi-check-circle-fill me-1" aria-hidden="true"></i>În Stoc</span>
                </div>

                <div class="alert alert-light border d-flex align-items-center gap-2 py-2 px-3 mb-3 rounded-3">
                    <i class="bi bi-shield-check text-success fs-5"></i>
                    <span class="small"><strong>Compatibilitate garantată:</strong> Trimite seria VIN și verificăm codul exact de cutie de viteze.</span>
                </div>

                <!-- Bloc Preț Optimizat Semantic cu Atribute Speciale SEO & Schema.org -->
                <div class="ap-price-block mb-4" itemprop="offers" itemscope itemtype="https://schema.org/Offer" aria-label="Ofertă și preț kit ambreiaj">
                    <!-- Atribute Schema.org de preț, monedă și valabilitate cerute de Google Merchant -->
                    <link itemprop="url" href="<?= $canonical_url ?>">
                    <link itemprop="availability" href="https://schema.org/InStock">
                    <link itemprop="itemCondition" href="https://schema.org/NewCondition">
                    <meta itemprop="priceCurrency" content="RON">
                    <meta itemprop="price" content="2199.00">
                    <meta itemprop="priceValidUntil" content="2027-12-31">
                    <meta itemprop="valueAddedTaxIncluded" content="true">

                    <!-- Specificare detaliată a prețului vechi de listă vs preț redus de vânzare -->
                    <div itemprop="priceSpecification" itemscope itemtype="https://schema.org/UnitPriceSpecification" class="visually-hidden">
                        <meta itemprop="priceType" content="https://schema.org/ListPrice">
                        <meta itemprop="price" content="2650.00">
                        <meta itemprop="priceCurrency" content="RON">
                    </div>

                    <!-- Afișare vizuală cu elemente HTML5 semantice: <data>, <ins>, <del> -->
                    <div class="d-flex align-items-baseline gap-3 mb-2 flex-wrap">
                        <ins class="text-decoration-none" aria-label="Preț actual redus">
                            <data class="ap-price-big" value="2199.00" itemprop="price">
                                2.199 <span class="currency" style="font-size:1.2rem; font-weight:600;">Lei</span>
                            </data>
                        </ins>
                        <del style="font-size:1rem; color:var(--ap-text-muted);" aria-label="Preț vechi de listă" data-old-price="2650.00">
                            2.650 Lei
                        </del>
                        <span class="ap-discount" role="status" aria-label="Economie">
                            Economisești 451 Lei (-17%)
                        </span>
                    </div>

                    <!-- Detalii fiscale și logistice (TVA, livrare, valabilitate ofertă) -->
                    <div class="d-flex align-items-center gap-3 text-muted small mt-2 pt-2 border-top flex-wrap">
                        <span><i class="bi bi-shield-check text-success me-1"></i>Preț cu TVA inclus (19%)</span>
                        <span><i class="bi bi-truck text-primary me-1"></i>Livrare gratuită 24h</span>
                        <span><i class="bi bi-calendar-check text-warning me-1"></i>Preț garantat până la 31.12.2027</span>
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="h6 fw-bold text-uppercase text-muted mb-2">Piese Incluse în Pachet:</h3>
                    <ul class="list-unstyled row g-2">
                        <?php foreach ($kit_contents as $item): ?>
                        <li class="col-md-6">
                            <span class="small d-flex align-items-start">
                                <i class="bi bi-check2-circle text-success me-2 mt-1" aria-hidden="true"></i>
                                <span><?= $item ?></span>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="d-flex gap-3 flex-wrap mb-4">
                    <button type="button" class="ap-btn-buy" onclick="addToCart('Kit Ambreiaj Sachs 240mm')">
                        <i class="bi bi-cart-plus-fill" aria-hidden="true"></i> Adaugă în Coș
                    </button>
                    <a href="https://aftermarket.zf.com/en/aftermarket-portal/our-brands/sachs/" target="_blank" rel="noopener noreferrer" class="ap-ext-link">
                        <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i> Catalog Oficial Sachs ZF
                    </a>
                </div>

                <div class="d-flex gap-4 flex-wrap pt-2 border-top">
                    <span class="small text-muted"><i class="bi bi-patch-check-fill text-primary me-1" aria-hidden="true"></i> Piesă Originală Sachs</span>
                    <span class="small text-muted"><i class="bi bi-arrow-repeat text-primary me-1" aria-hidden="true"></i> Retur <?= RETURN_DAYS ?> Zile</span>
                    <span class="small text-muted"><i class="bi bi-award text-primary me-1" aria-hidden="true"></i> Calitate OEM Germană</span>
                </div>
            </section>
        </div>

        <!-- Specificații & Compatibilitate -->
        <div class="row g-4 mb-5">
            <section class="col-lg-7" aria-labelledby="sachs-specs">
                <h2 id="sachs-specs" class="fw-bold mb-3" style="font-size:1.35rem;">Specificații Tehnice Detaliate</h2>
                <div class="bg-white rounded-3 border overflow-hidden shadow-sm mb-4">
                    <table class="table ap-specs-table mb-0">
                        <caption class="visually-hidden">Tabel specificații tehnice kit ambreiaj Sachs</caption>
                        <tbody>
                            <?php foreach ($specs_table as $label => $value): ?>
                            <tr><th scope="row"><?= $label ?></th><td><?= $value ?></td></tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <h3 class="fw-bold mb-3 h6 text-uppercase text-muted">
                    <i class="bi bi-car-front-fill me-1 text-primary"></i> Compatibilitate Motoare 2.0 TDI:
                </h3>
                <div class="bg-white rounded-3 border overflow-hidden shadow-sm">
                    <table class="table table-hover mb-0 small">
                        <thead class="table-light">
                            <tr><th>Marcă &amp; Model</th><th>Ani Fabricație</th><th>Motorizare</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($compatibility as $car): ?>
                            <tr>
                                <td><strong><?= $car[0] ?></strong></td>
                                <td><?= $car[1] ?></td>
                                <td><?= $car[2] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <aside class="col-lg-5 d-flex flex-column gap-4" aria-label="Recomandări conexe">
                <div class="bg-white rounded-3 border p-4 shadow-sm">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px; font-weight:800;">LV</div>
                        <div>
                            <h4 class="h6 mb-0 fw-bold">Laurențiu Vasile</h4>
                            <p class="small text-muted mb-0">Specialist Transmisii &amp; Ambreiaje (16 ani experiență)</p>
                        </div>
                    </div>
                    <p class="small text-muted mb-0">
                        <em>„Recomand întotdeauna înlocuirea volantei cu masă dublă odată cu discul și placa. Montarea unui ambreiaj nou pe o volantă uzată duce la uzură prematură în sub 15.000 km."</em>
                    </p>
                </div>

                <div class="ap-speed-box">
                    <h3 class="text-white fw-bold mb-3 h6"><i class="bi bi-speedometer2 me-2" aria-hidden="true"></i>Performanță Transmisie</h3>
                    <div class="text-center mb-3">
                        <span style="font-size:3rem; font-weight:800; color:var(--ap-accent);" id="dwell-timer">0</span>
                        <span class="text-white-50 ms-2">secunde</span>
                    </div>
                </div>

                <div class="bg-white rounded-3 border p-4 shadow-sm">
                    <h3 class="small text-muted fw-bold text-uppercase mb-3 h6">Piesă Recomandată pentru Frânare</h3>
                    <a href="disc-frana-brembo.php" class="d-flex align-items-center gap-3 text-decoration-none">
                        <div class="bg-light rounded-3 p-2 border" style="width:72px; height:54px; display:flex; align-items:center; justify-content:center;">
                            <img src="images/disc-brembo-front.svg" alt="Discuri Frână Brembo" width="60" height="45" loading="lazy">
                        </div>
                        <div>
                            <p class="fw-bold mb-0" style="color:var(--ap-text)">Discuri Frână Brembo Max 312mm</p>
                            <p class="text-muted small mb-0">De la 489 Lei <span class="text-primary fw-semibold">→ Vezi Detalii</span></p>
                        </div>
                    </a>
                </div>
            </aside>
        </div>
    </article>
</main>

<?php require __DIR__ . '/includes/lightbox.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>
