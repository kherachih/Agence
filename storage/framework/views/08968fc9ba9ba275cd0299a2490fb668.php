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
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
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


    <!-- header-area -->
    <header class="tg-header-height">
        <div class="tg-header__area tg-header-lg-space z-index-999 tg-transparent" id="header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-6">
                        <div class="tgmenu__wrap d-flex align-items-center">
                            <div class="logo">
                                <a class="logo-1" href="<?php echo e(route('home')); ?>"><img
                                        src="<?php echo e(asset($general_setting->logo)); ?>" alt="Logo"></a>
                                <a class="logo-2 d-none" href="<?php echo e(route('home')); ?>"><img
                                        src="<?php echo e(asset($general_setting->secondary_logo)); ?>" alt="Logo"></a>
                            </div>
                            <nav class="tgmenu__nav tgmenu-1-space ml-180">
                                <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                    <?php echo $__env->make('components.common_navitems', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="tg-menu-right-action d-flex align-items-center justify-content-end">
                            <div class="tg-header-contact-info d-flex align-items-center">
                                <span class="tg-header-contact-icon mr-8 d-none d-xl-block">
                                    <?php echo $__env->make('svg.search_phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </span>
                                <div class="tg-header-contact-number d-none d-xl-block">
                                    <span class="d-none d-lg-inline"><?php echo e(__('translate.Call Us')); ?>:</span>
                                    <a href="tel:<?php echo e($footer->phone); ?>"><?php echo e($footer->phone); ?></a>
                                </div>
                            </div>
                            <div class="tg-header-currency ml-15 d-none d-xl-block">
                                <span class="tg-header-border"></span>
                                <select class="currency_code" name="currency_code" style="padding: 6px 10px; border-radius: 4px; border: 1px solid #e0e0e0; background: #fff; font-size: 13px; cursor: pointer; min-width: 90px;">
                                    <?php $__currentLoopData = $currency_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($currency->currency_code); ?>" <?php echo e(session('currency_code') == $currency->currency_code ? 'selected' : ''); ?>>
                                            <?php echo e($currency->currency_name); ?> (<?php echo e($currency->currency_icon); ?>)
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="tg-header-language ml-15 d-none d-xl-block">
                                <span class="tg-header-border"></span>
                                <select class="language_code" name="language_code" style="padding: 6px 10px; border-radius: 4px; border: 1px solid #e0e0e0; background: #fff; font-size: 13px; cursor: pointer; min-width: 90px;">
                                    <?php $__currentLoopData = $language_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang->lang_code); ?>" <?php echo e(session('front_lang') == $lang->lang_code ? 'selected' : ''); ?>>
                                            <?php echo e($lang->lang_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="tg-header-cart p-relative ml-15 pl-15 d-none d-xl-block">
                                <span class="tg-header-border"></span>
                                <?php echo $__env->make('components.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tg-header-btn ml-15 d-none d-sm-block">
                                <?php if(auth()->guard('web')->guest()): ?>
                                    <a class="tg-btn-header" href="<?php echo e(route('user.login')); ?>">
                                        <span>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.7 17.2C1.5 17.2 1.3 17.1 1.2 17C1.1 16.8 1 16.7 1 16.5C1 15.1 1.4 13.7 2.1 12.4C2.8 11.2 3.9 10.1 5.1 9.4C4.6 8.8 4.2 8 4 7.2C3.9 6.4 3.9 5.5 4.1 4.8C4.3 4 4.8 3.2 5.3 2.6C5.9 2 6.6 1.5 7.3 1.3C7.9 1.1 8.5 1 9.1 1C9.3 1 9.6 1 9.8 1C10.6 1.1 11.4 1.4 12.1 1.9C12.8 2.4 13.3 3 13.7 3.7C14.1 4.4 14.3 5.2 14.3 6.1C14.3 7.3 13.9 8.5 13.1 9.4C13.7 9.8 14.3 10.2 14.9 10.7C15.7 11.5 16.2 12.3 16.7 13.3C17.1 14.3 17.3 15.3 17.3 16.4C17.3 16.6 17.2 16.8 17.1 16.9C17 17 16.8 17.1 16.6 17.1C16.5 17.1 16.4 17.1 16.3 17C16.2 17 16.1 16.9 16.1 16.8C16 16.7 16 16.7 15.9 16.6C15.9 16.5 15.8 16.4 15.8 16.3C15.8 15.4 15.6 14.6 15.3 13.8C15 13 14.5 12.3 13.8 11.7C13.2 11.2 12.6 10.7 11.9 10.4C11.1 10.9 10.2 11.2 9.1 11.2C8.1 11.2 7.1 10.9 6.3 10.4C5.2 10.9 4.2 11.7 3.5 12.8C2.8 13.9 2.4 15.1 2.4 16.4C2.4 16.6 2.3 16.8 2.2 16.9C2.1 17.1 1.9 17.2 1.7 17.2ZM9.1 2.5C8.4 2.5 7.7 2.7 7.1 3.1C6.4 3.5 6 4.1 5.7 4.7C5.4 5.4 5.3 6.1 5.5 6.9C5.6 7.6 6 8.3 6.5 8.8C7 9.3 7.7 9.7 8.4 9.8C8.6 9.8 8.9 9.9 9.1 9.9C9.6 9.9 10.1 9.8 10.5 9.6C11.2 9.3 11.7 8.9 12.2 8.2C12.6 7.6 12.8 6.9 12.8 6.2C12.8 5.2 12.4 4.3 11.7 3.6C11 2.8 10.1 2.5 9.1 2.5Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <?php echo e(__('translate.Login')); ?>

                                    </a>
                                <?php else: ?>
                                    <a class="tg-btn-header"
                                        href="<?php echo e(Auth::guard('web')->user()->is_seller == 1 ? route('agency.dashboard') : route('user.dashboard')); ?>">
                                        <span>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.7 17.2C1.5 17.2 1.3 17.1 1.2 17C1.1 16.8 1 16.7 1 16.5C1 15.1 1.4 13.7 2.1 12.4C2.8 11.2 3.9 10.1 5.1 9.4C4.6 8.8 4.2 8 4 7.2C3.9 6.4 3.9 5.5 4.1 4.8C4.3 4 4.8 3.2 5.3 2.6C5.9 2 6.6 1.5 7.3 1.3C7.9 1.1 8.5 1 9.1 1C9.3 1 9.6 1 9.8 1C10.6 1.1 11.4 1.4 12.1 1.9C12.8 2.4 13.3 3 13.7 3.7C14.1 4.4 14.3 5.2 14.3 6.1C14.3 7.3 13.9 8.5 13.1 9.4C13.7 9.8 14.3 10.2 14.9 10.7C15.7 11.5 16.2 12.3 16.7 13.3C17.1 14.3 17.3 15.3 17.3 16.4C17.3 16.6 17.2 16.8 17.1 16.9C17 17 16.8 17.1 16.6 17.1C16.5 17.1 16.4 17.1 16.3 17C16.2 17 16.1 16.9 16.1 16.8C16 16.7 16 16.7 15.9 16.6C15.9 16.5 15.8 16.4 15.8 16.3C15.8 15.4 15.6 14.6 15.3 13.8C15 13 14.5 12.3 13.8 11.7C13.2 11.2 12.6 10.7 11.9 10.4C11.1 10.9 10.2 11.2 9.1 11.2C8.1 11.2 7.1 10.9 6.3 10.4C5.2 10.9 4.2 11.7 3.5 12.8C2.8 13.9 2.4 15.1 2.4 16.4C2.4 16.6 2.3 16.8 2.2 16.9C2.1 17.1 1.9 17.2 1.7 17.2ZM9.1 2.5C8.4 2.5 7.7 2.7 7.1 3.1C6.4 3.5 6 4.1 5.7 4.7C5.4 5.4 5.3 6.1 5.5 6.9C5.6 7.6 6 8.3 6.5 8.8C7 9.3 7.7 9.7 8.4 9.8C8.6 9.8 8.9 9.9 9.1 9.9C9.6 9.9 10.1 9.8 10.5 9.6C11.2 9.3 11.7 8.9 12.2 8.2C12.6 7.6 12.8 6.9 12.8 6.2C12.8 5.2 12.4 4.3 11.7 3.6C11 2.8 10.1 2.5 9.1 2.5Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <?php echo e(__('translate.Dashboard')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="tg-header-menu-bar lh-1 p-relative ml-15 pl-15">
                                <span class="tg-header-border d-none d-xl-block"></span>
                                <button class="tgmenu-offcanvas-open-btn menu-tigger d-none d-xl-block">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                                <button class="tgmenu-offcanvas-open-btn mobile-nav-toggler d-block d-xl-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu  -->
        <?php echo $__env->make('components.common_mobile_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Mobile Menu -->
        <?php echo $__env->make('components.common_offcanvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <!-- header-area-end -->
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
                                        <a href="<?php echo e(route('home')); ?>"><img
                                                src="<?php echo e(asset($general_setting->footer_logo)); ?>" alt=""></a>
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

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="tg-footer-widget tg-footer-info mb-40">
                                <h3 class="tg-footer-widget-title mb-25"><?php echo e(__('translate.Information')); ?></h3>
                                <ul>
                                    <?php if($footer->address || $footer->address_url): ?>
                                    <li>
                                        <a class="d-flex"
                                            href="<?php echo e($footer->address_url); ?>">
                                            <span class="mr-15">
                                                <svg width="20" height="24" viewBox="0 0 20 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
            (function() {
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
        (function($) {
            "use strict"
            $(document).ready(function() {

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

                $('.cookie_consent_close_btn').on('click', function() {
                    $('.cookie_consent_modal').addClass('d-none');
                });

                $('.cookie_consent_accept_btn').on('click', function() {
                    localStorage.setItem('tourex-cookie', '1');
                    $('.cookie_consent_modal').addClass('d-none');
                });

                $('.before_auth_wishlist').on("click", function() {
                    toastr.error("<?php echo e(__('translate.Please login first')); ?>")
                });

                $(".currency_code").on('change', function() {
                    var currency_code = $(this).val();

                    window.location.href = "<?php echo e(route('currency-switcher')); ?>" + "?currency_code=" +
                        currency_code;
                });

                $(".language_code").on('change', function() {
                    var language_code = $(this).val();

                    window.location.href = "<?php echo e(route('language-switcher')); ?>" + "?lang_code=" +
                        language_code;
                });

            });
        })(jQuery);
    </script>


    <?php echo $__env->yieldPushContent('js_section'); ?>


</body>

</html>
<?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/layout_inner_page.blade.php ENDPATH**/ ?>