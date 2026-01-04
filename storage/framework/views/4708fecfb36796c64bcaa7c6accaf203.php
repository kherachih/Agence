<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Support Ticket')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Support Ticket')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Support Ticket')); ?></p>
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
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Support Ticket')); ?></h4>

                                            <a href="<?php echo e(route('user.support-ticket.create')); ?>" class="crancy-btn "><span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
																<path d="M8 1V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M1 8H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
                                            </span> <?php echo e(__('translate.New Ticket')); ?></a>
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
                                                    <?php echo e(__('translate.Subject')); ?>

                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    <?php echo e(__('translate.Ticket Id')); ?>

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
                                            <?php $__currentLoopData = $support_tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $support_ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e(++$index); ?></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><?php echo e(html_decode($support_ticket->subject)); ?></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">#<?php echo e($support_ticket->ticket_id); ?></h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <?php if($support_ticket->status == 'open'): ?>
                                                            <span class="badge bg-success text-white"><?php echo e(__('translate.In-progress')); ?></span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger text-white"><?php echo e(__('translate.Closed')); ?></span>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="<?php echo e(route('user.support-ticket.show', $support_ticket->ticket_id)); ?>" class="crancy-btn"><i class="far fa-message"></i> <?php echo e(__('translate.Chat')); ?></a>
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

<?php echo $__env->make('user.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/SupportTicket\resources/views/support/user/index.blade.php ENDPATH**/ ?>