<section role="main" class="content-body card-margin">
   <header class="page-header">
      <h2>Daftar Produk</h2>
      <div class="right-wrapper text-end">
         <ol class="breadcrumbs">
            <li>
               <a href="index.html">
                  <i class="bx bx-home-alt"></i>
               </a>
            </li>
            <li><span>Daftar Produk</span></li>            
         </ol>
         <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
      </div>
   </header>

   <div class="row">
      <div class="col">
         <section class="card">
            <header class="card-header">
               <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
               </div>
               <h2 class="card-title">Daftar Produk&emsp;<a class="mb-1 mt-1 me-1 modal-with-zoom-anim ws-normal btn btn-primary" href="#tambah"><i class="fas fa-plus-circle"></i> Tambah Data</a></h2>               
            </header>
            <div class="card-body">
               <table class="table table-bordered table-striped mb-0" id="datatable-default">
                  <thead>
                     <tr>
                        <th width="20px">No</th>
                        <th width="200px">Nama Produk</th>
                        <th width="200px">Deskripsi</th>
                        <th width="100px">Harga Dasar</th>
                        <th width="50px">Stok</th>
                        <th width="110px">Kategori Produk</th>
                        <th width="100px" class="text-center">Gambar Produk</th>
                        <th width="20px" class="text-center">Opsi</th>
                     </tr>
                  </thead>
                  <tbody>                     
                     <?php $no = 1; ?>
                     <?php foreach ($products as $dt) : ?>
                        <tr>
                           <td><?php echo $no ?></td>                              
                           <td><?php echo $dt->name; ?></td>
                           <td><?php echo substr($dt->description, 0, 120); ?></td>
                           <td>Rp. <?php echo $dt->baseprice; ?></td>
                           <td><?php echo $dt->stock; ?></td>
                           <td><?php echo $dt->categories; ?></td>
                           <td class="text-center"><a class="btn btn-primary btn-sm" href="<?php echo base_url('Admin/productimage/' . $dt->id_product); ?>"><i class="fa fa-image"></i> Gambar</a></td>
                           <td style="white-space: nowrap; text-align: center;"><a class="mb-1 mt-1 me-1 modal-with-zoom-anim ws-normal btn btn-success btn-sm" href="#ubah<?php echo $dt->id_product; ?>"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Anda yakin menghapus data Produk ini?');" href="<?php echo base_url("Admin/deleteproduct/" . $dt->id_product); ?>" class="btn btn-danger btn-sm" title="Hapus Data Produk"><i class="fa fa-trash"></i></a></td>
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


   <div id="tambah" class="zoom-anim-dialog modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
      <section class="card">
         <header class="card-header">
            <h2 class="card-title">Tambah Produk <a href="javascript:void(0)" class="modal-dismiss pull-right text-white">x</a></h2>
         </header>
         <form action="<?php echo base_url('Admin/insertproduct'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal mb-lg">
         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
         <div class="card-body">

         <div class="row mt-2">
            <div class="col-md-8">
               <label class="control-label">Nama Produk</label>
               <input type="text" name="name" class="form-control" required oninvalid="this.setCustomValidity('Mohon isi Nama Produk')" oninput="setCustomValidity('')">
            </div>
            <div class="col-md-4">
               <label class="control-label">Kategori Produk</label>
               <select class="form-control" name="categories_id" required oninvalid="this.setCustomValidity('Mohon pilih Kategori Produk')" oninput="setCustomValidity('')">
                  <option value="" selected>-- Pilih Kategori Produk --</option>
                  <?php foreach ($categories as $cat) { ?>
                     <option value="<?php echo $cat->id_categories; ?>"><?php echo $cat->categories; ?></option>
                  <?php } ?>
               </select>                     
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-6">
               <label class="control-label">Deskripsi Produk</label>
               <textarea rows="3" class="form-control" name="description" required oninvalid="this.setCustomValidity('Mohon isi Deskripsi Produk')" oninput="setCustomValidity('')"></textarea>
            </div>
            <div class="col-md-6">
               <label class="control-label">Informasi Produk</label>
               <textarea rows="3" class="form-control" name="information" required oninvalid="this.setCustomValidity('Mohon isi Informasi Produk')" oninput="setCustomValidity('')"></textarea>
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-6">
               <label class="control-label">Harga Dasar</label>
               <input type="number" class="form-control" name="baseprice" maxlength="20" required oninvalid="this.setCustomValidity('Mohon isi Harga Dasar')" oninput="setCustomValidity('')">
            </div>
            <div class="col-md-6">
               <label class="control-label">Stok</label>
               <input type="number" class="form-control" name="stock" maxlength="20" required oninvalid="this.setCustomValidity('Mohon isi Stock Product')" oninput="setCustomValidity('')">
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-6">
               <label class="control-label">Gambar Utama</label>
               <span class="text-1 text-danger">*Max ukuran 5mb</span>
               <input type="file" class="form-control" name="featureimage">
            </div>            
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

   <?php foreach ($products as $up) : ?>
   <div id="ubah<?php echo $up->id_product; ?>" class="zoom-anim-dialog modal-block modal-block-lg modal-header-color modal-block-success mfp-hide">
      <section class="card">
         <header class="card-header">
            <h2 class="card-title">Ubah Produk <a href="javascript:void(0)" class="modal-dismiss pull-right text-white">x</a></h2>
         </header>
         <form action="<?php echo base_url('Admin/updateproduct'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal mb-lg">
         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
         <div class="card-body">
            <input type="hidden" class="form-control" name="id_product" value="<?php echo $up->id_product; ?>" readonly>            
            <div class="row mt-2">
            <div class="col-md-8">
               <label class="control-label">Nama Produk</label>
               <input type="text" name="name" class="form-control" value="<?php echo $up->name; ?>" required oninvalid="this.setCustomValidity('Mohon isi Nama Produk')" oninput="setCustomValidity('')">
            </div>
            <div class="col-md-4">
               <label class="control-label">Kategori Produk</label>
               <select class="form-control" name="categories_id" required oninvalid="this.setCustomValidity('Mohon pilih Kategori Produk')" oninput="setCustomValidity('')">
                  <option value="" selected>-- Pilih Kategori Produk --</option>
                  <?php foreach ($categories as $cat) { ?>
                     <option value="<?php echo $cat->id_categories; ?>" <?php echo $up->categories_id == $cat->id_categories ? 'selected' : ''; ?>><?php echo $cat->categories; ?></option>
                  <?php } ?>
               </select>                     
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-6">
               <label class="control-label">Deskripsi Produk</label>
               <textarea rows="3" class="form-control" name="description" required oninvalid="this.setCustomValidity('Mohon isi Deskripsi Produk')" oninput="setCustomValidity('')"><?php echo $up->description; ?></textarea>
            </div>
            <div class="col-md-6">
               <label class="control-label">Informasi Produk</label>
               <textarea rows="3" class="form-control" name="information" required oninvalid="this.setCustomValidity('Mohon isi Informasi Produk')" oninput="setCustomValidity('')"><?php echo $up->information; ?></textarea>
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-6">
               <label class="control-label">Harga Dasar</label>
               <input type="number" class="form-control" name="baseprice" maxlength="20" value="<?php echo $up->baseprice; ?>" required oninvalid="this.setCustomValidity('Mohon isi Harga Dasar')" oninput="setCustomValidity('')">
            </div>
            <div class="col-md-6">
               <label class="control-label">Stok</label>
               <input type="number" class="form-control" name="stock" maxlength="20" value="<?php echo $up->stock; ?>" required oninvalid="this.setCustomValidity('Mohon isi Stock Product')" oninput="setCustomValidity('')">
            </div>
         </div>  
         <div class="row mt-2">
            <div class="col-md-6">
               <label class="control-label">Gambar Utama</label>
               <input type="file" class="form-control" name="featureimage">
               <span class="text-1 text-danger">*Max ukuran 5mb</span><br>
               <span class="text-1 text-danger">*Kosongkan jika tidak mengganti gambar.</span>
            </div>
            <div class="col-md-6">
               <?php if ($up->featureimage) { ?>
                  <a href="<?php echo base_url('public/featureimage/' . $up->featureimage); ?>" data-plugin-lightbox data-plugin-options='{ "type":"image" }'>
                     <img class="img-responsive" src="<?php echo base_url('public/featureimage/' . $up->featureimage); ?>" width="100">
                  </a>
               <?php } ?>
            </div>
         </div>
            
         </div>
         <footer class="card-footer">
            <div class="row">
               <div class="col-md-12 text-end">
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fas fa-save text-white"></i> Ubah</button>
                  <button class="btn btn-default modal-dismiss">Batal</button>
               </div>
            </div>
         </footer>
         </form>
      </section>
   </div>
   <?php endforeach; ?>

</section>
			