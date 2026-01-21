<?php
    $theme3_destination = getContent('theme3_destination.content', true);
    $home3_destination_items = popularDestinations(5, false);
?>

<!-- tg-location-area-start -->
<div class="tg-location-area p-relative z-index-1 pb-65 pt-120">
    <div class="tg-location-su-bg">
        <img src="<?php echo e(asset('frontend/assets/img/shape/map-bg.png')); ?>" alt="">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-30">
                    <h5 class="tg-section-su-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                        <?php echo e(getTranslatedValue($theme3_destination, 'sub_title')); ?>

                    </h5>
                    <h2 class="tg-section-su-title text-capitalize wow fadeInUp" data-wow-delay=".5s"
                        data-wow-duration=".9s">
                        <?php echo e(getTranslatedValue($theme3_destination, 'title')); ?>

                    </h2>
                </div>
            </div>
            <?php if(getTranslatedValue($theme3_destination, 'show_navigation') == '1'): ?>
                <div class="col-lg-3">
                    <div class="tg-listing-5-slider-navigation tg-location-su-slider-navigation text-end mb-30 wow fadeInUp"
                        data-wow-delay=".4s" data-wow-duration="1s">
                        <button class="tg-listing-5-slide-prev"><i class="fa-solid fa-arrow-left-long"></i></button>
                        <button class="tg-listing-5-slide-next"><i class="fa-solid fa-arrow-right-long"></i></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if($home3_destination_items->count() > 0): ?>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container tg-location-su-slider">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $home3_destination_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $destination_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="tg-location-3-wrap  tg-location-su-wrap  p-relative mb-30 tg-round-25">
                                        <div class="tg-location-thumb tg-round-25">
                                            <img class="w-100 tg-round-25"
                                                src="<?php echo e(asset('storage/' . $destination_item->image)); ?>"
                                                alt="<?php echo e($destination_item->name); ?>">
                                        </div>
                                        <div class="tg-location-content tg-location-su-content">
                                            <div class="content">
                                                <h3 class="tg-location-title mb-5">
                                                    <a
                                                        href="<?php echo e(route('front.tourbooking.services', ['destination_id' => $destination_item->id, 'destination' => $destination_item->name])); ?>">
                                                        <?php echo e($destination_item->name); ?>

                                                    </a>
                                                </h3>
                                                <?php if($destination_item->tags): ?>
                                                    <span class="tg-location-su-duration">
                                                        <?php echo e(Str::limit($destination_item->tags, 20)); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <a class="icons"
                                                href="<?php echo e(route('front.tourbooking.services', ['destination_id' => $destination_item->id, 'destination' => $destination_item->name])); ?>">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 13.0969L13.0969 2M13.0969 2H2M13.0969 2V13.0969"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
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
        .tg-location-su-wrap .tg-location-thumb img {
            height: 325px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme3/views/components/destination.blade.php ENDPATH**/ ?>