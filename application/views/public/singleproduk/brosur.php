<div role="main" class="main">

   <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
      <div class="container">
         <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
               <h1 class="font-weight-bold text-dark">Brosur - Flyer Digital Printing</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
               <ul class="breadcrumb d-block text-center">
                  <li><a href="#">Beranda</a></li>
                  <li class="active">Brosur - Flyer Digital Printing</li>
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
                  <li>Brosur - Flyer Digital Printing</li>
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
                        <img alt="" class="img-fluid" src="<?php echo base_url('public/productimages/' . $pi->image); ?>" data-zoom-image="<?php echo base_url('public/productimages/' . $pi->image); ?>">
                     </div>
                  <?php endforeach; ?>
                  <?php } else { ?>
                     <div>
                        <img alt="" class="img-fluid" src="<?php echo base_url($public_dir); ?>/img/products/product-grey-7.jpg" data-zoom-image="<?php echo base_url($public_dir); ?>/img/products/product-grey-7.jpg">
                     </div>
                  <?php } ?>
                  </div>
                  <div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
                  <?php if($produkimage) { ?>
                  <?php foreach ($produkimage as $pith) : ?>
                     <div class="cur-pointer">
                        <img alt="" class="img-fluid" src="<?php echo base_url('public/productimages/' . $pith->image); ?>">
                     </div>
                  <?php endforeach; ?>
                  <?php } else { ?>
                     <div class="cur-pointer">
                        <img alt="" class="img-fluid" src="<?php echo base_url($public_dir); ?>/img/products/product-grey-7.jpg">
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
                  <?php foreach ($detailbrosur as $info) : ?>
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
            <?php foreach ($detailbrosur as $data) : ?>
               <div class="summary entry-summary position-relative">                

                  <h1 class="mb-0 font-weight-bold text-7"><?php echo $data->name; ?></h1>                  
                  <form enctype="multipart/form-data" method="post" class="cart" action="<?php echo base_url('Cart/addbrosur'); ?>">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                  <input type="hidden" class="form-control" name="product_id" value="<?php echo $data->id_product; ?>" readonly>

                  <div class="pb-0 clearfix d-flex align-items-center">
                     <div title="Rated 3 out of 5" class="float-start">
                        <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                     </div>                     
                  </div>                                   

                  <p class="price mb-3">
                     <span class="sale text-color-dark"><?php echo rupiah($data->baseprice); ?></span>                     
                  </p>                  
                  <span>Harga diatas adalah harga 50 lembar, Ukuran sesuai yang dipilih</span><br>                  

                  <div class="divider divider-small">
                     <hr class="bg-color-grey-scale-4">
                  </div>

                  <div class="form-group row">
                     <label class="col-lg-3 control-label text-lg-start pt-2">Pilih Ukuran Kertas</label>
                     <div class="col-lg-7">
                        <select class="form-control" id="ukurankertas" name="ukurankertas" required oninvalid="this.setCustomValidity('Mohon pilih Ukuran Kertas')" oninput="setCustomValidity('')" onchange="calculateprice()">
                           <option value="" selected>-- Pilih Ukuran Kertas --</option>
                           <?php foreach ($ukuran as $uk) { ?>
                              <option value="<?php echo $uk->id_size; ?>" data-ukuran="<?php echo $uk->add_price; ?>"><?php echo $uk->size; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="col-lg-3 control-label text-lg-start pt-2 text-2">Pilih Muka</label>
                     <div class="col-lg-7">
                        <select class="form-control" id="jenismuka" name="jenismuka" required oninvalid="this.setCustomValidity('Mohon pilih Jenis Muka')" oninput="setCustomValidity('')" onchange="calculateprice()">
                           <option value="" selected>-- Pilih Jenis Muka --</option>
                           <?php foreach ($muka as $mu) { ?>
                              <option value="<?php echo $mu->id_facetype; ?>" data-muka="<?php echo $mu->add_price; ?>"><?php echo $mu->facetype; ?></option>
                           <?php } ?>
                        </select>
                     </div>                     
                  </div>

                  <div class="form-group row">
                     <label class="col-lg-3 control-label text-lg-start pt-2">Pilih Laminasi</label>
                     <div class="col-lg-7">
                        <select class="form-control" id="jenislaminasi" name="jenislaminasi" required oninvalid="this.setCustomValidity('Mohon pilih Jenis Laminasi')" oninput="setCustomValidity('')" onchange="calculateprice()">
                           <option value="" selected>-- Pilih Laminasi --</option>
                           <?php foreach ($laminasi as $lam) { ?>
                              <option value="<?php echo $lam->id_lamination; ?>" data-laminasi="<?php echo $lam->add_price; ?>"><?php echo $lam->lamination; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="col-lg-3 control-label text-lg-start pt-2">Finishing</label>
                     <div class="col-lg-7">
                        <select class="form-control" id="jenisfinishing" name="jenisfinishing" required oninvalid="this.setCustomValidity('Mohon pilih Finishing')" oninput="setCustomValidity('')" onchange="calculateprice()">
                           <option value="" selected>-- Pilih Jenis Finishing --</option>
                           <?php foreach ($finishing as $fis) { ?>
                              <option value="<?php echo $fis->id_finishing; ?>" data-finishing="<?php echo $fis->add_price; ?>"><?php echo $fis->finishing; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="col-lg-3 control-label text-lg-start pt-2">Upload File</label>
                     <div class="col-lg-7">
                        <input type="file" class="form-control" name="filecontoh" required oninvalid="this.setCustomValidity('Mohon upload file contoh')" oninput="setCustomValidity('')" onchange="calculateprice()">
                        <span class="text-1 text-danger">*Ukuran File maksimal 5Mb.</span>
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="col-lg-3 control-label text-lg-start pt-2">Keterangan</label>
                     <div class="col-lg-7">
                        <textarea maxlength="3000" rows="3" class="form-control text-3 h-auto py-2" name="keterangan"></textarea>
                     </div>
                  </div>

                  <input type="hidden" class="form-control" id="baseprice">
                  <p class="price mb-3">
                     <span class="sale text-color-dark" style="margin-right: 5px;">Rp.</span><span class="sale text-color-dark" id="totalPrice"><?php echo $data->baseprice; ?></span>
                     <input type="hidden" class="form-control" name="price" id="price">
                  </p>

                  <?php endforeach; ?>
                  <p class="form-label mb-1 text-2">Jumlah Pesanan</p> 
                  <div class="quantity quantity-lg">                                          
                     <input type="number" class="form-control" id="quantity" name="quantity" min="1" onchange="calculateTotal()" onkeyup="calculateTotal()">
                  </div>
                  <button type="submit" class="btn btn-dark btn-modern text-uppercase bg-color-hover-primary border-color-hover-primary">Tambah ke Keranjang</button>
                  
                  
                  <hr>
                  </form>                 

               </div>

            </div>
         </div>
               

         <hr class="my-5">
         
      </div>

   </div>


</div>

<script>   
   var pricedefault = 0;
   var jenismuka = 0;
   var jenislaminasi = 0;
   var jenisfinishing = 0;

   function calculateprice() {
      $('#quantity').val('');
      // Get the quantity value            
      var pricedefault = $('#ukurankertas').find(':selected').data('ukuran');

      var jenismuka = $('#jenismuka').find(':selected').data('muka');
      var jenislaminasi = $('#jenislaminasi').find(':selected').data('laminasi');
      var jenisfinishing = $('#jenisfinishing').find(':selected').data('finishing');
      
      // Calculate the total price    
      var pricechoice = pricedefault + jenismuka + jenislaminasi + jenisfinishing;
      // Update the total price display      
      document.getElementById('baseprice').value = pricechoice;
      document.getElementById('totalPrice').innerText = pricechoice;
   }
</script>

<script>
   var pricePerItem = 0;
   var quantity = 0;
   function calculateTotal() {
      // Get the quantity value            
      var quantity = parseInt(document.getElementById('quantity').value);
      // Assuming the price per item is $10, you can replace this with the actual price
      var pricePerItem = parseInt(document.getElementById('baseprice').value);
      // Calculate the total price    
      var totalPrice = quantity * pricePerItem;      
      // Update the total price display
      document.getElementById('totalPrice').innerText = totalPrice;

      document.getElementById('price').value = totalPrice;
   }
</script>