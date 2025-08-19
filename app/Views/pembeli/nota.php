<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi</title>
    <style>
        body {
            font-family: monospace;
            font-size: 12px;
            width: 300px;
            margin: 0 auto;
        }
        .container {
            padding: 10px;
        }
        .header, .footer {
            text-align: center;
        }
        .line {
            border-top: 1px dashed black;
            margin: 10px 0;
        }
        .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        .total {
            font-weight: bold;
        }
        @media print {
            body {
                width: 100%;
                margin: 0;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <div class="header">
            <h3>TOKO MAGANG</h3>
            <p>Jl. Melati Gg. Sutopadan No.7, Cobongan, Ngestiharjo,<br> Kec. Kasihan, Kabupaten Bantul,<br> Daerah Istimewa Yogyakarta 55184</p>
        </div>
        <div class="line"></div>
        <div class="info">
            <p><?= date('Y-m-d') ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nalindra</p>
            <p><?= date('H:i:s') ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
            <p>No.0-<?= rand(1, 99) ?></p>
        </div>
        <div class="line"></div>
        <div class="items">
            <?php $sub_total = 0; ?>
            <?php foreach ($keranjang as $item): ?>
                <div class="item">
                    <span><?= $item['nama_produk'] ?></span>
                </div>
                <div class="item">
                    <span><?= $item['stok'] ?> X <?= number_format($item['harga'], 0, ',', '.') ?></span>
                    <span>Rp <?= number_format($item['total_harga'], 0, ',', '.') ?></span>
                </div>
                <?php $sub_total += $item['total_harga']; ?>
            <?php endforeach; ?>
        </div>
        <div class="line"></div>
        <div class="item sub-total">
            <span>Sub Total</span>
            <span><?= number_format($sub_total, 0, ',', '.') ?></span>
        </div>
        <div class="item total">
            <span>Total</span>
            <span><?= number_format($sub_total, 0, ',', '.') ?></span>
        </div>
        <div class="item">
            <span>Bayar (Cash)</span>
            <span><?= number_format($sub_total, 0, ',', '.') ?></span>
        </div>
        <div class="item">
            <span>Kembali</span>
            <span>0</span>
        </div>
        <div class="line"></div>
        <div class="footer">
            <p>Link Kritik dan Saran:<br></p>
        </div>
    </div>
</body>
</html>
