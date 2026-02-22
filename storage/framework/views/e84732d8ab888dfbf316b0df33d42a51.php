<?php
    $theme3_hero = getContent('theme3_hero.content', true);
    $theme3_destinations = destinations();
?>

<!-- Mobile Header Simple Start -->
<div class="tg-mobile-header d-lg-none">
    <div class="container-fluid px-2">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="tg-mobile-logo">
                    <a href="<?php echo e(route('home')); ?>">
                        <?php if($general_setting->logo): ?>
                            <img src="<?php echo e(asset($general_setting->logo)); ?>" alt="Logo" class="logo-img">
                        <?php else: ?>
                            <img src="<?php echo e(asset('frontend/assets/img/logo/logo.png')); ?>" alt="Logo" class="logo-img">
                        <?php endif; ?>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="tg-mobile-menu-right">
                    <button class="tgmenu-offcanvas-open-btn mobile-nav-toggler" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Search Section - Visible Only on Mobile -->
<div class="tg-mobile-search-section d-lg-none">
    <div class="container-fluid px-2">
        <div class="tg-mobile-search-wrapper" x-data="mobileBookingForm()">
            <form @submit.prevent="submitForm">
                <div class="tg-mobile-search-box">
                    <!-- Location -->
                    <div class="tg-mobile-search-item">
                        <div class="tg-mobile-search-dropdown" @click="toggleDropdown('location')">
                            <div class="tg-mobile-search-icon">
                                <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="tg-mobile-search-content">
                                <span class="tg-mobile-search-label"><?php echo e(__('translate.Location')); ?></span>
                                <span class="tg-mobile-search-value" x-text="destination || '<?php echo e(__('translate.Where to ?')); ?>'"></span>
                            </div>
                            <div class="tg-mobile-search-arrow">
                                <svg width="14" height="8" viewBox="0 0 14 8" fill="none">
                                    <path d="M1.6665 1L6.99984 6.33333L12.3332 1" stroke="#353844" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <!-- Location Dropdown -->
                        <div class="tg-mobile-dropdown-menu" x-show="activeDropdown === 'location'" x-transition @click.outside="activeDropdown = null">
                            <ul class="scrool-bar">
                                <?php $__currentLoopData = $theme3_destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li @click="selectDestination(`<?php echo e($destination->id); ?>`, `<?php echo e($destination->name); ?>`)">
                                        <i class="fa-regular fa-location-dot"></i>
                                        <span><?php echo e($destination->name); ?></span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Month -->
                    <div class="tg-mobile-search-item">
                        <div class="tg-mobile-search-dropdown" @click="toggleDropdown('month')">
                            <div class="tg-mobile-search-icon">
                                <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.76501 0.777771V3.26668M4.23413 0.777771V3.26668M0.777344 5.75548H13.2218M2.16006 2.02211H11.8391C12.6027 2.02211 13.2218 2.57927 13.2218 3.26656V11.9778C13.2218 12.6651 12.6027 13.2222 11.8391 13.2222H2.16006C1.39641 13.2222 0.777344 12.6651 0.777344 11.9778V3.26656C0.777344 2.57927 1.39641 2.02211 2.16006 2.02211Z" stroke="currentColor" stroke-width="0.977778" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="tg-mobile-search-content">
                                <span class="tg-mobile-search-label"><?php echo e(__('translate.Month')); ?></span>
                                <span class="tg-mobile-search-value" x-text="selected_month || '<?php echo e(__('translate.Select Month')); ?>'"></span>
                            </div>
                            <div class="tg-mobile-search-arrow">
                                <svg width="14" height="8" viewBox="0 0 14 8" fill="none">
                                    <path d="M1.6665 1L6.99984 6.33333L12.3332 1" stroke="#353844" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <!-- Month Dropdown -->
                        <div class="tg-mobile-dropdown-menu" x-show="activeDropdown === 'month'" x-transition @click.outside="activeDropdown = null">
                            <ul>
                                <li @click="selectMonth('January', '01')"><span>January</span></li>
                                <li @click="selectMonth('February', '02')"><span>February</span></li>
                                <li @click="selectMonth('March', '03')"><span>March</span></li>
                                <li @click="selectMonth('April', '04')"><span>April</span></li>
                                <li @click="selectMonth('May', '05')"><span>May</span></li>
                                <li @click="selectMonth('June', '06')"><span>June</span></li>
                                <li @click="selectMonth('July', '07')"><span>July</span></li>
                                <li @click="selectMonth('August', '08')"><span>August</span></li>
                                <li @click="selectMonth('September', '09')"><span>September</span></li>
                                <li @click="selectMonth('October', '10')"><span>October</span></li>
                                <li @click="selectMonth('November', '11')"><span>November</span></li>
                                <li @click="selectMonth('December', '12')"><span>December</span></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Guests -->
                    <div class="tg-mobile-search-item">
                        <div class="tg-mobile-search-dropdown" @click="toggleDropdown('guests')">
                            <div class="tg-mobile-search-icon">
                                <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.51285 15.2889C1.33507 15.2889 1.15729 15.2 1.0684 15.1111C0.979514 14.9334 0.890625 14.8445 0.890625 14.6667C0.890625 13.4222 1.24618 12.1778 1.8684 11.0222C2.49063 9.95558 3.4684 8.9778 4.53507 8.35558C4.09062 7.82225 3.73507 7.11114 3.55729 6.40003C3.4684 5.68892 3.4684 4.88892 3.64618 4.26669C3.82396 3.55558 4.2684 2.84447 4.71285 2.31114C5.24618 1.7778 5.8684 1.33336 6.49063 1.15558C7.02396 0.977805 7.55729 0.888916 8.09063 0.888916C8.2684 0.888916 8.53507 0.888916 8.71285 0.888916C9.42396 0.977805 10.1351 1.24447 10.7573 1.68892C11.3795 2.13336 11.824 2.66669 12.1795 3.28892C12.5351 3.91114 12.7128 4.62225 12.7128 5.42225C12.7128 6.48892 12.3573 7.55558 11.6462 8.35558C12.1795 8.71114 12.7128 9.06669 13.2462 9.51114C13.9573 10.2222 14.4017 10.9334 14.8462 11.8222C15.2017 12.7111 15.3795 13.6 15.3795 14.5778C15.3795 14.7556 15.2906 14.9334 15.2017 15.0222C15.1128 15.1111 14.9351 15.2 14.7573 15.2C14.6684 15.2 14.5795 15.2 14.4906 15.1111C14.4017 15.1111 14.3128 15.0222 14.3128 14.9334C14.224 14.8445 14.224 14.8445 14.1351 14.7556C14.1351 14.6667 14.0462 14.5778 14.0462 14.4889C14.0462 13.6889 13.8684 12.9778 13.6017 12.2667C13.3351 11.5556 12.8906 10.9334 12.2684 10.4C11.7351 9.95558 11.2017 9.51114 10.5795 9.24447C9.8684 9.68892 9.0684 9.95558 8.09063 9.95558C7.20174 9.95558 6.31285 9.68892 5.60174 9.24447C4.62396 9.68892 3.73507 10.4 3.11285 11.3778C2.49063 12.3556 2.13507 13.4222 2.13507 14.5778C2.13507 14.7556 2.04618 14.9334 1.95729 15.0222C1.8684 15.2 1.69062 15.2889 1.51285 15.2889ZM8.09063 2.22225C7.4684 2.22225 6.84618 2.40003 6.31285 2.75558C5.69062 3.11114 5.33507 3.64447 5.0684 4.1778C4.80174 4.80003 4.71285 5.42225 4.89063 6.13336C4.97951 6.75558 5.33507 7.37781 5.77951 7.82225C6.22396 8.26669 6.84618 8.62225 7.4684 8.71114C7.64618 8.71114 7.91285 8.80003 8.09063 8.80003C8.53507 8.80003 8.97951 8.71114 9.33507 8.53336C9.95729 8.26669 10.4017 7.91114 10.8462 7.28892C11.2017 6.75558 11.3795 6.13336 11.3795 5.51114C11.3795 4.62225 11.024 3.82225 10.4017 3.20003C9.77951 2.48892 8.97951 2.22225 8.09063 2.22225Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="tg-mobile-search-content">
                                <span class="tg-mobile-search-label">Guests</span>
                                <span class="tg-mobile-search-value" x-text="guestText || '<?php echo e(__('translate.+ Add Guests')); ?>'"></span>
                            </div>
                            <div class="tg-mobile-search-arrow">
                                <svg width="14" height="8" viewBox="0 0 14 8" fill="none">
                                    <path d="M1.6665 1L6.99984 6.33333L12.3332 1" stroke="#353844" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <!-- Guests Dropdown -->
                        <div class="tg-mobile-dropdown-menu" x-show="activeDropdown === 'guests'" x-transition @click.outside="activeDropdown = null">
                            <ul>
                                <li>
                                    <span class="mr-20"><?php echo e(__('translate.Adults')); ?></span>
                                    <div class="tg-mobile-quantity-item">
                                        <span @click="decrementAdults" class="qty-btn">-</span>
                                        <span x-text="adults" class="qty-value"></span>
                                        <span @click="incrementAdults" class="qty-btn">+</span>
                                    </div>
                                </li>
                                <li>
                                    <span class="mr-20"><?php echo e(__('translate.Children')); ?></span>
                                    <div class="tg-mobile-quantity-item">
                                        <span @click="decrementChildren" class="qty-btn">-</span>
                                        <span x-text="children" class="qty-value"></span>
                                        <span @click="incrementChildren" class="qty-btn">+</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Search Button -->
                    <button type="submit" class="tg-mobile-search-btn">
                        <svg width="20" height="20" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.2218 13.2222L10.5188 10.5192M12.1959 6.48705C12.1959 9.6402 9.63977 12.1963 6.48662 12.1963C3.33348 12.1963 0.777344 9.6402 0.777344 6.48705C0.777344 3.3339 3.33348 0.777771 6.48662 0.777771C9.63977 0.777771 12.1959 3.3339 12.1959 6.48705Z" stroke="currentColor" stroke-width="1.575" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <?php echo e(__('translate.Search')); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mobile Header Simple Styles -->
<style>
    .tg-mobile-header {
        background: #fff;
        padding: 12px 0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1001;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .tg-mobile-logo .logo-img {
        max-height: 35px;
        width: auto;
    }
    
    .mobile-nav-toggler {
        width: 40px;
        height: 24px;
        background: transparent;
        border: none;
        cursor: pointer;
        position: relative;
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
        gap: 5px;
    }
    
    .mobile-nav-toggler span {
        display: block;
        height: 2px;
        background: #333;
        border-radius: 2px;
        transition: all 0.3s;
    }
    
    .mobile-nav-toggler span:first-child {
        width: 25px;
    }
    
    .mobile-nav-toggler span:nth-child(2) {
        width: 18px;
    }
    
    .mobile-nav-toggler span:last-child {
        width: 12px;
    }
    
    .tg-mobile-search-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 70px 0 25px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
    }
    
    .tg-mobile-search-wrapper {
        background: #fff;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    
    .tg-mobile-search-box {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    
    .tg-mobile-search-item {
        width: 100%;
        position: relative;
    }
    
    .tg-mobile-search-dropdown {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 14px 12px;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        transition: all 0.3s;
        border: 1px solid #e8ecf4;
    }
    
    .tg-mobile-search-dropdown:active {
        background: #fff;
        border-color: #667eea;
    }
    
    .tg-mobile-search-icon {
        color: #667eea;
        flex-shrink: 0;
    }
    
    .tg-mobile-search-content {
        flex: 1;
        min-width: 0;
    }
    
    .tg-mobile-search-label {
        display: block;
        font-size: 11px;
        color: #888;
        margin-bottom: 2px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .tg-mobile-search-value {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #333;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .tg-mobile-search-arrow {
        flex-shrink: 0;
    }
    
    .tg-mobile-search-btn {
        width: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 16px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 5px;
    }
    
    .tg-mobile-search-btn:active {
        transform: scale(0.98);
    }
    
    .tg-mobile-dropdown-menu {
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        right: 0;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        z-index: 100;
        max-height: 280px;
        overflow-y: auto;
    }
    
    .tg-mobile-dropdown-menu ul {
        list-style: none;
        padding: 8px;
        margin: 0;
    }
    
    .tg-mobile-dropdown-menu li {
        padding: 14px 12px;
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        border-radius: 10px;
        transition: all 0.3s;
        font-size: 14px;
        font-weight: 500;
    }
    
    .tg-mobile-dropdown-menu li:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
    }
    
    .tg-mobile-dropdown-menu li i {
        color: #667eea;
        width: 18px;
    }
    
    .tg-mobile-dropdown-menu li:hover i {
        color: #fff;
    }
    
    .tg-mobile-quantity-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-left: auto;
    }
    
    .tg-mobile-quantity-item .qty-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 20px;
        font-weight: bold;
        color: #333;
        transition: all 0.3s;
    }
    
    .tg-mobile-quantity-item .qty-btn:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
    }
    
    .tg-mobile-quantity-item .qty-value {
        font-weight: 700;
        min-width: 25px;
        text-align: center;
        font-size: 16px;
    }
    
    @media (max-width: 480px) {
        .tg-mobile-search-wrapper {
            margin: 0 -5px;
            border-radius: 15px;
            padding: 15px;
        }
        
        .tg-mobile-search-dropdown {
            padding: 12px 10px;
        }
    }
</style>

<!-- Mobile Booking Form Script -->
<script>
    function mobileBookingForm() {
        return {
            destination: '',
            destination_id: '',
            selected_month: '',
            selected_month_value: '',
            adults: 0,
            children: 0,
            activeDropdown: null,
            
            get guestText() {
                if (this.adults > 0 || this.children > 0) {
                    let text = '';
                    if (this.adults > 0) text += this.adults + ' Adult';
                    if (this.children > 0) text += (text ? ', ' : '') + this.children + ' Child';
                    return text;
                }
                return '';
            },
            
            toggleDropdown(dropdown) {
                if (this.activeDropdown === dropdown) {
                    this.activeDropdown = null;
                } else {
                    this.activeDropdown = dropdown;
                }
            },
            
            selectDestination(destinationId, destinationName) {
                this.destination_id = destinationId;
                this.destination = destinationName;
                this.activeDropdown = null;
            },
            
            selectMonth(monthName, monthValue) {
                this.selected_month = monthName;
                this.selected_month_value = monthValue;
                this.activeDropdown = null;
            },
            
            incrementAdults() {
                this.adults++;
            },
            decrementAdults() {
                if (this.adults > 0) this.adults--;
            },
            incrementChildren() {
                this.children++;
            },
            decrementChildren() {
                if (this.children > 0) this.children--;
            },
            
            submitForm() {
                const params = new URLSearchParams({
                    destination: this.destination,
                    destination_id: this.destination_id,
                    month: this.selected_month_value,
                    adults: this.adults,
                    children: this.children
                });
                
                window.location.href = `<?php echo e(route('front.tourbooking.services')); ?>?` + params.toString();
            }
        }
    }
</script>
<!-- Mobile Header Simple End -->
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme3/views/components/mobile-header-simple.blade.php ENDPATH**/ ?>