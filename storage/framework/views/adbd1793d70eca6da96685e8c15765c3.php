<?php
    $activePromotions = \App\Models\Promotion::active()->ordered()->get();
?>

<?php if($activePromotions->count() > 0): ?>

    
    <?php if (! $__env->hasRenderedOnce('8193d18b-586e-45b0-81bd-e03777baf4ee')): $__env->markAsRenderedOnce('8193d18b-586e-45b0-81bd-e03777baf4ee'); ?>
        <style>
            /* ═══════════════════════════════════════════════
                   PROMOTION BAR — marquee + multi-promotion
                   ═══════════════════════════════════════════════ */

            /* Bar collante au sommet de la page */
            .tg-promo-bar {
                width: 100%;
                padding: 6px 0;
                font-size: 13px;
                font-weight: 500;
                display: flex;
                align-items: center;
                overflow: hidden;
                background-color: #dc3545;
                color: #ffffff;
                transition: background-color 0.6s ease, color 0.6s ease;
                /* On change de sticky à relative pour qu'elle soit AU-DESSUS du header flux */
                position: relative;
                z-index: 10999;
            }

            /* Lien invisible qui couvre toute la barre */
            .tg-promo-bar__link {
                position: absolute;
                inset: 0;
                z-index: 1;
                pointer-events: none;
                /* désactivé par défaut, activé par JS si lien présent */
            }

            /* Pousse le header fixed juste en-dessous de la barre de promotion */
            #sticky-header,
            #header-sticky {
                position: relative !important;
                top: auto !important;
            }

            #sticky-header.sticky-menu,
            #header-sticky.sticky-menu {
                position: fixed !important;
                top: 0 !important;
            }

            /* Styles pour le header blanc quand la promotion est active */
            .tg-promo-active #sticky-header,
            .tg-promo-active #header-sticky {
                background: #ffffff !important;
            }

            /* Switch logo: cacher logo normal, afficher logo promo rouge */
            .tg-promo-active .logo .logo-1 {
                display: none !important;
            }

            .tg-promo-active .logo .logo-2 {
                display: none !important;
            }

            .tg-promo-active .logo .logo-promo {
                display: inline-block !important;
            }

            /* Réduction de la hauteur du header blanc */
            .tg-promo-active .tg-header-height {
                height: auto !important;
            }

            .tg-promo-active .tg-header__area {
                padding: 10px 0 !important;
            }

            .tg-promo-active .tgmenu__navbar-wrap ul li a {
                padding: 15px 12px !important;
                color: #2d3436 !important;
            }

            /* Styles des boutons du header en rouge quand promotion active */
            .tg-promo-active .tg-btn-header {
                background-color: #BE3144 !important;
                color: #ffffff !important;
                border-color: #BE3144 !important;
            }

            .tg-promo-active .tg-btn-header:hover {
                background-color: #be3144 !important;
                border-color: #be3144 !important;
            }

            /* Ajustement des icônes et autres éléments du header */
            .tg-promo-active .tg-header-contact-number a,
            .tg-promo-active .tg-header-contact-number span,
            .tg-promo-active .tg-header-contact-icon,
            .tg-promo-active .tgmenu__navbar-wrap ul li a,
            .tg-promo-active .tg-header-cart .cart-button i,
            .tg-promo-active .mobile-nav-toggler i {
                color: #2d3436 !important;
            }

            .tg-promo-active .tg-header-contact-icon svg,
            .tg-promo-active .tg-header-cart .cart-button svg {
                fill: #2d3436 !important;
            }

            .tg-promo-active .tg-header-contact-icon svg path,
            .tg-promo-active .tg-header-cart .cart-button svg path {
                stroke: #2d3436 !important;
            }

            /* Wrapper qui clippe le texte défilant */
            .tg-promo-bar__wrap {
                flex: 1;
                overflow: hidden;
                position: relative;
                height: 1.6em;
            }

            /* Bande scrollante (une seule copie du texte) */
            .tg-promo-bar__strip {
                display: inline-flex;
                align-items: center;
                white-space: nowrap;
                gap: 60px;
            }

            .tg-promo-bar__strip.is-animating {
                animation: tg-marquee 20s linear infinite;
            }

            .tg-promo-bar__strip.paused {
                animation-play-state: paused;
            }

            @keyframes tg-marquee {
                from {
                    transform: translateX(100vw);
                }

                to {
                    transform: translateX(-100%);
                }
            }

            /* Contenu du message */
            .tg-promo-bar__text {
                display: inline-flex;
                align-items: center;
                gap: 16px;
                flex-shrink: 0;
            }

            /* Bouton CTA dans la bande */
            .tg-promo-bar__cta {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: #BE3144;
                color: #ffffff !important;
                padding: 2px 11px;
                border-radius: 20px;
                font-weight: 600;
                font-size: 13px;
                white-space: nowrap;
                transition: background 0.3s;
            }

            .tg-promo-bar:hover .tg-promo-bar__cta {
                background: #be3144;
            }

            /* Points de navigation */
            .tg-promo-bar__dots {
                display: flex;
                align-items: center;
                gap: 5px;
                padding: 0 14px;
                flex-shrink: 0;
                position: relative;
                z-index: 2;
            }

            .tg-promo-bar__dot {
                width: 7px;
                height: 7px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.4);
                cursor: pointer;
                transition: background 0.3s, transform 0.3s;
            }

            .tg-promo-bar__dot.active {
                background: #fff;
                transform: scale(1.35);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .tg-promo-bar {
                    font-size: 12px;
                }

                .tg-promo-bar__strip.is-animating {
                    animation-duration: 15s;
                }
            }

            @media (max-width: 480px) {
                .tg-promo-bar {
                    font-size: 11px;
                }

                .tg-promo-bar__strip.is-animating {
                    animation-duration: 11s;
                }
            }
        </style>
    <?php endif; ?>

    
    <div class="tg-promo-bar" id="tg-promo-bar" data-promotions="<?php echo e($activePromotions->map(fn($p) => [
            'message' => $p->message,
            'link_text' => $p->link_text ?? '',
            'link_url' => $p->link_url ?? '',
            'bg' => $p->background_color ?? '#dc3545',
            'color' => $p->text_color ?? '#ffffff',
        ])->toJson()); ?>">
        
        <a class="tg-promo-bar__link" id="tg-promo-link" href="#" tabindex="-1" aria-hidden="true"></a>

        
        <div class="tg-promo-bar__wrap">
            <div class="tg-promo-bar__strip" id="tg-promo-strip">
                <span class="tg-promo-bar__text" id="tg-promo-text"></span>
            </div>
        </div>

        
        <?php if($activePromotions->count() > 1): ?>
            <div class="tg-promo-bar__dots" id="tg-promo-dots"></div>
        <?php endif; ?>
    </div>

    
    <?php $__env->startPush('js_section'); ?>
        <script>
            (function () {
                'use strict';

                var bar = document.getElementById('tg-promo-bar');
                if (!bar) return;

                var strip = document.getElementById('tg-promo-strip');
                var text = document.getElementById('tg-promo-text');
                var link = document.getElementById('tg-promo-link');
                var dotsEl = document.getElementById('tg-promo-dots');

                var promotions = [];
                try { promotions = JSON.parse(bar.dataset.promotions || '[]'); } catch (e) { }
                var current = 0;

                /* ── Escape HTML ── */
                function esc(str) {
                    return String(str)
                        .replace(/&/g, '&amp;').replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;').replace(/"/g, '&quot;');
                }

                /* ── Construction du HTML d'une promotion ── */
                function buildHTML(promo) {
                    var html = '<span>' + esc(promo.message) + '</span>';
                    if (promo.link_text) {
                        html += '<span class="tg-promo-bar__cta">'
                            + esc(promo.link_text)
                            + ' <i class="fa-solid fa-arrow-right" style="font-size:11px;"></i>'
                            + '</span>';
                    }
                    return html;
                }

                /* ── Redémarrage propre de l'animation ── */
                function restartAnim() {
                    strip.classList.remove('is-animating');
                    void strip.offsetWidth;          /* force reflow */
                    strip.classList.add('is-animating');
                }

                /* ── Application d'une promotion ── */
                function apply(idx) {
                    var p = promotions[idx];

                    /* Couleurs */
                    bar.style.backgroundColor = p.bg;
                    bar.style.color = p.color;

                    /* Lien */
                    if (p.link_url) {
                        link.href = p.link_url;
                        link.style.pointerEvents = 'auto';
                    } else {
                        link.href = '#';
                        link.style.pointerEvents = 'none';
                    }

                    /* Texte (une seule copie) */
                    text.innerHTML = buildHTML(p);

                    /* Animation */
                    restartAnim();

                    /* Points */
                    if (dotsEl) {
                        Array.prototype.forEach.call(
                            dotsEl.querySelectorAll('.tg-promo-bar__dot'),
                            function (d, i) { d.classList.toggle('active', i === idx); }
                        );
                    }
                }

                /* ── Points de navigation ── */
                if (dotsEl && promotions.length > 1) {
                    promotions.forEach(function (_, i) {
                        var dot = document.createElement('span');
                        dot.className = 'tg-promo-bar__dot' + (i === 0 ? ' active' : '');
                        dot.addEventListener('click', function (e) {
                            e.stopPropagation();
                            current = i;
                            apply(current);
                        });
                        dotsEl.appendChild(dot);
                    });
                }

                /* ── Pause au survol ── */
                bar.addEventListener('mouseenter', function () { strip.classList.add('paused'); });
                bar.addEventListener('mouseleave', function () { strip.classList.remove('paused'); });

                /* ── Rotation automatique (toutes les 5 s) ── */
                if (promotions.length > 1) {
                    setInterval(function () {
                        current = (current + 1) % promotions.length;
                        apply(current);
                    }, 5000);
                }

                /* ── Init ── */
                apply(0);
                document.body.classList.add('tg-promo-active');

            })();
        </script>
    <?php $__env->stopPush(); ?>

<?php endif; ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/components/promotion-bar.blade.php ENDPATH**/ ?>