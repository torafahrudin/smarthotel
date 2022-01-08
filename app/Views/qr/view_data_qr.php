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
                    <div class="pb-2">
                        <a type="button" class="btn btn-primary waves-effect waves-light text-white" data-toggle="modal" data-target="#modalAdd">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                        </a>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table class="table table-striped border">
                                    <thead class="text-center">
                                        <th class="table-order border">#</th>
                                        <th class="table-content border">Content</th>
                                        <th class="table-action border">Action</th>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($qr_list as $key => $qr) { ?>
                                            <tr class="text-center">

                                                <!-- Number -->
                                                <td class="border"><?= $key + 1 ?></td>

                                                <!-- Content -->
                                                <td class="border"><?= $qr['content'] ?></td>

                                                <!-- Action -->
                                                <td class="border">

                                                    <!-- Show -->
                                                    <button data-toggle="modal" data-target="#modalShow<?= $qr['id'] ?>" class="btn btn-sm btn-success mr-2">
                                                        <span class="fas fa-eye"></span> Show
                                                    </button>

                                                    <!-- Edit -->
                                                    <button data-toggle="modal" data-target="#modalEdit<?= $qr['id'] ?>" class="btn btn-sm btn-primary mr-2 px-2">
                                                        <span class="fas fa-edit"></span> Edit
                                                    </button>

                                                    <!-- Delete -->
                                                    <button data-toggle="modal" data-target="#modalDelete<?= $qr['id'] ?>" class="btn btn-sm btn-danger">
                                                        <span class="fas fa-trash"></span> Delete
                                                    </button>
                                                </td>

                                            </tr>
                                        <?php } ?>

                                        <!-- Empty State -->
                                        <?php if (empty($qr_list)) { ?>
                                            <tr class="text-center">
                                                <td colspan="3">Data not found</td>
                                            </tr>
                                        <?php } ?>

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

<!-- Modal Add -->
<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url('home/add_data') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb-3">

                    <!-- Content -->
                    <textarea name="content" class="form-control" required></textarea>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($qr_list as $key => $qr) { ?>
    <div id="modalShow<?= $qr['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= base_url('home/add_data') ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">QR Show</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mb-3">

                        <!-- QR Image -->
                        <img src="<?= base_url($qr['file']) ?>" class="content-img" alt="<?= $qr['content'] ?>">

                        <!-- Content -->
                        <span class="form-control text-center"><?= $qr['content'] ?></span>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>



<?= $this->endSection('content'); ?>