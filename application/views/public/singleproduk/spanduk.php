<div role="main" class="main">

   <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
      <div class="container">
         <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
               <h1 class="font-weight-bold text-dark">Spanduk - Banner - Baliho</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
               <ul class="breadcrumb d-block text-center">
                  <li><a href="#">Beranda</a></li>
                  <li class="active">Spanduk-Banner-Baliho</li>
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
                  <li>Spanduk-Banner-Baliho</li>
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
                           <?php foreach ($detailspanduk as $info) : ?>
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
               <?php foreach ($detailspanduk as $data) : ?>
               <div class="summary entry-summary position-relative">                

                  <h1 class="mb-0 font-weight-bold text-7"><?php echo $data->name; ?></h1>                  
                  <form enctype="multipart/form-data" method="post" class="cart" action="<?php echo base_url('Cart/addspanduk'); ?>">
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                     <input type="hidden" class="form-control" name="product_id" value="<?php echo $data->id_product; ?>" readonly>

                     <div class="pb-0 clearfix d-flex align-items-center">
                        <div title="Rated 3 out of 5" class="float-start">
                           <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                        </div>                     
                     </div>                                   

                     <p class="price mb-3">
                        <span class="sale text-color-dark"><?php echo rupiah($data->baseprice); ?></span>
                        <input type="hidden" class="form-control" id="pricedefault" value="<?php echo $data->baseprice; ?>">
                     </p>

                     <p class="text-3-5 mb-3">Harga Print Spanduk - Banner :</p>

                     <table style="border: 1px solid black; width: 85%;">
                        <tbody>
                           <tr style="border: 1px solid black; background-color: #dcdddd;">
                              <th style="text-align: center; border: 1px solid black;">Bahan</th>
                              <th style="text-align: center; border: 1px solid black;">Harga /m2</th>
                           </tr>
                           <tr style="border: 1px solid black;">
                              <td style="text-align: center; border: 1px solid black;">Frontlite 280gr</td>
                              <td style="text-align: center; border: 1px solid black;">17.000</td>
                           </tr>
                           <tr style="border: 1px solid black;">
                              <td style="text-align: center; border: 1px solid black;">Frontlite 340gr</td>
                              <td style="text-align: center; border: 1px solid black;">21.000</td>
                           </tr>
                           <tr style="border: 1px solid black;">
                              <td style="text-align: center; border: 1px solid black;">Frontlite 440</td>
                              <td style="text-align: center; border: 1px solid black;">49.000</td>
                           </tr>
                        </tbody>
                     </table>

                     <div class="divider divider-small">
                        <hr class="bg-color-grey-scale-4">
                     </div>

                     <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-start pt-2">Pilih Bahan</label>
                        <div class="col-lg-7">
                           <select class="form-control" id="bahanspanduk" name="bahanspanduk" required oninvalid="this.setCustomValidity('Mohon pilih bahan spanduk')" oninput="setCustomValidity('')" onchange="calculateprice()">
                              <option value="" selected>-- Pilih Bahan --</option>
                              <?php foreach ($bahan as $ba) { ?>
                                 <option value="<?php echo $ba->id_material; ?>" data-bahan="<?php echo $ba->add_price; ?>"><?php echo $ba->material; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-start pt-2">Ukuran Spanduk</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" id="lebar" name="lebar" placeholder="lebar" required oninvalid="this.setCustomValidity('Mohon isi lebar spanduk')" oninput="setCustomValidity('')" onchange="calculateprice()">
                        </div>
                        <div class="col-lg-4">
                           <input type="text" class="form-control" id="panjang" name="panjang" placeholder="panjang" required oninvalid="this.setCustomValidity('Mohon isi panjang spanduk')" oninput="setCustomValidity('')" onchange="calculateprice()">
                        </div>
                        <div class="col-lg-7 offset-lg-3">
                           <span class="text-1">Decimal bisa diisi dengan koma (,)</span>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-start pt-2">Pilih Finishing</label>
                        <div class="col-lg-7">
                           <select class="form-control" id="finishingspanduk" name="finishingspanduk" required oninvalid="this.setCustomValidity('Mohon pilih Finishing spanduk')" oninput="setCustomValidity('')" onchange="calculateprice()">
                              <option value="" selected>-- Pilih Finishing --</option>
                              <?php foreach ($finishing as $fis) { ?>
                                 <option value="<?php echo $fis->id_finishing; ?>" data-finishing="<?php echo $fis->add_price; ?>"><?php echo $fis->finishing; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-start pt-2">Upload File</label>
                        <div class="col-lg-7">
                           <input type="file" class="form-control" name="filecontoh" required oninvalid="this.setCustomValidity('Mohon upload file contoh')" oninput="setCustomValidity('')">
                           <span class="text-1 text-danger">*gambar ukuran maksimal 5Mb.</span>
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
                        <input type="number" class="form-control" min="1" id="quantity" name="quantity" onchange="calculateTotal()" onkeyup="calculateTotal()">
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
   var lebar = 0;
   var panjang = 0;
   var finishing = 0;

   function calculateprice() {
      $('#quantity').val('');
      var pricedefault = $('#bahanspanduk').find(':selected').data('bahan');
      
      var lebar = parseFloat(document.getElementById('lebar').value); // Mengambil nilai lebar dari input
      var panjang = parseFloat(document.getElementById('panjang').value); // Mengambil nilai panjang dari input
      var finishing = $('#finishingspanduk').find(':selected').data('finishing');
      
      // Hitung total harga berdasarkan lebar, panjang, dan finishing yang dipilih
      var pricechoice = ((pricedefault * lebar) * panjang) + finishing;
      
      // Perbarui nilai baseprice dan total price pada form
      document.getElementById('baseprice').value = pricechoice;
      document.getElementById('totalPrice').innerText = pricechoice;
   }

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
