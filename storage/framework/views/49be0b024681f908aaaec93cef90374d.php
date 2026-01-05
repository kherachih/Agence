<?php
    $theme5_cta = getContent('theme5_cta.content', true);
?>

<?php if(!empty($theme5_cta)): ?>
    <!-- tg-cta-area-start -->
    <div class="tg-cta-area-area tg-primary-bg p-relative z-index-1">
        <img class="tg-cta-3-shape-2 d-none d-md-block" src="<?php echo e(asset('frontend/assets/img/shape/stadium-2.png')); ?>" alt="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="tg-cta-3-thumb p-relative z-index-1  pt-85 ">
                        <img class="w-100" src="<?php echo e(asset(getSingleImage($theme5_cta, 'image'))); ?>" alt="">
                        <img class="tg-cta-3-shape rotate-infinite" src="<?php echo e(asset('frontend/assets/img/shape/star-6.png')); ?>" alt="shape">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="tg-cta-3-content mb-20 pt-15">
                        <h2 class="mb-15 tg-cta-title text-white text-capitalize mb-5">
                            <?php echo strip_tags(clean(getTranslatedValue($theme5_cta, 'title')), '<br>'); ?>

                        </h2>
                        <p class="text-white">
                            <?php echo e(getTranslatedValue($theme5_cta, 'sub_title')); ?>

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="tg-cta-3-apps pt-15 d-flex align-items-center">

                        <a class="mb-10 d-inline-block mr-5"
                            href="<?php echo e(getTranslatedValue($theme5_cta, 'google_play_link')); ?>">
                            <img src="<?php echo e(asset('frontend/assets/img/shape/google.png')); ?>" alt=""></a>

                        <a class="mb-10 d-inline-block"
                            href="<?php echo e(getTranslatedValue($theme5_cta, 'apple_store_link')); ?>">
                            <img src="<?php echo e(asset('frontend/assets/img/shape/app.png')); ?>" alt="">
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tg-cta-area-end -->
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme5/views/components/cta.blade.php ENDPATH**/ ?>