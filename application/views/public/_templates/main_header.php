<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 45, 'stickySetTop': '-45px', 'stickyChangeLogo': true}">
   <div class="header-body">
      <div class="header-container container">
         <div class="header-row">
            <div class="header-column">
               <div class="header-row">
                  <div class="header-logo">
                     <a href="<?php echo base_url(); ?>">
                        <img width="230" height="80" data-sticky-width="170" data-sticky-height="60" data-sticky-top="30" src="<?php echo base_url($public_dir); ?>/images/lestariprinting.png">
                     </a>
                  </div>
               </div>
            </div>
            <div class="header-column justify-content-end">
               <div class="header-row pt-3">
                  <nav class="header-nav-top">
                     <ul class="nav nav-pills">
                        <li class="nav-item nav-item-anim-icon d-none d-md-block">
                           <a class="nav-link ps-0" href="<?php echo base_url('Pages/tentang'); ?>"><i class="fas fa-angle-right"></i> Tentang Kami</a>
                        </li>
                        <li class="nav-item nav-item-anim-icon d-none d-md-block">
                           <a class="nav-link" href="<?php echo base_url('Pages/kontak'); ?>"><i class="fas fa-angle-right"></i> Kontak Kami</a>
                        </li>
                        <li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-md-show">
                        <a href="https://wa.me/6282325140539" class="ws-nowrap"><i class="fas fa-phone"></i> +62823-2514-0539</a>
                        </li>
                     </ul>
                  </nav>
                  
                  <ul class="header-social-icons social-icons d-none d-sm-block">
                     <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                     <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                     <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                     <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                  </ul>

               </div>
               <div class="header-row">
                  <div class="header-nav pt-1">
                     <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                        <nav class="collapse">
                           <ul class="nav nav-pills" id="mainNav">
                              <li>
                                 <a href="<?php echo base_url(); ?>">
                                    Beranda
                                 </a>                                 
                              </li>
                              <li>
                                 <a href="<?php echo base_url('Pages/tentang'); ?>">
                                    Tentang Kami
                                 </a>                                 
                              </li>                             
                              <li class="dropdown">
                                 <a class="dropdown-item dropdown-toggle" href="javascript:void(0)">
                                    Produk Kami
                                 </a>
                                 <ul class="dropdown-menu">                                    
                                    <li>
                                       <a class="dropdown-item" href="<?php echo base_url('Produk/undangan'); ?>">Pesan Undangan</a>
                                    </li>
                                    <li class="dropdown-submenu">
                                       <a class="dropdown-item" href="javascript:void(0)">Media Promosi</a>
                                       <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="<?php echo base_url('Produk/spanduk'); ?>">Spanduk - Banner - Baliho</a></li>
                                          <li><a class="dropdown-item" href="<?php echo base_url('Produk/kartunama'); ?>">Kartu Nama</a></li>
                                          <li><a class="dropdown-item" href="<?php echo base_url('Produk/rollbanner'); ?>">Roll Up Banner</a></li>
                                          <li><a class="dropdown-item" href="<?php echo base_url('Produk/brosur'); ?>">Brosur</a></li>
                                          <li><a class="dropdown-item" href="<?php echo base_url('Produk/standbanner'); ?>">Standing Banner</a></li>
                                       </ul>
                                    </li>
                                    <li>
                                       <a class="dropdown-item" href="<?php echo base_url('Produk/sticker'); ?>">Sticker</a>
                                    </li>
                                    <li>
                                       <a class="dropdown-item" href="<?php echo base_url('Produk/merchandise'); ?>">Merchandise</a>
                                    </li>                                    
                                    <li>
                                       <a class="dropdown-item" href="<?php echo base_url('Produk/produklainnya'); ?>">Produk Lainnya</a>
                                    </li>
                                 </ul>
                              </li>
                              <li>
                                 <a href="<?php echo base_url('Pages/kontak'); ?>">
                                    Kontak Kami
                                 </a>                                 
                              </li>
                              <li>
                                 <a href="<?php echo base_url('Pages/berita'); ?>">
                                    Berita & Artikel
                                 </a>                                 
                              </li>
                              
                           </ul>
                        </nav>
                     </div>

                  <div class="header-nav-features">
                     <div class="header-nav-feature header-nav-features-search d-inline-flex">
                        <a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch" style="margin-right: 20px;"><i class="fas fa-search header-nav-top-icon"></i></a>
                        <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
                           <form role="search" action="#" method="get">
                              <div class="simple-search input-group">
                                 <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                                 <button class="btn" type="submit">
                                    <i class="fas fa-search header-nav-top-icon"></i>
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="header-nav-feature d-inline-flex">
                        <?php if($this->session->userdata('logged_in') && $this->session->userdata('email')) { ?>
                        <a href="<?php echo base_url('Account'); ?>" class="header-nav-features-toggle text-decoration-none"><i class="fas fa-user header-nav-top-icon"></i></a>                        
                        <div class="header-nav-features-dropdown">
                        <ul class="nav nav-list flex-column">
                           <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Account'); ?>">Beranda</a></li>
                           <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Cart/orders'); ?>">Pesanan</a></li>
                           <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Account/profil'); ?>">Detail Akun</a></li>                  
                           <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Account/signout'); ?>">Keluar Akun</a></li>
                        </ul>                                                   
                        </div>
                        <?php } else { ?>
                           <a href="<?php echo base_url('Account'); ?>" class="text-decoration-none"><i class="fas fa-user header-nav-top-icon"></i></a>                        
                        <?php } ?>
                     </div>
                     
                     <a href="<?php echo base_url('Cart'); ?>" style="margin-left: 10px;">
                        <img src="<?php echo base_url($public_dir); ?>/img/icons/icon-cart.svg" width="14" alt="" class="header-nav-top-icon-img">                           
                     </a>

                  </div>
                    
                  <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                     <i class="fas fa-bars"></i>
                  </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>