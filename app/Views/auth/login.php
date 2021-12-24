<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Log in | HOTEL-AHADIAT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/main-logo.png">

	<!-- Bootstrap Css -->
	<link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="<?= base_url(); ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="<?= base_url(); ?>/assets/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

</head>


<body class="authentication-bg">

	<div class="account-pages mt-5 mb-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-5">
					<div class="text-center">
						<a href="index.html" class="logo">
							<img src="<?= base_url(); ?>/assets/images/main-logo.png" alt="" height="125" class="logo-light mx-auto">
							<img src="<?= base_url(); ?>/assets/images/main-logo.png" alt="" height="125" class="logo-dark mx-auto">
						</a>
						<p class="text-muted mt-2 mb-4">Welcome to Ahadiat | Hotel & Bungalow</p>
					</div>
					<div class="card">

						<div class="card-body p-4">
							<?= view('Myth\Auth\Views\_message_block') ?>

							<div class="text-center mb-4">
								<h4 class="text-uppercase mt-0"><?= lang('Auth.loginTitle') ?></h4>
							</div>

							<form action="<?= route_to('login') ?>" method="post">
								<?= csrf_field() ?>

								<?php if ($config->validFields === ['email']) : ?>
									<div class="form-group">
										<label for="login"><?= lang('Auth.email') ?></label>
										<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
										<div class="invalid-feedback">
											<?= session('errors.login') ?>
										</div>
									</div>
								<?php else : ?>
									<div class="form-group">
										<label for="login"><?= lang('Auth.emailOrUsername') ?></label>
										<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
										<div class="invalid-feedback">
											<?= session('errors.login') ?>
										</div>
									</div>
								<?php endif; ?>

								<div class="form-group">
									<label for="password"><?= lang('Auth.password') ?></label>
									<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
									<div class="invalid-feedback">
										<?= session('errors.password') ?>
									</div>
								</div>

								<?php if ($config->allowRemembering) : ?>
									<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
											<?= lang('Auth.rememberMe') ?>
										</label>
									</div>
								<?php endif; ?>

								<br>

								<button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
								<div class="row mt-3">
									<div class="col-12 text-center">
										<?php if ($config->allowRegistration) : ?>
											<p class="text-muted">Don't have an account? <a href="<?= route_to('register') ?>"><b>Sign Up</b></a></p>
										<?php endif; ?>
										<?php if ($config->activeResetter) : ?>
											<p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
										<?php endif; ?>
									</div> <!-- end col -->
								</div>

							</form>

						</div> <!-- end card-body -->
					</div>
					<!-- end card -->


				</div> <!-- end col -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</div>
	<!-- end page -->


	<!-- Vendor js -->
	<script src="<?= base_url(); ?>/assets/js/vendor.min.js"></script>

	<!-- App js -->
	<script src="<?= base_url(); ?>/assets/js/app.min.js"></script>

</body>

</html>