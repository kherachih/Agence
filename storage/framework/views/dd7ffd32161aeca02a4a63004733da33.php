

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Add Passenger Information')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Bookings')); ?> >> <?php echo e(__('translate.Add Passenger Information')); ?></p>
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
                                            <p><strong><?php echo e(__('translate.Booking Code')); ?>:</strong> #<?php echo e($booking->booking_code); ?></p>
                                            <p><strong><?php echo e(__('translate.Service')); ?>:</strong> <?php echo e($booking->service->title ?? 'N/A'); ?></p>
                                            <p><strong><?php echo e(__('translate.Check In')); ?>:</strong> <?php echo e($booking->check_in_date ? $booking->check_in_date->format('d M Y') : 'N/A'); ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong><?php echo e(__('translate.Check Out')); ?>:</strong> <?php echo e($booking->check_out_date ? $booking->check_out_date->format('d M Y') : 'N/A'); ?></p>
                                            <p><strong><?php echo e(__('translate.Adults')); ?>:</strong> <?php echo e($booking->adults); ?></p>
                                            <p><strong><?php echo e(__('translate.Children')); ?>:</strong> <?php echo e($booking->children); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Passenger Form -->
                            <form action="<?php echo e(route('user.passengers.store', $booking)); ?>" method="POST" enctype="multipart/form-data">
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
                                                               class="form-control <?php $__errorArgs = ['passengers.'.$i.'.first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                               name="passengers[<?php echo e($i); ?>][first_name]" 
                                                               value="<?php echo e(old('passengers.'.$i.'.first_name')); ?>"
                                                               required>
                                                        <?php $__errorArgs = ['passengers.'.$i.'.first_name'];
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
                                                               class="form-control <?php $__errorArgs = ['passengers.'.$i.'.last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                               name="passengers[<?php echo e($i); ?>][last_name]" 
                                                               value="<?php echo e(old('passengers.'.$i.'.last_name')); ?>"
                                                               required>
                                                        <?php $__errorArgs = ['passengers.'.$i.'.last_name'];
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
                                                               class="form-control <?php $__errorArgs = ['passengers.'.$i.'.date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                               name="passengers[<?php echo e($i); ?>][date_of_birth]" 
                                                               value="<?php echo e(old('passengers.'.$i.'.date_of_birth')); ?>">
                                                        <?php $__errorArgs = ['passengers.'.$i.'.date_of_birth'];
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
                                                        <select class="form-select <?php $__errorArgs = ['passengers.'.$i.'.gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                                name="passengers[<?php echo e($i); ?>][gender]">
                                                            <option value=""><?php echo e(__('translate.Select')); ?></option>
                                                            <option value="male" <?php echo e(old('passengers.'.$i.'.gender') == 'male' ? 'selected' : ''); ?>>
                                                                <?php echo e(__('translate.Male')); ?>

                                                            </option>
                                                            <option value="female" <?php echo e(old('passengers.'.$i.'.gender') == 'female' ? 'selected' : ''); ?>>
                                                                <?php echo e(__('translate.Female')); ?>

                                                            </option>
                                                            <option value="other" <?php echo e(old('passengers.'.$i.'.gender') == 'other' ? 'selected' : ''); ?>>
                                                                <?php echo e(__('translate.Other')); ?>

                                                            </option>
                                                        </select>
                                                        <?php $__errorArgs = ['passengers.'.$i.'.gender'];
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
                                                               class="form-control <?php $__errorArgs = ['passengers.'.$i.'.nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                               name="passengers[<?php echo e($i); ?>][nationality]" 
                                                               value="<?php echo e(old('passengers.'.$i.'.nationality')); ?>"
                                                               placeholder="<?php echo e(__('translate.e.g., French')); ?>">
                                                        <?php $__errorArgs = ['passengers.'.$i.'.nationality'];
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
                                                               class="form-control <?php $__errorArgs = ['passengers.'.$i.'.passport_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                               name="passengers[<?php echo e($i); ?>][passport_number]" 
                                                               value="<?php echo e(old('passengers.'.$i.'.passport_number')); ?>"
                                                               placeholder="<?php echo e(__('translate.e.g., AB1234567')); ?>">
                                                        <?php $__errorArgs = ['passengers.'.$i.'.passport_number'];
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
                                                        <label class="form-label"><?php echo e(__('translate.Passport Expiry Date')); ?></label>
                                                        <input type="date" 
                                                               class="form-control <?php $__errorArgs = ['passengers.'.$i.'.passport_expiry_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                               name="passengers[<?php echo e($i); ?>][passport_expiry_date]" 
                                                               value="<?php echo e(old('passengers.'.$i.'.passport_expiry_date')); ?>">
                                                        <?php $__errorArgs = ['passengers.'.$i.'.passport_expiry_date'];
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

                                                    <!-- Passport File -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">
                                                            <?php echo e(__('translate.Passport Copy')); ?> <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="file" 
                                                               class="form-control <?php $__errorArgs = ['passengers.'.$i.'.passport_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                               name="passengers[<?php echo e($i); ?>][passport_file]" 
                                                               accept=".pdf,.jpg,.jpeg,.png"
                                                               required>
                                                        <small class="text-muted"><?php echo e(__('translate.Accepted formats: PDF, JPG, PNG (Max 5MB)')); ?></small>
                                                        <?php $__errorArgs = ['passengers.'.$i.'.passport_file'];
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

                                                    <!-- Insurance File -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Travel Insurance (Optional)')); ?></label>
                                                        <input type="file" 
                                                               class="form-control <?php $__errorArgs = ['passengers.'.$i.'.insurance_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                               name="passengers[<?php echo e($i); ?>][insurance_file]" 
                                                               accept=".pdf,.jpg,.jpeg,.png">
                                                        <small class="text-muted"><?php echo e(__('translate.Accepted formats: PDF, JPG, PNG (Max 5MB)')); ?></small>
                                                        <?php $__errorArgs = ['passengers.'.$i.'.insurance_file'];
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

                                                    <!-- Phone -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Phone Number')); ?></label>
                                                        <input type="text" 
                                                               class="form-control <?php $__errorArgs = ['passengers.'.$i.'.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                               name="passengers[<?php echo e($i); ?>][phone]" 
                                                               value="<?php echo e(old('passengers.'.$i.'.phone')); ?>"
                                                               placeholder="<?php echo e(__('translate.e.g., +33 6 12 34 56 78')); ?>">
                                                        <?php $__errorArgs = ['passengers.'.$i.'.phone'];
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
                                                               class="form-control <?php $__errorArgs = ['passengers.'.$i.'.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                               name="passengers[<?php echo e($i); ?>][email]" 
                                                               value="<?php echo e(old('passengers.'.$i.'.email')); ?>"
                                                               placeholder="<?php echo e(__('translate.e.g., passenger@example.com')); ?>">
                                                        <?php $__errorArgs = ['passengers.'.$i.'.email'];
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
                                                        <label class="form-label"><?php echo e(__('translate.Special Requirements')); ?></label>
                                                        <textarea class="form-control <?php $__errorArgs = ['passengers.'.$i.'.special_requirements'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                                  name="passengers[<?php echo e($i); ?>][special_requirements]" 
                                                                  rows="3"
                                                                  placeholder="<?php echo e(__('translate.Any special requirements or dietary restrictions...')); ?>"><?php echo e(old('passengers.'.$i.'.special_requirements')); ?></textarea>
                                                        <?php $__errorArgs = ['passengers.'.$i.'.special_requirements'];
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

<?php echo $__env->make('user.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/modules/tourbooking/user/passenger/create.blade.php ENDPATH**/ ?>