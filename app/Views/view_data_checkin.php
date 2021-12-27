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
                    <!-- <div class="pb-2">
                        <a href="/order/addCheckin" class="btn btn-primary waves-effect waves-light text-white">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Order
                        </a>
                    </div> -->
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID Order</th>
                                            <th>Nama Customer</th>
                                            <th>Kamar</th>
                                            <th>Tanggal Checkin</th>
                                            <th>Tanggal Checkout</th>
                                            <th>Status</th>
                                            <!-- <th class="text-center"><i class="fas fa-cog"></i></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $order) : ?>
                                            <tr>
                                                <td>
                                                    <?= $order['id_order'] ?>
                                                </td>
                                                <td>
                                                    <?= $order['nama_customer'] ?>
                                                </td>
                                                <td>
                                                    <?= $order['ket1'] . '' . $order['ket2'] ?>
                                                </td>
                                                <td>
                                                    <?= $order['checkin'] ?>
                                                </td>
                                                <td>
                                                    <?= $order['checkout'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-success badge-pill"> <?= $order['sts'] ?>
                                                        <i class="mdi mdi-trending-up"></i>
                                                    </span>
                                                </td>

                                                <!-- <td class="d-print-none text-center">
                                                    <a type="button" data-toggle="modal" data-target="#edit<?php echo $order['id_order']; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                    <a type="button" data-toggle="modal" data-target="#delete<?php echo $order['id_order']; ?>">
                                                        <i class="mdi mdi-trash-can fa-lg text-danger"></i>
                                                    </a>
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



<?= $this->endSection('content'); ?>