<?= $this->extend('_partials/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row mb-3" id="filter-content">
        <div class="col-md-12 col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Filter Data</h6>
                </div>
                <div class="card-body" id="body-filter">
                    <div class="form-group row">
                        <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="periode" name="periode" placeholder="Ex. 202110">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="akun" class="col-sm-2 col-form-label">Akun</label>
                        <div class="col-sm-10">
                            <select name="akun" id="akun" class="form-control">
                                <option value="">pilih akun</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-secondary" id="btn-close-filter">Tutup</button>
                    <button class="btn btn-secondary" id="btn-open-filter" style="display: none;">Filter</button>
                    <button class="btn btn-primary" id="btn-lihat">Lihat Data</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="data-content" style="display: none;">
        <div class="col-md-12 col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-header py-3 text-center ">
                    <h6>AHADIAT</h6>
                    <h4 class="m-2 font-weight-bold text-primary" id="title">TITLE</h4>
                    <h6 id="periode-title"></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table-data">
                            <thead style="background-color: #38b000; color:#fff; text-align:center;">
                                <tr>
                                    <th style="vertical-align: middle;" rowspan="2" style="width: 10%;">Tanggal</th>
                                    <th style="vertical-align: middle;" rowspan="2" style="width: 15%;">Keterangan</th>
                                    <th style="vertical-align: middle;" rowspan="2" style="width: 10%;">Ref</th>
                                    <th style="vertical-align: middle;" rowspan="2" style="width: 10%;">Debet</th>
                                    <th style="vertical-align: middle;" rowspan="2" style="width: 10%;">Kredit</th>
                                    <th style="vertical-align: middle;" colspan="2" style="width: 20%;">Saldo</th>
                                </tr>

                                <tr>
                                    <th class="text-center">Debet</th>
                                    <th class="text-center">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>


<?= $this->section('custom-js') ?>
<script>
    function format_number(x) {
        return new Intl.NumberFormat('de-DE').format(x)
    }

    function resetForm() {
        $('#tbl_posts_body').empty();
        $('#form-tambah').validate().resetForm();
        $('#form-tambah').trigger("reset");
    }

    // get filter coa
    function get_coa() {
        $.ajax({
            type: 'get',
            url: " <?= site_url('get-coa') ?>",
            dataType: 'json',
            success: function(res) {
                var html = '';
                var data = res.data;
                html += `<option value=''>pilih akun</option>`;
                for (let i = 0; i < data.length; i++) {
                    html += `<option value='${data[i].kode}'>${data[i].kode} -  ${data[i].nama}</option>`;
                }
                $('#akun').html(html);
            }
        });
    }

    get_coa();


    function load_data(periode, akun) {

        $.ajax({
            type: 'GET',
            url: "<?= site_url('report-bb-get') ?>",
            data: {
                periode: periode,
                akun: akun
            },
            dataType: 'json',
            success: function(res) {
                $('#periode-title').html(res.periode);
                $('#title').html(res.title);
                var html = '';
                var result = res.values;
                var data = result.ledger;
                for (let i = 0; i < data.length; i++) {
                    html += `<tr>
                        <td>${data[i].tanggal}</td>
                        <td>${data[i].keterangan}</td>
                        <td>${data[i].no_bukti}</td>
                        <td class='text-right'>${data[i].debet}</td>
                        <td class='text-right'>${data[i].kredit}</td>
                        <td class='text-right'>${data[i].saldo_normal == 'D' ? data[i].saldo : 'Rp 0'}</td>
						<td class='text-right'>${data[i].saldo_normal == 'C' ? data[i].saldo : 'Rp 0'}</td>
                    </tr>`;

                }
                $('#table-data tbody').html(html);

            }
        });
    }
    // load_data()

    $('#btn-close-filter').on('click', function(e) {
        e.preventDefault();
        $('#btn-close-filter').hide();
        $('#btn-open-filter').show();
        $('#btn-lihat').hide();
        $('#body-filter').hide();
    });

    $('#btn-open-filter').on('click', function(e) {
        e.preventDefault();
        $('#btn-close-filter').show();
        $('#btn-open-filter').hide();
        $('#btn-lihat').show();
        $('#body-filter').show();
    });

    $('#btn-lihat').on('click', function(e) {
        e.preventDefault();
        var periode = $('#periode').val();
        var akun = $('#akun').val();
        if (periode == '' || akun == '') {
            swal(
                'Gagal!',
                'Periode dan Akun harus di isi!',
                'error'
            );
        } else {
            load_data(periode, akun);
            $('#btn-close-filter').hide();
            $('#btn-open-filter').show();
            $('#btn-lihat').hide();
            $('#body-filter').hide();
            $('#data-content').show();
        }



    });

    $('#form-tambah').on('click', '#btn-close', function(e) {
        resetForm();
        load_data();
        $('#data-content').show();
        $('#form-tambah').hide();
    });
</script>


<?= $this->endSection() ?>