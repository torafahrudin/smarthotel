  <?= $this->extend('_partials/app') ?>
<?= $this->section('content') ?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <table id="table-data" class="table table-hover table-data">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>X</th>
                            <th>Y</th>
                            <th>Aksi</th>
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
                        <label for="kode">ID</label>
                        <input type="text" name="kode" id="kode" class="form-control inp-kode" value="[AUTO]" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control inp-nama">
                    </div>
                    <div class="form-group">
                        <label for="nilai_x">Nilai X</label>
                        <input type="text" name="nilai_x" id="nilai_x" class="form-control inp-nilai_x">
                    </div>
                    <div class="form-group">
                        <label for="nilai_y">Nilai Y</label>
                        <input type="text" name="nilai_y" id="nilai_y" class="form-control inp-nilai_y">
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
    var action_html = '<a href="#" id="btn-edit" class="text-warning"><i class="mdi mdi-pencil"></i></a> '
    var datatables = $('#table-data').dataTable({
        "columnDefs": [{
                "searchable": true,
                "orderable": false,
                "targets": 0,
                "className": 'text-center'
            },
            {
                "searchable": false,
                "orderable": false,
                "targets": 5,
                "data": null,
                'className': 'text-center',
                'defaultContent': action_html,
            }
        ],
        "ajax": {
            "url": '<?= site_url("get-centro") ?>',
            'dataSrc': 'data'
        },
        "columns": [{
                "data": 'no'
            },
            {
                "data": 'id'
            },
            {
                "data": 'nama'
            },
            {
                "data": 'x'
            },
            {
                "data": 'y'
            },

        ]
    });

    // event button

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

    function editData(id) {
        $.ajax({
            type: 'GET',
            url: "<?= site_url('show-centro') ?>",
            data: {
                kode: id
            },
            dataType: 'json',
            success: function(res) {
                $('#ModalTambah .modal-title').html('Edit Centroid Awal ');
                $('#ModalTambah').modal('show');
                $('#form-tambah #form_type').val('edit');
                $('#ModalTambah #kode').val(res[0].id_ref);
                $('#ModalTambah #nama').val(res[0].nama);
                $('#ModalTambah #nilai_x').val(res[0].x);
                $('#ModalTambah #nilai_y').val(res[0].y);

            }
        });
    }

    // simpan data / update data
    $('#form-tambah').validate({
        rules: {
            nama: {
                required: true
            },


            nilai_x: {
                required: true,
                digits: true
            },
            nilai_y: {
                required: true,
                digits: true
            }
        },
        messages: {
            nama: {
                required: "Wajib di isi!"
            },
            nilai_x: {
                required: "Wajib di isi!",
                digits: "Hanya Angka!",
            },
            nilai_y: {
                required: "Wajib di isi!",
                digits: "Hanya Angka!",
            },
        },
        submitHandler: function(form, event) {
            event.preventDefault();

            var type = $("#form-tambah").find('.form_type').val();
            if (type == 'edit') {
                var url = "<?= base_url('update-centro') ?>"
            } else {
                var url = "<?= base_url('add-centro') ?>";
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