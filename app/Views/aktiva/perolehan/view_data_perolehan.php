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
            <div class="col-12">
                <div class="card-box">
                    <div class="pb-2">
                        <a href="/aktiva/perolehan/add" class="btn btn-primary waves-effect waves-light text-white">
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
                                            <th>Vendor</th>
                                            <th>Aktiva Tetap</th>
                                            <th class="text-right">Harga Perolehan/ Unit</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-right">Total Perolehan</th>
                                            <th class="text-center">Masa Manfaat</th>
                                            <th class="text-center">Nilai Residu </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($perolehan as $data) : ?>
                                            <tr>
                                                <td><?= $data['id_trans_perolehan'] ?></td>
                                                <td><?= format_indo($data['tanggal']) ?></td>
                                                <td><?= $data['id_vendor'] ?></td>
                                                <td><?= $data['nama_aktiva'] ?></td>
                                                <td class="text-right"><?= nominal($data['harga_perolehan']) ?></td>
                                                <td class="text-center"><?= $data['jumlah'] ?> Unit</td>
                                                <td class="text-right"><?= nominal($data['harga_perolehan'] * $data['jumlah']) ?></td>
                                                <td class="text-center"><?= $data['masa_manfaat'] ?> Tahun</td>
                                                <td class="text-right"><?= nominal($data['estimasi_nilai_residu']) ?></td>
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