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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('room') ?>">Data Kamar</a></li>
                            <li class="breadcrumb-item active">Tambah Data Kamar</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Form row -->
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header header-title bg-primary text-white">
                        Edit Data Kamar
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('room/update') ?>" method="POST" class="no-validated" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="id_kamar" class="col-form-label">ID Kamar</label>
                                    <input type="hidden" name="id_kamar" value="<?= $room['id_kamar']; ?>">
                                    <input type="text" class="form-control" value="<?= $room['id_kamar']; ?>" autocomplete="off" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="id_header_billing" class="col-form-label">Jenis</label>
                                    <select name="id_header_billing" class="form-control" id="id_header_billing">
                                        <option value="" disabled selected>--- Pilih Jenis ---</option>
                                        <?php foreach ($header as $hd) { ?>
                                            <option <?php if ($hd['id_header_billing'] == $room['id_header_billing']) {
                                                        echo 'selected="selected"';
                                                    } ?> value="<?php echo $hd['id_header_billing'] ?>"><?php echo $hd['keterangan'] ?> </option>
                                        <?php } ?>
                                    </select>
                                    <?php if ($validation->getError('id_header_billing') != '') : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('id_header_billing') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="id_sub_billing" class="col-form-label">Tipe</label>
                                    <select name="id_sub_billing" class="form-control" id="id_sub_billing">
                                        <?php foreach ($sub as $billing) { ?>
                                            <option <?php if ($billing['id_sub_billing'] == $room['id_sub_billing']) {
                                                        echo 'selected="selected"';
                                                    } ?> value="<?php echo $billing['id_sub_billing'] ?>"><?php echo $billing['keterangan'] ?> </option>
                                        <?php } ?>
                                    </select>
                                    <?php if ($validation->getError('id_sub_billing') != '') : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('id_sub_billing') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="kapasitas" class="col-form-label">Kapaistas Kamar</label>
                                    <input type="number" class="form-control" name="kapasitas" value="<?= $room['kapasitas']; ?>" placeholder="kapasitas" autocomplete="off">
                                    <?php if ($validation->getError('kapasitas') != '') : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('kapasitas') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="jumlah" class="col-form-label">Jumlah Kamar</label>
                                    <input type="number" class="form-control " name="jumlah" value="<?= $room['jumlah']; ?>" placeholder="Jumlah" autocomplete="off">
                                    <?php if ($validation->getError('jumlah') != '') : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('jumlah') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="harga" class="col-form-label">Harga Per Kamar</label>
                                    <input type="number" class="form-control" name="harga" value="<?= $room['harga']; ?>" placeholder="Harga" autocomplete="off">
                                    <?php if ($validation->getError('harga') != '') : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('harga') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Deskripsi</label>
                                <textarea type="text" class="form-control" name="keterangan" placeholder="Keterangan" autocomplete="off" rows="4"><?= $room['keterangan']; ?></textarea>
                                <?php if ($validation->getError('keterangan') != '') : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('keterangan') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="room_image" class="col-form-label">Image</label>
                                <input type="file" class="dropify" data-max-file-size="10M" name="room_image" />
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-left d-none d-sm-block">
                                    <a href="/room" class="btn btn-secondary"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->


<?= $this->endSection('content'); ?>