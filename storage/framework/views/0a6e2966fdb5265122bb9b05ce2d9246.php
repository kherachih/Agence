
<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Quote Requests')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Quote Requests')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage')); ?> >> <?php echo e(__('translate.Quote Requests')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Quote Requests List')); ?></h4>
                                        </div>
                                    </div>
                                </div>

                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer">
                                        <thead class="crancy-table__head">
                                            <tr>
                                                <th class="crancy-table__column-2 crancy-table__h2"><?php echo e(__('translate.Serial')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2"><?php echo e(__('translate.Name')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2"><?php echo e(__('translate.Service')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2"><?php echo e(__('translate.Date')); ?></th>
                                                <th class="crancy-table__column-3 crancy-table__h3"><?php echo e(__('translate.Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            <?php $__empty_1 = true; $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e($quotes->firstItem() + $index); ?></h4>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e($quote->first_name); ?> <?php echo e($quote->last_name); ?></h4>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e($quote->service?->translation?->title ?? 'N/A'); ?></h4>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e($quote->created_at->format('d M Y')); ?></h4>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="<?php echo e(route('admin.quote-requests.show', $quote->id)); ?>" class="crancy-btn"><i class="fas fa-eye"></i> <?php echo e(__('translate.View')); ?></a>
                                                        
                                                        <form action="<?php echo e(route('admin.quote-requests.destroy', $quote->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('<?php echo e(__('translate.Are you sure?')); ?>')">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button class="crancy-btn delete_danger_btn"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="5" class="text-center"><?php echo e(__('translate.No quote requests found')); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <div class="crancy-table-bottom">
                                        <div class="dataTables_paginate">
                                            <?php echo e($quotes->links()); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/quote_requests/index.blade.php ENDPATH**/ ?>