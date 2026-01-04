<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Edit Team Member')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Edit Team Member')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Project')); ?> >> <?php echo e(__('translate.Edit Team Member')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <section class="crancy-adashboard crancy-show mg-top-30">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="crancy-product-card translation_main_box">
                                        <div class="crancy-customer-filter">
                                            <div
                                                class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                                <div class="crancy-header__form crancy-header__form--customer">
                                                    <h4 class="crancy-product-card__title">
                                                        <?php echo e(__('translate.Switch to language translation')); ?></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="translation_box">
                                            <ul>
                                                <?php $__currentLoopData = $language_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a
                                                            href="<?php echo e(route('admin.team.edit', ['team' => $teamMember->id, 'lang_code' => $language->lang_code])); ?>">
                                                            <?php if(request()->get('lang_code') == $language->lang_code): ?>
                                                                <i class="fas fa-eye"></i>
                                                            <?php else: ?>
                                                                <i class="fas fa-edit"></i>
                                                            <?php endif; ?>

                                                            <?php echo e($language->lang_name); ?>

                                                        </a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                            <div class="alert alert-secondary" role="alert">
                                                <?php
                                                    $edited_language = $language_list
                                                        ->where('lang_code', request()->get('lang_code'))
                                                        ->first();
                                                ?>
                                                <p><?php echo e(__('translate.Your editing mode')); ?> :
                                                    <b><?php echo e($edited_language->lang_name); ?></b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form action="<?php echo e(route('admin.team.update', $teamMember->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="team_id" value="<?php echo e($team_translate->id); ?>">
        <input type="hidden" name="lang_code" value="<?php echo e($team_translate->lang_code); ?>">
        <section class="crancy-adashboard crancy-show">
            <div class="container container__bscreen">
                <div class="row">
                    <div class="col-12">
                        <div class="crancy-body">
                            <div class="crancy-dsinner">
                                <div class="row">
                                    <div class="col-12 ">
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">
                                                    <?php echo e(__('translate.Basic Information')); ?></h4>
                                            </div>

                                            <div class="row">
                                                <?php if(admin_lang() == request()->get('lang_code')): ?>
                                                    <div class="col-12 mg-top-form-20">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label"><?php echo e(__('translate.Thumbnail Image')); ?>

                                                                        (170px X 222px)
                                                                        * </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" class="btn-check"
                                                                            name="image" id="input-img1"
                                                                            autocomplete="off"
                                                                            onchange="previewImage(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="input-img1">
                                                                            <img id="view_img"
                                                                                src="<?php echo e(asset($teamMember->image)); ?>">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                <?php echo e(__('translate.Click here to')); ?> <span
                                                                                    class="crancy-primary-color"><?php echo e(__('translate.Choose File')); ?></span>
                                                                                <?php echo e(__('translate.and upload')); ?> </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label"><?php echo e(__('translate.Thumbnail Image')); ?>

                                                                        (496px X 550px)
                                                                    </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" class="btn-check"
                                                                            name="image_detail" id="image_detail"
                                                                            autocomplete="off"
                                                                            onchange="previewImageDetail(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="image_detail">
                                                                            <img id="view_img_detail"
                                                                                src="<?php echo e(asset($teamMember->image_details)); ?>">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                <?php echo e(__('translate.Click here to')); ?> <span
                                                                                    class="crancy-primary-color"><?php echo e(__('translate.Choose File')); ?></span>
                                                                                <?php echo e(__('translate.and upload')); ?> </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Name')); ?> *
                                                        </label>
                                                        <input class="crancy__item-input" type="text" name="name"
                                                            id="name" value="<?php echo e($team_translate->name); ?>">
                                                    </div>
                                                </div>
                                                <?php if(admin_lang() == request()->get('lang_code')): ?>
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label"><?php echo e(__('translate.Slug')); ?> *
                                                            </label>
                                                            <input class="crancy__item-input" type="text" name="slug"
                                                                id="slug" value="<?php echo e($teamMember->slug); ?>">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Designation')); ?>

                                                            * </label>
                                                        <input class="crancy__item-input" type="text" name="designation"
                                                            id="designation" value="<?php echo e($team_translate->designation); ?>">
                                                    </div>
                                                </div>
                                                <?php if(admin_lang() == request()->get('lang_code')): ?>
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label"><?php echo e(__('translate.Personal Mail')); ?>

                                                                * </label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="mail" id="mail"
                                                                value="<?php echo e($teamMember->mail); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label"><?php echo e(__('translate.Phone Number')); ?>

                                                                * </label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="phone_number" id="phone_number"
                                                                value="<?php echo e($teamMember->phone_number); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label"><?php echo e(__('translate.Address')); ?></label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="address" id="address"
                                                                value="<?php echo e($teamMember->address); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label"><?php echo e(__('translate.Website')); ?></label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="website" id="website"
                                                                value="<?php echo e($teamMember->website); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label"><?php echo e(__('translate.Facebook URL')); ?>

                                                                *</label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="facebook" id="facebook"
                                                                value="<?php echo e($teamMember->facebook); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label"><?php echo e(__('translate.Twitter URL')); ?>

                                                            </label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="twitter" id="twitter"
                                                                value="<?php echo e($teamMember->twitter); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label"><?php echo e(__('translate.LinkedIn URL')); ?>

                                                            </label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="linkedin" id="linkedin"
                                                                value="<?php echo e($teamMember->linkedin); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label"><?php echo e(__('translate.Instagram URL')); ?>

                                                            </label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="instagram" id="instagram"
                                                                value="<?php echo e($teamMember->instagram); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label"><?php echo e(__('translate.Pinterest URL')); ?>

                                                            </label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="pinterest" id="pinterest"
                                                                value="<?php echo e($teamMember->pinterest); ?>">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="col-md-12 border-top mt-4">
                                                    <div id="skill-container">
                                                        <?php if($team_translate->skill_list && count($team_translate->skill_list) > 0): ?>
                                                            <?php $__currentLoopData = $team_translate->skill_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="row skill-item align-items-end">
                                                                    <div class="col-md-5">
                                                                        <div
                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                            <label
                                                                                class="crancy__item-label"><?php echo e(__('translate.Skill Title')); ?></label>
                                                                            <input class="crancy__item-input"
                                                                                type="text"
                                                                                value="<?php echo e($skill['title']); ?>"
                                                                                name="skill_title[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <div
                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                            <label
                                                                                class="crancy__item-label"><?php echo e(__('translate.Skill Percentage')); ?></label>
                                                                            <input class="crancy__item-input"
                                                                                type="number"
                                                                                value="<?php echo e($skill['percentage']); ?>"
                                                                                name="skill_percentage[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 text-end">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm remove-skill-btn"
                                                                            style="margin-bottom: 10px;">Remove</button>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <div class="row skill-item align-items-end">
                                                                <div class="col-md-5">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label
                                                                            class="crancy__item-label"><?php echo e(__('translate.Skill Title')); ?></label>
                                                                        <input class="crancy__item-input" type="text"
                                                                            name="skill_title[]">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label
                                                                            class="crancy__item-label"><?php echo e(__('translate.Skill Percentage')); ?></label>
                                                                        <input class="crancy__item-input" type="number"
                                                                            name="skill_percentage[]">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 text-end">
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm remove-skill-btn"
                                                                        style="margin-bottom: 10px;">Remove</button>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="col-12">
                                                        <button id="add-skill-btn" class="crancy-btn mg-top-25"
                                                            type="button"><?php echo e(__('translate.Add Skill')); ?></button>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.About Me')); ?>

                                                            *
                                                        </label>
                                                        <textarea class="crancy__item-input crancy__item-textarea summernote" name="description" id="description"><?php echo e($team_translate->description); ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Skill short description')); ?>

                                                        </label>
                                                        <textarea class="crancy__item-input crancy__item-textarea summernote" name="skill_short_description"
                                                            id="skill_short_description"><?php echo e($team_translate->skill_short_description); ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Information')); ?>

                                                        </label>
                                                        <textarea class="crancy__item-input crancy__item-textarea summernote" name="information" id="information"><?php echo e($team_translate->information); ?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <button class="crancy-btn mg-top-25"
                                                type="submit"><?php echo e(__('translate.Update Data')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style_section'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('global/tagify/tagify.css')); ?>">
    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding {
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js_section'); ?>
    <script src="<?php echo e(asset('global/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function() {
                $("#name").on("keyup", function(e) {
                    let inputValue = $(this).val();
                    let slug = inputValue.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
                    $("#slug").val(slug);
                })

                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ]
                });


                $(document).on('click', '#add-skill-btn', function() {
                    let skillItem = $('.skill-item').first().clone();
                    skillItem.find('input').val(''); // clear input values
                    $('#skill-container').append(skillItem);
                });

                // Remove skill item
                $(document).on('click', '.remove-skill-btn', function() {
                    // Ensure at least one remains
                    if ($('.skill-item').length > 1) {
                        $(this).closest('.skill-item').remove();
                    } else {
                        alert('At least one skill entry is required.');
                    }
                });

            });
        })(jQuery);

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function previewImageDetail(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_img_detail');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/Team\resources/views/edit.blade.php ENDPATH**/ ?>