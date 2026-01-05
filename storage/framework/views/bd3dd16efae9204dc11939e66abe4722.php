<?php
    use Modules\Partner\App\Models\Partner;

    $partners = Partner::latest()->get();
?>

<?php if($partners->count() > 0): ?>
    <!-- brands-area-start -->
    <div class="tg-brand-area pb-115 z-index-1">
        <div class="container">
            <div class="row">
                <div class="tg-brand-wrap">
                    <div class="swiper-container tg-brand-slide fix">
                        <div class="swiper-wrapper slide-transtion">
                            <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="tg-brand-items">
                                        <a href="<?php echo e($partner?->link ?? '#'); ?>"><img src="<?php echo e($partner?->logo); ?>"
                                                alt="logo"></a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brands-area-end -->
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme6/views/components/partner.blade.php ENDPATH**/ ?>