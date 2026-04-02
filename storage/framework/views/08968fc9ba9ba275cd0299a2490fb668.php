<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="<?php echo e(asset($general_setting->favicon)); ?>" type="image/x-icon">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Site Title -->
    <?php echo $__env->yieldContent('title'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/flatpicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/odometer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/dev.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/cookie_consent.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/custom.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('global/toastr/toastr.min.css')); ?>">

    <?php echo $__env->yieldPushContent('style_section'); ?>


    <?php if($general_setting->google_analytic_status == 1): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($general_setting->google_analytic_id); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '<?php echo e($general_setting->google_analytic_id); ?>');
        </script>
    <?php endif; ?>


    <?php if($general_setting->pixel_status == 1): ?>
        <script>
            ! function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php echo e($general_setting->pixel_app_id); ?>');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id=<?php echo e($general_setting->pixel_app_id); ?>&ev=PageView&noscript=1" /></noscript>
    <?php endif; ?>

</head>

<body class="td_theme_2">

<?php if (isset($component)) { $__componentOriginal4df4f47ee1c2fb97262b5e263d21e7d3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4df4f47ee1c2fb97262b5e263d21e7d3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.promotion-bar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('promotion-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4df4f47ee1c2fb97262b5e263d21e7d3)): ?>
<?php $attributes = $__attributesOriginal4df4f47ee1c2fb97262b5e263d21e7d3; ?>
<?php unset($__attributesOriginal4df4f47ee1c2fb97262b5e263d21e7d3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4df4f47ee1c2fb97262b5e263d21e7d3)): ?>
<?php $component = $__componentOriginal4df4f47ee1c2fb97262b5e263d21e7d3; ?>
<?php unset($__componentOriginal4df4f47ee1c2fb97262b5e263d21e7d3); ?>
<?php endif; ?>

<?php if($general_setting->preloader_status == 'enable'): ?>
        <!-- Start Preloader -->
        <div id="loading">
            <div class="loader"></div>
        </div>
        <!-- End Preloader -->
    <?php endif; ?>

    <?php if($general_setting->preloader_status == 'enable'): ?>
        <!-- Scroll-top -->
        <button class="scroll__top scroll-to-target" data-target="html">
            <i class="fa-sharp fa-regular fa-arrow-up"></i>
        </button>
        <!-- Scroll-top-end-->
    <?php endif; ?>


    <!-- Start Header Section -->
    <?php echo $__env->make('theme::components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Header Section -->
    <?php echo $__env->yieldContent('front-content'); ?>


    <!-- footer-area-start -->
    <footer>
        <div class="tg-footer-area pt-130 include-bg <?php echo e(request()->routeIs('faq') || request()->routeIs('pricing') ? 'tg-footer-space' : ''); ?> "
            data-background="<?php echo e(asset('frontend/assets/img/others/footer/footer.jpg')); ?>">
            <div class="container">
                <div class="tg-footer-top pb-40">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="tg-footer-widget mb-40">
                                <div class="tg-footer-logo mb-20">
                                    <?php if($general_setting->footer_logo): ?>
                                        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($general_setting->footer_logo)); ?>"
                                                alt=""></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($general_setting->logo)); ?>"
                                                alt=""></a>
                                    <?php endif; ?>
                                </div>
                                <p class="mb-20"><?php echo e($footer->about_us); ?></p>
                                <div class="tg-footer-form mb-30">
                                    <form action="<?php echo e(route('store-newsletter')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="email" placeholder="Enter your mail" name="email">
                                        <button class="tg-footer-form-btn" type="submit">
                                            <svg width="22" height="17" viewBox="0 0 22 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.52514 8.47486H20.4749M20.4749 8.47486L13.5 1.5M20.4749 8.47486L13.5 15.4497"
                                                    stroke="white" stroke-width="1.77778" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="tg-footer-social">
                                    <?php if(isset($footer->facebook)): ?>
                                        <a href="<?php echo e($footer->facebook); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                                    <?php endif; ?>
                                    <?php if(isset($footer->twitter)): ?>
                                        <a href="<?php echo e($footer->twitter); ?>"><i class="fa-brands fa-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if(isset($footer->instagram)): ?>
                                        <a href="<?php echo e($footer->instagram); ?>"><i class="fa-brands fa-instagram"></i></a>
                                    <?php endif; ?>
                                    <?php if(isset($footer->pinterest)): ?>
                                        <a href="<?php echo e($footer->pinterest); ?>"><i class="fa-brands fa-pinterest-p"></i></a>
                                    <?php endif; ?>
                                    <?php if(isset($footer->youtube)): ?>
                                        <a href="<?php echo e($footer->youtube); ?>"><i class="fa-brands fa-youtube"></i></a>
                                    <?php endif; ?>
                                    <?php if(isset($footer->linkedin)): ?>
                                        <a href="<?php echo e($footer->linkedin); ?>"><i class="fa-brands fa-linkedin"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="tg-footer-widget tg-footer-link ml-80 mb-40">
                                <h3 class="tg-footer-widget-title mb-25"><?php echo e(__('translate.Quick Links')); ?></h3>
                                <?php echo wp_nav_menu([
    'theme_location' => 'footer_menu_1',
    'menu_class' => '',
    'container' => false,
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'menu_id' => 'main-nav',
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
]); ?>

                                <ul
                                    style="margin-top: 15px; padding-top: 15px; border-top: 1px solid rgba(255,255,255,0.1);">
                                    <li>
                                        <a href="<?php echo e(route('agency.registration')); ?>"
                                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight: 600;">
                                            <i class="fa-solid fa-briefcase"></i>
                                            <?php echo e(__('translate.Become an Agency Partner')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="tg-footer-widget tg-footer-info mb-40">
                                <h3 class="tg-footer-widget-title mb-25"><?php echo e(__('translate.Information')); ?></h3>
                                <ul>
                                    <?php if($footer->address || $footer->address_url): ?>
                                        <li>
                                            <a class="d-flex" href="<?php echo e($footer->address_url); ?>">
                                                <span class="mr-15">
                                                    <svg width="20" height="24" viewBox="0 0 20 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M19.0013 10.0608C19.0013 16.8486 10.3346 22.6668 10.3346 22.6668C10.3346 22.6668 1.66797 16.8486 1.66797 10.0608C1.66797 7.74615 2.58106 5.52634 4.20638 3.88965C5.83169 2.25297 8.03609 1.3335 10.3346 1.3335C12.6332 1.3335 14.8376 2.25297 16.4629 3.88965C18.0882 5.52634 19.0013 7.74615 19.0013 10.0608Z"
                                                            stroke="white" stroke-width="1.73333" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M10.3346 12.9699C11.9301 12.9699 13.2235 11.6674 13.2235 10.0608C13.2235 8.45412 11.9301 7.15168 10.3346 7.15168C8.73915 7.15168 7.44575 8.45412 7.44575 10.0608C7.44575 11.6674 8.73915 12.9699 10.3346 12.9699Z"
                                                            stroke="white" stroke-width="1.73333" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <?php echo e($footer->address); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($footer->phone): ?>
                                        <li>
                                            <a class="d-flex" href="tel:+1238889999">
                                                <span class="mr-15">
                                                    <i class="fa-sharp text-white fa-solid fa-phone"></i>
                                                </span>
                                                <?php echo e($footer->phone); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($footer->working_days): ?>
                                        <li class="d-flex">
                                            <span class="mr-15">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.9987 5.60006V12.0001L16.2654 14.1334M22.6654 12.0002C22.6654 17.8912 17.8897 22.6668 11.9987 22.6668C6.10766 22.6668 1.33203 17.8912 1.33203 12.0002C1.33203 6.10912 6.10766 1.3335 11.9987 1.3335C17.8897 1.3335 22.6654 6.10912 22.6654 12.0002Z"
                                                        stroke="white" stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <p class="mb-0">
                                                <?php echo e($footer->working_days); ?>

                                            </p>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="tg-footer-widget tg-footer-link mb-40">
                                <h3 class="tg-footer-widget-title mb-25"><?php echo e(__('translate.Utility Pages')); ?></h3>
                                <?php echo wp_nav_menu([
    'theme_location' => 'footer_menu_2',
    'menu_class' => '',
    'container' => false,
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'menu_id' => 'main-nav',
]); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-footer-copyright text-center">
                <span>
                    <?php echo e($footer->copyright); ?>

                </span>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->

    <?php if($general_setting->tawk_status == 1): ?>
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = '<?php echo e($general_setting->tawk_chat_link); ?>';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    <?php endif; ?>



    <?php if($general_setting->cookie_consent_status == 1): ?>
        <!-- common-modal start  -->
        <div class="common-modal cookie_consent_modal d-none bg-white">
            <button type="button" class="btn-close cookie_consent_close_btn" aria-label="Close"></button>

            <h5><?php echo e(__('translate.Cookies')); ?></h5>
            <p><?php echo e($general_setting->cookie_consent_message); ?></p>


            <a href="javascript:;"
                class="td_btn td_style_1 td_type_3 td_radius_30 td_medium td_fs_14 report-modal-btn cookie_consent_accept_btn">
                <span class="td_btn_in td_accent_color">
                    <span><?php echo e(__('translate.Accept')); ?></span>
                </span>
            </a>

        </div>
        <!-- common-modal end  -->
    <?php endif; ?>


    <!-- Script -->
    <script src="<?php echo e(asset('global/js/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/imagesloaded.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery.odometer.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery.appear.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/nice-select.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/ajax-form.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/cart.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('global/toastr/toastr.min.js')); ?>"></script>

    <script>
        (function ($) {
            "use strict"
            $(document).ready(function () {

                const session_notify_message = <?php echo json_encode(Session::get('message'), 15, 512) ?>;
                const demo_mode_message = <?php echo json_encode(Session::get('demo_mode'), 15, 512) ?>;

                if (session_notify_message != null) {
                    const session_notify_type = <?php echo json_encode(Session::get('alert-type', 'info'), 512) ?>;
                    switch (session_notify_type) {
                        case 'info':
                            toastr.info(session_notify_message);
                            break;
                        case 'success':
                            toastr.success(session_notify_message);
                            break;
                        case 'warning':
                            toastr.warning(session_notify_message);
                            break;
                        case 'error':
                            toastr.error(session_notify_message);
                            break;
                    }
                }

                if (demo_mode_message != null) {
                    toastr.warning(
                        "<?php echo e(__('translate.All Language keywords are not implemented in the demo mode')); ?>"
                    );
                    toastr.info("<?php echo e(__('translate.Admin can translate every word from the admin panel')); ?>");
                }

                const validation_errors = <?php echo json_encode($errors->all(), 15, 512) ?>;

                if (validation_errors.length > 0) {
                    validation_errors.forEach(error => toastr.error(error));
                }

                if (localStorage.getItem('tourex-cookie') != '1') {
                    $('.cookie_consent_modal').removeClass('d-none');
                }

                $('.cookie_consent_close_btn').on('click', function () {
                    $('.cookie_consent_modal').addClass('d-none');
                });

                $('.cookie_consent_accept_btn').on('click', function () {
                    localStorage.setItem('tourex-cookie', '1');
                    $('.cookie_consent_modal').addClass('d-none');
                });

                $('.before_auth_wishlist').on("click", function () {
                    toastr.error("<?php echo e(__('translate.Please login first')); ?>")
                });

                $(".currency_code").on('change', function () {
                    var currency_code = $(this).val();

                    window.location.href = "<?php echo e(route('currency-switcher')); ?>" + "?currency_code=" +
                        currency_code;
                });

                $(".language_code").on('change', function () {
                    var language_code = $(this).val();

                    window.location.href = "<?php echo e(route('language-switcher')); ?>" + "?lang_code=" +
                        language_code;
                });

            });
        })(jQuery);
    </script>


    <?php echo $__env->yieldPushContent('js_section'); ?>


</body>

</html><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/layout_inner_page.blade.php ENDPATH**/ ?>