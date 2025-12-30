    <!-- offCanvas-menu -->
    <div class="offCanvas__info">
        <div class="offCanvas__close-icon menu-close">
            <button><i class="fa-sharp fa-regular fa-xmark"></i></button>
        </div>
        <div class="offCanvas__logo mb-30">
            <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($general_setting?->secondary_logo)); ?>"
                    alt="Logo"></a>
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
    <div class="offCanvas__overly"></div>
    <!-- offCanvas-menu-end -->
<?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/components/common_offcanvas.blade.php ENDPATH**/ ?>