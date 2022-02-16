 <div class="left-side-menu">

     <div class="slimscroll-menu">

         <!-- User box -->
         <div class="user-box text-center">
             <img src="<?= base_url() ?>/assets/img/user-img.png" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
             <div class="dropdown">
                 <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown" aria-expanded="false"> Admin</a>
                 <div class="dropdown-menu user-pro-dropdown">

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <i class="fe-user mr-1"></i>
                         <span>Profil</span>
                     </a>
                     <!-- item-->
                     <a href="<?= site_url('logout') ?>" class="dropdown-item notify-item">
                         <i class="fe-log-out mr-1"></i>
                         <span>Logout</span>
                     </a>

                 </div>
             </div>
             <p class="text-muted">Admin</p>

         </div>

         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <ul class="metismenu" id="side-menu">
                 <?php foreach ($menu as $mh) : ?>
                     <?php if (count($mh['detail']) <= 0) : ?>
                         <!-- level 0 -->
                         <li>
                             <a href="<?= site_url($mh['url']) ?>">
                                 <i class="<?= $mh['icon'] ?>"></i>
                                 <span> <?= $mh['nama'] ?> </span>
                             </a>
                         </li>
                     <?php endif ?>
                     <!-- /.level 0 -->

                     <?php if (count($mh['detail']) > 0) : ?>
                         <!-- level 1 -->
                         <li>
                             <a href="javascript: void(0);">
                                 <i class="<?= $mh['icon'] ?>"></i>
                                 <span> <?= $mh['nama'] ?> </span>
                                 <span class="menu-arrow"></span>
                             </a>
                             <ul class="nav-second-level" aria-expanded="false">
                                 <?php foreach ($mh['detail'] as $ms) : ?>
                                     <li><a href="<?= site_url($ms['url']) ?>"><?= $ms['nama'] ?></a></li>
                                 <?php endforeach ?>
                             </ul>
                         </li>
                     <?php endif ?>
                     <!-- /.level 1 -->
                 <?php endforeach ?>
             </ul>

         </div>
         <!-- End Sidebar -->

         <div class="clearfix"></div>

     </div>
     <!-- Sidebar -left -->

 </div>