<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Frontend Section')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Frontend Section')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Content')); ?> >> <?php echo e(__('translate.Frontend Section')); ?></p>
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
                                    <div class="container">
                                        <h4 class="mb-4"><?php echo e(__('translate.Theme Settings for')); ?>: <span class="badge bg-primary"><?php echo e($activeTheme); ?></span></h4>

                                        <!-- Tabs for pages -->
                                        <ul class="nav nav-tabs" id="pagesTabs" role="tablist">
                                            <?php $__currentLoopData = $sectionsByPage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $pageSections): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>"
                                                            id="<?php echo e($page); ?>-tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#<?php echo e($page); ?>"
                                                            type="button"
                                                            role="tab"
                                                            aria-controls="<?php echo e($page); ?>"
                                                            aria-selected="<?php echo e($loop->first ? 'true' : 'false'); ?>">
                                                        <?php echo e(ucfirst($page)); ?>

                                                        <span class="badge bg-secondary ms-1"><?php echo e(count($pageSections)); ?></span>
                                                    </button>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>

                                        <!-- Tab content -->
                                        <div class="tab-content" id="pagesTabsContent">
                                            <?php $__currentLoopData = $sectionsByPage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $pageSections): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?>"
                                                     id="<?php echo e($page); ?>"
                                                     role="tabpanel"
                                                     aria-labelledby="<?php echo e($page); ?>-tab">

                                                    <div class="row mt-4">
                                                        <?php $__currentLoopData = $pageSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-md-4 mb-4">
                                                                <div class="card h-100 section-card <?php echo e(isset($section['theme']) ? 'border-primary' : 'border-primary'); ?>">
                                                                    <div class="card-header bg-<?php echo e(isset($section['theme']) ? 'primary' : 'primary'); ?> text-white d-flex justify-content-between align-items-center">
                                                                        <h5 class="card-title mb-0"><?php echo e($section['name']); ?></h5>
                                                                        <?php if(isset($section['order'])): ?>
                                                                            <span class="badge bg-light text-dark">
                                                                                <?php echo e(__('translate.Order')); ?>: <?php echo e($section['order']); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                                                            <div>
                                                                                <?php if(isset($section['theme'])): ?>
                                                                                    <span class="badge bg-info"><?php echo e($section['theme']); ?></span>
                                                                                <?php endif; ?>
                                                                                <?php if(isset($section['common']) && $section['common']): ?>
                                                                                    <span class="badge bg-success"><?php echo e(__('translate.Common')); ?></span>
                                                                                <?php endif; ?>
                                                                            </div>

                                                                            <?php if(isset($section['content']) && isset($section['element'])): ?>
                                                                                <span class="badge bg-warning">
                                                                                    <?php echo e(__('translate.Content & Elements')); ?>

                                                                                </span>
                                                                            <?php elseif(isset($section['content'])): ?>
                                                                                <span class="badge bg-info">
                                                                                    <?php echo e(__('translate.Content')); ?>

                                                                                </span>
                                                                            <?php elseif(isset($section['element'])): ?>
                                                                                <span class="badge bg-secondary">
                                                                                    <?php echo e(__('translate.Elements')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>

                                                                        <p class="card-text">
                                                                            <?php if(isset($section['content'])): ?>
                                                                                <small><?php echo e(count($section['content'])); ?> <?php echo e(__('translate.content fields')); ?></small>
                                                                            <?php endif; ?>

                                                                            <?php if(isset($section['element'])): ?>
                                                                                <small><?php echo e(count($section['element'])); ?> <?php echo e(__('translate.element fields')); ?></small>
                                                                            <?php endif; ?>
                                                                        </p>

                                                                        <a href="<?php echo e(route('admin.front-end.section', ['id'=> $key, 'lang_code' => admin_lang()])); ?>"
                                                                           class="btn btn-primary mt-2">
                                                                            <i class="fas fa-edit"></i> <?php echo e(__('translate.Edit')); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style_section'); ?>
<style>
    .nav-tabs .nav-link {
        color: #6c757d;
    }

    .nav-tabs .nav-link.active {
        color: #0d6efd;
        font-weight: bold;
    }

    .card-header h5 {
        font-size: 1.1rem;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        max-width: 200px;
    }

    @media (max-width: 768px) {
        .card-header h5 {
            max-width: 150px;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/frontend-management/index.blade.php ENDPATH**/ ?>