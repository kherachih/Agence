<div class="tg-breadcrumb-area tg-breadcrumb-spacing-5 fix p-relative z-index-1 include-bg"
    data-background="<?php echo e(asset($general_setting->breadcrumb_image)); ?>">
    <div class="tg-hero-top-shadow"></div>
    <div class="tg-breadcrumb-shadow"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tg-breadcrumb-content text-center">
                    <h2 class="tg-breadcrumb-title mb-10 fs-40"><?php echo e($breadcrumb_title); ?></h2>
                    <div class="tg-breadcrumb-list-4">
                        <ul>
                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('translate.Home')); ?></a></li>
                            <li><i class="fa-sharp fa-solid fa-angle-right"></i></li>
                            <li><?php echo e($breadcrumb_title); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-hero-bottom-shape d-none d-md-block">
        <span>
          <?php echo $__env->make('svg.breadcrumb_shape1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </span>
    </div>
    <div class="tg-hero-bottom-shape-2 d-none d-md-block">
        <span>
          <?php echo $__env->make('svg.breadcrumb_shape2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </span>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/breadcrumb.blade.php ENDPATH**/ ?>