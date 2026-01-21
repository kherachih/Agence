<div class="<?php echo e($ratingClass ?? 'tg-listing-card-review mb-10'); ?>">
    <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $star): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <i class="fa-sharp fa-solid fa-star <?php if($avgRating >= $star): ?> active <?php endif; ?>"></i>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <span class="tg-listing-rating-percent">
        (
        <?php echo e(__($ratingCount)); ?>

        <?php echo e(__($ratingCount > 1 ? __('translate.Reviews') : __('translate.Review'))); ?>

        )
    </span>
</div>

<?php $__env->startPush('style_section'); ?>
    <style>
        .tg-listing-card-review i {
            color: #9c9c9c;
        }

        .tg-listing-card-review .active {
            color: var(--tg-common-yellow);
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/front/services/ratting.blade.php ENDPATH**/ ?>