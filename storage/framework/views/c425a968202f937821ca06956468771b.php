<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Terms and Conditions')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Terms and Conditions')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Pages')); ?> >> <?php echo e(__('translate.Terms and Conditions')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show language_box">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card translation_main_box">

                                        <div class="crancy-customer-filter">
                                            <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                                <div class="crancy-header__form crancy-header__form--customer">
                                                    <h4 class="crancy-product-card__title"><?php echo e(__('translate.Switch to language translation')); ?></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="translation_box">
                                            <ul >
                                                <?php $__currentLoopData = $language_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('admin.terms-conditions', ['lang_code' => $language->lang_code] )); ?>">
                                                    <?php if(request()->get('lang_code') == $language->lang_code): ?>
                                                        <i class="fas fa-eye"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-edit"></i>
                                                    <?php endif; ?>

                                                    <?php echo e($language->lang_name); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                            <div class="alert alert-secondary" role="alert">

                                                <?php
                                                    $edited_language = $language_list->where('lang_code', request()->get('lang_code'))->first();
                                                ?>

                                            <p><?php echo e(__('translate.Your editing mode')); ?> : <b><?php echo e($edited_language->lang_name); ?></b></p>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="<?php echo e(route('admin.update-terms-conditions')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <input type="hidden" name="translate_id" value="<?php echo e($terms_conditions->id); ?>">
                                <input type="hidden" name="lang_code" value="<?php echo e(request()->get('lang_code')); ?>">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="crancy__item-form--group">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Terms and Conditions')); ?> * </label>

                                                        <textarea class="crancy__item-input crancy__item-textarea summernote"  name="description" id="description"><?php echo clean($terms_conditions->description); ?></textarea>

                                                    </div>
                                                </div>
                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit"><?php echo e(__('translate.Update')); ?></button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style_section'); ?>

    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding{
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js_section'); ?>

    <script src="<?php echo e(asset('global/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>


    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {

                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                    ]
                });

            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/Page\Resources/views/terms_conditions.blade.php ENDPATH**/ ?>