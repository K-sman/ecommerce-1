<!-- start: header -->
<header class="header">
   <div class="logo-container">
      <a href="<?php echo base_url('Admin'); ?>" class="logo">
         <img width="135" height="40" src="<?php echo base_url($public_dir); ?>/images/lestariprinting.png">
      </a>

      <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
         <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
      </div>

   </div>

   <!-- start: search & user box -->
   <div class="header-right">                

      <span class="separator"></span>

      <div id="userbox" class="userbox">
         <a href="#" data-bs-toggle="dropdown">
            <figure class="profile-picture">
               <img src="<?php echo base_url($admin_dir); ?>/img/!logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
            </figure>
            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
               <span class="name"><?php echo $this->session->userdata('name'); ?></span>
               <span class="role">Admin</span>
            </div>

            <i class="fa custom-caret"></i>
         </a>

         <div class="dropdown-menu">
            <ul class="list-unstyled mb-2">
               <li class="divider"></li>
               <li>
                  <a role="menuitem" tabindex="-1" href="<?php echo base_url('Admin/profile'); ?>"><i class="bx bx-user-circle"></i> Profil Saya</a>
               </li>             
               <li>
                  <a role="menuitem" tabindex="-1" href="<?php echo base_url('Login/signout'); ?>"><i class="bx bx-power-off"></i> Keluar</a>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <!-- end: search & user box -->
</header>
<!-- end: header -->
<div class="inner-wrapper">