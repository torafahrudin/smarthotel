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
                            <li class="breadcrumb-item active">Buku Besar</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-box">
            <form action="<?php echo base_url('bukuBesar/filter') ?>" method="post">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <div class="input-group mt-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-calendar-clock fa-lg"></i></span>
                            </div>
                            <input type="text" class="form-control choose_month" name="start_date" autocomplete="off" placeholder="Bulan">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="input-group mt-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-forum fa-lg"></i></span>
                            </div>
                            <select name="id_akun" class="form-control">
                                <option value="" disabled selected>- - - Pilih Akun - - -</option>
                                <?php
                                foreach ($list_akun as $list) {
                                ?>
                                    <option value="<?= $list['id_akun'] ?>"><?= $list['id_akun'] . " - " . $list['nama_akun'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-book-search fa-lg"></i> Filter</button>
                        </div>
                    </div>
                    <?php if ($buku_besar != null) { ?>
                        <div class="col-auto">
                            <div class="mt-2">
                                <a class="btn btn-success" href="<?= base_url('laporan/bukuBesar/buku_besar_excel') ?>"><i class="mdi mdi-file-excel fa-lg"></i> Export</a>
                                <a class="btn btn-danger" href="<?= base_url('laporan/bukuBesar/buku_besar_pdf') ?>"><i class="mdi mdi-file-pdf-box fa-lg"></i> Export</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="row">
                        <div class="col-sm-12" style="background-color:white;" align="center">
                            <b>HOTEL AHADIAT</b>
                        </div>
                        <div class="col-sm-12" style="background-color:white;" align="center">
                            <b>Buku Besar</b>
                        </div>
                        <div class="col-sm-12" style="background-color:white;" align="center">
                            <b>Periode <?= bulan($date)  ?> <?= $year ?></b>
                        </div>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="report" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr class="bg-dark-light">
                                            <th rowspan="2">Tanggal</th>
                                            <th rowspan="2">Nama Akun</th>
                                            <th rowspan="2">No Akun</th>
                                            <th rowspan="2" class="text-center">Debet</th>
                                            <th rowspan="2" class="text-center">Kredit</th>
                                            <th colspan="2" class="text-center">Saldo </th>
                                        </tr>
                                        <tr class="bg-dark-light">
                                            <th class="text-center">Debet</th>
                                            <th class="text-center">Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>-</td>
                                            <td style="background-color: #eee">Saldo Awal</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <?php
                                            if (strcmp($posisi_saldo_normal, 'd') == 0) {
                                                echo "<td style='background-color: #eee' class='text-right'> Rp " . nominal1((float)$saldo_awal) . "</td>";
                                                echo "<td>-</td>";
                                                $saldo_debet = $saldo_awal;
                                                $saldo_kredit = 0;
                                            } else {
                                                echo "<td>-</td>";
                                                echo "<td style='background-color: #eee' class='text-right'> Rp " . nominal1((float)$saldo_awal) . "</td>";
                                                $saldo_debet = 0;
                                                $saldo_kredit = $saldo_awal;
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                        //echo $saldo_debet."-".$saldo_kredit."<br>";
                                        if (!empty($buku_besar)) :
                                            foreach ($buku_besar as $cacah) :
                                                echo "<tr>";
                                                echo "<td>" . $cacah['tanggal'] . "</td>";
                                                echo "<td>" . $cacah['nama_akun'] . "</td>";
                                                echo "<td>" . $cacah['id_akun'] . "</td>";

                                                //untuk posisi d c dari jurnal adalah debet / d
                                                if (strcmp($cacah['posisi'], 'd') == 0) {
                                                    // if ($saldo_debet >= $cacah['nominal']) {
                                                    echo "<td class='text-right'> Rp " . nominal1((float)$cacah['nominal']) . "</td>";
                                                    echo "<td>-</td>";

                                                    //jika posisi saldo normal ada di debet, maka di tambah dan ditampilkan ke posisi debet
                                                    if (strcmp($posisi_saldo_normal, 'd') == 0) {
                                                        // if ($saldo_debet >= $cacah['nominal']) {
                                                        $saldo_debet = $saldo_debet  + $cacah['nominal'];
                                                        echo "<td class='text-right'> Rp " . nominal1((float)$saldo_debet) . "</td>";
                                                        echo "<td class='text-right'> Rp " . nominal1((float)$saldo_kredit) . "</td>";
                                                    } else {
                                                        $saldo_kredit = $saldo_kredit  - $cacah['nominal'];
                                                        echo "<td class='text-right'> Rp " . nominal1((float)$saldo_debet) . "</td>";
                                                        echo "<td class='text-right'> Rp " . nominal1((float)$saldo_kredit) . "</td>";
                                                    }
                                                } else {
                                                    //jika posisi d c dari jurnal adalah kredit / c
                                                    echo "<td>-</td>";
                                                    echo "<td class='text-right'> Rp " . nominal1((float)$cacah['nominal']) . "</td>";

                                                    if (strcmp($posisi_saldo_normal, 'd') == 0) {
                                                        // if ($saldo_debet >= $cacah['nominal']) {
                                                        $saldo_debet = $saldo_debet  + $cacah['nominal'];
                                                        echo "<td class='text-right'> Rp " . nominal1((float)$saldo_kredit) . "</td>";
                                                        echo "<td class='text-right'> Rp " . nominal1((float)$saldo_debet) . "</td>";
                                                    } else {
                                                        $saldo_kredit = $saldo_kredit  + $cacah['nominal'];
                                                        echo "<td class='text-right'> Rp " . nominal1((float)$saldo_debet) . "</td>";
                                                        echo "<td class='text-right'> Rp " . nominal1((float)$saldo_kredit) . "</td>";
                                                    }
                                                }
                                                echo "</tr>";
                                            endforeach;
                                            if (strcmp($posisi_saldo_normal, 'd') == 0) {
                                                $saldo_akhir = $saldo_debet - $saldo_kredit;
                                            } else {
                                                $saldo_akhir = $saldo_kredit - $saldo_debet;
                                            }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>-</td>
                                            <td style='background-color: #eee'>Saldo Akhir</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <?php
                                            // if ($saldo_debet >= $cacah['nominal']) {
                                            if (strcmp($posisi_saldo_normal, 'd') == 0) {
                                                echo "<td style='background-color: #eee' class='text-right'> Rp " . nominal1((float)$saldo_akhir) . "</td>";
                                                echo "<td style='background-color: ' >-</td>";
                                            } else {
                                                echo "<td style='background-color: #black' >-</td>";
                                                echo "<td style='background-color: #eee' class='text-right'> Rp " . nominal1((float)$saldo_akhir) . "</td>";
                                            }
                                            ?>
                                        </tr>
                                    <?php endif; ?>
                                    </tfoot>
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