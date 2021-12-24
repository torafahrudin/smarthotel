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
                            <li class="breadcrumb-item active">Data Kehadiran</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="container mt-3">
		<?php
		if(session()->getFlashData('message')){
		?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
	        <?= session()->getFlashData('message') ?>
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
		<?php
		}
		?>
		<form method="post" action="<?= base_url('kehadiran/simpanExcel') ?>" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">File Excel</label>
				<input type="file" name="fileexcel" class="form form-control" data-height="75" id="file" required accept=".xls, .xlsx">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
		</form>
	</div>

         <!-- end row -->

        


                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr class="bg-dark-light">
                                            <th>No ID</th>
                                            <th class="text-center">Nama Pegawai</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Jam Masuk</th>
                                            <th class="text-center">Jam Pulang</th>
                                            <th class="text-center">Scan Masuk</th>
                                            <th class="text-center">Scan Pulang</th>
                                            <th class="text-center">Terlambat</th>
                                            <th class="text-center">Pulang Cepat</th>
                                            <th class="text-center">Absent</th>
                                            
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kehadiran as $hadir) : ?>
                                            <tr>
                                                <td>
                                                    <?= $hadir['no_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $hadir['nama'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $hadir['tgl'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $hadir['jam_masuk'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $hadir['jam_pulang'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $hadir['scan_masuk'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $hadir['scan_pulang'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $hadir['terlambat'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $hadir['pulang_cepat'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $hadir['absent'] ?>
                                                </td>
                                                
                                                
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- container-fluid -->


<?= $this->endSection('content'); ?>