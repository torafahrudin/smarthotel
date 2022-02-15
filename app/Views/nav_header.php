<body> 
    <!-- Navigation -->
    <div class="header transparent" style="box-shadow:none;transition: 0.4s;">
        <header class="full-width transparent">
            <div class="container-fluid transparent" style="transition: 0.4s;">
                <div class="row" style="border:none;">
                    <div class="col-12 mainNavCol" style="height: 125px;transition: 0.4s;">
                        <!-- logo -->
                        <div class="logo mainNavCol" style="height: 125px;transition: 0.4s">
                            <a href="index-2.html">
                                <img src="<?php echo base_url('') ?>/assetcust/img/ahadiat-logo.png" class="img-fluid" style="height: 70px;" alt="Logo">
                            </a>
                        </div>
                        <!-- logo -->
                        <div class="main-search mainNavCol">
                            <form class="main-search search-form full-width">
                                <div class="row">
                                    <!-- location picker -->
                                   <!--  <div class="col-lg-6 col-md-5">
                                        <a href="#" class="delivery-add p-relative"> <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="address">Brooklyn, NY</span>
                                        </a>
                                        <div class="location-picker">
                                            <input type="text" class="form-control" placeholder="Enter a new address">
                                        </div>
                                    </div> -->
                                    <!-- location picker -->
                                    <!-- search -->
                                    <div class="col-lg-6 col-md-7">
                                    <!--     <div class="search-box padding-10">
                                            <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                                        </div>
                                    </div> -->
                                    <!-- search -->
                                </div>
                            </form>
                        </div>
                        <div class="right-side fw-700 mainNavCol">
                            <div class="gem-points">
                                <a href="<?php echo  base_url('Restaurant') ?>" class="text-light-yellow fw-500 fs-18" style="color:<?php echo (isset($aktivhome)) ? $aktivhome : ''; ?>" > <!-- <i class="fas fa-concierge-bell"></i> -->
                                    <span>Home</span>
                                </a>
                            </div>
                            <div class="gem-points">
                                <a href="<?php echo  base_url('Restaurant/ourmenu') ?>" class="text-light-yellow fw-500 fs-18 <?php echo (isset($aktivmenu)) ? $aktivmenu : ''; ?>"> <!-- <i class="fas fa-concierge-bell"></i> -->
                                    <span>Menu</span>
                                </a>
                            </div>
                            <div class="gem-points">
                                <a href="#" class="text-light-yellow fw-500 fs-18"> <!-- <i class="fas fa-concierge-bell"></i> -->
                                    <span>My Order</span>
                                </a>
                            </div>
                           <div class="gem-points">
                                <a href="#" class="text-light-yellow fw-500 fs-18"> <!-- <i class="fas fa-concierge-bell"></i> -->
                                    <span>Payment</span>
                                </a>
                            </div>
                            <div class="gem-points">
                                <a href="#" class="text-light-yellow fw-500 fs-18"> <!-- <i class="fas fa-concierge-bell"></i> -->
                                    <span>Galery</span>
                                </a>
                            </div>
                            <div class="gem-points">
                                <a href="#" class="text-light-yellow fw-500 fs-18"> <!-- <i class="fas fa-concierge-bell"></i> -->
                                    <span>About Us</span>
                                </a>
                            </div>
                            <!-- mobile search -->
                            <div class="mobile-search">
                                <a href="#" data-toggle="modal" data-target="#search-box"> <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <!-- mobile search -->
                            <!-- user account -->
                            <div class="user-details p-relative">
                                <a href="#" class="text-light-yellow fw-500 fs-18">
                                    <img src="<?php echo base_url('') ?>/assetcust/img/user-1.png" class="rounded-circle" alt="userimg"> <span>Hi, Iyan</span>
                                </a>
                                <div class="user-dropdown">
                                    <ul>
                                        <li>
                                            <a href="order-details.html">
                                                <div class="icon"><i class="flaticon-rewind" style="color:#E5CA01;"></i>
                                                </div> <span class="details" style="color:#E5CA01;">Past Orders</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="order-details.html">
                                                <div class="icon"><i class="flaticon-takeaway" style="color:#E5CA01;"></i>
                                                </div> <span class="details" style="color:#E5CA01;">Upcoming Orders</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-breadbox" style="color:#E5CA01;"></i>
                                                </div> <span class="details" style="color:#E5CA01;">Saved</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-gift" style="color:#E5CA01;"></i>
                                                </div> <span class="details" style="color:#E5CA01;">Gift cards</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-refer" style="color:#E5CA01;"></i>
                                                </div> <span class="details" style="color:#E5CA01;">Refer a friend</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-diamond" style="color:#E5CA01;"></i>
                                                </div> <span class="details" style="color:#E5CA01;">Perks</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-user" style="color:#E5CA01;"></i>
                                                </div> <span class="details" style="color:#E5CA01;">Account</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-board-games-with-roles" style="color:#E5CA01;"></i>
                                                </div> <span class="details" style="color:#E5CA01;">Help</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="user-footer"> <span class="text-light-black">Not Jhon?</span> <a href="#">Sign Out</a>
                                    </div>
                                </div>
                            </div>
                            <!-- mobile search -->
                            <!-- user notification -->
                            <div class="cart-btn notification-btn">
                                <a href="#" class="text-light-green fw-700"> <i class="fas fa-bell" style="color:#E5CA01;"></i>
                                    <span class="user-alert-notification"></span>
                                </a>
                                <div class="notification-dropdown">
                                    <div class="product-detail">
                                        <a href="#">
                                            <div class="img-box">
                                                <img src="<?php echo base_url('') ?>/assetcust/img/shop-1.png" class="rounded" alt="image">
                                            </div>
                                            <div class="product-about">
                                                <p class="text-light-black">Lil Johnny’s</p>
                                                <p class="text-light-white">Spicy Maxican Grill</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rating-box">
                                        <p class="text-light-black">How was your last order ?.</p> <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                        <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                        <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                        <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                        <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                        <cite class="text-light-white">Ordered 2 days ago</cite>
                                    </div>
                                </div>
                            </div>
                            <!-- user notification -->
                            <!-- user cart -->
                            <div class="cart-btn">
                                <a href="cart" class="text-light-green btn-cart menu-link fw-700"> <i class="fas fa-shopping-bag" style="color:#E5CA01;"></i>
                                    <span id="user-alert-cart" class="user-alert-cart">0</span>
                                </a>
                            </div>
                            <!-- user cart -->
                        </div>
                    </div>
                   <!--  <div class="col-sm-12 mobile-search">
                        <div class="mobile-address">
                            <a href="#" class="delivery-add" data-toggle="modal" data-target="#address-box"> <span class="address">Brooklyn, NY</span>
                            </a>
                        </div> --
                        <div class="sorting-addressbox"> <span class="full-address text-light-green">Brooklyn, NY 10041</span>
                            <div class="btns">
                                <div class="filter-btn">
                                    <button type="button"><i class="fas fa-sliders-h text-light-green fs-18"></i>
                                    /button> <span class="text-light-green">Sort</span>
                                </div>
                                <div class="filter-btn">
                                    <button type="button"><i class="fas fa-filter text-light-green fs-18"></i>
                                    </button> <span class="text-light-green">Filter</span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </header>
        <script type="text/javascript">
            window.addEventListener("scroll", function(){
                var header = document.querySelector("header");
                header.classList.toggle("sticky", window.scrollY > 0);
            })
        </script>
    </div>