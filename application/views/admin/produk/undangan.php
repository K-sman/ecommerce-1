<section role="main" class="content-body card-margin">
   <header class="page-header">
      <h2>Pesanan Undangan</h2>
      <div class="right-wrapper text-end">
         <ol class="breadcrumbs">
            <li>
               <a href="index.html">
                  <i class="bx bx-home-alt"></i>
               </a>
            </li>
            <li><span>Pesanan Undangan</span></li>            
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
               <h2 class="card-title">Pesanan Undangan&emsp;</h2>               
            </header>
            <div class="card-body">
               <table class="table table-bordered table-striped mb-0" id="datatable-default">
                  <thead>
                     <tr>
                        <th width="20px">No</th>
                        <th width="100px">Model Undangan</th>
                        <th width="80px">Gambar Model</th> <!-- Kolom baru untuk gambar -->
                        <th width="80px">Harga</th>
                        <th width="80px">Jumlah Pesanan</th>
                        <th width="100px">Nama Pemesan</th>
                        <th width="50px">Email</th>
                        <th width="80px">Telepon</th>
                        <th width="80px">Status</th>
                        <th width="20px" class="text-center">Opsi</th>
                     </tr>
                  </thead>
                  <tbody>                     
                     <?php $no = 1; ?>
                     <?php foreach ($undangan as $dt) : ?>
                        <tr>
                           <td><?php echo $no ?></td>
                           <td><?php echo $dt->description; ?></td>
                           <td>
                              <img src="<?php echo base_url('./public/productimages/' . $dt->image); ?>" alt="Model Undangan" width="80px"> <!-- Menampilkan gambar model -->
                           </td>
                           <td>Rp. <?php echo $dt->harga; ?></td>
                           <td><?php echo $dt->jmlpesanan; ?></td>
                           <td><?php echo $dt->namapemesan; ?></td>
                           <td><?php echo $dt->emailpemesan; ?></td>
                           <td><?php echo $dt->telepon; ?></td>
                           <td>
                           <?php if($dt->status=='Belum Diperiksa') { ?>
                              <span class="badge badge-warning">Belum Diperiksa</span>
                           <?php } else { ?>
                              <span class="badge badge-success">Sudah Diperiksa</span>
                           <?php } ?>
                           </td>
                           <td style="white-space: nowrap; text-align: center;"><a class="mb-1 mt-1 me-1 modal-with-zoom-anim ws-normal btn btn-success btn-sm" href="#detail<?php echo $dt->id_undangan; ?>"><i class="fa fa-search"></i></a></td>
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
   
   <?php foreach ($undangan as $up) : ?>
   <div id="detail<?php echo $up->id_undangan; ?>" class="zoom-anim-dialog modal-block modal-block-lg modal-header-color modal-block-success mfp-hide">
      <section class="card">
         <header class="card-header">
            <h2 class="card-title">Detail Undangan <a href="javascript:void(0)" class="modal-dismiss pull-right text-white">x</a></h2>
         </header>
         <form action="<?php echo base_url('Admin/updateundangan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal mb-lg">
         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
         <div class="card-body">
            <input type="hidden" class="form-control" name="id_undangan" value="<?php echo $up->id_undangan; ?>" readonly>            
         
            <div class="row col-md-12">               
               <div class="col-md-6">
                  <span class="font-weight-bold">Calon Mempelai Wanita</span><br>                
                  <label>Nama Lengkap</label>
                  <input type="text" maxlength="100" class="form-control" name="nama_wanita" value="<?php echo $up->nama_wanita; ?>" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Mempelai Wanita')" oninput="setCustomValidity('')">

                  <label>Nama Panggilan</label>
                  <input type="text" maxlength="100" class="form-control" name="panggilan_wanita" value="<?php echo $up->panggilan_wanita; ?>" required oninvalid="this.setCustomValidity('Mohon isi Nama Panggila Mempelai Wanita')" oninput="setCustomValidity('')">

                  <label>Nama Lengkap Ayah</label>
                  <input type="text" maxlength="100" class="form-control" name="ayah_wanita" value="<?php echo $up->ayah_wanita; ?>" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Ayah Mempelai Wanita')" oninput="setCustomValidity('')">

                  <label>Nama Lengkap Ibu</label>
                  <input type="text" maxlength="100" class="form-control" name="ibu_wanita" value="<?php echo $up->ibu_wanita; ?>" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Ibu Mempelai Wanita')" oninput="setCustomValidity('')">

                  <label>Alamat Orang Tua (Ayah & Ibu)</label>
                  <input type="text" maxlength="100" class="form-control" name="alamat_wanita" value="<?php echo $up->alamat_wanita; ?>" required oninvalid="this.setCustomValidity('Mohon isi Alamat Orang Tua Mempelai Wanita')" oninput="setCustomValidity('')">                        
               </div>               
               <div class="col-md-6">                  
                  <span class="font-weight-bold">Calon Mempelai Pria</span><br>
                  <label>Nama Lengkap</label>
                  <input type="text" maxlength="100" class="form-control" name="nama_pria" value="<?php echo $up->nama_pria; ?>" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Mempelai Pria')" oninput="setCustomValidity('')">

                  <label>Nama Panggilan</label>
                  <input type="text" maxlength="100" class="form-control" name="panggilan_pria" value="<?php echo $up->panggilan_pria; ?>" required oninvalid="this.setCustomValidity('Mohon isi Nama Panggila Mempelai Pria')" oninput="setCustomValidity('')">

                  <label>Nama Lengkap Ayah</label>
                  <input type="text" maxlength="100" class="form-control" name="ayah_pria" value="<?php echo $up->ayah_pria; ?>" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Ayah Mempelai Pria')" oninput="setCustomValidity('')">

                  <label>Nama Lengkap Ibu</label>
                  <input type="text" maxlength="100" class="form-control" name="ibu_pria" value="<?php echo $up->ibu_pria; ?>" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Ibu Mempelai Pria')" oninput="setCustomValidity('')">

                  <label>Alamat Orang Tua (Ayah & Ibu)</label>
                  <input type="text" maxlength="100" class="form-control" name="alamat_pria" value="<?php echo $up->alamat_pria; ?>" required oninvalid="this.setCustomValidity('Mohon isi Alamat Orang Tua Mempelai Pria')" oninput="setCustomValidity('')">                  
               </div>
            </div>
            <div class="divider divider-small">
               <hr class="bg-color-grey-scale-4">
            </div>

            <span class="font-weight-bold mt-2">Akad Nikah</span><br>

            <div class="row col-md-12">
               <div class="col-3">
                  <label class="form-label mb-1 text-2">Tanggal</label>                  
               </div>
               <div class="col-3">
                  <label class="form-label mb-1 text-2">Waktu</label>                  
               </div>
               <div class="col-6">
                  <label class="form-label mb-1 text-2">Tempat Akad</label>
               </div>
            </div>            
            <div class="row col-md-12">                  
               <div class="col-md-3">
                  <input type="date"class="form-control text-3 h-auto py-2" name="tanggalakad" value="<?php echo $up->tanggalakad; ?>" required oninvalid="this.setCustomValidity('Mohon pilih Tanggal Akad')" oninput="setCustomValidity('')">
               </div>
               <div class="col-md-3">
                  <input type="time"class="form-control text-3 h-auto py-2" name="jamakad" value="<?php echo $up->jamakad; ?>" required oninvalid="this.setCustomValidity('Mohon isi Waktu Akad')" oninput="setCustomValidity('')">
               </div>
               <div class="col-md-6">                        
                  <textarea maxlength="3000" rows="2" class="form-control text-3 h-auto py-2" name="tempatakad" required oninvalid="this.setCustomValidity('Mohon isi Tempat Akad')" oninput="setCustomValidity('')"><?php echo $up->tempatakad; ?></textarea>
               </div>                     
            </div>

            <span class="font-weight-bold mt-2">Resepsi</span><br>
            <div class="row col-md-12">
               <div class="col-3">
                  <label class="form-label mb-1 text-2">Tanggal</label>                  
               </div>
               <div class="col-3">
                  <label class="form-label mb-1 text-2">Waktu</label>                  
               </div>
               <div class="col-6">
                  <label class="form-label mb-1 text-2">Tempat Resepsi</label>
               </div>
            </div>
            <div class="row col-md-12">                     
               <div class="col-md-3">
                  <input type="date"class="form-control text-3 h-auto py-2" value="<?php echo $up->tanggalresepsi; ?>" name="tanggalresepsi" required oninvalid="this.setCustomValidity('Mohon pilih Tanggal Resepsi')" oninput="setCustomValidity('')">
               </div>
               <div class="col-md-3">
                  <input type="time"class="form-control text-3 h-auto py-2" value="<?php echo $up->jamresepsi; ?>" name="jamresepsi" required oninvalid="this.setCustomValidity('Mohon isi Waktu Resepsi')" oninput="setCustomValidity('')">
               </div>
               <div class="col-md-6">                        
                  <textarea maxlength="3000" rows="2" class="form-control text-3 h-auto py-2" name="tempatresepsi" required oninvalid="this.setCustomValidity('Mohon isi Tempat Resepsi')" oninput="setCustomValidity('')"><?php echo $up->tempatresepsi; ?></textarea>
               </div>                     
            </div>

            <p class="mb-1 text-2 text-2" style="font-weight: bold;">Turut Mengundang</p>
            <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" placeholder="1." name="turut1" value="<?php echo $up->turut1; ?>">
            <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" placeholder="2." name="turut2" value="<?php echo $up->turut2; ?>">
            <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" placeholder="3." name="turut3" value="<?php echo $up->turut3; ?>">
            <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" placeholder="4." name="turut4" value="<?php echo $up->turut4; ?>">
            <input type="text" maxlength="100" class="form-control text-3 h-auto py-2" placeholder="5." name="turut5" value="<?php echo $up->turut5; ?>">                  
            
         </div>
         <footer class="card-footer">
            <div class="row">
               <div class="col-md-12 text-end">
                  <button class="btn btn-default modal-dismiss">Batal</button>
                  <button class="btn btn-success">Update</button>
               </div>
            </div>
         </footer>
         </form>
      </section>
   </div>
   <?php endforeach; ?> 
</section>
