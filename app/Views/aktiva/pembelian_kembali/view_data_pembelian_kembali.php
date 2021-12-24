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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Data Aktiva Tetap</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-8">
                <div class="card-box">
                    <div class="pb-2">
                        <a href="/aktiva/pembeliankembali/add" class="btn btn-primary waves-effect waves-light text-white">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                        </a>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>BHP</th>
                                            <th class="text-right">Harga Perolehan/ Unit</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-right">Total Perolehan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pembelian as $data) : ?>
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
            <div class="col-4">
                <div class="card-box">
                    <div class="pb-2">
                        <a href="/aktiva/pembeliankembali/addNilai" class="btn btn-primary waves-effect waves-light text-white">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                        </a>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="eoq" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>BHP</th>
                                            <th>EOQ</th>
                                            <th>ROP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($eoq_rop as $data) : ?>
                                            <tr>
                                                <td><?= $data['nama_aktiva'] ?></td>
                                                <td><?= $data['eoq'] ?></td>
                                                <td><?= nominal1($data['rop']) ?></td>
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