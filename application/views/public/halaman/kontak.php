<div role="main" class="main">

   <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
      <div class="container">
         <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
               <h1 class="font-weight-bold text-dark">Kontak Kami</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
               <ul class="breadcrumb d-block text-center">
                  <li><a href="#">Beranda</a></li>
                  <li class="active">Kontak Kami</li>
               </ul>
            </div>
         </div>
      </div>
   </section>
   <div class="container py-4">

      <div class="row mb-2">
         <div class="col">

            <h2 class="font-weight-bold text-7 mt-2 mb-0">Kontak Kami</h2>            
            <form class="contact-form-recaptcha-v3" action="php/contact-form-recaptcha-v3.php" method="POST">
               <div class="contact-form-success alert alert-success d-none mt-4">
                  <strong>Berhasil!</strong> Pesan anda telah dikirimmkan kepada Kami.
               </div>

               <div class="contact-form-error alert alert-danger d-none mt-4">
                  <strong>Gagal!</strong> Terjadi kesalahan saat mengirimkan pesan.
                  <span class="mail-error-message text-1 d-block"></span>
               </div>

               <div class="row">
                  <div class="form-group col-lg-6">
                     <label class="form-label mb-1 text-2">Nama Lengkap</label>
                     <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" name="name" required>
                  </div>
                  <div class="form-group col-lg-6">
                     <label class="form-label mb-1 text-2">Email</label>
                     <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="email" required>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label mb-1 text-2">Subjek</label>
                     <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="subject" required>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label mb-1 text-2">Pesan</label>
                     <textarea maxlength="5000" data-msg-required="Please enter your message." rows="5" class="form-control text-3 h-auto py-2" name="message" required></textarea>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col">
                     <input type="submit" value="Kirim Pesan" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                  </div>
               </div>
            </form>

         </div>
      </div>
      <div class="row mb-5">
         <div class="col-lg-4">

            <h4 class="pt-5"><strong>Kantor</strong> Kami</h4>
            <ul class="list list-icons list-icons-style-3 mt-2">
               <li><i class="fas fa-map-marker-alt top-6"></i> <strong>Alamat:</strong> Jl. Tersono - Limpung No.016 Desa Babadan Kecamatan Limpung-Batang</li>
               <li><i class="fas fa-phone top-6"></i> <strong>Telepon:</strong> + (62)82220037640</li>
               <li><i class="fas fa-envelope top-6"></i> <strong>Email:</strong> <a href="lestarifrafika99@gmail.com">lestarifrafika99@gmail.com</a></li>
            </ul>

         </div>
         <div class="col-lg-4 offset-lg-1 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800" data-plugin-options="{'accY': -200}">

            <h4 class="pt-5">Jam <strong>Buka</strong></h4>
            <ul class="list list-icons list-dark mt-2">
               <li><i class="far fa-clock top-6"></i> Senin - Kamis : 09:00 s.d 18:00</li>
               <li><i class="far fa-clock top-6"></i> Jumat : 08:00 S.d 11.30</li>
               <li><i class="far fa-clock top-6"></i> Sabtu : 09:00 s.d 17.00</li>
               <li><i class="far fa-clock top-6"></i> Minggu : Tutup</li>
            </ul>
         </div>
      </div>
   </div>
</div>