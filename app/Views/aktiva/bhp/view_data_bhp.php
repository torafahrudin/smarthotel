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
                            <li class="breadcrumb-item active">Data BHP</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <!-- <div class="pb-2">
                        <a href="/barang/add" class="btn btn-primary waves-effect waves-light text-white">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                        </a>
                    </div> -->

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID BHP</th>
                                            <th>Nama BHP</th>
                                            <th>Keterangan</th>
                                            <th>Status BHP</th>
                                            <!-- <th class="text-center"><i class="fas fa-cog"></i></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bhp as $aktiva) : ?>
                                            <tr>
                                                <td><?= $aktiva['id_aktiva'] ?></td>
                                                <td><?= $aktiva['nama_aktiva'] ?></td>
                                                <td><?= $aktiva['keterangan'] ?></td>
                                                <td class="text-center">
                                                    <?php if ($aktiva['status'] == 'Gudang') : ?>
                                                        <span class="badge badge-success m-b-0"><?= $aktiva['status'] ?></span>
                                                    <?php elseif ($aktiva['status'] == 'Troli') : ?>
                                                        <span class="badge badge-info m-b-0"><?= $aktiva['status'] ?></span>
                                                    <?php else : ?>
                                                        <span class="badge badge-warning m-b-0"><?= $aktiva['status'] ?></span>
                                                    <?php endif; ?>
                                                </td>

                                                <!-- <td class="text-center">
                                                    <a class="" href="<?= site_url('aktiva/update_aktiva/' . $aktiva['id_aktiva']) ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                </td> -->
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

<?php foreach ($bhp as $aktiva) : ?>
    <form action="aktivaTetap/delete" method="post">
        <div id="delete<?php echo $aktiva['id_aktiva']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id_aktiva" value="<?= $aktiva['id_aktiva'] ?>">
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