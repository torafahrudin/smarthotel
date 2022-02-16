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
                <div class="card-body" id="table-data">

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



    // load result report into table
    function load_data(filter) {
        $.ajax({
            type: 'GET',
            url: "<?= site_url('report-sales-get') ?>",
            data: {
                periode: filter
            },
            dataType: 'json',
            success: function(res) {
                $('#periode-title').html('Periode ' + res.first.periode);
                var html = '';
                var data = res.values;
                for (let i = 0; i < data.length; i++) {
                    html += `<table>
                        <tr>
                            <td style="width:10%">No Bukti</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%">${data[i].kode_penjualan}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Tanggal</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%">${data[i].tanggal}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Periode</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%">${data[i].periode}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Keterangan</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%">${data[i].keterangan}</td>
                        </tr>
                    </table>`;

                    html += `<table class="table table-bordered mt-2 mb-4">
                        <thead style="background-color: #38b000; color:#fff;">
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th class="text-center">Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr></thead><tbody>`;
                    var detail = data[i].detail;
                    var no = 1;
                    for (let y = 0; y < detail.length; y++) {
                        html += `<tr>
                            <td>${no}</td>
                            <td>${detail[y].nama_produk}</td>
                            <td class="text-center">${detail[y].qty}</td>
                            <td class="text-right">${format_number(detail[y].harga_unit)}</td>
                            <td class="text-right">${format_number(detail[y].total)}</td>
                        </tr>`;
                        no++;
                    }
                    html += `</tbody></table>`;

                    html += `<div class='col-md-12 col-xm-12 col-sm-12 mb-2' style="background-color:#ced4da ">&nbsp;&nbsp;</div>`;


                }
                $('#table-data').html(html);

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

    // event ketika klik lihat di filter section
    $('#btn-lihat').on('click', function(e) {
        e.preventDefault();
        var periode = $('#periode').val();
        // cek periode apa kosong apa nggak ?
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