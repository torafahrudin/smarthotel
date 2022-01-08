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
                            <li class="breadcrumb-item active">Data COA</li>
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
                        <a type="button" class="btn btn-primary waves-effect waves-light text-white" data-toggle="modal" data-target="#add">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                        </a>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nomor Akun</th>
                                            <th>Nama Akun</th>
                                            <th>Kategori Akun</th>
                                            <th>Posisi</th>
                                            <!-- <th>Saldo Awal</th> -->
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($coa as $akun) : ?>
                                            <tr>
                                                <td>
                                                    <?= $akun['id_akun'] ?>
                                                </td>
                                                <td>
                                                    <?= $akun['nama_akun'] ?>
                                                </td>
                                                <td>
                                                    <?= $akun['kategori'] ?>
                                                </td>
                                                <?php if (strcmp($akun['saldo_normal'], "d") == 0) : ?>
                                                    <td>
                                                        Debit
                                                    </td>
                                                <?php else : ?>
                                                    <td>
                                                        Kredit
                                                    </td>
                                                <?php endif ?>
                                                <!-- <td>
                                            <?= $akun['sa'] ?>
                                        </td> -->
                                                <td class="d-print-none text-center">
                                                    <a type="button" data-toggle="modal" data-target="#edit<?php echo $akun['id_akun']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                    <a type="button" data-toggle="modal" data-target="#delete<?php echo $akun['id_akun']; ?>">
                                                        <i class="mdi mdi-trash-can fa-lg text-danger"></i>
                                                    </a>
                                                </td>
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
<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="myCenterModalLabel">Tambah <?= $title ?></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('coa/add') ?>" method="POST" class="no-validated">
                    <?= csrf_field(); ?>
                    <div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Akun</label>
                            <input type="number" class="form-control " name="id_akun" placeholder="Nomor akun" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Akun</label>
                            <input type="text" class="form-control" name="nama_akun" placeholder="Nama Akun" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="custom-select" aria-label="Default select">
                                <option value="">---Pilih Kategori Akun---</option>
                                <option value="Aktiva">Aktiva</option>
                                <option value="Aktiva Tetap">Aktiva Tetap</option>
                                <option value="Aktiva Lancar">Aktiva Lancar</option>
                                <option value="Kewajiban">Kewajiban</option>
                                <option value="Modal">Modal</option>
                                <option value="Pendapatan">Pendapatan</option>
                                <option value="Beban">Beban</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Posisi Akun</label>
                            <select name="saldo_normal" class="custom-select" aria-label="Default select">
                                <option value="">---Pilih Posisi Akun---</option>
                                <option value="d">Debet</option>
                                <option value="c">Kredit</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3 hide">
                                <label class="form-label">Saldo Awal</label>
                                <input type="text" class="form-control" id="rupiah" name="sa" placeholder="Saldo Awal" autocomplete="off" required>
                            </div> -->
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($coa as $akun) : ?>
    <div id="edit<?php echo $akun['id_akun']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit <?= $title ?></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('coa/edit') ?>" method="POST" class="no-validated">
                        <div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Akun</label>
                                <input type="number" class="form-control" id="nama_akun<?= $akun['id_akun'] ?>" name="id_akun" value="<?= $akun['id_akun'] ?>" autocomplete="off" placeholder="Nomor akun" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Akun</label>
                                <input type="text" class="form-control" id="nama_akun<?= $akun['nama_akun'] ?>" name="nama_akun" value="<?= $akun['nama_akun'] ?>" autocomplete="off" placeholder="Nama Akun" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <?php if (strcmp($akun['kategori'], "Aktiva") == 0) {
                                ?>
                                    <select name="kategori" id="kategori<?= $akun['id_akun'] ?>" class="form-control" required>
                                        <option value="">---Pilih Kategori Akun---</option>
                                        <option value="Aktiva" selected>Aktiva</option>
                                        <option value="Aktiva Tetap">Aktiva Tetap</option>
                                        <option value="Aktiva Lancar">Aktiva Lancar</option>
                                        <option value="Kewajiban">Kewajiban</option>
                                        <option value="Modal">Modal</option>
                                        <option value="Pendapatan">Pendapatan</option>
                                        <option value="Beban">Beban</option>
                                    </select>
                                <?php
                                } elseif (strcmp($akun['kategori'], "Aktiva Tetap") == 0) {
                                ?>
                                    <select name="kategori" id="kategori<?= $akun['id_akun'] ?>" class="form-control" required>
                                        <option value="">---Pilih Kategori Akun---</option>
                                        <option value="Aktiva">Aktiva</option>
                                        <option value="Aktiva Tetap" selected>Aktiva Tetap</option>
                                        <option value="Aktiva Lancar">Aktiva Lancar</option>
                                        <option value="Kewajiban">Kewajiban</option>
                                        <option value="Modal">Modal</option>
                                        <option value="Pendapatan">Pendapatan</option>
                                        <option value="Beban">Beban</option>
                                    </select>
                                <?php
                                } elseif (strcmp($akun['kategori'], "Aktiva Lancar") == 0) {
                                ?>
                                    <select name="kategori" id="kategori<?= $akun['id_akun'] ?>" class="form-control" required>
                                        <option value="">---Pilih Kategori Akun---</option>
                                        <option value="Aktiva">Aktiva</option>
                                        <option value="Aktiva Tetap">Aktiva Tetap</option>
                                        <option value="Aktiva Lancar" selected>Aktiva Lancar</option>
                                        <option value="Kewajiban">Kewajiban</option>
                                        <option value="Modal">Modal</option>
                                        <option value="Pendapatan">Pendapatan</option>
                                        <option value="Beban">Beban</option>
                                    </select>
                                <?php
                                } elseif (strcmp($akun['kategori'], "Kewajiban") == 0) {
                                ?>
                                    <select name="kategori" id="kategori<?= $akun['id_akun'] ?>" class="form-control" required>
                                        <option value="">---Pilih Kategori Akun---</option>
                                        <option value="Aktiva">Aktiva</option>
                                        <option value="Aktiva Tetap">Aktiva Tetap</option>
                                        <option value="Aktiva Lancar">Aktiva Lancar</option>
                                        <option value="Kewajiban" selected>Kewajiban</option>
                                        <option value="Modal">Modal</option>
                                        <option value="Pendapatan">Pendapatan</option>
                                        <option value="Beban">Beban</option>
                                    </select>
                                <?php
                                } elseif (strcmp($akun['kategori'], "Modal") == 0) {
                                ?>
                                    <select name="kategori" id="kategori<?= $akun['id_akun'] ?>" class="form-control" required>
                                        <option value="">---Pilih Kategori Akun---</option>
                                        <option value="Aktiva">Aktiva</option>
                                        <option value="Aktiva Tetap">Aktiva Tetap</option>
                                        <option value="Aktiva Lancar">Aktiva Lancar</option>
                                        <option value="Kewajiban">Kewajiban</option>
                                        <option value="Modal" selected>Modal</option>
                                        <option value="Pendapatan">Pendapatan</option>
                                        <option value="Beban">Beban</option>
                                    </select>
                                <?php
                                } elseif (strcmp($akun['kategori'], "Pendapatan") == 0) {
                                ?>
                                    <select name="kategori" id="kategori<?= $akun['id_akun'] ?>" class="form-control" required>
                                        <option value="">---Pilih Kategori Akun---</option>
                                        <option value="Aktiva">Aktiva</option>
                                        <option value="Aktiva Tetap">Aktiva Tetap</option>
                                        <option value="Aktiva Lancar">Aktiva Lancar</option>
                                        <option value="Kewajiban">Kewajiban</option>
                                        <option value="Modal">Modal</option>
                                        <option value="Pendapatan" selected>Pendapatan</option>
                                        <option value="Beban">Beban</option>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <select name="kategori" id="kategori<?= $akun['id_akun'] ?>" class="form-control" required>
                                        <option value="">---Pilih Kategori Akun---</option>
                                        <option value="Aktiva">Aktiva</option>
                                        <option value="Kewajiban">Kewajiban</option>
                                        <option value="Modal">Modal</option>
                                        <option value="Pendapatan">Pendapatan</option>
                                        <option value="Beban" selected>Beban</option>
                                    </select>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Posisi Akun</label>
                                <?php if (strcmp($akun['saldo_normal'], "d") == 0) {
                                ?>
                                    <select name="saldo_normal" id="saldo_normal<?= $akun['id_akun'] ?>" class="form-control" required>
                                        <option value="">---Pilih Posisi Akun---</option>
                                        <option value="d" selected>Debet</option>
                                        <option value="c">Kredit</option>
                                    </select>
                                <?php

                                } else {
                                ?>
                                    <select name="saldo_normal" id="saldo_normal<?= $akun['id_akun'] ?>" class="form-control" required>
                                        <option value="">---Pilih Posisi Akun---</option>
                                        <option value="d">Debet</option>
                                        <option value="c" selected>Kredit</option>
                                    </select>
                                <?php } ?>
                            </div>
                            <div class="mb-3 hide">
                                <label class="form-label">Saldo Awal</label>
                                <input type="text" class="form-control" id="rupiah2" name="sa" placeholder="Saldo Awal" autocomplete="off" required value="<?= $akun['sa'] ?>">
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-right d-none d-sm-block">
                                    <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>

<?php foreach ($coa as $akun) : ?>
    <form action="<?= base_url('coa/delete') ?>" method="post">
        <div id="delete<?php echo $akun['id_akun']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title mt-0 text-white">Apa Kamu Yakin ?</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-body">
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <input type="hidden" name="id_akun" value="<?= $akun['id_akun'] ?>">
                                <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                <button href="#" class="btn btn-danger" type="submit"><i class="mdi mdi-trash-can fa-lg"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
<?php endforeach ?>


<?= $this->endSection('content'); ?>