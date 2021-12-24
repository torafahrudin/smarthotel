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
                            <li class="breadcrumb-item"><a href="/receptionist">Data Receptionist</a></li>
                            <li class="breadcrumb-item active">Tambah Data Receptionist</li>
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
                        Input Data Kelompok Aktiva
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('aktiva/kelompok/update/' . $kelompok['id_kelompok']) ?>" method="POST" class="no-validated">
                            <input type="hidden" name="id_kelompok" value="<?= $kelompok['id_kelompok'] ?>">
                            <div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 mb-3">
                                        <label class="form-label">Nama Kelompok</label>
                                        <input type="text" class="form-control" id="nama_kelompok<?= $kelompok['nama_kelompok'] ?>" name="nama_kelompok" value="<?= $kelompok['nama_kelompok'] ?>" autocomplete="off">
                                        <?php if ($validation->getError('nama_kelompok') != '') : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('nama_kelompok') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label class="form-label">Masa Manfaat (tahun)</label>
                                        <input type="number" class="form-control" id="masa_manfaat" oninput="hitung()" name="masa_manfaat" value="<?= $kelompok['masa_manfaat'] ?>" autocomplete="off">
                                        <?php if ($validation->getError('masa_manfaat') != '') : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('masa_manfaat') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label class="form-label">Garis Lurus</label>
                                        <input type="number" class="form-control" id="garis_lurus" name="garis_lurus" value="<?= $kelompok['garis_lurus'] ?>" autocomplete="off" readonly>
                                        <?php if ($validation->getError('garis_lurus') != '') : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('garis_lurus') ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mb-2 mt-1">
                                    <div class="float-left d-none d-sm-block">
                                        <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                                    </div>
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