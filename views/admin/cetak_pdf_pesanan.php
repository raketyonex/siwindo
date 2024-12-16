<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pesanan</title>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px;
            text-align: center;
        }

        h3 {
            font-family: Verdana;
        }

        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <h3>
        <center>Laporan Data Pesanan</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Tgl Pemesanan</th>
                <th>Wisata</th>
                <th>Jumlah Tiket</th>
                <th>Status</th>
                <th>Total Harga</th>
                <th>Bukti Transfer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($pesanan as $b) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['nama_pemesan']; ?></td>
                    <td><?= $b['tanggal_pemesanan']; ?></td>
                    <td><?= $b['nama_wisata']; ?></td>
                    <td><?= $b['jumlah_tiket']; ?></td>
                    <td><?= $b['status']; ?></td>
                    <td>Rp <?= number_format($b['total_harga'], 0, ',', '.'); ?></td>
                    <td>
                        <?php if (!empty($b['bukti_transfer'])): ?>
                            <img src="<?= base_url('assets/images/uploads/' . $b['bukti_transfer']); ?>" alt="Bukti Transfer">
                        <?php else: ?>
                            Belum ada bukti transfer
                        <?php endif; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
