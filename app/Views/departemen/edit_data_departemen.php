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
                            <li class="breadcrumb-item"><a href="/departemen">Data Departemen</a></li>
                            <li class="breadcrumb-item active">Edit Data Departemen</li>
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
                        Edit Data Departemen
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('departemen/edit/' . $departemen['id_departemen']) ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <input type="hidden" class="form-control" name="id_departemen" value="<?= $departemen['id_departemen'] ?>">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="id_departemen" class="col-form-label">ID departemen</label>
                                    <input type="text" class="form-control" value="<?= $departemen['id_departemen'] ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_departemen" class="col-form-label">Nama departemen</label>
                                <input type="text" class="form-control" name="nama_departemen" value="<?= $departemen['nama_departemen'] ?>" placeholder="Nama departemen" autocomplete="off">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="keterangan" class="col-form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" value="<?= $departemen['keterangan'] ?>" placeholder="Keterangan" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-left d-none d-sm-block">
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