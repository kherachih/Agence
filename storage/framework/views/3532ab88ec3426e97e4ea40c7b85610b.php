<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Bookings list')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Bookings list')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Bookings list')); ?> >> <?php echo e(__('translate.Bookings list')); ?></p>
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
                                    <div
                                        class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                        <h4 class="crancy-product-card__title"><?php echo e(__('translate.My bookings')); ?></h4>
                                    </div>
                                </div>

                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <thead class="crancy-table__head">
                                            <tr>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Booking Code')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Service Title')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Total Amount')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Location')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Status')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        #<?php echo e($booking->booking_code ?? 'N/A'); ?></td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e(Str::limit($booking->service->title, 50)); ?>

                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e(currency($booking->total)); ?>

                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e($booking?->service?->location ?? 'N/A'); ?>

                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <span
                                                            class="crancy-badge crancy-table__status--paid"><?php echo e($booking->booking_status); ?></span>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="<?php echo e(route('user.bookings.details', ['id' => $booking->id])); ?>"
                                                            class="crancy-action__btn crancy-action__edit crancy-btn"><i
                                                                class="fas fa-eye"></i>
                                                            <?php echo e(__('translate.Details')); ?>

                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/user/booking/index.blade.php ENDPATH**/ ?>