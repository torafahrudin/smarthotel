<?= $this->extend('/frontend/templates/header'); ?>

<?= $this->section('content_frontend'); ?>
<!-- slider -->
<section class="about-us-slider swiper-container p-relative">
    <div class="swiper-wrapper">
        <div class="swiper-slide slide-item">
            <img src="<?= base_url('assets_frontend/img/about/blog/1920x700/banner-1.jpg') ?>" class="img-fluid full-width" alt="Banner">
            <div class="transform-center">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-7 align-self-center">
                            <div class="right-side-content">
                                <h1 class="text-custom-white fw-600">Increase takeout sales by 50%</h1>
                                <h3 class="text-custom-white fw-400">with the largest delivery platform in the U.S. and Canada</h3>
                                <a href="restaurant.html" class="btn-second btn-submit">Learn More.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay overlay-bg"></div>
        </div>
        <div class="swiper-slide slide-item">
            <img src="<?= base_url('assets_frontend/img/about/blog/1920x700/banner-2.jpg') ?>" class="img-fluid full-width" alt="Banner">
            <div class="transform-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 align-self-center">
                            <div class="right-side-content text-center">
                                <h1 class="text-custom-white fw-600">Increase takeout sales by 50%</h1>
                                <h3 class="text-custom-white fw-400">with the largest delivery platform in the U.S. and Canada</h3>
                                <a href="restaurant.html" class="btn-second btn-submit">Learn More.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay overlay-bg"></div>
        </div>
        <div class="swiper-slide slide-item">
            <img src="<?= base_url('assets_frontend/img/about/blog/1920x700/banner-3.jpg') ?>" class="img-fluid full-width" alt="Banner">
            <div class="transform-center">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-7 align-self-center">
                            <div class="right-side-content text-right">
                                <h1 class="text-custom-white fw-600">Increase takeout sales by 50%</h1>
                                <h3 class="text-custom-white fw-400">with the largest delivery platform in the U.S. and Canada</h3>
                                <a href="restaurant.html" class="btn-second btn-submit">Learn More.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay overlay-bg"></div>
        </div>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</section>
<!-- slider -->
<!-- Browse by category -->
<section class="browse-cat u-line section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title title">Browse by cuisine <span class="fs-14"><a href="restaurant.html">See all restaurant</a></span></h3>
                </div>
            </div>
            <div class="col-12">
                <div class="category-slider swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="restaurant.html" class="categories">
                                <div class="icon icon-parent text-custom-white bg-light-green"> <i class="fas fa-map-marker-alt"></i>
                                </div> <span class="text-light-black cat-name">Brooklyn</span>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="restaurant.html" class="categories">
                                <div class="icon text-custom-white bg-light-green ">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/125x125/cuisine-1.jpg') ?>" class="rounded-circle" alt="categories">
                                </div> <span class="text-light-black cat-name">Italian </span>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="restaurant.html" class="categories">
                                <div class="icon text-custom-white bg-light-green ">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/125x125/cuisine-2.jpg') ?>" class="rounded-circle" alt="categories">
                                </div> <span class="text-light-black cat-name">Thai </span>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="restaurant.html" class="categories">
                                <div class="icon text-custom-white bg-light-green ">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/125x125/cuisine-3.jpg') ?>" class="rounded-circle" alt="categories">
                                </div> <span class="text-light-black cat-name">Chinese </span>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="restaurant.html" class="categories">
                                <div class="icon text-custom-white bg-light-green ">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/125x125/cuisine-4.jpg') ?>" class="rounded-circle" alt="categories">
                                </div> <span class="text-light-black cat-name">Mexican </span>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="restaurant.html" class="categories">
                                <div class="icon text-custom-white bg-light-green ">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/125x125/cuisine-5.jpg') ?>" class="rounded-circle" alt="categories">
                                </div> <span class="text-light-black cat-name">Indian </span>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="restaurant.html" class="categories">
                                <div class="icon text-custom-white bg-light-green ">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/125x125/cuisine-6.jpg') ?>" class="rounded-circle" alt="categories">
                                </div> <span class="text-light-black cat-name">Lebanese </span>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="restaurant.html" class="categories">
                                <div class="icon text-custom-white bg-light-green ">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/125x125/cuisine-7.jpg') ?>" class="rounded-circle" alt="categories">
                                </div> <span class="text-light-black cat-name">Japanese </span>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="restaurant.html" class="categories">
                                <div class="icon text-custom-white bg-light-green ">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/125x125/cuisine-8.jpg') ?>" class="rounded-circle" alt="categories">
                                </div> <span class="text-light-black cat-name">American </span>
                            </a>
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Browse by category -->
<!-- Explore collection -->
<section class="ex-collection section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title title">Explore our collections</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="ex-collection-box mb-xl-20">
                    <img src="<?= base_url('assets_frontend/img/restaurants/540x300/collection-1.jpg') ?>" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15"> <a href="restaurant.html" class="category-btn">Top rated</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ex-collection-box mb-xl-20">
                    <img src="<?= base_url('assets_frontend/img/restaurants/540x300/collection-2.jpg') ?>" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15"> <a href="restaurant.html" class="category-btn">Top rated</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="large-product-box mb-xl-20 p-relative">
                    <img src="<?= base_url('assets_frontend/img/restaurants/255x587/Banner-12.jpg') ?>" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15">
                        <button class="category-btn">Most popular near you</button> <a href="restaurant.html" class="btn-first white-btn text-light-black fw-600 full-width">See all</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-23.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">
                                                10%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Great Burger</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-yellow">
                                            3.1
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">American, Fast Food</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/004-leaf.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/006-chili.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-2.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Flavor Town</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">
                                            2.1
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Breakfast, Lunch & Dinner</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/007-chili-1.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/004-leaf.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-3.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <span class="type-tag bg-gradient-green text-custom-white">
                                            Trending
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Big Bites</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">
                                            4.5
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Pizzas, Fast Food</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/004-leaf.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-4.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <span class="type-tag bg-gradient-green text-custom-white">
                                            Trending
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Smile N??? Delight</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">
                                            4.5
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Desserts, Beverages</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-5.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">
                                                20%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Lil Johnny???s</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">
                                            2.1
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Continental & Mexican</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-6.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <span class="text-custom-white type-tag bg-gradient-orange">
                                            NEW
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Choice Foods</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">
                                            4.5
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Indian, Chinese, Tandoor</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hotel Ahadiat banner-->
        <div class="row">
            <div class="col-12">
                <div class="banner-adv2 mb-xl-20">
                    <img src="<?= base_url('assets_frontend/img/banner/vbanner-1.jpg') ?>" class="img-fluid full-width" alt="banner"> <span class="text">See Our Room Hotel & Bungalow <img src="<?= base_url('assets_frontend/img/tag.jpg') ?>" alt="logo">
                </div>
            </div>
        </div>
        <!-- Hotel Ahadiat banner-->
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <?php foreach ($room as $rm) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-box mb-xl-20">
                                <div class="product-img">
                                    <a href="#">

                                        <img src="<?= base_url('assets/images/room/' . $rm['room_image']) ?>" class="thumb-img img-fluid">
                                        <!-- <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-7.jpg') ?>" class="img-fluid full-width" alt="product-img"> -->
                                    </a>
                                    <div class="overlay">
                                        <div class="product-tags padding-10"> <span class="circle-tag">
                                                <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                            </span>
                                            <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-green">
                                                    <?= $rm['status'] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="title-box">
                                        <h6 class="product-title"><a href="restaurant.html" class="text-light-black "><?= $rm['ket1'] . ' ' . $rm['ket2']  ?></a></h6>
                                    </div>
                                    <div class="product-footer">
                                        <span class="text-custom-white square-tag">
                                            <img src="<?= base_url('assets/images/room/svg/Sofa.svg') ?>" alt="tag">
                                        </span> Booking
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="large-product-box mb-xl-20 p-relative">
                    <img src="<?= base_url('assets/images/room/main-hotel.jpg') ?>" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15">
                        <button class="category-btn">ALL OUR ROOM</button> <a href="#" class="btn-first white-btn text-light-black fw-600 full-width">See all</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- advertisement banner-->
        <div class="row">
            <div class="col-12">
                <div class="banner-adv2 mb-xl-20">
                    <img src="<?= base_url('assets_frontend/img/restaurants/1110x100/vbanner-3.jpg') ?>" class="img-fluid full-width" alt="banner"> <span class="text">Unlimited Free Delivery with. <img src="<?= base_url('assets_frontend/img/tag.jpg') ?>" alt="logo">
                        <a href="restaurant.html" class="btn-second btn-submit">Try 30 Days FREE</a></span>
                    <span class="close-banner"></span>
                    <div class="overlay overlay-bg"></div>
                </div>
            </div>
        </div>
        <!-- advertisement banner-->
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="large-product-box mb-xl-20 p-relative">
                    <img src="<?= base_url('assets_frontend/img/restaurants/255x587/Banner-2.jpg') ?>" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15">
                        <button class="category-btn">Most popular near you</button> <a href="restaurant.html" class="btn-first white-btn text-light-black fw-600 full-width">See all</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-25.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">
                                                10%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Great Burger</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-yellow">
                                            3.1
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">American, Fast Food</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/004-leaf.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/006-chili.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-26.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black ">Flavor Town</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">
                                            2.1
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Breakfast, Lunch & Dinner</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/007-chili-1.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/004-leaf.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-27.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <span class="type-tag bg-gradient-green text-custom-white">
                                            Trending
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Big Bites</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">
                                            4.5
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Pizzas, Fast Food</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/004-leaf.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-28.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <span class="type-tag bg-gradient-green text-custom-white">
                                            Trending
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black ">Smile N??? Delight</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">
                                            4.5
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Desserts, Beverages</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-15.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">
                                                20%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Lil Johnny???s</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">
                                            2.1
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Continental & Mexican</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-16.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <span class="text-custom-white type-tag bg-gradient-orange">
                                            NEW
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black ">Choice Foods</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">
                                            4.5
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Indian, Chinese, Tandoor</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- advertisement banner-->
        <div class="row">
            <div class="col-12">
                <div class="banner-adv2 mb-xl-20">
                    <img src="<?= base_url('assets_frontend/img/restaurants/1110x100/vbanner-1.jpg') ?>" class="img-fluid full-width" alt="banner"> <span class="text">Unlimited Free Delivery with. <img src="<?= base_url('assets_frontend/img/tag.jpg') ?>" alt="logo">
                        <a href="restaurant.html" class="btn-second btn-submit">Try 30 Days FREE</a></span>
                    <span class="close-banner"></span>
                    <div class="overlay overlay-bg"></div>
                </div>
            </div>
        </div>
        <!-- advertisement banner-->
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-17.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">
                                                10%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black ">Great Burger</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-yellow">
                                            3.1
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">American, Fast Food</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/004-leaf.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/006-chili.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-18.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black ">Flavor Town</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">
                                            2.1
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Breakfast, Lunch & Dinner</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/007-chili-1.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/004-leaf.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-19.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <span class="type-tag bg-gradient-green text-custom-white">
                                            Trending
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black ">Big Bites</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">
                                            4.5
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Pizzas, Fast Food</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/004-leaf.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-20.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <span class="type-tag bg-gradient-green text-custom-white">
                                            Trending
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black ">Smile N??? Delight</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">
                                            4.5
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Desserts, Beverages</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-21.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">
                                                20%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black ">Lil Johnny???s</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">
                                            2.1
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Continental & Mexican</p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="restaurant.html">
                                    <img src="<?= base_url('assets_frontend/img/restaurants/255x150/shop-22.jpg') ?>" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="<?= base_url('assets_frontend/img/svg/013-heart-1.svg') ?>" alt="tag">
                                        </span>
                                        <span class="text-custom-white type-tag bg-gradient-orange">
                                            NEW
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black ">Choice Foods</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">
                                            4.5
                                        </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Indian, Chinese, Tandoor </p>
                                <div class="product-details">
                                    <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                        <span class="text-light-white price">$10 min</span>
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
                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/005-chef.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/008-protein.svg') ?>" alt="tag">
                                    </span>
                                    <span class="text-custom-white square-tag">
                                        <img src="<?= base_url('assets_frontend/img/svg/009-lemon.svg') ?>" alt="tag">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="large-product-box mb-xl-20 p-relative">
                    <img src="<?= base_url('assets_frontend/img/restaurants/255x587/Banner-3.jpg') ?>" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15">
                        <button class="category-btn">Most popular near you</button> <a href="restaurant.html" class="btn-first white-btn text-light-black fw-600 full-width">See all</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="ex-collection-box mb-sm-20">
                    <img src="<?= base_url('assets_frontend/img/restaurants/540x300/collection-3.jpg') ?>" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15"> <a href="restaurant.html" class="category-btn">Top rated</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ex-collection-box">
                    <img src="<?= base_url('assets_frontend/img/restaurants/540x300/collection-4.jpg') ?>" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15"> <a href="restaurant.html" class="category-btn">Top rated</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Explore collection -->

<?= $this->endSection('content_frontend'); ?>



<!-- Section Receptionist -->
<?php if (in_groups('receptionist')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>


<!-- Section Admin -->
<?php if (in_groups('admin')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>




<!-- Section Housekeeping -->
<?php if (in_groups('housekeeping')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>



<!-- Section Pemilik -->
<?php if (in_groups('pemilik')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>

<!-- Section Keuangan -->
<?php if (in_groups('keuangan')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>


<!-- Section hrd -->
<?php if (in_groups('hrd')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>


<!-- Section pegawai -->
<?php if (in_groups('pegawai')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>

<!-- Section manager -->
<?php if (in_groups('manager')) : ?>
    <?= $this->extend('templates/header'); ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <?= $this->endSection('content'); ?>
<?php endif; ?>