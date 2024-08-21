<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
</div>
<footer id="footer" class="bg-color-primary border-top-0">
   <div class="container py-4">
      <div class="row py-5">
         <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">            
            <a href="<?php echo base_url(); ?>">
               <img width="230" height="80" src="<?php echo base_url($public_dir); ?>/images/lestariprinting.png">
            </a>
            <p class="pe-1 text-color-light">Melayani semua kebutuhan digital dan offset printing. Dari Mulai setting, produksi hingga finishing.</p>
            <div class="alert alert-success d-none" id="newsletterSuccess">
               <strong>Success!</strong> You've been added to our email list.
            </div>
            <div class="alert alert-danger d-none" id="newsletterError"></div>
            <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST" class="me-4 mb-3 mb-md-0">
               <div class="input-group input-group-rounded">
                  <input class="form-control form-control-sm bg-light" placeholder="Alamat Email" name="newsletterEmail" id="newsletterEmail" type="email">
                  <button class="btn btn-light text-color-dark" type="submit"><strong>SUBSCRIBE!</strong></button>
               </div>
            </form>
         </div>
         <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h5 class="text-3 mb-3 opacity-7">TENTANG KAMI</h5>            
               <a href="<?php echo base_url(); ?>"><p class="m-0 text-color-light">Produk</p></a>
               <a href="<?php echo base_url(); ?>"><p class="m-0 text-color-light">Blog</p></a>
               <a href="<?php echo base_url(); ?>"><p class="m-0 text-color-light">Tentang Kami</p></a>
               <a href="<?php echo base_url(); ?>"><p class="m-0 text-color-light">Berita & Artikel</p></a>
            </ul>
         </div>
         <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
            <h5 class="text-3 mb-3 opacity-7">KONTAK KAMI</h5>
            <ul class="list list-icons list-icons-lg">
               <li class="mb-1"><i class="far fa-dot-circle text-color-light"></i><p class="m-0"><a class="text-color-light" href="https://maps.app.goo.gl/CQj3uaar4TQcKhGG9?g_st=ac">Jl. Limpung - Tersono no. 16, Kab.Batang - Jawa Tengah</a></p></li>
               <li class="mb-1"><i class="fab fa-whatsapp text-color-light"></i><p class="m-0"><a class="text-color-light" href="https://wa.me/6282325140539">+62-823-2514-0539</a></p></li>
               <li class="mb-1"><i class="far fa-envelope text-color-light"></i><p class="m-0"><a class="text-color-light" href="mailto:lestarigrafika99@gmail.com">Lestarigrafika99@gmail.com</a></p></li>
            </ul>
         </div>
         <div class="col-md-6 col-lg-2">
            <h5 class="text-3 mb-3 opacity-7">IKUTI KAMI</h5>
            <ul class="header-social-icons social-icons">
               <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f text-2"></i></a></li>
               <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter text-2"></i></a></li>
               <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in text-2"></i></a></li>
               <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram text-2"></i></a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="footer-copyright bg-color-primary bg-color-scale-overlay bg-color-scale-overlay-1">
      <div class="bg-color-scale-overlay-wrapper">
         <div class="container py-2">
            <div class="row py-4">               
               <div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                  <p class="text-color-light">© Copyright 2023. <img width="20px" src="<?php echo base_url($public_dir); ?>/images/favicon.png"> LESTARI PRINTING. All Rights Reserved.</p>
               </div>
               <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                  <nav id="sub-menu">
                     <ul>
                        <li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="#" class="ms-1 text-decoration-none text-color-light"> FAQ's</a></li>
                        <li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="#" class="ms-1 text-decoration-none text-color-light"> Sitemap</a></li>
                        <li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="#" class="ms-1 text-decoration-none text-color-light"> Kontak</a></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
</div>


<!-- Vendor -->
<script src="<?php echo base_url($public_dir); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/jquery.cookie/jquery.cookie.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/jquery.validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/lazysizes/lazysizes.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/isotope/jquery.isotope.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/vide/jquery.vide.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/vivus/vivus.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/jquery.countdown/jquery.countdown.min.js"></script>
<script src="<?php echo base_url($public_dir); ?>/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url($public_dir); ?>/js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="<?php echo base_url($public_dir); ?>/js/views/view.shop.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url($public_dir); ?>/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url($public_dir); ?>/js/theme.init.js"></script>

<!-- Examples -->
<script src="<?php echo base_url($public_dir); ?>/js/examples/examples.gallery.js"></script>	

</body>
</html>