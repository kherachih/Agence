
<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Service Details')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Service Details')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Tour Booking')); ?> >> <?php echo e(__('translate.Service Details')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">
                                                <?php echo e(__('translate.Service Details')); ?></h4>
                                            <div>
                                                <a href="<?php echo e(route('admin.tourbooking.services.edit', $service->id)); ?>"
                                                    class="crancy-btn crancy-btn__primary me-2">
                                                    <i class="fa fa-edit"></i> <?php echo e(__('translate.Edit')); ?>

                                                </a>
                                                <a href="<?php echo e(route('admin.tourbooking.services.index')); ?>"
                                                    class="crancy-btn">
                                                    <i class="fa fa-list"></i> <?php echo e(__('translate.Back to List')); ?>

                                                </a>
                                            </div>
                                        </div>

                                        <div class="row mg-top-25">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <?php if($service->thumbnail && $service->thumbnail->file_path): ?>
                                                            <img src="<?php echo e(asset('storage/' . $service->thumbnail->file_path)); ?>"
                                                                alt="<?php echo e($service->translation->title ?? $service->title); ?>"
                                                                class="img-fluid mb-3" style="max-height: 200px;">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('admin/img/img-placeholder.jpg')); ?>"
                                                                alt="No image" class="img-fluid mb-3" style="max-height: 200px;">
                                                        <?php endif; ?>

                                                        <h5 class="card-title">
                                                            <?php echo e($service->translation->title ?? $service->title); ?>

                                                        </h5>
                                                        <p class="text-muted"><small><?php echo e($service->slug); ?></small></p>

                                                        <div class="mt-3">
                                                            <?php if($service->status): ?>
                                                                <span
                                                                    class="crancy-badge crancy-badge-success"><?php echo e(__('translate.Active')); ?></span>
                                                            <?php else: ?>
                                                                <span
                                                                    class="crancy-badge crancy-badge-danger"><?php echo e(__('translate.Inactive')); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mt-4">
                                                    <div class="card-header">
                                                        <h5 class="mb-0"><?php echo e(__('translate.Quick Actions')); ?></h5>
                                                    </div>
                                                    <div class="list-group list-group-flush">
                                                        <a href="<?php echo e(route('admin.tourbooking.services.itineraries', $service->id)); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                            <?php echo e(__('translate.Itineraries')); ?>

                                                            <span class="badge bg-primary rounded-pill"><?php echo e($service->itineraries->count()); ?></span>
                                                        </a>
                                                        <a href="<?php echo e(route('admin.tourbooking.services.extra-charges', $service->id)); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                            <?php echo e(__('translate.Extra Charges')); ?>

                                                            <span class="badge bg-primary rounded-pill"><?php echo e($service->extraCharges->count()); ?></span>
                                                        </a>
                                                        <a href="<?php echo e(route('admin.tourbooking.services.availability', $service->id)); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                            <?php echo e(__('translate.Availability')); ?>

                                                        </a>
                                                        <a href="<?php echo e(route('admin.tourbooking.services.media', $service->id)); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                            <?php echo e(__('translate.Media Gallery')); ?>

                                                            <span class="badge bg-primary rounded-pill"><?php echo e($service->media->count()); ?></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0"><?php echo e(__('translate.General Information')); ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold"><?php echo e(__('translate.Service Type')); ?>:</label>
                                                                <p><?php echo e($service->serviceType->name ?? 'N/A'); ?></p>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold"><?php echo e(__('translate.Destination')); ?>:</label>
                                                                <p><?php echo e($service->destination->name ?? 'N/A'); ?></p>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold"><?php echo e(__('translate.Location')); ?>:</label>
                                                                <p><?php echo e($service->location ?? 'N/A'); ?></p>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold"><?php echo e(__('translate.Duration')); ?>:</label>
                                                                <p><?php echo e($service->duration ?? 'N/A'); ?></p>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold"><?php echo e(__('translate.Group Size')); ?>:</label>
                                                                <p><?php echo e($service->group_size ?? 'N/A'); ?></p>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold"><?php echo e(__('translate.Pricing')); ?>:</label>
                                                                <p>
                                                                    <?php if($service->discount_price): ?>
                                                                        <span class="text-decoration-line-through"><?php echo e($service->full_price); ?></span>
                                                                        <span class="text-success fw-bold"><?php echo e($service->discount_price); ?></span>
                                                                    <?php elseif($service->full_price): ?>
                                                                        <span class="fw-bold"><?php echo e($service->full_price); ?></span>
                                                                    <?php elseif($service->price_per_person): ?>
                                                                        <span class="fw-bold"><?php echo e($service->price_per_person); ?> <?php echo e(__('translate.per person')); ?></span>
                                                                    <?php else: ?>
                                                                        N/A
                                                                    <?php endif; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mt-4">
                                                    <div class="card-header">
                                                        <h5 class="mb-0"><?php echo e(__('translate.Description')); ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php echo $service->translation->description ?? $service->description; ?>

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
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/admin/services/show.blade.php ENDPATH**/ ?>