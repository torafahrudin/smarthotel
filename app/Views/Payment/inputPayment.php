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
            <?= form_open('Payment/prosesPayment') ?>
            <input type="hidden" id="id_order" name="id_order" value="<?= $id_order ?>">
            <input type="hidden" id="no_kuitansi" name="no_kuitansi" value="<?= $no_kuitansi ?>">
            <input type="hidden" id="nama_customer" name="nama_customer" value="<?= $nama_customer ?>">

            <div class="mb-3">
                <label for="namakosan" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?= $nama_customer ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="kamar" class="form-label">Produk</label>
                <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $id_produk ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="waktu_bayar" class="form-label">Tanggal Bayar</label>
                <input type="text" class="form-control" id="waktu_bayar" name="waktu_bayar" value="<?= $tanggal_sekarang ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="totalbayar" class="form-label">Total Bayar</label>
                <input type="text" class="form-control" id="totalbayar" name="totalbayar" value="<?= $totalbayar ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="total_bayar">Pembayaran</label>
                <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="<?= set_value('total_bayar') ?>" onchange="myFunction()" placeholder="Diisi dengan besar pembayaran">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>