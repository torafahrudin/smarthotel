<?= $this->extend('templates/header'); ?>

<?= $this->section('content'); ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid ">

        <!-- start page title -->
        <div class="row pr-2">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18"></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Data Service Charge</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-box w-50 mx-auto">
            <div class="text-md-left footer-links d-none d-sm-block">
                <form action="<?= site_url('service_charge/edit') ?>" method="post">
                    <div class="form-row align-items-center pt-2">
                        <div class="col-5">
                            <label class="form-label">Nilai Service Charge</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-format-list-numbered fa-lg"></i></span>
                                </div>
                                <input type="text" class="form-control" name="sc" autocomplete="off" placeholder="<?= $sc['nilai']; ?>" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-percent fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <label class="form-label">Nilai Pajak</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-format-list-numbered fa-lg"></i></span>
                                </div>
                                <input type="text" class="form-control" name="pajak" autocomplete="off" placeholder="<?= $pajak['nilai']; ?>" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-percent fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 pt-3">
                            <label class="form-label"></label>
                            <button type="submit" class="btn btn-success"><i class="mdi mdi-refresh-circle fa-lg"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-box w-50 mx-auto">
            <div class="responsive-table-plugin">
                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="report" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr class="bg-dark-light">
                                    <th>No</th>
                                    <th>Setting</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($service_charge as $sc) : ?>
                                    <tr>
                                        <td>
                                            <?= $sc['id'] ?>
                                        </td>
                                        <td>
                                            <?= $sc['nama'] ?>
                                        </td>
                                        <td>
                                            <?= $sc['nilai'] ?> %
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




    </div> <!-- container-fluid -->

</div> <!-- content -->



<?= $this->endSection('content'); ?>