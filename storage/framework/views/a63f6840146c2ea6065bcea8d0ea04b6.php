<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Site Title -->
	<title><?php echo e(__('translate.Login')); ?></title>

	<!-- Fav Icon -->
	<link rel="icon" href="<?php echo e(asset($general_setting->favicon)); ?>">

	<!--  Stylesheet -->
	<link rel="stylesheet" href="<?php echo e(asset('/backend/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('backend/css/slick.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('backend/css/font-awesome-all.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('backend/css/nice-select.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('backend/css/reset.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('backend/css/dev.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('global/toastr/toastr.min.css')); ?>">


</head>

<body id="crancy-dark-light">

	<div class="body-bg">

		<section class="crancy-wc crancy-wc__full crancy-bg-cover">
			<div class="crancy-wc__form">
				<!-- Welcome Banner -->
				<div class="crancy-wc__form--middle">
					<div class="crancy-wc__banner crancy-bg-cover">
						<div class="crancy-wc__banner--img w-100 h-100">
							<img src="<?php echo e(asset($general_setting->admin_login)); ?>" alt="#" class="w-100 h-100">
						</div>

					</div>
					<div class="crancy-wc__form-inner-flex">
						<div class="crancy-wc__form-inner">
							<div class="crancy-wc__logo">
								<a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($general_setting->secondary_logo)); ?>"
										alt="#"></a>
							</div>

							<div class="crancy-wc__form-inside-df">
								<div class="crancy-wc__form-inside">
									<div class="crancy-wc__form-middle">
										<div class="crancy-wc__form-top">

											<?php if($has_super_admin): ?>
												<div class="crancy-wc__heading pd-btm-20">
													<h3 class="crancy-wc__form-title crancy-wc__form-title__one m-0">
														<?php echo e(__('translate.Login Here')); ?>

													</h3>
													<p><?php echo e(__('translate.Welcome to Tour your World Admin Panel')); ?></p>
												</div>
												<!-- Sign in Form -->
												<form class="crancy-wc__form-main" action="<?php echo e(route('admin.store-login')); ?>"
													method="post">
													<?php echo csrf_field(); ?>
													<div class="row">
														<div class="col-12">
															<!-- Form Group -->
															<div class="form-group">
																<div class="form-group__input">
																	<input class="crancy-wc__form-input" type="email"
																		name="email"
																		placeholder="<?php echo e(__('translate.Email')); ?>">
																</div>
															</div>
														</div>
														<div class="col-12">
															<!-- Form Group -->
															<div class="form-group">
																<div class="form-group__input">
																	<input class="crancy-wc__form-input"
																		placeholder="<?php echo e(__('translate.Password')); ?>"
																		id="password-field" type="password" name="password">
																	<span class="crancy-wc__toggle"><i
																			class="fas fa-eye-slash"
																			id="toggle-icon"></i></span>
																</div>
															</div>
														</div>
													</div>

													<!-- Form Group -->
													<div class="form-group mg-top-30">
														<div class="crancy-wc__button">
															<button class="ntfmax-wc__btn"
																type="submit"><?php echo e(__('translate.Login Now')); ?></button>
														</div>
													</div>

												</form>
												<!-- End Sign in Form -->
											<?php else: ?>
												<div class="crancy-wc__heading pd-btm-20">
													<h3 class="crancy-wc__form-title crancy-wc__form-title__one m-0">
														<?php echo e(__('translate.Create Admin Account')); ?>

													</h3>
													<p><?php echo e(__('translate.Welcome to Tour your WorldAdmin Panel')); ?></p>
												</div>
												<!-- Sign in Form -->
												<form class="crancy-wc__form-main"
													action="<?php echo e(route('admin.store-register')); ?>" method="post">
													<?php echo csrf_field(); ?>


													<div class="row">

														<div class="col-12">
															<!-- Form Group -->
															<div class="form-group">
																<div class="form-group__input">
																	<input class="crancy-wc__form-input" type="text"
																		name="name"
																		placeholder="<?php echo e(__('translate.Name')); ?>">
																</div>
															</div>
														</div>

														<div class="col-12">
															<!-- Form Group -->
															<div class="form-group">
																<div class="form-group__input">
																	<input class="crancy-wc__form-input" type="email"
																		name="email"
																		placeholder="<?php echo e(__('translate.Email')); ?>">
																</div>
															</div>
														</div>
														<div class="col-12">
															<!-- Form Group -->
															<div class="form-group">
																<div class="form-group__input">
																	<input class="crancy-wc__form-input"
																		placeholder="<?php echo e(__('translate.Password')); ?>"
																		id="password-field" type="password" name="password">
																	<span class="crancy-wc__toggle"><i
																			class="fas fa-eye-slash"
																			id="toggle-icon"></i></span>
																</div>
															</div>
														</div>

														<div class="col-12">
															<!-- Form Group -->
															<div class="form-group">
																<div class="form-group__input">
																	<input class="crancy-wc__form-input"
																		placeholder="<?php echo e(__('translate.Confirm Password')); ?>"
																		id="confirm-password-field" type="password"
																		name="password_confirmation">
																	<span class="crancy-wc__toggle"><i
																			class="fas fa-eye-slash"
																			id="confirm-toggle-icon"></i></span>
																</div>
															</div>
														</div>


													</div>

													<!-- Form Group -->
													<div class="form-group mg-top-30">
														<div class="crancy-wc__button">
															<button class="ntfmax-wc__btn"
																type="submit"><?php echo e(__('translate.Create Now')); ?></button>
														</div>
													</div>

												</form>
												<!-- End Sign in Form -->
											<?php endif; ?>

										</div>

									</div>
								</div>
							</div>

						</div>
					</div>


				</div>
				<!-- End Welcome Banner -->
			</div>
		</section>

	</div>

	<!--  Scripts -->
	<script src="<?php echo e(asset('global/js/jquery-3.7.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('backend/js/jquery-migrate.js')); ?>"></script>
	<script src="<?php echo e(asset('backend/js/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('backend/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('backend/js/nice-select.min.js')); ?>"></script>
	<script src="<?php echo e(asset('backend/js/main.js')); ?>"></script>
	<script src="<?php echo e(asset('global/toastr/toastr.min.js')); ?>"></script>

	<script>
		(function ($) {
			"use strict"
			$(document).ready(function () {

				const session_notify_message = <?php echo json_encode(Session::get('message'), 15, 512) ?>;

				if (session_notify_message != null) {
					const session_notify_type = <?php echo json_encode(Session::get('alert-type', 'info'), 512) ?>;
					switch (session_notify_type) {
						case 'info':
							toastr.info(session_notify_message);
							break;
						case 'success':
							toastr.success(session_notify_message);
							break;
						case 'warning':
							toastr.warning(session_notify_message);
							break;
						case 'error':
							toastr.error(session_notify_message);
							break;
					}
				}

				const validation_errors = <?php echo json_encode($errors->all(), 15, 512) ?>;

				if (validation_errors.length > 0) {
					validation_errors.forEach(error => toastr.error(error));
				}

			});
		})(jQuery);

	</script>

</body>

</html><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>