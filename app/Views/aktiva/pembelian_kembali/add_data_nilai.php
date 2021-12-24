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
                            <li class="breadcrumb-item"><a href="<?= base_url('aktiva/pembeliankembali') ?>">Data Pembelian Kembali</a></li>
                            <li class="breadcrumb-item active">Input Data Perhitungan</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Form row -->
        <form action="<?= base_url('aktiva/pembeliankembali/addNilai') ?>" method="POST" class="no-validated">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header header-title bg-primary text-white">
                            Pilih Barang
                        </div>
                        <div class="card-body">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_aktiva" class="col-form-label">BHP</label>
                                    <select name="id_aktiva" class="form-control">
                                        <option value="" disabled selected>- - - Pilih BHP - - -</option>
                                        <?php
                                        foreach ($list_akun_lancar as $list) {
                                        ?>
                                            <option value="<?= $list['id_aktiva'] ?>"><?= $list['id_aktiva'] . " - " . $list['nama_aktiva'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 pt-4">
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus-thick fa-lg text-white"></i>Proses</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>

        <?php if ($list_eoq) : ?>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header header-title bg-primary text-white">
                        Input Data Perhitungan ROP
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('aktiva/pembeliankembali/rop') ?>" method="POST" class="no-validated">

                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="id_aktiva" class="col-form-label">Safety Point (%)</label>
                                    <input type="number" class="form-control" name="safety" placeholder="Safety Poin" max="100" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="id_aktiva" class="col-form-label">Lead Time</label>
                                    <input type="number" class="form-control" name="lead" placeholder="Lead Time" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="eoq" class="col-form-label">EOQ</label>
                                    <input type="number" class="form-control" name="eoq" placeholder="EOQ" autocomplete="off">
                                </div>
                                <div class="form-group col-md-2 pt-4">
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus-thick fa-lg text-white"></i>Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- end row -->
    <?php if ($list_eoq) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-title bg-primary text-white">
                        <?php
                        foreach ($list_eoq as $data) :
                        ?> EOQ <?= $data['nama_aktiva'] ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th class="text-center">Unit</th>
                                    <th>Ongkir</th>
                                    <th colspan="2" class="text-center">EOQ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($list_eoq as $data) :
                                    $total += round(sqrt(2 * $data['total_barang'] * $data['total_ongkir'] / $data['total_harga']));
                                ?>
                                    <tr>
                                        <td><?= format_bulan($data['month']) . '-' . $data['year'] ?></td>
                                        <td><?= $data['nama_aktiva'] ?></td>
                                        <td><?= format_rp($data['total_harga']) ?></td>
                                        <td class="text-center"><?= $data['total_barang'] ?></td>
                                        <td><?= format_rp($data['total_ongkir']) ?></td>
                                        <td class="text-center"> <?= round(2 * $data['total_barang'] * $data['total_ongkir'] / $data['total_harga']) ?> </td>
                                        <td class="text-center"><?= round(sqrt(2 * $data['total_barang'] * $data['total_ongkir'] / $data['total_harga'])) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6"></td>
                                    <td class="text-center"><?= $total ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div> <!-- container-fluid -->

</div> <!-- content -->


<?= $this->endSection('content'); ?>