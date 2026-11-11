<?php
// =============================================================================
// COMPONENTE PARTAJATE — LIGHTBOX MODAL (<dialog>) & TOAST
// =============================================================================
// ROL ARHITECTURAL:
// 1. Folosește elementul nativ HTML5 <dialog> pentru vizualizarea imaginii mărite.
//    AVANTAJE FAȚĂ DE MODALELE CLASICE DIN DIV-URI:
//    - Accesibilitate WCAG nativă: cititoarele de ecran recunosc automat dialogul modal.
//    - Focus trapping nativ: utilizatorul navighează cu TAB doar în interiorul ferestrei mărite.
//    - Închidere nativă la tasta Escape (fără cod JS suplimentar).
//    - Pseudoelementul ::backdrop pentru fundal semi-transparent cu efect de blur.
// 2. Componenta Bootstrap Toast pentru confirmarea vizuală la adăugarea în coș.
// =============================================================================
$lightbox_title = $lightbox_title ?? 'Vizualizare Piesă Auto';
?>

<!-- Lightbox Modal Nativ HTML5 (<dialog>) -->
<dialog id="ap-lightbox" class="ap-lightbox" aria-label="Vizualizator piese auto mărite">
    <div class="ap-lightbox-header">
        <div class="d-flex align-items-center">
            <h4 class="ap-lightbox-title" id="ap-lightbox-title"><?= e($lightbox_title) ?></h4>
            <span id="ap-lightbox-counter" class="ap-lightbox-counter">1 / 3</span>
        </div>
        <!-- Buton închidere cu suport pentru tastatură și cititoare de ecran -->
        <button id="ap-lightbox-close" class="ap-lightbox-close" type="button" aria-label="Închide fereastra mărită">
            <i class="bi bi-x-lg" aria-hidden="true"></i>
        </button>
    </div>

    <!-- Butoane navigare între cele 3 imagini ale produsului -->
    <button id="ap-lightbox-prev" class="ap-lightbox-nav ap-lightbox-prev" type="button" aria-label="Imaginea anterioară">
        <i class="bi bi-chevron-left" aria-hidden="true"></i>
    </button>

    <div class="ap-lightbox-stage">
        <img id="ap-lightbox-img" class="ap-lightbox-img" src="" alt="Piesă auto mărită" loading="lazy">
    </div>

    <button id="ap-lightbox-next" class="ap-lightbox-nav ap-lightbox-next" type="button" aria-label="Imaginea următoare">
        <i class="bi bi-chevron-right" aria-hidden="true"></i>
    </button>

    <!-- Titlu / Legendă descriptivă a imaginii curente -->
    <div id="ap-lightbox-caption" class="ap-lightbox-caption"></div>
</dialog>

<!-- Toast Notificare Coș (Feedback Vizual Instantaneu) -->
<div class="toast-container position-fixed bottom-0 end-0 p-4" style="z-index:9999">
    <div id="cartToast" class="toast bg-white shadow rounded-3 border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body d-flex align-items-center gap-3 p-3">
            <i class="bi bi-check-circle-fill text-success fs-4" aria-hidden="true"></i>
            <div>
                <strong>Piesă adăugată în coș!</strong><br>
                <small class="text-muted" id="toast-product-name"></small>
            </div>
        </div>
    </div>
</div>
