<header id="header" class="header fixed-top" data-scrollto-offset="0" style="max-height: 67px !important;">
   <div id="navbar-top" class="container d-flex" style="place-content: center;place-items: center;">

      <a href="<?php echo base_url(); ?>#home" class="logo d-flex" style="margin-right:auto;">
         <img src="<?php echo base_url('assets'); ?>/img/logo-kanpa-market.png" class="size-logo-nav" alt="">
      </a>

      <!-- <a href="<?php echo base_url(); ?>#home" class="logo d-flex align-items-center scrollto me-auto mr-0">
         <h1 class="mb-0 font-size-nav-baro text-kanzu-header"><?= $nm_company; ?></h1>
      </a> -->

      <nav id="navbar" class="navbar" style="position: fixed;">
         <ul>
            <li><a class="nav-link scrollto" href="<?php echo base_url('Properti/dijual/'); ?>#dijual">Dijual</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url('Properti/disewa/'); ?>#disewa">Disewa</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url('Properti/proyek_baru/perumahan/'); ?>#proyek_baru">Proyek Baru</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url('Simulasi_KPR'); ?>#kpr">KPR</a></li>
            <!-- <li><a class="nav-link scrollto" href="<?php echo base_url('Perumahan'); ?>#produk">Cari Agen</a></li> -->
            <!-- <li><a class="nav-link scrollto" href="<?php echo base_url('Perumahan'); ?>#produk">Titip Properti</a></li> -->
            <!-- <li><a class="nav-link scrollto" href="<?php echo base_url('Perumahan'); ?>#produk">FAQ</a></li> -->
            <!-- <li><a id="btn-menu-news" class="nav-link scrollto" href="<?php echo base_url('Artikel'); ?>#berita">Artikel</a></li> -->
         </ul>
         <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

   </div>
   <?php if (!$this->session->userdata('is_login')) : ?>
   <?php else : ?>
      <?php if ($this->session->userdata("privilage") == 'Admin') { ?>

         <aside class="sidebar mt-15px">
            <nav id="navbar">
               <ul class="sidebar__nav">
                  <li>
                     <a href="<?php echo base_url('Perum'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-house"></i>
                        <span class="sidebar__nav__text">Perumahan</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Fasilitas'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-house-medical"></i>
                        <span class="sidebar__nav__text">Fasilitas</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Lokasi_terdekat'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-street-view"></i>
                        <span class="sidebar__nav__text">Lokasi Terdekat</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Tipe'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-sitemap"></i>
                        <span class="sidebar__nav__text">Tipe Rumah</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Foto'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-regular fa-images"></i>
                        <span class="sidebar__nav__text">Foto Rumah</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Marketing'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-people-roof"></i>
                        <span class="sidebar__nav__text">Marketing</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Berita'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-regular fa-newspaper"></i>
                        <span class="sidebar__nav__text">Berita</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Voucher'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-receipt"></i>
                        <span class="sidebar__nav__text">Voucher</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('logout'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-right-from-bracket"></i>
                        <span class="sidebar__nav__text">Logout || <?= $this->session->userdata("privilage"); ?></span>
                     </a>
                  </li>
               </ul>
            </nav>
         </aside>
      <?php
      } ?>
   <?php endif ?>
</header><!-- End Header -->