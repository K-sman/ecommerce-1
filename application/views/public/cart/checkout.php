<div role="main" class="main shop pb-4">

<?php foreach ($carts as $get) :
$cart_id = $get->cart_id;
$nameproduct = $get->name;

endforeach; ?>

   <div class="container">

      <div class="row">
         <div class="col">
         <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
            <li class="text-transform-none me-2">
               <a href="<?php echo base_url('Cart'); ?>" class="text-decoration-none text-color-dark text-color-hover-primary">Keranjang Belanja</a>
            </li>
            <li class="text-transform-none text-color-grey-lighten me-2">
               <a href="<?php echo base_url('Cart/checkout/' . $cart_id); ?>" class="text-decoration-none text-color-grey-lighten text-color-primary">Pembayaran</a>
            </li>
            <li class="text-transform-none text-color-grey-lighten">
               <a href="<?php echo base_url('Cart/complete/' . $cart_id); ?>" class="text-decoration-none text-color-grey-lighten text-color-hover-primary">Pesanan</a>
            </li>
         </ul>
         </div>
      </div>     

      <form role="form" class="needs-validation" method="post" action="<?php echo base_url('Cart/addpayment'); ?>">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
      <input type="hidden" class="form-control" name="cart_id" value="<?php echo $cart_id; ?>" readonly>
      <input type="hidden" class="form-control" name="nameproduct" value="<?php echo $nameproduct; ?>" readonly>
         <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
               <h2 class="text-color-dark font-weight-bold text-5-5 mb-3">Detail Pembayaran</h2>
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label">Nama Lengkap <span class="text-color-danger">*</span></label>
                     <input type="text" class="form-control h-auto py-2" name="namalengkap" value="<?php echo $this->session->userdata('name'); ?>" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Anda')" oninput="setCustomValidity('')" />
                  </div>                  
               </div>
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label">Perusahaan (opsional)</label>
                     <input type="text" class="form-control h-auto py-2" name="perusahaan" />
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label">Alamat <span class="text-color-danger">*</span></label>                     
                     <textarea class="form-control h-auto py-2" name="alamat" rows="3" required oninvalid="this.setCustomValidity('Mohon isi Alamat')" oninput="setCustomValidity('')"></textarea>
                  </div>
               </div>              
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label">Kabupaten/Kota <span class="text-color-danger">*</span></label>
                     <input type="text" class="form-control h-auto py-2" name="kota" required oninvalid="this.setCustomValidity('Mohon isi Kota')" oninput="setCustomValidity('')" />
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label">Provinsi <span class="text-color-danger">*</span></label>
                     <div class="custom-select-1">
                        <select class="form-select form-control h-auto py-2" name="provinsi" required oninvalid="this.setCustomValidity('Mohon pilih Provinsi')" oninput="setCustomValidity('')">
                           <option value="" selected></option>
                           <?php foreach ($province as $pro) { ?>
                              <option value="<?php echo $pro->nama_prov; ?>"><?php echo $pro->nama_prov; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label">Kode Pos <span class="text-color-danger">*</span></label>
                     <input type="text" class="form-control h-auto py-2" name="kodepos" required oninvalid="this.setCustomValidity('Mohon isi Kode Pos')" oninput="setCustomValidity('')" />
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label">Telepon <span class="text-color-danger">*</span></label>
                     <input type="number" class="form-control h-auto py-2" name="telepon" value="<?php echo $this->session->userdata('phone'); ?>" required oninvalid="this.setCustomValidity('Mohon isi Telepon')" oninput="setCustomValidity('')" />
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label">Email <span class="text-color-danger">*</span></label>
                     <input type="email" class="form-control h-auto py-2" name="email" value="<?php echo $this->session->userdata('email'); ?>" required oninvalid="this.setCustomValidity('Mohon isi Email')" oninput="setCustomValidity('')" />
                  </div>
               </div>               
               
               <div class="row">
                  <div class="form-group col">
                     <label class="form-label">Catatan (opsional)</label>
                     <textarea class="form-control h-auto py-2" name="catatan" rows="5" placeholder="Notes about you orderm e.g. special notes for delivery"></textarea>
                  </div>
               </div>

            </div>
            <div class="col-lg-5 position-relative">
               <div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
                  <div class="card-body">
                     <h4 class="font-weight-bold text-uppercase text-4 mb-3">Pesanan Anda</h4>
                     <table class="shop_table cart-totals mb-3">
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
                           <input type="hidden" class="form-control" name="jmlbayar" value="<?php echo get_subtotal($cart_id); ?>" />

                           <tr class="payment-methods">
                              <td colspan="2">
                                 <strong class="d-block text-color-dark mb-2">Pembayaran</strong>

                                 <div class="d-flex flex-column">
                                    <label class="d-flex align-items-center text-color-grey mb-0">
                                       <input type="radio" class="me-2" id="bank" name="payment_method" value="BANK BCA" checked />
                                       Transfer Bank BCA
                                    </label>
                                    <p id="detailbca">Langsung Transfer Ke Akun Bank BCA Kami<br>No. Rek xxx xxxxx xx an. CV. LESTARI PRINTING</p>
                                    <label class="d-flex align-items-center text-color-grey mb-0">
                                       <input type="radio" class="me-2" id="bank" name="payment_method" value="BANK BNI" />
                                       Transfer Bank BNI
                                    </label>
                                    <p id="detailbni">Langsung Transfer Ke Akun Bank BNI Kami<br>No. Rek xxx xxxxx xx an. CV. LESTARI PRINTING</p>                                    
                                    <label class="d-flex align-items-center text-color-grey mb-0">
                                       <input type="radio" class="me-2" id="bank" name="payment_method" value="BANK MANDIRI" />
                                       Transfer Bank Mandiri
                                    </label>
                                    <p id="detailbni">Langsung Transfer Ke Akun Bank Mandiri Kami<br>No. Rek xxx xxxxx xx an. CV. LESTARI PRINTING</p>
                                    <label class="d-flex align-items-center text-color-grey mb-0">
                                       <input type="radio" class="me-2" id="bank" name="payment_method" value="BANK BRI" />
                                       Transfer Bank BRI
                                    </label>
                                    <p id="detailbni">Langsung Transfer Ke Akun Bank BRI Kami<br>No. Rek xxx xxxxx xx an. CV. LESTARI PRINTING</p>
                                 </div>
                                 <input type="checkbox" class="checkbox" name="terms" required />
                                 <span>Jangan lupa foto atau tangkap layar bukti pembayaran <a href="#" class="woocommerce-terms-and-conditions-link" target="_blank">Konfirmasi Bukti Pembayaran</a></span>&nbsp;<abbr class="required" title="required">*</abbr>                                    
                              </td>
                           </tr>                          
                        </tbody>
                     </table>
                     <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">Pesan Sekarang <i class="fas fa-arrow-right ms-2"></i></button>
                  </div>
               </div>
            </div>
         </div>
      </form>

   </div>

</div>
