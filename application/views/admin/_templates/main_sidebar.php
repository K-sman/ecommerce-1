<aside id="sidebar-left" class="sidebar-left">

   <div class="sidebar-header">
      <div class="sidebar-title">
         Menu
      </div>
      <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
         <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
      </div>
   </div>

   <div class="nano">
      <div class="nano-content">
         <nav id="menu" class="nav-main" role="navigation">

               <ul class="nav nav-main">
                  <li>
                     <a class="nav-link" href="<?php echo base_url('Admin'); ?>">
                        <i class="bx bx-home-alt" aria-hidden="true"></i>
                        <span>Beranda</span>
                     </a>                        
                  </li>
                  <li>
                     <a class="nav-link" href="<?php echo base_url('Admin/Produk'); ?>">
                        <i class="bx bx-grid" aria-hidden="true"></i>
                        <span>Daftar Produk</span>
                     </a>                        
                  </li>                                         
                  <li class="nav-parent">
                     <a class="nav-link" href="javascript:void(0)">
                           <i class="bx bx-detail" aria-hidden="true"></i>
                           <span>Master Produk</span>
                     </a>
                     <ul class="nav nav-children">
                        <li class="nav">
                           <a class="nav-link" href="<?php echo base_url('JenisBahan'); ?>">
                              Jenis Bahan
                           </a>
                        </li>
                        <li>
                           <a class="nav-link" href="<?php echo base_url('JenisLaminasi'); ?>">
                              Jenis Laminasi
                           </a>
                        </li>
                        <li>
                           <a class="nav-link" href="<?php echo base_url('JenisMuka'); ?>">
                              Jenis Muka
                           </a>
                        </li>                        
                        <li>
                           <a class="nav-link" href="<?php echo base_url('JenisFinishing'); ?>">
                              Jenis Finishing
                           </a>
                        </li>                                                
                        <li>
                           <a class="nav-link" href="<?php echo base_url('JenisSize'); ?>">
                              Jenis Ukuran
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a class="nav-link" href="<?php echo base_url('Admin/Undangan'); ?>">
                        <i class="bx bx-cart-alt" aria-hidden="true"></i>
                        <span>Pesanan Undangan</span>
                     </a>                        
                  </li>
                  <li>
                     <a class="nav-link" href="<?php echo base_url('Admin/Orders'); ?>">
                        <i class="bx bx-cart-alt" aria-hidden="true"></i>
                        <span>Daftar Pesanan</span>
                     </a>                        
                  </li>
                  <li>
                     <a class="nav-link" href="<?php echo base_url('Admin/Customers'); ?>">
                        <i class="bx bx-user" aria-hidden="true"></i>
                        <span>Daftar Pelanggan</span>
                     </a>                        
                  </li>
                  <li>
                     <a class="nav-link" href="<?php echo base_url('Admin/Payments'); ?>">
                        <i class="bx bx-money" aria-hidden="true"></i>
                        <span>Daftar Pembayaran</span>
                     </a>                        
                  </li>
                  <li>
                     <a class="nav-link" href="<?php echo base_url('Admin/Akun'); ?>">
                        <i class="bx bx-cog" aria-hidden="true"></i>
                        <span>Pengaturan Akun</span>
                     </a>                        
                  </li>                  

               </ul>
         </nav>            

      </div>

      <script>
         // Maintain Scroll Position
         if (typeof localStorage !== 'undefined') {
               if (localStorage.getItem('sidebar-left-position') !== null) {
                  var initialPosition = localStorage.getItem('sidebar-left-position'),
                     sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                  sidebarLeft.scrollTop = initialPosition;
               }
         }
      </script>

   </div>

</aside>