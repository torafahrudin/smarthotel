<style>
     .qr {
         min-width: 6.5cm;
         max-width: 6.5cm;
     }
 </style>
 <!-- tracking map -->
 <section class="checkout-page section-padding bg-light-theme">
     <div class="container">
         <div class="row">
             <div class="col-md-12" id="recipt">
                 <!-- recipt -->

             </div>
         </div>
     </div>
 </section>
 <!-- tracking map -->

 <script>
     function format_number(x) {
         return new Intl.NumberFormat('de-DE').format(x)
     }

     function get_history() {
         $.ajax({
             type: 'get',
             url: "<?= site_url('history-gopay') ?>",
             dataType: 'json',
             success: function(res) {
                 console.log(res);
                 var html = '';
                 var data = res.data;
                 if (res.status) {
                     for (let i = 0; i < data.length; i++) {
                         var line = data[i];
                         html += `  <div class="recipt-sec padding-20">
                         <div class="recipt-name title u-line full-width mb-xl-20">
                             <div class="recipt-name-box">
                                 <h5 class="text-light-black fw-600 mb-2">INVOICE #${line.order_id}</h5>
                                 <p class="text-light-white ">${line.transaction_status}</p>
                             </div>
    
                         </div>
    
                         <div class="u-line mb-xl-20">
                             <div class="row">
                                 <div class="col-lg-12">
                                     <h5 class="text-light-black fw-600 title">Please scan the QR code below with Gojek app.</h5>
                                     <a href="${line.deeplink_redirect}" target="_blank">DEV ONLY (SIMULATOR GOPAY)</a>
                                 </div>
                                 <div class="col-lg-12 d-flex mt-3">
                                     <div class="checkout-product">
                                         <div class="img-name-value text-center ">
                                            <img class="qr" src="${line.qr_code}" alt="QR-CODE" >
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-7">
                                 <div class="payment-method mb-md-40">
                                     <h5 class="text-light-black fw-600">Payment Method</h5>
                                     <div class="method-type">
                                         <img src="<?= base_url() ?>/front/img/GoPay.png" style="width: 20%;" alt="">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-5">
                                 <div class="total-price padding-tb-10">
                                     <h5 class="title text-light-black fw-700">Total: <span>Rp ${format_number(line.gross_amount)}</span></h5>
                                 </div>
                             </div>
                             <div class="col-12 d-flex">
                                 <a id="btn-gopay-ready" href="#" data-invoice='${line.order_id}' data-id="${line.transaction_id}" class="btn-first white-btn fw-600 help-btn btn-gopay-ready">Check Payment Status</a>
                             </div>
                         </div>
                     </div>`;
                     }
                 } else {
                     html += `<div class="recipt-sec padding-20">
                         <div class="recipt-name title u-line full-width mb-xl-20">
                             <div class="recipt-name-box">
                                 <h5 class="text-light-black fw-600 mb-2">No Upcoming Payment</h5>
                             </div>
    
                         </div>
                     </div>`
                 }
                 $('#recipt').html(html);
             }
         });
     }
     get_history();


     $('#recipt').on('click', '.btn-gopay-ready', function(e) {
         var invoice = $(this).attr('data-invoice');
         var trans_id = $(this).attr('data-id');
         console.log('Udah Bayar')
         console.log('INVOICE ' + invoice)
         console.log('TRANS ID ' + trans_id)
         $.ajax({
             type: 'get',
             url: "<?= site_url('status-gopay') ?>",
             data: {
                 order_id: invoice,
                 transaction_id: trans_id
             },

             dataType: 'json',
             success: function(res) {
                 console.log(res);
                 if (res.status) {
                     var html = '';
                     var data = res.data;
                     var line = res.data;
                     switch (data.transaction_status) {
                         case 'pending':
                             html += `  <div class="recipt-sec padding-20">
                                    <div class="recipt-name title u-line full-width mb-xl-20">
                                        <div class="recipt-name-box">
                                            <h5 class="text-light-black fw-600 mb-2">INVOICE #${line.order_id}</h5>
                                            <p class="text-light-white ">${line.transaction_status}</p>
                                        </div>
                                    </div>
    
                                    <div class="u-line mb-xl-20">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5 class="text-light-black fw-600 title">Message:</h5>
                                            </div>
                                            <div class="col-lg-12 d-flex mt-3">
                                                <div class="checkout-product">
                                                    <div class="img-name-value">
                                                        <h4>Payment has not been received, please make a payment or check the payment status again!</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="payment-method mb-md-40">
                                                <h5 class="text-light-black fw-600">Payment Method</h5>
                                                <div class="method-type">
                                                    <img src="<?= base_url() ?>/front/img/GoPay.png" style="width: 20%;" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="total-price padding-tb-10">
                                                <h5 class="title text-light-black fw-700">Total: <span>Rp ${format_number(line.gross_amount)}</span></h5>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex">
                                            <a id="btn-gopay-back" href="#" data-invoice='${line.order_id}' data-id="${line.transaction_id}" class="btn-first white-btn fw-600 help-btn btn-gopay-back">Back to Payment</a>
                                        </div>
                                    </div>
                            </div>`;
                             break;
                         case 'settlement':
                             html += `  <div class="recipt-sec padding-20">
                                    <div class="recipt-name title u-line full-width mb-xl-20">
                                        <div class="recipt-name-box">
                                            <h5 class="text-light-black fw-600 mb-2">INVOICE #${line.order_id}</h5>
                                            <p class="text-light-white ">${line.transaction_status}</p>
                                        </div>
                                    </div>
    
                                    <div class="u-line mb-xl-20">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5 class="text-light-black fw-600 title">Message:</h5>
                                            </div>
                                            <div class="col-lg-12 d-flex mt-3">
                                                <div class="checkout-product">
                                                    <div class="img-name-value">
                                                        <h4>Thank you for your trust, we are very happy to serve you. Payment We Have Received</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="payment-method mb-md-40">
                                                <h5 class="text-light-black fw-600">Payment Method</h5>
                                                <div class="method-type">
                                                    <img src="<?= base_url() ?>/front/img/GoPay.png" style="width: 20%;" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="total-price padding-tb-10">
                                                <h5 class="title text-light-black fw-700">Total: <span>Rp ${format_number(line.gross_amount)}</span></h5>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex">
                                            <a id="btn-gopay-back" href="#" data-invoice='${line.order_id}' data-id="${line.transaction_id}" class="btn-first white-btn fw-600 help-btn btn-gopay-back">Back to Payment</a>
                                        </div>
                                    </div>
                            </div>`;
                             break;
                         case 'expire':
                             html += `  <div class="recipt-sec padding-20">
                                    <div class="recipt-name title u-line full-width mb-xl-20">
                                        <div class="recipt-name-box">
                                            <h5 class="text-light-black fw-600 mb-2">INVOICE #${line.order_id}</h5>
                                            <p class="text-light-white ">${line.transaction_status}</p>
                                        </div>
                                    </div>
    
                                    <div class="u-line mb-xl-20">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5 class="text-light-black fw-600 title">Message:</h5>
                                            </div>
                                            <div class="col-lg-12 d-flex mt-3">
                                                <div class="checkout-product">
                                                    <div class="img-name-value">
                                                        <h4>Pembayaran telah kadaluarsa, silahkan melakukan order kembali dan lakukan pembayaran!</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="payment-method mb-md-40">
                                                <h5 class="text-light-black fw-600">Payment Method</h5>
                                                <div class="method-type">
                                                    <img src="<?= base_url() ?>/front/img/GoPay.png" style="width: 20%;" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="total-price padding-tb-10">
                                                <h5 class="title text-light-black fw-700">Total: <span>Rp ${format_number(line.gross_amount)}</span></h5>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex">
                                            <a id="btn-gopay-back" href="#" data-invoice='${line.order_id}' data-id="${line.transaction_id}" class="btn-first white-btn fw-600 help-btn btn-gopay-back">Back to Payment</a>
                                        </div>
                                    </div>
                            </div>`;
                             break;
                         case 'deny':
                             html += `  <div class="recipt-sec padding-20">
                                    <div class="recipt-name title u-line full-width mb-xl-20">
                                        <div class="recipt-name-box">
                                            <h5 class="text-light-black fw-600 mb-2">INVOICE #${line.order_id}</h5>
                                            <p class="text-light-white ">${line.transaction_status}</p>
                                        </div>
                                    </div>
    
                                    <div class="u-line mb-xl-20">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5 class="text-light-black fw-600 title">Message:</h5>
                                            </div>
                                            <div class="col-lg-12 d-flex mt-3">
                                                <div class="checkout-product">
                                                    <div class="img-name-value">
                                                        <h4>Pembayaran ditolak, jika anda telah melakukan pembayaran. Mohon untuk menghubungi petugas helpdesk kami.!</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="payment-method mb-md-40">
                                                <h5 class="text-light-black fw-600">Payment Method</h5>
                                                <div class="method-type">
                                                    <img src="<?= base_url() ?>/front/img/GoPay.png" style="width: 20%;" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="total-price padding-tb-10">
                                                <h5 class="title text-light-black fw-700">Total: <span>Rp ${format_number(line.gross_amount)}</span></h5>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex">
                                            <a id="btn-gopay-back" href="#" data-invoice='${line.order_id}' data-id="${line.transaction_id}" class="btn-first white-btn fw-600 help-btn btn-gopay-back">Back to Payment</a>
                                        </div>
                                    </div>
                            </div>`;
                             break;
                     }

                 }

                 $('#recipt').html(html);

             }
         });
     });

     $('#recipt').on('click', '.btn-gopay-back', function(e) {
         get_history();
     });
 </script>