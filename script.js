// =============================================================================
// AUTOPIESE PRO — JAVASCRIPT VANILLA & CORE WEB VITALS
// =============================================================================
// ROL TEHNIC:
// 1. Zero Dependențe Externe (Vanilla JS): nu folosim jQuery sau framework-uri greoaie,
//    asigurând o latență minimă de execuție pe firul principal (Main Thread).
// 2. Optimizare INP (Interaction to Next Paint < 50ms): interacțiunile la tastare
//    și click pe galerie sunt non-blocante.
// 3. Măsurare Dwell Time: monitorizează secundele petrecute pe pagină pentru SEO.
// 4. Căutare Inteligentă cu Debounce & AbortController: previne cererile concurente.
// 5. Galerie Foto & Lightbox integrat cu elementul nativ <dialog> HTML5.
// =============================================================================

// =============================================================================
// 1. DWELL TIME & METRICI DE VITEZĂ PENTRU SEO
// =============================================================================
// Dwell Time măsoară intervalul în care vizitatorul explorează conținutul paginii.
// Un timp mai mare indică algoritmilor Google că pagina satisface intenția de căutare.
const startTime = Date.now();
const timerEl = document.getElementById('dwell-timer');

// Actualizare contor vizual în fiecare secundă
if (timerEl) {
    setInterval(() => {
        const sec = Math.round((Date.now() - startTime) / 1000);
        timerEl.textContent = sec;
    }, 1000);
}

// Salvare automată a timpului petrecut în localStorage la părăsirea paginii
window.addEventListener('beforeunload', () => {
    const sec = Math.round((Date.now() - startTime) / 1000);
    localStorage.setItem('dwellTime_' + location.pathname, sec);
});

// La finalizarea încărcării paginii: extragem metricile reale din browser
window.addEventListener('load', () => {
    // Folosim PerformanceNavigationTiming (API modern standard W3C)
    if (window.performance) {
        const navEntries = performance.getEntriesByType('navigation');
        if (navEntries.length > 0) {
            const nav = navEntries[0];
            const ttfb = Math.round(nav.responseStart - nav.requestStart);
            const domReady = Math.round(nav.domContentLoadedEventEnd - nav.startTime);
            const loadTotal = Math.round(nav.loadEventEnd - nav.startTime);

            console.log(
                `%c⚡ [AutoPiese Pro • Core Web Vitals]\n` +
                `TTFB (Time to First Byte): ${ttfb}ms\n` +
                `DOM Ready: ${domReady}ms\n` +
                `Load Event Total: ${loadTotal}ms`,
                'color:#ef4444; font-weight:bold; font-size:12px;'
            );
        }
    }

    // Inițializare componente interactive
    initProductGallery();
    initLiveSearch();
});

// =============================================================================
// 2. GALERIE FOTO PRODUS & LIGHTBOX INTERACTIV (<dialog> HTML5 NATIV)
// =============================================================================
function initProductGallery() {
    const gallery = document.querySelector('.ap-product-gallery');
    if (!gallery) return;

    const mainImg = document.getElementById('ap-main-image');
    const mainBox = document.querySelector('.ap-gallery-main');
    const thumbButtons = document.querySelectorAll('.ap-thumb-btn');

    // Elemente Lightbox (<dialog>)
    const lightbox = document.getElementById('ap-lightbox');
    const lbImg = document.getElementById('ap-lightbox-img');
    const lbClose = document.getElementById('ap-lightbox-close');
    const lbPrev = document.getElementById('ap-lightbox-prev');
    const lbNext = document.getElementById('ap-lightbox-next');
    const lbCounter = document.getElementById('ap-lightbox-counter');
    const lbCaption = document.getElementById('ap-lightbox-caption');

    if (!mainImg || !thumbButtons.length) return;

    // Extragem lista de 3 imagini din atributele data- ale thumbnail-urilor
    const images = Array.from(thumbButtons).map(btn => ({
        src: btn.getAttribute('data-full'),
        alt: btn.getAttribute('data-alt') || '',
        title: btn.getAttribute('data-title') || ''
    }));

    let currentIndex = 0;

    /**
     * Schimbă imaginea activă atât în cardul principal, cât și în starea butoanelor
     */
    function setActiveImage(index, updateFocus = false) {
        if (index < 0 || index >= images.length) return;
        currentIndex = index;

        // Tranziție de opacitate fină fără flicker
        mainImg.style.opacity = '0.3';
        setTimeout(() => {
            mainImg.src = images[currentIndex].src;
            mainImg.alt = images[currentIndex].alt;
            mainImg.style.opacity = '1';
        }, 100);

        thumbButtons.forEach((btn, idx) => {
            const isActive = idx === currentIndex;
            btn.classList.toggle('active', isActive);
            btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
            if (isActive && updateFocus) btn.focus();
        });
    }

    // Evenimente pe thumbnail-uri (click și navigare cu săgeți)
    thumbButtons.forEach((btn, index) => {
        btn.addEventListener('click', () => setActiveImage(index));
        btn.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') {
                setActiveImage((currentIndex + 1) % images.length, true);
            } else if (e.key === 'ArrowLeft') {
                setActiveImage((currentIndex - 1 + images.length) % images.length, true);
            }
        });
    });

    /**
     * Deschiderea ferestrei mărite folosind API-ul nativ dialog.showModal()
     */
    function openLightbox(index) {
        if (!lightbox || !lbImg) return;
        currentIndex = index;
        updateLightboxContent();

        if (typeof lightbox.showModal === 'function') {
            if (!lightbox.open) lightbox.showModal();
        } else {
            lightbox.setAttribute('open', '');
        }
        document.body.style.overflow = 'hidden'; // Blochează scroll-ul paginii din fundal
        if (lbClose) lbClose.focus();
    }

    /**
     * Închiderea ferestrei mărite folosind API-ul nativ dialog.close()
     */
    function closeLightbox() {
        if (!lightbox) return;
        if (typeof lightbox.close === 'function') {
            if (lightbox.open) lightbox.close();
        } else {
            lightbox.removeAttribute('open');
        }
        document.body.style.overflow = '';
        if (mainBox) mainBox.focus();
    }

    /**
     * Actualizează conținutul (imagine, titlu, contor 1/3) din lightbox
     */
    function updateLightboxContent() {
        const item = images[currentIndex];
        if (!item) return;

        lbImg.style.opacity = '0.3';
        lbImg.src = item.src;
        lbImg.alt = item.alt;

        setTimeout(() => {
            lbImg.style.opacity = '1';
        }, 90);

        if (lbCounter) {
            lbCounter.textContent = `${currentIndex + 1} / ${images.length}`;
        }
        if (lbCaption) {
            lbCaption.textContent = item.title || item.alt;
        }

        setActiveImage(currentIndex);
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        updateLightboxContent();
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateLightboxContent();
    }

    if (mainBox) {
        mainBox.addEventListener('click', () => openLightbox(currentIndex));
        mainBox.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openLightbox(currentIndex);
            }
        });
    }

    if (lbClose) lbClose.addEventListener('click', closeLightbox);
    if (lbNext)  lbNext.addEventListener('click', nextImage);
    if (lbPrev)  lbPrev.addEventListener('click', prevImage);

    // Închidere nativă a dialogului la cancel (Escape) sau la click pe fundalul ::backdrop
    if (lightbox) {
        lightbox.addEventListener('cancel', () => {
            document.body.style.overflow = '';
        });
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
    }

    window.addEventListener('keydown', (e) => {
        if (!lightbox || !lightbox.open) return;
        if (e.key === 'ArrowRight') nextImage();
        else if (e.key === 'ArrowLeft') prevImage();
    });
}

// =============================================================================
// 3. COȘ PIESE AUTO (INTERACȚIUNE UI & TOAST NOTIFICATION)
// =============================================================================
let cartCount = 0;
const cartBadge = document.getElementById('cart-count');

function addToCart(name) {
    cartCount++;
    if (cartBadge) cartBadge.textContent = cartCount;

    const toastEl = document.getElementById('cartToast');
    const toastName = document.getElementById('toast-product-name');
    if (toastName) toastName.textContent = name;

    if (toastEl && window.bootstrap) {
        bootstrap.Toast.getOrCreateInstance(toastEl, { delay: 3000 }).show();
    }
}

// =============================================================================
// 4. BARĂ DE CĂUTARE INTELIGENTĂ CU AUTOCOMPLETE LIVE
// =============================================================================
// CARACTERISTICI:
// - Debounce 100ms: reduce apelurile de rețea.
// - AbortController: anulează cererile precedente încă neterminate la tastare rapidă.
// - Navigare Tastatură: Săgeți Sus/Jos, Enter pentru confirmare, Escape pentru anulare.
// - Highlight Galben: evidențiază termenul căutat în denumire și cod.
// =============================================================================
function initLiveSearch() {
    const searchInputs = document.querySelectorAll('.ap-search-input');
    if (!searchInputs.length) return;

    searchInputs.forEach(input => {
        const wrapper = input.closest('.ap-search-wrapper');
        if (!wrapper) return;

        const dropdown = wrapper.querySelector('.ap-search-dropdown');
        const clearBtn = wrapper.querySelector('.ap-search-clear');
        let debounceTimer = null;
        let selectedIndex = -1;
        let abortCtrl = null;

        if (!dropdown) return;

        // Afișează butonul de ștergere rapidă (X) doar când există text introdus
        const toggleClearBtn = () => {
            if (clearBtn) {
                clearBtn.style.display = input.value.trim().length > 0 ? 'flex' : 'none';
            }
        };

        if (clearBtn) {
            clearBtn.addEventListener('click', (e) => {
                e.preventDefault();
                input.value = '';
                toggleClearBtn();
                dropdown.classList.remove('active');
                input.focus();
            });
        }

        // Declanșare căutare la tastare cu debounce scurt de 100ms
        input.addEventListener('input', () => {
            toggleClearBtn();
            clearTimeout(debounceTimer);
            const query = input.value.trim();

            if (query.length < 2) {
                dropdown.classList.remove('active');
                dropdown.innerHTML = '';
                return;
            }

            debounceTimer = setTimeout(() => {
                fetchResults(query, dropdown, input);
            }, 100);
        });

        // La refocalizarea inputului, redeschide dropdown-ul dacă există deja rezultate
        input.addEventListener('focus', () => {
            if (input.value.trim().length >= 2 && dropdown.children.length > 0) {
                dropdown.classList.add('active');
            }
        });

        // Navigare accesibilă cu tastatura în lista de rezultate
        input.addEventListener('keydown', (e) => {
            if (!dropdown.classList.contains('active')) return;
            const items = dropdown.querySelectorAll('.ap-search-item');
            if (!items.length) return;

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                selectedIndex = (selectedIndex + 1) % items.length;
                updateHighlight(items);
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                selectedIndex = (selectedIndex - 1 + items.length) % items.length;
                updateHighlight(items);
            } else if (e.key === 'Enter') {
                if (selectedIndex >= 0 && items[selectedIndex]) {
                    e.preventDefault();
                    items[selectedIndex].click();
                }
            } else if (e.key === 'Escape') {
                dropdown.classList.remove('active');
            }
        });

        function updateHighlight(items) {
            items.forEach((item, idx) => {
                item.classList.toggle('highlighted', idx === selectedIndex);
                if (idx === selectedIndex) {
                    item.scrollIntoView({ block: 'nearest' });
                }
            });
        }

        /**
         * Interoghează endpoint-ul REST JSON folosind AbortController
         */
        async function fetchResults(query, dd, inp) {
            try {
                // Anulează cererea precedentă aflată în tranzit pentru a preveni race conditions
                if (abortCtrl) abortCtrl.abort();
                abortCtrl = new AbortController();

                const res = await fetch(`api-search.php?q=${encodeURIComponent(query)}`, {
                    signal: abortCtrl.signal
                });
                if (!res.ok) throw new Error('Eroare rețea');
                const data = await res.json();
                renderDropdown(data, query, dd, inp);
            } catch (err) {
                if (err.name !== 'AbortError') {
                    console.warn('[Search]', err);
                }
            }
        }
    });

    // Închide dropdown-ul dacă utilizatorul dă click în afara barei de căutare
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.ap-search-wrapper')) {
            document.querySelectorAll('.ap-search-dropdown').forEach(dd => dd.classList.remove('active'));
        }
    });

    /**
     * Randează HTML-ul dropdown-ului cu rezultate
     */
    function renderDropdown(items, query, dropdown, input) {
        dropdown.innerHTML = '';

        if (!items || items.length === 0) {
            dropdown.innerHTML = `
                <div class="ap-search-empty">
                    <i class="bi bi-search text-muted fs-4 d-block mb-1"></i>
                    Nicio piesă găsită pentru <strong>"${escapeHtml(query)}"</strong>.<br>
                    <small class="text-muted">Încearcă după cod (ex: 312, 09.9772.11) sau brand (Brembo, Sachs).</small>
                </div>
            `;
            dropdown.classList.add('active');
            return;
        }

        items.forEach(item => {
            const a = document.createElement('a');
            a.href = item.url;
            a.className = 'ap-search-item';
            a.innerHTML = `
                <div class="ap-search-thumb">
                    <img src="${item.image}" alt="${escapeHtml(item.name)}" width="44" height="44" loading="lazy">
                </div>
                <div class="ap-search-info">
                    <div class="ap-search-name">${highlightMatch(item.name, query)}</div>
                    <div class="ap-search-meta">
                        <span class="badge bg-light text-dark border me-1">${item.brand}</span>
                        <span class="text-muted">Cod: ${highlightMatch(item.code, query)}</span>
                    </div>
                </div>
                <div class="ap-search-price">${item.price} Lei</div>
            `;
            dropdown.appendChild(a);
        });

        // Link suplimentar la finalul listei pentru căutare completă
        const footer = document.createElement('div');
        footer.className = 'ap-search-footer';
        footer.innerHTML = `Apasă Enter pentru a vedea toate rezultatele pentru "<strong>${escapeHtml(query)}</strong>" →`;
        footer.addEventListener('click', () => {
            const form = input.closest('form');
            if (form) form.submit();
        });
        dropdown.appendChild(footer);

        dropdown.classList.add('active');
    }

    /**
     * Previne vulnerabilitățile XSS prin scăparea caracterelor speciale
     */
    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    /**
     * Evidențiază termenul potrivit cu tagul <mark>
     */
    function highlightMatch(text, query) {
        if (!query) return escapeHtml(text);
        const regex = new RegExp(`(${query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
        return escapeHtml(text).replace(regex, '<mark style="background:#fef08a; padding:0 2px; border-radius:2px;">$1</mark>');
    }
}
