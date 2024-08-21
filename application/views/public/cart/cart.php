<div role="main" class="main shop pb-4">

<?php if (empty($carts)) : ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="font-weight-bold text-center">Keranjang Belanja Anda Kosong</h2>
                <p class="text-center">Silakan kembali ke halaman <a href="<?php echo base_url('Home'); ?>" class="text-color-primary">Beranda</a> untuk menambahkan produk ke keranjang belanja Anda.</p>
            </div>
        </div>
    </div>
<?php else: ?>
    <!-- Isi keranjang belanja -->
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
                    <li class="text-transform-none me-2">
                        <a href="<?php echo base_url('Cart'); ?>" class="text-decoration-none text-color-primary">Keranjang Belanja</a>
                    </li>
                    <?php if (isset($cart_id)) : ?>
                        <li class="text-transform-none text-color-grey-lighten me-2">
                            <a href="<?php echo base_url('Cart/checkout/' . $cart_id); ?>" class="text-decoration-none text-color-grey-lighten text-color-hover-primary">Pembayaran</a>
                        </li>
                        <li class="text-transform-none text-color-grey-lighten">
                            <a href="<?php echo base_url('Cart/complete/' . $cart_id); ?>" class="text-decoration-none text-color-grey-lighten text-color-hover-primary">Pesanan</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="row pb-4 mb-5">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <form method="post" action="">
                    <div class="table-responsive">
                        <table class="shop_table cart">
                            <thead>
                                <tr class="text-color-dark">
                                    <th class="product-thumbnail" width="15%">
                                        &nbsp;
                                    </th>
                                    <th class="product-name text-uppercase" width="30%">
                                        Produk
                                    </th>
                                    <th class="product-price text-uppercase" width="15%">
                                        Harga
                                    </th>
                                    <th class="product-quantity text-uppercase text-center" width="20%">
                                        Jumlah
                                    </th>
                                    <th class="product-subtotal text-uppercase text-end" width="20%">
                                        Subtotal
                                    </th>
                                    <th class="product-cancel text-uppercase text-center" width="20%">
                                        Batal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($carts as $ct) : ?>
                                <tr class="cart_table_item">
                                    <td class="product-thumbnail">
                                        <div class="product-thumbnail-wrapper">                              
                                            <?php if ($ct->featureimage) { ?>
                                            <a href="<?php echo base_url('Produk/detailproduk/' . $ct->id_product . '/' . $ct->categories_id); ?>" class="product-thumbnail-image">
                                                <img width="90" height="90" alt="" class="img-fluid" src="<?php echo base_url('public/featureimage/' . $ct->featureimage); ?>">
                                            </a>
                                            <?php } else { ?>
                                            <a href="#" class="product-thumbnail-image">
                                                <img width="90" height="90" alt="" class="img-fluid" src="<?php echo base_url($public_dir); ?>/img/products/product-grey-1.jpg">
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a href="<?php echo base_url('Produk/detailproduk/' . $ct->id_product . '/' . $ct->categories_id); ?>" class="font-weight-semi-bold text-color-dark text-color-hover-primary text-decoration-none"><?php echo $ct->name; ?></a>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount font-weight-medium text-color-grey"><?php echo $ct->price; ?></span>
                                    </td>
                                    <td class="product-quantity text-center">
                                        <span class="font-weight-medium text-color-grey"><?php echo $ct->quantity; ?></span>
                                    </td>
                                    <td class="product-subtotal text-end prods">
                                        <span class="amount text-color-dark font-weight-bold text-4"><?php echo $ct->price; ?></span>
                                        <input type="hidden" class="form-control prod" id="subtotal[]" value="<?php echo $ct->price; ?>">
                                    </td>
                                    <td class="product-actions">
                                        <a href="<?php echo base_url('Cart/cancelOrder/' . $ct->id_cartsitem); ?>" class="btn btn-danger btn-sm">Batal Pesanan</a>
                                    </td>                        
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 position-relative">
                <div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
                    <div class="card-body">
                        <h4 class="font-weight-bold text-uppercase text-4 mb-3">Jumlah Barang</h4>
                        <table class="shop_table cart-totals mb-4">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <td class="border-top-0">
                                        <strong class="text-color-dark">Subtotal</strong>
                                    </td>
                                    <td class="border-top-0 text-end">
                                        <strong><span class="amount font-weight-medium" id="totalsub">Rp. <?php echo get_subtotal($cart_id); ?></span></strong>
                                    </td>
                                </tr>                        
                                <tr class="total">
                                    <td>
                                        <strong class="text-color-dark text-3-5">Total</strong>
                                    </td>
                                    <td class="text-end">
                                        <strong class="text-color-dark"><span class="amount text-color-dark text-5" id="total">Rp. <?php echo get_subtotal($cart_id); ?></span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?php echo base_url('Cart/checkout/' . $cart_id); ?>" class="btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">Lanjut ke Pembayaran <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>      
        </div>      
    </div>
<?php endif; ?>
</div>
