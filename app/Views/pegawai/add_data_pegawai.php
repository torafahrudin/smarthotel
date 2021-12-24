<?= $this->extend('templates/header'); ?>

<?= $this->section('content'); ?>

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
                            <li class="breadcrumb-item "><a href="/pegawai">Data Pegawai</a></li>
                            <li class="breadcrumb-item active">Tambah Data Pegawai</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-title bg-primary text-white">
                        Input Data Pegawai
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('pegawai/addPegawai') ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">ID Pegawai</label>
                                        <input type="text" class="form-control " name="id_pegawai" value="<?= $id_pegawai; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">NIP</label>
                                        <input type="text" class="form-control" name="nip" placeholder="NIP" autocomplete="off">
                                        <?php if (isset($validation)) : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('nip') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Nama Pegawai</label>
                                        <input type="text" class="form-control" name="nama_pegawai" placeholder="Nama Pegawai" autocomplete="off">
                                        <?php if (isset($validation)) : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('nama_pegawai') ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <select name="id_jabatan" class="form-control select2">
                                            <option value="" disabled selected>- - - Pilih Jabatan - - -</option>
                                            <?php
                                            foreach ($jabatan as $list) {
                                            ?>
                                                <option value="<?= $list['id_jabatan'] ?>"><?= $list['id_jabatan'] . " - " . $list['nama_jabatan']   ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php if (isset($validation)) : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('id_jabatan') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">PTKP</label>
                                        <select name="id_ptkp" class="form-control select2">
                                            <option value="" disabled selected>- - - Pilih PTKP - - -</option>
                                            <?php
                                            foreach ($ptkp as $list) {
                                            ?>
                                                <option value="<?= $list['id_ptkp'] ?>"><?= $list['id_ptkp'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php if (isset($validation)) : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('id_ptkp') ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">No Telp</label>
                                        <input type="text" class="form-control" name="no_telp" placeholder="No Telp" autocomplete="off">
                                        <?php if (isset($validation)) : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('no_telp') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off">
                                        <?php if (isset($validation)) : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('email') ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Nama Bank</label>
                                        <input type="text" class="form-control" name="nama_bank" placeholder="Nama Bank" autocomplete="off">
                                        <?php if (isset($validation)) : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('nama_bank') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Rekening Bank</label>
                                        <input type="rekening_bank" class="form-control" name="rekening_bank" placeholder="Rekening Bank" autocomplete="off">
                                        <?php if (isset($validation)) : ?>
                                            <span class="badge badge-danger"> <?= $validation->getError('rekening_bank') ?></span>
                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat" autocomplete="off" rows="5" id="example-textarea"></textarea>
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('alamat') ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-2 mt-1">
                                    <div class="float-left d-none d-sm-block">
                                        <a href="/pegawai" class="btn btn-secondary"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
                                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->



<?= $this->endSection('content'); ?>