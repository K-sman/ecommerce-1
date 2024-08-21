<div role="main" class="main">
   <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
      <div class="container">
         <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
               <h1 class="font-weight-bold text-dark">Riwayat Pemesanan</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
               <ul class="breadcrumb d-block text-center">
                  <li><a href="#">Beranda</a></li>
                  <li class="active">Riwayat Pemesanan</li>
               </ul>
            </div>
         </div>
      </div>
   </section>

   <div class="container py-4">
      <?php if($this->session->userdata('logged_in') && $this->session->userdata('email')) { ?>

         <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
               <aside class="sidebar">                           
                  <ul class="nav nav-list flex-column">
                     <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Account'); ?>">Beranda</a></li>
                     <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Cart/orders'); ?>">Pesanan</a></li>
                     <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Account/profil'); ?>">Detail Akun</a></li>                  
                     <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Account/signout'); ?>">Keluar</a></li>
                  </ul>                              
               </aside>
            </div>
            <div class="col-lg-9 order-1 order-lg-2 text-center">         
               
               <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                     <table class="table table-bordered table-striped">
                        <thead>
                           <tr>
                                 <th width="10px">No</th>
                                 <th width="100px">ID Pesanan</th>
                                 <th width="150px">Nama Produk</th>
                                 <th width="100px">Jumlah Bayar</th>
                                 <th width="100px">Tanggal Bayar</th>
                                 <th width="100px">Metode Pembayaran</th>
                                 <th width="100px">Tanggal Kirim</th> <!-- Kolom Baru -->
                                 <th width="30px">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (is_array($orders)) { ?>
                                 <?php $no = 1; ?>
                                 <?php foreach ($orders as $dt) : ?>
                                    <tr>
                                       <td><?php echo $no ?></td>
                                       <td><?php echo $dt->cart_id; ?><?php echo date("dmY", strtotime($dt->tglbayar)); ?></td>
                                       <td><?php echo $dt->nameproduct; ?></td>
                                       <td>Rp. <?php echo $dt->jmlbayar; ?></td>
                                       <td><?php echo tgl_indo($dt->tglbayar); ?></td>
                                       <td><?php echo $dt->payment_method; ?></td>
                                       <td><?php echo !empty($dt->send_order) ? tgl_indo($dt->send_order) : 'Belum Ditentukan'; ?></td>
                                       <td>
                                             <?php 
                                             // Menampilkan status sesuai dengan nilai status
                                             if (empty($dt->status)) {
                                                 echo '<span class="badge badge-info">Menunggu Konfirmasi</span>';
                                             } else {
                                                 switch ($dt->status) {
                                                     case 'B':
                                                         echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                         break;
                                                     case 'S':
                                                         echo '<span class="badge badge-success">Pembayaran Diterima</span>';
                                                         break;
                                                     case 'T':
                                                         echo '<span class="badge badge-info">Pesanan Selesai Dikerjakan</span>';
                                                         break;
                                                     case 'F':
                                                         echo '<span class="badge badge-danger">Pembayaran Ditolak</span>';
                                                         break;
                                                     default:
                                                         echo '<span class="badge badge-secondary">Status Tidak Diketahui</span>';
                                                 }
                                             }
                                             ?>
                                       </td>
                                    </tr>
                                    <?php $no++; ?>
                                 <?php endforeach; ?>
                           <?php } else { ?>
                                 <tr>
                                    <td colspan="8" align="center"><strong>Data Kosong</strong></td>
                                 </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                     </div>
               </div>
               </div>
            </div>
         </div>    

      <?php } else { ?>
         <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
               <h2 class="font-weight-bold text-5 mb-0">Masuk</h2>
               <form action="<?php echo base_url('Account/masuk'); ?>" method="post">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                  <div class="row">
                     <div class="form-group col">
                        <label class="form-label text-color-dark text-3">Email <span class="text-color-danger">*</span></label>
                        <input type="text" name="email" class="form-control form-control-lg text-4" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col">
                        <label class="form-label text-color-dark text-3">Kata Sandi <span class="text-color-danger">*</span></label>
                        <input type="password" name="password" class="form-control form-control-lg text-4" required>
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="form-group col">
                        <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Masuk</button>                     
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-md-6 col-lg-5">
               <h2 class="font-weight-bold text-5 mb-0">Daftar</h2>
               <form action="<?php echo base_url('Account/daftar'); ?>" method="post">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                  <div class="row">
                     <div class="form-group col">
                        <label class="form-label text-color-dark text-3">Nama Lengkap <span class="text-color-danger">*</span></label>
                        <input type="text" name="name" class="form-control form-control-lg text-4" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col">
                        <label class="form-label text-color-dark text-3">Telepon <span class="text-color-danger">*</span></label>
                        <input type="text" name="phone" class="form-control form-control-lg text-4" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col">
                        <label class="form-label text-color-dark text-3">Email <span class="text-color-danger">*</span></label>
                        <input type="email" name="email" class="form-control form-control-lg text-4" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col">
                        <label class="form-label text-color-dark text-3">Kata Sandi <span class="text-color-danger">*</span></label>
                        <input type="password" name="password" class="form-control form-control-lg text-4" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col">
                        <p class="text-2 mb-2">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#" class="text-decoration-none">privacy policy.</a></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col">
                        <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Daftar</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      <?php } ?>
   </div>
</div>
