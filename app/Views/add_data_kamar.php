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
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/room">Data Kamar</a></li>
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
                        Input Data Kamar
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('room/create') ?>" method="POST" class="no-validated" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="id_kamar" class="col-form-label">ID Kamar</label>
                                    <input type="text" class="form-control" name="id_kamar" value="<?= $id_kamar; ?>" autocomplete="off" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="id_header_billing" class="col-form-label">Jenis</label>
                                    <select name="id_header_billing" class="form-control" id="id_header_billing">
                                        <option value="" disabled selected>--- Pilih Jenis ---</option>
                                        <?php
                                        foreach ($header as $hd) :
                                        ?>
                                            <option value="<?= $hd['id_header_billing']; ?>"><?= $hd['keterangan']; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('id_header_billing') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="id_sub_billing" class="col-form-label">Tipe</label>
                                    <select name="id_sub_billing" class="form-control" id="id_sub_billing">
                                        <option value="" disabled selected>--- Pilih Tipe ---</option>
                                        <?php
                                        foreach ($sub as $sb) :
                                        ?>
                                            <option value="<?= $sb['id_sub_billing']; ?>"><?= $sb['keterangan']; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('id_sub_billing') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="kapasitas" class="col-form-label">Kapaistas Kamar</label>
                                    <input type="number" class="form-control" name="kapasitas" placeholder="kapasitas" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('kapasitas') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="jumlah" class="col-form-label">Jumlah Kamar</label>
                                    <input type="number" class="form-control " name="jumlah" placeholder="Jumlah" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('jumlah') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="harga" class="col-form-label">Harga Kamar</label>
                                    <input type="number" class="form-control" name="harga" placeholder="Harga" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('harga') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="room_image" class="col-form-label">Image</label>
                                <input type="file" class="dropify" data-max-file-size="1M" />
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