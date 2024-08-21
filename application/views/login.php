
<!doctype html>
<html class="fixed">
<head>
   <!-- Basic -->
   <meta charset="UTF-8">
   <title>Masuk | Lestari Printing</title>	   
   <link rel="shortcut icon" href="<?php echo base_url($public_dir); ?>/images/favicon.png" type="image/x-icon" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

   <!-- Web Fonts  -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

   <!-- Vendor CSS -->
   <link rel="stylesheet" href="<?php echo base_url($admin_dir); ?>/vendor/bootstrap/css/bootstrap.css" />
   <link rel="stylesheet" href="<?php echo base_url($admin_dir); ?>/vendor/animate/animate.compat.css">
   <link rel="stylesheet" href="<?php echo base_url($admin_dir); ?>/vendor/font-awesome/css/all.min.css" />
   <link rel="stylesheet" href="<?php echo base_url($admin_dir); ?>/vendor/boxicons/css/boxicons.min.css" />
   <link rel="stylesheet" href="<?php echo base_url($admin_dir); ?>/vendor/magnific-popup/magnific-popup.css" />
   <link rel="stylesheet" href="<?php echo base_url($admin_dir); ?>/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

   <!-- Theme CSS -->
   <link rel="stylesheet" href="<?php echo base_url($admin_dir); ?>/css/theme.css" />

   <!-- Skin CSS -->
   <link rel="stylesheet" href="<?php echo base_url($admin_dir); ?>/css/skins/default.css" />

   <!-- Theme Custom CSS -->
   <link rel="stylesheet" href="<?php echo base_url($admin_dir); ?>/css/custom.css">

   <!-- Head Libs -->
   <script src="<?php echo base_url($admin_dir); ?>/vendor/modernizr/modernizr.js"></script>

</head>
<body>
   <!-- start: page -->
   <section class="body-sign">
      <div class="center-sign">      
         <div class="panel card-sign">           
            <div class="card-body">
               <a href="<?php echo base_url(); ?>" class="logo float-left">
                  <img height="70" src="<?php echo base_url($public_dir); ?>/images/lestariprinting.png">
               </a>
               <form action="<?php echo base_url('Login/signin'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                  <div class="form-group">
                     <label>Nama Pengguna</label>
                     <div class="input-group">
                        <input name="username" type="text" name="username" class="form-control" placeholder="Silahkan Masukkan Username Anda" autocomplete="off" required oninvalid="this.setCustomValidity('Mohon isi Username Anda')" oninput="setCustomValidity('')" />
                        <span class="input-group-text">
                           <i class="bx bx-user text-4"></i>
                        </span>
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="clearfix">
                        <label class="float-left">Kata Sandi</label>                        
                     </div>
                     <div class="input-group">
                        <input id="password" type="password" name="password" class="form-control" placeholder="Silahkan Masukkan Password Anda" autocomplete="off" required oninvalid="this.setCustomValidity('Mohon isi Password Anda')" oninput="setCustomValidity('')" />
                        <span class="input-group-text">
                           <i class="bx bx-lock text-4"></i>
                        </span>
                     </div>
                  </div>

                  
                  <div class="col-sm-12 text-end">
                     <div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md pull-right">
                        <input type="checkbox" id="showpass">
                        <label for="showpass">Lihat Kata Sandi</label>
                     </div>
                  </div> 

                  <span class="mt-5 line-thru text-center text-uppercase">
                     <span>&nbsp;</span>
                  </span>
                  
                  <div class="row">
                     <button type="submit" class="btn btn-primary btn-lg btn-block mt-lg">Masuk</button>                                             
                  </div>

                  <span class="line-thru text-center text-uppercase">
                     <span>&nbsp;</span>
                  </span>                  
                  
                  <span class="mt-lg mb-lg">&nbsp;</span>
                  <p class="mt-lg mb-lg text-center">&copy; Copyright 2023. LESTARI PRINTING. All Rights Reserved.</p>                  

               </form>
            </div>
         </div>         
      </div>
   </section>
		<!-- end: page -->

		<!-- Vendor -->
<script src="<?php echo base_url($admin_dir); ?>/vendor/jquery/jquery.js"></script>
<script src="<?php echo base_url($admin_dir); ?>/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?php echo base_url($admin_dir); ?>/vendor/popper/umd/popper.min.js"></script>
<script src="<?php echo base_url($admin_dir); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url($admin_dir); ?>/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url($admin_dir); ?>/vendor/common/common.js"></script>
<script src="<?php echo base_url($admin_dir); ?>/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?php echo base_url($admin_dir); ?>/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="<?php echo base_url($admin_dir); ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url($admin_dir); ?>/js/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url($admin_dir); ?>/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url($admin_dir); ?>/js/theme.init.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
      $('#showpass').click(function() {
            if ($(this).is(':checked')) {
               $('#password').attr('type', 'text');
            } else {
               $('#password').attr('type', 'password');
            }
      });
   });
</script>

</body>
</html>