<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Menus')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Menus')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Content')); ?> >> <?php echo e(__('translate.Menus')); ?></p>
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
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Menus')); ?></h4>
                                            <a href="<?php echo e(route('admin.menus.create')); ?>" class="crancy-btn "><span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M8 1V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M1 8H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span> <?php echo e(__('translate.Create Menu')); ?></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <?php if($menus->count() > 0): ?>
                                        <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer" id="dataTable">
                                            <!-- crancy Table Head -->
                                            <thead class="crancy-table__head">
                                                <tr>
                                                    <th class="crancy-table__column-1 crancy-table__h1 sorting">
                                                        <?php echo e(__('translate.ID')); ?>

                                                    </th>
                                                    <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                        <?php echo e(__('translate.Name')); ?>

                                                    </th>
                                                    <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                        <?php echo e(__('translate.Location')); ?>

                                                    </th>
                                                    <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                        <?php echo e(__('translate.Status')); ?>

                                                    </th>
                                                    <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                        <?php echo e(__('translate.Created')); ?>

                                                    </th>
                                                    <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                        <?php echo e(__('translate.Action')); ?>

                                                    </th>
                                                </tr>
                                            </thead>
                                            <!-- crancy Table Body -->
                                            <tbody class="crancy-table__body">
                                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="crancy-table__column-1 crancy-table__data-1">
                                                            <div class="crancy-table__product">
                                                                <h4 class="crancy-table__product-title"><?php echo e($menu->id); ?></h4>
                                                            </div>
                                                        </td>
                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            <h4 class="crancy-table__product-title"><?php echo e($menu->name); ?></h4>
                                                        </td>
                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            <h4 class="crancy-table__product-title">
                                                                <?php if($menu->location): ?>
                                                                    <span class="badge"><?php echo e($menu->location); ?></span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-secondary"><?php echo e(__('translate.None')); ?></span>
                                                                <?php endif; ?>
                                                            </h4>
                                                        </td>
                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            <h4 class="crancy-table__product-title">
                                                                <?php if($menu->status == 1): ?>
                                                                    <span class="badge bg-success"><?php echo e(__('translate.Active')); ?></span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-danger"><?php echo e(__('translate.Inactive')); ?></span>
                                                                <?php endif; ?>
                                                            </h4>
                                                        </td>
                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            <h4 class="crancy-table__product-title">
                                                                <?php echo e($menu->created_at->diffForHumans()); ?>

                                                            </h4>
                                                        </td>
                                                        <td class="crancy-table__column-3 crancy-table__data-3">
                                                            <div>
                                                                <a href="<?php echo e(route('admin.menus.edit', $menu->id)); ?>" class="crancy-btn crancy-btn__success"><i class="fas fa-edit"></i> <?php echo e(__('translate.Edit')); ?></a>
                                                                <a href="javascript:;" onclick="deleteModal('<?php echo e($menu->id); ?>')" class="crancy-btn crancy-btn__danger ms-2"><i class="fas fa-trash"></i> <?php echo e(__('translate.Delete')); ?></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <!-- End crancy Table Body -->
                                        </table>
                                    <?php else: ?>
                                        <div class="alert alert-info text-center">
                                            <?php echo e(__('translate.No menus found')); ?>. <a href="<?php echo e(route('admin.menus.create')); ?>"><?php echo e(__('translate.Create your first menu')); ?></a>.
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- End crancy Table -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('translate.Delete Menu')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><?php echo e(__('translate.Are you sure you want to delete this menu? All menu items will also be deleted. This action cannot be undone.')); ?></p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('translate.Cancel')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('translate.Delete')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
<script>
    function deleteModal(id) {
        $('#deleteForm').attr('action', '<?php echo e(url("admin/menus")); ?>/' + id);
        $('#deleteModal').modal('show');
    }
</script>
<?php $__env->stopPush(); ?> 
<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/menus/index.blade.php ENDPATH**/ ?>