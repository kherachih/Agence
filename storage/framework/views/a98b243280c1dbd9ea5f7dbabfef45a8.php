<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Manage Themes')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Themes')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage & Update Themes')); ?></p>
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
                                    <div class="crancy-notice__inner crancy-notice__inner--admin mg-top-20">
                                        <div class="crancy-notice__content">
                                            <h3 class="crancy-notice__title"><?php echo e(__('translate.Themes Management')); ?></h3>
                                            <p class="crancy-notice__text">
                                                <?php echo e(__('translate.Manage and update your website themes')); ?></p>
                                            <div class="crancy-btn-group mg-top-20">
                                                <a href="<?php echo e(route('admin.themes.create')); ?>"
                                                    class="crancy-btn crancy-btn__icon">
                                                    <span class="crancy-btn__icon-circle">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 4V20M20 12H4" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                    <?php echo e(__('translate.Create Theme')); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mg-top-30">
                                <?php if(count($themes) > 0): ?>
                                    <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme_name => $theme_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="crancy-theme-card bg-white crancy-shadow mb-4 br-4">
                                                <div class="crancy-theme-card__img">
                                                    <?php if(file_exists(public_path('backend/img/theme/' . $theme_name . '.png'))): ?>
                                                        <img src="<?php echo e(asset('backend/img/theme/' . $theme_name . '.png')); ?>"
                                                            alt="<?php echo e($theme_info['name'] ?? $theme_name); ?>">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('backend/img/placeholder-image.jpg')); ?>"
                                                            alt="<?php echo e($theme_info['name'] ?? $theme_name); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="crancy-theme-card__content p-4">
                                                    <div class="crancy-theme-card__head">
                                                        <h4 class="crancy-theme-card__title">
                                                            <?php echo e($theme_info['name'] ?? ucfirst($theme_name)); ?></h4>
                                                        <?php if($active_theme == $theme_name): ?>
                                                            <span
                                                                class="crancy-badge crancy-badge__success"><?php echo e(__('translate.Active')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <p class="crancy-theme-card__text">
                                                        <?php echo e($theme_info['description'] ?? 'No description available'); ?></p>
                                                    <div class="crancy-theme-card__meta">
                                                        <span><?php echo e(__('translate.Version')); ?>:
                                                            <?php echo e($theme_info['version'] ?? '1.0.0'); ?></span>
                                                        <span><?php echo e(__('translate.Author')); ?>:
                                                            <?php echo e($theme_info['author'] ?? 'Unknown'); ?></span>
                                                    </div>
                                                    <div class="crancy-theme-card__btn mt-3 d-flex gap-3">
                                                        <a href="<?php echo e(route('admin.themes.show', $theme_name)); ?>"
                                                            class="crancy-btn crancy-btn__sm crancy-btn__secondary"><?php echo e(__('translate.Details')); ?></a>

                                                        <?php if($active_theme != $theme_name): ?>
                                                            <div>
                                                                <form
                                                                    action="<?php echo e(route('admin.themes.activate', $theme_name)); ?>"
                                                                    method="POST" class="d-inline">
                                                                    <?php echo csrf_field(); ?>
                                                                    <button type="submit"
                                                                        class="crancy-btn crancy-btn__sm"><?php echo e(__('translate.Activate')); ?></button>
                                                                </form>
                                                            </div>

                                                            <div>
                                                                <form
                                                                    action="<?php echo e(route('admin.themes.destroy', $theme_name)); ?>"
                                                                    method="POST" class="d-inline theme-delete-form">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button type="submit"
                                                                        class="crancy-btn crancy-btn__sm crancy-btn__red"><?php echo e(__('translate.Delete')); ?></button>
                                                                </form>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="col-12">
                                        <div class="crancy-empty-state">
                                            <div class="crancy-empty-state__img">
                                                <img src="<?php echo e(asset('backend/images/empty-themes.svg')); ?>" alt="No Themes">
                                            </div>
                                            <h3 class="crancy-empty-state__title"><?php echo e(__('translate.No Themes Found')); ?>

                                            </h3>
                                            <p class="crancy-empty-state__text">
                                                <?php echo e(__('translate.You have not created any themes yet. Click the button below to create your first theme.')); ?>

                                            </p>
                                            <a href="<?php echo e(route('admin.themes.create')); ?>"
                                                class="crancy-btn crancy-btn__md"><?php echo e(__('translate.Create Theme')); ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
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

                    if (confirm(
                            "Are you sure you want to delete this theme? This action cannot be undone."
                        )) {
                        this.submit();
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/themes/index.blade.php ENDPATH**/ ?>