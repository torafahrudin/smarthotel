<?= $this->extend('_partials/app') ?>
<?= $this->section('content') ?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row mb-3 mt-3">
        <div class="col-12">
            <button type="button" id="btn-tambah" class="btn btn-primary btn-tambah"><i class="mdi mdi-plus"></i> Tambah Data</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <table id="table-data" class="table table-hover table-data">
                    <thead>
                        <tr style="background-color: #38b000; color:#fff;">
                            <th width="3%">#</th>
                            <th width="10%">Kode</th>
                            <th width="20%">Nama</th>
                            <th width="5%">DC</th>
                            <th width="10%">Posted</th>
                            <th width="25%">Header</th>
                            <th width="5%">Aksi</th>
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

<!-- Modal -->

<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="ModalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTambahLabel">Modal title</h5>
                <button type="button" class="btn-close close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="form-tambah">
                <input type="hidden" name="form_type" id="form_type" class="form_type" value="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-control inp-kode" value="[AUTO]" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control inp-nama">
                    </div>
                    <div class="form-group mt-2">
                        <label for="dc">DC</label>
                        <select name="dc" id="dc" class="form-control">
                            <option value="D">DEBET</option>
                            <option value="C">KREDIT</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="posted">Posted</label>
                        <select name="posted" id="posted" class="form-control">
                            <option value="NERACA">NERACA</option>
                            <option value="LABA RUGI">LABA RUGI</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="sub_id">Header</label>
                        <select name="sub_id" id="sub_id" class="form-control">

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
    var action_html = '<a href="#" id="btn-edit" class="text-warning"><i class="mdi mdi-pencil"></i></a> <a href="#" id="btn-delete" class="text-danger ml-3"><i class="mdi mdi-delete"></i></a>';
    var icon_lock = '<span class="text-danger"><i class="mdi mdi-database-lock"></i></span>';
    var datatables = $('#table-data').dataTable({
        "columnDefs": [{
                "searchable": true,
                "orderable": false,
                "targets": 0,
                "className": 'text-center'
            },

        ],
        "ajax": {
            "url": '<?= site_url("get-coa") ?>',
            'dataSrc': 'data'
        },
        "columns": [{
                "data": 'no'
            },
            {
                "data": 'kode'
            },
            {
                "data": 'nama'
            },
            {
                "data": 'dc'
            },
            {
                "data": 'posted'
            },
            {
                "data": 'kategori'
            },
            {
                'data': 'lock',
                render: function(data) {
                    if (data == '0') {
                        return action_html;
                    }
                    return icon_lock;
                }
            }
        ]
    });

    // event button
    $('#btn-tambah').on('click', function(event) {
        $('#ModalTambah .modal-title').html('Tambah Data Chart of Account');
        get_subcoa();
        $('#form-tambah #form_type').val('post');
        $('#ModalTambah #sub_id').attr('disabled', false);
        $('#ModalTambah').modal('show');
    });
    $('#ModalTambah').on('click', '.btn-close', function(e) {
        e.preventDefault();
        resetForm();
        $('#ModalTambah').modal('hide');
    });


    // get filter sub coa
    function get_subcoa() {
        $.ajax({
            type: 'get',
            url: " <?= site_url('get-subcoa') ?>",
            dataType: 'json',
            success: function(res) {
                var html = '';
                for (let i = 0; i < res.length; i++) {
                    html += `<option value='${res[i].kode}'>${res[i].kode} -  ${res[i].nama}</option>`;
                }
                $('#form-tambah #sub_id').html(html);
            }
        });
    }
    // show form edit data
    $('#table-data').on('click', '#btn-edit', function(e) {
        get_subcoa();
        var id = $(this).closest('tr').find('td').eq(1).html();
        $.ajax({
            type: 'GET',
            url: "<?= site_url('show-coa') ?>",
            data: {
                kode: id
            },
            dataType: 'json',
            success: function(res) {
                $('#ModalTambah .modal-title').html('Edit Data Chart of Account');
                $('#ModalTambah').modal('show');
                $('#form-tambah #form_type').val('edit');
                $('#ModalTambah #kode').val(res[0].kode);
                $('#ModalTambah #nama').val(res[0].nama);
                $('#ModalTambah #dc').val(res[0].dc);
                $('#ModalTambah #posted').val(res[0].posted);
                $('#ModalTambah #sub_id').val(res[0].sub_id);
                $('#ModalTambah #sub_id').attr('disabled', true);
            }
        });
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
                    url: "<?= site_url('delete-coa') ?>",
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
                var url = "<?= base_url('update-coa') ?>"
            } else {
                var url = "<?= base_url('add-coa') ?>";
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