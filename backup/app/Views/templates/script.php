<!-- Vendor js -->
<script src="<?= base_url(); ?>/assets/js/vendor.min.js"></script>

<!-- Responsive Table js -->
<script src="<?= base_url(); ?>/assets/libs/rwd-table/rwd-table.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/switchery/switchery.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/multiselect/jquery.multi-select.js"></script>
<script src="<?= base_url(); ?>/assets/libs/jquery-quicksearch/jquery.quicksearch.min.js"></script>

<script src="<?= base_url(); ?>/assets/libs/select2/select2.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/moment/moment.js"></script>
<script src="<?= base_url(); ?>/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url(); ?>/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<script src="<?= base_url(); ?>/assets/libs/jquery-knob/jquery.knob.min.js"></script>

<!-- dropify js -->
<script src="<?= base_url(); ?>/assets/libs/dropify/dropify.min.js"></script>
<!--Morris Chart-->
<script src="<?= base_url(); ?>/assets/libs/morris-js/morris.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/raphael/raphael.min.js"></script>

<!-- third party js -->
<script src="<?= base_url(); ?>/assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables/dataTables.keyTable.min.js"></script>
<!-- third party js ends -->



<!-- isotope filter plugin -->
<script src="<?= base_url(); ?>/assets/libs/isotope/isotope.pkgd.min.js"></script>

<!--venobox lightbox-->
<script src="<?= base_url(); ?>/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Gallery Init-->
<script src="<?= base_url(); ?>/assets/js/pages/gallery.init.js"></script>


<!-- Datatables init -->
<script src="<?= base_url(); ?>/assets/js/pages/datatables.init.js"></script>


<!-- Validation js (Parsleyjs) -->
<script src="assets/libs/parsleyjs/parsley.min.js"></script>

<!-- Dashboard init js-->
<script src="<?= base_url(); ?>/assets/js/pages/dashboard.init.js"></script>
<script src="<?= base_url(); ?>/assets/js/pages/form-advanced.init.js"></script>
<!-- form-upload init -->


<script src="<?= base_url(); ?>/assets/js/pages/form-fileupload.init.js"></script>
<!-- App js -->
<script src="<?= base_url(); ?>/assets/js/app.min.js"></script>

<!-- Notif js -->
<script src="<?= base_url(); ?>/assets/toastr/toastr.min.js"></script>

<script>
    $('#table_detail').dataTable({
        "lengthChange": false,
        "searching": false,
        "paging": false,
    });
    $('#eoq').dataTable({
        "pageLength": 10,
        "searching": false,
        "info": false,
    });
    $("input[name='dewasa']").TouchSpin({
        initval: 0
    });
    $("input[name='anak']").TouchSpin({
        initval: 0
    });
    $(function() {
        $('input[name="tanggal_in_out"]').daterangepicker({
            opens: 'left',
            timePicker: true,
            "timePicker24Hour": true,
            locale: {
                format: 'YYYY-MM-DD HH:mm:SS'
            }
        });
    });
    $(function() {
        $(".hide").hide();
    });
    $(".choose_date").datepicker({
        format: 'dd-mm-yyyy ',
        autoclose: true,
        locale: 'id'
    });
    $(".choose_month").datepicker({
        format: "dd-mm-yyyy",
        startView: "months",
        minViewMode: "months",
        autoclose: true,
    });
    $(".eoqMonth").datepicker({
        format: "yyyy-mm-dd",
        startView: "months",
        minViewMode: "months",
        autoclose: true,
        orientation: 'bottom'
    });
    $(document).ready(function() {
        $('#report').DataTable();
    });
    $(document).ready(function() {
        $('#users').DataTable({
            order: [
                [3, 'asc']
            ]
        });
    });
</script>

<script type="text/javascript">
    
</script>