<?= $this->extend('templates/header'); ?>

<?= $this->section('content'); ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18"></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Data Header Billing & Sub Billing</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-6">
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
                                            <th>ID Header Billing</th>
                                            <th>Keterangan</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($header as $hd) : ?>
                                            <tr>
                                                <td>
                                                    <?= $hd['id_header_billing'] ?>
                                                </td>
                                                <td>
                                                    <?= $hd['keterangan'] ?>
                                                </td>
                                                <td class="d-print-none text-center">
                                                    <a type="button" data-toggle="modal" data-target="#edit<?= $hd['id_header_billing']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                    <a type="button" data-toggle="modal" data-target="#delete<?= $hd['id_header_billing']; ?>">
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
            <div class="col-6">
                <div class="card-box">
                    <div class="pb-2">
                        <a type="button" class="btn btn-primary waves-effect waves-light text-white" data-toggle="modal" data-target="#addSub">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                        </a>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="report" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID Sub Billing</th>
                                            <th>Keterangan</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sub as $sb) : ?>
                                            <tr>
                                                <td>
                                                    <?= $sb['id_sub_billing'] ?>
                                                </td>
                                                <td>
                                                    <?= $sb['keterangan'] ?>
                                                </td>
                                                <td class="d-print-none text-center">
                                                    <a type="button" data-toggle="modal" data-target="#editSub<?= $sb['id_sub_billing']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                    <a type="button" data-toggle="modal" data-target="#deleteSub<?= $sb['id_sub_billing']; ?>">
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

</div>

<!-- Modal For Header Billing -->
<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="myCenterModalLabel">Tambah Header Billing</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('headerBilling/add') ?>" method="POST" class="no-validated">
                    <?= csrf_field(); ?>
                    <div>
                        <div class="mb-3">
                            <label class="form-label">ID Header Billing</label>
                            <input type="text" class="form-control " name="id_header_billing" placeholder="ID Header Billing" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" autocomplete="off" required>
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

<?php foreach ($header as $hd) : ?>
    <div id="edit<?= $hd['id_header_billing']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit Header Billing</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('headerBilling/edit') ?>" method="POST" class="no-validated">
                        <?= csrf_field(); ?>
                        <div>
                            <div class="mb-3">
                                <label class="form-label">ID Header Billing</label>
                                <input type="text" class="form-control" id="hd<?= $hd['id_header_billing'] ?>" name="id_header_billing" value="<?= $hd['id_header_billing'] ?>" autocomplete="off" placeholder="ID Header Billing" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="hd<?= $hd['keterangan'] ?>" name="keterangan" value="<?= $hd['keterangan'] ?>" autocomplete="off" placeholder="Nama Header Billing" required>
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

<?php foreach ($header as $hd) : ?>
    <form action="headerBilling/delete" method="post">
        <div id="delete<?= $hd['id_header_billing']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id_header_billing" value="<?= $hd['id_header_billing'] ?>">
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

<!-- End Modal For Header Billing -->


<!-- Modal For Sub Billing -->
<div id="addSub" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="myCenterModalLabel">Tambah Sub Billing</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('headerBilling/addSub') ?>" method="POST" class="no-validated">
                    <?= csrf_field(); ?>
                    <div>
                        <div class="mb-3">
                            <label class="form-label">ID Sub Billing</label>
                            <input type="text" class="form-control " name="id_sub_billing" placeholder="ID Sub Billing" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" autocomplete="off" required>
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

<?php foreach ($sub as $sb) : ?>
    <div id="editSub<?= $sb['id_sub_billing']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit Sub Billing</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('headerBilling/editSub') ?>" method="POST" class="no-validated">
                        <?= csrf_field(); ?>
                        <div>
                            <div class="mb-3">
                                <label class="form-label">ID Sub Billing</label>
                                <input type="text" class="form-control" id="sb<?= $sb['id_sub_billing'] ?>" name="id_sub_billing" value="<?= $sb['id_sub_billing'] ?>" autocomplete="off" placeholder="ID Sub Billing" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="sb<?= $sb['keterangan'] ?>" name="keterangan" value="<?= $sb['keterangan'] ?>" autocomplete="off" placeholder="Keterangan" required>
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

<?php foreach ($sub as $sb) : ?>
    <form action="headerBilling/deleteSub" method="post">
        <div id="deleteSub<?= $sb['id_sub_billing']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id_sub_billing" value="<?= $sb['id_sub_billing'] ?>">
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

<!-- End Modal For Sub Billing -->



<?= $this->endSection('content'); ?>