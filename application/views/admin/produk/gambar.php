<section role="main" class="content-body card-margin">
   <header class="page-header">
      <h2>Gambar Produk</h2>
      <div class="right-wrapper text-end">
         <ol class="breadcrumbs">
            <li>
               <a href="index.html">
                  <i class="bx bx-home-alt"></i>
               </a>
            </li>
            <li><span>Gambar Produk</span></li>            
         </ol>
         <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
      </div>
   </header>

   <div class="row">
      <div class="col">
         <section class="card">
            <div class="card-body">
            <?php foreach ($product as $pd) : ?>
               <div class="row">
                  <div class="col-md-5">
                     <span class="text-4" style="font-weight: bold;">Nama Produk : <?php echo $pd->name; ?></span><br>
                     <span class="text-4" style="font-weight: bold;">Kategori : <?php echo $pd->categories; ?></span><br>
                     <span class="text-4">Harga Dasar : Rp. <?php echo $pd->baseprice; ?></span><br>
                     <span class="text-4">Stok : <?php echo $pd->stock; ?></span>
                  </div>
                  <div class="col-md-7">                     
                     <span class="text-4">Deskripsi : <?php echo substr($pd->description, 0, 500); ?></span><br>
                     <span class="text-4">Informasi : <?php echo $pd->information; ?></span>                  
                  </div>
               </div>
            <?php endforeach; ?>
            </div>
         </section>
      </div>
   </div>   
   <div class="row">
      <div class="col">
         <section class="card">
            <header class="card-header">
               <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
               </div>
               <h2 class="card-title">Gambar Produk&emsp;<a class="mb-1 mt-1 me-1 btn btn-default" href="<?php echo base_url('Admin/Produk'); ?>"><i class="fas fa-arrow-left"></i> Kembali</a>&emsp;<a class="mb-1 mt-1 me-1 modal-with-zoom-anim ws-normal btn btn-primary" href="#tambah"><i class="fas fa-plus-circle"></i> Tambah Data</a></h2>               
            </header>
            <div class="card-body">
               <table class="table table-bordered table-striped mb-0" id="datatable-default">
                  <thead>
                     <tr>
                        <th width="20px">No</th>
                        <th width="200px">Gambar</th>
                        <th width="200px">Deskripsi</th>                        
                        <th width="20px" class="text-center">Opsi</th>
                     </tr>
                  </thead>
                  <tbody>                     
                     <?php $no = 1; ?>
                     <?php foreach ($images as $dt) : ?>
                        <tr>
                           <td><?php echo $no ?></td>                              
                           <td>
                           <?php if ($dt->image) { ?>
                              <a href="<?php echo base_url('public/productimages/' . $dt->image); ?>" data-plugin-lightbox data-plugin-options='{ "type":"image" }' title="<?php echo $dt->description; ?>">
                                 <img class="img-responsive" src="<?php echo base_url('public/productimages/' . $dt->image); ?>" width="100">
                              </a>
                           <?php } ?>
                           </td>
                           <td><?php echo $dt->description; ?></td>                                                      
                           <td style="white-space: nowrap; text-align: center;"><a onclick="return confirm('Anda yakin menghapus data Gambar ini?');" href="<?php echo base_url("Admin/deleteimage/" . $dt->id_image); ?>" class="btn btn-danger btn-sm" title="Hapus Data Gambar"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php $no++; ?>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </section>
      </div>
   </div>
   <!-- end: page -->

   <div id="tambah" class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
      <section class="card">
         <header class="card-header">
            <h2 class="card-title">Tambah Gambar Produk <a href="javascript:void(0)" class="modal-dismiss pull-right text-white">x</a></h2>
         </header>
         <form action="<?php echo base_url('Admin/insertimage'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal mb-lg">
         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
         <div class="card-body">
            <input type="hidden" class="form-control" name="product_id" value="<?php echo $id_product; ?>" readonly>
            <div class="form-group">
               <label>Gambar</label>
               <input type="file" class="form-control" name="image" required oninvalid="this.setCustomValidity('Mohon upload Gambar')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
               <label>Deskripsi / Template</label>
               <textarea maxlength="255" rows="2" class="form-control" name="description"></textarea>
            </div>            
         </div>
         <footer class="card-footer">
            <div class="row">
               <div class="col-md-12 text-end">
                  <button type="submit" name="simpan" class="btn btn-primary"><i class="fas fa-save text-white"></i> Simpan</button>
                  <button class="btn btn-default modal-dismiss">Batal</button>
               </div>
            </div>
         </footer>
         </form>
      </section>
   </div>

</section>
			