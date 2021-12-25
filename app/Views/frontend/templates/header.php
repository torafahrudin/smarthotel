<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <title>Hotel Ahadiat | Home</title>
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
    <!-- Navigation -->
    <?= $this->include('/frontend/templates/navbar'); ?>
    <!-- Navigation -->

    <!-- main -->
    <?= $this->renderSection('content_frontend'); ?>
    <!-- main -->

    <!-- footer -->
    <?= $this->include('/frontend/templates/footer'); ?>
    <!-- footer -->
    <!-- modal boxes -->
    <div class="modal fade" id="address-box">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title fw-700">Change Address</h4>
                </div>
                <div class="modal-body">
                    <div class="location-picker">
                        <input type="text" class="form-control" placeholder="Enter a new address">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="search-box">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="search-box p-relative full-width">
                        <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                    </div>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <!-- Place all Scripts Here -->
    <?= $this->include('/frontend/templates/script'); ?>
    <!-- /Place all Scripts Here -->
</body>

</html>



<!-- Section Receptionist -->
<?php if (in_groups('receptionist')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>


<!-- Section Admin -->
<?php if (in_groups('admin')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>




<!-- Section Housekeeping -->
<?php if (in_groups('housekeeping')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>



<!-- Section Pemilik -->
<?php if (in_groups('pemilik')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>

<!-- Section Keuangan -->
<?php if (in_groups('keuangan')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>


<!-- Section hrd -->
<?php if (in_groups('hrd')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>


<!-- Section pegawai -->
<?php if (in_groups('pegawai')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>

<!-- Section manager -->
<?php if (in_groups('manager')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>