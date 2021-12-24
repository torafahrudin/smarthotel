<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('bahan/save')?>" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="no_akun" class="col-sm-3 col-form-label">Nama Bahan</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Bahan" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Jenis Bahan</label>
                        <div class="col-sm-9">
                            <select class="custom-select" name="jenis">
                                <option value="Bahan baku">Bahan Baku</option>
                                <option value="Bahan Penolong">Bahan Penolong</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-9">
                            <select name="satuan" class="custom-select">
                                <option value="Pcs">Pcs</option>
                                <option value="Gram">Gram</option>
                                <option value="Ml">Ml</option> 
                                <option value="Botol">Botol</option>
                                <option value="Kaleng">Kaleng</option>
                                <option value="Dus">Dus</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label">Harga Bahan</label>
                        <div class="col-sm-9">
                            <input type="number" name="harga" class="form-control" placeholder="Harga Bahan" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label">Stok Bahan</label>
                        <div class="col-sm-9">
                            <input type="number" name="stok" class="form-control" placeholder="Stok Bahan" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>