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
                            <li class="breadcrumb-item active">Data Kamar</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="pl-2">
                    <a href="/room/add" class="btn btn-primary waves-effect waves-light text-white">
                        <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                    </a>
                </div>
            </div>
        </div>

        <div class="port mb-2">
            <div class="portfolioContainer">
                <?php foreach ($room as $rm) : ?>
                    <div class="col-md-6 col-xl-3 col-lg-4 natural personal">
                        <div class="gal-detail thumb">
                            <a href="assets/images/room/<?= $rm['room_image']; ?>" class="image-popup" title="Screenshot-1">
                                <img src="assets/images/room/<?= $rm['room_image']; ?>" class="thumb-img img-fluid">
                            </a>

                            <div class="text-center">
                                <h4><?= $rm['ket1'] . ' ' . $rm['ket2']  ?></h4>
                                <!-- <a href="<?= base_url('room/detail/' . $rm['id_kamar']) ?>" class="btn btn-info waves-effect waves-light text-white"> -->
                                <a href="#" data-toggle="modal" data-target="#detail<?php echo $rm['id_kamar']; ?>" class="btn btn-info waves-effect waves-light text-white">
                                    <i class="mdi mdi-eye fa-lg text-white"></i>
                                </a>
                                <a href="<?= base_url('room/edit/' . $rm['id_kamar']) ?>" class="btn btn-warning waves-effect waves-light text-white">
                                    <i class="mdi mdi-update fa-lg text-white"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#delete<?php echo $rm['id_kamar']; ?>" class="btn btn-danger waves-effect waves-light text-white">
                                    <i class="mdi mdi-trash-can fa-lg text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div><!-- end portfoliocontainer-->
        </div> <!-- End row -->
    </div> <!-- container-fluid -->
</div> <!-- content -->


<?php foreach ($room as $rm) : ?>
    <form action="room/delete" method="post">
        <div id="delete<?= $rm['id_kamar']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title mt-0 text-white">Apa Kamu Yakin ?</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-body">
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <input type="hidden" name="id_kamar" value="<?= $rm['id_kamar'] ?>">
                                <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                <button href="#" class="btn btn-danger" type="submit"><i class="mdi mdi-trash-can fa-lg"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
<?php endforeach ?>


<?php foreach ($room as $rm) : ?>
    <div id="detail<?= $rm['id_kamar']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title mt-0 text-white">Detail Kamar</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <!-- <div class="modal-body">
                    <div class="card mb-3" style="max-width: 540px;">
                        <img src="assets/images/room/<?= $rm['room_image']; ?>" class="img-fluid">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="card-body">
                            <h4 class="card-title"><?= $rm['ket1'] . ' ' . $rm['ket2']  ?></h4>
                            <h5>Kapasitas : <?= $rm['kapasitas'] ?></h5>
                            <h5>Jumlah : <?= $rm['jumlah'] ?></h5>
                            <h5>Harga : <?= $rm['harga'] ?></h5>
                            <h5>Status : <?= $rm['status'] ?></h5>
                        </div>
                    </div>
                </div> -->
                <div class="modal-body">
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img src="assets/images/room/<?= $rm['room_image']; ?>" class="img-fluid" width="300" height="180">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?= $rm['ket1'] . ' ' . $rm['ket2']  ?></h4>
                                <h5>Kapasitas : <?= $rm['kapasitas'] ?> orang</h5>
                                <h5>Jumlah : <?= $rm['jumlah'] ?> Unit</h5>
                                <h5>Harga : <?= nominal($rm['harga']) ?></h5>
                                <h5>Status : <span class="badge badge-success badge-pill"><?= $rm['status'] ?>
                                        <i class="mdi mdi-trending-up"></i>
                                    </span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-2 mt-1">
                        <div class="float-right d-none d-sm-block">
                            <input type="hidden" name="id_kamar" value="<?= $rm['id_kamar'] ?>">
                            <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>


<?= $this->endSection('content'); ?>