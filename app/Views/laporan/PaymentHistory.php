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
                            <li class="breadcrumb-item active">Data Pembayaran</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

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
                    foreach ($history as $row) :
                    ?>
                        <tr>
                            <td><?= $row->id_pay; ?></td>
                            <td><?= $row->id_produk ?></td>
                            <td><?= $row->waktu_bayar ?></td>
                            <td><?= nominal($row->total_bayar) ?></td>
                            <td><?= $row->no_kuitansi ?></td>
                            <td>
                                <a href="<?= base_url('Kuitansi/cetak' . $row->id_pay) ?>" class="btn btn-success" target="_blank">
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

<?= $this->endSection('content'); ?>