<!-- header-area -->
@php
    try {
        $megaContinents = \Modules\TourBooking\App\Models\Continent::with(['activeDestinations' => function($q) { 
            $q->orderBy('name'); 
        }])->active()->ordered()->get();
    } catch (\Exception $e) {
        $megaContinents = collect();
    }
@endphp
<header class="tg-header-height" style="background-color: #be3144 !important;">
    <div class="tg-header__area tg-header-tu-menu tg-header-lg-space z-index-999" id="header-sticky" style="background-color: #be3144 !important;">
        <style>
            /* ===== Background colors ===== */
            .tg-header-height { background-color: #be3144 !important; }
            .tg-header__area { background-color: #be3144 !important; }
            #header-sticky { background-color: #be3144 !important; }
            .sticky-active { background-color: #be3144 !important; }

            /* ===== Menu text colors ===== */
            .tgmenu__main-menu ul.navigation > li > a { color: #ffffff !important; }
            .tgmenu__main-menu > ul > li > a { color: #ffffff !important; }

            /* ===== Header buttons ===== */
            .tg-header-btn .tg-btn-header { border-color: #ffffff !important; color: #ffffff !important; }
            .tg-header-btn .tg-btn-header svg path { fill: #ffffff !important; }
            .tg-header-btn .tg-btn-header:hover { background-color: #ffffff !important; color: #be3144 !important; }
            .tg-header-btn .tg-btn-header:hover svg path { fill: #be3144 !important; }
            .tgmenu-offcanvas-open-btn-custom { background-color: #ffffff; color: #be3144; border: none; padding: 8px 18px; border-radius: 30px; font-weight: bold; font-size: 14px; margin-left: 10px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.1); display: inline-flex; align-items: center; }
            .tgmenu-offcanvas-open-btn-custom:hover { background-color: #f8f9fa; transform: translateY(-2px); }
            .tgmenu-offcanvas-open-btn-custom i { margin-right: 6px; }
            .mobile-nav-toggler span { background-color: #ffffff !important; }

            /* ===== HEADER LAYOUT FIX - Flexbox au lieu du grid Bootstrap ===== */
            .tg-header-flex-row {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                width: 100% !important;
                padding: 0 15px !important;
            }

            /* Zone gauche : logo + menu */
            .tg-header-left {
                display: flex !important;
                align-items: center !important;
                flex: 1 1 auto !important;
                min-width: 0 !important;
                overflow: hidden !important;
            }

            /* Zone droite : boutons */
            .tg-header-right {
                display: flex !important;
                align-items: center !important;
                flex: 0 0 auto !important;
                white-space: nowrap !important;
            }

            /* ===== Logo - taille réduite et FORCÉE ===== */
            .logo {
                display: flex !important;
                align-items: center !important;
                max-width: 180px !important;
                height: 45px !important;
                flex-shrink: 0 !important;
                margin-right: 20px !important;
            }
            .logo a {
                align-items: center !important;
                height: 100% !important;
            }
            .logo a img {
                display: block !important;
                width: auto !important;
                height: auto !important;
                max-width: 180px !important;
                max-height: 45px !important;
                object-fit: contain !important;
                image-rendering: -webkit-optimize-contrast;
            }

            /* ===== Navigation - plus compact ===== */
            .tgmenu__nav.tg-header-nav {
                margin-left: 0 !important;
                flex: 1 1 auto !important;
                min-width: 0 !important;
            }
            .tgmenu__main-menu ul.navigation {
                flex-wrap: nowrap !important;
                white-space: nowrap !important;
                gap: 0 !important;
            }
            .tgmenu__main-menu ul.navigation > li > a {
                padding: 15px 10px !important;
                font-size: 14px !important;
                white-space: nowrap !important;
            }

            /* ===== Responsive : écrans XXL (1400px+) ===== */
            @media (min-width: 1400px) {
                .logo {
                    max-width: 200px !important;
                    height: 50px !important;
                }
                .logo a img {
                    max-width: 200px !important;
                    max-height: 50px !important;
                }
                .tgmenu__main-menu ul.navigation > li > a {
                    padding: 18px 14px !important;
                    font-size: 15px !important;
                }
            }

            /* ===== Responsive : écrans XL (1200-1399px) ===== */
            @media (min-width: 1200px) and (max-width: 1399px) {
                .logo {
                    max-width: 160px !important;
                    height: 42px !important;
                    margin-right: 15px !important;
                }
                .logo a img {
                    max-width: 160px !important;
                    max-height: 42px !important;
                }
                .tgmenu__main-menu ul.navigation > li > a {
                    padding: 15px 8px !important;
                    font-size: 13px !important;
                }
                .tgmenu-offcanvas-open-btn-custom {
                    padding: 7px 14px !important;
                    font-size: 13px !important;
                }
            }

            /* ===== Responsive : tablette / mobile ===== */
            @media (max-width: 1199px) {
                .tg-header-flex-row {
                    padding: 0 10px !important;
                }
                .logo {
                    max-width: 150px !important;
                    height: 40px !important;
                    margin-right: 10px !important;
                }
                .logo a img {
                    max-width: 150px !important;
                    max-height: 40px !important;
                }
            }
            @media (max-width: 575px) {
                .logo {
                    max-width: 120px !important;
                    height: 35px !important;
                }
                .logo a img {
                    max-width: 120px !important;
                    max-height: 35px !important;
                }
            }
        </style>
        <div class="container-fluid">
            <div class="tg-header-flex-row">
                <div class="tg-header-left">
                    <div class="tgmenu__wrap d-flex align-items-center" style="width:100%;">
                        <div class="logo">
                            <a class="logo-1" href="{{ route('home') }}"><img src="{{ asset($general_setting->logo) }}"
                                    alt="Logo"></a>
                            <a class="logo-2 d-none" href="{{ route('home') }}"><img
                                    src="{{ asset($general_setting->secondary_logo) }}" alt="Logo"></a>
                            @if(!empty($general_setting->logo_red))
                                <a class="logo-promo" href="{{ route('home') }}" style="display:none;"><img
                                        src="{{ asset($general_setting->logo_red) }}" alt="Logo"></a>
                            @endif
                        </div>
 
                        <nav class="tgmenu__nav tg-header-nav">
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                @include('components.common_navitems')
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="tg-header-right">
                    <div class="tg-menu-right-action d-flex align-items-center justify-content-end">
 
                        <div class="tg-header-btn ml-15 d-none d-sm-flex align-items-center">
                            @include('components.language_selector')
                            @guest('web')
                                <a class="tg-btn-header" href="{{ route('user.login') }}">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.7 17.2C1.5 17.2 1.3 17.1 1.2 17C1.1 16.8 1 16.7 1 16.5C1 15.1 1.4 13.7 2.1 12.4C2.8 11.2 3.9 10.1 5.1 9.4C4.6 8.8 4.2 8 4 7.2C3.9 6.4 3.9 5.5 4.1 4.8C4.3 4 4.8 3.2 5.3 2.6C5.9 2 6.6 1.5 7.3 1.3C7.9 1.1 8.5 1 9.1 1C9.3 1 9.6 1 9.8 1C10.6 1.1 11.4 1.4 12.1 1.9C12.8 2.4 13.3 3 13.7 3.7C14.1 4.4 14.3 5.2 14.3 6.1C14.3 7.3 13.9 8.5 13.1 9.4C13.7 9.8 14.3 10.2 14.9 10.7C15.7 11.5 16.2 12.3 16.7 13.3C17.1 14.3 17.3 15.3 17.3 16.4C17.3 16.6 17.2 16.8 17.1 16.9C17 17 16.8 17.1 16.6 17.1C16.5 17.1 16.4 17.1 16.3 17C16.2 17 16.1 16.9 16.1 16.8C16 16.7 16 16.7 15.9 16.6C15.9 16.5 15.8 16.4 15.8 16.3C15.8 15.4 15.6 14.6 15.3 13.8C15 13 14.5 12.3 13.8 11.7C13.2 11.2 12.6 10.7 11.9 10.4C11.1 10.9 10.2 11.2 9.1 11.2C8.1 11.2 7.1 10.9 6.3 10.4C5.2 10.9 4.2 11.7 3.5 12.8C2.8 13.9 2.4 15.1 2.4 16.4C2.4 16.6 2.3 16.8 2.2 16.9C2.1 17.1 1.9 17.2 1.7 17.2ZM9.1 2.5C8.4 2.5 7.7 2.7 7.1 3.1C6.4 3.5 6 4.1 5.7 4.7C5.4 5.4 5.3 6.1 5.5 6.9C5.6 7.6 6 8.3 6.5 8.8C7 9.3 7.7 9.7 8.4 9.8C8.6 9.8 8.9 9.9 9.1 9.9C9.6 9.9 10.1 9.8 10.5 9.6C11.2 9.3 11.7 8.9 12.2 8.2C12.6 7.6 12.8 6.9 12.8 6.2C12.8 5.2 12.4 4.3 11.7 3.6C11 2.8 10.1 2.5 9.1 2.5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    {{ __('translate.Login') }}
                                </a>
                            @else
                                <a class="tg-btn-header"
                                    href="{{ Auth::guard('web')->user()->is_seller == 1 ? route('agency.dashboard') : route('user.dashboard') }}">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.7 17.2C1.5 17.2 1.3 17.1 1.2 17C1.1 16.8 1 16.7 1 16.5C1 15.1 1.4 13.7 2.1 12.4C2.8 11.2 3.9 10.1 5.1 9.4C4.6 8.8 4.2 8 4 7.2C3.9 6.4 3.9 5.5 4.1 4.8C4.3 4 4.8 3.2 5.3 2.6C5.9 2 6.6 1.5 7.3 1.3C7.9 1.1 8.5 1 9.1 1C9.3 1 9.6 1 9.8 1C10.6 1.1 11.4 1.4 12.1 1.9C12.8 2.4 13.3 3 13.7 3.7C14.1 4.4 14.3 5.2 14.3 6.1C14.3 7.3 13.9 8.5 13.1 9.4C13.7 9.8 14.3 10.2 14.9 10.7C15.7 11.5 16.2 12.3 16.7 13.3C17.1 14.3 17.3 15.3 17.3 16.4C17.3 16.6 17.2 16.8 17.1 16.9C17 17 16.8 17.1 16.6 17.1C16.5 17.1 16.4 17.1 16.3 17C16.2 17 16.1 16.9 16.1 16.8C16 16.7 16 16.7 15.9 16.6C15.9 16.5 15.8 16.4 15.8 16.3C15.8 15.4 15.6 14.6 15.3 13.8C15 13 14.5 12.3 13.8 11.7C13.2 11.2 12.6 10.7 11.9 10.4C11.1 10.9 10.2 11.2 9.1 11.2C8.1 11.2 7.1 10.9 6.3 10.4C5.2 10.9 4.2 11.7 3.5 12.8C2.8 13.9 2.4 15.1 2.4 16.4C2.4 16.6 2.3 16.8 2.2 16.9C2.1 17.1 1.9 17.2 1.7 17.2ZM9.1 2.5C8.4 2.5 7.7 2.7 7.1 3.1C6.4 3.5 6 4.1 5.7 4.7C5.4 5.4 5.3 6.1 5.5 6.9C5.6 7.6 6 8.3 6.5 8.8C7 9.3 7.7 9.7 8.4 9.8C8.6 9.8 8.9 9.9 9.1 9.9C9.6 9.9 10.1 9.8 10.5 9.6C11.2 9.3 11.7 8.9 12.2 8.2C12.6 7.6 12.8 6.9 12.8 6.2C12.8 5.2 12.4 4.3 11.7 3.6C11 2.8 10.1 2.5 9.1 2.5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            @endguest
                            
                            <!-- The Menu Offcanvas Button -->
                            <button class="tgmenu-offcanvas-open-btn-custom menu-tigger d-none d-xl-block">
                                <i class="fas fa-bars"></i> {{ __('translate.Menu') ?? 'Menu' }}
                            </button>
                        </div>
                        <div class="tg-header-menu-bar p-relative">
                            <button class="tgmenu-offcanvas-open-btn mobile-nav-toggler d-block d-xl-none ml-10">
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
    @include('components.common_mobile_menu')
    <!-- End Mobile Menu -->

    <!-- Destinations Mega Menu -->
    <div class="destinations-mega-menu shadow" style="display: none; position: absolute; top: 100%; left: 0; width: 100%; background: #ffffff; padding: 30px 0; border-radius: 0 0 10px 10px; z-index: 1050; border-top: 3px solid #be3144; box-shadow: 0 15px 30px rgba(0,0,0,0.1);">
        <div class="container-fluid" style="padding: 0 50px;">
            <div class="row">
                @foreach($megaContinents as $continent)
                <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                    <h5 class="mega-menu-title" style="color: #be3144; font-weight: 700; border-bottom: 2px solid #f8f9fa; padding-bottom: 8px; margin-bottom: 12px; font-size: 15px; text-transform: uppercase;">
                        {{ $continent->name }}
                    </h5>
                    <ul class="mega-menu-list" style="list-style: none; padding: 0; margin: 0;">
                        @foreach($continent->activeDestinations as $destination)
                        <li style="margin-bottom: 5px;">
                            <a href="{{ route('front.tourbooking.destinations.show', $destination->slug ?? '') }}" style="color: #2d3436; font-size: 14px; text-decoration: none; display: block; transition: all 0.3s; font-weight: 500;" onmouseover="this.style.color='#be3144'; this.style.paddingLeft='5px';" onmouseout="this.style.color='#2d3436'; this.style.paddingLeft='0';">
                                {{ $destination->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const navLinks = document.querySelectorAll('.tgmenu__main-menu ul.navigation > li > a');
        let destLi = null;
        
        navLinks.forEach(link => {
            if(link.innerText.toLowerCase().includes('destination')) {
                destLi = link.parentElement;
            }
        });

        if(destLi) {
            const megaMenu = document.querySelector('.destinations-mega-menu');
            if(megaMenu) {
                destLi.appendChild(megaMenu);
                destLi.style.position = 'static';
                
                // Also set the parent nav wrap to static so it spans full width of the header area 
                const navMain = document.querySelector('.tgmenu__main-menu');
                if(navMain) navMain.style.position = 'static';
                
                const navContainer = document.querySelector('.tgmenu__nav');
                if(navContainer) navContainer.style.position = 'static';

                let menuTimeout;

                destLi.addEventListener('mouseenter', function() {
                    clearTimeout(menuTimeout);
                    megaMenu.style.display = 'block';
                });
                destLi.addEventListener('mouseleave', function() {
                    menuTimeout = setTimeout(function() {
                        megaMenu.style.display = 'none';
                    }, 300); // 300ms delay before closing
                });

                // Also keep menu open if mouse enters the mega menu itself
                megaMenu.addEventListener('mouseenter', function() {
                    clearTimeout(menuTimeout);
                });
                megaMenu.addEventListener('mouseleave', function() {
                    menuTimeout = setTimeout(function() {
                        megaMenu.style.display = 'none';
                    }, 300);
                });
            }
        }
    });
    </script>
    <!-- offCanvas-menu -->
    @include('theme::components.common_offcanvas')
    <!-- offCanvas-menu-end -->

</header>
<!-- header-area-end -->