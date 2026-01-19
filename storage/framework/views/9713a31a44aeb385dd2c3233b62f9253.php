

<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Agency Registration')); ?> - <?php echo e($general_setting->site_name ?? 'TourEx'); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('front-content'); ?>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg"
        data-background="<?php echo e(asset('frontend/assets/img/bg/breadcrumb_bg.jpg')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title"><?php echo e(__('translate.Agency Registration')); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('translate.Home')); ?></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo e(__('translate.Agency Registration')); ?>

                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- agency-registration-area -->
    <section class="contact-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center mb-50">
                        <h2 class="title"><?php echo e(__('translate.Become a Travel Agency Partner')); ?></h2>
                        <p><?php echo e(__('translate.Fill out the form below to submit your agency registration. Our team will review your application and contact you within 2-3 business days.')); ?>

                        </p>
                    </div>

                    <form action="<?php echo e(route('agency.submit-application')); ?>" method="POST" enctype="multipart/form-data"
                        id="agencyRegistrationForm">
                        <?php echo csrf_field(); ?>

                        <!-- Step 1: Basic Agency Information -->
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0"><i
                                        class="fas fa-building mr-2"></i><?php echo e(__('translate.Agency Information')); ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="agency_name" class="form-label"><?php echo e(__('translate.Agency Name')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="agency_name" name="agency_name"
                                            value="<?php echo e(old('agency_name')); ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="agency_slug" class="form-label"><?php echo e(__('translate.Agency Slug')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="agency_slug" name="agency_slug"
                                            value="<?php echo e(old('agency_slug')); ?>" required readonly>
                                        <small
                                            class="form-text text-muted"><?php echo e(__('translate.Auto-generated from agency name')); ?></small>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label"><?php echo e(__('translate.Email Address')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?php echo e(old('email')); ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label"><?php echo e(__('translate.Phone Number')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="<?php echo e(old('phone')); ?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label"><?php echo e(__('translate.Password')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <small
                                            class="form-text text-muted"><?php echo e(__('translate.Minimum 6 characters')); ?></small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password_confirmation"
                                            class="form-label"><?php echo e(__('translate.Confirm Password')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="about_agency" class="form-label"><?php echo e(__('translate.About Agency')); ?> <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="about_agency" name="about_agency" rows="4"
                                        required><?php echo e(old('about_agency')); ?></textarea>
                                    <small
                                        class="form-text text-muted"><?php echo e(__('translate.Describe your agency, services, and experience')); ?></small>
                                </div>

                                <div class="mb-3">
                                    <label for="agency_logo" class="form-label"><?php echo e(__('translate.Agency Logo')); ?> <span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="agency_logo" name="agency_logo"
                                        accept="image/*" required onchange="previewImage(event, 'logo_preview')">
                                    <div class="mt-2">
                                        <img id="logo_preview" src="#" alt="Logo Preview"
                                            style="max-width: 200px; display: none;" class="img-thumbnail">
                                    </div>
                                    <small
                                        class="form-text text-muted"><?php echo e(__('translate.Max size: 2MB. Formats: JPG, PNG, GIF')); ?></small>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Required Documents -->
                        <div class="card mb-4">
                            <div class="card-header bg-danger text-white">
                                <h4 class="mb-0"><i
                                        class="fas fa-file-alt mr-2"></i><?php echo e(__('translate.Required Documents')); ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i>
                                    <?php echo e(__('translate.Please upload clear copies of the following required documents. Accepted formats: PDF, JPG, PNG.')); ?>

                                </div>

                                <div class="mb-3">
                                    <label for="business_license" class="form-label"><?php echo e(__('translate.Business License')); ?>

                                        <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="business_license" name="business_license"
                                        accept=".pdf,.jpg,.jpeg,.png" required>
                                    <small class="form-text text-muted"><?php echo e(__('translate.Max size: 5MB')); ?></small>
                                </div>

                                <div class="mb-3">
                                    <label for="id_document" class="form-label"><?php echo e(__('translate.Manager ID Document')); ?>

                                        <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="id_document" name="id_document"
                                        accept=".pdf,.jpg,.jpeg,.png" required>
                                    <small
                                        class="form-text text-muted"><?php echo e(__('translate.Passport or National ID of the agency manager. Max size: 5MB')); ?></small>
                                </div>

                                <div class="mb-3">
                                    <label for="tax_certificate"
                                        class="form-label"><?php echo e(__('translate.Tax Certificate')); ?></label>
                                    <input type="file" class="form-control" id="tax_certificate" name="tax_certificate"
                                        accept=".pdf,.jpg,.jpeg,.png">
                                    <small
                                        class="form-text text-muted"><?php echo e(__('translate.Optional. Max size: 5MB')); ?></small>
                                </div>

                                <div class="mb-3">
                                    <label for="insurance_document"
                                        class="form-label"><?php echo e(__('translate.Insurance Document')); ?></label>
                                    <input type="file" class="form-control" id="insurance_document"
                                        name="insurance_document" accept=".pdf,.jpg,.jpeg,.png">
                                    <small
                                        class="form-text text-muted"><?php echo e(__('translate.Optional. Max size: 5MB')); ?></small>
                                </div>

                                <div class="mb-3">
                                    <label for="other_documents"
                                        class="form-label"><?php echo e(__('translate.Other Documents')); ?></label>
                                    <input type="file" class="form-control" id="other_documents" name="other_documents[]"
                                        accept=".pdf,.jpg,.jpeg,.png" multiple>
                                    <small
                                        class="form-text text-muted"><?php echo e(__('translate.You can upload multiple files. Max size per file: 5MB')); ?></small>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Location Information -->
                        <div class="card mb-4">
                            <div class="card-header bg-success text-white">
                                <h4 class="mb-0"><i
                                        class="fas fa-map-marker-alt mr-2"></i><?php echo e(__('translate.Location Information')); ?>

                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="country" class="form-label"><?php echo e(__('translate.Country')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="country" name="country"
                                            value="<?php echo e(old('country')); ?>" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state" class="form-label"><?php echo e(__('translate.State')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="state" name="state"
                                            value="<?php echo e(old('state')); ?>" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="city" class="form-label"><?php echo e(__('translate.City')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city"
                                            value="<?php echo e(old('city')); ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label"><?php echo e(__('translate.Full Address')); ?> <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="address" name="address" rows="2"
                                        required><?php echo e(old('address')); ?></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="website" class="form-label"><?php echo e(__('translate.Website')); ?></label>
                                        <input type="url" class="form-control" id="website" name="website"
                                            value="<?php echo e(old('website')); ?>" placeholder="https://">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="location_map"
                                            class="form-label"><?php echo e(__('translate.Google Map Link')); ?></label>
                                        <input type="url" class="form-control" id="location_map" name="location_map"
                                            value="<?php echo e(old('location_map')); ?>" placeholder="https://">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Social Media -->
                        <div class="card mb-4">
                            <div class="card-header bg-info text-white">
                                <h4 class="mb-0"><i class="fas fa-share-alt mr-2"></i><?php echo e(__('translate.Social Media')); ?>

                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="facebook" class="form-label"><i class="fab fa-facebook"></i>
                                            <?php echo e(__('translate.Facebook')); ?></label>
                                        <input type="url" class="form-control" id="facebook" name="facebook"
                                            value="<?php echo e(old('facebook')); ?>" placeholder="https://">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="linkedin" class="form-label"><i class="fab fa-linkedin"></i>
                                            <?php echo e(__('translate.Linkedin')); ?></label>
                                        <input type="url" class="form-control" id="linkedin" name="linkedin"
                                            value="<?php echo e(old('linkedin')); ?>" placeholder="https://">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="twitter" class="form-label"><i class="fab fa-twitter"></i>
                                            <?php echo e(__('translate.Twitter')); ?></label>
                                        <input type="url" class="form-control" id="twitter" name="twitter"
                                            value="<?php echo e(old('twitter')); ?>" placeholder="https://">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="instagram" class="form-label"><i class="fab fa-instagram"></i>
                                            <?php echo e(__('translate.Instagram')); ?></label>
                                        <input type="url" class="form-control" id="instagram" name="instagram"
                                            value="<?php echo e(old('instagram')); ?>" placeholder="https://">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-paper-plane mr-2"></i><?php echo e(__('translate.Submit Application')); ?>

                            </button>
                        </div>

                        <div class="alert alert-warning mt-4">
                            <i class="fas fa-exclamation-triangle"></i>
                            <?php echo e(__('translate.By submitting this application, you confirm that all information provided is accurate and complete. Providing false information may result in rejection of your application.')); ?>

                        </div>

                        <div class="text-center mt-3">
                            <p><?php echo e(__('translate.Already have an account?')); ?> <a
                                    href="<?php echo e(route('user.login')); ?>"><?php echo e(__('translate.Login here')); ?></a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- agency-registration-area-end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
    <script>
        "use strict";

        document.addEventListener('DOMContentLoaded', function () {
            // Auto-generate slug from agency name
            const agencyNameInput = document.getElementById('agency_name');
            const agencySlugInput = document.getElementById('agency_slug');

            if (agencyNameInput && agencySlugInput) {
                agencyNameInput.addEventListener('input', function () {
                    const slug = agencyNameInput.value
                        .toLowerCase()
                        .trim()
                        .replace(/[^a-z0-9\s-]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-');
                    agencySlugInput.value = slug;
                });
            }
        });

        // Preview image function
        function previewImage(event, previewId) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById(previewId);
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style_section'); ?>
    <style>
        .card-header {
            padding: 1rem 1.25rem;
        }

        .card-header h4 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout_inner_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/agency_registration/register.blade.php ENDPATH**/ ?>