<?php
    $theme7_counter = getContent('theme7_counter.content', true);
    $translatedSlides = getTranslatedSlides($theme7_counter, 'slides');
?>

<?php if(count($translatedSlides) > 0): ?>

    <!-- tg-counter-area-start -->
    <div class="tg-counter-area tg-counter-5-border pb-65 pt-95">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $translatedSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-6  mb-30">
                        <div class="tg-counter-item d-flex align-items-center">
                            <span class="tg-counter-icon d-inline-block mr-20">
                                <?php if(isset($slide['icon'])): ?>
                                    <img src="<?php echo e(asset($slide['icon'])); ?>" alt="">
                                <?php endif; ?>
                            </span>
                            <div class="tg-counter-content p-relative">
                                <h2 class="tg-counter-title count"><span class="odometer"
                                        data-count="<?php echo e($slide['number']); ?>"></span><?php echo e($slide['number_suffix']); ?></h2>
                                <span class="tg-counter-subtitle"><?php echo e($slide['title']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- tg-counter-area-end -->

<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme7/views/components/counter.blade.php ENDPATH**/ ?>