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
                            <li class="breadcrumb-item active">Data Booking</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
    </div> <!-- container-fluid -->


    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <!-- <div class="panel-heading">
                <h4>Invoice</h4>
            </div> -->
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <?php foreach ($order as $data) : ?>
                                    <h3> <strong><?= $data['id_booking']; ?></strong> </h3>
                                <?php endforeach; ?>
                            </div>
                            <div class="float-right">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="float-left mt-3">
                                    <div class="card" style="max-width: 540px; max-height: 160px">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img class="img-fluid" src="<?= base_url('assets/images/customer/user-1.jpg') ?>" width="160" height="160">
                                            </div>
                                            <?php foreach ($order as $data) : ?>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title"> Customer</h5>
                                                        <p class="card-text"><?= $data['nama_customer']; ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right text-center">
                                    <?php foreach ($order as $data) : ?>
                                        <strong>QR CODE CHECKIN</strong><br>
                                        <img class="img-fluid" src="<?= base_url($data['file']) ?>" style="max-width: 180px; max-height: 180px">
                                    <?php endforeach; ?>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table mt-4">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Room</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Waktu Checkin</th>
                                                <th>Waktu Checkout</th>
                                                <th>Kamar</th>
                                                <th>Fasilitas</th>
                                                <th>Jumlah Kamar</th>
                                                <th>Jumlah Dewasa</th>
                                                <th>Jumlah Anak</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($order as $data) : ?>
                                                <tr>
                                                    <?php if ($data['kamar']) : ?>
                                                        <td class="text-center">
                                                            <img src="<?= base_url('assets/images/room/' . $data['room_image']) ?>" class="thumb-img img-fluid" style="max-width: 240px; max-height: 240px">
                                                        </td>
                                                    <?php else : ?>
                                                        <td>-</td>
                                                    <?php endif; ?>
                                                    <td><?= $data['tanggal'] ?></td>
                                                    <td><?= $data['checkin'] ?></td>
                                                    <td><?= $data['checkout'] ?></td>
                                                    <td>
                                                        <?= $data['ket1'] . ' ' . $data['ket2'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['id_fasilitas'] . ' ' . $data['nama_fasilitas'] ?>
                                                    </td>
                                                    <?php if ($data['kamar']) : ?>
                                                        <td><?= $data['kamar'] ?> Kamar</td>
                                                        <td><?= $data['dewasa'] ?> Orang</td>
                                                        <td><?= $data['anak'] ?> Orang</td>
                                                    <?php else : ?>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    <?php endif; ?>
                                                    <td class="text-center">
                                                        <?php if ($data['sts'] == 'Booking') : ?>
                                                            <span class="badge badge-info badge-pill"> <?= $data['sts'] ?>
                                                                <i class="mdi mdi-book-account-outline"></i>
                                                            </span>
                                                        <?php elseif ($data['sts'] == 'Checkin') : ?>
                                                            <span class="badge badge-success badge-pill"> <?= $data['sts'] ?>
                                                                <i class="mdi mdi-trending-up"></i>
                                                            </span>
                                                        <?php else : ?>
                                                            <span class="badge badge-success badge-pill"> <?= $data['sts'] ?>
                                                                <i class="mdi mdi-trending-down"></i>
                                                            </span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-1">
                            <div class="ml-auto mr-3">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Booking</th>
                                                <th>Harga</th>
                                                <th class="text-center">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($order as $data) :
                                                if ($data['kamar']) :
                                                    $total += $data['hrg1'] + $data['hrg2'];
                                                else :
                                                    $total += $data['hrg2'];
                                                endif;
                                            ?>
                                                <?php if ($data['kamar']) : ?>
                                                    <tr>
                                                        <td>
                                                            <?= $data['ket1'] . ' ' . $data['ket2'] ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= nominal($data['harga_kamar'])  ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= nominal($data['hrg1']) ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if ($data['id_fasilitas']) : ?>
                                                    <tr>
                                                        <td>
                                                            <?= $data['id_fasilitas'] . ' ' . $data['nama_fasilitas'] ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= nominal($data['harga_fasilitas'])  ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= nominal($data['hrg2']) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td class="text-right" colspan="2">
                                                            <?= nominal($total) ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-print-none">
                            <div class="float-right">
                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                <a href="<?= base_url('order') ?>" class="btn btn-primary waves-effect waves-light">Kembali</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->



<?= $this->endSection('content'); ?>