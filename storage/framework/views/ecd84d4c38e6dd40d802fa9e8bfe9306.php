<?php
    $home2_why_choose = getContent('theme2_why_choose.content', true);
    $translatedSlides = getTranslatedSlides($home2_why_choose, 'slides');
?>

<?php if($home2_why_choose): ?>
    <!-- tg-chose-area-start -->
    <div class="tg-chose-area pt-135 pb-120 p-relative z-index-9">
        <img class="tg-chose-2-shape d-none d-lg-block" src="<?php echo e(asset('frontend/assets/img/shape/brige.png')); ?>" alt="shape">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tg-chose-section-title text-center mb-30">
                        <h5 class="tg-section-subtitle wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".6s">
                            <?php echo e(getTranslatedValue($home2_why_choose, 'sub_title')); ?>

                        </h5>
                        <h2 class="mb-15 wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".7s">
                            <?php echo e(getTranslatedValue($home2_why_choose, 'title')); ?>

                        </h2>
                        <p class="text-capitalize wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".8s">
                            <?php echo strip_tags(clean(getTranslatedValue($home2_why_choose, 'description')), '<br>'); ?>

                        </p>
                    </div>
                </div>
            </div>
            <?php if(count($translatedSlides) > 0): ?>
                <div class="row">
                    <?php $__currentLoopData = $translatedSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $delay = 0.4 + $key * 0.2;

                            if ($key == 0) {
                                $imageFade = 'fadeInLeft';
                                $boxFade = 'fadeInUp';
                            } elseif ($key == 1) {
                                $imageFade = 'fadeInRight';
                                $boxFade = 'fadeInLeft';
                            } elseif ($key == 2) {
                                $imageFade = 'fadeInUp';
                                $boxFade = 'fadeInRight';
                            } else {
                                $imageFade = 'fadeInLeft';
                                $boxFade = 'fadeInUp';
                            }

                        ?>

                        <div class="col-lg-4 col-md-6 col-sm-6 mb-25">
                            <div class="tg-chose-2-thumb h-100 wow <?php echo e($imageFade); ?>"
                                data-wow-delay="<?php echo e($delay); ?>s" data-wow-duration=".6s">
                                <img class="w-100 h-100" src="<?php echo e(asset($slide['image'])); ?>" alt="chose">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 mb-25">
                            <div class="tg-chose-2-content p-relative text-center z-index-1 wow <?php echo e($boxFade); ?>"
                                data-wow-delay="<?php echo e($delay); ?>s" data-wow-duration=".6s">
                                <img class="tg-chose-2-box-shape"
                                    src="<?php echo e(asset('frontend/assets/img/shape/star-4.png')); ?>" alt="shape">

                                <?php if(isset($slide['icon'])): ?>
                                    <div class="tg-chose-2-icon mb-20">
                                        <img src="<?php echo e(asset($slide['icon'])); ?>" alt="icon">
                                    </div>
                                <?php endif; ?>
                                <h4 class="tg-chose-2-title mb-15">
                                    <a href="<?php echo e($slide['link'] ?? '#'); ?>">
                                        <?php echo e($slide['title']); ?>

                                    </a>
                                </h4>
                                <?php if(isset($slide['description'])): ?>
                                    <p><?php echo e($slide['description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- tg-chose-area-end -->
<?php endif; ?>

<?php $__env->startPush('style_section'); ?>
    <style>
        .tg-chose-2-icon img {
            width: 65px;
            height: 65px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme2/views/components/why-choose.blade.php ENDPATH**/ ?>