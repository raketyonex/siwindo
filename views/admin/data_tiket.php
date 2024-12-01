<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tiket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/tambah_wisata'); ?>">Tambah Data</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('admin/data_tiket'); ?>">Data Tiket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('logout'); ?>">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Data Tiket</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Tgl Pemesanan</th>
                    <th>Wisata</th>
                    <th>Jumlah Tiket</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($pesanan): ?>
                    <?php foreach ($pesanan as $key => $order): ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $order->nama_pemesan; ?></td>
                            <td><?= $order->tanggal_pemesanan; ?></td>
                            <td><?= $order->nama_wisata; ?></td>
                            <td><?= $order->jumlah_tiket; ?></td>
                            <td><?= ucfirst($order->status); ?></td>
                            <td>Rp <?= number_format($order->total_harga, 0, ',', '.'); ?></td>
                            <td>
                                <?php if ($order->status !== 'selesai'): ?>
                                    <a href="<?= base_url('admin/selesaikan_pesanan/'.$order->id); ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan pesanan ini?')">Selesaikan</a>
                                <?php else: ?>
                                    <span class="badge badge-success">Selesai</span>
                                <?php endif; ?>

                                <?php if ($order->status !== 'selesai'): ?>
                                    <a href="<?= base_url('admin/hapus_pesanan/'.$order->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada pesanan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>