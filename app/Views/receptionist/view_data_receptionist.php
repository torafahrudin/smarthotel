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
                            <li class="breadcrumb-item active">Data Receptionist</li>
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
                        <a href="<?= base_url('receptionist/add') ?>" class="btn btn-primary waves-effect waves-light text-white">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                        </a>
                    </div>
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID Receptionist</th>
                                            <th>ID Pegawai</th>
                                            <th>Nama</th>
                                            <th>No Telp</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($receptionist as $rcp) : ?>
                                            <tr>
                                                <td>
                                                    <?= $rcp['id_receptionist'] ?>
                                                </td>
                                                <td>
                                                    <?= $rcp['id_pegawai'] ?>
                                                </td>
                                                <td>
                                                    <?= $rcp['nama_receptionist'] ?>
                                                </td>
                                                <td>
                                                    <?= $rcp['no_telp'] ?>
                                                </td>
                                                <td>
                                                    <?php if ($rcp['jenis_kelamin'] == 'L') : ?>
                                                        Laki-laki
                                                    <?php else : ?>
                                                        Perempuan
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?= $rcp['alamat'] ?>
                                                </td>
                                                <td class="d-print-none text-center">
                                                    <a type="button" href="<?= base_url('receptionist/edit/' . $rcp['id_receptionist']) ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                    <a type="button" data-toggle="modal" data-target="#delete<?= $rcp['id_receptionist']; ?>">
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

<?php foreach ($receptionist as $rcp) : ?>
    <form action="<?= base_url('receptionist/delete') ?>" method="post">
        <div id="delete<?php echo $rcp['id_receptionist']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id_receptionist" value="<?= $rcp['id_receptionist'] ?>">
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