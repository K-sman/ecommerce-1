<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style type="text/css">
        .table {
            width: 100%;
            border-spacing: 0;
        }
        .table tr:first-child th,
        .table tr:first-child td {
            border-top: 1px solid black;
        }
        .table tr th:first-child,
        .table tr td:first-child {
            border-left: 1px solid black;
        }
        .table tr th,
        .table tr td {
            border-right: 1px solid black;
            border-bottom: 1px solid black;
            padding: 4px;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Laporan Pembayaran Percetakan Lestari</h1>
    <h3 class="text-center">Periode: <?php echo date("d/m/Y", strtotime($start_date)); ?> - <?php echo date("d/m/Y", strtotime($end_date)); ?></h3>
    <table class="table table-bordered table-striped mb-0" id="datatable-default">
        <thead>
            <tr>
                <th width="20px" class="text-center">No</th>
                <th width="100px">Tanggal</th>
                <th width="80px">ID Pesanan</th>
                <th width="80px">Pelanggan</th>
                <th width="80px">Produk</th>
                <th width="90px">Metode Bayar</th>
                <th width="80px">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Pastikan $payments adalah array dan tidak kosong
            if (isset($payments) && is_array($payments) && count($payments) > 0) {
                $no = 1;
                foreach ($payments as $dt) :
            ?>
                <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td><?php echo tgl_indo($dt->tglbayar); ?></td>
                    <td><?php echo $dt->cart_id; ?><?php echo date("dmY", strtotime($dt->tglbayar)); ?></td>
                    <td><?php echo $dt->namalengkap; ?></td>
                    <td><?php echo $dt->nameproduct; ?></td>
                    <td><?php echo $dt->payment_method; ?></td>
                    <td><?php echo rupiah($dt->jmlbayar); ?></td>
                </tr>
                <?php 
                    $no++;
                endforeach;
            } else {
                // Jika tidak ada data, tampilkan pesan
                echo '<tr><td colspan="7" class="text-center">Tidak ada data</td></tr>';
            }
            ?>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-center"><strong>Total</strong></td>
                    <td><?php echo isset($grand_total) ? rupiah($grand_total) : '0'; ?></td>
                </tr>
            </tfoot>
        </tbody>
    </table>
</body>
</html>
