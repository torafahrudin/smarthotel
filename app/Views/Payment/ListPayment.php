<?= $this->extend('templates/header'); ?>
<?= $this->section('content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
\Midtrans\Config::$serverKey = "SB-Mid-server-cr7cVAFJmodIvffS8nKHLxql";
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;
\Midtrans\Config::$isProduction = false;

$total = 0;
foreach ($order as $row) :
    $item_details[] = array(
        'id' => $row->id_produk,
        'price' => $row->harga,
        'quantity' => 1,
        'name' => $row->id_produk
    );
    $total = $total + $row->harga;
endforeach;

$transaction_details = array(
    'order_id' => 'BYR-' . rand(),
    'gross_amount' => $total,
);

$enable_payments = array('credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel');

$transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'item_details' => $item_details,
);

$snapToken = \Midtrans\Snap::getSnapToken($transaction);
// echo "snapToken = " . $snapToken;

?>

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
                            <li class="breadcrumb-item active">List Pembayaran</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <?php
        $total_bayar = 0;
        foreach ($order as $row) :
            $total_bayar = $total_bayar + $row->harga;
        endforeach;
        ?>

        <p>
        <div class="row">

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Informasi
                    </div>
                    <div class="card-body">
                        <p class="card-text ">
                            Total Bayar = <?= nominal($total_bayar) ?><br>
                        </p>

                        <a href="<?= base_url('Payment/prosespayment/') ?>" class="btn btn-warning" id="tmbh">Tambah Data Bayar</a>
                        <button id="pay-button" class="btn btn-info">Bayar Via Payment Gateway</button>
                    </div>
                </div>
            </div>
        </div>
        <p>
        <div class="table-responsive">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#Id</th>
                        <th>Layanan</th>
                        <th>Tgl Bayar</th>
                        <th>Pembayaran</th>
                        <th>No Kuitansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pay as $row) :
                    ?>
                        <tr>
                            <td><?= $row->id_pay; ?></td>
                            <td><?= $row->id_produk ?></td>
                            <td><?= $row->waktu_bayar ?></td>
                            <td><?= nominal($row->total_bayar) ?></td>
                            <td><?= $row->no_kuitansi ?></td>
                            <td>
                                <a href="<?= base_url('kuitansi/' . $row->id_pay) ?>" class="btn btn-success" target="_blank">
                                    <span data-feather="printer"></span> Cetak
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        </main>
    </div>
</div>


<!-- Modals -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>



<script>
    function deleteConfirm(url) {
        url2 = "<?= base_url('penghuni/listpenghuni') ?>"; //diisi dengan halaman ini

        var tomboldelete = document.getElementById('btn-delete')
        tomboldelete.setAttribute("href", url); //akan meload kontroller delete

        var tomboldelete = document.getElementById('btn-batal')
        tomboldelete.setAttribute("href", url2); //akan meload halaman ini

        var tombolbatal = document.getElementById('btn-tutup')
        tombolbatal.setAttribute("href", url2); //akan meload halaman ini

        var pesan = "Data dengan ID <b>"
        var pesan2 = " </b>akan dihapus"
        var n = url.lastIndexOf("/")
        var res = url.substring(n + 1);
        document.getElementById("xid").innerHTML = pesan.concat(res, pesan2);

        var myModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
            keyboard: false
        });

        myModal.show();

    }
</script>
<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                <a id="btn-tutup" class="btn btn-secondary" href="#">X</a>
            </div>
            <div class="modal-body" id="xid"></div>
            <div class="modal-footer">
                <a id="btn-batal" class="btn btn-secondary" href="#">Batalkan</a>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Modals -->


<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="<?= base_url('dashboard/dashboard.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<div class="main-sec"></div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-50EpSqHIShXqBzk3"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('<?php echo $snapToken ?>', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>

<?= $this->endSection('content'); ?>