<?= $this->extend('templates/header'); ?>
<?= $this->section('content'); ?>

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
                                 <th>Id Customer </th>
                                 <th>Nama Customer</th>
                                 <th>Total Tagihan</th>
                                 <th colspan="3">Action</th>
                              </tr>
                           </thead>
                           <tbody id="new">
                              <?php
                              $total = 0;
                              foreach ($cust as $row) :
                              ?>
                                 <tr class="text-center">
                                    <td><?= $row->id_customer; ?></td>
                                    <td><?= $row->nama_customer; ?></td>
                                    <td><?= nominal($row->total_tagihan); ?></td>
                                    <td>
                                       <a href="<?php echo base_url('Rtb/billing/' . $row->id_customer) ?>" type="button" class="btn btn-primary btn-sm mdi mdi-eye fa-sm text-white">Detail</a>
                                    </td>
                                    <td>
                                       <a href="<?php echo base_url('Rtb/ubahstatus/' . $row->id_customer) ?>" type="button" class="btn btn-primary btn-sm">Close Bill</a>
                                    </td>
                                    <td>
                                       <a href="<?php echo base_url('Rtb/ubahstatus/' . $row->id_customer) ?>" type="button" class="btn btn-primary btn-sm">Checkout</a>
                                    </td>
                                 </tr>
                              <?php
                                 $total = $total + $row->total_tagihan;
                              endforeach;
                              ?>
                           </tbody>

                           <!-- Tabel Total -->
                           <tr>
                              <td> </td>
                              <td> </td>
                              <td class="text-right text-dark">
                                 <h5><strong>Total: <?= "Rp." . number_format($total), "." ?> </strong></h5>
                              </td>
                           </tr>
                        </table>
                     </div>
                  </div>
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
         <!-- Akhir Modal -->
         <?= $this->endSection('content'); ?>