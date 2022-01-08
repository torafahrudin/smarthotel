<?= $this->extend('templates/header'); ?>
<?= $this->section('content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                            <li class="breadcrumb-item active">Daftar Customer</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $i = 1;
            foreach ($customer as $row) :
                if (fmod($i, 3) == 0) {
            ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['nama_customer'] . " (ID = " . $row['id_customer'] . ")"; ?>
                                    <span class="badge bg-primary rounded-pill"><?= $infoCustomer[$i - 1][1] ?></span>
                                    <span class="badge bg-success rounded-pill"><?= $infoCustomer[$i - 1][2] ?></span>
                                </h5>
                                <p class="card-text"><?= $row['alamat'] . ' (' . $row['no_telp'] . ')'; ?>
                                </p>

                                <a href="<?= base_url('Payment/ListProduk/' . $row['id_customer'] . '/' . $row['nama_customer']) ?>" class="btn btn-primary">Bayar</a>
                            </div>
                        </div>
                    </div>
                    <p>
        </div>
        <div class="row">
        <?php
                } else {
        ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama_customer'] . " (ID = " . $row['id_customer'] . ")"; ?>
                            <span class="badge bg-primary rounded-pill"><?= $infoCustomer[$i - 1][1] ?></span>
                            <span class="badge bg-success rounded-pill"><?= $infoCustomer[$i - 1][2] ?></span>
                        </h5>
                        <p class="card-text"><?= $row['alamat'] . ' (' . $row['no_telp'] . ')'; ?>
                        </p>
                        <a href="<?= base_url('Payment/ListProduk/' . $row['id_customer'] . '/' . $row['nama_customer']) ?>" class="btn btn-primary">Bayar</a>
                    </div>
                </div>
            </div>
    <?php
                }
                $i = $i + 1;
            endforeach;
            //echo count($koskosan);
    ?>
        </div>


        </main>
    </div>
</div>


<?= $this->endSection('content'); ?>