<?php $__env->startSection('title'); ?>
    <title><?php echo e($title); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e($title); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Seller')); ?> >> <?php echo e($title); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <!-- crancy Dashboard -->
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
                                            <h4 class="crancy-product-card__title"><?php echo e($title); ?></h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer" id="dataTable">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    <?php echo e(__('translate.Serial')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    <?php echo e(__('translate.Agency Name')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    <?php echo e(__('translate.Country')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    <?php echo e(__('translate.State')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    <?php echo e(__('translate.City')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    <?php echo e(__('translate.Status')); ?>

                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    <?php echo e(__('translate.Action')); ?>

                                                </th>

                                            </tr>
                                        </thead>
                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e(++$index); ?></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a target="_blank" href="<?php echo e(route('admin.user-show', $user->id)); ?>"><?php echo e(html_decode($user?->agency_name)); ?></a></h4>

                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e($user?->country); ?></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e($user?->state); ?></h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e($user?->city); ?></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php if($user->instructor_joining_request == 'approved'): ?>
                                                        <span class="badge bg-success"><?php echo e(__('translate.Approved')); ?></span>
                                                        <?php elseif($user->instructor_joining_request ==  'rejected'): ?>
                                                        <span class="badge bg-danger"><?php echo e(__('translate.Rejected')); ?></span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger"><?php echo e(__('translate.Awaiting')); ?></span>
                                                        <?php endif; ?>
                                                    </td>



                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="<?php echo e(route('admin.seller-joining-detail', $user->id )); ?>" class="crancy-btn"><i class="fas fa-eye"></i> <?php echo e(__('translate.Show')); ?></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                        <!-- End crancy Table Body -->
                                    </table>
                                </div>
                                <!-- End crancy Table -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/seller/seller_joining_request.blade.php ENDPATH**/ ?>