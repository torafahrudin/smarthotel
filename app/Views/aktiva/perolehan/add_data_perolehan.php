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
                            <li class="breadcrumb-item"><a href="<?= base_url('aktiva/perolehan') ?>">Data Perolehan</a></li>
                            <li class="breadcrumb-item active">Tambah Data Perolehan</li>
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
                        Input Data Perolehan
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('aktiva/perolehan/add') ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="tanggal" class="col-form-label">Tanggal</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control choose_date" placeholder="Pilih Tanggal" name="tanggal" autocomplete="off">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="ti-calendar"></i></span>
                                        </div>
                                    </div><!-- input-group -->
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="id_vendor" class="col-form-label">Vendor</label>
                                    <select name="id_vendor" class="form-control">
                                        <option value="" disabled selected>- - - Pilih Vendor - - -</option>
                                        <?php
                                        foreach ($vendor as $list) {
                                        ?>
                                            <option value="<?= $list['id_vendor'] ?>"><?= $list['id_vendor'] . " - " . $list['nama_vendor'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 pt-4">
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus-thick fa-lg text-white"></i> Proses</button>
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