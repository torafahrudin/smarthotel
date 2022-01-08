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
                            <li class="breadcrumb-item active">Data fasilitas</li>
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
                        <a href="/fasilitas/add" class="btn btn-primary waves-effect waves-light text-white">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                        </a>
                    </div>
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr align="center">
                                            <th >ID Fasilitas</th>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>Qty</th>
                                            <th >Kapasitas</th>
                                            <th >Harga</th>
                                            <th>Status</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($fasilitas as $fsl) : ?>
                                            <tr>
                                                <td align="center">
                                                    <?= $fsl['id_fasilitas'] ?>
                                                </td>
                                                <td>
                                                    <?= $fsl['nama_fasilitas'] ?>
                                                </td>
                                                <td align="center">
                                                    <?= $fsl['id_header_billing'] ?>
                                                </td>
                                                <td align="center">
                                                    <?= $fsl['qty'] ?>
                                                </td>
                                                <td align="right">
                                                    <?= $fsl['kapasitas'] ?> orang
                                                </td>
                                                <td align="right">
                                                    <?= nominal($fsl['harga']) ?>
                                                </td>
                                                <td>
                                                    <h5><span class="badge badge-success badge-pill"><?= $fsl['status'] ?>
                                                     <i class="mdi mdi-trending-up"></i>
                                                     </span></h5>
                                                </td>
                                                <td class="d-print-none text-center">
                                                    <a type="button" href="<?= base_url('fasilitas/edit/' . $fsl['id_fasilitas']) ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                    <a type="button" data-toggle="modal" data-target="#delete<?= $fsl['id_fasilitas']; ?>">
                                                        <i class="mdi mdi-trash-can fa-lg text-danger"></i>
                                                    <!-- <a href="<?= base_url('fasilitas/detail/' . $fsl['id_fasilitas']) ?>" class="btn btn-info waves-effect waves-light text-white">
                                                     <a href="#" data-toggle="modal" data-target="#detail<?php echo $fsl['id_fasilitas']; ?>" >
                                                     <i class="mdi mdi-eye fa-lg text-blue"></i> -->
                                                      </a>  
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

<?php foreach ($fasilitas as $fsl) : ?>
    <form action="fasilitas/delete" method="post">
        <div id="delete<?php echo $fsl['id_fasilitas']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id_fasilitas" value="<?= $fsl['id_fasilitas'] ?>">
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

<?php foreach ($fasilitas as $fs) : ?>
    <div id="detail<?= $fs['id_fasilitas']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title mt-0 text-white">Detail Fasilitas</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img src="assets/images/fasilitas/swimming" class="img-fluid" width="300" height="180">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-2 mt-1">
                        <div class="float-right d-none d-sm-block">
                            <input type="hidden" name="id_fasilitas" value="<?= $fs['id_fasilitas'] ?>">
                            <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>



<?= $this->endSection('content'); ?>