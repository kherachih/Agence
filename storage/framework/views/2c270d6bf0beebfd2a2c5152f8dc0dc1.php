
<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Quote Request Details')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Quote Request Details')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage')); ?> >> <?php echo e(__('translate.Quote Requests')); ?> >>
        <?php echo e(__('translate.Details')); ?>

    </p>
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
                                    <div class="crancy-header__form crancy-header__form--customer">
                                        <h4 class="crancy-product-card__title"><?php echo e(__('translate.Request Information')); ?>

                                        </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th><?php echo e(__('translate.Name')); ?></th>
                                            <td><?php echo e($quote->first_name); ?> <?php echo e($quote->last_name); ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo e(__('translate.Email')); ?></th>
                                            <td><?php echo e($quote->email); ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo e(__('translate.Phone')); ?></th>
                                            <td><a href="tel:<?php echo e($quote->phone); ?>"><?php echo e($quote->phone); ?></a></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo e(__('translate.Service')); ?></th>
                                            <td>
                                                <?php if($quote->service): ?>
                                                    <a href="<?php echo e(route('front.tourbooking.services.show', $quote->service->slug)); ?>"
                                                        target="_blank">
                                                        <?php echo e($quote->service->translation?->title); ?>

                                                    </a>
                                                <?php else: ?>
                                                    N/A
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo e(__('translate.Adults')); ?></th>
                                            <td><?php echo e($quote->adults); ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo e(__('translate.Children')); ?></th>
                                            <td><?php echo e($quote->children); ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo e(__('translate.Room Details / Message')); ?></th>
                                            <td><?php echo e($quote->room_details); ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo e(__('translate.Date')); ?></th>
                                            <td><?php echo e($quote->created_at->format('d M Y, h:i A')); ?></td>
                                        </tr>
                                    </table>

                                    <div class="mt-4">
                                        <h4 class="mb-3"><?php echo e(__('translate.Send Quote via Email')); ?></h4>
                                        <form action="<?php echo e(route('admin.quote-requests.send', $quote->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="price_adult"
                                                        class="form-label"><?php echo e(__('translate.Price per Adult')); ?></label>
                                                    <input type="text" name="price_adult" id="price_adult"
                                                        class="form-control" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="children_price"
                                                        class="form-label"><?php echo e(__('translate.Price per Child')); ?></label>
                                                    <input type="text" name="children_price" id="children_price"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="rooms"
                                                        class="form-label"><?php echo e(__('translate.Number of Rooms')); ?></label>
                                                    <input type="text" name="rooms" id="rooms" class="form-control"
                                                        required>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="message"
                                                        class="form-label"><?php echo e(__('translate.Room Details / Message')); ?></label>
                                                    <textarea name="message" id="message" rows="5" class="form-control"
                                                        required><?php echo e($quote->room_details); ?></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit"
                                                        class="crancy-btn"><?php echo e(__('translate.Send Quote')); ?></button>
                                                    <a href="<?php echo e(route('admin.quote-requests.index')); ?>"
                                                        class="crancy-btn crancy-btn--gray"><?php echo e(__('translate.Back to List')); ?></a>
                                                </div>
                                            </div>
                                        </form>
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
<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/quote_requests/show.blade.php ENDPATH**/ ?>