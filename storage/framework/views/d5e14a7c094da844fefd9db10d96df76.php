<?php
    use Modules\Blog\App\Models\Blog;
    use Illuminate\Support\Str;

    $theme3_blog = getContent('theme3_blog.content', true);
    $blogs = Blog::with('translate:id,blog_id,lang_code,title,reading_time,description')
        ->where('status', true)
        ->latest()
        ->take(3)
        ->get();
?>

<!-- blog-area-start -->
<div class="tg-blog-area tg-blog-space-2 tg-blog-su-wrapper pt-130 p-relative z-index-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="tg-location-section-title text-center mb-30">
                    <h5 class="tg-section-su-subtitle su-subtitle-2 mb-20 wow fadeInUp" data-wow-delay=".4s"
                        data-wow-duration=".9s">
                        <?php echo e(getTranslatedValue($theme3_blog, 'sub_title')); ?>

                    </h5>
                    <h2 class="tg-section-su-title text-capitalize wow fadeInUp mb-15" data-wow-delay=".5s"
                        data-wow-duration=".9s">
                        <?php echo e(getTranslatedValue($theme3_blog, 'title')); ?>

                    </h2>
                    <p class="tg-section-su-para tg-section-su-para-2 mb-10">
                        <?php echo strip_tags(clean(getTranslatedValue($theme3_blog, 'description')), '<br>'); ?>

                    </p>
                </div>
            </div>
        </div>
        <?php if(count($blogs) > 0): ?>
            <div class="row">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay=".4s" data-wow-duration=".9s">
                        <div class="tg-blog-item tg-blog-2-item mb-25">
                            <div class="tg-blog-thumb p-relative fix mb-25">
                                <a href="<?php echo e(route('blog', ['slug' => $blog->slug])); ?>">
                                    <img class="w-100" src="<?php echo e(asset($blog->image)); ?>"
                                        alt="<?php echo e($blog?->translate?->title); ?>">
                                </a>
                                <span class="tg-blog-tag p-absolute"><?php echo e($blog?->category?->name); ?></span>
                            </div>
                            <div class="tg-blog-content  p-relative">
                                <h3 class="tg-blog-title mb-15">
                                    <a href="<?php echo e(route('blog', ['slug' => $blog->slug])); ?>">
                                        <?php echo e($blog?->translate?->title); ?>

                                    </a>
                                </h3>
                                <div class="tg-blog-date">
                                    <span class="mr-20"><i class="fa-light fa-calendar"></i>
                                        <?php echo e($blog->created_at->format('jS M, Y')); ?></span>
                                    <?php if($blog?->translate?->reading_time): ?>
                                        <span><i class="fa-regular fa-clock"></i>
                                            <?php echo e($blog?->translate?->reading_time); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- blog-area-end -->
<?php $__env->startPush('style_section'); ?>
    <style>
        .tg-blog-thumb.p-relative.fix.mb-25 img {
            height: 260px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme3/views/components/blog.blade.php ENDPATH**/ ?>