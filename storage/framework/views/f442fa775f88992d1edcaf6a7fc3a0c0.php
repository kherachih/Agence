<?php
    $theme4_work_process = getContent('theme4_work_process.content', true);
    $translatedSlides = getTranslatedSlides($theme4_work_process, 'slides');
?>

<?php if($theme4_work_process): ?>
    <!-- tp-process-area-start -->
    <div class="tp-process-area include-bg pb-90 pt-120" data-background="<?php echo e(asset('frontend/assets/img/shape/work-bg.jpeg')); ?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="tg-process-content mb-30 wow fadeInLeft" data-wow-delay=".4s" data-wow-duration=".9s">
                        <h5 class="tg-section-su-subtitle su-subtitle-2 mb-15">
                            <?php echo e(getTranslatedValue($theme4_work_process, 'sub_title')); ?>

                        </h5>
                        <h2 class="tg-section-su-title text-capitalize mb-15">
                            <?php echo strip_tags(clean(getTranslatedValue($theme4_work_process, 'title')), '<br>'); ?>

                        </h2>
                        <p class="tg-section-su-para tg-section-su-para-2 mb-25">
                            <?php echo strip_tags(clean(getTranslatedValue($theme4_work_process, 'description')), '<br>'); ?>

                        </p>
                        <a href="<?php echo e(getTranslatedValue($theme4_work_process, 'button_url')); ?>" class="tg-btn tg-btn-transparent"><?php echo e(getTranslatedValue($theme4_work_process, 'button_text')); ?></a>
                    </div>
                </div>
                <?php if(count($translatedSlides) > 0): ?>
                    <div class="col-lg-6">
                        <div class="tg-process-list mb-10 wow fadeInRight" data-wow-delay=".4s" data-wow-duration=".9s">
                            <?php $__currentLoopData = $translatedSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tg-chose-list d-flex mb-20">
                                    <?php if(isset($slide['icon'])): ?>
                                        <span class="tg-chose-list-icon mr-20">
                                            <img src="<?php echo e(asset($slide['icon'])); ?>" alt="">
                                        </span>
                                    <?php endif; ?>
                                    <div class="tg-chose-list-content">
                                        <h4 class="tg-chose-list-title mb-5">
                                            <?php echo e($slide['title']); ?>

                                        </h4>
                                        <p>
                                            <?php echo e($slide['short_description']); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- tp-process-area-end -->
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme4/views/components/work-process.blade.php ENDPATH**/ ?>