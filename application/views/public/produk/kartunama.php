<div role="main" class="main">

   <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
      <div class="container">
         <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
               <h1 class="font-weight-bold text-dark">Kartu Nama</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
               <ul class="breadcrumb d-block text-center">
                  <li><a href="#">Beranda</a></li>
                  <li class="active">Kartu Nama</li>
               </ul>
            </div>
         </div>
      </div>
   </section>

</div>

<div role="main" class="main shop pt-4">

   <div class="container">

      <div class="row">
         <div class="col-lg-3 order-2 order-lg-1">
            <aside class="sidebar">
               <form action="page-search-results.html" method="get">
                  <div class="input-group mb-3 pb-1">
                     <input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text">
                     <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
                  </div>
               </form>
               <h5 class="font-weight-semi-bold pt-3">Kategori Produk</h5>
               <ul class="nav nav-list flex-column">
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Produk/undangan'); ?>">Undangan</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Produk/spanduk'); ?>">Spanduk Banner Baliho</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Produk/kartunama'); ?>">Kartu Nama</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Produk/rollbanner'); ?>">Roll Up Banner</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Produk/brosur'); ?>">Brosur</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Produk/standbanner'); ?>">Standing Banner</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Produk/sticker'); ?>">Sticker</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Produk/merchandise'); ?>">Merchandise</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Produk/produklainnya'); ?>">Produk Lainnya</a></li>
               </ul>               
               
            </aside>
         </div>
         <div class="col-lg-9 order-1 order-lg-2">

            <div class="masonry-loader masonry-loader-showing">
               <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">

               <?php foreach ($kartunama as $dt) : ?>

               <div class="col-12 col-sm-6 col-lg-4">
                  <div class="product mb-0">
                     <div class="product-thumb-info border-0 mb-3">										

                        <div class="addtocart-btn-wrapper">
                           <a href="#" class="text-decoration-none addtocart-btn" title="Tambah ke Keranjang">
                              <i class="icons icon-bag"></i>
                           </a>
                        </div>                          
                        <a href="<?php echo base_url('Produk/detailproduk/' . $dt->id_product . '/' . $dt->categories_id); ?>">
                           <div class="product-thumb-info-image">
                              <?php if (!$dt->featureimage) { ?>
                                 <img class="img-fluid" src="<?php echo base_url($public_dir); ?>/img/products/product-grey-1.jpg">
                              <?php } elseif($dt->featureimage) { ?>
                                 <img class="img-fluid" src="<?php echo base_url('public/featureimage/' . $dt->featureimage); ?>">
                              <?php } ?>
                           </div>
                        </a>
                     </div>
                     <div class="d-flex justify-content-between">
                        <div>
                           <a href="<?php echo base_url('Produk/detailproduk/' . $dt->id_product . '/' . $dt->categories_id); ?>" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1"><?php echo $dt->categories; ?></a>
                           <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="<?php echo base_url('Produk/detailproduk/' . $dt->id_product . '/' . $dt->categories_id); ?>" class="text-color-dark text-color-hover-primary"><?php echo $dt->name; ?></a></h3>
                        </div>
                        <a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
                     </div>
                     <div title="Rated 5 out of 5">
                        <input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
                     </div>
                     <p class="price text-5 mb-3">
                        <span class="sale text-color-dark font-weight-semi-bold"><?php echo rupiah($dt->baseprice); ?></span>                           
                     </p>
                  </div>
               </div>

               <?php endforeach; ?>
               

               </div>
               <div class="row mt-4">
                  <div class="col">
                     <ul class="pagination float-end">
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>