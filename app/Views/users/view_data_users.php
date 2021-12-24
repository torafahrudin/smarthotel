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
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="report" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Akses Login</th>
                                            <th>Akses Menu</th>
                                            <th>Akses Site</th>
                                            <th>Image Profile</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $usr) : ?>
                                            <tr>
                                                <td>
                                                    <?= $usr['email'] ?>
                                                </td>
                                                <td>
                                                    <?= $usr['username'] ?>
                                                </td>
                                                <td>
                                                    <?= $usr['fullname'] ?>
                                                </td>
                                                <td>
                                                    <?php if ($usr['description'] == 'Site HRD') : ?>
                                                        <span class="badge badge-primary badge-pill"><?= $usr['description'] ?></span>
                                                    <?php elseif ($usr['description'] != 'Site Keuangan') : ?>
                                                        <span class="badge badge-purple badge-pill"><?= $usr['description'] ?></span>
                                                    <?php else : ?>
                                                        <span class="badge badge-warning badge-pill"><?= $usr['description'] ?></span>
                                                    <?php endif; ?>

                                                </td>
                                                <td>
                                                    <?php if ($usr['id_pegawai'] != '') : ?>
                                                        <span class="badge badge-success badge-pill">Ya</span>
                                                    <?php elseif ($usr['description'] == 'Site HRD') : ?>
                                                        <span class="badge badge-success badge-pill">Ya</span>
                                                    <?php elseif ($usr['description'] == 'Site Keuangan') : ?>
                                                        <span class="badge badge-success badge-pill">Ya</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-danger badge-pill">Perlu Aktivasi</span>
                                                    <?php endif; ?>

                                                </td>
                                                <td>
                                                    <?php if ($usr['active'] == 1) : ?>
                                                        <span class="badge badge-success badge-pill">Ya</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-danger badge-pill">Perlu Akses</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?= $usr['user_image'] ?>
                                                </td>
                                                <td class="d-print-none text-center">

                                                    <?php if ($usr['description'] != 'Site HRD' && $usr['description'] != 'Site Keuangan') : ?>
                                                        <?php if ($usr['id_pegawai'] != '') : ?>
                                                            <?php if ($usr['active'] != 1) : ?>
                                                                <a type="button" data-toggle="modal" data-target="#nonactive<?php echo $usr['id']; ?>"><i class="mdi mdi-lock-check fa-lg text-info"></i></a>
                                                            <?php else : ?>
                                                                <a type="button" data-toggle="modal" data-target="#active<?php echo $usr['id']; ?>"><i class="mdi mdi-lock-open-check fa-lg text-info"></i></a>
                                                            <?php endif; ?>
                                                            <a type="button" data-toggle="modal" data-target="#edit<?php echo $usr['id']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                        <?php else : ?>
                                                            <a type="button" data-toggle="modal" data-target="#access<?php echo $usr['id']; ?>"><i class="mdi mdi-account-check fa-lg text-danger"></i></a>
                                                            <a type="button" data-toggle="modal" data-target="#edit<?php echo $usr['id']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
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

<?php foreach ($users as $usr) : ?>
    <div id="access<?php echo $usr['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Akses Menu Pegawai</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('users/akses') ?>" method="POST" class="no-validated">
                        <div>
                            <input type="hidden" name="user_id" value="<?php echo $usr['id']; ?>">
                            <div class="mb-3">
                                <label class="form-label">Pegawai</label>
                                <select class="form-control select2" name="id_pegawai">
                                    <optgroup label="---Pilih Pegawai Untuk Diberikan Akses Menu---">
                                        <option value="" disabled selected>Daftar Pegawai</option>
                                        <?php
                                        foreach ($list_pegawai as $list) {
                                        ?>
                                            <option value="<?= $list['id_pegawai'] ?>"><?= $list['nip'] . " - " . $list['nama_pegawai'] ?></option>
                                        <?php } ?>
                                    </optgroup>
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

<?php foreach ($users as $usr) : ?>
    <div id="active<?php echo $usr['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Apakah Anda Yakin?</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">User Akan dinonaktifkan dan akses login akan ditutup.</div>
                <div class="modal-body">
                    <form action="<?= site_url('users/nonactive') ?>" method="POST" class="no-validated">
                        <div>
                            <input type="hidden" name="user_id" value="<?php echo $usr['id']; ?>">

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


<?php foreach ($users as $usr) : ?>
    <div id="nonactive<?php echo $usr['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Apakah Anda Yakin?</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">User Akan diaktifkan kembali dan akses login akan dibuka.</div>
                <div class="modal-body">
                    <form action="<?= site_url('users/active') ?>" method="POST" class="no-validated">
                        <div>
                            <input type="hidden" name="user_id" value="<?php echo $usr['id']; ?>">
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

<?= $this->endSection('content'); ?>