<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan</title>
    <style type="text/css">
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .text-center {
            text-align: center;
        }
        .img-thumbnail {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Data Pemesanan</h1>
    <table class="table">
        <?php foreach ($orders as $order): ?>
            <?php if ($order->id_cartsitem == $selected_id_cartsitem): ?>
                <tr>
                    <th>Nama Pemesan</th>
                    <td><?php echo $order->customer_name; ?></td>
                </tr>
                <tr>
                    <th>Product</th>
                    <td><?php echo $order->product_name; ?></td>
                </tr>
                <tr>
                    <th>Jenis Bahan</th>
                    <td><?php echo !empty($order->material_name) ? $order->material_name : '-'; ?></td>
                </tr>
                <tr>
                    <th>Ukuran</th>
                    <td><?php echo !empty($order->ukuran) ? $order->ukuran : '-'; ?></td>
                </tr>
                <tr>
                    <th>Finishing</th>
                    <td><?php echo !empty($order->finishing_name) ? $order->finishing_name : '-'; ?></td>
                </tr>
                <tr>
                    <th>Laminasi</th>
                    <td><?php echo !empty($order->lamination_name) ? $order->lamination_name : '-'; ?></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><?php echo !empty($order->size_name) ? $order->size_name : '-'; ?></td>
                </tr>
                <tr>
                    <th>File Contoh</th>
                    <td>
                        <?php if (!empty($order->filecontoh)): ?>
                            <img src="<?php echo base_url('public/orders/' . $order->filecontoh); ?>" alt="File Contoh" class="img-thumbnail">
                        <?php else: ?>
                            Tidak ada file
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td><?php echo $order->keterangan; ?></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td><?php echo $order->quantity; ?></td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td><?php echo $order->price; ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>
