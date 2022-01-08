<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="<?= base_url('assets/images/users/user-1.jpg'); ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown" aria-expanded="false"><?= user()->username; ?></a>
            </div>
        </div>

        <!--- Sidemenu Receptionist-->
        <?php if (in_groups('receptionist')) : ?>
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Home</li>

                    <li>
                        <a href="<?= base_url() ?>">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>


                    <li class="menu-title">Master Data</li>

                    <li>
                        <a href="<?= base_url('coa') ?>">
                            <i class="mdi mdi-forum fa-lg"></i>
                            <span> COA </span>
                        </a>
                    </li>

                    <li>
                        <a href="/fasilitas">
                            <i class="mdi mdi-book-account fa-lg"></i>
                            <span> Fasilitas </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('headerBilling') ?>">
                            <i class="mdi mdi-database-check fa-lg"></i>
                            <span> Header Billing </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('room') ?>">
                            <i class="mdi mdi-room-service fa-lg"></i>
                            <span> Room </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('receptionist') ?>">
                            <i class="mdi mdi-book-account fa-lg"></i>
                            <span> Receptionist </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('customer') ?>">
                            <i class="mdi mdi-account-cash fa-lg"></i>
                            <span> Customer </span>
                        </a>
                    </li>

                    <!-- <li>
                        <a href="<?= base_url('users') ?>">
                            <i class="mdi mdi-account-cog"></i>
                            <span> Users Akses</span>
                        </a>
                    </li> -->



                    <li class="menu-title">Transaction</li>

                    <li>
                        <a href="#">
                            <i class="mdi mdi-order-bool-ascending-variant fa-lg"></i>
                            <span> Order </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?= base_url('order') ?>"><i class="mdi mdi-order-bool-ascending-variant"></i> All</a></li>
                            <li><a href="<?= base_url('order/booking') ?>"><i class="mdi mdi-order-bool-ascending-variant"></i> Booking</a></li>
                            <li><a href="<?= base_url('order/checkin') ?>"><i class="mdi mdi-order-bool-ascending-variant"></i> Checkin</a></li>
                            <!-- <li><a href="/Payment"><i class="mdi mdi-order-bool-ascending-variant"></i> Payment</a></li> -->
                        </ul>
                    </li>

                    <li class="menu-title">Report</li>


                    <li>
                        <a href="<?= base_url('Laporan/Kuitansi') ?>">
                            <i class="mdi mdi-clipboard-file fa-lg"></i>
                            <span> Kuitansi </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('jurnal') ?>">
                            <i class="mdi mdi-clipboard-file fa-lg"></i>
                            <span> Jurnal Umum </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('bukuBesar') ?>">
                            <i class="mdi mdi-file-document fa-lg"></i>
                            <span> Buku Besar </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('labaRugi') ?>">
                            <i class="mdi mdi-weight fa-lg"></i>
                            <span> Laba Rugi </span>
                        </a>
                    </li>
                    <li>
                        <a href="/rtb">
                            <i class="mdi mdi-clipboard-file fa-lg"></i>
                            <span> Real Time Billing </span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="/Payment/DataPayment">
                            <i class="mdi mdi-clipboard-file fa-lg"></i>
                            <span> Payment Gateway </span>
                        </a>
                    </li> -->

                </ul>

            </div>
        <?php endif; ?>

        <!--- Sidemenu Pemilik-->
        <?php if (in_groups('pemilik')) : ?>
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Home</li>

                    <li>
                        <a href="<?= base_url() ?>">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>


                    <li class="menu-title">Report</li>


                    <li>
                        <a href="<?= base_url('jurnal') ?>">
                            <i class="mdi mdi-clipboard-file fa-lg"></i>
                            <span> Jurnal Umum </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('bukuBesar') ?>">
                            <i class="mdi mdi-file-document fa-lg"></i>
                            <span> Buku Besar </span>
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