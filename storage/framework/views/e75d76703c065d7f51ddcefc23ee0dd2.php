<?php $__env->startSection('title'); ?>
    <title><?php echo e($general_setting->app_name); ?> || <?php echo e(__('translate.404 Error Page')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('front-content'); ?>
    <?php echo $__env->make('breadcrumb', ['breadcrumb_title' => __('translate.404 Error Page')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- tg-error-area-start -->
    <div class="tg-error-area-start tg-error-spacing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <div class="tg-error-content text-center">
                        <img class="mb-40" src="<?php echo e(asset( $general_setting->not_found ? $general_setting->not_found : 'frontend/assets/img/shape/not_found.png')); ?>" alt="error">
                        <h2 class="mb-15"><?php echo e(__('translate.Error Page!')); ?></h2>
                        <p class="mb-35"><?php echo e(__('translate.Sorry! This Page is Not Available!')); ?></p>
                        <div class="tg-error-btn">
                            <a class="tg-btn" href="<?php echo e(route('home')); ?>"><?php echo e(__('translate.Go Back To Home Page')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tg-error-area-end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout_inner_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/errors/404.blade.php ENDPATH**/ ?>