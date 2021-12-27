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
                            <li class="breadcrumb-item active">Data Booking</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <div class="card" style="max-width: 540px; max-height: 160px">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="img-fluid" src="/assets/images/customer/user-1.jpg" width="160" height="160">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"> Customer</h5>
                                <p class="card-text"></p>
                                <p class="card-text"><small class="text-muted">
                                    </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->

</div> <!-- content -->



<?= $this->endSection('content'); ?>