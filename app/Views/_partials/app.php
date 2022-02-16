<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?> | APP-HOTEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico">
    <!-- third party css -->
    <link href="<?= base_url() ?>/assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- dropify -->
    <link href="<?= base_url() ?>/assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive Table css -->
    <link href="<?= site_url() ?>assets/libs/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="<?= base_url() ?>/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>/assets/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/libs/switchery/switchery.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/libs/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>/assets/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />
    <!-- Custom box css -->
    <link href="<?= base_url() ?>/assets/libs/custombox/custombox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet">

    <style>
        .error {
            color: red;
        }

        /* .text-primary {
            color: #008000;
        }

        .btn-primary {
            background-color: #008000;
            border-color: #008000;
        }

        .btn-primary:hover {
            background-color: #38b000;
            border-color: #38b000;
        } */
    </style>

    <?= $this->renderSection('custom-style') ?>
</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <?= $this->include('_partials/navbar') ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?= $this->include('_partials/sidebar') ?>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <div class="content">
                <?= $this->renderSection('content') ?>
            </div>
        </div>

        <!-- Footer Start -->
        <?= $this->include('_partials/footer') ?>
        <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- Vendor js -->
    <script src="<?= base_url() ?>/assets/js/vendor.min.js"></script>

    <!-- knob plugin -->
    <script src="<?= base_url() ?>/assets/libs/jquery-knob/jquery.knob.min.js"></script>


    <!--Morris Chart-->
    <script src="<?= base_url() ?>/assets/libs/morris-js/morris.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/raphael/raphael.min.js"></script>
    <!-- Dashboard init js-->
    <script src="<?= base_url() ?>/assets/js/pages/dashboard.init.js"></script>



    <!-- third party js -->
    <script src="<?= base_url() ?>/assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables/dataTables.select.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/pdfmake/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Plugins Js -->
    <script src="<?= base_url() ?>/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/switchery/switchery.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/multiselect/jquery.multi-select.js"></script>
    <script src="<?= base_url() ?>/assets/libs/jquery-quicksearch/jquery.quicksearch.min.js"></script>

    <script src="<?= base_url() ?>/assets/libs/select2/select2.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/moment/moment.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <!-- dropify js -->
    <script src="<?= base_url() ?>/assets/libs/dropify/dropify.min.js"></script>

    <!-- form-upload init -->
    <script src="<?= base_url() ?>/assets/js/pages/form-fileupload.init.js"></script>

    <!-- Datatables init -->
    <script src="<?= base_url() ?>/assets/js/pages/datatables.init.js"></script>
    <!-- Init js-->
    <script src="<?= base_url() ?>/assets/js/pages/form-advanced.init.js"></script>


    <!-- Responsive Table js -->
    <script src="<?= site_url() ?>assets/libs/rwd-table/rwd-table.min.js"></script>
    <script src="<?= site_url() ?>assets/js/pages/responsive-table.init.js"></script>


    <!-- App js -->
    <script src="<?= base_url() ?>/assets/js/app.min.js"></script>
    <!-- custome js -->
    <script src="<?= base_url() ?>/assets/js/currency.js"></script>
    <!-- Modal-Effect -->
    <script src="<?= base_url() ?>/assets/libs/custombox/custombox.min.js"></script>
    <!-- append script -->
    <!-- auto close -->
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 10000);
        });
    </script>
    <script src="<?= base_url() ?>/assets/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>/assets/custom/currency.js"></script>
    <script src="<?= base_url() ?>/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <?= $this->renderSection('custom-js') ?>


</body>

</html>