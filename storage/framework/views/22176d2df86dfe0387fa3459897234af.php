<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Amenities')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Amenities')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Tour Booking')); ?> >> <?php echo e(__('translate.Amenities')); ?></p>
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
                                        <h4 class="crancy-product-card__title"><?php echo e(__('translate.All Amenities')); ?></h4>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="<?php echo e(route('admin.tourbooking.amenities.create')); ?>"
                                                class="crancy-btn"><i class="fa fa-plus"></i>
                                                <?php echo e(__('translate.Add New Amenity')); ?></a>
                                        </div>
                                    </div>
                                </div>


                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <thead class="crancy-table__head">
                                            <tr>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">ID</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Image</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Name</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Status</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Created At</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            <?php $__empty_1 = true; $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aminity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e($aminity->id); ?></td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php if($aminity->image): ?>
                                                            <img src="<?php echo e(asset($aminity->image)); ?>" class="img-thumbnail"
                                                                width="50">
                                                        <?php else: ?>
                                                            <span class="badge badge-secondary">No
                                                                Image</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e($aminity?->translation?->name); ?></td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <label class="crancy__item-switch" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="Toggle Status: Click to activate/deactivate">
                                                            <input onClick="manageStatus(<?php echo e($aminity->id); ?>)"
                                                                name="status" type="checkbox"
                                                                <?php echo e($aminity->status == 1 ? 'checked' : ''); ?>>
                                                            <span
                                                                class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                        </label>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e($aminity->created_at->format('d M, Y')); ?>

                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="<?php echo e(route('admin.tourbooking.amenities.edit', ['amenity' => $aminity->id, 'lang_code' => admin_lang()])); ?>"
                                                            class="crancy-action__btn crancy-action__edit crancy-btn">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a onclick="itemDeleteConfrimation(<?php echo e($aminity->id); ?>)"
                                                            href="javascript:;" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"
                                                            class="destination crancy-btn crancy-action__btn crancy-action__edit crancy-btn delete_danger_btn"><i
                                                                class="fas fa-trash"></i> <?php echo e(__('translate.Delete')); ?>

                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="8" class="text-center">No
                                                        amenities found</td>
                                                </tr>
                                            <?php endif; ?>
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

<?php $__env->startPush('styles'); ?>
    <style>
        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('js_section'); ?>
    <script>
        "use strict"

        function itemDeleteConfrimation(id) {
            $("#item_delect_confirmation").attr("action", '<?php echo e(url('admin/tourbooking/amenities')); ?>' + "/" + id)
        }

        function manageStatus(id) {
            var appMODE = "<?php echo e(env('APP_MODE')); ?>"
            if (appMODE == 'DEMO') {
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }

            $.ajax({
                type: "PUT",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                url: "<?php echo e(route('admin.tourbooking.amenities.update-status', ':id')); ?>".replace(':id', id),
                success: function(response) {
                    toastr.success(response.message)
                },
                error: function(err) {
                    console.log(err);
                    toastr.error('An error occurred while updating status');
                }
            })
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/admin/amenity/index.blade.php ENDPATH**/ ?>