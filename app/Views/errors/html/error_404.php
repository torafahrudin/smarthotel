<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>404 Error | HOTEL AHADIAT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.ico">

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
					<div class="text-center pb-3">
						<a href="index.html" class="logo">
							<img src="<?= base_url(); ?>/assets/images/main-logo.png" alt="" height="125" class="logo-light mx-auto">
							<img src="<?= base_url(); ?>/assets/images/main-logo.png" alt="" height="125" class="logo-dark mx-auto">
						</a>
					</div>
					<div class="card">

						<div class="card-body p-4">

							<div class="text-center">
								<h1 class="text-error">404</h1>
								<h3 class="mt-3 mb-2">Page not Found</h3>
								<p class="text-muted mb-3">
									<?php if (!empty($message) && $message !== '(null)') : ?>
										<?= nl2br(esc($message)) ?>
									<?php else : ?>
										Sorry! Cannot seem to find the page you were looking for.
									<?php endif ?></p>

								<a href="/" class="btn btn-danger waves-effect waves-light"><i class="fas fa-home mr-1"></i> Back to Home</a>
							</div>


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