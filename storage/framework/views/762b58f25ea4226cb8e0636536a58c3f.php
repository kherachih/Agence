<!-- header-search -->
<div class="search__popup">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search__wrapper">
                    <div class="search__close">
                        <button type="button" class="search-close-btn">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="search__form">
                        <form action="#">
                            <div class="search__input">
                                <input class="search-input-field" type="text" placeholder="Type keywords here">
                                <span class="search-focus-border"></span>
                                <button>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="search-popup-overlay"></div>
<!-- header-search-end -->

<!-- header-area -->
<header class="tg-header-height">
    <div class="tg-header__area tg-header-lg-space z-index-999 tg-transparent" id="header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-5">
                    <div class="logo">
                        <a class="logo-1" href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($general_setting->logo)); ?>"
                                alt="Logo"></a>
                        <a class="logo-2 d-none" href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($general_setting->secondary_logo)); ?>"
                                alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-7">
                    <div class="tgmenu__wrap tg-menu-3-wrap d-flex align-items-center justify-content-end">
                        <nav class="tgmenu__nav">
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                <?php echo $__env->make('components.common_navitems', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </nav>
                        <div class="tg-menu-right-action tg-menu-right-action-3 d-flex align-items-center">
                            <button class="search-button search-open-btn">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.3047 16.8044L13.8294 13.3291M15.9857 8.14485C15.9857 12.1989 12.6992 15.4854 8.64519 15.4854C4.59114 15.4854 1.30469 12.1989 1.30469 8.14485C1.30469 4.09081 4.59114 0.804352 8.64519 0.804352C12.6992 0.804352 15.9857 4.09081 15.9857 8.14485Z"
                                        stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div class="tg-header-cart p-relative d-none d-xl-block">
                                <?php echo $__env->make('components.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tg-header-menu-bar lh-1 p-relative ml-10">
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
    </div>


    <!-- Mobile Menu  -->
    <?php echo $__env->make('components.common_mobile_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Mobile Menu -->

    <!-- offCanvas-menu -->
    <?php echo $__env->make('components.common_offcanvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- offCanvas-menu-end -->

</header>
<!-- header-area-end -->
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme5/views/components/header.blade.php ENDPATH**/ ?>