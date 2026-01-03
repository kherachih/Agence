<div class="cart-item-wrapper">
    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="cart-content-wrap d-flex align-items-center justify-content-between">
            <div class="cart-img-info d-flex align-items-center">
                <div class="cart-thumb">
                    <a href="shop.html"> <img src="<?php echo e(asset($item['image'] ?? '')); ?>" alt=""></a>
                </div>
                <div class="cart-content">
                    <h5 class="cart-title"><a href="<?php echo e(route('product.view', $item['slug'])); ?>"><?php echo e($item['title']); ?></a>
                    </h5>
                    <span> <?php echo $item['price_display']; ?> </span>
                </div>
            </div>
            <div class="cart-del-icon" onclick="removeFromCart(<?php echo e($item['cart_id']); ?>)">
                <span><i class="fa-light fa-trash-can"></i></span>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-center"><?php echo e(__('translate.Cart is empty')); ?></div>
    <?php endif; ?>
</div>

<div class="cart-total-price d-flex align-items-center justify-content-between">
    <span><?php echo e(__('translate.Total')); ?>:</span>
    <span><?php echo e(currency($total)); ?></span>
</div>
<div class="minicart-btn">
    <a class="cart-btn mb-10" href="<?php echo e(route('cart.cart')); ?>"><span><?php echo e(__('translate.Shopping Cart')); ?></span></a>
    <a class="cart-btn cart-btn-black"
        href="<?php echo e(route('checkout.index')); ?>"><span><?php echo e(__('translate.Checkout')); ?></span></a>
</div>
<?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/components/cart-item.blade.php ENDPATH**/ ?>