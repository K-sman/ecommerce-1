<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Daftar Pembayaran</h2>
        <div class="right-wrapper text-end">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li><span>Daftar Pembayaran</span></li>
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
                    <h2 class="card-title">Daftar Pembayaran&emsp;</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <div class="row">
                            <div class="col">
                            <form method="GET" action="">
                                <label for="start_date">Tanggal Awal:</label>
                                <input type="date" id="start_date" name="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>" required>

                                <label for="end_date">Tanggal Akhir:</label>
                                <input type="date" id="end_date" name="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>" required>

                                <label for="status">Status:</label>
                                <select id="status" name="status">
                                    <option value="">-- Semua Status --</option>
                                    <option value="S" <?php echo isset($_GET['status']) && $_GET['status'] == 'S' ? 'selected' : ''; ?>>Pembayaran Diterima</option>
                                    <option value="B" <?php echo isset($_GET['status']) && $_GET['status'] == 'B' ? 'selected' : ''; ?>>Pesanan Diproses</option>
                                    <option value="T" <?php echo isset($_GET['status']) && $_GET['status'] == 'T' ? 'selected' : ''; ?>>Pesanan Selesai Dikerjakan</option>
                                    <option value="F" <?php echo isset($_GET['status']) && $_GET['status'] == 'F' ? 'selected' : ''; ?>>Pembayaran Ditolak</option>
                                </select>

                                <label for="customer_name">Nama Pelanggan:</label>
                                <input type="text" id="customer_name" name="customer_name" value="<?php echo isset($_GET['customer_name']) ? $_GET['customer_name'] : ''; ?>">

                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="<?php echo base_url('admin/export?start_date=' . urlencode(isset($_GET['start_date']) ? $_GET['start_date'] : '') . '&end_date=' . urlencode(isset($_GET['end_date']) ? $_GET['end_date'] : '') . '&status=' . urlencode(isset($_GET['status']) ? $_GET['status'] : '') . '&customer_name=' . urlencode(isset($_GET['customer_name']) ? $_GET['customer_name'] : '')); ?>" class="btn btn-danger" target="_blank">
                                    <i class="fa fa-file-pdf-o"></i> Export PDF
                                </a>
                            </form>

                            </div>
                        </div>
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th width="80px">Tanggal</th>
                                <th width="80px">ID Pesanan</th>
                                <th width="80px">Jumlah</th>
                                <th width="90px">Metode Bayar</th>
                                <th width="80px">Pelanggan</th>
                                <th width="80px">Produk</th>
                                <th width="80px">Alamat</th>
                                <th width="80px">Status</th>
                                <th width="80px">Opsi</th>
                                <th width="20px" class="text-center">Bukti Pembayaran</th>
                                <!-- <th width="20px" class="text-center">Cetak</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
                            $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
                            $status = isset($_GET['status']) ? $_GET['status'] : null;
                            $customer_name = isset($_GET['customer_name']) ? $_GET['customer_name'] : null;
                            $payments = $this->Payments->getFilteredPayments($start_date, $end_date, $status, $customer_name);
                            ?>
                            <?php $no = 1; ?>
                            <?php foreach ($payments as $dt) : ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo tgl_indo($dt->tglbayar); ?></td>
                                    <td><?php echo $dt->cart_id; ?></td>
                                    <td><?php echo rupiah($dt->jmlbayar); ?></td>
                                    <td><?php echo $dt->payment_method; ?></td>
                                    <td><?php echo $dt->namalengkap; ?><br><?php echo $dt->email; ?><br><?php echo $dt->telepon; ?></td>
                                    <td><?php echo $dt->nameproduct; ?></td>
                                    <td><?php echo $dt->alamat; ?><br> <?php echo $dt->kota; ?>-<?php echo $dt->provinsi; ?></td>
                                    <td>
                                    <?php
                                    switch ($dt->status) {
                                        case 'S':
                                                echo '<span class="badge badge-success">Pembayaran Diterima</span>';
                                                break;
                                        case 'B':
                                                echo '<span class="badge badge-warning">Pesanan Diproses</span>';
                                                break;
                                        case 'T':
                                                echo '<span class="badge badge-info">Pesanan Selesai Dikerjakan</span>';
                                                break;
                                        case 'F':
                                                echo '<span class="badge badge-danger">Pembayaran Ditolak</span>';
                                                break;
                                        default:
                                                echo '<span class="badge badge-secondary">Status Tidak Diketahui</span>';
                                                break;
                                    }
                                    ?>
                                    </td>
                                    <td style="white-space: nowrap; text-align: center;"><a class="mb-1 mt-1 me-1 modal-with-zoom-anim ws-normal btn btn-success btn-sm" href="#verifikasi<?php echo $dt->id; ?>"><i class="fa fa-edit"></i> Verifikasi</a></td>
                                    <td style="white-space: nowrap; text-align: center;">
                                        <?php if (!empty($dt->payment_proof)) : ?>
                                            <a href="<?php echo base_url('uploads/payments_proof/' . $dt->payment_proof); ?>" target="_blank">
                                                <img src="<?php echo base_url('uploads/payments_proof/' . $dt->payment_proof); ?>" alt="Bukti Pembayaran" width="50px">
                                            </a>
                                        <?php else : ?>
                                            Belum ada bukti pembayaran
                                        <?php endif; ?>
                                    </td>
                                    <!-- <td><a href="<?php echo base_url('admin/cetakLaporan/' . $dt->cart_id); ?>" class="btn btn-primary" target="_blank">Cetak</a></td> -->
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

    <!-- Modal Verifikasi Pembayaran -->
    <?php foreach ($payments as $up) : ?>
        <div id="verifikasi<?php echo $up->id; ?>" class="zoom-anim-dialog modal-block modal-header-color modal-block-success mfp-hide">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Verifikasi Pembayaran <a href="javascript:void(0)" class="modal-dismiss pull-right text-white">x</a></h2>
                </header>
                <form action="<?php echo base_url('admin/verifpay'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal mb-lg">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <div class="card-body">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $up->id; ?>" readonly>
                        <!-- Pilih Status Pembayaran -->
                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-start pt-2">Status</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="status" required oninvalid="this.setCustomValidity('Mohon pilih Status Pembayaran')" oninput="setCustomValidity('')">
                                    <option value="" selected>-- Pilih Status Pembayaran --</option>
                                    <option value="S">Pembayaran Diterima</option>
                                    <option value="B">Pesanan Diproses</option>
                                    <option value="T">Pesanan Selesai Dikerjakan</option>
                                    <option value="F">Pembayaran Ditolak</option>
                                 </select>
                            </div>
                        </div>
                        <!-- Tanggal Pengiriman -->
                            <div class="form-group row">
                                <label class="col-lg-2 control-label text-lg-start pt-2">Tanggal Pengiriman</label>
                                <div class="col-lg-6">
                                    <input type="date" class="form-control" name="send_order" required oninvalid="this.setCustomValidity('Mohon pilih Tanggal Pengiriman')" oninput="setCustomValidity('')">
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="submit" name="simpan" class="btn btn-success"><i class="fas fa-save text-white"></i> Submit</button>
                                    <button class="btn btn-default modal-dismiss">Batal</button>
                                </div>
                            </div>
                        </footer>
                    </div>
                </form>
            </section>
        </div>
    <?php endforeach; ?>

</section>
