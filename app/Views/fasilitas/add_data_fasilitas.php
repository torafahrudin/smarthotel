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
                            <li class="breadcrumb-item"><a href="/fasilitas">Data Fasilitas</a></li>
                            <li class="breadcrumb-item active">Tambah Data Fasilitas</li>
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
                        Input Data Fasilitas
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('fasilitas/create') ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="id_fasilitas" class="col-form-label">ID Fasilitas</label>
                                    <input type="text" class="form-control" value="<?= $id_fasilitas; ?>" autocomplete="off" disabled>
                                </div>
                            <div class="form-group col-md-4"> 
                                <label for="nama_fasilitas" class="col-form-label">Nama Fasilitas</label>
                                <input type="text" class="form-control" name="nama_fasilitas" placeholder="Nama Fasilitas" autocomplete="off">
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('nama_fasilitas') ?></span>
                                <?php endif; ?>
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
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="qty" class="col-form-label">Qty</label>
                                    <input type="number" class="form-control" name="qty" placeholder="Qty" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('qty') ?></span>
                                    <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4"> 
                                    <label for="kapasitas" class="col-form-label">Kapasitas Fasilitas</label>
                                    <input type="number" class="form-control" name="kapasitas" placeholder="Kapasitas" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('kapasitas') ?></span>
                                    <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4"> 
                                    <label for="harga" class="col-form-label">Harga Per Fasilitas</label>
                                    <input type="number" class="form-control" name="harga" placeholder="Harga" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('harga') ?></span>
                                    <?php endif; ?>
                                </div>
                            <!-- <div class="form-group col-md-4">
                                <label for="status" class="col-form-label">Status</label>
                                <input type="text" class="form-control" name="status" placeholder="Status" autocomplete="off">
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('status') ?></span>
                                <?php endif; ?>
                            </div> -->
                            <div class="mb-2 mt-1">
                                <div class="float-left d-none d-sm-block">
                                    <a href="/fasilitas" class="btn btn-secondary"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
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