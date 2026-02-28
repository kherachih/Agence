<?php $__env->startSection('title'); ?>
    <title><?php echo e($seo_setting->seo_title); ?></title>
    <meta name="title" content="<?php echo e($seo_setting->seo_title); ?>">
    <meta name="description" content="<?php echo strip_tags(clean($seo_setting->seo_description)); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('front-content'); ?>
    <?php echo $__env->make('breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- tg-contact-area-start -->
    <div class="tg-contact-area pt-130 p-relative z-index-1 pb-100">
        <img class="tg-team-shape-2 d-none d-md-block" src="assets/img/banner/banner-2/shape.png" alt="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="tg-team-details-contant tg-contact-info-wrap mb-30">
                        <h6 class="mb-15"><?php echo e(__('translate.Information')); ?>:</h6>
                        <p class="mb-25"><?php echo e(__('translate.Brendan Fraser, renowned actor of the silver screen')); ?></p>
                        <div class="tg-team-details-contact-info mb-35">
                            <div class="tg-team-details-contact">
                                <div class="item">
                                    <span><?php echo e(__('translate.Phone')); ?> :</span>
                                    <a href="tel:<?php echo e($contact_us->phone); ?>"><?php echo e($contact_us->phone); ?></a>
                                </div>
                                <div class="item">
                                    <span><?php echo e(__('translate.Website')); ?> : </span>
                                    <a target="__blank" href="<?php echo e(getLink($contact_us->website)); ?>"><?php echo e($contact_us->website); ?></a>
                                </div>
                                <div class="item">
                                    <span><?php echo e(__('translate.E-mail')); ?> : </span>
                                    <a href="mailto:<?php echo e($contact_us->email); ?>"><?php echo e($contact_us->email); ?></a>
                                </div>
                                <div class="item">
                                    <span><?php echo e(__('translate.Address')); ?> :</span>
                                    <a href="#"> <?php echo e($contact_us->address); ?> </a>
                                </div>
                            </div>
                        </div>
                        <div class="tg-contact-map h-100">
                            <iframe id="map" src="<?php echo e(html_decode($contact_us->map_code)); ?>"
                                allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="tg-contact-content-wrap ml-40 mb-30">
                        <h3 class="tg-contact-title mb-15"><?php echo e(__("translate.Let's connect and get to know")); ?> <br>
                            <?php echo e(__('translate.each other')); ?></h3>
                        <p class="mb-30">
                            <?php echo e(__('translate.Brendan Fraser, renowned actor of the silver screen, has taken on a new')); ?>

                        </p>
                        <div class="tg-contact-form tg-tour-about-review-form">
                            <?php if(isset($service)): ?>
                                <div class="alert alert-info">
                                    <?php echo e(__('translate.You are contacting us regarding')); ?>: <strong><?php echo e($service->title); ?></strong>
                                </div>
                            <?php endif; ?>
                            <form id="contact-form" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="instructor_id" value="0">
                                <?php if(isset($service)): ?>
                                    <input type="hidden" name="service_id" value="<?php echo e($service->id); ?>">
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-lg-6 mb-25">
                                        <input class="input" type="text" name="name"
                                            placeholder="<?php echo e(__('translate.Full Name')); ?> *"
                                            value="<?php echo e(html_decode(old('name'))); ?>">
                                        <span class="text-danger error-name"></span>
                                    </div>
                                    <div class="col-lg-6 mb-25">
                                        <input class="input" type="email" name="email"
                                            placeholder="<?php echo e(__('translate.Email')); ?>  *"
                                            value="<?php echo e(html_decode(old('email'))); ?>">
                                        <span class="text-danger error-email"></span>
                                    </div>
                                    <div class="col-lg-6 mb-25">
                                        <input class="input" type="text" name="phone"
                                            placeholder="<?php echo e(__('translate.Phone')); ?> *"
                                            value="<?php echo e(html_decode(old('phone'))); ?>">
                                        <span class="text-danger error-phone"></span>
                                    </div>
                                    <div class="col-lg-6 mb-25">
                                        <input class="input" type="text" name="subject"
                                            placeholder="<?php echo e(__('translate.Subject')); ?> *"
                                            value="<?php echo e(isset($service) ? __('translate.Tour Inquiry') . ': ' . $service->title : html_decode(old('subject'))); ?>">
                                        <span class="text-danger error-subject"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="textarea  mb-5" placeholder="<?php echo e(__('translate.Message')); ?> *" name="message"><?php echo e(html_decode(old('message'))); ?></textarea>
                                        <span class="text-danger error-message"></span>
                                        <div class="review-checkbox d-flex align-items-center mb-25">
                                            <input name="checkbox" class="tg-checkbox" type="checkbox" id="australia">
                                            <label for="australia"
                                                class="tg-label"><?php echo e(__('translate.Save my name, email, and phone in this browser for the next time I comment.')); ?></label>
                                        </div>
                                        <?php if($general_setting->recaptcha_status == 1): ?>
                                            <div class="contact_modal_form_item">
                                                <div class="g-recaptcha"
                                                    data-sitekey="<?php echo e($general_setting->recaptcha_site_key); ?>"></div>
                                            </div>
                                        <?php endif; ?>
                                        <button type="submit" class="tg-btn">
                                            <span class="loader-text d-none"><?php echo e(__('translate.Please wait')); ?></span>
                                            <span class="button-text"><?php echo e(__('translate.Send Message')); ?></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tg-contact-area-end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();

                let form = $(this)[0];
                let formData = new FormData(form);

                // Clear previous errors
                $('.text-danger').text('');
                $('.tg-btn').attr('disabled', 'disabled');
                $('.tg-btn .button-text').addClass('d-none');
                $('.tg-btn .loader-text').removeClass('d-none');

                axios.post("<?php echo e(route('store-contact-message')); ?>", formData)
                    .then(function(response) {
                        if (response.data.alert_type == 'success') {
                            toastr.success(response.data.message);
                            form.reset(); // Reset form
                        }
                    })
                    .catch(function(error) {
                        if (error.response && error.response.data && error.response.data.errors) {
                            let errors = error.response.data.errors;
                            $.each(errors, function(field, messages) {
                                $('.error-' + field).text(messages[0]);
                            });
                        } else {
                            $('.ajax-response').html(
                                '<span style="color:red;">An error occurred. Please try again.</span>'
                            );
                        }
                    }).finally(function() {
                        $('.tg-btn').removeAttr('disabled');
                        $('.tg-btn .button-text').removeClass('d-none');
                        $('.tg-btn .loader-text').addClass('d-none');
                    });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout_inner_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/contact_us.blade.php ENDPATH**/ ?>