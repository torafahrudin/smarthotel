<?= $this->extend('_partials/app') ?>
<?= $this->section('content') ?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row mb-3 mt-3">
        <div class="col-12">
            <h3></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="header-title">Data Set</h5>
                <!-- <button type="button" id="btn-tambah" class="btn btn-primary btn-tambah"><i class="mdi mdi-plus"></i> Tambah Data</button> -->
            </div>
            <div class="card-box">
                <table id="table-data" class="table table-hover table-data">
                    <thead>
                        <tr style="background-color: #38b000; color:#fff;">
                            <th>Kode Porduk</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-12">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="header-title">Hasil Clustering</h5>
                <!-- <button type="button" id="btn-tambah" class="btn btn-primary btn-tambah">Simpan Hasil</button> -->
            </div>
            <div class="card-box">
                <table id="table-result" class="table table-hover table-result">
                    <thead>
                        <tr style="background-color: #38b000; color:#fff;">
                            <th>Kode Produk</th>
                            <th>Dx</th>
                            <th>Dy</th>
                            <th>Cluster</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>



<?= $this->section('custom-js') ?>
<script>
    function resetForm() {
        // $('#jurnal-grid tbody').empty();
        // $('#dok-grid tbody').empty();
        $('#form-tambah').validate().resetForm();
        $('#form-tambah').trigger("reset");
    }

    function load_data() {
        $('#table-data').DataTable().ajax.reload();
    }
    // var action_html = '<a href="#" id="btn-edit" class="text-warning"><i class="mdi mdi-pencil"></i></a> <a href="#" id="btn-delete" class="text-danger ml-3"><i class="mdi mdi-delete"></i></a>'
    var datatables = $('#table-data').dataTable({
        "ajax": {
            "url": '<?= site_url("analisis-cluster-get") ?>',
            'dataSrc': 'data'
        },
        "columns": [{
                "data": 'product_id'
            },
            {
                "data": 'qty',
                "className": 'text-center',
                render: $.fn.dataTable.render.number('.', ',', 0, '')
            },
            {
                "data": 'subtotal',
                "className": 'text-right',
                render: $.fn.dataTable.render.number('.', ',', 2, '')
            },
            // {
            //     "data": 'harga_satuan',
            //     "className": 'text-right',
            //     render: $.fn.dataTable.render.number('.', ',', 2, '')
            // },
        ]
    });

    var datatables2 = $('#table-result').dataTable({
        "ajax": {
            "url": '<?= site_url("analisis-cluster-get") ?>',
            'dataSrc': 'results'
        },
        "columns": [{
                "data": 'product_id'
            },
            {
                "data": 'dx',
                "className": 'text-center',
                render: $.fn.dataTable.render.number('.', ',', 0, '')
            },
            {
                "data": 'dy',
                "className": 'text-right',
                render: $.fn.dataTable.render.number('.', ',', 2, '')
            },
            {
                "data": 'cluster'
            },
            // {
            //     "data": 'harga_satuan',
            //     "className": 'text-right',
            //     render: $.fn.dataTable.render.number('.', ',', 2, '')
            // },
        ]
    });

    function get_result() {
        $.ajax({
            type: 'get',
            url: '<?= site_url('analisis-cluster-get') ?>',
            dataType: 'json',
            async: false,
            success: function(res) {
                console.log(res);
            }
        });
    }
    get_result()

    // event button
    $('#btn-tambah').on('click', function(event) {
        $('#ModalTambah .modal-title').html('Tambah Data Produk');
        $('#form-tambah #form_type').val('post');
        $('#ModalTambah').modal('show');
    });
    $('#ModalTambah').on('click', '.btn-close', function(e) {
        e.preventDefault();
        resetForm();
        $('#ModalTambah').modal('hide');
    });
    $('#table-data').on('click', '#btn-edit', function(e) {
        e.preventDefault();
        var id = $(this).closest('tr').find('td').eq(1).html();
        editData(id);
    });

    // delete data
    $('#table-data').on('click', '#btn-delete', function(e) {
        var id = $(this).closest('tr').find('td').eq(1).html();
        swal({
            title: 'Anda Yakin?',
            text: "Data dengan Kode " + id + " akan dihapus secara permanen!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            padding: '2em'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: 'get',
                    url: "<?= site_url('delete-produk') ?>",
                    data: {
                        kode: id
                    },
                    dataType: 'JSON',
                    success: function(res) {
                        load_data();
                        swal(
                            'Berhasil!',
                            res.message,
                            'success'
                        );
                    }
                });
            }
        });
    });


    function editData(id) {
        $.ajax({
            type: 'GET',
            url: "<?= site_url('show-produk') ?>",
            data: {
                kode: id
            },
            dataType: 'json',
            success: function(res) {
                $('#ModalTambah .modal-title').html('Edit Data Produk');
                $('#ModalTambah').modal('show');
                $('#form-tambah #form_type').val('edit');
                $('#ModalTambah #kode').val(res[0].kode);
                $('#ModalTambah #nama').val(res[0].nama);
                $('#ModalTambah #harga_satuan').val(res[0].harga_satuan);

            }
        });
    }

    // simpan data / update data
    $('#form-tambah').validate({
        rules: {
            nama: {
                required: true
            },

            harga_satuan: {
                required: true
            },
        },
        messages: {
            nama: {
                required: "Wajib di isi!"
            },
            harga_satuan: {
                required: "Wajib di isi!"
            },
        },
        submitHandler: function(form, event) {
            event.preventDefault();

            var type = $("#form-tambah").find('.form_type').val();
            if (type == 'edit') {
                var url = "<?= base_url('update-produk') ?>"
            } else {
                var url = "<?= base_url('add-produk') ?>";
            }
            // for (var pair of formData.entries()) {
            //     console.log(pair[0] + ', ' + pair[1]);
            // }
            var formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                dataType: 'json',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    resetForm();
                    $('#form-tambah #form_type').val('post');
                    $("#ModalTambah").modal('hide');
                    // $('#table-data').ajax.reload();
                    $('#table-data').DataTable().ajax.reload();
                    swal(
                        'Berhasil!',
                        res.message,
                        'success'
                    );
                },
                error: function(err) {

                }

            })
        }
    });
</script>

<?= $this->endSection() ?>