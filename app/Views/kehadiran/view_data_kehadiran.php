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
                            <li class="breadcrumb-item active">Data Kehadiran</li>
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
                        <input type="file" class="dropify" data-height="75" />
                    </div>
                </div>
            </div>
        </div> <!-- end row -->

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
                                        <tr class="bg-dark-light">
                                            <th>Nama Pegawai</th>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Jumlah Kehadiran</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kehadiran as $hadir) : ?>
                                            <tr>
                                                <td>
                                                    <?= $hadir['nama_pegawai'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= format_indo2($hadir['bulan']) ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $hadir['jumlah_kehadiran'] ?>
                                                </td>
                                                <td class="d-print-none text-center">
                                                    <a type="button" data-toggle="modal" data-target="#edit<?= $hadir['id']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                    <a type="button" data-toggle="modal" data-target="#delete<?= $hadir['id']; ?>">
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
                <form action="<?= site_url('kehadiran/addKehadiran') ?>" method="POST" class="no-validated">
                    <?= csrf_field(); ?>
                    <div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label class="form-label">Pegawai</label>
                                <select name="id_pegawai" class="form-control select2">
                                    <option value="" disabled selected>---Pilih Pegawai---</option>
                                    <?php
                                    foreach ($list_pegawai as $list) {
                                    ?>
                                        <option value="<?= $list['id_pegawai'] ?>"><?= $list['nip'] . " - " . $list['nama_pegawai'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Bulan</label>
                            <div class="input-group">
                                <input type="text" class="form-control choose_month" name="bulan" placeholder="Pilih Bulan" autocomplete="off">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                </div>
                            </div><!-- input-group -->
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jumlah Kehadiran</label>
                            <input id="demo0" type="text" value="0" name="demo0" data-bts-min="0" data-bts-max="100" data-bts-step="1" data-bts-decimal="0" autocomplete="off" />
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

<?php foreach ($kehadiran as $hadir) : ?>
    <div id="edit<?= $hadir['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit <?= $title ?></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('kehadiran/editKehadiran') ?>" method="POST" class="no-validated">
                        <div>
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?= $hadir['id'] ?>">
                                <input type="hidden" name="id_pegawai" value="<?= $hadir['id_pegawai'] ?>">
                                <label class="form-label">ID Pegawai</label>
                                <input type="text" class="form-control " id="id_pegawai<?= $hadir['id_pegawai'] ?>" name="id_pegawai" value="<?= $hadir['id_pegawai'] . '-' . $hadir['nama_pegawai'] ?>" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Bulan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control choose_month" name="bulan" placeholder="Pilih Bulan" autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                                    </div>
                                </div><!-- input-group -->
                            </div>
                            <div class="form-group">
                                <label class="control-label">Jumlah Kehadiran</label>
                                <input id="demo0" type="text" value="0" id="jumlah_kehadiran<?= $hadir['jumlah_kehadiran'] ?>" name="demo0" value="<?= $hadir['jumlah_kehadiran'] ?>" data-bts-min="0" data-bts-max="100" data-bts-step="1" data-bts-decimal="0" autocomplete="off" />
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

<?php foreach ($kehadiran as $hadir) : ?>
    <form action="kehadiran/deleteKehadiran" method="post">
        <div id="delete<?= $hadir['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id" value="<?= $hadir['id'] ?>">
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