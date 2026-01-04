<?php $__env->startSection('title'); ?>
<title><?php echo e(__('translate.SEO Setup')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.SEO Setup')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.SEO Setup')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>

<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row row__bscreen">
            <div class="col-12">
                <div class="crancy-body">
                    <!-- Dashboard Inner -->
                    <div class="crancy-dsinner">
                        <div class="crancy-personals mg-top-30">
                            <div class="row">
                                <div class="col-lg-3 col-md-2 col-12 crancy-personals__list">
                                    <div class="crancy-psidebar">
                                        <!-- Features Tab List -->
                                        <div class="list-group crancy-psidebar__list" id="list-tab" role="tablist">

                                            <?php $__currentLoopData = $seo_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $seo_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="list-group-item <?php echo e($index == 0  ? 'active' : ''); ?>" data-bs-toggle="list" href="#id1<?php echo e($seo_item->id); ?>" role="tab" aria-selected="<?php echo e($index == 0  ? 'true' : 'false'); ?>">
                                                <span class="crancy-psidebar__icon">
                                                    <i class="fas fa-list    "></i>
                                                </span>
                                                <h4 class="crancy-psidebar__title"><?php echo e($seo_item->page_name); ?></h4>
                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-10 col-12  crancy-personals__content">
                                    <div class="crancy-ptabs">

                                        <div class="crancy-ptabs__inner">
                                            <div class="tab-content" id="nav-tabContent">
                                                <!--  Features Single Tab -->
                                                <?php $__currentLoopData = $seo_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $seo_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="tab-pane fade <?php echo e($index == 0  ? 'active show' : ''); ?>" id="id1<?php echo e($seo_item->id); ?>" role="tabpanel">
                                                    <form action="<?php echo e(route('admin.update-seo-setting',$seo_item->id)); ?>" method="POST" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title"><?php echo e($seo_item->page_name); ?> <?php echo e(__('translate.Page')); ?></h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label"><?php echo e(__('translate.SEO Title')); ?> </label>
                                                                                            <input class="crancy__item-input" type="text" value="<?php echo e($seo_item->seo_title); ?>" name="seo_title">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label"><?php echo e(__('translate.SEO Description')); ?> </label>
                                                                                            <textarea class="crancy__item-input crancy__item-textarea summernote" name="seo_description" id="" cols="30" rows="5"><?php echo e($seo_item->seo_description); ?></textarea>

                                                                                        </div>
                                                                                    </div>




                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit"><?php echo e(__('translate.Update')); ?></button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>

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

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/SeoSetting\resources/views/seo_setting.blade.php ENDPATH**/ ?>