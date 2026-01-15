<div class="tgmobile__menu">
    <nav class="tgmobile__menu-box">
        <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
        <div class="nav-logo">
            <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($general_setting->secondary_logo)); ?>"
                    alt="logo"></a>
        </div>
        <div class="tgmobile__menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>
        <div class="mobile-selectors">
            <div class="mobile-selector-item">
                <label class="mobile-selector-label"><?php echo e(__('translate.Currency')); ?></label>
                <select class="currency_code mobile-select" name="currency_code">
                    <?php $__currentLoopData = $currency_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($currency->currency_code); ?>" <?php echo e(session('currency_code') == $currency->currency_code ? 'selected' : ''); ?>>
                            <?php echo e($currency->currency_name); ?> (<?php echo e($currency->currency_icon); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="mobile-selector-item">
                <label class="mobile-selector-label"><?php echo e(__('translate.Language')); ?></label>
                <select class="language_code mobile-select" name="language_code">
                    <?php $__currentLoopData = $language_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($lang->lang_code); ?>" <?php echo e(session('front_lang') == $lang->lang_code ? 'selected' : ''); ?>>
                            <?php echo e($lang->lang_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="mobile-agency-btn" style="padding: 20px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); margin-top: 20px;">
            <a class="tg-btn-partner-mobile" href="<?php echo e(route('agency.registration')); ?>"
                style="display: inline-flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 24px; border-radius: 8px; font-size: 16px; font-weight: 600; white-space: nowrap; width: 100%; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">
                <i class="fa-solid fa-briefcase" style="margin-right: 8px;"></i>
                <?php echo e(__('translate.Become an Agency Partner')); ?>

            </a>
        </div>
        <style>
            .tg-btn-partner-mobile:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
            }
            
            .tg-btn-partner-mobile:active {
                transform: translateY(0);
            }
            
            .mobile-selectors {
                padding: 20px 0;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                margin-top: 20px;
            }
            
            .mobile-selector-item {
                margin-bottom: 15px;
            }
            
            .mobile-selector-item:last-child {
                margin-bottom: 0;
            }
            
            .mobile-selector-label {
                display: block;
                color: #4a90e2;
                font-size: 14px;
                font-weight: 700;
                margin-bottom: 8px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            
            .mobile-select {
                width: 100%;
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                padding: 14px 45px 14px 18px;
                border: 2px solid #4a90e2;
                border-radius: 12px;
                background: linear-gradient(135deg, #2d3436 0%, #1a1d20 100%);
                font-size: 16px;
                font-weight: 600;
                color: #ffffff;
                cursor: pointer;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                font-family: inherit;
                position: relative;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            }
            
            .mobile-select:hover {
                border-color: #5ba3f5;
                background: linear-gradient(135deg, #3d4447 0%, #2a2d30 100%);
                box-shadow: 0 6px 20px rgba(74, 144, 226, 0.4);
                transform: translateY(-2px);
            }
            
            .mobile-select:focus {
                outline: none;
                border-color: #4a90e2;
                box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.3), 0 6px 20px rgba(74, 144, 226, 0.4);
            }
            
            .mobile-selector-item {
                position: relative;
            }
            
            .mobile-selector-item::after {
                content: '';
                position: absolute;
                top: 48px;
                right: 18px;
                width: 0;
                height: 0;
                border-left: 7px solid transparent;
                border-right: 7px solid transparent;
                border-top: 8px solid #4a90e2;
                pointer-events: none;
                z-index: 1;
            }
            
            .mobile-select option {
                padding: 14px 18px;
                background: #2d3436;
                color: #ffffff;
                font-weight: 600;
                font-size: 16px;
            }
            
            .mobile-select option:hover {
                background: #4a90e2;
            }
            
            .mobile-select option:checked {
                background: linear-gradient(135deg, #4a90e2 0%, #357abd 100%);
                color: #ffffff;
            }
        </style>
        <div class="social-links">
            <ul class="list-wrap">
                <?php if($footer->facebook): ?>
                    <li><a href="<?php echo e($footer->facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
                <?php endif; ?>
                <?php if($footer->twitter): ?>
                    <li><a href="<?php echo e($footer->twitter); ?>"><i class="fab fa-twitter"></i></a></li>
                <?php endif; ?>
                <?php if($footer->instagram): ?>
                    <li><a href="<?php echo e($footer->instagram); ?>"><i class="fab fa-instagram"></i></a></li>
                <?php endif; ?>
                <?php if($footer->linkedin): ?>
                    <li><a href="<?php echo e($footer->linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                <?php endif; ?>
                <?php if($footer->youtube): ?>
                    <li><a href="<?php echo e($footer->youtube); ?>"><i class="fab fa-youtube"></i></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>
<div class="tgmobile__menu-backdrop"></div><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/components/common_mobile_menu.blade.php ENDPATH**/ ?>