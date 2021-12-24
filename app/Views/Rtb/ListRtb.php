<?= $this->extend('templates/header'); ?>

<?= $this->section('content');


\Midtrans\Config::$serverKey = "SB-Mid-server-cr7cVAFJmodIvffS8nKHLxql";
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;
\Midtrans\Config::$isProduction = false;

$transaction_details = array(
   'order_id' => 'BYR-' . rand(),
   'gross_amount' => 90000,
);

$item1_details = array(
   'id' => 'a1',
   'price' => 45000,
   'quantity' => 3,
   'name' => "Apple"
);

$item2_details = array(
   'id' => 'a2',
   'price' => 50000,
   'quantity' => 2,
   'name' => "Orange"
);

$item_details = array($item1_details, $item2_details);

$enable_payments = array('credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel');
$transaction = array(
   'enabled_payments' => $enable_payments,
   'transaction_details' => $transaction_details,
   'item_details' => $item_details,
);
$snapToken = \Midtrans\Snap::getSnapToken($transaction);
// echo "snapToken = " . $snapToken;
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                     <li class="breadcrumb-item active">Data Real Time Billing</li>
                  </ol>
               </div>

            </div>
         </div>
      </div>
      <!-- end page title -->

      <!-- Tombol untuk rtb kamar dan fasilitas -->
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

               <!-- Untuk Waktu dan Hari -->
               <div class="row">
                  <span class="mt-10"> Time : </span><span class="mt-10" id="time"></span>
               </div>
               <div class="row">
                  <div class="mt-10 ">
                     <span id="day"></span> : <span id="year"></span>
                  </div>
               </div>

               <!-- Untuk Tabel Real Time Billing -->
               <div class="responsive-table-plugin">
                  <div class="table-rep-plugin">
                     <div class="table-responsive" data-pattern="priority-columns">
                        <table id="receipt_bill" class="table table-striped nowrap">
                           <thead>
                              <tr class="text-center">
                                 <th>Id Order </th>
                                 <th>Nama Customer</th>
                                 <th>Id kamar</th>
                                 <th>Harga</th>
                                 <th>Tanggal Check-In</th>
                                 <th>Tanggal Check-out</th>
                                 <th colspan="2">Action</th>
                              </tr>
                           </thead>
                           <tbody id="new">
                              <?php
                              foreach ($order as $row) :
                              ?>
                                 <tr class="text-center">
                                    <td><?= $row->id_order; ?></td>
                                    <td><?= $row->nama_customer; ?></td>
                                    <td><?= $row->id_kamar; ?></td>
                                    <td><?= nominal($row->harga); ?></td>
                                    <td><?= $row->checkin; ?></td>
                                    <td><?= $row->checkout; ?></td>
                                    <td>
                                       <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailBill<?php echo $row->id_order; ?>">Detail</button>
                                    </td>
                                    <td>
                                       <a href="<?php echo base_url('Rtb/ubahstatus/' . $row->id_order) ?>" type="button" class="btn btn-primary btn-sm">Checkout</a>
                                    </td>
                                 </tr>
                              <?php
                              endforeach;
                              ?>
                           </tbody>

                           <!-- Tabel Total -->
                           <tr>
                              <td> </td>
                              <td> </td>
                              <td> </td>
                              <td class="text-right text-dark">
                                 <h5><strong>Total: Rp </strong></h5>

                              </td>
                              <td class="text-center text-dark">
                                 <h5> <strong><span id="subTotal"></strong></h5>
                                 <h5> <strong><span id="taxAmount"></strong></h5>
                              </td>
                           </tr>
                           <tr>
                              <td> </td>
                              <td> </td>
                              <td> </td>
                              <td class="text-center text-danger">
                                 <h5 id="totalPayment"><strong> </strong></h5>

                              </td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>

               <!-- Modal Tambah untuk tombol detail billing -->
               <?php foreach ($order as $row) : ?>
                  <div id="detailBill<?= $row->id_order; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                              <h4 class="modal-title">Detail Real Time Billing Billing</h4>
                              <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                           </div>
                           <div class="modal-body">
                              <div class="card">
                                 <div class="card-horizontal">
                                    <div class="card-body">
                                       <h4 class="card-title"><?= $row->id_order ?></h4>
                                       <h5>Nama Customer : <?= $row->nama_customer ?></h5>
                                       <h5>ID Kamar : <?= $row->id_kamar ?></h5>
                                       <h5>Harga : <?= nominal($row->harga) ?></h5>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-body">
                              <div class="mb-2 mt-1">
                                 <div class="float-right d-none d-sm-block">
                                    <input type="hidden" name="id_order" value="<?= $row->id_order ?>">
                                    <button id="pay-button" class="btn btn-info btn-sm">Pay!</button>
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
      </section>
      </body>

      </html>
      <script>
         $(document).ready(function() {
            $('#vegitable').change(function() {
               var id = $(this).find(':selected')[0].id;
               $.ajax({
                  method: 'POST',
                  url: "<?php echo site_url('Rtb/priceGet'); ?>",
                  data: {
                     id: id
                  },
                  dataType: 'json',
                  success: function(data) {

                     $('#price').text(data.product_price);

                     //$('#qty').text(data.product_qty);
                  }
               });
            });

            //add to cart 
            var count = 1;
            $('#add').on('click', function() {

               var name = $('#vegitable').val();
               var qty = $('#qty').val();
               var price = $('#price').text();

               if (qty == 0) {
                  var erroMsg = '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
                  $('#errorMsg').html(erroMsg).fadeOut(9000);
               } else {
                  billFunction(); // Below Function passing here 
               }

               function billFunction() {
                  var total = 0;

                  $("#receipt_bill").each(function() {
                     var total = price * qty;
                     var subTotal = 0;
                     subTotal += parseInt(total);

                     var table = '<tr><td>' + count + '</td><td>' + name + '</td><td>' + qty + '</td><td>' + price + '</td><td><strong><input type="hidden" id="total" value="' + total + '">' + total + '</strong></td></tr>';
                     $('#new').append(table)

                     // Code for Sub Total of Vegitables 
                     var total = 0;
                     $('tbody tr td:last-child').each(function() {
                        var value = parseInt($('#total', this).val());
                        if (!isNaN(value)) {
                           total += value;
                        }
                     });
                     $('#Total').text(total);


                     // Code for Total Payment Amount

                     var total = $('#Total').text();


                     var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
                     $('#totalPayment').text(totalPayment.toFixed(2)); // Showing using ID 

                  });
                  count++;
               }
            });
            // Code for year 

            var currentdate = new Date();
            var datetime = currentdate.getDate() + "/" +
               (currentdate.getMonth() + 1) + "/" +
               currentdate.getFullYear();
            $('#year').text(datetime);

            // Code for extract Weekday     
            function myFunction() {
               var d = new Date();
               var weekday = new Array(7);
               weekday[0] = "Sunday";
               weekday[1] = "Monday";
               weekday[2] = "Tuesday";
               weekday[3] = "Wednesday";
               weekday[4] = "Thursday";
               weekday[5] = "Friday";
               weekday[6] = "Saturday";

               var day = weekday[d.getDay()];
               return day;
            }
            var day = myFunction();
            $('#day').text(day);
         });
      </script>

      <!-- // Code for TIME -->
      <script>
         window.onload = displayClock();

         function displayClock() {
            var time = new Date().toLocaleTimeString();
            document.getElementById("time").innerHTML = time;
            setTimeout(displayClock, 1000);
         }
      </script>
      <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-50EpSqHIShXqBzk3"></script>
      <script type="text/javascript">
         document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('<?php echo $snapToken ?>', {
               // Optional
               onSuccess: function(result) {
                  /* You may add your own js here, this is just example */
                  document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
               },
               // Optional
               onPending: function(result) {
                  /* You may add your own js here, this is just example */
                  document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
               },
               // Optional
               onError: function(result) {
                  /* You may add your own js here, this is just example */
                  document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
               }
            });
         };
      </script>
      <!-- Akhir Modal -->
      <?= $this->endSection('content'); ?>