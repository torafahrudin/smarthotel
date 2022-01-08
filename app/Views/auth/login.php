<!DOCTYPE html>
<html lang="en">


<!-- munchbox/login.html  05 Dec 2019 10:25:12 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <title>Hotel Ahadiat | Login</title>
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
    <link rel="apple-touch-icon-precomposed" href="#">
    <link rel="shortcut icon" href="#">
    <!-- Bootstrap -->
    <link href="<?= base_url('assets_frontend/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="<?= base_url('assets_frontend/css/font-awesome.css') ?>" rel="stylesheet">
    <!-- Flaticons -->
    <link href="<?= base_url('assets_frontend/css/font/flaticon.css') ?>" rel="stylesheet">
    <!-- Swiper Slider -->
    <link href="<?= base_url('assets_frontend/css/swiper.min.css') ?>" rel="stylesheet">
    <!-- Range Slider -->
    <link href="<?= base_url('assets_frontend/css/ion.rangeSlider.min.css') ?>" rel="stylesheet">
    <!-- magnific popup -->
    <link href="<?= base_url('assets_frontend/css/magnific-popup.css') ?>" rel="stylesheet">
    <!-- Nice Select -->
    <link href="<?= base_url('assets_frontend/css/nice-select.css') ?>" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="<?= base_url('assets_frontend/css/style.css') ?>" rel="stylesheet">
    <!-- Custom Responsive -->
    <link href="<?= base_url('assets_frontend/css/responsive.css') ?>" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <!-- place -->
</head>

<body>
    <div class="inner-wrapper">
        <div class="container-fluid no-padding">
            <div class="row no-gutters overflow-auto">
                <div class="col-md-6">
                    <div class="main-banner">
                        <img src="<?= base_url('assets_frontend/img/banner/banner-1.jpeg') ?>" class="img-fluid full-width main-img" alt="banner">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-2 user-page main-padding">
                        <div class="login-sec">
                            <div class="login-box">
                                <form action="<?= route_to('login') ?>" method="post">
                                    <h4 class="text-light-black fw-600">Sign in with your Hotel Ahadiat account</h4>
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <div class="row">
                                        <div class="col-12">
                                            </p>
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
                                            <div class="form-group checkbox-reset">
                                                <label class="custom-checkbox mb-0">
                                                    <input type="checkbox" name="#" class="<?php if (old('remember')) : ?> checked <?php endif ?>"> <span class="checkmark"></span> Keep me signed in</label>
                                                <!-- <a href="#">Reset password</a> -->
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn-second btn-submit full-width">
                                                    Sign in
                                            </div>
                                            <div class="form-group text-center"> <span>or</span>
                                            </div>
                                            <div class="form-group text-center mb-0"> <a href="<?= route_to('register') ?>">Create your account</a>
                                                <p class="text-muted">Back to home ? <a href="<?= route_to('/') ?>"><b>Home</b></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Place all Scripts Here -->
    <!-- jQuery -->
    <script src="<?= base_url('assets_frontend/js/jquery.min.js') ?>"></script>
    <!-- Popper -->
    <script src="<?= base_url('assets_frontend/js/popper.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets_frontend/js/bootstrap.min.js') ?>"></script>
    <!-- Range Slider -->
    <script src="<?= base_url('assets_frontend/js/ion.rangeSlider.min.js') ?>"></script>
    <!-- Swiper Slider -->
    <script src="<?= base_url('assets_frontend/js/swiper.min.js') ?>"></script>
    <!-- Nice Select -->
    <script src="<?= base_url('assets_frontend/js/jquery.nice-select.min.js') ?>"></script>
    <!-- magnific popup -->
    <script src="<?= base_url('assets_frontend/js/jquery.magnific-popup.min.js') ?>"></script>
    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
    <!-- sticky sidebar -->
    <script src="<?= base_url('assets_frontend/js/sticksy.js') ?>"></script>
    <!-- Munch Box Js -->
    <script src="<?= base_url('assets_frontend/js/munchbox.js') ?>"></script>
    <!-- /Place all Scripts Here -->
</body>


<!-- munchbox/login.html  05 Dec 2019 10:25:15 GMT -->

</html>