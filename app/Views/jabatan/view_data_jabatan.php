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
                            <li class="breadcrumb-item active">Data Jabatan</li>
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
                                        <tr class="bg-dark-light">
                                            <th>ID Jabatan</th>
                                            <th>Departemen</th>
                                            <th>Nama Jabatan</th>
                                            <th>Golongan</th>
                                            <th>Gaji Pokok</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($jabatan as $jbt) : ?>
                                            <tr>
                                                <td>
                                                    <?= $jbt['id_jabatan'] ?>
                                                </td>
                                                <td>
                                                    <?= $jbt['nama_departemen'] ?>
                                                </td>
                                                <td>
                                                    <?= $jbt['nama_jabatan'] ?>
                                                </td>
                                                <td>
                                                    <?= $jbt['golongan'] ?>
                                                </td>
                                                <td>
                                                    <?= ($jbt['gaji_pokok']) ?>
                                                </td>
                                                <td class="d-print-none text-center">
                                                    <a type="button" data-toggle="modal" data-target="#edit<?php echo $jbt['id_jabatan']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                    <a type="button" data-toggle="modal" data-target="#delete<?php echo $jbt['id_jabatan']; ?>">
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h4 class="modal-title text-white" id="myCenterModalLabel">Tambah <?= $title ?></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('jabatan/addJabatan') ?>" method="POST" class="no-validated">
                    <?= csrf_field(); ?>
                    <div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">ID Jabatan</label>
                                <input type="text" class="form-control " name="id_jabatan" value="<?= $id_jabatan; ?>" disabled>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Nama Jabatan</label>
                                <input type="text" class="form-control" name="nama_jabatan" placeholder="Nama Jabatan" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                    <label for="id_departemen">Departemen</label>
                                    <select name="id_departemen" class="form-control">
                                        <option value="" disabled selected>- - - Pilih Departemen - - -</option>
                                        <?php
                                        foreach ($departemen as $list) {
                                        ?>
                                            <option value="<?= $list['id_departemen'] ?>"><?= $list['id_departemen'] . " - " . $list['nama_departemen'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                        
                            <div class="col-6 mb-3">
                                <label class="form-label">Golongan</label>
                                <select name="golongan" class="custom-select" aria-label="Default select">
                                    <option value="">---Pilih Golongan---</option>
                                    <option value="General Manager">General Manager</option>
                                    <option value="Ass Manager">Assisten Manager</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Daily Worker">Daily Worker</option>
                                </select>
                            </div>
                        </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Gaji Pokok</label>
                                <input type="number" class="form-control" name="gaji_pokok" placeholder="Gaji Pokok" autocomplete="off" required>
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

<?php foreach ($jabatan as $jbt) : ?>
    <div id="edit<?php echo $jbt['id_jabatan']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit <?= $title ?></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('jabatan/editJabatan') ?>" method="POST" class="no-validated">
                        <div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">ID Jabatan</label>
                                    <input type="hidden" name="id_jabatan" value="<?= $jbt['id_jabatan'] ?>">
                                    <input type="text" class="form-control " id="id_jabatan<?= $jbt['id_jabatan'] ?>" name="id_jabatan" value="<?= $jbt['id_jabatan'] ?>" disabled>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Nama Jabatan</label>
                                    <input type="text" class="form-control" id="nama_jabatan<?= $jbt['nama_jabatan'] ?>" name="nama_jabatan" value="<?= $jbt['nama_jabatan'] ?>" placeholder="nama_jabatan" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-6 mb-3">
                                    <label for="id_departemen">Departemen</label>
                                    <select name="id_departemen" class="form-control">
                                        <option value="" disabled selected>- - - Pilih Departemen - - -</option>
                                        <?php
                                        foreach ($departemen as $list) {
                                        ?>
                                            <option value="<?= $list['id_departemen'] ?>"><?= $list['id_departemen'] . " - " . $list['nama_departemen'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label">Golongan</label>
                                    <?php if (strcmp($jbt['golongan'], "General Manager") == 0) {
                                    ?>
                                        <select name="golongan" id="golongan<?= $jbt['id_jabatan'] ?>" class="form-control" required>
                                            <option value="">---Pilih Golongan---</option>
                                            <option value="General Manager" selected>General Manager</option>
                                            <option value="Ass Manager">Ass Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Daily Worker">Daily Worker</option>
                                        </select>
                                    <?php
                                    } elseif (strcmp($jbt['golongan'], "Aktiva Tetap") == 0) {
                                    ?>
                                        <select name="golongan" id="golongan<?= $jbt['id_jabatan'] ?>" class="form-control" required>
                                            <option value="">---Pilih Golongan---</option>
                                            <option value="General Manager">General Manager</option>
                                            <option value="Ass Manager" selected>Ass Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Daily Worker">Daily Worker</option>
                                        </select>
                                    <?php
                                    } elseif (strcmp($jbt['golongan'], "Aktiva Lancar") == 0) {
                                    ?>
                                        <select name="golongan" id="golongan<?= $jbt['id_jabatan'] ?>" class="form-control" required>
                                            <option value="">---Pilih Golongan---</option>
                                            <option value="General Manager">General Manager</option>
                                            <option value="Ass Manager">Ass Manager</option>
                                            <option value="Supervisor" selected>Supervisor</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Daily Worker">Daily Worker</option>
                                        </select>
                                    <?php
                                    } else {
                                    ?>
                                        <select name="golongan" id="golongan<?= $jbt['id_jabatan'] ?>" class="form-control" required>
                                            <option value="">---Pilih Golongan---</option>
                                            <option value="General Manager">General Manager</option>
                                            <option value="Ass Manager">Ass Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Staff" selected>Staff</option>
                                            <option value="Daily Worker">Daily Worker</option>
                                        </select>
                                    <?php } ?>
                                </div>
                             </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label">Gaji Pokok</label>
                                    <input type="number" class="form-control" id="gaji_pokok<?= $jbt['gaji_pokok'] ?>" name="gaji_pokok" value="<?= $jbt['gaji_pokok'] ?>" placeholder="Gaji Pokok" autocomplete="off" required>
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

<?php foreach ($jabatan as $jbt) : ?>
    <form action="jabatan/deleteJabatan" method="post">
        <div id="delete<?php echo $jbt['id_jabatan']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id_jabatan" value="<?= $jbt['id_jabatan'] ?>">
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