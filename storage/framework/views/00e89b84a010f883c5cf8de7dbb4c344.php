<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Theme language')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Theme language')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Theme language')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
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
                                                <li><a href="<?php echo e(route('admin.theme-language', ['lang_code' => $language->lang_code] )); ?>">
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
                            <?php
                                // Paginate the translations to improve performance and avoid form size limitations
                                $perPage = 100;
                                $currentPage = request('page', 1);
                                $dataArray = collect($data);
                                $paginatedData = $dataArray->forPage($currentPage, $perPage);
                                $lastPage = ceil($dataArray->count() / $perPage);
                            ?>
                            
                            <div class="row mb-5">
                                <div class="col-12 mg-top-30">
                                    <div class="crancy-product-card translation_main_box">
                                        <div class="mb-4">
                                            <div class="alert alert-info">
                                                <p>Showing translations <?php echo e(($currentPage - 1) * $perPage + 1); ?> to <?php echo e(min($currentPage * $perPage, $dataArray->count())); ?> of <?php echo e($dataArray->count()); ?></p>
                                                <p><strong>Note:</strong> You must save each page separately before moving to another page.</p>
                                            </div>
                                            
                                            <div class="pagination mb-3">
                                                <?php for($i = 1; $i <= $lastPage; $i++): ?>
                                                    <a href="<?php echo e(route('admin.theme-language', ['lang_code' => request('lang_code'), 'page' => $i])); ?>" 
                                                    class="btn <?php echo e($currentPage == $i ? 'btn-primary' : 'btn-outline-primary'); ?> me-1">
                                                        <?php echo e($i); ?>

                                                    </a>
                                                <?php endfor; ?>
                                            </div>
                                            
                                            <!-- Quick search within current page -->
                                            <div class="mb-3">
                                                <input type="text" id="translationSearch" class="form-control" placeholder="Search in current page...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="<?php echo e(route('admin.update-theme-language')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                
                                <input type="hidden" name="lang_code" value="<?php echo e(request()->get('lang_code')); ?>">
                                <input type="hidden" name="page" value="<?php echo e($currentPage); ?>">

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title"><?php echo e(__('translate.Theme language')); ?></h4>
                                            </div>

                                            <div class="row mg-top-30">
                                                <?php $__currentLoopData = $paginatedData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-12 translation-item">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label"><?php echo e($index); ?> </label>
                                                            <input class="crancy__item-input" type="text" name="values[<?php echo e($index); ?>]"  value="<?php echo e($value); ?>">
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->startPush('js_section'); ?>
<script>
    // Simple client-side search functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('translationSearch');
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const items = document.querySelectorAll('.translation-item');
                
                items.forEach(item => {
                    const label = item.querySelector('.crancy__item-label').textContent.toLowerCase();
                    const input = item.querySelector('.crancy__item-input').value.toLowerCase();
                    
                    if (label.includes(searchTerm) || input.includes(searchTerm)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/Language\Resources/views/theme_language.blade.php ENDPATH**/ ?>