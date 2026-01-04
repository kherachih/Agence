<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Team Members')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Team Members')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Project')); ?> >> <?php echo e(__('translate.Team Members')); ?></p>
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
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Team Members')); ?></h4>

                                            <a href="<?php echo e(route('admin.team.create')); ?>" class="crancy-btn ">
                                            <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
																<path d="M8 1V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M1 8H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
                                            </span>
                                                <?php echo e(__('translate.Create New')); ?></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                        <tr>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                <?php echo e(__('translate.Serial')); ?>

                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                <?php echo e(__('translate.Title')); ?>

                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                <?php echo e(__('translate.Designation')); ?>

                                            </th>

                                            <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                <?php echo e(__('translate.Action')); ?>

                                            </th>

                                        </tr>
                                        </thead>

                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title"><?php echo e(++$index); ?></h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title"><a target="_blank" href="<?php echo e(route('teamPerson', $team->slug)); ?>"><?php echo e(html_decode($team->translate->name)); ?></a></h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title"><?php echo e(html_decode($team->translate->designation)); ?></h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <div class="dropdown">
                                                        <button class="crancy-btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <?php echo e(__('translate.Action')); ?>

                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                <a href="<?php echo e(route('admin.team.edit', ['team' => $team->id, 'lang_code' => admin_lang()] )); ?>"
                                                                   class=" dropdown-item"><i class="fas fa-edit"></i> <?php echo e(__('translate.Edit')); ?></a>
                                                            </li>

                                                            <li>
                                                                <a onclick="itemDeleteConfrimation(<?php echo e($team->id); ?>)" href="javascript:;" data-bs-toggle="modal"
                                                                   data-bs-target="#exampleModal" class="dropdown-item"><i class="fas fa-trash"></i> <?php echo e(__('translate.Delete')); ?></a>
                                                            </li>
                                                        </ul>
                                                    </div>
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


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('translate.Delete Confirmation')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><?php echo e(__('translate.Are you really want to delete this item?')); ?></p>
                </div>
                <div class="modal-footer">
                    <form action="" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('translate.Close')); ?></button>
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
        function itemDeleteConfrimation(id){
            $("#item_delect_confirmation").attr("action",'<?php echo e(url("admin/team/")); ?>'+"/"+id)
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/Team\resources/views/index.blade.php ENDPATH**/ ?>