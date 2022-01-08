<?= $this->extend('templates/header'); ?>

<?= $this->section('content'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">REAL TIME BILLING </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                     <li class="breadcrumb-item active">Data Billing</li>
                  </ol>
               </div>
 <!-- ini untuk tombol rtb kamar dan fasilitas -->
      <div class="row">
         <div class="col-12">
            <div class="card-box">
               <div class="pb-2 float-right">
                  <a href="/Rtb/index" class="btn btn-primary waves-effect waves-light text-white">
                     <i class="mdi mdi-eye fa-sm text-white"></i> Real Time Billing kamar
                  </a>
                  <a href="/order/addBooking" class="btn btn-primary waves-effect waves-light text-white">
                     <i class="mdi mdi-eye fa-sm text-white"></i> Real Time Billing Fasilitas
                  </a>
               </div>
 <!-- ini untuk waktu dan hari tanggal -->              
               <span class="mt-10"> Time : </span><span class="mt-10" id="time"></span>
               <div class="row">
                  <div class="col-10 ">
                     <span id="day"></span> : <span id="year"></span>
                  </div>
        </div>
    </div>

    <h2>Data Billing</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Id Order</th>
                    <th>Nama Customer</th>
                    <th>Id Kamar</th>
                    <th>QTY</th>
                    <th>Harga</th>
                    <th>Tanggal Checkin</th>
                    <th>Tanggal Checkout</th>
                    <th>Status Kamar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($order as $row) : //panggil variable yang ada di controller
                    ?>
                <tr class="text-center">
                    <td><?= $row->id_order; ?></td>
                    <td><?= $row->nama_customer; ?></td>
                                       <td><?= $row->id_kamar; ?></td>
                                       <td><?= nominal($row->harga); ?></td>
                                       <td><?= $row->checkin; ?></td>
                                       <td><?= $row->checkout; ?></td>
                                       <td><?= $row->status; ?></td>
                    <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailBill<?php echo $row->id_order; ?>">Detail</button>
                    </td>
        
                </tr>

                     <!-- Modal Tambah untuk tombol detail billing -->
               <?php foreach ($order as $row) : ?>
                  <div id="detailBill<?= $row->id_order; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                              <h4 class="modal-title">Detail Real Time Billing</h4>
                              <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                           </div>
                           <div class="modal-body">
                              <div class="card">
                                 <div class="card-horizontal">
                                    <div class="card-body">
                                       <h4 class="card-title"><?= $row->id_order ?></h4>
                                       <h5>Nama Customer : <?= $row->nama_customer ?></h5>
                                       <h5>ID Kamar : <?= $row->id_kamar ?></h5>
                                       <h5>Tanggal Check in : <?= $row->checkin ?></h5>
                                       <h5>Tanggal Check out : <?= $row->checkout ?></h5>
                                       <h5>Harga : <?= nominal($row->harga) ?></h5>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-body">
                              <div class="mb-2 mt-1">
                                 <div class="float-right d-none d-sm-block">
                                    <input type="hidden" name="id_order" value="<?= $row->id_order ?>">
                                    <!-- <a href="<?= base_url('Rtb/detail/' . $row->id_order) ?>" class="btn btn-info waves-effect waves-light text-white"> -->
                                    <a href="#" data-toggle="modal" data-target="#Pay<?php echo $row->id_order; ?>" class="btn btn-info waves-effect waves-light text-white">
                                       <i class="mdi mdi-eye fa-sm text-white"></i>Bayar
                                    </a>
                                    <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Tutup</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endforeach ?>
            </div>
         </div>
      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal -->
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <p>

</main>
</div>
</div>




<?= $this->endSection('content'); ?>