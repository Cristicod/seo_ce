<?php
// =============================================================================
// BAZĂ DE DATE PRODUSE PIESE AUTO (AutoPiese Pro)
// Sursă unică de date pentru Catalog, Căutare PHP și Autocomplete JS
// =============================================================================

function get_all_autoparts() {
    return [
        [
            'id' => 'brembo-09977211',
            'url' => 'disc-frana-brembo.php',
            'name' => 'Set Discuri Frână Față Ventilate Brembo Max (312mm)',
            'brand' => 'Brembo',
            'code' => '09.9772.11',
            'oe_code' => '1K0 615 301 AA, 5Q0 615 301 F',
            'category' => 'Frânare',
            'price' => 489,
            'price_old' => 599,
            'badge' => 'Bestseller Frânare',
            'badge_class' => 'bg-danger',
            'specs' => 'Ventilat PVT &bull; Canelat &amp; Perforat &bull; Diametru: 312mm &bull; Grosime: 25mm &bull; Compatibil VW Golf 7, Passat B8, Audi A3',
            'image' => 'images/disc-brembo-front.svg',
            'keywords' => 'brembo disc frana frane discuri 312mm 312 25mm ventilat ventilate perforat canelat golf passat octavia a3 leon 09.9772.11 1k0615301aa'
        ],
        [
            'id' => 'sachs-2290601050',
            'url' => 'kit-ambreiaj-sachs.php',
            'name' => 'Kit Ambreiaj Complet cu Volantă Masă Dublă Sachs (240mm)',
            'brand' => 'ZF Sachs',
            'code' => '2290 601 050',
            'oe_code' => '03L 105 266 E, 03L 105 266 DE',
            'category' => 'Transmisie',
            'price' => 2199,
            'price_old' => 2650,
            'badge' => 'Kit 4 Piese',
            'badge_class' => 'bg-primary',
            'specs' => 'Volantă Masă Dublă &bull; Placă &amp; Disc 240mm &bull; Rulment Hidraulic CSC inclus &bull; Compatibil motoare 2.0 TDI Grupul VAG',
            'image' => 'images/kit-sachs-front.svg',
            'keywords' => 'sachs kit ambreiaj ambreiaje volanta bimasa masa dubla 240mm 240 rulment csc 2.0 tdi passat golf superb a4 2290601050 03l105266e'
        ],
        [
            'id' => 'ferodo-fdb1641',
            'url' => 'disc-frana-brembo.php#ferodo',
            'name' => 'Set Plăcuțe Frână Față Ferodo Premier Eco-Friction',
            'brand' => 'Ferodo',
            'code' => 'FDB1641',
            'oe_code' => '1K0 698 151, 5Q0 698 151',
            'category' => 'Frânare',
            'price' => 185,
            'price_old' => 230,
            'badge' => 'Frânare OE',
            'badge_class' => 'bg-dark',
            'specs' => 'Fără azbest &bull; Tehnologie Eco-Friction &bull; Cu senzor uzură electric inclus &bull; Frânare silențioasă',
            'image' => 'images/disc-brembo-front.svg',
            'keywords' => 'ferodo placute frana placuta frane fdb1641 eco friction senzor golf audi a3 passat octavia'
        ],
        [
            'id' => 'motul-8100-xclean',
            'url' => 'index.php?s=ulei#ulei',
            'name' => 'Ulei Motor Motul 8100 X-clean+ 5W30 (5 Litri)',
            'brand' => 'Motul',
            'code' => '102788',
            'oe_code' => 'VW 504.00 / 507.00, BMW LL-04, MB 229.51',
            'category' => 'Uleiuri & Fluide',
            'price' => 215,
            'price_old' => 260,
            'badge' => '100% Sintetic',
            'badge_class' => 'bg-success',
            'specs' => 'Vâscozitate 5W-30 &bull; Bidon 5L &bull; Pentru filtre particule DPF / FAP &bull; Prelungește viața motorului',
            'image' => 'images/disc-brembo-front.svg',
            'keywords' => 'motul ulei motor 5w30 5w-30 xclean x-clean 5l 5 litri dpf vw 504 507 bmw mb'
        ]
    ];
}

// Funcție de filtrare pentru căutare
function search_autoparts($query) {
    $all = get_all_autoparts();
    $q = trim(mb_strtolower($query, 'UTF-8'));
    if ($q === '') {
        return $all;
    }

    $results = [];
    foreach ($all as $item) {
        $haystack = mb_strtolower(
            $item['name'] . ' ' .
            $item['brand'] . ' ' .
            $item['code'] . ' ' .
            $item['oe_code'] . ' ' .
            $item['category'] . ' ' .
            $item['keywords'],
            'UTF-8'
        );

        if (mb_strpos($haystack, $q) !== false) {
            $results[] = $item;
        }
    }
    return $results;
}

