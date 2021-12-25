<!DOCTYPE html>
<html lang="en">


<!-- munchbox/register.html  05 Dec 2019 10:25:15 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <title>Munchbox | Register</title>
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
    <link rel="apple-touch-icon-precomposed" href="#">
    <link rel="shortcut icon" href="#">
    <!-- Bootstrap -->
    <link href="<?= base_url(); ?>/assets_frontend/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="<?= base_url(); ?>/assets_frontend/css/font-awesome.css" rel="stylesheet">
    <!-- Flaticons -->
    <link href="<?= base_url(); ?>/assets_frontend/css/font/flaticon.css" rel="stylesheet">
    <!-- Swiper Slider -->
    <link href="<?= base_url(); ?>/assets_frontend/css/swiper.min.css" rel="stylesheet">
    <!-- Range Slider -->
    <link href="<?= base_url(); ?>/assets_frontend/css/ion.rangeSlider.min.css" rel="stylesheet">
    <!-- magnific popup -->
    <link href="<?= base_url(); ?>/assets_frontend/css/magnific-popup.css" rel="stylesheet">
    <!-- Nice Select -->
    <link href="<?= base_url(); ?>/assets_frontend/css/nice-select.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="<?= base_url(); ?>/assets_frontend/css/style.css" rel="stylesheet">
    <!-- Custom Responsive -->
    <link href="<?= base_url(); ?>/assets_frontend/css/responsive.css" rel="stylesheet">
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
                        <img src="<?= base_url(); ?>/assets_frontend/img/banner/banner-1.jpeg" class="img-fluid full-width main-img" alt="banner">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-2 user-page main-padding">
                        <div class="login-sec">
                            <div class="login-box">
                                <form action="<?= route_to('register') ?>" method="post">
                                    <h4 class="text-light-black fw-600">Create your account</h4>
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fullname">Fullname</label>
                                                <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" placeholder="Fullname" value="<?= old('fullname') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="username"><?= lang('Auth.username') ?></label>
                                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="email"><?= lang('Auth.email') ?></label>
                                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="password"><?= lang('Auth.password') ?></label>
                                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                            </div>

                                            <div class="form-group">
                                                <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn-second btn-submit full-width">Create your account</button>
                                            </div>
                                            <div class="form-group text-center"> <span>or</span>
                                            </div>
                                            <div class="form-group text-center">
                                                <p class="text-light-black mb-0">Have an account? <a href="<?= route_to('login') ?>">Sign in</a>
                                                </p>
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
    <script src="<?= base_url(); ?>/assets_frontend/js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="<?= base_url(); ?>/assets_frontend/js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>/assets_frontend/js/bootstrap.min.js"></script>
    <!-- Range Slider -->
    <script src="<?= base_url(); ?>/assets_frontend/js/ion.rangeSlider.min.js"></script>
    <!-- Swiper Slider -->
    <script src="<?= base_url(); ?>/assets_frontend/js/swiper.min.js"></script>
    <!-- Nice Select -->
    <script src="<?= base_url(); ?>/assets_frontend/js/jquery.nice-select.min.js"></script>
    <!-- magnific popup -->
    <script src="<?= base_url(); ?>/assets_frontend/js/jquery.magnific-popup.min.js"></script>
    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
    <!-- sticky sidebar -->
    <script src="<?= base_url(); ?>/assets_frontend/js/sticksy.js"></script>
    <!-- Munch Box Js -->
    <script src="<?= base_url(); ?>/assets_frontend/js/munchbox.js"></script>
    <!-- /Place all Scripts Here -->
</body>


<!-- munchbox/register.html  05 Dec 2019 10:25:15 GMT -->

</html>