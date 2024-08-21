<section role="main" class="content-body">
   <header class="page-header">
      <h2>Pengaturan Akun</h2>

      <div class="right-wrapper text-end">
         <ol class="breadcrumbs">
            <li>
               <a href="index.html">
                  <i class="bx bx-home-alt"></i>
               </a>
            </li>            
            <li><span>Pengaturan Akun</span></li>

         </ol>

         <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
      </div>
   </header>

   <!-- start: page -->

   <div class="row">
      <div class="col-lg-4">

         <section class="card">
            <div class="card-body">
               <div class="thumb-info mb-3">
                  <img src="<?php echo base_url($admin_dir); ?>/img/!logged-user.jpg" class="rounded img-fluid" alt="John Doe">
                  <div class="thumb-info-title">
                     <span class="thumb-info-inner"><?php echo $this->session->userdata('name'); ?></span>
                     <span class="thumb-info-type">Admin</span>
                  </div>
               </div>               

               <hr class="dotted short">

               <h5 class="mb-2 mt-3">Email : <?php echo $this->session->userdata('email'); ?></h5>
               <p class="text-2">Telepon : <?php echo $this->session->userdata('telepon'); ?></p>               

               <hr class="dotted short">               

            </div>
         </section>         

      </div>
      <div class="col-lg-8">                  
      <section class="card">
         <div class="card-body">
            <?php foreach ($profil as $dt) : ?>
            <form action="<?php echo base_url('Admin/updateakun'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
               <h4 class="mb-3 font-weight-semibold text-dark">Data Profil</h4>
               <div class="row row mb-4">
                  <div class="form-group col">
                     <label for="inputAddress">Nama Lengkap</label>
                     <input type="text" class="form-control" name="name" value="<?php echo $dt->name; ?>">
                  </div>
               </div>
               <div class="row mb-4">
                  <div class="form-group col">
                     <label for="inputAddress2">Email</label>
                     <input type="email" class="form-control" name="email" value="<?php echo $dt->email; ?>">
                  </div>
               </div>
               <div class="row mb-4">
                  <div class="form-group col">
                     <label for="inputAddress2">Telepon</label>
                     <input type="number" class="form-control" name="phone" value="<?php echo $dt->phone; ?>">
                  </div>
               </div>               

               <hr class="dotted tall">

               <h4 class="mb-3 font-weight-semibold text-dark">Ubah Kata Sandi</h4>
               <div class="row">
                  <div class="form-group col-md-6">
                     <label for="inputPassword4">Kata Sandi Baru</label>
                     <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <div class="form-group col-md-6 border-top-0 pt-0">
                     <label for="inputPassword5">Konfirmasi Kata Sandi</label>
                     <input type="password" class="form-control" name="konfirmasipassword" placeholder="Password">
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12 text-end mt-3">
                     <button type="submit" class="btn btn-primary">Ubah Profil</button>
                  </div>
               </div>

            </form>
            <?php endforeach; ?>
         </div>
      </section>

         
   <!-- end: page -->
</section>