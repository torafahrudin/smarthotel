<?= $this->extend('templates/header'); ?>

<?= $this->section('content'); ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">


        <!-- start page title -->
        <div class="row pr-2">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18"></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Data Detail Kamar</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <?php foreach ($room as $rm) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header header-title bg-primary text-white">
                            Detail Data Kamar
                        </div>
                        <div class="pl-2 pt-2">
                            <a href="/room" class="btn bg-secondary"><i class="mdi mdi-arrow-left-circle-outline fa-lg"></i> Kembali</a>
                            <a href="<?= base_url('room/edit/' . $rm['id_kamar']) ?>" class="btn bg-info"><i class="mdi mdi-circle-edit-outline fa-lg"></i> Edit</a>
                        </div>
                        <div class="text-center pt-2">
                            <div class="img-square-wrapper">
                                <img class="rounded" src="<?= base_url(); ?>/assets/images/room/<?= $rm['room_image']; ?>" class="img-fluid" width="400" height="280">
                            </div>
                        </div>

                        <div class="pt-3">
                            <h2 class="card-title text-center"><?= $rm['ket1'] . ' ' . $rm['ket2']  ?></h2>
                        </div>

                        <div class="card-body text-center">
                            <div class="mb-5">
                                <p><?= $rm['deskripsi'] ?></p>
                            </div>

                            <div class="row icons-list-demo">
                                <div class="col-md-3">
                                    <i class="mdi mdi-account-multiple mdi-36px"></i>
                                    <b>Kapasitas : </b><?= $rm['kapasitas'] ?> orang
                                </div>
                                <div class="col-md-3">
                                    <i class="mdi mdi-domain mdi-36px"></i>
                                    <b>Jumlah : </b><?= $rm['jumlah'] ?> Unit
                                </div>
                                <div class="col-md-3">
                                    <i class="fas fa-dollar-sign size-36"></i>
                                    <b>Harga : </b><?= nominal($rm['harga']) ?>
                                </div>
                                <div class="col-md-3">
                                    <i class="mdi mdi-trending-up mdi-36px"></i>
                                    <b>Status : </b>
                                    <?= $rm['status'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<?php endforeach ?>



<!-- <?php foreach ($room as $rm) : ?>
            <div class="row">
                <div class="col-6">
                    <div class="card-box">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img src="<?= base_url(); ?>/assets/images/room/<?= $rm['room_image']; ?>" class="img-fluid" width="300" height="180">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?= $rm['ket1'] . ' ' . $rm['ket2']  ?></h4>
                                <ul>
                                    <li>
                                        <h5><b>Kapasitas : </b><span><?= $rm['kapasitas'] ?> orang</h5></span>
                                    </li>
                                    <li>
                                        <h5>Jumlah : <?= $rm['jumlah'] ?> Unit</h5>
                                        <b>Room services</b><span>24 Hour Reception, Wake Up Call Available</span>
                                    </li>
                                    <li>
                                        <h5>Harga : <?= nominal($rm['harga']) ?></h5>
                                        <b>Parking (charges may apply) </b><span>Car parking available onsite</span>
                                    </li>
                                    <li>
                                        <h5>Status : <span class="badge badge-success badge-pill"><?= $rm['status'] ?>
                                                <i class="mdi mdi-trending-up"></i>
                                            </span></h5>
                                        <b>Business</b><span>Wi-Fi Available, Wi-Fi Available In Public Areas</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

        <?php endforeach ?> -->

</div> <!-- container-fluid -->

</div> <!-- content -->


<?= $this->endSection('content'); ?>