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
                            <li class="breadcrumb-item active">Data Kategori Pegawai</li>
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
                                            <th>Kode Kategori Pegawai</th>
                                            <th>Nama Kategori Pegawai</th>
                                            
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kategori_pegawai as $ktg) : ?>
                                            <tr>
                                                <td>
                                                    <?= $ktg['kode_kategori'] ?>
                                                </td>
                                                <td>
                                                    <?= $ktg['nama_kategori'] ?>
                                                </td>
                                                
                                                <td class="d-print-none text-center">
                                                    <a type="button" data-toggle="modal" data-target="#edit<?php echo $ktg['kode_kategori']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                    <a type="button" data-toggle="modal" data-target="#delete<?php echo $ktg['kode_kategori']; ?>">
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
                <form action="<?= site_url('kategori_pegawai/addkategori') ?>" method="POST" class="no-validated">
                    <?= csrf_field(); ?>
                    <div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Kode Kategori Pegawai</label>
                                <input type="text" class="form-control " name="kode_kategori" value="<?= $kode_kategori; ?>" disabled>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Nama Kategori Pegawai</label>
                                <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori Pegawai" autocomplete="off" required>
                            </div>
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

<?php foreach ($kategori_pegawai as $ktg) : ?>
    <div id="edit<?php echo $ktg['kode_kategori']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit <?= $title ?></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('kategori_pegawai/editkategori') ?>" method="POST" class="no-validated">
                        <div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">Kode Kategori Pegawai</label>
                                    <input type="hidden" name="kode_kategori" value="<?= $ktg['kode_kategori'] ?>">
                                    <input type="text" class="form-control " id="kode_kategori<?= $ktg['kode_kategori'] ?>" name="kode_kategori" value="<?= $ktg['kode_kategori'] ?>" disabled>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Nama Kategori Pegawai</label>
                                    <input type="text" class="form-control" id="nama_kategori<?= $ktg['nama_kategori'] ?>" name="nama_kategori" value="<?= $ktg['nama_kategori'] ?>" placeholder="nama_kategori" autocomplete="off" required>
                                </div>
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

<?php foreach ($kategori_pegawai as $ktg) : ?>
    <form action="kategori_pegawai/deletekategori" method="post">
        <div id="delete<?php echo $ktg['kode_kategori']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="kode_kategori" value="<?= $ktg['kode_kategori'] ?>">
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