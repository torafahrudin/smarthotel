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
                            <li class="breadcrumb-item active">Data Pegawai</li>
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
                        <a href="/pegawai/add" type="button" class="btn btn-primary waves-effect waves-light text-white">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                        </a>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr class="bg-dark-light">
                                            <th>ID Pegawai</th>
                                            <th>NIP</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jabatan</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pegawai as $pgw) : ?>
                                            <tr>
                                                <td>
                                                    <?= $pgw['id_pegawai'] ?>
                                                </td>
                                                <td>
                                                    <?= $pgw['nip'] ?>
                                                </td>
                                                <td>
                                                    <?= $pgw['nama_pegawai'] ?>
                                                </td>
                                                <td>
                                                    <?= $pgw['nama_jabatan'] ?>
                                                </td>
                                                <td>
                                                    <?= $pgw['no_telp'] ?>
                                                </td>
                                                <td>
                                                    <?= $pgw['alamat'] ?>
                                                </td>
                                                <td class="d-print-none text-center">
                                                    <?php if ($pgw['group_id'] != 1 && $pgw['group_id'] != 2) : ?>
                                                        <a type="button" data-toggle="modal" data-target="#edit<?= $pgw['id_pegawai']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                        <a type="button" data-toggle="modal" data-target="#delete<?= $pgw['id_pegawai']; ?>">
                                                            <i class="mdi mdi-trash-can fa-lg text-danger"></i>
                                                        </a>
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


<?php foreach ($pegawai as $pgw) : ?>
    <div id="edit<?= $pgw['id_pegawai']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit <?= $title ?></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('pegawai/editPegawai') ?>" method="POST" class="no-validated">
                        <div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">ID Pegawai</label>
                                    <input type="hidden" name="id_pegawai" value="<?= $pgw['id_pegawai'] ?>">
                                    <input type="text" class="form-control " id="id_pegawai<?= $pgw['id_pegawai'] ?>" name="id_pegawai" value="<?= $pgw['id_pegawai'] ?>" disabled>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">NIP</label>
                                    <input type="text" class="form-control" id="nip<?= $pgw['nip'] ?>" name="nip" value="<?= $pgw['nip'] ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Masukkan NIP')" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama_pegawai<?= $pgw['nama_pegawai'] ?>" name="nama_pegawai" value="<?= $pgw['nama_pegawai'] ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Masukkan Nama Pegawai')" oninput="setCustomValidity('')">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No Telp</label>
                                <input type="text" class="form-control" id="no_telp<?= $pgw['no_telp'] ?>" name="no_telp" value="<?= $pgw['no_telp'] ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Masukkan No Telp')" oninput="setCustomValidity('')">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email<?= $pgw['email'] ?>" name="email" value="<?= $pgw['email'] ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Masukkan Email')" oninput="setCustomValidity('')">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat<?= $pgw['alamat'] ?>" name="alamat" value="<?= $pgw['alamat'] ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Masukkan Alamat')" oninput="setCustomValidity('')"></input>
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

<?php foreach ($pegawai as $pgw) : ?>
    <form action="pegawai/deletePegawai" method="post">
        <div id="delete<?= $pgw['id_pegawai']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id_pegawai" value="<?= $pgw['id_pegawai'] ?>">
                                <input type="hidden" name="user_id" value="<?= $pgw['user_id'] ?>">
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