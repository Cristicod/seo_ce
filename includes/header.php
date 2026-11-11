<?php
// =============================================================================
// HEADER & NAVBAR PARTAJAT — AutoPiese Pro
// Variabilă necesară: $active_page ('catalog' | 'brembo' | 'sachs')
// =============================================================================
$active_page = $active_page ?? 'catalog';
?>
<header>
    <nav class="ap-navbar" aria-label="Meniu principal <?= SITE_NAME ?>">
        <div class="container d-flex align-items-center justify-content-between flex-wrap gap-3">
            <a href="index.php" class="ap-brand" aria-label="Acasă <?= SITE_NAME ?>">
                <i class="bi bi-gear-wide-connected" aria-hidden="true"></i> AutoPiese<span>Pro</span>
            </a>

            <!-- Bară de căutare inteligentă cu autocomplete live -->
            <div class="ap-search-wrapper">
                <form class="ap-search-form" action="index.php" method="GET" role="search">
                    <i class="bi bi-search ap-search-icon" aria-hidden="true"></i>
                    <input type="search"
                           name="s"
                           class="ap-search-input"
                           placeholder="Caută piesă, cod OEM, serie VIN (ex: Brembo, 312mm)..."
                           <?php if (isset($search_term) && $search_term !== ''): ?>
                           value="<?= e($search_term) ?>"
                           <?php endif; ?>
                           autocomplete="off"
                           aria-label="Căutare piese auto">
                    <button type="button" class="ap-search-clear" aria-label="Șterge textul de căutare">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                    <div class="ap-search-dropdown" role="listbox" aria-label="Rezultate căutare live"></div>
                </form>
            </div>

            <ul class="d-flex list-unstyled mb-0 gap-1 flex-wrap align-items-center">
                <li><a href="index.php" class="ap-nav-link<?= $active_page === 'catalog' ? ' active' : '' ?>"<?= $active_page === 'catalog' ? ' aria-current="page"' : '' ?>>Catalog</a></li>
                <li><a href="disc-frana-brembo.php" class="ap-nav-link<?= $active_page === 'brembo' ? ' active' : '' ?>"<?= $active_page === 'brembo' ? ' aria-current="page"' : '' ?>>Brembo 312mm</a></li>
                <li><a href="kit-ambreiaj-sachs.php" class="ap-nav-link<?= $active_page === 'sachs' ? ' active' : '' ?>"<?= $active_page === 'sachs' ? ' aria-current="page"' : '' ?>>Sachs 240mm</a></li>
            </ul>

            <div class="d-flex align-items-center gap-2 text-white-50 small">
                <i class="bi bi-cart3 fs-5 text-white" aria-hidden="true"></i>
                Coș (<span id="cart-count">0</span>)
            </div>
        </div>
    </nav>
</header>
