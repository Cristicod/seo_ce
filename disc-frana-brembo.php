<?php
// =============================================================================
// PAGINA PRODUS — Set Discuri Frână Față Ventilate Brembo Max 312mm
// SEO + GEO 2026: Product Schema, E-E-A-T, Direct Answer Box, FAQ
// =============================================================================
require_once __DIR__ . '/includes/config.php';

$page_title    = 'Discuri Frână Față Brembo Max 312mm — 489 Lei | ' . SITE_NAME;
$meta_desc     = 'Set 2 Discuri Frână Ventilate Brembo Max 312mm (Cod 09.9772.11) la 489 Lei. Compatibile VW Golf 7, Passat B8, Skoda Octavia 3. Livrare 24h, garanție 2 ani.';
$canonical_url = site_url('disc-frana-brembo.php');
$og_type       = 'product';
$og_image      = site_url('images/disc-brembo-front.svg');
$og_price      = ['amount' => '489.00', 'old_amount' => '599.00', 'currency' => 'RON'];
$active_page   = 'brembo';
$prerender_urls = ['index.php', 'kit-ambreiaj-sachs.php'];
$lightbox_title = 'Brembo Max 312mm (09.9772.11)';

// JSON-LD: BreadcrumbList + Product complet
$json_ld = '<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Acasă", "item": "' . site_url('index.php') . '" },
        { "@type": "ListItem", "position": 2, "name": "Sistem de Frânare", "item": "' . site_url('index.php#franare') . '" },
        { "@type": "ListItem", "position": 3, "name": "Discuri Frână Brembo Max 312mm", "item": "' . site_url('disc-frana-brembo.php') . '" }
      ]
    },
    {
      "@type": "Product",
      "@id": "' . site_url('disc-frana-brembo.php#product') . '",
      "name": "Set 2 Discuri de Frână Față Ventilate Brembo Max (312mm) — Cod 09.9772.11",
      "image": [
        "' . site_url('images/disc-brembo-front.svg') . '",
        "' . site_url('images/disc-brembo-angle.svg') . '",
        "' . site_url('images/disc-brembo-side.svg') . '"
      ],
      "description": "Set 2 discuri de frână sport Brembo Max ventilate și canelate, diametru 312mm, grosime 25mm, 5 prezoane (5x112). Tratament anticoroziv UV, performanță superioară de frânare. Compatibil VW Golf 7, Passat B8, Skoda Octavia 3, Audi A3.",
      "sku": "BREMBO-09.9772.11",
      "mpn": "09.9772.11",
      "gtin13": "8020584013144",
      "brand": {
        "@type": "Brand",
        "name": "Brembo"
      },
      "offers": {
        "@type": "Offer",
        "url": "' . site_url('disc-frana-brembo.php') . '",
        "priceCurrency": "RON",
        "price": "489.00",
        "priceValidUntil": "2027-12-31",
        "valueAddedTaxIncluded": true,
        "priceSpecification": [
          {
            "@type": "UnitPriceSpecification",
            "priceType": "https://schema.org/ListPrice",
            "price": "599.00",
            "priceCurrency": "RON"
          },
          {
            "@type": "UnitPriceSpecification",
            "priceType": "https://schema.org/SalePrice",
            "price": "489.00",
            "priceCurrency": "RON"
          }
        ],
        "itemCondition": "https://schema.org/NewCondition",
        "availability": "https://schema.org/InStock",
        "seller": { "@type": "Organization", "name": "' . SITE_NAME . '" },
        "shippingDetails": {
          "@type": "OfferShippingDetails",
          "shippingRate": { "@type": "MonetaryAmount", "value": "0.00", "currency": "RON" },
          "shippingDestination": { "@type": "DefinedRegion", "addressCountry": "RO" },
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
        "reviewCount": "178",
        "bestRating": "5",
        "worstRating": "1"
      },
      "review": [{
        "@type": "Review",
        "author": { "@type": "Person", "name": "Mihai Dragomir (Mecanic Auto Autorizat RAR)" },
        "datePublished": "2026-10-18",
        "reviewBody": "Discurile Brembo Max au o mușcătură inițială excelentă. Canelurile elimină eficient gazele și apa, prevenind fenomenul de fading la frânări repetate.",
        "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" }
      }]
    }
  ]
}
</script>';

// Specificații tehnice (PHP array → tabel)
$specs_table = [
    'Producător'             => 'Brembo (Italia) — Gamă Brembo Max',
    'Cod MPN'                => '09.9772.11',
    'Cod EAN / GTIN-13'      => '8020584013144',
    'Punte Montaj'           => 'Axa Față (Punte față)',
    'Diametru Exterior'      => '312 mm',
    'Grosime Disc'           => '25 mm (Minim admis la uzură: 22 mm)',
    'Înălțime Totală'        => '49.5 mm',
    'Găuri Prezoane'         => '5 găuri (PCD 5×112 mm)',
    'Centrare Butuc'         => '65 mm',
    'Tip Ventilație'         => 'Ventilat PVT (Pillar Vented Technology)',
    'Tratament Suprafață'    => 'Lăcuit UV anticoroziv ecologic',
    'Coduri OEM Echivalente' => 'VAG: 1K0 615 301 AA, 5Q0 615 301 F, 1K0 615 301 AJ, 3C0 615 301 B',
];

$compatibility = [
    ['Volkswagen Golf 7 (5G1, BQ1)',  '2012 – 2020', '2.0 TDI (150CP), 2.0 GTD (184CP), 2.0 GTI (220/230CP)'],
    ['Volkswagen Passat B8 (3G2)',    '2014 – 2023', '1.4 TSI, 2.0 TDI (150CP / 190CP), 1.8 TSI'],
    ['Skoda Octavia 3 (5E3, 5E5)',    '2012 – 2020', '2.0 TDI RS (184CP), 2.0 TSI RS (220CP), 1.8 TSI'],
    ['Audi A3 (8V1, 8VA Sportback)',  '2012 – 2020', '2.0 TDI (150CP / 184CP), 1.8 TFSI, 2.0 TFSI'],
    ['Seat Leon (5F1, 5F8 ST)',       '2012 – 2020', '2.0 TDI FR (150CP / 184CP), 1.8 TSI FR'],
];

$key_features = [
    'Punte montare: Axa Față (Set stânga + dreapta inclus)',
    'Diametru: 312 mm &bull; Grosime: 25 mm (Minim: 22 mm)',
    'Caneluri Brembo Max: eliminare gaze &amp; aderență imediată',
    'Tratament anticoroziv cu vopsea UV ecologică',
    'Ventilație patentată PVT (Pillar Vented Technology)',
    'Omologare oficială conform normei europene ECE R90',
];

$faq = [
    [
        'q' => 'Prețul de 489 Lei este pentru un singur disc sau pentru set de 2 bucăți?',
        'a' => 'Prețul afișat este pentru <strong>setul complet de 2 discuri de frână</strong> pentru puntea față. Discurile de frână se înlocuiesc întotdeauna în pereche (ambele roți de pe aceeași punte) pentru a asigura o forță de frânare uniformă.',
    ],
    [
        'q' => 'Cum știu dacă mașina mea are sistem de frânare cu disc de 288mm sau 312mm?',
        'a' => 'Pe mașinile din grupul VAG, codul PR din cartea de service sau eticheta din portbagaj indică diametrul: codul <strong>1ZE</strong> sau <strong>1ZA</strong> corespunde discurilor de 312mm. Dacă nu ești sigur, introdu seria de șasiu (VIN) la plasarea comenzii și verificăm noi gratuit.',
    ],
    [
        'q' => 'Care este diferența dintre Brembo Max și discurile standard ventilate?',
        'a' => 'Discurile Brembo Max dispun de caneluri asimetrice pe suprafața de fricțiune care asigură evacuarea rapidă a gazelor și îndepărtarea peliculei de apă în caz de ploaie, reducând distanța de oprire cu până la 15%.',
    ],
];
?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG ?>">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body>

<?php require __DIR__ . '/includes/header.php'; ?>

<!-- Breadcrumb Semantic -->
<nav class="bg-white border-bottom py-2" aria-label="Cale navigare breadcrumb">
    <div class="container">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="index.php" class="text-primary">Acasă</a></li>
            <li class="breadcrumb-item"><a href="index.php#franare" class="text-primary">Sistem Frânare</a></li>
            <li class="breadcrumb-item active fw-semibold" aria-current="page">Discuri Frână Față Brembo Max</li>
        </ol>
    </div>
</nav>

<main class="container py-5">
    <article itemscope itemtype="https://schema.org/Product">
        <div class="row g-5 mb-5">

            <!-- STÂNGA: Galerie Foto 3 Imagini + Lightbox -->
            <section class="col-lg-5" aria-labelledby="gallery-heading">
                <h2 id="gallery-heading" class="visually-hidden">Galerie Imagini Discuri Frână Brembo</h2>
                <div class="ap-product-gallery">
                    <div class="ap-gallery-main" role="button" tabindex="0" aria-label="Apasă pentru a deschide fotografia la rezoluție maximă">
                        <span class="ap-card-badge bg-danger text-white" style="position:absolute; top:16px; left:16px; z-index:2;">Set 2 Bucăți</span>
                        <div class="ap-main-img-wrapper">
                            <img id="ap-main-image"
                                 src="images/disc-brembo-front.svg"
                                 alt="Set 2 Discuri de Frână Ventilate Brembo Max 312mm - Vedere frontală suprafață de frecare"
                                 width="600" height="450"
                                 fetchpriority="high"
                                 decoding="async">
                        </div>
                        <div class="ap-zoom-hint">
                            <i class="bi bi-arrows-fullscreen" aria-hidden="true"></i> Mărește piesa
                        </div>
                    </div>

                    <!-- 3 Thumbnail-uri -->
                    <div class="ap-thumbnails" role="tablist" aria-label="Selecție fotografii tehnice">
                        <button type="button" class="ap-thumb-btn active" role="tab" aria-selected="true"
                                data-full="images/disc-brembo-front.svg"
                                data-title="Brembo Max 312mm — Vedere Frontală (Suprafață Perforată &amp; Canelată)"
                                data-alt="Brembo Max 312mm - Vedere frontală">
                            <img src="images/disc-brembo-front.svg" alt="Vedere frontală disc" width="180" height="135" loading="lazy" decoding="async">
                            <span class="ap-thumb-label">Frontal</span>
                        </button>
                        <button type="button" class="ap-thumb-btn" role="tab" aria-selected="false"
                                data-full="images/disc-brembo-angle.svg"
                                data-title="Brembo Max 312mm — Unghi Ventilație (Canale Interioare PVT)"
                                data-alt="Brembo Max 312mm - Unghi ventilație">
                            <img src="images/disc-brembo-angle.svg" alt="Canale ventilație interioare" width="180" height="135" loading="lazy" decoding="async">
                            <span class="ap-thumb-label">Ventilație</span>
                        </button>
                        <button type="button" class="ap-thumb-btn" role="tab" aria-selected="false"
                                data-full="images/disc-brembo-side.svg"
                                data-title="Brembo Max 312mm — Profil Tehnic &amp; Cote (312mm × 25mm)"
                                data-alt="Brembo Max 312mm - Profil cote">
                            <img src="images/disc-brembo-side.svg" alt="Profil cote tehnice disc" width="180" height="135" loading="lazy" decoding="async">
                            <span class="ap-thumb-label">Dimensiuni</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- DREAPTA: Titlu, GEO Answer Box, Preț -->
            <section class="col-lg-7" aria-labelledby="product-title">
                <p class="text-muted small fw-bold text-uppercase mb-1">
                    <span itemprop="brand">Brembo</span> • Gamă Sport &amp; Performanță Max
                </p>

                <h1 id="product-title" class="ap-product-title" itemprop="name">
                    Set Discuri Frână Față Ventilate Brembo Max (312mm) — Cod 09.9772.11
                </h1>

                <!-- Caseta GEO — Direct Answer Box (Google AI Overviews, Perplexity, ChatGPT) -->
                <div class="ap-geo-box mb-3">
                    <div class="d-flex align-items-center gap-2 mb-1 text-primary fw-bold small text-uppercase">
                        <i class="bi bi-robot"></i> Răspuns Rapid &bull; Specificații Esențiale:
                    </div>
                    <p class="small mb-0 text-dark">
                        <strong>Ce este:</strong> Set de 2 discuri de frână față sport ventilate și canelate Brembo Max (cod <strong>09.9772.11</strong> / GTIN <strong>8020584013144</strong>).<br>
                        <strong>Dimensiuni cheie:</strong> Diametru <strong>312 mm</strong>, grosime <strong>25 mm</strong>, 5 prezoane (PCD 5×112, butuc 65 mm).<br>
                        <strong>Compatibilitate:</strong> Montaj pe puntea față — VW Golf 7, Passat B8, Skoda Octavia 3, Audi A3 8V (cod PR 1ZE/1ZA).<br>
                        <strong>Preț &amp; Garanție:</strong> 489 Lei (set 2 discuri), livrare gratuită 24h, <?= WARRANTY_MONTHS / 12 ?> ani garanție legală.
                    </p>
                </div>

                <!-- Rating agregat -->
                <div class="d-flex align-items-center gap-2 mb-3" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                    <div style="color:#f59e0b;" aria-label="Evaluare 4.9 din 5 stele">
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                    </div>
                    <span class="fw-bold small" itemprop="ratingValue">4.9</span>
                    <span class="text-muted small">(<span itemprop="reviewCount">178</span> recenzii)</span>
                    <span class="text-success small fw-semibold"><i class="bi bi-check-circle-fill me-1" aria-hidden="true"></i>În Stoc</span>
                </div>

                <!-- VIN Check (E-E-A-T) -->
                <div class="alert alert-light border d-flex align-items-center gap-2 py-2 px-3 mb-3 rounded-3">
                    <i class="bi bi-shield-check text-success fs-5"></i>
                    <span class="small"><strong>Verificare gratuită după serie șasiu (VIN):</strong> Un inginer mecanic autorizat verifică compatibilitatea 100%.</span>
                </div>

                <!-- Bloc Preț Optimizat Semantic cu Atribute Speciale SEO & Schema.org -->
                <div class="ap-price-block mb-4" itemprop="offers" itemscope itemtype="https://schema.org/Offer" aria-label="Ofertă și preț produs">
                    <!-- Atribute Schema.org de preț, monedă și valabilitate cerute de Google Merchant -->
                    <link itemprop="url" href="<?= $canonical_url ?>">
                    <link itemprop="availability" href="https://schema.org/InStock">
                    <link itemprop="itemCondition" href="https://schema.org/NewCondition">
                    <meta itemprop="priceCurrency" content="RON">
                    <meta itemprop="price" content="489.00">
                    <meta itemprop="priceValidUntil" content="2027-12-31">
                    <meta itemprop="valueAddedTaxIncluded" content="true">

                    <!-- Specificare detaliată a prețului vechi de listă vs preț redus de vânzare -->
                    <div itemprop="priceSpecification" itemscope itemtype="https://schema.org/UnitPriceSpecification" class="visually-hidden">
                        <meta itemprop="priceType" content="https://schema.org/ListPrice">
                        <meta itemprop="price" content="599.00">
                        <meta itemprop="priceCurrency" content="RON">
                    </div>

                    <!-- Afișare vizuală cu elemente HTML5 semantice: <data>, <ins>, <del> -->
                    <div class="d-flex align-items-baseline gap-3 mb-2 flex-wrap">
                        <ins class="text-decoration-none" aria-label="Preț actual redus">
                            <data class="ap-price-big" value="489.00" itemprop="price">
                                489 <span class="currency" style="font-size:1.2rem; font-weight:600;">Lei</span>
                            </data>
                        </ins>
                        <del style="font-size:1rem; color:var(--ap-text-muted);" aria-label="Preț vechi de listă" data-old-price="599.00">
                            599 Lei
                        </del>
                        <span class="ap-discount" role="status" aria-label="Economie">
                            Economisești 110 Lei (-18%)
                        </span>
                    </div>

                    <!-- Detalii fiscale și logistice (TVA, livrare, valabilitate ofertă) -->
                    <div class="d-flex align-items-center gap-3 text-muted small mt-2 pt-2 border-top flex-wrap">
                        <span><i class="bi bi-shield-check text-success me-1"></i>Preț cu TVA inclus (19%)</span>
                        <span><i class="bi bi-truck text-primary me-1"></i>Livrare gratuită 24h</span>
                        <span><i class="bi bi-calendar-check text-warning me-1"></i>Preț garantat până la 31.12.2027</span>
                    </div>
                </div>

                <!-- Puncte forte -->
                <div class="mb-4">
                    <h3 class="h6 fw-bold text-uppercase text-muted mb-2">Puncte Forte &bull; Testate în Atelier:</h3>
                    <ul class="list-unstyled row g-2">
                        <?php foreach ($key_features as $feat): ?>
                        <li class="col-md-6">
                            <span class="small d-flex align-items-start">
                                <i class="bi bi-check2-circle text-success me-2 mt-1" aria-hidden="true"></i>
                                <span><?= $feat ?></span>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="d-flex gap-3 flex-wrap mb-4">
                    <button type="button" class="ap-btn-buy" onclick="addToCart('Set Discuri Frână Brembo Max 312mm')">
                        <i class="bi bi-cart-plus-fill" aria-hidden="true"></i> Adaugă în Coș
                    </button>
                    <a href="https://www.brembo.com/en/car/original-equipment/products/discs"
                       target="_blank" rel="noopener noreferrer" class="ap-ext-link">
                        <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i> Catalog Oficial Brembo
                    </a>
                </div>

                <!-- E-E-A-T badges -->
                <div class="d-flex gap-4 flex-wrap pt-2 border-top">
                    <span class="small text-muted"><i class="bi bi-patch-check-fill text-primary me-1" aria-hidden="true"></i> Piesă Originală Brembo</span>
                    <span class="small text-muted"><i class="bi bi-arrow-repeat text-primary me-1" aria-hidden="true"></i> Retur <?= RETURN_DAYS ?> Zile</span>
                    <span class="small text-muted"><i class="bi bi-award text-primary me-1" aria-hidden="true"></i> Certificare ECE R90</span>
                </div>
            </section>
        </div>

        <!-- SPECIFICAȚII TEHNICE & COMPATIBILITATE -->
        <div class="row g-4 mb-5">
            <section class="col-lg-7" aria-labelledby="specs-heading">
                <h2 id="specs-heading" class="fw-bold mb-3" style="font-size:1.35rem;">Date Tehnice &amp; Dimensiuni Exacte</h2>
                <div class="bg-white rounded-3 border overflow-hidden shadow-sm mb-4">
                    <table class="table ap-specs-table mb-0">
                        <caption class="visually-hidden">Tabel specificații tehnice discuri frână Brembo Max 312mm</caption>
                        <tbody>
                            <?php foreach ($specs_table as $label => $value): ?>
                            <tr><th scope="row"><?= $label ?></th><td><?= $value ?></td></tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <h3 class="fw-bold mb-3 h6 text-uppercase text-muted">
                    <i class="bi bi-car-front-fill me-1 text-primary"></i> Vehicule Compatibile (Grupul VAG):
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

            <!-- ASIDE: E-E-A-T Expert + Piese Conexe -->
            <aside class="col-lg-5 d-flex flex-column gap-4" aria-label="Expertiză tehnică și piese recomandate">
                <div class="bg-white rounded-3 border p-4 shadow-sm">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px; font-weight:800;">CR</div>
                        <div>
                            <h4 class="h6 mb-0 fw-bold">Ing. Cristian Radu</h4>
                            <p class="small text-muted mb-0">Mecanic Șef &bull; Inspector Tehnic RAR (14 ani experiență)</p>
                        </div>
                    </div>
                    <p class="small text-muted mb-0">
                        <em>„Recomand gama Brembo Max pentru clienții care conduc sportiv sau parcurg trasee montane. Canelurile curăță continuu plăcuța de frână și permit o decelerare stabilă chiar și la temperaturi de peste 450°C."</em>
                    </p>
                </div>

                <div class="ap-speed-box">
                    <h3 class="text-white fw-bold mb-3 h6"><i class="bi bi-speedometer2 me-2" aria-hidden="true"></i>Monitor Viteză &amp; SEO</h3>
                    <div class="text-center mb-3">
                        <span style="font-size:3rem; font-weight:800; color:var(--ap-accent);" id="dwell-timer">0</span>
                        <span class="text-white-50 ms-2">secunde</span>
                    </div>
                    <p class="small mb-0" style="color:rgba(255,255,255,0.7);">
                        Paginile cu tabele exacte și Speculation Rules API oferă cel mai rapid First Contentful Paint.
                    </p>
                </div>

                <div class="bg-white rounded-3 border p-4 shadow-sm">
                    <h3 class="small text-muted fw-bold text-uppercase mb-3 h6">Piesă Recomandată pentru Transmisie</h3>
                    <a href="kit-ambreiaj-sachs.php" class="d-flex align-items-center gap-3 text-decoration-none">
                        <div class="bg-light rounded-3 p-2 border" style="width:72px; height:54px; display:flex; align-items:center; justify-content:center;">
                            <img src="images/kit-sachs-front.svg" alt="Kit Ambreiaj Sachs" width="60" height="45" loading="lazy">
                        </div>
                        <div>
                            <p class="fw-bold mb-0" style="color:var(--ap-text)">Kit Ambreiaj cu Volantă Sachs</p>
                            <p class="text-muted small mb-0">De la 2.199 Lei <span class="text-primary fw-semibold">→ Vezi Detalii</span></p>
                        </div>
                    </a>
                </div>
            </aside>
        </div>

        <!-- FAQ — GEO Optimized -->
        <section class="mt-4 pt-4 border-top" aria-labelledby="faq-title">
            <h2 id="faq-title" class="fw-bold mb-4" style="font-size:1.35rem;">
                Întrebări Frecvente despre Discurile de Frână Brembo Max 312mm
            </h2>
            <div class="accordion" id="faqAccordion">
                <?php foreach ($faq as $i => $item): ?>
                <div class="accordion-item border rounded-3 mb-2">
                    <h3 class="accordion-header" id="faqH<?= $i ?>">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqC<?= $i ?>">
                            <?= $item['q'] ?>
                        </button>
                    </h3>
                    <div id="faqC<?= $i ?>" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted small"><?= $item['a'] ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </article>
</main>

<?php require __DIR__ . '/includes/lightbox.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>
