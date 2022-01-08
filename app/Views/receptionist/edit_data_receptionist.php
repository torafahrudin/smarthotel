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
                            <li class="breadcrumb-item"><a href="<?= base_url('receptionist') ?>">Data Receptionist</a></li>
                            <li class="breadcrumb-item active">Edit Data Receptionist</li>
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
                        Edit Data Receptionist
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('receptionist/update') ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <input type="hidden" class="form-control" name="id_receptionist" value="<?= $receptionist['id_receptionist'] ?>">
                            <input type="hidden" class="form-control" name="id_pegawai" value="<?= $receptionist['id_pegawai'] ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_receptionist" class="col-form-label">ID Receptionist</label>
                                    <input type="text" class="form-control" value="<?= $receptionist['id_receptionist'] ?>" autocomplete="off" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="id_pegawai" class="col-form-label">ID Pegawai</label>
                                    <input type="text" class="form-control" value="<?= $receptionist['id_pegawai'] ?>" placeholder="ID Pegawai" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_receptionist" class="col-form-label">Nama Receptionist</label>
                                <input type="text" class="form-control" name="nama_receptionist" value="<?= $receptionist['nama_receptionist'] ?>" placeholder="Nama Receptionist" autocomplete="off">
                                <?php if ($validation->getError('nama_receptionist') != '') : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('nama_receptionist') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_telp" class="col-form-label">No Telp</label>
                                    <input type="number" class="form-control" name="no_telp" value="<?= $receptionist['no_telp'] ?>" placeholder="No Telp" autocomplete="off">
                                    <?php if ($validation->getError('no_telp') != '') : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('no_telp') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
                                    <?php if (strcmp($receptionist['jenis_kelamin'], "L") == 0) {
                                    ?>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="">---Pilih Jenis Kelamin---</option>
                                            <option value="L" selected>Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    <?php

                                    } else {
                                    ?>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="">---Pilih Jenis Kelamin---</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P" selected>Perempuan</option>
                                        </select>
                                    <?php } ?>
                                    <?php if ($validation->getError('jenis_kelamin') != '') : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('nama_receptionist') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $receptionist['alamat'] ?>" placeholder="Alamat" autocomplete="off">
                                <?php if ($validation->getError('alamat') != '') : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('alamat') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-left d-none d-sm-block">
                                    <a href="<?= base_url('receptionist') ?>" class="btn btn-secondary"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
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