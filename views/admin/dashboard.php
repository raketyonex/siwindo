<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('admin'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/tambah_wisata'); ?>">Tambah Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/data_tiket'); ?>">Data Tiket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('logout'); ?>">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Dashboard</h2>

        <form method="get" class="mb-4">
            <label for="jenis">Pilih Jenis Wisata:</label>
            <select class="form-control" id="jenis" name="jenis" onchange="this.form.submit()">
                <option value="">Semua</option>
                <option value="gunung" <?= isset($_GET['jenis']) && $_GET['jenis'] == 'gunung' ? 'selected' : ''; ?>>Gunung
                </option>
                <option value="pantai" <?= isset($_GET['jenis']) && $_GET['jenis'] == 'pantai' ? 'selected' : ''; ?>>Pantai
                </option>
            </select>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Wisata</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($wisata): ?>
                    <?php foreach ($wisata as $key => $item): ?>
                        <?php if (empty($_GET['jenis']) || $_GET['jenis'] == $item['jenis']): ?>
                            <tr>
                                <td><?= $item['nama']; ?></td>
                                <td><?= ucfirst($item['jenis']); ?></td>
                                <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                                <td><?= substr($item['deskripsi'], 0, 100) . '...'; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('admin/edit_wisata/' . $item['id']); ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('admin/hapus_wisata/' . $item['id']); ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data wisata</td>
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