

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Add Passenger Information')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Bookings')); ?> >>
        <?php echo e(__('translate.Add Passenger Information')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <?php if(session('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                    <?php echo e(session('error')); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <?php if(session('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                    <?php echo e(session('success')); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <!-- Booking Summary -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title mb-3"><?php echo e(__('translate.Booking Summary')); ?></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong><?php echo e(__('translate.Booking Code')); ?>:</strong>
                                                #<?php echo e($booking->booking_code); ?></p>
                                            <p><strong><?php echo e(__('translate.Service')); ?>:</strong>
                                                <?php echo e($booking->service->title ?? 'N/A'); ?></p>
                                            <p><strong><?php echo e(__('translate.Check In')); ?>:</strong>
                                                <?php echo e($booking->check_in_date ? $booking->check_in_date->format('d M Y') : 'N/A'); ?>

                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong><?php echo e(__('translate.Check Out')); ?>:</strong>
                                                <?php echo e($booking->check_out_date ? $booking->check_out_date->format('d M Y') : 'N/A'); ?>

                                            </p>
                                            <p><strong><?php echo e(__('translate.Adults')); ?>:</strong> <?php echo e($booking->adults); ?></p>
                                            <p><strong><?php echo e(__('translate.Children')); ?>:</strong> <?php echo e($booking->children); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Passenger Form -->
                            <form action="<?php echo e(route('user.passengers.store', $booking)); ?>" method="POST"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div id="passenger-forms-container">
                                    <?php for($i = 0; $i < $totalPassengers; $i++): ?>
                                        <div class="card mb-3 passenger-card" data-index="<?php echo e($i); ?>">
                                            <div class="card-header">
                                                <h5 class="mb-0">
                                                    <?php echo e(__('translate.Passenger')); ?> <?php echo e($i + 1); ?>

                                                    <?php if($i === 0): ?>
                                                        <span class="badge bg-primary ms-2"><?php echo e(__('translate.Primary')); ?></span>
                                                    <?php endif; ?>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- First Name -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">
                                                            <?php echo e(__('translate.First Name')); ?> <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text"
                                                            class="form-control <?php $__errorArgs = ['passengers.' . $i . '.first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="passengers[<?php echo e($i); ?>][first_name]"
                                                            value="<?php echo e(old('passengers.' . $i . '.first_name')); ?>" required>
                                                        <?php $__errorArgs = ['passengers.' . $i . '.first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <!-- Last Name -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">
                                                            <?php echo e(__('translate.Last Name')); ?> <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text"
                                                            class="form-control <?php $__errorArgs = ['passengers.' . $i . '.last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="passengers[<?php echo e($i); ?>][last_name]"
                                                            value="<?php echo e(old('passengers.' . $i . '.last_name')); ?>" required>
                                                        <?php $__errorArgs = ['passengers.' . $i . '.last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <!-- Date of Birth -->
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Date of Birth')); ?></label>
                                                        <input type="date"
                                                            class="form-control <?php $__errorArgs = ['passengers.' . $i . '.date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="passengers[<?php echo e($i); ?>][date_of_birth]"
                                                            value="<?php echo e(old('passengers.' . $i . '.date_of_birth')); ?>">
                                                        <?php $__errorArgs = ['passengers.' . $i . '.date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <!-- Gender -->
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Gender')); ?></label>
                                                        <select
                                                            class="form-select <?php $__errorArgs = ['passengers.' . $i . '.gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="passengers[<?php echo e($i); ?>][gender]">
                                                            <option value=""><?php echo e(__('translate.Select')); ?></option>
                                                            <option value="male" <?php echo e(old('passengers.' . $i . '.gender') == 'male' ? 'selected' : ''); ?>>
                                                                <?php echo e(__('translate.Male')); ?>

                                                            </option>
                                                            <option value="female" <?php echo e(old('passengers.' . $i . '.gender') == 'female' ? 'selected' : ''); ?>>
                                                                <?php echo e(__('translate.Female')); ?>

                                                            </option>
                                                            <option value="other" <?php echo e(old('passengers.' . $i . '.gender') == 'other' ? 'selected' : ''); ?>>
                                                                <?php echo e(__('translate.Other')); ?>

                                                            </option>
                                                        </select>
                                                        <?php $__errorArgs = ['passengers.' . $i . '.gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <!-- Nationality -->
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Nationality')); ?></label>
                                                        <input type="text"
                                                            class="form-control <?php $__errorArgs = ['passengers.' . $i . '.nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="passengers[<?php echo e($i); ?>][nationality]"
                                                            value="<?php echo e(old('passengers.' . $i . '.nationality')); ?>"
                                                            placeholder="<?php echo e(__('translate.e.g., French')); ?>">
                                                        <?php $__errorArgs = ['passengers.' . $i . '.nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <!-- Passport Number -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Passport Number')); ?></label>
                                                        <input type="text"
                                                            class="form-control <?php $__errorArgs = ['passengers.' . $i . '.passport_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="passengers[<?php echo e($i); ?>][passport_number]"
                                                            value="<?php echo e(old('passengers.' . $i . '.passport_number')); ?>"
                                                            placeholder="<?php echo e(__('translate.e.g., AB1234567')); ?>">
                                                        <?php $__errorArgs = ['passengers.' . $i . '.passport_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <!-- Passport Expiry Date -->
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            class="form-label"><?php echo e(__('translate.Passport Expiry Date')); ?></label>
                                                        <input type="date"
                                                            class="form-control <?php $__errorArgs = ['passengers.' . $i . '.passport_expiry_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="passengers[<?php echo e($i); ?>][passport_expiry_date]"
                                                            value="<?php echo e(old('passengers.' . $i . '.passport_expiry_date')); ?>">
                                                        <?php $__errorArgs = ['passengers.' . $i . '.passport_expiry_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <!-- Travel Documents Upload -->
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">
                                                            <?php echo e(__('translate.Travel Documents')); ?> <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <input type="file"
                                                            class="form-control travel-documents-input <?php $__errorArgs = ['passengers.' . $i . '.travel_documents'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php $__errorArgs = ['passengers.' . $i . '.passport_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php $__errorArgs = ['passengers.' . $i . '.flight_ticket_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php $__errorArgs = ['passengers.' . $i . '.insurance_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="travel_documents_<?php echo e($i); ?>"
                                                            name="passengers[<?php echo e($i); ?>][travel_documents][]"
                                                            accept=".pdf,.jpg,.jpeg,.png" multiple required
                                                            data-passenger-index="<?php echo e($i); ?>">
                                                        <small class="text-muted d-block mt-1">
                                                            <i class="fas fa-info-circle"></i>
                                                            <?php echo e(__('translate.Please upload 1 to 3 documents')); ?>:
                                                            <br>
                                                            <strong>1. <?php echo e(__('translate.Passport')); ?></strong>
                                                            (<?php echo e(__('translate.Required')); ?>)
                                                            <br>
                                                            2. <?php echo e(__('translate.Flight Ticket')); ?>

                                                            (<?php echo e(__('translate.Optional')); ?>)
                                                            <br>
                                                            3. <?php echo e(__('translate.Travel Insurance')); ?>

                                                            (<?php echo e(__('translate.Optional')); ?>)
                                                            <br>
                                                            <em><?php echo e(__('translate.Accepted formats: PDF, JPG, PNG (Max 5MB each)')); ?></em>
                                                        </small>
                                                        <div class="uploaded-files-preview mt-2" id="preview_<?php echo e($i); ?>"></div>
                                                        <?php $__errorArgs = ['passengers.' . $i . '.travel_documents'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <?php $__errorArgs = ['passengers.' . $i . '.passport_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <?php $__errorArgs = ['passengers.' . $i . '.flight_ticket_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <?php $__errorArgs = ['passengers.' . $i . '.insurance_file'];
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

                                                    <!-- Phone -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Phone Number')); ?></label>
                                                        <input type="text"
                                                            class="form-control <?php $__errorArgs = ['passengers.' . $i . '.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="passengers[<?php echo e($i); ?>][phone]"
                                                            value="<?php echo e(old('passengers.' . $i . '.phone')); ?>"
                                                            placeholder="<?php echo e(__('translate.e.g., +33 6 12 34 56 78')); ?>">
                                                        <?php $__errorArgs = ['passengers.' . $i . '.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Email Address')); ?></label>
                                                        <input type="email"
                                                            class="form-control <?php $__errorArgs = ['passengers.' . $i . '.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="passengers[<?php echo e($i); ?>][email]"
                                                            value="<?php echo e(old('passengers.' . $i . '.email')); ?>"
                                                            placeholder="<?php echo e(__('translate.e.g., passenger@example.com')); ?>">
                                                        <?php $__errorArgs = ['passengers.' . $i . '.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <!-- Special Requirements -->
                                                    <div class="col-12 mb-3">
                                                        <label
                                                            class="form-label"><?php echo e(__('translate.Special Requirements')); ?></label>
                                                        <textarea
                                                            class="form-control <?php $__errorArgs = ['passengers.' . $i . '.special_requirements'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="passengers[<?php echo e($i); ?>][special_requirements]" rows="3"
                                                            placeholder="<?php echo e(__('translate.Any special requirements or dietary restrictions...')); ?>"><?php echo e(old('passengers.' . $i . '.special_requirements')); ?></textarea>
                                                        <?php $__errorArgs = ['passengers.' . $i . '.special_requirements'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="<?php echo e(route('user.bookings.details', ['id' => $booking->id])); ?>"
                                        class="btn btn-secondary">
                                        <?php echo e(__('translate.Cancel')); ?>

                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('translate.Save Passenger Information')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle travel documents file upload preview
    const travelDocInputs = document.querySelectorAll('.travel-documents-input');
    
    travelDocInputs.forEach(input => {
        input.addEventListener('change', function() {
            const index = this.getAttribute('data-passenger-index');
            const previewDiv = document.getElementById('preview_' + index);
            const files = this.files;
            
            // Clear previous preview
            previewDiv.innerHTML = '';
            
            // Check max files
            if (files.length > 3) {
                previewDiv.innerHTML = '<div class="alert alert-danger mt-2"><i class="fas fa-exclamation-triangle"></i> <?php echo e(__("translate.Maximum 3 files allowed")); ?></div>';
                this.value = '';
                return;
            }
            
            // Check if at least one file is selected
            if (files.length === 0) {
                return;
            }
            
            // Create preview for each file
            let previewHTML = '<div class="uploaded-files-list mt-2">';
            previewHTML += '<h6 class="mb-2"><?php echo e(__("translate.Selected Files")); ?>:</h6>';
            previewHTML += '<ul class="list-group">';
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileName = file.name;
                const fileSize = (file.size / (1024 * 1024)).toFixed(2); // in MB
                const fileIcon = getFileIcon(fileName);
                
                // Check file size (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    previewHTML += `<li class="list-group-item list-group-item-danger">
                        <i class="${fileIcon}"></i> ${fileName} 
                        <span class="badge bg-danger float-end">${fileSize} MB - <?php echo e(__("translate.Too large")); ?></span>
                    </li>`;
                } else {
                    let badge = '';
                    if (i === 0) {
                        badge = '<span class="badge bg-primary float-end"><?php echo e(__("translate.Passport")); ?></span>';
                    } else if (i === 1) {
                        badge = '<span class="badge bg-info float-end"><?php echo e(__("translate.Flight Ticket")); ?></span>';
                    } else if (i === 2) {
                        badge = '<span class="badge bg-success float-end"><?php echo e(__("translate.Travel Insurance")); ?></span>';
                    }
                    
                    previewHTML += `<li class="list-group-item">
                        <i class="${fileIcon}"></i> ${fileName} 
                        <small class="text-muted">(${fileSize} MB)</small>
                        ${badge}
                    </li>`;
                }
            }
            
            previewHTML += '</ul>';
            previewHTML += '</div>';
            
            previewDiv.innerHTML = previewHTML;
        });
    });
    
    function getFileIcon(filename) {
        const extension = filename.split('.').pop().toLowerCase();
        switch(extension) {
            case 'pdf':
                return 'fas fa-file-pdf text-danger';
            case 'jpg':
            case 'jpeg':
            case 'png':
                return 'fas fa-file-image text-primary';
            default:
                return 'fas fa-file';
        }
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style_section'); ?>
<style>
    .uploaded-files-preview {
        margin-top: 10px;
    }
    
    .uploaded-files-list ul {
        margin-bottom: 0;
    }
    
    .uploaded-files-list .list-group-item {
        padding: 10px 15px;
        border: 1px solid #dee2e6;
        background-color: #f8f9fa;
    }
    
    .uploaded-files-list .list-group-item i {
        margin-right: 8px;
    }
    
    .travel-documents-input {
        cursor: pointer;
    }
    
    .uploaded-files-list h6 {
        font-size: 14px;
        font-weight: 600;
        color: #495057;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/modules/tourbooking/user/passenger/create.blade.php ENDPATH**/ ?>