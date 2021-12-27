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
                            <li class="breadcrumb-item"><a href="/receptionist">Data Checkin</a></li>
                            <li class="breadcrumb-item active">Tambah Data Order</li>
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
                        Input Data Customer
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('order/addBooking') ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="id_booking" class="col-form-label">ID Booking</label>
                                    <input type="text" class="form-control" name="id_booking" value="<?= $id_booking; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama_customer" class="col-form-label">Customer</label>
                                    <select name="id_customer" class="form-control">
                                        <option value="" disabled selected>- - - Pilih Customer - - -</option>
                                        <?php
                                        foreach ($customer as $list) {
                                        ?>
                                            <option value="<?= $list['id_customer'] ?>"><?= $list['id_customer'] . " - " . $list['nama_customer'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_customer" class="col-form-label">Kamar</label>
                                    <select name="id_kamar" class="form-control">
                                        <option value="" disabled selected>- - - Pilih Kamar - - -</option>
                                        <?php
                                        foreach ($kamar as $list) {
                                        ?>
                                            <option value="<?= $list['id_kamar'] ?>"><?= $list['id_kamar'] . " - " . $list['ket1'] . " " . $list['ket2']  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="no_telp" class="col-form-label">Tanggal Checkin & Checkout</label>
                                    <input type="text" class="form-control" name="tanggal_in_out" placeholder="Pilih Waktu Checkin dan Checkout" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="email" class="col-form-label">Kamar</label>
                                    <input id="kamar" type="text" value="" name="kamar">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="email" class="col-form-label">Dewasa</label>
                                    <input id="dewasa" type="text" value="" name="dewasa">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="email" class="col-form-label">Anak</label>
                                    <input id="anak" type="text" value="" name="anak">
                                </div>
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-left d-none d-sm-block">
                                    <a href="/order/booking" class="btn btn-secondary"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
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