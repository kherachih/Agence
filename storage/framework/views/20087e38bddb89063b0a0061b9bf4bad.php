<?php
    use Modules\Blog\App\Models\Blog;
    use Illuminate\Support\Str;

    $theme7_blog = getContent('theme7_blog.content', true);
    $blogs = Blog::with('translate:id,blog_id,lang_code,title,reading_time,description')
        ->where('status', true)
        ->latest()
        ->take(3)
        ->get();
?>

<!-- blog-area-start -->
<div class="tg-blog-area tg-blog-space tg-grey-bg pt-135 p-relative z-index-1">
    <img class="tg-blog-shape" src="<?php echo e(asset('frontend/assets/img/shape/map-shape-10.png')); ?>" alt="shape">
    <img class="tg-blog-shape-2" src="<?php echo e(asset('frontend/assets/img/shape/map-shape-11.png')); ?>" alt="shape">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tg-location-section-title text-center mb-30">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".9s">
                        <?php echo e(getTranslatedValue($theme7_blog, 'sub_title')); ?>

                    </h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                        <?php echo strip_tags(clean(getTranslatedValue($theme7_blog, 'title')), '<br>'); ?>

                    </h2>
                    <p class="text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s">
                        <?php echo strip_tags(clean(getTranslatedValue($theme7_blog, 'description')), '<br>'); ?>

                    </p>
                </div>
            </div>
            <?php if($blogs->count() > 0): ?>
                <?php
                    $firstBlog = $blogs->get(0);
                    $restBlogs = $blogs->slice(1);
                ?>
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay=".4s" data-wow-duration=".9s">
                    <div class="tg-blog-item mb-25">
                        <div class="tg-blog-thumb fix left-side-img">
                            <a href="<?php echo e(route('blog', ['slug' => $firstBlog->slug])); ?>">
                                <img class="w-100" src="<?php echo e(asset($firstBlog->image)); ?>"
                                    alt="<?php echo e($firstBlog?->translate?->title); ?>">
                            </a>
                        </div>
                        <div class="tg-blog-content  p-relative">
                            <span class="tg-blog-tag p-absolute"><?php echo e($firstBlog?->category?->name); ?></span>
                            <h3 class="tg-blog-title">
                                <a href="<?php echo e(route('blog', ['slug' => $firstBlog->slug])); ?>">
                                    <?php echo e($firstBlog?->translate?->title); ?>

                                </a>
                            </h3>
                            <div class="tg-blog-date">
                                <span class="mr-20">
                                    <i class="fa-light fa-calendar"></i>
                                    <?php echo e($firstBlog->created_at->format('jS M, Y')); ?>

                                </span>
                                <?php if($firstBlog?->translate?->reading_time): ?>
                                    <span><i class="fa-regular fa-clock"></i>
                                        <?php echo e($firstBlog?->translate?->reading_time); ?> </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <?php $__currentLoopData = $restBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 wow fadeInRight" data-wow-delay=".<?php echo e($i + 4); ?>s"
                                data-wow-duration=".9s">
                                <div class="tg-blog-item mb-20">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5">
                                            <div class="tg-blog-thumb fix right-side-img">
                                                <a href="<?php echo e(route('blog', ['slug' => $blog->slug])); ?>"><img
                                                        class="w-100" src="<?php echo e(asset($blog->image)); ?>"
                                                        alt="<?php echo e($blog?->translate?->title); ?>"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="tg-blog-contents">
                                                <span class="tg-blog-tag d-inline-block mb-10">
                                                    <?php echo e($blog?->category?->name); ?>

                                                </span>
                                                <h3 class="tg-blog-title title-2 mb-0">
                                                    <a href="<?php echo e(route('blog', ['slug' => $blog->slug])); ?>">
                                                        <?php echo e($blog?->translate?->title); ?>

                                                    </a>
                                                </h3>
                                                <div class="tg-blog-date">
                                                    <span class="mr-20"><i class="fa-light fa-calendar"></i>
                                                        <?php echo e($blog->created_at->format('jS M, Y')); ?>

                                                    </span>
                                                    <?php if($blog?->translate?->reading_time): ?>
                                                        <span><i class="fa-regular fa-clock"></i>
                                                            <?php echo e($blog?->translate?->reading_time); ?> </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-12 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                <div class="tg-blog-bottom text-center pt-25">
                    <p> <?php echo e(__('translate.Want to see our Recent News & Updates.')); ?> <a
                            href="<?php echo e(route('blogs')); ?>"><?php echo e(__('translate.Click here to View More')); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-area-end -->

<?php $__env->startPush('style_section'); ?>
    <style>
        .tg-blog-thumb.fix.left-side-img img {
            height: 260px;
        }

        .tg-blog-thumb.fix.right-side-img img {
            height: 167px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme7/views/components/blog.blade.php ENDPATH**/ ?>