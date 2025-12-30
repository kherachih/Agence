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