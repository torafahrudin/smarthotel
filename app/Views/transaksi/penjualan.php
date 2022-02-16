<?= $this->extend('_partials/app') ?>
<?= $this->section('content') ?>
<!-- Start Content-->
<div class="container-fluid">

    <div class="row" id="table-content">
        <div class="col-12">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="header-title"><?= $title ?></h5>
                <!-- <button type="button" id="btn-tambah" class="btn btn-primary btn-tambah"><i class="mdi mdi-plus"></i> Tambah Data</button> -->
            </div>
            <div class="card-box">
                <table id="table-data" class="table table-hover table-data">
                    <thead>
                        <tr style="background-color: #38b000; color:#fff;">
                            <th style="width: 3%;">#</th>
                            <th style="width: 10%;">Kode</th>
                            <th style="width: 10%;">Tanggal</th>
                            <th style="width: 20%;">Keterangan</th>
                            <th style="width: 10%;">Status</th>
                            <th style="width: 10%;">Total</th>
                            <!-- <th class="text-center" style="width: 5%;">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <form action="" id="form-tambah" method="POST" style="display: none;">
        <input type="hidden" name="form_type" id="form_type" class="form_type" value="post">
        <div class="row" id="table-content">
            <div class="col-12">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="header-title"><?= $title ?></h5>
                    <button type="button" class="btn btn-danger waves-effect waves-ligh btn-close"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="card-box">
                    <div class="row mt-4">
                        <div class="col-xl-4 col-lg-4 col-sm-4">
                            <div class="form-group">
                                <label for="">No Bukti</label>
                                <input type="text" name="id_transaksi" class="form-control" value="AUTO" disabled>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-4">
                            <div class="form-group">
                                <label for="tgl_trx">Tanggal</label>
                                <input type="date" max="<?= date('Y-m-d') ?>" name="tgl_trx" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-sm-12">
                            <div class="form-group">
                                <label for="tgl_trx">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>

                    </div>
                    <table id="tbl_posts" class="table table-hover grid-table">
                        <thead>
                            <tr>
                                <th style="width: 3%;">#</th>
                                <th style="width: 10%;">Produk</th>
                                <th style="width: 10%;">Harga Satuan</th>
                                <th style="width: 10%;">qty</th>
                                <th style="width: 10%;">Total</th>
                                <th class="text-center" style="width: 5%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_posts_body" class="contents">

                        </tbody>
                    </table>
                    <a href="#" class="add-record btn btn-light btn-block" data-added="0">+Tambah Baris</a>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
<!-- invisible tag -->
<div class="invisible">
    <table id="sample_table">
        <tr>
            <td class="text-center">
                <span class="sn"></span>
            </td>

            <td>
                <select name="kode_produk[]" class="form-control form-calc inp-kode_produk" id="kode_produk" required>
                    <option value=""></option>

                </select>
            </td>
            <td>
                <input type="text" name="harga_satuan[]" class="form-control unit_price form-calc" readonly required>
            </td>
            <td>
                <input type="number" name="qty[]" value="1" min='1' class="form-control qty form-calc" required>
            </td>
            <td>
                <input type="text" name="total[]" class="form-control jumlah form-line" readonly required>
            </td>
            <td class="text-center">
                <a href="#" class="text-danger  btn-icon delete-record" data-id="0">
                    <i class="mdi mdi-delete"></i>
                </a>
            </td>
        </tr>
    </table>
</div>

<?= $this->endSection() ?>



<?= $this->section('custom-js') ?>
<script>
    function format_number(x) {
        return new Intl.NumberFormat('de-DE').format(x)
    }

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
        "columnDefs": [{
                "searchable": true,
                "orderable": false,
                "targets": 0,
                "className": 'text-center'
            },
            // {
            //     "searchable": false,
            //     "orderable": false,
            //     "targets": 6,
            //     "data": null,
            //     'className': 'text-center',
            //     'defaultContent': action_html,
            // }
        ],
        "ajax": {
            "url": '<?= site_url("get-penjualan") ?>',
            'dataSrc': 'data'
        },
        "columns": [{
                "data": 'no'
            },
            {
                "data": 'no_bill'
            },
            {
                "data": 'tanggal'
            },
            {
                "data": 'keterangan'
            },
            {
                "data": 'status',
                // "className": 'text-center',
                // render: function(data) {
                //     if (data == 'settlement') {
                //         return action_html;
                //     }
                //     return icon_lock;
                // }
            },
            {
                "data": 'total',
                "className": 'text-right',
                render: $.fn.dataTable.render.number('.', ',', 2, '')
            },
        ]
    });

    // event button
    $('#btn-tambah').on('click', function(event) {
        get_produk();
        $('#form-tambah #form_type').val('post');
        $('#table-content').hide();
        $('#form-tambah').show();
    });
    $('#form-tambah').on('click', '.btn-close', function(e) {
        e.preventDefault();
        resetForm();
        load_data();
        $('#table-content').show();
        $('#form-tambah').hide();
    });
    $('#table-data').on('click', '#btn-edit', function(e) {
        e.preventDefault();
        var id = $(this).closest('tr').find('td').eq(1).html();
        editData(id);
    });

    // get filter produk
    function get_produk() {
        $.ajax({
            type: 'get',
            url: " <?= site_url('get-produk') ?>",
            dataType: 'json',
            success: function(res) {
                var html = '';
                console.log(res);
                html += `<option value=''>-</option>`;
                for (let i = 0; i < res.data.length; i++) {
                    html += `<option value='${res.data[i].kode}'>${res.data[i].kode} -  ${res.data[i].nama}</option>`;
                }
                $('#kode_produk').html(html);
            }
        });
    }

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


    // change option at grid table (form tambah)
    $('#tbl_posts').on('change', '.form-calc', function(e) {
        e.preventDefault()

        var parent = $(this).closest("tr");

        var kode_produk = parent.find('.inp-kode_produk').val()

        console.log(kode_produk)

        $.ajax({
            type: 'get',
            url: '<?= site_url('show-produk') ?>',
            data: {
                kode: kode_produk
            },
            dataType: 'JSON',
            success: function(data) {
                console.log(data)

                parent.find('.unit_price').val(format_number(data[0].harga_satuan))
                var qty = parseInt(parent.find('.qty').val())

                var jumlah = data[0].harga_satuan * qty
                parent.find('.jumlah').val(format_number(jumlah))
                // $('#jumlah-' + id).val(format_number(jumlah))

            }
        })
    })


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

<script type="text/javascript">
    jQuery(document).delegate('a.add-record', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#sample_table tr'),
            size = jQuery('#tbl_posts >tbody >tr').length + 1,
            element = null,
            element = content.clone();

        element.attr('id', 'rec-' + size);
        element.find('.delete-record').attr('data-id', size);
        element.appendTo('#tbl_posts_body');
        element.find('.sn').html(size);
        element.find('.select2').select2();
        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });
    });
</script>
<script>
    jQuery(document).delegate('a.delete-record', 'click', function(e) {
        e.preventDefault();
        // var didConfirm = confirm("Apakah Anda yakin untuk menghapus baris ?");
        var id = jQuery(this).attr('data-id');
        var targetDiv = jQuery(this).attr('targetDiv');
        jQuery('#rec-' + id).remove();

        //regnerate index number on table
        $('#tbl_posts_body tr').each(function(index) {
            //alert(index);
            $(this).find('span.sn').html(index + 1);
        });
        return true;
    });
</script>

<?= $this->endSection() ?>