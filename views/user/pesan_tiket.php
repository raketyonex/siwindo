<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light py-5">

<div class="container bg-white p-5 rounded shadow-sm">
    <h2 class="text-center text-primary mb-4">Pesan Tiket</h2>
    <form action="<?= site_url('user/simpan_pesanan'); ?>" method="POST">
        <input type="hidden" name="wisata_id" value="<?= $wisata['id']; ?>">

        <div class="mb-3">
            <label for="nama_pemesan" class="form-label">Atas Nama</label>
            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
        </div>

        <div class="mb-3">
            <label for="wisata" class="form-label">Nama Wisata</label>
            <input type="text" class="form-control" id="wisata" value="<?= $wisata['nama']; ?>" readonly>
        </div>
        
        <div class="mb-3">
            <label for="harga" class="form-label">Harga per Tiket</label>
            <input type="text" class="form-control" id="harga" value="Rp <?= number_format($wisata['harga'], 0, ',', '.'); ?>" readonly>
        </div>
        
        <div class="mb-3">
            <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
            <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" required min="1">
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="total_harga" value="Rp 0" readonly>
        </div>

        <button type="submit" class="btn btn-primary w-100">Pesan Tiket</button>
    </form>
</div>

<script>
    document.getElementById('jumlah_tiket').addEventListener('input', function() {
        var jumlah_tiket = this.value;
        var harga = <?= $wisata['harga']; ?>;
        var total_harga = jumlah_tiket * harga;
        
        document.getElementById('total_harga').value = "Rp " + total_harga.toLocaleString();
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>