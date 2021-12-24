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
                            <li class="breadcrumb-item active">Data Aktiva</li>
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
                                            <th>ID Aktiva</th>
                                            <th>Nama Aktiva</th>
                                            <th>Nama Akun</th>
                                            <th>Kategori</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($aktiva as $akt) : ?>
                                            <tr>
                                                <td>
                                                    <?= $akt['id_aktiva'] ?>
                                                </td>
                                                <td>
                                                    <?= $akt['nama_aktiva'] ?>
                                                </td>
                                                <td>
                                                    <?= $akt['nama_akun'] ?>
                                                </td>
                                                <td>
                                                    <?= $akt['kategori'] ?>
                                                </td>
                                                <td class="d-print-none text-center">
                                                    <a type="button" data-toggle="modal" data-target="#edit<?= $akt['id_aktiva']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                    <a type="button" data-toggle="modal" data-target="#delete<?= $akt['id_aktiva']; ?>">
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
                <form action="<?= site_url('aktiva/aktiva/add') ?>" method="POST" class="no-validated">
                    <?= csrf_field(); ?>
                    <div>
                        <div class="mb-3">
                            <label class="form-label">ID Aktiva</label>
                            <input type="hidden" class="form-control " name="id_aktiva" placeholder="Nomor Aktiva" autocomplete="off" value="<?= $id_aktiva ?>">
                            <input type="text" class="form-control " autocomplete="off" value="<?= $id_aktiva ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Aktiva</label>
                            <input type="text" class="form-control" name="nama_aktiva" placeholder="Nama Aktiva" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Akun</label>
                            <select name="id_akun" class="form-control">
                                <option value="" disabled selected>- - - Pilih Akun - - -</option>
                                <?php
                                foreach ($list_akun as $list) {
                                ?>
                                    <option value="<?= $list['id_akun'] ?>"><?= $list['id_akun'] . " - " . $list['nama_akun'] ?></option>
                                <?php } ?>
                            </select>
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

<?php foreach ($aktiva as $akt) : ?>
    <div id="edit<?= $akt['id_aktiva']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit <?= $title ?></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('aktiva/aktiva/edit') ?>" method="POST" class="no-validated">
                        <div>
                            <div class="mb-3">
                                <label class="form-label">ID Aktiva</label>
                                <input type="text" class="form-control " name="id_aktiva" value="<?= $akt['id_aktiva'] ?>" placeholder="Nomor Aktiva" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Aktiva</label>
                                <input type="text" class="form-control" name="nama_aktiva" value="<?= $akt['nama_aktiva'] ?>" placeholder="Nama Aktiva" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Akun</label>
                                <select name="id_akun" class="form-control" id="id_akun">
                                    <?php foreach ($list_akun as $list) { ?>
                                        <option <?php if ($list['id_akun'] == $akt['id_akun']) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $list['id_akun'] ?>"><?= $list['id_akun'] . " - " . $list['nama_akun'] ?> </option>
                                    <?php } ?>
                                </select>

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

<?php foreach ($aktiva as $akt) : ?>
    <form action="aktiva/delete" method="post">
        <div id="delete<?= $akt['id_aktiva']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id_aktiva" value="<?= $akt['id_aktiva'] ?>">
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