<?php
    use Modules\Blog\App\Models\Blog;
    use Illuminate\Support\Str;

    $theme2_blog = getContent('theme2_blog.content', true);
    $blogs = Blog::with('translate:id,blog_id,lang_code,title,reading_time,description')
        ->where('status', true)
        ->latest()
        ->take(3)
        ->get();
?>

<!-- blog-area-start -->
<div class="tg-blog-area tg-blog-space-2 pt-130 p-relative z-index-1">
    <img class="tg-blog-2-shape p-absolute d-none d-xl-block" src="<?php echo e(asset('frontend/assets/img/shape/stadium.png')); ?>"
        alt="">
    <img class="tg-blog-2-shape-1 p-absolute d-none d-xl-block" src="<?php echo e(asset('frontend/assets/img/shape/book.png')); ?>"
        alt="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tg-location-section-title text-center mb-30">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".9s">
                        <?php echo e(getTranslatedValue($theme2_blog, 'sub_title')); ?>

                    </h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                        <?php echo e(getTranslatedValue($theme2_blog, 'title')); ?>

                    </h2>
                    <p class="text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s">
                        <?php echo strip_tags(clean(getTranslatedValue($theme2_blog, 'description')), '<br>'); ?>

                    </p>
                </div>
            </div>
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                    <div class="tg-blog-item tg-blog-2-item mb-25">
                        <div class="tg-blog-thumb p-relative fix mb-20">
                            <a href="<?php echo e(route('blog', ['slug' => $blog->slug])); ?>">
                                <img class="w-100" src="<?php echo e(asset($blog->image)); ?>"
                                    alt="<?php echo e($blog?->translate?->title); ?>"></a>
                            <span class="tg-blog-tag p-absolute"><?php echo e($blog?->category?->name); ?></span>
                        </div>
                        <div class="tg-blog-content  p-relative">
                            <h3 class="tg-blog-title">
                                <a href="<?php echo e(route('blog', ['slug' => $blog->slug])); ?>">
                                    <?php echo e($blog?->translate?->title); ?>

                                </a>
                            </h3>
                            <div class="tg-blog-date mb-10">
                                <span class="mr-20"><i class="fa-light fa-calendar"></i>
                                    <?php echo e($blog->created_at->format('jS M, Y')); ?></span>

                                <?php if($blog?->translate?->reading_time): ?>
                                    <span><i class="fa-regular fa-clock"></i>
                                        <?php echo e($blog?->translate?->reading_time); ?></span>
                                <?php endif; ?>
                            </div>
                            <p class="tg-blog-text mb-0">
                                <?php echo Str::limit($blog?->translate?->description, 100); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                <div class="tg-blog-bottom text-center pt-15">
                    <p> <?php echo e(__('translate.Want to see our Recent News & Updates?')); ?>. <a
                            href="<?php echo e(route('blogs')); ?>"><?php echo e(__('translate.Click here to View More')); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-area-end -->
<?php $__env->startPush('style_section'); ?>
    <style>
        .tg-blog-thumb.p-relative.fix.mb-20 img {
            height: 220px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme2/views/components/blog.blade.php ENDPATH**/ ?>