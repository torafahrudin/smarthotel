<?= $this->extend('/frontend/templates/header'); ?>

<?= $this->section('content_frontend'); ?>

<!-- start welcome section -->
<section class="welcome_area">
    <div class="container">
        <div class="welcome">
            <div class="section_title nice_title content-center">
                <h3>AHADIAT HOTEL & BUNGALOW </h3>
            </div>
            <div class="section_description">
                <p> Kami memberikan keamanan ekstra sesuai standard protokol kesehatan di era pandemi ini, agar para tamu mendapatkan keamanan dan kenyamanan selama menginap di Ahadiat Hotel & Bungalow. </p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_room_wrapper clearfix">
                        <figure class="uk-overlay uk-overlay-hover">
                            <div class="room_media">
                                <a href="#"><img src="<?= base_url('assets/images/room/bungalow.jpg') ?>" alt=""></a>
                            </div>
                            <div class="room_title border-bottom-whitesmoke clearfix">
                                <div class="left_room_title floatleft">
                                    <h6>Bungalow</h6>
                                    <p>Rp 500.000/ <span>night</span></p>
                                </div>
                                <div class="left_room_title floatright">
                                    <a href="#" class="btn">Book</a>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_room_wrapper clearfix">
                        <figure class="uk-overlay uk-overlay-hover">
                            <div class="room_media">
                                <a href="#"><img src="<?= base_url('assets/images/room/family-suite.jpg') ?>" alt=""></a>
                            </div>
                            <div class="room_title border-bottom-whitesmoke clearfix">
                                <div class="left_room_title floatleft">
                                    <h6>Family Suit</h6>
                                    <p>Rp 500.000/ <span>night</span></p>
                                </div>
                                <div class="left_room_title floatright">
                                    <a href="#" class="btn">Book</a>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_room_wrapper clearfix">
                        <figure class="uk-overlay uk-overlay-hover">
                            <div class="room_media">
                                <a href="#"><img src="<?= base_url('assets/images/room/superior.jpg') ?>" alt=""></a>
                            </div>
                            <div class="room_title border-bottom-whitesmoke clearfix">
                                <div class="left_room_title floatleft">
                                    <h6>Superior</h6>
                                    <p>Rp 500.000/ <span>night</span></p>
                                </div>
                                <div class="left_room_title floatright">
                                    <a href="#" class="btn">Book</a>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_room_wrapper clearfix">
                        <figure class="uk-overlay uk-overlay-hover">
                            <div class="room_media">
                                <a href="#"><img src="<?= base_url('assets/images/room/executive.jpg') ?>" alt=""></a>
                            </div>
                            <div class="room_title border-bottom-whitesmoke clearfix">
                                <div class="left_room_title floatleft">
                                    <h6>Excevutive</h6>
                                    <p>Rp 500.000/ <span>night</span></p>
                                </div>
                                <div class="left_room_title floatright">
                                    <a href="#" class="btn">Book</a>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end welcome section -->

<?= $this->endSection('content_frontend'); ?>



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