<?php $__env->startSection('title'); ?>
    <title><?php echo e($page_title); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e($page_title); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Frontend Section')); ?> >> <?php echo e($page_title); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <!-- Language Selection Section -->
    <section class="crancy-adashboard crancy-show language_box">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <div class="crancy-product-card translation_main_box">
                                        <div class="crancy-customer-filter">
                                            <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                                <div class="crancy-header__form crancy-header__form--customer">
                                                    <h4 class="crancy-product-card__title"><?php echo e(__('translate.Switch to language translation')); ?></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="translation_box">
                                            <ul>
                                                <?php $__currentLoopData = $language_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a href="<?php echo e(route('admin.front-end.section', ['id'=> $key,'lang_code' => $language->lang_code] )); ?>">
                                                            <?php if(request()->get('lang_code') == $language->lang_code): ?>
                                                                <i class="fas fa-eye"></i>
                                                            <?php else: ?>
                                                                <i class="fas fa-edit"></i>
                                                            <?php endif; ?>
                                                            <?php echo e($language->lang_name); ?>

                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                            <div class="alert alert-secondary" role="alert">
                                                <?php
                                                    $edited_language = $language_list->where('lang_code', request()->get('lang_code'))->first();
                                                ?>
                                                <p><?php echo e(__('translate.Your editing mode')); ?>: <b><?php echo e($edited_language->lang_name); ?></b></p>
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

    <!-- Content Edit Section -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="crancy-product-card mg-top-30">
                                <form action="<?php echo e(route('admin.front-end.store', ['key' => $key, 'id' => $frontend->id ?? null])); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type="hidden" name="type" value="<?php echo e($contentType); ?>">
                                    <input type="hidden" name="lang_code" value="<?php echo e(request()->get('lang_code')); ?>">

                                    <?php
                                        $isDefaultLanguage = $lang_code === 'en';
                                        $hasImages = isset($content['images']) && is_array($content['images']) && count($content['images']) > 0;
                                        $edited_language = $language_list->where('lang_code', request()->get('lang_code'))->first();
                                    ?>

                                    <?php if(!$isDefaultLanguage): ?>
                                        <div class="alert alert-info shadow-none" role="alert">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-info-circle me-3 fa-2x"></i>
                                                <div>
                                                    <h5 class="alert-heading mb-1"><?php echo e(__('translate.Translation mode')); ?>: <strong><?php echo e($edited_language->lang_name); ?></strong></h5>
                                                    <p class="mb-0"><?php echo e(__('translate.You are editing the French version of this section. Images and layout settings are inherited from the English version.')); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row">
                                        <?php if($isDefaultLanguage && $hasImages): ?>
                                            <div class="col-md-3 pr-md-4">
                                                <?php $__currentLoopData = $content['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imageKey => $imageDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $existingImagePath = $dataValues['images'][$imageKey] ?? null;
                                                    ?>
                                                    
                                                    <div class="crancy__item-form--group mb-4">
                                                        <label for="<?php echo e($imageKey); ?>" class="crancy__item-label">
                                                            <?php echo e(str_replace('_', ' ', ucfirst($imageKey))); ?>

                                                            <?php if(isset($imageDetails['required']) && $imageDetails['required']): ?>
                                                                <span class="text-danger">*</span>
                                                            <?php endif; ?>
                                                            <?php if(isset($imageDetails['size'])): ?>
                                                                <span data-toggle="tooltip" data-placement="top" class="fa fa-info-circle text--primary"
                                                                    title="<?php echo e(__('translate.Recommended image size')); ?>: <?php echo e($imageDetails['size']); ?>"></span>
                                                            <?php endif; ?>
                                                        </label>

                                                        <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                            <input type="file" id="<?php echo e($imageKey); ?>" name="<?php echo e($imageKey); ?>"
                                                                class="custom-file-input d-none <?php $__errorArgs = [$imageKey];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                accept="image/jpeg,image/png,image/gif,image/webp" onchange="previewImage(event, '<?php echo e($imageKey); ?>')"
                                                                <?php echo e((isset($imageDetails['required']) && $imageDetails['required'] && !$existingImagePath) ? 'required' : ''); ?>>

                                                            <label class="crancy-image-video-upload__label" for="<?php echo e($imageKey); ?>">
                                                                <img id="view_img_<?php echo e($imageKey); ?>"
                                                                    src="<?php echo e($existingImagePath ? asset($existingImagePath) : asset('backend/img/placeholder-image.jpg')); ?>"
                                                                    alt="<?php echo e(str_replace('_', ' ', ucfirst($imageKey))); ?>">
                                                                <h4 class="crancy-image-video-upload__title">
                                                                    <?php echo e(__('translate.Click here to')); ?>

                                                                    <span class="crancy-primary-color"><?php echo e(__('translate.Choose File')); ?></span>
                                                                    <?php echo e(__('translate.and upload')); ?>

                                                                </h4>
                                                            </label>

                                                            <?php if($existingImagePath): ?>
                                                                <input type="hidden" name="images_<?php echo e($imageKey); ?>_existing" value="<?php echo e($existingImagePath); ?>">
                                                                <div class="d-flex justify-content-end mt-2">
                                                                    <button type="button" class="btn btn-sm btn-danger" onclick="resetImage('<?php echo e($imageKey); ?>')">
                                                                        <i class="fas fa-times"></i> <?php echo e(__('translate.Remove')); ?>

                                                                    </button>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <?php $__errorArgs = [$imageKey];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="<?php echo e($isDefaultLanguage && $hasImages ? 'col-md-9 pl-md-4' : 'col-12'); ?>">
                                            <?php if($content): ?>
                                                <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($field !== 'images'): ?>
                                                        <?php if(is_array($value) && !isset($value['type'])): ?>
                                                            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subField => $subValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $subFieldValue = $dataValues[$field][$subField] ?? (is_scalar($subValue) ? $subValue : json_encode($subValue));
                                                                ?>
                                                                
                                                                <?php echo $__env->make('admin.frontend-management.fields.text', [
                                                                    'name' => $field . '[' . $subField . ']',
                                                                    'label' => str_replace('_', ' ', ucfirst($field)) . ' - ' . str_replace('_', ' ', ucfirst($subField)),
                                                                    'value' => $subFieldValue,
                                                                    'required' => false
                                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php
                                                                $fieldType = is_array($value) ? ($value['type'] ?? 'text') : 'text';
                                                                $fieldConfig = is_array($value) ? $value : ['type' => 'text', 'required' => false];
                                                                $fieldValue = is_array($value) ? ($dataValues[$field] ?? null) : ($dataValues[$field] ?? $value);
                                                                
                                                                // Skip image fields in the default language if we have a separate image column
                                                                $skipField = $isDefaultLanguage && $fieldType === 'image' && $hasImages;
                                                            ?>

                                                            <?php if(!$skipField): ?>
                                                                <?php echo $__env->make('admin.frontend-management.fields.' . $fieldType, [
                                                                    'name' => $field,
                                                                    'label' => str_replace('_', ' ', ucfirst($field)),
                                                                    'value' => $fieldValue,
                                                                    'required' => $fieldConfig['required'] ?? false,
                                                                    'help' => $fieldConfig['help'] ?? null,
                                                                    'options' => $fieldConfig['options'] ?? [],
                                                                    'fields' => $fieldConfig['fields'] ?? []
                                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <p><?php echo e(__('translate.Nothing to display')); ?></p>
                                            <?php endif; ?>

                                            <button type="submit" class="crancy-btn mg-top-25"><?php echo e(__('translate.Update')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style_section'); ?>
<style>
    .crancy-product-card__upload--border img {
        max-height: 200px !important;
    }

    .crancy__item-form--group{
        margin-bottom: 20px;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js_section'); ?>
<script>
"use strict";

function previewImage(event, target_view_id) {
    if (!event || !event.target || !event.target.files || !event.target.files[0]) {
        return;
    }
    
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById(`view_img_${target_view_id}`);
        if (output) {
            output.src = reader.result;
        }
    }
    reader.readAsDataURL(event.target.files[0]);
    
    // If we have a hidden input for existing image, mark it for deletion
    const existingInput = document.querySelector(`input[name="images_${target_view_id}_existing"]`) || 
                          document.querySelector(`input[name="${target_view_id}_existing"]`);
    if (existingInput) {
        existingInput.value = '';
    }
}

function resetImage(target_view_id) {
    // Clear the file input
    const input = document.getElementById(target_view_id);
    if (input) {
        input.value = '';
    }

    // Reset the preview image to placeholder
    const output = document.getElementById(`view_img_${target_view_id}`);
    if (output) {
        output.src = '<?php echo e(asset('backend/img/placeholder-image.jpg')); ?>';
    }

    // Mark existing image for deletion
    const existingInput = document.querySelector(`input[name="images_${target_view_id}_existing"]`) || 
                          document.querySelector(`input[name="${target_view_id}_existing"]`);
    if (existingInput) {
        existingInput.value = '';
    }
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/frontend-management/edit.blade.php ENDPATH**/ ?>