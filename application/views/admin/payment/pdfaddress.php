<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style type="text/css">
        .table{
            width: 100%;
            border-spacing: 0;
        }
        .table tr:first-child th,
        .table tr:first-child td{
            border-top: 1px solid black;
        }
        .table tr th:first-child,
        .table tr td:first-child{
            border-left: 1px solid black;
        }
        .table tr th,
        .table tr td{
            border-right: 1px solid black;
            border-bottom: 1px solid black;
            padding: 4px;
        }
        .text-center{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Data Pemesanan</h1>
    <table class="table table-bordered table-striped mb-0" id="datatable-default">
        <thead>
            <tr>
                <th width="80px">ID Pesanan</th>                        
                <th width="80px">Pelanggan</th>  
                <th width="80px">Jumlah</th>                        
                <th width="90px">Metode Bayar</th>                        
                <th width="80px">Produk</th>
                <th width="80px">Alamat</th>                      
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><?php echo $payment->cart_id; ?><?php echo date("dmY", strtotime($payment->tglbayar)); ?></td>                           
                <td><?php echo $payment->namalengkap; ?><br><?php echo $payment->email; ?><br><?php echo $payment->telepon; ?></td>
                <td><?php echo rupiah($payment->jmlbayar); ?></td>                           
                <td class="text-center"><?php echo $payment->payment_method; ?></td>                           
                <td class="text-center"><?php echo $payment->nameproduct; ?></td>
                <td><?php echo $payment->alamat; ?><br><?php echo $payment->kota; ?>-<?php echo $payment->provinsi; ?></td>
            </tr>                     
        </tbody>
    </table>
</body>
</html>
