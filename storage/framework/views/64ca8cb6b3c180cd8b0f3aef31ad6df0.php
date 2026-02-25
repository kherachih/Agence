<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Service Type Details')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Service Type Details')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Tour Booking')); ?> >> <?php echo e(__('translate.Service Type Details')); ?></p>
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
                                                <?php echo e(__('translate.Service Type Details')); ?></h4>
                                            <div>
                                                <a href="<?php echo e(route('admin.tourbooking.service-types.edit', $serviceType->id)); ?>"
                                                    class="crancy-btn crancy-btn__primary me-2">
                                                    <i class="fa fa-edit"></i> <?php echo e(__('translate.Edit')); ?>

                                                </a>
                                                <a href="<?php echo e(route('admin.tourbooking.service-types.index')); ?>"
                                                    class="crancy-btn">
                                                    <i class="fa fa-list"></i> <?php echo e(__('translate.Back to List')); ?>

                                                </a>
                                            </div>
                                        </div>

                                        <div class="row mg-top-25">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <?php if($serviceType->image): ?>
                                                            <img src="<?php echo e(asset('storage/' . $serviceType->image)); ?>"
                                                                alt="<?php echo e($serviceType->translation->name ?? $serviceType->name); ?>"
                                                                class="img-fluid mb-3" style="max-height: 150px;">
                                                        <?php elseif($serviceType->icon): ?>
                                                            <i class="<?php echo e($serviceType->icon); ?>"
                                                                style="font-size: 80px; margin-bottom: 20px;"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-cubes"
                                                                style="font-size: 80px; margin-bottom: 20px;"></i>
                                                        <?php endif; ?>

                                                        <h5 class="card-title">
                                                            <?php echo e($serviceType->translation->name ?? $serviceType->name); ?>

                                                        </h5>
                                                        <p class="text-muted"><small><?php echo e($serviceType->slug); ?></small></p>

                                                        <div class="mt-3">
                                                            <?php if($serviceType->status): ?>
                                                                <span
                                                                    class="crancy-badge crancy-badge-success"><?php echo e(__('translate.Active')); ?></span>
                                                            <?php else: ?>
                                                                <span
                                                                    class="crancy-badge crancy-badge-danger"><?php echo e(__('translate.Inactive')); ?></span>
                                                            <?php endif; ?>

                                                            <?php if($serviceType->is_featured): ?>
                                                                <span
                                                                    class="crancy-badge crancy-badge-primary"><?php echo e(__('translate.Featured')); ?></span>
                                                            <?php endif; ?>

                                                            <?php if($serviceType->show_on_homepage): ?>
                                                                <span
                                                                    class="crancy-badge crancy-badge-info"><?php echo e(__('translate.Homepage')); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if($serviceType->description): ?>
                                                    <div class="card mt-4">
                                                        <div class="card-header">
                                                            <h5 class="mb-0"><?php echo e(__('translate.Description')); ?></h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <p><?php echo e($serviceType->translation->description ?? $serviceType->description); ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0"><?php echo e(__('translate.Services in this Category')); ?>

                                                            (<?php echo e($serviceType->services->count()); ?>)</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php if($serviceType->services->count() > 0): ?>
                                                            <div class="table-responsive">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><?php echo e(__('translate.Image')); ?></th>
                                                                            <th><?php echo e(__('translate.Title')); ?></th>
                                                                            <th><?php echo e(__('translate.Price')); ?></th>
                                                                            <th><?php echo e(__('translate.Status')); ?></th>
                                                                            <th><?php echo e(__('translate.Action')); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $__currentLoopData = $serviceType->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <?php if($service->thumbnail && $service->thumbnail->file_path): ?>
                                                                                        <img src="<?php echo e(asset('storage/' . $service->thumbnail->file_path)); ?>"
                                                                                            alt="<?php echo e($service->translation->title ?? $service->title); ?>"
                                                                                            width="50">
                                                                                    <?php else: ?>
                                                                                        <img src="<?php echo e(asset('admin/img/img-placeholder.jpg')); ?>"
                                                                                            alt="No image" width="50">
                                                                                    <?php endif; ?>
                                                                                </td>
                                                                                <td><?php echo e($service->translation->title ?? $service->title); ?>

                                                                                </td>
                                                                                <td>
                                                                                    <?php if($service->discount_price): ?>
                                                                                        <span
                                                                                            class="text-decoration-line-through"><?php echo e($service->full_price); ?></span>
                                                                                        <?php echo e($service->discount_price); ?>

                                                                                    <?php elseif($service->full_price): ?>
                                                                                        <?php echo e($service->full_price); ?>

                                                                                    <?php elseif($service->price_per_person): ?>
                                                                                        <?php echo e($service->price_per_person); ?><?php echo e(__('translate./person')); ?>

                                                                                    <?php else: ?>
                                                                                        N/A
                                                                                    <?php endif; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if($service->status): ?>
                                                                                        <span
                                                                                            class="crancy-badge crancy-badge-success"><?php echo e(__('translate.Active')); ?></span>
                                                                                    <?php else: ?>
                                                                                        <span
                                                                                            class="crancy-badge crancy-badge-danger"><?php echo e(__('translate.Inactive')); ?></span>
                                                                                    <?php endif; ?>
                                                                                </td>
                                                                                <td class="text-center d-flex justify-content-center gap-2">
                                                                                    <a href="<?php echo e(route('admin.tourbooking.services.edit', $service->id)); ?>"
                                                                                        class="crancy-btn crancy-btn__primary crancy-btn__sm">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </a>
                                                                                    <a href="<?php echo e(route('admin.tourbooking.services.show', $service->id)); ?>"
                                                                                        class="crancy-btn crancy-btn__info crancy-btn__sm">
                                                                                        <i class="fa fa-eye"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="alert alert-info">
                                                                <?php echo e(__('translate.No services found in this category')); ?>

                                                            </div>
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
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/admin/service_types/show.blade.php ENDPATH**/ ?>