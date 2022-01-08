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
                            <li class="breadcrumb-item active">Laba Rugi</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-box">
            <form action="<?= base_url('labaRugi/filter') ?>" method="post">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <div class="input-group mt-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-calendar-clock fa-lg"></i></span>
                            </div>
                            <input type="text" class="form-control choose_month" name="start_date" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-book-search fa-lg"></i> Filter</button>
                        </div>
                    </div>
                    <?php if ($pendapatans != null) { ?>
                        <div class="col-auto">
                            <div class="mt-2">
                                <a class="btn btn-success" href="<?= base_url('laporan/labaRugi/laba_rugi_excel') ?>"><i class="mdi mdi-file-excel fa-lg"></i> Export</a>
                                <a class="btn btn-danger" href="<?= base_url('laporan/labaRugi/laba_rugi_pdf') ?>"><i class="mdi mdi-file-pdf-box fa-lg"></i> Export</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row pb-3">
                        <div class="col-sm-12" style="background-color:white;" align="center">
                            <b>HOTEL AHADIAT</b>
                        </div>
                        <div class="col-sm-12" style="background-color:white;" align="center">
                            <b>Laba Rugi</b>
                        </div>
                        <div class="col-sm-12" style="background-color:white;" align="center">
                            <b>Periode <?= bulan($date)  ?> <?= $year ?></b>
                        </div>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr class="bg-gray-400">
                                                <th><b>Pendapatan</b></th>
                                                <th><b></b></th>
                                                <th><b></b></th>
                                                <th><b></b></th>
                                                <th><b></b></th>
                                                <th><b></b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_pendapatan_bulan_lalu = 0;
                                            if (!empty($pendapatan_bulan_lalu)) :
                                                foreach ($pendapatan_bulan_lalu as $bulan_lalu) :
                                                    $total_pendapatan_bulan_lalu += $bulan_lalu['nominal'];
                                            ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <?php
                                            $total_pendapatan = 0;
                                            foreach ($pendapatans as $pendapatan) :
                                                $total_pendapatan += $pendapatan['nominal'];
                                            ?>
                                                <tr>
                                                    <td> <?php echo $pendapatan['nama_akun'] ?> </td>
                                                    <!-- <td>Harga Pokok Penjualan</td> -->
                                                    <td></td>
                                                    <td></td>
                                                    <td class='text-center'> Rp <?php echo number_format($pendapatan['nominal']) ?> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                </tr>
                                            <?php endforeach; ?>


                                            <?php $laba_kotor = $total_pendapatan  ?>
                                            <?php if ($laba_kotor < 0) : ?>
                                                <tr>
                                                    <td></td>
                                                    <td> <b> Rugi Kotor</b> </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class='text-center'> Rp <?php echo number_format($laba_kotor) ?> </td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td></td>
                                                    <td> <b> Laba Kotor</b> </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class='text-center'> Rp <?php echo number_format($laba_kotor) ?> </td>
                                                </tr>
                                            <?php endif; ?>

                                        </tbody>
                                        <thead>
                                            <tr class="bg-gray-400">
                                                <th><b>Beban</b></th>
                                                <th><b></b></th>
                                                <th><b></b></th>
                                                <th><b></b></th>
                                                <th><b></b></th>
                                                <th><b></b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_beban_bulan_lalu = 0;
                                            if (!empty($beban_bulan_lalu)) :
                                                foreach ($beban_bulan_lalu as $bulan_lalu) :
                                                    $total_beban_bulan_lalu += $bulan_lalu['total'];
                                            ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <?php
                                            $total_beban = 0;
                                            foreach ($beban as $beban) :
                                                $total_beban += $beban['total'];
                                            ?>
                                                <tr>
                                                    <td> <?php echo $beban['nama_akun'] ?> </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class='text-center'> Rp <?php echo number_format($beban['total']) ?> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                </tr>
                                            <?php endforeach; ?>


                                            <tr>
                                                <td></td>
                                                <td> <b> Total Beban</b> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class='text-center'> Rp (<?php echo number_format($total_beban) ?>) </td>
                                            </tr>
                                            <?php $laba_bersih = $laba_kotor - $total_beban ?>
                                            <?php if ($laba_bersih < 0) : ?>
                                                <tr>
                                                    <td></td>
                                                    <td class="bg-gray-400"> <b> Rugi Bersih</b> </td>
                                                    <td class="bg-gray-400"></td>
                                                    <td class="bg-gray-400"></td>
                                                    <td class="bg-gray-400"></td>
                                                    <td class='text-center bg-gray-400'> Rp <?php echo number_format($laba_bersih) ?> </td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td></td>
                                                    <td class="bg-gray-400"> <b> Laba Bersih</b> </td>
                                                    <td class="bg-gray-400"></td>
                                                    <td class="bg-gray-400"></td>
                                                    <td class="bg-gray-400"></td>
                                                    <td class='text-center bg-gray-400'> Rp <?php echo number_format($laba_bersih) ?> </td>
                                                </tr>
                                            <?php endif; ?>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->




    </div> <!-- container-fluid -->

</div> <!-- content -->

<?= $this->endSection('content'); ?>