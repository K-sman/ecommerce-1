<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah model undangan dipilih
    if (empty($_POST["model_undangan"])) {
        echo "<script>alert('Silakan pilih model undangan.');</script>";
    } else {
        // Lanjutkan dengan proses yang lain, seperti menyimpan ke database atau lainnya
        $modelUndangan = $_POST["model_undangan"];
        echo "<p>Model undangan yang dipilih: $modelUndangan</p>";
    }
}
?>
<div role="main" class="main">

   <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
      <div class="container">
         <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
               <h1 class="font-weight-bold text-dark">Pesan Undangan</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
               <ul class="breadcrumb d-block text-center">
                  <li><a href="#">Beranda</a></li>
                  <li class="active">Pesan Undangan</li>
               </ul>
            </div>
         </div>
      </div>
   </section>

   <div role="main" class="main shop pt-4">

      <div class="container">

         <div class="row">
            <div class="col">
               <ul class="breadcrumb breadcrumb-style-2 d-block text-4 mb-4">
                  <li><a href="<?php echo base_url(); ?>" class="text-color-default text-color-hover-primary text-decoration-none">Beranda</a></li>
                  <li><a href="javascript:void(0)" class="text-color-default text-color-hover-primary text-decoration-none">Produk</a></li>
                  <li>Pesan Undangan</li>
               </ul>
            </div>
         </div>
         <div class="row">
            <div class="col-md-5 mb-5 mb-md-0">

               <div class="thumb-gallery-wrapper">
                  <div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
                  <?php if($produkimage) { ?>
                  <?php foreach ($produkimage as $pi) : ?>
                     <div>
                        <img alt="<?php echo $pi->description; ?>" title="<?php echo $pi->description; ?>" class="img-fluid" src="<?php echo base_url('public/productimages/' . $pi->image); ?>" data-zoom-image="<?php echo base_url('public/productimages/' . $pi->image); ?>">
                     </div>
                  <?php endforeach; ?>
                  <?php } else { ?>
                     <div>
                        <img class="img-fluid" src="<?php echo base_url($public_dir); ?>/img/products/product-grey-7.jpg" data-zoom-image="<?php echo base_url($public_dir); ?>/img/products/product-grey-7.jpg">
                     </div>
                  <?php } ?>
                  </div>
                  <div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
                  <?php if($produkimage) { ?>
                  <?php foreach ($produkimage as $pith) : ?>
                     <div class="cur-pointer text-center">
                        <img alt="<?php echo $pith->description; ?>" title="<?php echo $pith->description; ?>" class="img-fluid" src="<?php echo base_url('public/productimages/' . $pith->image); ?>">
                        <span><?php echo $pith->description; ?></span>
                     </div>
                  <?php endforeach; ?>
                  <?php } else { ?>
                     <div class="cur-pointer">
                        <img class="img-fluid" src="<?php echo base_url($public_dir); ?>/img/products/product-grey-7.jpg">
                     </div>
                  <?php } ?>
                  </div>
               </div>

               <div class="row mb-4">
            <div class="col">
               <div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
                  <ul class="nav nav-tabs justify-content-start">
                     <li class="nav-item"><a class="nav-link active font-weight-bold text-3 text-uppercase py-2 px-3" href="#productDescription" data-bs-toggle="tab">Deskripsi</a></li>
                     <li class="nav-item"><a class="nav-link font-weight-bold text-3 text-uppercase py-2 px-3" href="#productInfo" data-bs-toggle="tab">Informasi</a></li>                     
                  </ul>
                  <div class="tab-content p-0">
                  <?php foreach ($detailundangan as $info) : ?>
                     <div class="tab-pane px-0 py-3 active" id="productDescription">
                        <?php echo $info->description; ?>
                     </div>
                     <div class="tab-pane px-0 py-3" id="productInfo">
                        <?php echo $info->information; ?>
                     </div>
                  <?php endforeach; ?>                    
                  </div>
               </div>
            </div>
         </div>

            </div>

            <div class="col-md-7">
            <?php foreach ($detailundangan as $data) : ?>
               <div class="summary entry-summary position-relative">
                  <h1 class="mb-0 font-weight-bold text-7">Pesan Undangan</h1>                  
                  <form enctype="multipart/form-data" method="post" class="cart" action="<?php echo base_url('Cart/addundangan'); ?>">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                  <input type="hidden" class="form-control" name="product_id" value="<?php echo $data->id_product; ?>" readonly>
                  <div class="pb-0 clearfix d-flex align-items-center">
                     <div title="Rated 3 out of 5" class="float-start">
                        <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                     </div>                     
                  </div>

                  <div class="custom-select-1">
                     <select name="model_undangan" class="form-control form-select text-3 h-auto py-2" style="width: 50%;">
                        <option value="" selected>Pilih Model Undangan</option>
                        <?php foreach ($produkimage as $img) { ?>
                              <option value="<?php echo $img->id_image; ?>"><?php echo $img->description; ?></option>
                           <?php } ?>
                     </select>
                  </div>

                  <p class="text-3-5 mb-3"><?php echo $data->description; ?></p>

                  <p class="price mb-3">
                     <span class="sale text-color-dark"><?php echo rupiah($data->baseprice); ?></span>
                     <input type="hidden" class="form-control" id="baseprice" value="<?php echo $data->baseprice; ?>">
                  </p>

                  <div class="divider divider-small">
                     <hr class="bg-color-grey-scale-4">
                  </div>

                  <p class="text-3-5 mb-3">Silahkan isi Data Pengantin, Akad Nikah dan Resepsi dibawah ini.</p>


                  <div class="row">
                     <div class="form-group col-lg-6">
                        <p class="mb-1 text-2 text-2" style="font-weight: bold;">Calon Mempelai Wanita</p>
                        <label class="form-label mb-1 text-2">Nama Lengkap</label>
                        <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" name="nama_wanita" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Mempelai Wanita')" oninput="setCustomValidity('')">

                        <label class="form-label mb-1 text-2">Nama Panggilan</label>
                        <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" name="panggilan_wanita" required oninvalid="this.setCustomValidity('Mohon isi Nama Panggila Mempelai Wanita')" oninput="setCustomValidity('')">

                        <label class="form-label mb-1 text-2">Nama Lengkap Ayah</label>
                        <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" name="ayah_wanita" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Ayah Mempelai Wanita')" oninput="setCustomValidity('')">

                        <label class="form-label mb-1 text-2">Nama Lengkap Ibu</label>
                        <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" name="ibu_wanita" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Ibu Mempelai Wanita')" oninput="setCustomValidity('')">

                        <label class="form-label mb-1 text-2">Alamat Orang Tua (Ayah & Ibu)</label>
                        <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" name="alamat_wanita" required oninvalid="this.setCustomValidity('Mohon isi Alamat Orang Tua Mempelai Wanita')" oninput="setCustomValidity('')">                        

                     </div>
                     <div class="form-group col-lg-6">
                        <p class="mb-1 text-2 text-2" style="font-weight: bold;">Calon Mempelai Pria</p>
                        <label class="form-label mb-1 text-2">Nama Lengkap</label>
                        <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" name="nama_pria" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Mempelai Pria')" oninput="setCustomValidity('')">

                        <label class="form-label mb-1 text-2">Nama Panggilan</label>
                        <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" name="panggilan_pria" required oninvalid="this.setCustomValidity('Mohon isi Nama Panggila Mempelai Pria')" oninput="setCustomValidity('')">

                        <label class="form-label mb-1 text-2">Nama Lengkap Ayah</label>
                        <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" name="ayah_pria" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Ayah Mempelai Pria')" oninput="setCustomValidity('')">

                        <label class="form-label mb-1 text-2">Nama Lengkap Ibu</label>
                        <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" name="ibu_pria" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Ibu Mempelai Pria')" oninput="setCustomValidity('')">

                        <label class="form-label mb-1 text-2">Alamat Orang Tua (Ayah & Ibu)</label>
                        <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" name="alamat_pria" required oninvalid="this.setCustomValidity('Mohon isi Alamat Orang Tua Mempelai Pria')" oninput="setCustomValidity('')">
                     </div>
                  </div>

                  <p class="mb-1 text-2 text-2" style="font-weight: bold;">Akad Nikah</p>
                  <div class="row">
                     <div class="form-group col-3">
                        <label class="form-label mb-1 text-2">Tanggal</label>                  
                     </div>
                     <div class="form-group col-3">
                        <label class="form-label mb-1 text-2">Waktu</label>                  
                     </div>
                     <div class="form-group col-6">
                        <label class="form-label mb-1 text-2">Tempat Akad</label>
                     </div>
                  </div>
                  <div class="row">                  
                     <div class="form-group col-md-3">
                        <input type="date"class="form-control text-3 h-auto py-2" name="tanggalakad" required oninvalid="this.setCustomValidity('Mohon pilih Tanggal Akad')" oninput="setCustomValidity('')">
                     </div>
                     <div class="form-group col-md-3">
                        <input type="time"class="form-control text-3 h-auto py-2" name="jamakad" required oninvalid="this.setCustomValidity('Mohon isi Waktu Akad')" oninput="setCustomValidity('')">
                     </div>
                     <div class="form-group col-md-6">                        
                        <textarea maxlength="3000" rows="2" class="form-control text-3 h-auto py-2" name="tempatakad" required oninvalid="this.setCustomValidity('Mohon isi Tempat Akad')" oninput="setCustomValidity('')"></textarea>
                     </div>                     
                  </div>

                  <p class="mb-1 text-2 text-2" style="font-weight: bold;">Resepsi</p>
                  <div class="row">
                     <div class="form-group col-3">
                        <label class="form-label mb-1 text-2">Tanggal</label>                  
                     </div>
                     <div class="form-group col-3">
                        <label class="form-label mb-1 text-2">Waktu</label>                  
                     </div>
                     <div class="form-group col-6">
                        <label class="form-label mb-1 text-2">Tempat Resepsi</label>
                     </div>
                  </div>
                  <div class="row">                     
                     <div class="form-group col-md-3">
                        <input type="date"class="form-control text-3 h-auto py-2" name="tanggalresepsi" required oninvalid="this.setCustomValidity('Mohon pilih Tanggal Resepsi')" oninput="setCustomValidity('')">
                     </div>
                     <div class="form-group col-md-3">
                        <input type="time"class="form-control text-3 h-auto py-2" name="jamresepsi" required oninvalid="this.setCustomValidity('Mohon isi Waktu Resepsi')" oninput="setCustomValidity('')">
                     </div>
                     <div class="form-group col-md-6">                        
                        <textarea maxlength="3000" rows="2" class="form-control text-3 h-auto py-2" name="tempatresepsi" required oninvalid="this.setCustomValidity('Mohon isi Tempat Resepsi')" oninput="setCustomValidity('')"></textarea>
                     </div>                     
                  </div>

                  <p class="mb-1 text-2 text-2" style="font-weight: bold;">Turut Mengundang</p>
                  <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" placeholder="1." name="turut1">
                  <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" placeholder="2." name="turut2">
                  <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" placeholder="3." name="turut3">
                  <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" placeholder="4." name="turut4">
                  <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" placeholder="5." name="turut5">
                  <hr>

                  <p class="price mb-3">
                     <span class="sale text-color-dark" style="margin-right: 5px;">Rp.</span><span class="sale text-color-dark" id="totalPrice"><?php echo $data->baseprice; ?></span>
                     <input type="hidden" class="form-control" name="price" id="price">
                  </p>

                  <?php endforeach; ?>
                  
                  <p class="form-label mb-1 text-2">Jumlah Pesanan</p> 
                  <div class="quantity quantity-lg">                                          
                     <input type="number" class="form-control" id="quantity" name="quantity" min="1" onkeyup="calculateTotal()" onchange="calculateTotal()">
                  </div>

                  <button type="submit" class="btn btn-dark btn-modern text-uppercase bg-color-hover-primary border-color-hover-primary">Tambah Ke Keranjang</button>
                                    
                  <hr>
                  </form>                 

               </div>

            </div>
         </div>
                  

         <hr class="my-5">
         
      </div>

   </div>


   
   <script>
       // Mendapatkan tanggal hari ini dalam format yang sesuai
       var today = new Date();
       var day = String(today.getDate()).padStart(2, '0');
       var month = String(today.getMonth() + 1).padStart(2, '0'); // Januari = 0
       var year = today.getFullYear();
       var todayDate = year + '-' + month + '-' + day;

       // Mengatur nilai atribut 'min' pada input tanggal
       document.getElementsByName("tanggalakad")[0].setAttribute('min', todayDate);
       document.getElementsByName("tanggalresepsi")[0].setAttribute('min', todayDate);

       // Fungsi untuk menghitung total harga
       function calculateTotal() {
           var quantity = parseInt(document.getElementById('quantity').value) || 0;
           var pricePerItem = parseInt(document.getElementById('baseprice').value) || 0;

           var totalPrice = quantity * pricePerItem;

           // Update the total price display
           document.getElementById('totalPrice').textContent = totalPrice.toLocaleString('id-ID');
           document.getElementById('price').value = totalPrice;
       }

       // Menjalankan kalkulasi awal saat halaman dimuat
       calculateTotal();
   </script>
</div>