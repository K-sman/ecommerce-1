<div role="main" class="main shop pb-4">
<?php foreach ($carts as $get) :
$cart_id = $get->cart_id;   
endforeach; ?>

   <div class="container">

      <div class="row justify-content-center">
         <div class="col-lg-8">
         <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
            <li class="text-transform-none me-2">
               <a href="<?php echo base_url('Cart'); ?>" class="text-decoration-none text-color-dark text-color-hover-primary">Keranjang Belanja</a>
            </li>
            <li class="text-transform-none text-color-grey-lighten me-2">
               <a href="<?php echo base_url('Cart/checkout/' . $cart_id); ?>" class="text-decoration-none text-color-dark text-color-hover-primary">Pembayaran</a>
            </li>
            <li class="text-transform-none text-color-grey-lighten">
               <a href="<?php echo base_url('Cart/complete/' . $cart_id); ?>" class="text-decoration-none text-color-primary">Pesanan</a>
            </li>
         </ul>
         </div>
      </div>

      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="card border-width-3 border-radius-0 border-color-success">
               <div class="card-body text-center">
                  <p class="text-color-dark font-weight-bold text-4-5 mb-0"><i class="fas fa-check text-color-success me-1"></i> Terima Kasih. Pesanan Anda sudah diterima.</p>
               </div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between py-3 px-4 my-4">
               <?php foreach ($payments as $pay) : ?>
               <div class="text-center mt-4 mt-md-0">
                  <span>
                     tanggal <br>
                     <strong class="text-color-dark"><?php echo tgl_indo($pay->tglbayar); ?></strong>
                  </span>
               </div>
               <div class="text-center mt-4 mt-md-0">
                  <span>
                     Email <br>
                     <strong class="text-color-dark"><?php echo $pay->email; ?></strong>
                  </span>
               </div>
               <div class="text-center mt-4 mt-md-0">
                  <span>
                     Total <br>
                     <strong class="text-color-dark">Rp. <?php echo $pay->jmlbayar; ?></strong>
                  </span>
               </div>
               <div class="text-center mt-4 mt-md-0">
                  <span>
                     Pembayaran <br>
                     <strong class="text-color-dark"><?php echo $pay->payment_method; ?></strong>
                  </span>
               </div>
               <?php endforeach; ?>
            </div>
            <div class="card border-width-3 border-radius-0 border-color-hover-dark mb-4">
               <div class="card-body">
                  <h4 class="font-weight-bold text-uppercase text-4 mb-3">Pesanan Anda</h4>
                  <table class="shop_table cart-totals mb-0">
                     <tbody>
                        <tr>
                           <td colspan="2" class="border-top-0">
                              <strong class="text-color-dark">Produk</strong>
                           </td>
                        </tr>
                        <?php foreach ($carts as $ct) : ?>
                        <tr>
                           <td>
                              <strong class="d-block text-color-dark line-height-1 font-weight-semibold"><?php echo $ct->name; ?> <span class="product-qty">x<?php echo $ct->quantity; ?></span></strong>                              
                           </td>
                           <td class="text-end align-top">
                              <span class="amount font-weight-medium text-color-grey"><?php echo rupiah($ct->price); ?></span>
                           </td>
                        </tr>
                        <?php endforeach; ?>

                        <tr class="cart-subtotal">
                           <td class="border-top-0">
                              <strong class="text-color-dark">Subtotal</strong>
                           </td>
                           <td class="border-top-0 text-end">
                              <strong><span class="amount font-weight-medium"><?php echo rupiah(get_subtotal($cart_id)); ?></span></strong>
                           </td>
                        </tr>                        
                        <tr class="total">
                           <td>
                              <strong class="text-color-dark text-3-5">Total</strong>
                           </td>
                           <td class="text-end">
                              <strong class="text-color-dark"><span class="amount text-color-dark text-5"><?php echo rupiah(get_subtotal($cart_id)); ?></span></strong>
                           </td>
                        </tr>
                        <tr>
                           <td>
                           <div class="row pt-3">
                        <div class="col-lg-12">
                <h2 class="text-color-dark font-weight-bold text-5-5 mb-1">Unggah Bukti Pembayaran</h2>
                <form action="<?php echo base_url('Cart/upload_payment_proof'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="mb-3">
                        <label for="payment_proof" class="form-label">Pilih Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="payment_proof" accept="image/*" required>
                    </div>
                    <input type="hidden" name="cart_id" value="<?php echo $cart_id; ?>">
                    <button type="submit" class="btn btn-primary">Unggah</button>
                </form>
            </div>
        </div>
                        </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="row pt-3">
               <div class="col-lg-12 mb-4 mb-lg-0">
                  <h2 class="text-color-dark font-weight-bold text-5-5 mb-1">Detail Pembayaran</h2>
                  <?php foreach ($payments as $addr) : ?>
                  <ul class="list list-unstyled text-2 mb-0">
                     <li class="mb-0"><?php echo $addr->namalengkap; ?></li>
                     <li class="mb-0"><?php echo $addr->alamat; ?>, <?php echo $addr->kota; ?>
                     <li class="mb-0"><?php echo $addr->provinsi; ?>, <?php echo $addr->kodepos; ?></li>
                     <li class="mb-0"><?php echo $addr->telepon; ?></li>
                     <li class="mt-3 mb-0"><?php echo $addr->email; ?></li>
                  </ul>
                  <?php endforeach; ?>
               </div>              
            </div>
            </div>
         </div>
      </div>
   </div>
</div>
