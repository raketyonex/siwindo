<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Tiket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tiket Anda</h2><br>

        <?php if (isset($pesanan)): ?>
            <table class="table table-bordered">
                <tr>
                    <th>Atas Nama</th>
                    <td><?= $pesanan['nama_pemesan']; ?></td>
                </tr>
                <tr>
                    <th>Nama Wisata</th>
                    <td><?= $pesanan['nama_wisata']; ?></td>
                </tr>
                <tr>
                    <th>Jumlah Tiket</th>
                    <td><?= $pesanan['jumlah_tiket']; ?></td>
                </tr>
                <tr>
                    <th>Harga per Tiket</th>
                    <td>Rp <?= number_format($pesanan['harga'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>Rp <?= number_format($pesanan['total_harga'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th>Tanggal Pemesanan</th>
                    <td><?= date('d-m-Y H:i:s', strtotime($pesanan['tanggal_pemesanan'])); ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?= $pesanan['status']; ?></td>
                </tr>
            </table>
        <?php else: ?>
            <p>Data pesanan tidak ditemukan.</p>
        <?php endif; ?>

        <button onclick="window.print();" class="btn btn-success">Print</button>
        <a href="<?= site_url('user'); ?>" class="btn btn-secondary">Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>