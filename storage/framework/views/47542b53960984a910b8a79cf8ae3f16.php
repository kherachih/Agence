<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Order List')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Order List')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Order List')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

                            <div class="crancy-table crancy-table--v3 mg-top-30">

                                <div class="crancy-customer-filter">
                                    <div
                                        class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div
                                            class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Order List')); ?></h4>

                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>

                                                <?php if(Route::is('user.transactions')): ?>
                                                    <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                        <?php echo e(__('translate.Transactions ID')); ?>

                                                    </th>
                                                <?php endif; ?>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Order ID')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Date')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Total Amount')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Payment')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Order Status')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Action')); ?>

                                                </th>
                                            </tr>
                                        </thead>

                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="odd">

                                                    <?php if(Route::is('user.transactions')): ?>
                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            <a href="javascript:void(0)">
                                                                <?php echo e($order->transaction_id); ?>

                                                            </a>
                                                        </td>
                                                    <?php endif; ?>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            #<?php echo e($order?->order_id); ?></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            <?php echo e($order->created_at->format('d M, Y')); ?></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            <?php echo e(currency($order->total)); ?>

                                                        </h4>
                                                    </td>

                                                    <?php if(Route::is('user.orders')): ?>
                                                        <td>
                                                            <?php if($order->payment_status == 1): ?>
                                                                <span class="paid_btn">
                                                                    <?php echo e(__('translate.PAID')); ?>

                                                                </span>
                                                            <?php else: ?>
                                                                <span class="paid_btn unpaid_btn">
                                                                    <?php echo e(__('translate.UNPAID')); ?>

                                                                </span>
                                                            <?php endif; ?>

                                                        </td>
                                                    <?php endif; ?>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php if($order->order_status == 0): ?>
                                                            <span class="pending_status">
                                                                <?php echo e(__('translate.Pending')); ?>

                                                            </span>
                                                        <?php elseif($order->order_status == 1): ?>
                                                            <span class="pending_status completed_status">
                                                                <?php echo e(__('translate.Completed')); ?>

                                                            </span>
                                                        <?php elseif($order->order_status == 2): ?>
                                                            <span class="pending_status ">
                                                                <?php echo e(__('translate.Rejected')); ?>

                                                            </span>
                                                        <?php elseif($order->order_status == 3): ?>
                                                            <span class="pending_status completed_status">
                                                                <?php echo e(__('translate.Processing')); ?>

                                                            </span>
                                                        <?php elseif($order->order_status == 4): ?>
                                                            <span class="pending_status completed_status">
                                                                <?php echo e(__('translate.Shipped')); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="pending_status completed_status">
                                                                <?php echo e(__('translate.Completed')); ?>

                                                            </span>
                                                        <?php endif; ?>

                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="<?php echo e(route('user.order_show', $order->order_id)); ?>"
                                                            class="crancy-btn"><i class="fas fa-eye"></i>
                                                            <?php echo e(__('translate.Details')); ?></a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                        <!-- End crancy Table Body -->
                                    </table>
                                </div>
                                <!-- End crancy Table -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/user/orders.blade.php ENDPATH**/ ?>