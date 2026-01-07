<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Booking Details')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Booking Details')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Booking Details')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <!-- Notification for pending passenger info -->
                            <?php if($booking->payment_status === 'completed' && $booking->passenger_info_status === 'pending'): ?>
                                <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                    <h5 class="alert-heading">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        <?php echo e(__('translate.Action Required: Complete Passenger Information')); ?>

                                    </h5>
                                    <p class="mb-2">
                                        <?php echo e(__('translate.Your payment has been completed, but you still need to provide passenger information.')); ?>

                                    </p>
                                    <p class="mb-3">
                                        <?php echo e(__('translate.Please provide the required details for all passengers (:count)', ['count' => $booking->adults + $booking->children])); ?>

                                    </p>
                                    <a href="<?php echo e(route('user.passengers.create', $booking)); ?>" class="btn btn-warning">
                                        <i class="fas fa-user-plus me-2"></i>
                                        <?php echo e(__('translate.Add Passenger Information Now')); ?>

                                    </a>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <div class="row justify-content-center">
                                <div class="col-10 mg-top-30">
                                    <div class="ed-invoice-page-wrapper">
                                        <div class="ed-invoice-main-wrapper">

                                            <div class="ed-invoice-page">
                                                <div class="ed-inv-logo-area">
                                                    <div class="ed-main-logo">
                                                        <img src="<?php echo e(asset($general_setting->logo)); ?>" alt="logo"
                                                            class="ed-logo">
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>

                                                <div class="ed-inv-billing-info">
                                                    <div class="ed-inv-info">
                                                        <p class="ed-inv-info-title"><?php echo e(__('translate.Billed To')); ?>

                                                        </p>
                                                        <table>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Name')); ?>:</td>
                                                                <td> <?php echo e($booking->customer_name ?? 'NA'); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Phone')); ?>:</td>
                                                                <td><?php echo e($booking?->customer_email); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Email')); ?>:</td>
                                                                <td><?php echo e($booking?->customer_phone); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Address')); ?> : </td>
                                                                <td> <?php echo e($booking?->customer_address); ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="ed-inv-billing-info">
                                                    <div class="ed-inv-info">
                                                        <p class="ed-inv-info-title">
                                                            <?php echo e(__('translate.Booking Information')); ?>

                                                        </p>
                                                        <table>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Invoice No')); ?>:</td>
                                                                <td>#<?php echo e($booking->booking_code); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Booking Status')); ?>:</td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-<?php echo e($booking->booking_status == 'confirmed' ? 'success' : ($booking->booking_status == 'pending' ? 'warning' : ($booking->booking_status == 'cancelled' ? 'danger' : 'info'))); ?>">
                                                                        <?php echo e(ucfirst($booking->booking_status)); ?>

                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Payment Status')); ?> : </td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-<?php echo e($booking->payment_status == 'completed' ? 'success' : 'warning'); ?>">
                                                                        <?php echo e(ucfirst($booking->payment_status)); ?>

                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Passenger Info')); ?> : </td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-<?php echo e($booking->passenger_info_status == 'completed' ? 'success' : 'warning'); ?>">
                                                                        <?php echo e(ucfirst($booking->passenger_info_status ?? 'pending')); ?>

                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Payment Method')); ?> : </td>
                                                                <td>
                                                                    <?php echo e(currency($booking->total)); ?>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Total Amount')); ?> : </td>
                                                                <td>
                                                                    <?php echo e(ucfirst($booking->payment_method)); ?>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Paid Amount')); ?> : </td>
                                                                <td>
                                                                    <?php echo e(currency($booking->paid_amount)); ?>

                                                                </td>
                                                            </tr>
                                                            <?php if($booking->due_amount > 0): ?>
                                                                <tr>
                                                                    <td><?php echo e(__('translate.Due Amount')); ?> : </td>
                                                                    <td>
                                                                        <?php echo e(currency($booking->due_amount)); ?>

                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </table>

                                                    </div>
                                                    <div class="ed-inv-info">
                                                        <p class="ed-inv-info-title">
                                                            <?php echo e(__('translate.Service Information')); ?>

                                                        </p>
                                                        <table>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Title')); ?>:</td>
                                                                <td> <?php echo e($booking->service->title ?? 'NA'); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Location')); ?> : </td>
                                                                <td><?php echo e($booking?->service?->location); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Check in Date')); ?>:</td>
                                                                <td><?php echo e(date('d M Y', strtotime($booking->check_in_date))); ?>

                                                                </td>
                                                            </tr>
                                                            <?php if($booking->check_out_date): ?>
                                                                <tr>
                                                                    <td><?php echo e(__('translate.Check out Date')); ?>:</td>
                                                                    <td><?php echo e(date('d M Y', strtotime($booking->check_out_date))); ?>

                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                            <tr>
                                                                <td><?php echo e(__('translate.Adults')); ?> : </td>
                                                                <td> <?php echo e($booking?->adults); ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td><?php echo e(__('translate.Children')); ?> : </td>
                                                                <td> <?php echo e($booking?->children); ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td><?php echo e(__('translate.Infants')); ?> : </td>
                                                                <td> <?php echo e($booking?->infants); ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <?php if($booking->admin_notes): ?>
                                                    <div class="row mb-4">
                                                        <div class="col-md-12">
                                                            <h6 class="text-muted"><?php echo e(__('translate.Admin note for you')); ?></h6>
                                                            <p><?php echo e($booking->admin_notes); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if($booking->cancellation_reason): ?>
                                                    <div class="row mb-4">
                                                        <div class="col-md-12">
                                                            <h6 class="text-muted"><?php echo e(__('translate.Cancellation reason')); ?></h6>
                                                            <p><?php echo e($booking->cancellation_reason); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 class="text-muted"><?php echo e(__('translate.Actions')); ?></h6>
                                                        <div class="d-flex flex-wrap gap-4">
 
                                                            <div>
                                                                <button class="btn btn-secondary">
                                                                    <a class="text-dark"
                                                                        href="<?php echo e(route('user.bookings.index')); ?>">
                                                                        <i class="bi bi-arrow-left"></i>
                                                                        <?php echo e(__('translate.Back to Bookings')); ?>

                                                                    </a>
                                                                </button>
                                                            </div>
 
                                                            <div>
                                                                <?php if($booking->payment_status === 'completed' && $booking->passenger_info_status === 'pending'): ?>
                                                                    <a href="<?php echo e(route('user.passengers.create', $booking)); ?>" class="btn btn-warning">
                                                                        <i class="fas fa-user-plus"></i>
                                                                        <?php echo e(__('translate.Add Passenger Information')); ?>

                                                                    </a>
                                                                <?php elseif($booking->passenger_info_status === 'completed'): ?>
                                                                    <a href="<?php echo e(route('user.passengers.show', $booking)); ?>" class="btn btn-info">
                                                                        <i class="fas fa-users"></i>
                                                                        <?php echo e(__('translate.View Passengers')); ?>

                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
 
                                                            <div>
                                                                <?php if($booking->booking_status == 'pending' || $booking->booking_status == 'confirmed' || $booking->booking_status == 'success'): ?>
                                                                    <button type="button" class="btn btn-danger w-auto"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#cancelBookingModal">
                                                                        <i class="bi bi-x-circle"></i>
                                                                        <?php echo e(__('translate.Cancel Booking')); ?>

                                                                    </button>
                                                                <?php endif; ?>
                                                            </div>
 
                                                            <div>
                                                                <?php if($booking->booking_status == 'completed'): ?>
                                                                    <button class="btn btn-primary w-auto">
                                                                        <a target="_blank"
                                                                            href="<?php echo e(route('front.tourbooking.services.show', ['slug' => $booking->service->slug . '#reviewForm'])); ?>"
                                                                            class="text-white">
                                                                            <i class="bi bi-star"></i>
                                                                            <?php echo e(__('translate.Leave a Review')); ?>

                                                                        </a>
                                                                    </button>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- Cancel Booking Modal -->
    <?php if($booking->booking_status == 'pending' || $booking->booking_status == 'confirmed' || $booking->booking_status == 'success'): ?>
        <div class="modal fade" id="cancelBookingModal" tabindex="-1" aria-labelledby="cancelBookingModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo e(route('user.bookings.cancel', ['id' => $booking->id])); ?>"
                        method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="cancelBookingModalLabel"><?php echo e(__('translate.Cancel Booking')); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger"><?php echo e(__('translate.Are you sure you want to cancel this booking?')); ?></p>
                            <div class="mb-3">
                                <label for="cancellation_reason"
                                    class="form-label"><?php echo e(__('translate.Reason for Cancellation')); ?></label>
                                <textarea class="form-control" id="cancellation_reason" name="cancellation_reason" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal"><?php echo e(__('translate.Close')); ?></button>
                            <button type="submit" class="btn btn-danger"><?php echo e(__('translate.Cancel Booking')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/modules/tourbooking/user/booking/details.blade.php ENDPATH**/ ?>