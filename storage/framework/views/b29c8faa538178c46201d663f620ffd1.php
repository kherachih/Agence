<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Theme Details')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Theme Details')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Themes')); ?> >> <?php echo e(ucfirst($theme)); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="crancy-theme-detail">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="crancy-theme-detail__img">
                                                    <img src="<?php echo e($screenshot); ?>" alt="<?php echo e($themeInfo['name'] ?? ucfirst($theme)); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="crancy-theme-detail__content">
                                                    <div class="crancy-theme-detail__head">
                                                        <h3 class="crancy-theme-detail__title"><?php echo e($themeInfo['name'] ?? ucfirst($theme)); ?></h3>
                                                        <?php if(Theme::getActive() == $theme): ?>
                                                            <span class="crancy-badge crancy-badge__success"><?php echo e(__('translate.Active')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <p class="crancy-theme-detail__desc"><?php echo e($themeInfo['description'] ?? 'No description available'); ?></p>
                                                    
                                                    <div class="crancy-theme-detail__meta">
                                                        <div class="crancy-theme-detail__meta-item">
                                                            <span class="crancy-theme-detail__meta-label"><?php echo e(__('translate.Version')); ?>:</span>
                                                            <span class="crancy-theme-detail__meta-value"><?php echo e($themeInfo['version'] ?? '1.0.0'); ?></span>
                                                        </div>
                                                        <div class="crancy-theme-detail__meta-item">
                                                            <span class="crancy-theme-detail__meta-label"><?php echo e(__('translate.Author')); ?>:</span>
                                                            <span class="crancy-theme-detail__meta-value"><?php echo e($themeInfo['author'] ?? 'Unknown'); ?></span>
                                                        </div>
                                                        <?php if(isset($themeInfo['url']) && $themeInfo['url']): ?>
                                                            <div class="crancy-theme-detail__meta-item">
                                                                <span class="crancy-theme-detail__meta-label"><?php echo e(__('translate.Website')); ?>:</span>
                                                                <a href="<?php echo e($themeInfo['url']); ?>" target="_blank" class="crancy-theme-detail__meta-value"><?php echo e($themeInfo['url']); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                    <div class="crancy-theme-detail__actions mg-top-30">
                                                        <?php if(Theme::getActive() != $theme): ?>
                                                            <form action="<?php echo e(route('admin.themes.activate', $theme)); ?>" method="POST" class="d-inline">
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit" class="crancy-btn crancy-btn__md"><?php echo e(__('translate.Activate Theme')); ?></button>
                                                            </form>
                                                            
                                                            <form action="<?php echo e(route('admin.themes.destroy', $theme)); ?>" method="POST" class="d-inline theme-delete-form">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="crancy-btn crancy-btn__md crancy-btn__red"><?php echo e(__('translate.Delete Theme')); ?></button>
                                                            </form>
                                                        <?php endif; ?>
                                                        
                                                        <a href="<?php echo e(route('admin.themes.index')); ?>" class="crancy-btn crancy-btn__md crancy-btn__secondary"><?php echo e(__('translate.Back to Themes')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php if(isset($themeInfo['required_plugins']) && count($themeInfo['required_plugins']) > 0): ?>
                                            <div class="crancy-theme-requirements mg-top-40">
                                                <h4 class="crancy-theme-requirements__title"><?php echo e(__('translate.Required Plugins')); ?></h4>
                                                <div class="crancy-theme-requirements__list">
                                                    <ul>
                                                        <?php $__currentLoopData = $themeInfo['required_plugins']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($plugin); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
<script>
    (function($) {
        "use strict";
        
        $(document).ready(function() {
            // Confirm before deleting a theme
            $('.theme-delete-form').on('submit', function(e) {
                e.preventDefault();
                
                if (confirm("Are you sure you want to delete this theme? This action cannot be undone.")) {
                    this.submit();
                }
            });
        });
    })(jQuery);
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/themes/show.blade.php ENDPATH**/ ?>