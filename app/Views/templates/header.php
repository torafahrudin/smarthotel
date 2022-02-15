<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | HOTEL-AHADIAT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/main-logo.png">

    <!-- form css -->
    <link href="<?= base_url(); ?>/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/libs/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <!-- form css end-->

    <!-- Responsive Table css -->
    <link href="<?= base_url(); ?>/assets/libs/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />

    <!-- third party css -->
    <link href="<?= base_url(); ?>/assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- Bootstrap Css -->
    <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url(); ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url(); ?>/assets/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

    <link href="<?= base_url(); ?>/assets/toastr/toastr.min.css" rel="stylesheet">
    <style>
        .card-horizontal {
            display: flex;
            flex: 1 1 auto;
        }
    </style>


</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?= $this->include('templates/topbar'); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?= $this->include('templates/menu'); ?>

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <?= $this->renderSection('content'); ?>

            <!-- Footer Start -->
            <?= $this->include('templates/footer'); ?>

            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <?= $this->include('templates/rightbar'); ?>

    <!-- /Right-bar -->

    <?= $this->include('templates/script'); ?>



</body>

</html>