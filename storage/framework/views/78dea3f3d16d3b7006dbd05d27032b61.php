<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Services wishlist')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Services wishlist')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Services wishlist')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style_section'); ?>
    <style>
        .tg-listing-card-item {
            background: #ffffff;
            border: 1px solid #e3e3e3;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .tg-listing-card-thumb {
            border-radius: 12px 12px 0px 0px;
            position: relative;
        }

        .tg-listing-card-thumb {
            border-radius: 12px 12px 0px 0px;
            position: relative;
        }

        .tg-listing-card-content {
            padding: 20px;
        }

        .tg-listing-2-price {
            font-weight: 600;
            text-transform: capitalize;
            color: #efefef;
            border: 1px solid #3c4fc9;
            border-radius: 100px;
            padding: 1px 15px;
            display: inline-block;
            background: #560ce3;
            position: relative;
            position: absolute;
            bottom: 14px;
            z-index: 100000;
            left: 8px;
        }

        h4.tg-listing-card-title {
            margin-bottom: 4px;
        }

        .tg-listing-2-price del {
            color: #dbe6f7;
            font-size: 12px;
            font-weight: 500;
        }

        .tg-listing-card-review i {
            color: #ababab;
            font-size: 14px;
        }

        .tg-listing-card-review i.active {
            color: #ff9901;
        }

        .tg-listing-card-thumb img {
            height: 230px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body-content'); ?>
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12 mg-top-30">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="ed-watch-page-wrapper">
                                <div class="ed-watch-main-wrapper">
                                    <div class="ed-watch-content-wrapper">
                                        <div class="ed-watch-content-main-wrapper">
                                            <?php if($services->count() > 0): ?>
                                                <div class="tg-listing-grid-item">
                                                    <div class="row list-card">
                                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 tg-grid-full">
                                                                <div
                                                                    class="tg-listing-card-item tg-listing-4-card-item mb-25">
                                                                    <div
                                                                        class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                                                                        <a class="w-100"
                                                                            href="<?php echo e(route('front.tourbooking.services.show', ['slug' => $service?->slug])); ?>">
                                                                            <img class="tg-card-border w-100"
                                                                                src="<?php echo e(asset('storage/' . $service?->thumbnail?->file_path)); ?>"
                                                                                alt="<?php echo e($service?->thumbnail?->caption ?? $service?->translation?->title); ?>">
                                                                        </a>
                                                                        <div class="tg-listing-2-price">
                                                                            <?php echo $service->price_display; ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="tg-listing-card-content p-relative">
                                                                        <h4 class="tg-listing-card-title">
                                                                            <a
                                                                                href="<?php echo e(route('front.tourbooking.services.show', ['slug' => $service?->slug])); ?>">
                                                                                <?php echo e(Str::limit($service?->translation?->title, 45)); ?>

                                                                            </a>
                                                                        </h4>
                                                                        <span
                                                                            class="tg-listing-card-duration-map d-inline-block mb-2">
                                                                            <svg width="13" height="16"
                                                                                viewBox="0 0 13 16" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="1.15556"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                                <path
                                                                                    d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="1.15556"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                            <?php echo e($service?->location); ?>

                                                                        </span>
                                                                        <div class="mb-2">
                                                                            <?php echo $__env->make(
                                                                                'tourbooking::front.services.ratting',
                                                                                [
                                                                                    'avgRating' =>
                                                                                        $service?->active_reviews_avg_rating ??
                                                                                        0,
                                                                                    'ratingCount' =>
                                                                                        $service?->active_reviews_count ??
                                                                                        0,
                                                                                ]
                                                                            , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                        </div>
                                                                        <div
                                                                            class="tg-listing-avai d-flex align-items-center justify-content-between">
                                                                            <a class="tg-listing-avai-btn"
                                                                                href="<?php echo e(route('front.tourbooking.services.show', ['slug' => $service?->slug])); ?>">Check
                                                                                Availability</a>
                                                                            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                                                'tg-listing-item-wishlist',
                                                                                'active' => $service?->my_wishlist_exists == 1,
                                                                            ]); ?>"
                                                                                data-url="<?php echo e(route('user.wishlist.store')); ?>"
                                                                                onclick="addToWishlist(<?php echo e($service->id); ?>, this, 'service')">
                                                                                <a href="javascript:void(0);">
                                                                                    <svg width="20" height="18"
                                                                                        viewBox="0 0 20 18" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" />
                                                                                    </svg>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-12">
                                                    Data Not found.
                                                </div>
                                            <?php endif; ?>
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
    <!-- End crancy Dashboard -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js_section'); ?>
    <script src="<?php echo e(asset('global/sweetalert/sweetalert2@11.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/assets/js/cart.js')); ?>"></script>

    <script>
        "use strict";
        $(function() {

            $(".add_to_cart").on("click", function(e) {

                let course_id = $(this).data('course_id');

                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(url('add-to-card')); ?>" + "/" + course_id,
                    success: function(response) {
                        toastr.success(response.message);

                        let total_cart = $('#total_cart').html();
                        total_cart = parseInt(total_cart) + parseInt(1);
                        $('#total_cart').html(total_cart);

                    },
                    error: function(err) {

                        if (err.status == 403) {
                            toastr.error(err.responseJSON.message)
                        } else {
                            toastr.error(`<?php echo e(__('translate.Server error occured')); ?>`)
                        }

                    }
                });

            })


        });

        function removeWishlist(id) {
            Swal.fire({
                title: "<?php echo e(__('translate.Are you realy want to delete this item ?')); ?>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "<?php echo e(__('translate.Yes, Delete It')); ?>",
                cancelButtonText: "<?php echo e(__('translate.Cancel')); ?>",
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#remove_listing_" + id).submit();
                }

            })
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/Wishlist\resources/views/services-list.blade.php ENDPATH**/ ?>