<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="<?= base_url(); ?>/assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown" aria-expanded="false"><?= user()->username; ?></a>
            </div>
        </div>

        <!--- Sidemenu -->
        <!--- Sidemenu Admin-->
        <?php if (in_groups('admin')) : ?>
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Home</li>

                    <li>
                        <a href="/">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>


                    <li class="menu-title">Master Data</li>

                    <li>
                        <a href="/coa">
                            <i class="mdi mdi-forum fa-lg"></i>
                            <span> COA </span>
                        </a>
                    </li>

                    <li>
                        <a href="/vendor">
                            <i class="mdi mdi-account-supervisor fa-lg"></i>
                            <span> Vendor </span>
                        </a>
                    </li>

                    <li>
                        <a href="/departemen">
                            <i class="mdi mdi-account-group fa-lg"></i>
                            <span> Departemen </span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="mdi mdi-alarm-bell fa-lg"></i>
                            <span> Aktiva </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/aktiva/aktiva"><i class="mdi mdi-order-bool-ascending-variant"></i> Master</a></li>
                            <li><a href="/aktiva/kelompok"><i class="mdi mdi-order-bool-ascending-variant"></i> Kelompok</a></li>
                            <li><a href="/aktiva/bhp"><i class="mdi mdi-safe-square"></i> BHP</a></li>
                            <li><a href="/aktiva/aktivatetap"><i class="mdi  mdi-align-vertical-bottom"></i> Aktiva Tetap</a></li>
                        </ul>
                    </li>

                    <!-- <li>
                        <a href="/users">
                            <i class="mdi mdi-account-cog"></i>
                            <span> Users Akses</span>
                        </a>
                    </li> -->

                    <li class="menu-title">Transaction</li>

                    <!-- <li>
                        <a href="#">
                            <i class="mdi mdi-order-bool-ascending-variant fa-lg"></i>
                            <span> Order </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/order"><i class="mdi mdi-order-bool-ascending-variant"></i> All</a></li>
                            <li><a href="/order/booking"><i class="mdi mdi-order-bool-ascending-variant"></i> Booking</a></li>
                            <li><a href="/order/checkin"><i class="mdi mdi-order-bool-ascending-variant"></i> Checkin</a></li>
                        </ul>
                    </li> -->

                    <li>
                        <a href="#">
                            <i class="mdi mdi-page-layout-sidebar-left fa-lg"></i>
                            <span> Aktiva Tetap</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/aktiva/perolehan"><i class="mdi mdi-image-filter-none"></i> Perolehan</a></li>
                            <li><a href="/aktiva/penyusutan"><i class="mdi mdi-image-filter-none"></i> Penyusutan</a></li>
                            <li><a href="/aktiva/perbaikan"><i class="mdi mdi-image-filter-none"></i> Perbaikan</a></li>
                            <li><a href="/aktiva/pemeliharaan"><i class="mdi mdi-image-filter-none"></i> Pemeliharaan</a></li>
                            <li><a href="/aktiva/penghapusan"><i class="mdi mdi-image-filter-none"></i> Penghapusan</a></li>
                            <li><a href="/aktiva/perpindahan"><i class="mdi mdi-image-filter-none"></i> Perpindahan</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="mdi mdi-page-layout-sidebar-left fa-lg"></i>
                            <span> Aktiva Lancar</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/aktiva/pembeliankembali"><i class="mdi mdi-image-filter-none"></i> Pembelian Kembali</a></li>
                            <li><a href="/aktiva/perpindahanlancar"><i class="mdi mdi-image-filter-none"></i> Perpindahan</a></li>
                            <li><a href="/aktiva/denda"><i class="mdi mdi-image-filter-none"></i> Denda</a></li>
                            <li><a href="/aktiva/reuse"><i class="mdi mdi-image-filter-none"></i> Reuse</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Report</li>

                    <li>
                        <a href="/jurnal">
                            <i class="mdi mdi-clipboard-file fa-lg"></i>
                            <span> Jurnal Umum </span>
                        </a>
                    </li>

                    <li>
                        <a href="/bukubesar">
                            <i class="mdi mdi-file-document fa-lg"></i>
                            <span> Buku Besar </span>
                        </a>
                    </li>

                    <li>
                        <a href="/kartuasset">
                            <i class="mdi mdi-card-bulleted fa-lg"></i>
                            <span> Kartu Asset </span>
                        </a>
                    </li>

                    <li>
                        <a href="/kartustok">
                            <i class="mdi mdi-clipboard-multiple fa-lg"></i>
                            <span> Kartu Stok </span>
                        </a>
                    </li>

                </ul>

            </div>
        <?php endif; ?>


        <!--- Sidemenu HouseKeeping-->
        <?php if (in_groups('housekeeping')) : ?>
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Home</li>

                    <li>
                        <a href="/">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="menu-title">Transaction Order</li>

                    <li>
                        <a href="/housekeeping/ordercheckin">
                            <i class="mdi mdi-clipboard-arrow-right-outline fa-lg"></i>
                            <span> Room Checkin </span>
                        </a>
                    </li>

                    <li>
                        <a href="/housekeeping/ordercheckout">
                            <i class="mdi mdi-clipboard-arrow-left-outline fa-lg"></i>
                            <span> Room Checkout </span>
                        </a>
                    </li>

                </ul>
            </div>
        <?php endif; ?>


        <!--- Sidemenu Pemilik-->
        <?php if (in_groups('pemilik')) : ?>
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Home</li>

                    <li>
                        <a href="/">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>


                    <li class="menu-title">Report</li>


                    <li>
                        <a href="/jurnal">
                            <i class="mdi mdi-clipboard-file fa-lg"></i>
                            <span> Jurnal Umum </span>
                        </a>
                    </li>

                    <li>
                        <a href="/bukubesar">
                            <i class="mdi mdi-file-document fa-lg"></i>
                            <span> Buku Besar </span>
                        </a>
                    </li>

                    <li>
                        <a href="/kartuasset">
                            <i class="mdi mdi-card-bulleted fa-lg"></i>
                            <span> Kartu Asset </span>
                        </a>
                    </li>

                </ul>

            </div>
        <?php endif; ?>


        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>