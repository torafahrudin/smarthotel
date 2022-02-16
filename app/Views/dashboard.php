<?= $this->extend('_partials/app') ?>


<?= $this->section('content') ?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <!-- col -->
        <div class="col-xl-4 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Pelanggan </h4>

                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <a href="<?= site_url('master/pelanggan') ?>">
                            <h2 class="text-info font-weight-normal pt-2 mb-1"> 0 </h2>

                        </a>
                        <p class="text-muted mb-1">Sampai Saat Ini</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <!-- col -->
        <div class="col-xl-4 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Penjualan </h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <a href="<?= site_url('laporan/kas') ?>">
                            <h3 class="text-info font-weight-normal pt-2 mb-1"> 0</h3>
                        </a>

                        <p class="text-muted mb-1">Sampai Saat Ini</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <!-- col -->
        <div class="col-xl-4 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Produk</h4>

                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <a href="<?= site_url('akuntansi/laba_rugi') ?>">
                            <h3 class="text-info font-weight-normal pt-2 mb-1">0</h3>

                        </a>
                        <p class="text-muted mb-1">Sampai Saat Ini</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->


        <div class="col-xl-4">
            <div class="card-box">
                <h4 class="header-title mt-0">Penerimaan (On Going)</h4>

                <div class="widget-chart text-center">
                    <div id="morris-donut-example" dir="ltr" style="height: 245px;" class="morris-chart"></div>
                    <ul class="list-inline chart-detail-list mb-0">
                        <li class="list-inline-item">
                            <h5 style="color: #ff8acc;"><i class="fa fa-circle mr-1"></i>Series A</h5>
                        </li>
                        <li class="list-inline-item">
                            <h5 style="color: #5b69bc;"><i class="fa fa-circle mr-1"></i>Series B</h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end col -->



        <div class="col-xl-8">
            <div class="card-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>
                <h4 class="header-title mt-0">Statistics (On Going)</h4>
                <div id="morris-bar-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-12">
            <div class="card-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>
                <h4 class="header-title mt-0">Total Revenue (On Going)</h4>
                <div id="morris-line-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
            </div>
        </div><!-- end col -->

    </div>
    <!-- end row -->


</div>
<!-- container-fluid -->
<?= $this->endSection() ?>