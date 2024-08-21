<section role="main" class="content-body card-margin">
   <header class="page-header">
      <h2>Beranda</h2>
      <div class="right-wrapper text-end">
         <ol class="breadcrumbs">
            <li>
               <a href="index.html">
                  <i class="bx bx-home-alt"></i>
               </a>
            </li>
            <li><span>Beranda</span></li>            
         </ol>
         <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
      </div>
   </header>

   <!-- start: page -->
   <div class="row">        
      <div class="col-md-3">
         <section class="card mb-4">
            <div class="card-body bg-primary">
               <div class="widget-summary">
                  <div class="widget-summary-col widget-summary-col-icon">
                     <div class="summary-icon">
                        <i class="fas fa-list"></i>
                     </div>
                  </div>
                  <div class="widget-summary-col">
                     <div class="summary">
                        <h4 class="title">Jumlah Produk</h4>
                        <div class="info">
                           <strong class="amount">
                              <?= $product_all
                              ?>
                           </strong>
                        </div>
                     </div>
                     <div class="summary-footer">
                        <a class="text-uppercase" href="<?= base_url('products')?>">(Lihat Semua)</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <div class="col-md-3">
         <section class="card mb-4">
            <div class="card-body bg-secondary">
               <div class="widget-summary">
                  <div class="widget-summary-col widget-summary-col-icon">
                     <div class="summary-icon">
                        <i class="fas fa-cart-plus"></i>
                     </div>
                  </div>
                  <div class="widget-summary-col">
                     <div class="summary">
                        <h4 class="title">Jumlah Order</h4>
                        <div class="info">
                           <strong class="amount">
                              <?= $processed_orders ?>
                           </strong>
                        </div>
                     </div>
                     <div class="summary-footer">
                        <a class="text-uppercase" href="<?= base_url('orders') ?>">(Lihat Semua)</a>
                     </div>

                  </div>
               </div>
            </div>
         </section>
      </div>
      <div class="col-md-3">
         <section class="card mb-4">
            <div class="card-body bg-tertiary">
               <div class="widget-summary">
                  <div class="widget-summary-col widget-summary-col-icon">
                     <div class="summary-icon">
                        <i class="fas fa-users"></i>
                     </div>
                  </div>
                  <div class="widget-summary-col">
                     <div class="summary">
                        <h4 class="title">Total Pelanggan</h4>
                        <div class="info">
                           <strong class="amount">
                              <?= $total_customers ?>
                           </strong>
                        </div>
                     </div>
                     <div class="summary-footer">
                        <a class="text-uppercase" href="<?php echo base_url('Admin/Customers')?>">(Lihat Semua)</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <div class="col-md-3">
         <section class="card mb-4">
            <div class="card-body bg-quaternary">
               <div class="widget-summary">
                  <div class="widget-summary-col widget-summary-col-icon">
                     <div class="summary-icon">
                        <i class="fas fa-money-bill"></i>
                     </div>
                  </div>
                  <div class="widget-summary-col">
                     <div class="summary">
                        <h4 class="title">Pembayaran Diterima</h4>
                        <div class="info">
                        <?php
                           $formatted_payments = $total_verified_payments !== null ? number_format($total_verified_payments, 0, ',', '.') : '0';
                        ?>
                           <strong class="amount text-3">Rp. <?= $formatted_payments ?></strong>
                        </div>
                     </div>
                     <div class="summary-footer">
                        <a class="text-uppercase" href="<?php echo base_url('Admin/Payments') ?>">(Lihat Semua)</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
       
   <!-- end: page -->
</section>
			