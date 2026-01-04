<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Email Template List')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Email Template List')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Email Template List')); ?></p>
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
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                        <div class="crancy-header__form crancy-header__form--customer">
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Email Template List')); ?></h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">

                                    <table id="dataTable" class="crancy-table__main crancy-table__main-v3 no-footer">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>
                                                <th class="crancy-table__column-1 crancy-table__h1 sorting sorting_asc">
                                                    <span><?php echo e(__('translate.Serial')); ?></span>
                                                </th>

                                                <th class="crancy-table__column-1 crancy-table__h1 sorting sorting_asc">
                                                    <span><?php echo e(__('translate.Template Name')); ?></span>
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    <?php echo e(__('translate.Subject')); ?>

                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    <?php echo e(__('translate.Action')); ?>

                                                </th>

                                            </tr>
                                        </thead>
                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            <?php $__currentLoopData = $template_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $template_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e(++$index); ?></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e($template_item->name); ?></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e($template_item->subject); ?></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="<?php echo e(route('admin.edit-email-template',$template_item->id)); ?>" class="crancy-btn"><i class="fas fa-edit    "></i> <?php echo e(__('translate.Edit')); ?></a>
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

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/EmailSetting\resources/views/template_list.blade.php ENDPATH**/ ?>