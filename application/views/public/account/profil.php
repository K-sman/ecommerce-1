<div role="main" class="main">

   <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
      <div class="container">
         <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
               <h1 class="font-weight-bold text-dark">Akun Saya</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
               <ul class="breadcrumb d-block text-center">
                  <li><a href="#">Beranda</a></li>
                  <li class="active">Akun Saya</li>                  
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
         <div class="col-lg-9 order-1 order-lg-2">         
         <?php foreach ($profil as $dt) : ?>
         <form action="<?php echo base_url('Account/updateprofil'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
            
            <div class="form-group col">
               <label>Nama Lengkap</label>
               <input type="text" name="name" value="<?php echo $dt->name; ?>" class="form-control form-control-lg text-4">
            </div>                              
            <div class="form-group col">
               <label>Telepon</label>
               <input type="text" name="phone" value="<?php echo $dt->phone; ?>" class="form-control form-control-lg text-4">
            </div>                              
            <div class="form-group col">
               <label>Email</label>
               <input type="email" name="email" value="<?php echo $dt->email; ?>" class="form-control form-control-lg text-4">
            </div>               
            
            <div class="form-group col">
               <label>Ubah Kata Sandi</label>
               <input type="password" name="password" class="form-control form-control-lg text-4">
               <span class="text-danger text-2">kosongkan kolom jika tidak mengubah kata sandi</span>
            </div>                          
            
            <div class="row">
               <div class="form-group col">
                  <button type="submit" class="btn btn-primary btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Ubah Profil</button>
               </div>
            </div>
         </form>
         <?php endforeach; ?>


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
                     <label class="form-label text-color-dark text-3">Email<span class="text-color-danger">*</span></label>
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
                     <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Login</button>                     
                  </div>
               </div>
            </form>
         </div>
         <div class="col-md-6 col-lg-5">
            <h2 class="font-weight-bold text-5 mb-0">Daftar Akun</h2>
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