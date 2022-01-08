<?= $this->extend('templates/header'); ?>
<?= $this->section('content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                            <li class="breadcrumb-item active">List Produk</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Tombol untuk rtb kamar dan fasilitas -->
        <?php
        foreach ($produk as $row) :
            //echo $i;
            //menset attribut warna pada tombol, jika kosong diberi warna merah
            //jika lunas maka tombol menjadi disabel
            if ($row->status_bayar == "Belum Lunas") {
                $atr3 = "btn btn-success btn-sm";
                $tombol = "Bayar";
            } else {
                $atr3 = "btn btn-success btn-sm disabled";
                $tombol = "Lunas";
            }
        endforeach;
        ?>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <!-- Untuk Tabel -->
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="receipt_bill" class="table table-striped nowrap">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Id Produk</th>
                                            <th>Harga</th>
                                            <th>Tanggal Check-out</th>
                                            <th>Status Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="new">
                                        <?php
                                        foreach ($produk as $row) :
                                        ?>
                                            <tr class="text-center">
                                                <td><?= $row->id_produk; ?></td>
                                                <td><?= nominal($row->harga); ?></td>
                                                <td><?= $row->checkout; ?></td>
                                                <td>
                                                    <a href="<?= base_url('Payment/ListPayment/' . $row->id_customer . '/' . $nama_customer . '/' . $row->id_produk) ?>" class="<?= $atr3 ?>" role="button"><?= $tombol ?></a>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->endSection('content'); ?>