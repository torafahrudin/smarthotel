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
                            <li class="breadcrumb-item"><a href="javascript: void(1);">List Produk</li>
                            <li class="breadcrumb-item active">Pembayaran</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $attributes = ['id' => 'payment-form'];
            ?>
            <?= form_open('Midtrans/finishingPaymentGateway', $attributes) ?>
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
            <input type="hidden" name="id_order" id="id_order" value="<?= $id_order ?>">
            <input type="hidden" name="id_customer" id="id_customer" value="<?= $id_customer ?>">
            <input type="hidden" name="total_bayar" id="total_bayar" value="<?= $total_bayar ?>">

            <button id="pay-button" class="btn btn-primary">Bayar</button>
            </form>
        </div>


        </main>
    </div>
</div>

<!-- Tambahan Script Payment Gateway -->
<?php

?>
<!-- Akhir Tambahan Script Payment Gateway -->

<!-- Bootstrap JS -->
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="<?= base_url('dashboard/dashboard.js') ?>"></script>

<script>
    $(document).ready(function() {
        // Format mata uang.
        $('#total_bayar').mask('0,000,000,000,000,000', {
            reverse: true
        });

    })
</script>

<!-- Javascript Payment Gateway -->
<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<?php
// jika sdh diset
//if(isset($snapToken)){
?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<<APP_CLIENT_KEY_ANDA>>"></script>
<script type="text/javascript">
    $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        var id_order = "<?= $id_order ?>";
        var total_bayar = "<?= $total_bayar ?>";

        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>/pembayaran/buatToken/' + id_order + '/' + total_bayar,
            data: {
                id_order: id_order,
                total_bayar: total_bayar
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>
<?php
//}
?>

<!-- Akhir Javascript Payment Gateway-->

</body>

</html>