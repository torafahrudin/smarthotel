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
                            <li class="breadcrumb-item"><a href="/customer">Data Customer</a></li>
                            <li class="breadcrumb-item active">Edit Data Customer</li>
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
                        Edit Data Customer
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('customer/edit') ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <input type="hidden" class="form-control" name="id_customer" value="<?= $customer['id_customer'] ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_customer" class="col-form-label">ID customer</label>
                                    <input type="text" class="form-control" value="<?= $customer['id_customer'] ?>" autocomplete="off" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nik" class="col-form-label">NIK</label>
                                    <input type="number" class="form-control" name="nik" value="<?= $customer['nik'] ?>" placeholder="NIK" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('nik') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_customer" class="col-form-label">Nama Customer</label>
                                <input type="text" class="form-control" name="nama_customer" value="<?= $customer['nama_customer'] ?>" placeholder="Nama Customer" autocomplete="off">
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('nama_customer') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_telp" class="col-form-label">No Telp</label>
                                    <input type="number" class="form-control" name="no_telp" value="<?= $customer['no_telp'] ?>" placeholder="No Telp" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('no_telp') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="<?= $customer['email'] ?>" placeholder="Email" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('email') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $customer['alamat'] ?>" placeholder="Alamat" autocomplete="off">
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('alamat') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-left d-none d-sm-block">
                                    <a href="/customer" class="btn btn-secondary"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
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