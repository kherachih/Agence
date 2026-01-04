<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Ticket Details')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Ticket Details')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Support Ticket')); ?> >> <?php echo e(__('translate.Ticket Details')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row crancy-gap-30">
                                <div class="col-xxl-9 col-12">
                                    <div class="crancy-tdetails mg-top-30">
                                        <div class="crancy-theader">
                                            <h2 class="crancy-theader__title m-0"><?php echo e(__('translate.Message List')); ?> </h2>
                                        </div>
                                        <div class="crancy-chatbox__explore crancy-chatbox__explore--message m-0">

                                            <?php $__currentLoopData = $ticket_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($ticket_message->send_by != 'author'): ?>
                                                    <div class="crancy-chatbox__incoming crancy-chatbox__outgoing crancy-chatbox__outgoing--email">
                                                        <ul class="crancy-chatbox__incoming-list">
                                                            <!-- Single Incoming -->
                                                            <li>
                                                                <div class="crancy-chatbox__chat">
                                                                    <div class="crancy-chatbox__main-content">
                                                                        <div class="crancy-chatbox__incoming-chat">
                                                                            <div class="crancy-chatbox__withdate">
                                                                                <div class="crancy-chatbox__withdate--inner">
                                                                                    <?php echo clean(nl2br(html_decode($ticket_message->message))); ?>

                                                                                </div>
                                                                                <time class="crancy-color1"><?php echo e($ticket_message->created_at->diffForHumans()); ?></time>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php if($ticket_message->documents): ?>
                                                                    <div class="edc-list-attached-files">
                                                                        <ul>
                                                                            <?php $__currentLoopData = $ticket_message->documents ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li class="file-item">
                                                                                    <a href="<?php echo e(route('download-file', $document->file_name)); ?>" class="d-flex gap-1 align-items-center">
                                                                                        <span class="ico">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                                                                            </svg>

                                                                                        </span>
                                                                                        <span class="text"> <?php echo e(__('translate.Click to download')); ?></span>
                                                                                    </a>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </ul>
                                                                    </div>
                                                                <?php endif; ?>

                                                            </li>
                                                            <!-- End Single Incoming -->
                                                        </ul>
                                                    </div>
                                                <?php else: ?>

                                                    <div class="crancy-chatbox__incoming crancy-chatbox__outgoing_cst  crancy-chatbox__outgoing crancy-chatbox__outgoing--email">
                                                        <ul class="crancy-chatbox__incoming-list">
                                                            <!-- Single Incoming -->
                                                            <li>
                                                                <div class="crancy-chatbox__chat">
                                                                    <div class="crancy-chatbox__main-content">
                                                                        <div class="crancy-chatbox__incoming-chat">
                                                                            <div class="crancy-chatbox__withdate">
                                                                                <div class="crancy-chatbox__withdate--inner">
                                                                                    <?php echo clean(nl2br(html_decode($ticket_message->message))); ?>

                                                                                </div>
                                                                                <time class="crancy-color1"><?php echo e($ticket_message->created_at->diffForHumans()); ?></time>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php if($ticket_message->documents): ?>
                                                                    <div class="edc-list-attached-files">
                                                                        <ul>
                                                                            <?php $__currentLoopData = $ticket_message->documents ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li class="file-item">
                                                                                    <a href="<?php echo e(route('download-file', $document->file_name)); ?>" class="d-flex gap-1 align-items-center">
                                                                                        <span class="ico">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                                                                            </svg>

                                                                                        </span>
                                                                                        <span class="text"> <?php echo e(__('translate.Click to download')); ?></span>
                                                                                    </a>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </ul>
                                                                    </div>
                                                                <?php endif; ?>

                                                            </li>
                                                            <!-- End Single Incoming -->
                                                        </ul>
                                                    </div>

                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <form action="<?php echo e(route('admin.support-ticket-message', $support_ticket->id)); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label"><?php echo e(__('translate.Message')); ?> * </label>

                                                            <textarea class="crancy__item-input crancy__item-textarea summernote"  name="message" id="message"><?php echo e(html_decode(old('message'))); ?></textarea>

                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="crancy__item-form--group mg-top-form-20 edu_support_files">
                                                            <label class="crancy__item-label"><?php echo e(__('translate.Attachements')); ?> </label>
                                                            <input class="form-control h-auto " type="file" name="documents[]" id="formFileMultiple" multiple>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button class="crancy-btn mg-top-25" type="submit"><?php echo e(__('translate.Send Message')); ?></button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-12">
                                    <!-- Ticket Info Widget -->
                                    <div class="crancy-tinfo mg-top-30">
                                        <div class="crancy-tinfo__header">
                                            <h4 class="crancy-tinfo__heading m-0"><?php echo e(__('translate.Tickets Info')); ?></h4>
                                        </div>
                                        <div class="crancy-tinfo__body">
                                            <!--  Ticket List -->
                                            <ul class="crancy-tinfo__list">
                                                <li class="crancy-tinfo__list--item">
                                                    <span class="crancy-tinfo__title"><?php echo e(__('translate.Author')); ?></span>
                                                    <span class="crancy-tinfo__title--value"><?php echo e(html_decode($support_ticket?->author?->name)); ?></span>
                                                </li>

                                                <li class="crancy-tinfo__list--item">
                                                    <span class="crancy-tinfo__title"><?php echo e(__('translate.Ticket Id')); ?></span>
                                                    <span class="crancy-tinfo__title--value  crancy-color1">#<?php echo e($support_ticket->ticket_id); ?></span>
                                                </li>


                                                <li class="crancy-tinfo__list--item">
                                                    <span class="crancy-tinfo__title"><?php echo e(__('translate.Time')); ?></span>
                                                    <span class="crancy-tinfo__title--value"><?php echo e($support_ticket->created_at->format('h:iA')); ?></span>
                                                </li>
                                                <li class="crancy-tinfo__list--item">
                                                    <span class="crancy-tinfo__title"><?php echo e(__('translate.Date')); ?></span>
                                                    <span class="crancy-tinfo__title--value"><?php echo e($support_ticket->created_at->format('d/m/Y')); ?></span>
                                                </li>
                                                <li class="crancy-tinfo__list--item">
                                                    <span class="crancy-tinfo__title"><?php echo e(__('translate.Subject')); ?></span>
                                                    <span class="crancy-tinfo__title--value"><?php echo e(html_decode($support_ticket->subject)); ?></span>
                                                </li>

                                                <li class="crancy-tinfo__list--item">
                                                    <span class="crancy-tinfo__title"><?php echo e(__('translate.Last Response')); ?></span>
                                                    <span class="crancy-tinfo__title--value crancy-color8"><?php echo e($last_message->created_at->diffForHumans()); ?> </span>
                                                </li>

                                                <li class="crancy-tinfo__list--item">
                                                    <span class="crancy-tinfo__title"><?php echo e(__('translate.Status')); ?></span>
                                                    <span class="crancy-tinfo__title--value crancy-color8">
                                                        <?php if($support_ticket->status == 'open'): ?>
                                                            <span class="badge bg-success text-white"><?php echo e(__('translate.In-progress')); ?></span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger text-white"><?php echo e(__('translate.Closed')); ?></span>
                                                        <?php endif; ?>
                                                    </span>
                                                </li>

                                            </ul>
                                            <!--  Ticket Button -->
                                            <div class="crancy-tinfo__button mg-top-20 support_box">
                                                <?php if($support_ticket->status == 'open'): ?>
                                                <button data-bs-toggle="modal" data-bs-target="#ticketCloseModal" class="crancy-btn mg-top-25" type="button"><?php echo e(__('translate.Close Now')); ?></button>
                                                <?php endif; ?>

                                                <button onclick="itemDeleteConfrimation(<?php echo e($support_ticket->id); ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="crancy-btn delete_danger_btn mg-top-25 ml-5" type="button"><i class="fas fa-trash"></i> <?php echo e(__('translate.Delete')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Ticket Info Widget -->

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->


      <!-- Ticket Close Confirmation Modal -->
        <div class="modal fade" id="ticketCloseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('translate.Close Confirmation')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo e(__('translate.Are you realy want to close this ticket?')); ?></p>
                    </div>
                    <div class="modal-footer">
                        <form action="<?php echo e(route('admin.support-ticket-close', $support_ticket->id)); ?>" class="delet_modal_form" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('translate.Close')); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo e(__('translate.Yes, Close')); ?></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>



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
        $("#item_delect_confirmation").attr("action",'<?php echo e(url("admin/support-ticket-delete/")); ?>'+"/"+id)
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/SupportTicket\resources/views/support/admin/show.blade.php ENDPATH**/ ?>