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
                            <li class="breadcrumb-item active">Data Detail Fasilitas</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="pl-2">
                    <a href="/fasilitas/add" class="btn btn-primary waves-effect waves-light text-white">
                        <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                    </a>
                </div>
            </div>
        </div> -->

    </div> <!-- container-fluid -->

</div> <!-- content -->

<?= $this->endSection('content'); ?>