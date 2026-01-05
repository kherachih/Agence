<?php
    $home2_destination = getContent('theme2_destination.content', true);
    $home2_destination_items = popularDestinations();
?>

<!-- tg-destination-area-start -->
<div class="tg-destination-area pt-135 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tg-destination-section-title text-center mb-40">
                    <h5 class="tg-section-subtitle wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".6s">
                        <?php echo e(getTranslatedValue($home2_destination, 'sub_title')); ?>

                    </h5>
                    <h2 class="mb-15 wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".7s">
                        <?php echo e(getTranslatedValue($home2_destination, 'title')); ?>

                    </h2>
                    <p class="text-capitalize wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".8s">
                        <?php echo strip_tags(clean(getTranslatedValue($home2_destination, 'description')), '<br>'); ?>

                    </p>
                </div>
            </div>
            <?php if($home2_destination_items->count() > 0): ?>
                <?php $__currentLoopData = $home2_destination_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $destination_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tg-destination-item mb-30 wow fadeInUp" data-wow-delay=".<?php echo e($key + 3); ?>s"
                            data-wow-duration=".6s">
                            <div class="tg-destination-thumb fix p-relative">
                                <img class="w-100"
                                    src="<?php echo e(asset('storage/' . $destination_item->image)); ?>"
                                    alt="<?php echo e($destination_item->name); ?>">
                                <div class="tg-listing-2-mask">
                                    <img class="w-100"
                                        src="<?php echo e(asset('frontend/assets/img/shape/destination-shape.png')); ?>">
                                </div>
                            </div>
                            <div class="tg-destination-content text-center">
                                <div class="tg-destination-meta">
                                    <a
                                        href="<?php echo e(route('front.tourbooking.services', ['destination_id' => $destination_item->id, 'destination' => $destination_item->name])); ?>"><?php echo e($destination_item->name); ?></a>
                                </div>
                                <?php if($destination_item->tags): ?>
                                    <div class="tg-destination-tag">
                                        <?php $__currentLoopData = explode(',', $destination_item->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span><?php echo e($tag); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- tg-destination-area-end -->

<?php $__env->startPush('style_section'); ?>
    <style>
        .tg-destination-thumb {
            height: 203px;
        }

        .tg-listing-card-thumb {
            height: 180px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme2/views/components/destination.blade.php ENDPATH**/ ?>