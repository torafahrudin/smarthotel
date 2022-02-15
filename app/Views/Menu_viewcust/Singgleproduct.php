
<?php foreach ($produkbyid as $value) {?>
   

<div class="page-banner p-relative smoothscroll" id="menu" style="padding-top: 120px; height: 400px; padding-left: 17%;" >
        <img src="<?php echo base_url() ?>/assetcust/img/dish/150x151/dish-5.jpg" class="img-fluid full-width" alt="banner" style="width: auto;">
        <div class="overlay-2">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                      
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="tag-share"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- restaurent top -->
    <!-- restaurent details -->
    <section class="restaurent-details  u-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading padding-tb-10">
                        <h3 class="text-light-black title fw-700 no-margin"><?php echo $value->nama_produk; ?></h3>
                        <h5 class="text-light-black sub-title no-margin"><?php echo Rupiah($value->harga_produk); ?>
                        </h5>
                        <a href="#" type="button" class='btn btn-outline-danger btn-sm btn-block btn-add-cart' style="width:60%;"><i class="fa fa-plus"></i> Masukan Keranjang</a>
                        <div class="head-rating">
                            <div class="rating"> <span class="fs-16 text-yellow">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="fs-16 text-yellow">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="fs-16 text-yellow">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="fs-16 text-yellow">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="fs-16 text-dark-white">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="text-light-black fs-12 rate-data">58 rating</span>
                            </div>
                            <div class="product-review">
                                <div class="restaurent-details-mob">
                                    <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                        <span class="text-dark-white">info</span>
                                    </a>
                                </div>
                                <div class="restaurent-details-mob">
                                    <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                        <span class="text-dark-white">info</span>
                                    </a>
                                </div>
                                <div class="restaurent-details-mob">
                                    <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                        <span class="text-dark-white">info</span>
                                    </a>
                                </div>
                                <div class="restaurent-details-mob">
                                    <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                        <span class="text-dark-white">info</span>
                                    </a>
                                </div>
                                <h6 class="text-light-black no-margin">91<span class="fs-14">% Food was good</span></h6>
                                <h6 class="text-light-black no-margin">91<span class="fs-14">% Food was good</span></h6>
                                <h6 class="text-light-black no-margin">91<span class="fs-14">% Food was good</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="restaurent-logo">
                        <img src="<?php echo base_url() ?>/assetcust/img/logo-4.jpg" class="img-fluid" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent details -->
    <!-- restaurent tab -->
    <div id="accordion">
        <div class="restaurent-tabs u-line">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="restaurent-menu">
                            <ul class="nav nav-pills">
                                <li class="nav-item"> <a class="nav-link active text-light-white fw-700" data-toggle="collapse" data-target="#" href="javascript:void(0)">Menu</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="collapse" data-target="#aboutcollapse" href="javascript:void(0)">About</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="collapse" data-target="#reviewcollapse" href="javascript:void(0)">Reviews</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="collapse" data-target="#mapgallerycollapse" href="javascript:void(0)">Map & Gallery</a>
                                </li>
                            </ul>
                            <div class="add-wishlist">
                                <img src="<?php echo base_url() ?>/assetcust/img/svg/013-heart-1.svg" alt="tag">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- restaurent tab -->
        <!-- restaurent about -->
        <section class="section-padding restaurent-about collapse" id="aboutcollapse" data-parent="#accordion">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-light-black fw-700 title">Great Burger</h3>
                        <p class="text-light-green no-margin">American, Breakfast, Coffee and Tea, Fast Food, Hamburgers</p>
                        <p class="text-light-white no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <span class="text-success fs-16">$</span>
                        <span class="text-success fs-16">$</span>
                        <span class="text-success fs-16">$</span>
                        <span class="text-dark-white fs-16">$</span>
                        <span class="text-dark-white fs-16">$</span>
                        <ul class="about-restaurent">
                            <li> <i class="fas fa-map-marker-alt"></i>
                                <span>
                  <a href="#" class="text-light-white">
                      314 79th St<br>
                      Rite Aid, Brooklyn, NY, 11209
                  </a>
                </span>
                            </li>
                            <li> <i class="fas fa-phone-alt"></i>
                                <span><a href="tel:" class="text-light-white">(347) 123456789</a></span>
                            </li>
                            <li> <i class="far fa-envelope"></i>
                                <span><a href="mailto:" class="text-light-white">demo@domain.com</a></span>
                            </li>
                        </ul>
                        <ul class="social-media pt-2">
                            <li> <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li> <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li> <a href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li> <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <li> <a href="#"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="restaurent-schdule">
                            <div class="card">
                                <div class="card-header text-light-white fw-700 fs-16">Hours</div>
                                                            <div class="card-body">
                                <div class="schedule-box">
                                    <div class="day text-light-black">Monday</div>
                                    <div class="time text-light-black">Delivery: 7:00am - 10:59pm</div>
                                </div>
                                <div class="collapse" id="schdule">
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Tuesday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Wednesday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Thursday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Friday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                        <div class="schedule-box">
                                        <div class="day text-light-black">Saturday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                        <div class="schedule-box">
                                        <div class="day text-light-black">Sunday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                </div>
                                <div class="card-footer"> <a class="fw-500 collapsed" data-toggle="collapse" href="#schdule">See the full schedule</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- restaurent about -->
        <!-- map gallery -->
        <div class="map-gallery-sec section-padding bg-light-theme collapse" id="mapgallerycollapse" data-parent="#accordion">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <iframe id="locmap" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
                                </div>
                                <div class="col-md-6">
                                    <div class="gallery-box padding-10">
                                        <ul class="gallery-img">
                                        <li>
                                            <a class="image-popup" href="<?pecho base_url() ?>/assetcust/img/gallery/img-1.jpg" title="Image title">
                                                <img src="<?php echo base_url() ?>/assetcust/img/gallery/img-1.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup" href="<?pecho base_url() ?>/assetcust/img/gallery/img-2.jpg" title="Image title">
                                                <img src="<?php echo base_url() ?>/assetcust/img/gallery/img-2.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup" href="<?pecho base_url() ?>/assetcust/img/gallery/img-3.jpg" title="Image title">
                                                <img src="<?php echo base_url() ?>/assetcust/img/gallery/img-3.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup" href="<?pecho base_url() ?>/assetcust/img/gallery/img-4.jpg" title="Image title">
                                                <img src="<?php echo base_url() ?>/assetcust/img/gallery/img-4.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup" href="<?pecho base_url() ?>/assetcust/img/gallery/img-5.jpg" title="Image title">
                                                <img src="<?php echo base_url() ?>/assetcust/img/gallery/img-5.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup" href="<?pecho base_url() ?>/assetcust/img/gallery/img-6.jpg" title="Image title">
                                                <img src="<?php echo base_url() ?>/assetcust/img/gallery/img-6.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- map gallery -->
        <!-- restaurent reviews -->
        <section class="section-padding restaurent-review collapse" id="reviewcollapse" data-parent="#accordion">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title title">Reviews for Great Burger</h3>
                        </div>
                        <div class="restaurent-rating mb-xl-20">
                            <div class="star"> <span class="text-yellow fs-16">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="text-yellow fs-16">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="text-yellow fs-16">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="text-dark-white fs-16">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="text-dark-white fs-16">
                  <i class="fas fa-star"></i>
                </span>
                            </div> <span class="fs-12 text-light-black">58 Ratings</span>
                        </div>
                        <p class="text-light-black mb-xl-20">Here's what people are saying:</p>
                        <ul>
                            <li>
                                <h6 class="text-light-black mb-1">73%</h6>
                                <span class="text-light-black fs-12 fw-400">Food was good</span>
                            </li>
                            <li>
                                <h6 class="text-light-black mb-1">85%</h6>
                                <span class="text-light-black fs-12 fw-400">Delivery was on time</span>
                            </li>
                            <li>
                                <h6 class="text-light-black mb-1">68%</h6>
                                <span class="text-light-black fs-12 fw-400">Order was accurate</span>
                            </li>
                        </ul>
                        <div class="u-line"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="review-box">
                            <div class="review-user">
                                <div class="review-user-img">
                                    <img src="<?php echo base_url() ?>/assetcust/img/blog-details/40x40/user-1.png" class="rounded-circle" alt="#">
                                    <div class="reviewer-name">
                                        <p class="text-light-black fw-600">Sarra <small class="text-light-white fw-500">New York, (NY)</small>
                                        </p> <i class="fas fa-trophy text-black"></i><span class="text-light-black">Top Reviewer</span>
                                    </div>
                                </div>
                                <div class="review-date"> <span class="text-light-white">Sep 20, 2019</span>
                                </div>
                            </div>
                            <div class="ratings"> <span class="text-yellow fs-16">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="text-yellow fs-16">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="text-yellow fs-16">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="text-yellow fs-16">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="text-yellow fs-16">
                  <i class="fas fa-star"></i>
                </span>
                                <span class="ml-2 text-light-white">2 days ago </span>
                            </div>
                            <p class="text-light-black">Delivery was fast and friendly. Food was not great especially the salad. Will not be ordering from again. Too many options to settle for this place.</p> <span class="text-light-white fs-12 food-order">Kathy ordered:</span>
                            <ul class="food">
                                <li>
                                    <button class="add-pro bg-gradient-red">Coffee <span class="close">+</span>
                </button>
                                </li>
                                <li>
                                    <button class="add-pro bg-dark">Pizza <span class="close">+</span>
                </button>
                                </li>
                                <li>
                                    <button class="add-pro bg-gradient-green">Noodles <span class="close">+</span>
                </button>
                                </li>
                                <li>
                                    <button class="add-pro bg-gradient-orange">Burger <span class="close">+</span>
                </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="review-img">
                            <img src="<?php echo base_url() ?>/assetcust/img/review-footer.png" class="img-fluid" alt="#">
                            <div class="review-text">
                                <h2 class="text-light-white mb-2 fw-600">Be one of the first to review</h2>
                                <p class="text-light-white">Order now and write a review to give others the inside scoop.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- restaurent reviews -->
    <!-- restaurent address -->
    <div class="restaurent-address u-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="address-details">
                        <div class="address">
                            <div class="delivery-address"> <a href="order-details.html" class="text-light-black">Delivery, ASAP (45–55m)</a>
                                <div class="delivery-type"> <span class="text-success fs-12 fw-500">No minimun</span><span class="text-light-white">, Free Delivery</span>
                                </div>
                            </div>
                            <div class="change-address"> <a href="checkout.html" class="fw-500">Change</a>
                            </div>
                        </div>
                        <p class="text-light-white no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="local-deals section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title">People Also Bought</h3>
                    </div>
                </div>
                
                <?php foreach ($Rekomendasi as $value) {?>
                    
                
                <div class="col-lg-4 col-md-6">
                    <div class="product-box mb-xl-20">
                        <div class="product-box-2">
                            <div class="product-img">
                                <a href="<?php echo base_url('Restaurant/SinggleProduct/'.$value->kode_produk); ?>">
                                    <img src="<?php    echo base_url() ?>/assetcust/img/deals/88x112/mdeals-1.jpg" class="img-fluid" alt="product-img">
                                </a>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="<?php echo base_url('Restaurant/SinggleProduct/'.$value->kode_produk); ?>" class="text-light-black"><?php echo $value->nama_produk;?></a></h6>
                                </div>
                                <p class="text-light-white">Continental & Mexican</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price"><?php echo Rupiah($value->harga_produk); ?></span>
                                    </div>
                                    <div class="rating"> <span>
                      <i class="fas fa-star text-yellow"></i>
                      <i class="fas fa-star text-yellow"></i>
                      <i class="fas fa-star text-yellow"></i>
                      <i class="fas fa-star text-yellow"></i>
                      <i class="fas fa-star text-yellow"></i>
                    </span>
                                        <span class="text-light-white text-right">4225 ratings</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-footer-2">
                            <a href="#" type="button" class='btn btn-outline-danger btn-sm btn-block btn-add-cart'><i class="fa fa-plus"></i> Masukan Keranjang</a>
                           <!--  <div class="discount"> <span class="text-success fs-12">$3 off</span>
                            </div>
                            <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span> -->
                            </div>
                        </div>
                    </div>
                
               <?php } ?>
               
               </div>
              
            <!-- <div class="row justify-content-md-center">
                <div class="col-md-2"> <a href="restaurant.html" class="btn-first white-btn text-light-green fw-600">View More</a>
                </div>
            </div> -->
        </div>
    </section>
    <?php } ?>
   