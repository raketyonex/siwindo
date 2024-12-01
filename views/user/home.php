<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Riwayat Pesanan Anda</h2>

            <div>
                <a href="<?= site_url(''); ?>" class="btn btn-success">Destinasi</a>
                <a href="<?= site_url('logout'); ?>" class="btn btn-danger ml-2">Logout</a>
            </div>
        </div>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger mb-4"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <?php if (empty($pesanan)): ?>
            <p>Tidak ada pesanan yang ditemukan.</p>
        <?php else: ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Atas Nama</th>
                        <th>Tgl Pesanan</th>
                        <th>Nama Wisata</th>
                        <th>Jumlah Tiket</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesanan as $pesan): ?>
                    <tr>
                        <td><?= $pesan['nama_pemesan']; ?></td>
                        <td><?= $pesan['tanggal_pemesanan']; ?></td>
                        <td><?= $pesan['nama']; ?></td>
                        <td><?= $pesan['jumlah_tiket']; ?></td>
                        <td>Rp <?= number_format($pesan['total_harga'], 0, ',', '.'); ?></td>
                        <td><?= $pesan['status']; ?></td>
                        <td>
                            <?php if ($pesan['status'] != 'selesai'): ?>
                                <a href="<?= site_url('user/batal_pesanan/'.$pesan['id']); ?>" class="btn btn-danger">Batal</a>
                            <?php else: ?>
                                <a href="<?= site_url('user/cetak_tiket/'.$pesan['id']); ?>" class="btn btn-primary">Cetak Tiket</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>