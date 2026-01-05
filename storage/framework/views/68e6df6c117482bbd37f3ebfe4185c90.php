<?php
    $theme7_destination = getContent('theme7_destination.content', true);
    $home7_destination_items = popularDestinations(8, false);
?>

<!-- tg-location-area-start -->
<div class="tg-location-area pt-135 pb-130 tg-grey-bg p-relative z-index-1">
    <img class="tg-location-shape d-none d-xl-block" src="<?php echo e(asset('frontend/assets/img/shape/tower.png')); ?>"
        alt="">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-40">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                        <?php echo e(getTranslatedValue($theme7_destination, 'sub_title')); ?>

                    </h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s">
                        <?php echo strip_tags(clean(getTranslatedValue($theme7_destination, 'title')), '<br>'); ?>

                    </h2>
                </div>
            </div>

            <?php if(getTranslatedValue($theme7_destination, 'show_navigation') == '1'): ?>
                <div class="col-lg-3">
                    <div class="tg-listing-5-slider-navigation text-end mb-50 wow fadeInUp" data-wow-delay=".4s"
                        data-wow-duration="1s">
                        <button class="tg-listing-5-slide-prev"><i class="fa-solid fa-arrow-left-long"></i></button>
                        <button class="tg-listing-5-slide-next"><i class="fa-solid fa-arrow-right-long"></i></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if($home7_destination_items != null && $home7_destination_items->count() > 0): ?>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container tg-location-5-slider p-relative fix">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $home7_destination_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $destination_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="tg-location-5-wrap p-relative">
                                        <div class="tg-location-5-thumb bg-white p-relative rounded-circale">

                                            <img class="w-100"
                                                src="<?php echo e(asset('storage/' . $destination_item->image)); ?>"
                                                alt="<?php echo e($destination_item->name); ?>">

                                            <span class="tg-location-5-bottom-bg"></span>
                                            <div class="tg-location-5-inner p-absolute">
                                                <div class="tg-location-5-content text-center">
                                                    <h4 class="mb-0 lh-1">
                                                        <a
                                                            href="<?php echo e(route('front.tourbooking.services', ['destination_id' => $destination_item->id, 'destination' => $destination_item->name])); ?>">
                                                            <?php echo e($destination_item->name); ?>

                                                        </a>
                                                    </h4>
                                                    <span>
                                                        <?php echo e($destination_item->services_count); ?>

                                                        <?php echo e($destination_item->services_count > 1 ? __('translate.Tours') : __('translate.Tour')); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- tg-location-area-end -->

<?php $__env->startPush('style_section'); ?>
    <style>
        .tg-location-5-thumb {
            
            height: 270px;
            width: 270px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme7/views/components/destination.blade.php ENDPATH**/ ?>