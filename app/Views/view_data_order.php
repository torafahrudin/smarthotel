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
                            <li class="breadcrumb-item active">All Data Order</li>
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
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID Order</th>
                                            <th>ID Booking</th>
                                            <th>Nama Customer</th>
                                            <th>Kamar</th>
                                            <th>Tanggal Checkin</th>
                                            <th>Tanggal Checkout</th>
                                            <th>Status</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $order) : ?>
                                            <tr>
                                                <td>
                                                    <?= $order['id_order'] ?>
                                                </td>
                                                <td>
                                                    <?= $order['id_booking'] ?>
                                                </td>
                                                <td>
                                                    <?= $order['nama_customer'] ?>
                                                </td>
                                                <td>
                                                    <?= $order['ket1'] . ' ' . $order['ket2'] ?>
                                                </td>
                                                <td>
                                                    <?= $order['checkin'] ?>
                                                </td>
                                                <td>
                                                    <?= $order['checkout'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($order['sts'] == 'Booking') : ?>
                                                        <span class="badge badge-info badge-pill"> <?= $order['sts'] ?>
                                                            <i class="mdi mdi-book-account-outline"></i>
                                                        </span>
                                                    <?php elseif ($order['sts'] == 'Checkin') : ?>
                                                        <span class="badge badge-success badge-pill"> <?= $order['sts'] ?>
                                                            <i class="mdi mdi-trending-up"></i>
                                                        </span>
                                                    <?php else : ?>
                                                        <span class="badge badge-success badge-pill"> <?= $order['sts'] ?>
                                                            <i class="mdi mdi-trending-down"></i>
                                                        </span>
                                                    <?php endif; ?>
                                                </td>

                                                <td class="d-print-none text-center">
                                                    <?php if ($order['sts'] == 'Checkin') : ?>
                                                        <a href="<?= base_url('order/detail/' . $order['id_order']) ?>" class="btn btn-info btn-sm waves-effect waves-light text-white">
                                                            <i class="mdi mdi-eye fa-lg text-white"></i>
                                                        </a>
                                                    <?php elseif ($order['sts'] == 'Booking') : ?>
                                                        <a href="<?= base_url('order/detail/' . $order['id_order']) ?>" class="btn btn-info btn-sm waves-effect waves-light text-white">
                                                            <i class="mdi mdi-eye text-white"></i>
                                                        </a>
                                                        <a type="button" data-toggle="modal" data-target="#updateCheckin<?= $order['id_order']; ?>" class="btn btn-warning btn-sm waves-effect waves-light text-white">
                                                            <i class="mdi mdi-account-key fa-lg text-white"></i>
                                                        </a>
                                                    <?php else : ?>
                                                        <a href="<?= base_url('order/detail/' . $order['id_order']) ?>" class="btn btn-info btn-sm waves-effect waves-light text-white">
                                                            <i class="mdi mdi-eye fa-lg text-white"></i>
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


<?php foreach ($list as $order) : ?>
    <form action="order/updateCheckin" method="post">
        <div id="updateCheckin<?php echo $order['id_order']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title mt-0 text-white">Apa Kamu Yakin ?</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">Data Booking akan dirubah.</div>
                    <div class="modal-body">
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <input type="hidden" name="id_order" value="<?= $order['id_order'] ?>">
                                <input type="hidden" name="id_kamar" value="<?= $order['id_kamar'] ?>">
                                <input type="hidden" name="checkin" value="<?= $order['checkin'] ?>">
                                <input type="hidden" name="checkout" value="<?= $order['checkout'] ?>">
                                <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                <button href="#" class="btn btn-info"> <i class="mdi mdi-calendar-account"></i>
                                    Reschedule
                                </button>
                                <button href="#" class="btn btn-success" type="submit"> <i class="mdi mdi-door-open"></i>
                                    Checkin
                                </button>
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