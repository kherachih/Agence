<?php $__env->startSection('title'); ?>
<title><?php echo e($custom_page->page_name); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('front-content'); ?>

  <?php echo $__env->make('breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section>
      <div class="td_height_100 td_height_lg_50"></div>
        <div class="container">
          <div class="row td_gap_y_50">
            <div class="col-lg-12">
              <div class="td_blog_details">

                <?php echo clean($custom_page->description); ?>


              </div>
            </div>

          </div>
        </div>
      <div class="td_height_100 td_height_lg_50"></div>
  </section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout_inner_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/custom_page.blade.php ENDPATH**/ ?>