<?php
    $home2_hero = getContent('theme2_hero.content', true);
?>

<?php if($home2_hero): ?>
    <!-- tg-hero-area-start -->
    <div class="tg-hero-area tg-grey-bg">
        <div class="container-fluid container-1630">
            <div class="row">
                <div class="col-12">
                    <div class="tg-hero-2-content include-bg text-center"
                        data-background="<?php echo e(asset(getSingleImage($home2_hero, 'background_image'))); ?>">
                        <h2 class="tg-hero-2-title">
                            <?php echo e(getTranslatedValue($home2_hero, 'title')); ?>

                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tg-hero-area-end -->
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme2/views/components/hero.blade.php ENDPATH**/ ?>