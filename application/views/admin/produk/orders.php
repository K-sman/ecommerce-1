<section role="main" class="content-body card-margin">
   <header class="page-header">
      <h2>Daftar Pesanan</h2>
      <div class="right-wrapper text-end">
         <ol class="breadcrumbs">
            <li>
               <a href="index.html">
                  <i class="bx bx-home-alt"></i>
               </a>
            </li>
            <li><span>Daftar Pesanan</span></li>            
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
               <h2 class="card-title">Daftar Pesanan&emsp;</h2>               
            </header>
            <div class="card-body">
               <table class="table table-bordered table-striped mb-0" id="datatable-default">
                  <thead>
                     <tr>
                        <th width="20px">No</th>
                        <th width="100px">Tanggal Pemesanan</th>
                        <th width="100px">ID Pemesan</th>
                        <th width="100px">Nama Pemesan</th>
                        <th width="100px">Nama Produk</th>
                        <th width="80px">Jumlah</th>
                        <th width="80px">Harga</th>
                        <th width="100px">Keterangan</th>
                        <th width="20px" class="text-center">Detail Pesanan</th>
                        <th width="100px">Status</th>
                     </tr>
                  </thead>
                  <tbody>                     
                     <?php $no = 1; ?>
                     <?php foreach ($orders as $dt) : ?>
                        <tr>
                           <td><?php echo $no ?></td>
                           <td><?php echo $dt->order_date ?></td>
                           <td><?php echo $dt->cart_id; ?><?php echo  $dt->id_cartsitem ?></td>
                           <td><?php echo $dt->customer_name?></td>                              
                           <td><?php echo $dt->product_name; ?></td>                           
                           <td><?php echo $dt->quantity; ?></td>
                           <td><?php echo $dt->price; ?></td>
                           <td><?php echo $dt->keterangan; ?></td>
                           <td style="white-space: nowrap; text-align: center;">
                              <a class="mb-1 mt-1 me-1 modal-with-zoom-anim ws-normal btn btn-success btn-sm" href="#detail<?php echo $dt->id_cartsitem; ?>">
                                 <i class="fa fa-search"></i>
                              </a>
                           </td>
                           <td>
                           <?php if($dt->is_completed=='F') { ?>
                              <span class="badge badge-warning">Belum Diperiksa</span>
                           <?php } else { ?>
                              <span class="badge badge-success">Sudah Diperiksa</span>
                           <?php } ?>
                           </td>
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
<!-- Modal -->
<?php foreach ($orders as $up) : ?>
    <div id="detail<?php echo $up->id_cartsitem; ?>" class="zoom-anim-dialog modal-block modal-block-lg modal-header-color modal-block-success mfp-hide">
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Detail Pesanan 
                    <a href="javascript:void(0)" class="modal-dismiss pull-right text-white">x</a>
                </h2>
            </header>
            <form action="<?php echo base_url('Admin/updateorders'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal mb-lg">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <input type="hidden" name="id_cart" value="<?php echo $up->id_cart; ?>" />
                <div class="card-body">
                    <input type="hidden" class="form-control" name="cartsitems" value="<?php echo $up->id_cartsitem; ?>" readonly>            
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Pemesan</th>
                            <td><?php echo $up->customer_name; ?></td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td><?php echo $up->product_name; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Bahan</th>
                            <td><?php echo !empty($up->material_name) ? $up->material_name : '-'; ?></td>
                        </tr>
                        <tr>
                            <th>Ukuran</th>
                            <td><?php echo !empty($up->ukuran) ? $up->ukuran : '-'; ?></td>
                        </tr>
                        <tr>
                            <th>Finishing</th>
                            <td><?php echo !empty($up->finishing_name) ? $up->finishing_name : '-'; ?></td>
                        </tr>
                        <tr>
                            <th>Laminasi</th>
                            <td><?php echo !empty($up->lamination_name) ? $up->lamination_name : '-'; ?></td>
                        </tr>
                        <tr>
                            <th>Size</th>
                            <td><?php echo !empty($up->size_name) ? $up->size_name : '-'; ?></td>
                        </tr>
                        <tr>
                            <th>File Contoh</th>
                            <td>
                                <?php if (!empty($up->filecontoh)): ?>
                                    <img src="<?php echo base_url('public/orders/' . $up->filecontoh); ?>" alt="File Contoh" class="img-thumbnail" style="max-width: 100px;">
                                    <div class="mt-2">
                                        <a href="<?php echo base_url('public/orders/' . $up->filecontoh); ?>" class="btn btn-primary" download>Download</a>
                                    </div>
                                    <?php else: ?>
                                    Tidak ada file
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><?php echo $up->keterangan; ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td><?php echo $up->quantity; ?></td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td><?php echo $up->price; ?></td>
                        </tr>
                    </table>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="float-start">
                            <button type="button" class="btn btn-primary" onclick="window.open('<?php echo base_url('admin/cetakDataPesanan/' . $up->cart_id . '/' . $up->id_cartsitem); ?>', '_blank')">Cetak</button>
                        </div>
                            <div class="float-end">
                                <button type="submit" name="simpan" class="btn btn-success"><i class="fas fa-save text-white"></i> Konfirmasi</button>
                                <button class="btn btn-default modal-dismiss">Batal</button>
                            </div>
                        </div>
                    </div>
                </footer>
            </form>
        </section>
    </div>
<?php endforeach; ?>

</section>
