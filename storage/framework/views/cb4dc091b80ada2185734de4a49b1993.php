<!-- offCanvas-menu -->
<div class="offCanvas__info">
    <div class="offCanvas__close-icon menu-close">
        <button><i class="fa-sharp fa-regular fa-xmark"></i></button>
    </div>
    <div class="offCanvas__logo mb-30">
        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('uploads/website-images/logo-red-text-theme3.png')); ?>" alt="Logo"></a>
    </div>
    <div class="offCanvas__side-info mb-30">
        <div class="contact-list mb-30">
            <h4><?php echo e(__('translate.Office Address')); ?></h4>
            <p><?php echo e($footer->address); ?></p>
        </div>
        <div class="contact-list mb-30">
            <h4><?php echo e(__('translate.Phone Number')); ?></h4>
            <p><?php echo e($footer->phone); ?></p>
        </div>
        <div class="contact-list mb-30">
            <h4><?php echo e(__('translate.Email Address')); ?></h4>
            <p><?php echo e($footer->email); ?></p>
        </div>
        
        <div class="contact-list mb-30">
            <h4><?php echo e(__('translate.Currency') ?? 'Currency'); ?></h4>
            <div class="custom-select-wrapper mt-2">
                <select class="currency_code modern-select-offcanvas" name="currency_code" onchange="if(this.value) { window.location.href = '<?php echo e(route('currency-switcher')); ?>?currency_code=' + this.value; }">
                    <?php $__currentLoopData = $currency_list ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($currency->currency_code); ?>" <?php echo e(session('currency_code') == $currency->currency_code ? 'selected' : ''); ?>>
                            <?php echo e($currency->currency_name); ?> (<?php echo e($currency->currency_icon); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="contact-list mb-30">
            <h4><?php echo e(__('translate.Language') ?? 'Language'); ?></h4>
            <div class="custom-select-wrapper mt-2">
                <select class="language_code modern-select-offcanvas" name="language_code" onchange="if(this.value) { window.location.href = '<?php echo e(route('language-switcher')); ?>?lang_code=' + this.value; }">
                    <?php $__currentLoopData = $language_list ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($lang->lang_code); ?>" <?php echo e(session('front_lang') == $lang->lang_code ? 'selected' : ''); ?>>
                            <?php echo e($lang->lang_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>
    <div class="offCanvas__agency-btn mb-30">
        <?php if(auth()->guard('web')->guest()): ?>
            <a class="tg-btn-partner-offcanvas" href="<?php echo e(route('user.partner-login')); ?>"
                style="display: inline-flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 14px 28px; border-radius: 8px; font-size: 15px; font-weight: 600; white-space: nowrap; width: 100%; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">
                <i class="fa-solid fa-briefcase" style="margin-right: 8px;"></i>
                <?php echo e(__('translate.Dashboard Partner')); ?>

            </a>
        <?php else: ?>
            <?php if(Auth::guard('web')->user()->is_seller == 1): ?>
                <a class="tg-btn-partner-offcanvas" href="<?php echo e(route('agency.dashboard')); ?>"
                    style="display: inline-flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 14px 28px; border-radius: 8px; font-size: 15px; font-weight: 600; white-space: nowrap; width: 100%; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">
                    <i class="fa-solid fa-briefcase" style="margin-right: 8px;"></i>
                    <?php echo e(__('translate.Dashboard Partner')); ?>

                </a>
            <?php else: ?>
                <a class="tg-btn-partner-offcanvas" href="<?php echo e(route('agency.registration')); ?>"
                    style="display: inline-flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 14px 28px; border-radius: 8px; font-size: 15px; font-weight: 600; white-space: nowrap; width: 100%; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">
                    <i class="fa-solid fa-briefcase" style="margin-right: 8px;"></i>
                    <?php echo e(__('translate.Become Partner')); ?>

                </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="offCanvas__social-icon mt-30">
        <?php if($footer->facebook): ?>
            <a href="<?php echo e($footer->facebook); ?>"><i class="fab fa-facebook-f"></i></a>
        <?php endif; ?>
        <?php if($footer->twitter): ?>
            <a href="<?php echo e($footer->twitter); ?>"><i class="fab fa-twitter"></i></a>
        <?php endif; ?>
        <?php if($footer->instagram): ?>
            <a href="<?php echo e($footer->instagram); ?>"><i class="fab fa-instagram"></i></a>
        <?php endif; ?>
        <?php if($footer->linkedin): ?>
            <a href="<?php echo e($footer->linkedin); ?>"><i class="fab fa-linkedin-in"></i></a>
        <?php endif; ?>
        <?php if($footer->youtube): ?>
            <a href="<?php echo e($footer->youtube); ?>"><i class="fab fa-youtube"></i></a>
        <?php endif; ?>
    </div>
</div>
<style>
    .tg-btn-partner-offcanvas:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5) !important;
    }

    .tg-btn-partner-offcanvas:active {
        transform: translateY(0);
    }
    
    .modern-select-offcanvas {
        width: 100%;
        padding: 10px 15px;
        border: 2px solid #e8ecf4;
        border-radius: 8px;
        background: #f8f9fa;
        font-size: 14px;
        font-weight: 500;
        color: #2d3436;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .modern-select-offcanvas:hover, .modern-select-offcanvas:focus {
        border-color: #be3144;
        outline: none;
    }
</style>
<div class="offCanvas__overly"></div>
<!-- offCanvas-menu-end -->
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme3/views/components/common_offcanvas.blade.php ENDPATH**/ ?>