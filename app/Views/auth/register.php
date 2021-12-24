<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log in | APP-PENGGAJIAN</title>
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
                    <div class="text-center">
                        <a href="index.html" class="logo">
                            <img src="<?= base_url(); ?>/assets/images/logo-light.png" alt="" height="22" class="logo-light mx-auto">
                            <img src="<?= base_url(); ?>/assets/images/logo-dark.png" alt="" height="22" class="logo-dark mx-auto">
                        </a>
                        <p class="text-muted mt-2 mb-4">Welcome to APP-PENGGAJIAN</p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0"><?= lang('Auth.register') ?></h4>
                            </div>

                            <?= view('Myth\Auth\Views\_message_block') ?>

                            <form action="<?= route_to('register') ?>" method="post">
                                <?= csrf_field() ?>

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
                                <div class="form-group mb-0 text-center">
                                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
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