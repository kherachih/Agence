<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Service Types')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Service Types')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Tour Booking')); ?> >> <?php echo e(__('translate.Service Types')); ?></p>
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
                                        class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div
                                            class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">
                                                    <?php echo e(__('translate.All Service Types')); ?></h4>
                                                <a href="<?php echo e(route('admin.tourbooking.service-types.create')); ?>"
                                                    class="crancy-btn "><i class="fa fa-plus"></i>
                                                    <?php echo e(__('translate.Add New Service Type')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <thead class="crancy-table__head">
                                            <tr>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Icon/Image')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Name')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Services Count')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Featured')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Status')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            <?php $__currentLoopData = $serviceTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php if($serviceType->image): ?>
                                                            <img src="<?php echo e(asset('storage/' . $serviceType->image)); ?>"
                                                                alt="<?php echo e($serviceType->translation->name ?? $serviceType->name); ?>"
                                                                width="60">
                                                        <?php elseif($serviceType->icon): ?>
                                                            <i class="<?php echo e($serviceType->icon); ?>"
                                                                style="font-size: 24px;"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-cubes" style="font-size: 24px;"></i>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e($serviceType->translation->name ?? $serviceType->name); ?>

                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e($serviceType->services->count()); ?></td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php if($serviceType->is_featured): ?>
                                                            <span
                                                                class="crancy-badge crancy-badge-success"><?php echo e(__('translate.Yes')); ?></span>
                                                        <?php else: ?>
                                                            <span
                                                                class="crancy-badge crancy-badge-gray"><?php echo e(__('translate.No')); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php if($serviceType->status): ?>
                                                            <span
                                                                class="crancy-badge crancy-badge-success"><?php echo e(__('translate.Active')); ?></span>
                                                        <?php else: ?>
                                                            <span
                                                                class="crancy-badge crancy-badge-danger"><?php echo e(__('translate.Inactive')); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="<?php echo e(route('admin.tourbooking.service-types.edit', ['service_type' => $serviceType->id, 'lang_code' => admin_lang()])); ?>"
                                                            class="crancy-action__btn crancy-action__edit crancy-btn"><i
                                                                class="fa fa-edit"></i>
                                                            <?php echo e(__('translate.Edit')); ?>

                                                        </a>
                                                        <a href="<?php echo e(route('admin.tourbooking.service-types.show', $serviceType->id)); ?>"
                                                            class="crancy-action__btn crancy-action__view crancy-btn"><i
                                                                class="fa fa-eye"></i>
                                                        </a>

                                                        <a onclick="itemDeleteConfrimation(<?php echo e($serviceType->id); ?>)"
                                                            href="javascript:;" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"
                                                            class="destination crancy-btn crancy-action__btn crancy-action__edit crancy-btn delete_danger_btn"><i
                                                                class="fas fa-trash"></i> <?php echo e(__('translate.Delete')); ?>

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
    </section>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('translate.Delete Confirmation')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><?php echo e(__('translate.Are you realy want to delete this item?')); ?></p>
                </div>
                <div class="modal-footer">
                    <form action="" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal"><?php echo e(__('translate.Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('translate.Yes, Delete')); ?></button>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
    <script>
        "use strict"
        $(document).ready(function() {
            $('#crancy-table__service-types').DataTable({
                responsive: true,
                paging: false,
                info: false,
                searching: true,
                ordering: true,
            });

        });

        function itemDeleteConfrimation(id) {
            $("#item_delect_confirmation").attr("action", '<?php echo e(url('admin/tourbooking/service-types')); ?>' + "/" + id)
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/admin/service_types/index.blade.php ENDPATH**/ ?>