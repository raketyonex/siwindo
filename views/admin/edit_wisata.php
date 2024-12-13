<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wisata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
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
        <h2>Edit Wisata</h2>

        <form action="<?= base_url('admin/edit_wisata/'.$wisata['id']); ?>" method="POST">
            <div class="form-group">
                <label for="nama">Nama Wisata</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $wisata['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Wisata</label>
                <select class="form-control" id="jenis" name="jenis" required>
                    <option value="gunung" <?= $wisata['jenis'] == 'gunung' ? 'selected' : ''; ?>>Gunung</option>
                    <option value="pantai" <?= $wisata['jenis'] == 'pantai' ? 'selected' : ''; ?>>Pantai</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $wisata['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?= $wisata['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $wisata['latitude']; ?>" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $wisata['longitude']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar URL</label>
                <input type="text" class="form-control" id="gambar" name="gambar" value="<?= $wisata['gambar']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Wisata</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>