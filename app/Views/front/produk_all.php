 <!-- Explore collection -->
 <section class="ex-collection u-line section-padding">
     <div class="container">

         <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12">
                 <div class="row" id="product-collection">

                 </div>
             </div>
         </div>

         <!-- <div class="row">
             <div class="col-md-12 text-center">
                 <button class="btn btn-outline-danger col-md-6">See More</button>
             </div>
         </div> -->
         <!-- advertisement banner-->
     </div>
 </section>
 <!-- Explore collection -->

 <script>
     function format_number(x) {
         return new Intl.NumberFormat('de-DE').format(x)
     }

     function load_produk() {
         $.ajax({
             type: 'get',
             url: "<?= site_url('get-produk') ?>",
             dataType: 'json',
             success: function(res) {
                 var data = res.data;
                 var html = '';
                 for (let i = 0; i < data.length; i++) {
                     var line = data[i];
                     html += `<div class="col-lg-3 col-md-6 col-sm-6">
                         <a href="#" class="product-preview">
                             <div class="product-box mb-xl-20">
                                 <div class="product-img">
                                     <img src="<?= base_url('front/produk/default.png') ?>" class="img-fluid full-width" alt="product-img">
                                   
                                 </div>
                                 <div class="product-caption">
                                     <div class="title-box">
                                         <h6 class="product-title text-light-black">${line.nama}</h6>
                                     </div>
                                     <p class="text-light-white">${line.tag}</p>
                                     <div class="product-details">
                                         <div class="price-time"> <span class="text-light-black time">${line.estimasi_delivery}</span>
                                             <span class="text-light-white price">Rp ${format_number(line.harga_satuan)}</span>
                                         </div>
                                     </div>
                                     <div class="product-footer text-center"> 
                                        <button data-id='${line.kode}' type="button" class='btn btn-outline-danger btn-sm btn-block btn-add-cart'><i class="fa fa-plus"></i> Add to Cart</button>
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </div>`;
                 }
                 $('#product-collection').html(html);
             }
         });
     }
     load_produk();

     //  add to cart
     $('#product-collection').on('click', '.btn-add-cart', function(e) {
         e.preventDefault();
         var kode_produk = $(this).attr('data-id');
         console.log('Add to chart clicked!' + kode_produk);
         $.ajax({
             type: 'post',
             url: "<?= site_url('add-cart') ?>",
             data: {
                 kode_produk: kode_produk
             },
             dataType: 'json',
             success: function(res) {
                 var data = res.data;
                 var html = '';
                 get_total_cart();
                 html += `<div class="col-lg-12">
                            <div class="promocodeimg mb-xl-20 p-relative">
                                <div class="promocode-text">
                                    <div class="promocode-text-content">
                                        <h5 class="text-custom-white mb-2 fw-600">${data.nama}</h5>
                                    </div>
                                    <div class="promocode-btn"> 
                                        <a href="cart" class='menu-link'>Open Cart</a>
                                    </div>
                                </div>
                                <div class="overlay overlay-bg"></div>
                            </div>
                        </div>`;
                 $('#modal-notification .modal-title').html('Added Successfully!');
                 $('#modal-notification #modal-result').html(html);
                 $('#modal-notification').modal('show');

             }
         });
     });

     $('#modal-notification').on('click', '.menu-link', function(e) {
         e.preventDefault();
         var page = $(this).attr('href');
         var id = $(this).attr('id');
         $('#modal-notification').modal('hide');
         $('#main-container').load('<?= site_url('menu') ?>?page=' + page);
         $(window).scrollTop(0);
     });
     get_total_cart();
 </script>