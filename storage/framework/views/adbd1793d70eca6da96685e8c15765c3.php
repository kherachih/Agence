<?php
$activePromotion = \App\Models\Promotion::active()->ordered()->first();
?>

<?php if($activePromotion): ?>
<div class="tg-promotion-bar" style="background-color: <?php echo e($activePromotion->background_color ?? '#dc3545'); ?>; color: <?php echo e($activePromotion->text_color ?? '#ffffff'); ?>;">
    <?php if($activePromotion->link_url): ?>
    <a href="<?php echo e($activePromotion->link_url); ?>" class="tg-promotion-bar__link"></a>
    <?php endif; ?>
    <div class="tg-promotion-bar__content">
        <span class="tg-promotion-bar__message"><?php echo e($activePromotion->message); ?></span>
        <?php if($activePromotion->link_text): ?>
        <span class="tg-promotion-bar__cta"><?php echo e($activePromotion->link_text); ?> <i class="fa-solid fa-arrow-right"></i></span>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<?php $__env->startPush('style_section'); ?>
<style>
/* ============================================
   PROMOTION BAR - CENTERED STATIC STYLE
   ============================================ */
.tg-promotion-bar {
    width: 100%;
    padding: 12px 20px;
    font-size: 14px;
    font-weight: 500;
    position: relative;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background-color: #dc3545 !important;
    color: #ffffff !important;
}

.tg-promotion-bar__link {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10000;
}

.tg-promotion-bar__content {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
    position: relative;
    z-index: 10001;
}

.tg-promotion-bar__message {
    display: inline-block;
}

.tg-promotion-bar__cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.2);
    padding: 4px 12px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 13px;
    white-space: nowrap;
    transition: background 0.3s ease;
}

.tg-promotion-bar:hover .tg-promotion-bar__cta {
    background: rgba(255, 255, 255, 0.3);
}

.tg-promotion-bar__cta i {
    font-size: 12px;
    transition: transform 0.3s ease;
}

.tg-promotion-bar:hover .tg-promotion-bar__cta i {
    transform: translateX(3px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .tg-promotion-bar {
        font-size: 12px;
        padding: 10px 15px;
    }

    .tg-promotion-bar__content {
        gap: 10px;
    }

    .tg-promotion-bar__cta {
        font-size: 11px;
        padding: 3px 10px;
    }
}

@media (max-width: 480px) {
    .tg-promotion-bar {
        font-size: 11px;
        padding: 8px 10px;
    }

    .tg-promotion-bar__cta {
        font-size: 10px;
        padding: 2px 8px;
    }
}
</style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/components/promotion-bar.blade.php ENDPATH**/ ?>