<?php
    $theme6_destination = getContent('theme6_destination.content', true);
    $home6_destination_items = popularDestinations(4, false);
?>

<!-- tg-location-area-start -->
<div class="tg-location-area p-relative pb-60 pt-140">
    <img class="tg-location-shape tg-location-4-shape d-none d-lg-block"
        src="<?php echo e(asset('frontend/assets/img/shape/tower.png')); ?>" alt="shape">
    <div class="container">
        <div class="row">
            <div class="row align-items-end">
                <div class="col-lg-9">
                    <div class="tg-location-section-title mb-40">
                        <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                            <?php echo e(getTranslatedValue($theme6_destination, 'sub_title')); ?>

                        </h5>
                        <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s">
                            <?php echo strip_tags(clean(getTranslatedValue($theme6_destination, 'title')), '<br>'); ?>

                        </h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="tg-location-3-btn text-end wow fadeInUp mb-40" data-wow-delay=".6s"
                        data-wow-duration=".9s">
                        <a href="<?php echo e(getTranslatedValue($theme6_destination, 'button_url')); ?>"
                            class="tg-btn tg-btn-gray tg-btn-switch-animation">
                            <span class="d-flex align-items-center justify-content-center">
                                <span
                                    class="btn-text"><?php echo e(getTranslatedValue($theme6_destination, 'button_text')); ?></span>
                                <span class="btn-icon ml-5">
                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749"
                                            stroke="currentColor" stroke-width="1.77778" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="btn-icon ml-5">
                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749"
                                            stroke="currentColor" stroke-width="1.77778" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <?php if($home6_destination_items != null && $home6_destination_items->count() > 0): ?>
                <?php $__currentLoopData = $home6_destination_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $destination_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".9s">
                        <div class="bg-white tg-round-25 p-relative z-index-1">
                            <div class="tg-location-wrap p-relative mb-30">
                                <div class="tg-location-thumb">
                                    <img class="w-100"
                                        src="<?php echo e(asset('storage/' . $destination_item->image)); ?>"
                                        alt="<?php echo e($destination_item->name); ?>">
                                </div>
                                <div class="tg-location-content text-center">

                                    <span class="tg-location-time">
                                        <?php echo e($destination_item->services_count); ?>

                                        <?php echo e($destination_item->services_count > 1 ? __('translate.Tours') : __('translate.Tour')); ?></span>

                                    <h3 class="tg-location-title mb-0">
                                        <a
                                            href="<?php echo e(route('front.tourbooking.services', ['destination_id' => $destination_item->id, 'destination' => $destination_item->name])); ?>">
                                            <?php echo e($destination_item->name); ?>

                                        </a>
                                    </h3>
                                </div>
                                <div class="tg-location-border one"></div>
                                <div class="tg-location-border two"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- tg-location-area-end -->

<?php $__env->startPush('style_section'); ?>
    <style>
        .tg-location-thumb {
            height: 245px;
        }
        .tg-location-thumb img {
            height: 100%;
            object-fit: cover;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme6/views/components/destination.blade.php ENDPATH**/ ?>