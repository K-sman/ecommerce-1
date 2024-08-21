<section role="main" class="content-body card-margin">
   <header class="page-header">
      <h2>Jenis Muka Produk</h2>
      <div class="right-wrapper text-end">
         <ol class="breadcrumbs">
            <li>
               <a href="index.html">
                  <i class="bx bx-home-alt"></i>
               </a>
            </li>
            <li><span>Jenis Muka Produk</span></li>            
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
               <h2 class="card-title">Jenis Muka Produk&emsp; <a class="mb-1 mt-1 me-1 modal-with-zoom-anim ws-normal btn btn-primary" href="#tambah"><i class="fas fa-plus-circle"></i> Tambah Data</a></h2>               
            </header>
            <div class="card-body">
               <table class="table table-bordered table-striped mb-0" id="datatable-default">
                  <thead>
                     <tr>
                        <th width="20px">No</th>
                        <th width="200px">Jenis Muka</th>
                        <th width="200px">Deskripsi</th>
                        <th width="200px">Kategori Produk</th>
                        <th width="150px">Harga Bahan</th>
                        <th width="20px" class="text-center">Opsi</th>
                     </tr>
                  </thead>
                  <tbody>                     
                     <?php $no = 1; ?>
                     <?php foreach ($facetypes as $dt) : ?>
                        <tr>
                           <td><?php echo $no ?></td>
                           <td><?php echo $dt->facetype; ?></td>
                           <td><?php echo $dt->description; ?></td>
                           <td><?php echo $dt->categories; ?></td>
                           <td>Rp. <?php echo $dt->add_price; ?></td>
                           <td style="white-space: nowrap; text-align: center;"><a class="mb-1 mt-1 me-1 modal-with-zoom-anim ws-normal btn btn-success btn-sm" href="#ubah<?php echo $dt->id_facetype; ?>"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Anda yakin menghapus data Jenis Muka ini?');" href="<?php echo base_url("JenisMuka/delete/" . $dt->id_facetype); ?>" class="btn btn-danger btn-sm" title="Hapus Data Jenis Muka"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php $no++; ?>
                     <?php endforeach; ?>                     
                  </tbody>
               </table>
            </div>
         </section>
      </div>
   </div>

   <div id="tambah" class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
      <section class="card">
         <header class="card-header">
            <h2 class="card-title">Tambah Jenis Muka Produk <a href="javascript:void(0)" class="modal-dismiss pull-right text-white">x</a></h2>
         </header>
         <form action="<?php echo base_url('JenisMuka/insert'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal mb-lg">
         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
         <div class="card-body">
            <div class="form-group">
               <label for="inputAddress">Jenis Muka</label>
               <input type="text" class="form-control" name="facetype" maxlength="50" required oninvalid="this.setCustomValidity('Mohon isi Jenis Muka')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
               <label>Deskripsi</label>
               <textarea maxlength="255" rows="2" class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
               <label>Kategori Produk</label>
               <select class="form-control" name="categories_id" required oninvalid="this.setCustomValidity('Mohon pilih Kategori Produk')" oninput="setCustomValidity('')">
                  <option value="" selected>-- Pilih Kategori Produk --</option>
                  <?php foreach ($categories as $cat) { ?>
                     <option value="<?php echo $cat->id_categories; ?>"><?php echo $cat->categories; ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group">
               <label>Harga Bahan</label>
               <input type="number" class="form-control" name="add_price" maxlength="20" value="0" required oninvalid="this.setCustomValidity('Mohon isi Tambahan Harga')" oninput="setCustomValidity('')">
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

   <?php foreach ($facetypes as $up) : ?>
   <div id="ubah<?php echo $up->id_facetype; ?>" class="zoom-anim-dialog modal-block modal-header-color modal-block-success mfp-hide">
      <section class="card">
         <header class="card-header">
            <h2 class="card-title">Ubah Jenis Muka Produk <a href="javascript:void(0)" class="modal-dismiss pull-right text-white">x</a></h2>
         </header>
         <form action="<?php echo base_url('JenisMuka/update'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal mb-lg">
         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
         <div class="card-body">
            <input type="hidden" class="form-control" name="id_facetype" value="<?php echo $up->id_facetype; ?>" readonly>
            <div class="form-group">
               <label for="inputAddress">Jenis Muka</label>
               <input type="text" class="form-control" name="facetype" maxlength="50" value="<?php echo $up->facetype; ?>" required oninvalid="this.setCustomValidity('Mohon isi Jenis Muka')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
               <label for="inputAddress">Deskripsi</label>
               <textarea maxlength="255" rows="3" class="form-control text-3 h-auto py-2" name="description"><?php echo $up->description; ?></textarea>
            </div>
            <div class="form-group">
               <label>Kategori Produk</label>
               <select class="form-control" name="categories_id" required oninvalid="this.setCustomValidity('Mohon pilih Kategori Produk')" oninput="setCustomValidity('')">
                  <option value="" selected>-- Pilih Kategori Produk --</option>
                  <?php foreach ($categories as $cat) { ?>
                     <option value="<?php echo $cat->id_categories; ?>" <?php echo $up->categories_id == $cat->id_categories ? 'selected' : ''; ?>><?php echo $cat->categories; ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group">
               <label for="inputAddress">Harga Bahan</label>
               <input type="number" class="form-control" name="add_price" maxlength="20" value="<?php echo $up->add_price; ?>" required oninvalid="this.setCustomValidity('Mohon isi Tambahan Harga')" oninput="setCustomValidity('')">
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

   <!-- end: page -->
</section>
			