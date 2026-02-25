<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Services List')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Services List')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Tour Booking')); ?> >> <?php echo e(__('translate.Services List')); ?></p>
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
                                        <h4 class="crancy-product-card__title"><?php echo e(__('translate.All Services')); ?></h4>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="<?php echo e(route('admin.tourbooking.services.create')); ?>" class="crancy-btn"><i
                                                    class="fa fa-plus"></i>
                                                <?php echo e(__('translate.Add New Service')); ?></a>
                                        </div>
                                    </div>
                                </div>

                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <thead class="crancy-table__head">
                                            <tr>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Image')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Title')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Type')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Location')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Price')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Status')); ?></th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    <?php echo e(__('translate.Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php if($service->thumbnail && $service->thumbnail->file_path): ?>
                                                            <img src="<?php echo e(asset('storage/' . $service->thumbnail->file_path)); ?>"
                                                                alt="<?php echo e($service->translation->title ?? $service->title); ?>"
                                                                width="80">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('admin/img/img-placeholder.jpg')); ?>"
                                                                alt="No image" width="80">
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e(Str::limit($service->translation->title ?? $service->title, 50)); ?>

                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e($service->serviceType->name ?? 'N/A'); ?></td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php echo e($service->location ?? 'N/A'); ?></td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php if($service->discount_price): ?>
                                                            <span
                                                                class="text-decoration-line-through"><?php echo e($service->full_price); ?></span>
                                                            <?php echo e($service->discount_price); ?>

                                                        <?php elseif($service->full_price): ?>
                                                            <?php echo e($service->full_price); ?>

                                                        <?php elseif($service->price_per_person): ?>
                                                            <?php echo e($service->price_per_person); ?>

                                                            <?php echo e(__('translate.per person')); ?>

                                                        <?php else: ?>
                                                            N/A
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php if($service->status): ?>
                                                            <span
                                                                class="crancy-badge crancy-badge-success"><?php echo e(__('translate.Active')); ?></span>
                                                        <?php else: ?>
                                                            <span
                                                                class="crancy-badge crancy-badge-danger"><?php echo e(__('translate.Inactive')); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="<?php echo e(route('admin.tourbooking.services.edit', ['service' => $service->id, 'lang_code' => admin_lang()])); ?>"
                                                            class="crancy-action__btn crancy-action__edit crancy-btn"><i
                                                                class="fa fa-edit"></i>
                                                            <?php echo e(__('translate.Edit')); ?>

                                                        </a>

                                                        
                                                        <a onclick="itemDeleteConfrimation(<?php echo e($service->id); ?>)"
                                                            href="javascript:;" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"
                                                            class="crancy-btn delete_danger_btn"><i
                                                                class="fas fa-trash"></i>
                                                        </a>

                                                        <div class="dropdown" style="display: inline;">
                                                            <button class="crancy-action__btn" type="button"
                                                                style="width: 40px;"
                                                                id="dropdownMenuButton<?php echo e($service->id); ?>"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </button>
                                                            <ul class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton<?php echo e($service->id); ?>">
                                                                <li><a class="dropdown-item"
                                                                        href="<?php echo e(route('admin.tourbooking.services.itineraries', $service->id)); ?>"><?php echo e(__('translate.Itineraries')); ?></a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="<?php echo e(route('admin.tourbooking.services.extra-charges', $service->id)); ?>"><?php echo e(__('translate.Extra Charges')); ?></a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="<?php echo e(route('admin.tourbooking.services.availability', $service->id)); ?>"><?php echo e(__('translate.Availability')); ?></a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="<?php echo e(route('admin.tourbooking.services.media', $service->id)); ?>"><?php echo e(__('translate.Media Gallery')); ?></a>
                                                                </li>
                                                            </ul>
                                                        </div>
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


<?php $__env->startPush('js_section'); ?>
    <script>
        "use strict"

        function itemDeleteConfrimation(id) {
            $("#item_delect_confirmation").attr("action", '<?php echo e(url('admin/tourbooking/services/')); ?>' + "/" + id)
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/admin/services/index.blade.php ENDPATH**/ ?>