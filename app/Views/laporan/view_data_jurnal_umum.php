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
                            <li class="breadcrumb-item active">Jurnal Umum</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-box">
            <form action="<?= base_url('jurnal/filter') ?>" method="post">
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
                    <?php if ($data_jurnals != null) { ?>
                        <div class="col-auto">
                            <div class="mt-2">
                                <a class="btn btn-success" href="<?= base_url('laporan/jurnal/jurnal_umum_excel') ?>"><i class="mdi mdi-file-excel fa-lg"></i> Export</a>
                                <a class="btn btn-danger" href="<?= base_url('laporan/jurnal/jurnal_umum_pdf') ?>"><i class="mdi mdi-file-pdf-box fa-lg"></i> Export</a>
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
                            <b>Jurnal Umum</b>
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
                                        <tr>
                                            <th>ID Jurnal</th>
                                            <th>Tanggal</th>
                                            <th>Akun</th>
                                            <th class=" text-center">Reff</th>
                                            <th class="text-center">Debet</th>
                                            <th class="text-center">Kredit</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $total_debit = 0;
                                    $total_kredit = 0;
                                    ?>
                                    <tbody>
                                        <?php foreach ($data_jurnals as $data_jurnal) :
                                            $total_debit += $data_jurnal->debet;
                                            $total_kredit += $data_jurnal->kredit;
                                        ?>
                                            <tr>
                                                <td width="100">
                                                    <?= $data_jurnal->id_jurnal ?>
                                                </td>
                                                <td width="100">
                                                    <?= format_indo($data_jurnal->tanggal) ?>
                                                </td>
                                                <?php if ($data_jurnal->posisi == 'd') : ?>
                                                    <td class="text" width="250">
                                                        <?= $data_jurnal->nama_akun ?>
                                                    </td>
                                                <?php else : ?>
                                                    <td class="text pl-5" width="250">
                                                        <?= $data_jurnal->nama_akun ?>
                                                    </td>
                                                <?php endif; ?>
                                                <td width="100" class="text-center">
                                                    <?= $data_jurnal->id_akun ?>
                                                </td>
                                                <td width="100" class="text-right">
                                                    <?= nominal($data_jurnal->debet) ?>
                                                </td>
                                                <td width="100" class="text-right">
                                                    <?= nominal($data_jurnal->kredit) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th class="text-right"><?= nominal($total_debit) ?></th>
                                            <th class="text-right"><?= nominal($total_kredit) ?></th>
                                        </tr>
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