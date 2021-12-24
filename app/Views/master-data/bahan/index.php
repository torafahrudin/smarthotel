<?= $this->extend('index'); ?>
<?= $this->section('content'); ?>

<?php
    function number($angka)
    {
        $hasil_number = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_number;
    } 
?>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary align-self-center">List Bahan</h6>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create">
                <i class="fa fa-plus"></i>
                Tambah Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Bahan</th>
                            <th>Nama Bahan</th>
                            <th>Jumlah Bahan</th>
                            <th>Satuan Bahan</th>
                            <th>Jenis Bahan</th>
                            <th>Harga Satuan Bahan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no =1;
                        foreach ($bahan as $item) : ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $item['kode_bahan']?></td>
                            <td><?= $item['nama_bahan']?></td>
                            <td><?= $item['stok']?></td>
                            <td><?= $item['jenis_bahan']?></td>
                            <td><?= $item['satuan']?></td>
                            <td class="text-right"><?= number($item['harga_bahan'])?></td>
                            <td class="text-right"><?= number($item['harga_bahan'] * $item['stok']) ?></td>
                            <td>
                                <div class="dropdown show text-center">
                                    <a class="btn btn-light btn-sm" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item btn_edit" data-toggle="modal" data-target="#edit" data-id="<?= $item['id_bahan'] ?>" data-nama="<?= $item['nama_bahan'] ?>" data-stok="<?= $item['stok'] ?>" data-jenis="<?= $item['jenis_bahan'] ?>" data-satuan="<?= $item['satuan'] ?>" data-harga="<?= $item['harga_bahan'] ?>" href="#edit"><i class="fa fa-edit mr-2"></i> Edit</a>
                                        <a class="dropdown-item btn_delete" data-toggle="modal" data-target="#delete" data-id="<?= $item['id_bahan'] ?>" href="#delete"><i class="fa fa-trash mr-2"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->include('master-data/bahan/create') ?>
<?= $this->include('master-data/bahan/edit') ?>
<?= $this->include('master-data/bahan/delete') ?>

<?= $this->endSection(); ?>

<?= $this->section('script')?>
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    $(document).on("click", ".btn_edit", function () {
        var id      = $(this).data('id');
        var nama    = $(this).data('nama');
        var jenis   = $(this).data('jenis');
        var satuan  = $(this).data('satuan');
        var harga   = $(this).data('harga');
        var stok    = $(this).data('stok');
        
        $(".modal-body #id").val(id);
        $(".modal-body #nama").val(nama);
        $(".modal-body #jenis").val(jenis);
        $(".modal-body #satuan").val(satuan);
        $(".modal-body #harga").val(harga);
        $(".modal-body #stok").val(stok);
        
    });

    $(document).on("click", ".btn_delete", function () {
        var id          = $(this).data('id');

        $(".modal-body #id").val(id);
    });
</script>
<?= $this->endSection(); ?>