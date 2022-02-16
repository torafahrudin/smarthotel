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
                    <h4 class="m-2 font-weight-bold text-primary"><?= $page_title ?></h4>
                    <h6 id="periode-title"></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-data">
                            <thead>
                                <tr style="background-color: #38b000; color:#fff;">
                                    <th style="width: 10%;">Tanggal</th>
                                    <th style="width: 25%;">Akun</th>
                                    <th style="width: 10%;">Ref</th>
                                    <th style="width: 10%;" class='text-right'>Debet</th>
                                    <th style="width: 10%;" class='text-right'>Kredit</th>
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




    function load_data(periode) {

        $.ajax({
            type: 'GET',
            url: "<?= site_url('report-jurnal-get') ?>",
            data: {
                periode: periode
            },
            dataType: 'json',
            success: function(res) {
                $('#periode-title').html('Periode ' + res.first.periode);
                var html = '';
                var data = res.data;
                for (let i = 0; i < data.length; i++) {
                    html += `<tr>
                        <td>${data[i].tanggal}</td>
                        <td>
                            ${data[i].dc == 'c' ? '&nbsp;&nbsp;&nbsp; '+data[i].akun : ''+data[i].akun}
                        </td>
                        <td>${data[i].ref}</td>
                        <td class='text-right'>${format_number(data[i].debet)}</td>
                        <td class='text-right'>${format_number(data[i].kredit)}</td>
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
        if (periode == null || periode === undefined || periode == '') {
            var filter = 'All';
        } else {
            var filter = periode
        }
        load_data(filter);

        $('#btn-close-filter').hide();
        $('#btn-open-filter').show();
        $('#btn-lihat').hide();
        $('#body-filter').hide();
        $('#data-content').show();
    });

    $('#form-tambah').on('click', '#btn-close', function(e) {
        resetForm();
        load_data();
        $('#data-content').show();
        $('#form-tambah').hide();
    });
</script>


<?= $this->endSection() ?>