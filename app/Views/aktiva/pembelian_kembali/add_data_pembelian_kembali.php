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
                            <li class="breadcrumb-item"><a href="/aktiva/perolehan_lancar">Data Perolehan</a></li>
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
                        Input Data Perolehan Aktiva
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('aktiva/pembeliankembali/add') ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="tanggal" class="col-form-label">Tanggal Transaksi</label>
                                    <input type="text" class="form-control mb-2 choose_date" name="tanggal" autocomplete="off" placeholder="Tanggal" id="tanggal">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="id_vendor" class="col-form-label">Pilih Vendor</label>
                                    <select name="id_vendor" class="form-control">
                                        <option value="" disabled selected>- - - Pilih Vendor - - -</option>
                                        <?php
                                        foreach ($vendor as $list) {
                                        ?>
                                            <option value="<?= $list['id_vendor'] ?>"><?= $list['id_vendor'] . " - " . $list['nama_vendor'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="no_telp" class="col-form-label">Pilih Aktiva</label>
                                    <select name="id_aktiva" class="form-control" id="choose_aktiva">
                                        <option value="" disabled selected>- - - Pilih Aktiva - - -</option>
                                        <?php
                                        foreach ($list_akun_lancar as $list) {
                                        ?>
                                            <option value="<?= $list['id_aktiva'] ?>"><?= $list['id_aktiva'] . " - " . $list['nama_aktiva'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="keterangan" class="col-form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="jumlah" class="col-form-label">Jumlah (unit)</label>
                                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah (unit)" autocomplete="off">
                                    <h5 class="pointeoq">EOQ: <span class="badge badge-info" id="dataeoq"></span> Unit</h5>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="harga_perolehan" class="col-form-label">Harga Perolehan Perunit</label>
                                    <input type="number" class="form-control" name="harga_perolehan" placeholder="Harga Perolehan" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ongkir" class="col-form-label">Ongkir</label>
                                    <input type="number" class="form-control" name="ongkir" placeholder="Ongkir" autocomplete="off">
                                </div>

                                <div class="form-group col-md-1 pt-4">
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus-thick fa-lg text-white"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="pb-2 float-right">
                        <a href="<?= base_url('aktiva/pembeliankembali/selesai') ?>" class="btn btn-success waves-effect waves-light text-white">
                            <i class="mdi mdi-content-save-all fa-lg text-white"></i> Selesai
                        </a>
                    </div>
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="table_detail" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Aktiva Tetap</th>
                                            <th class="text-right">Harga Perolehan/ Unit</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-right">Total Perolehan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detail as $data) : ?>
                                            <tr>
                                                <td><?= $data['id_trans_perolehan'] ?></td>
                                                <td><?= format_indo($data['tanggal']) ?></td>
                                                <td><?= $data['nama_aktiva'] ?></td>
                                                <td class="text-right"><?= format_rp($data['harga_perolehan']) ?></td>
                                                <td class="text-center"><?= $data['jumlah'] ?> Unit</td>
                                                <td class="text-right"><?= format_rp($data['harga_perolehan'] * $data['jumlah']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->


<?= $this->endSection('content'); ?>