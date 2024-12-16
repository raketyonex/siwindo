<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Checkout Pembayaran</h2>

        <div class="mb-4">
            <p>Nomor Virtual Account: <strong><?= $virtual_account; ?></strong></p>
            <p>Total Harga: Rp <?= number_format($pesanan['total_harga'], 0, ',', '.'); ?></p>
        </div>

        <form action="<?= site_url('user/proses_checkout/'.$pesanan['id']); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="bukti_transfer">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti_transfer" required>
            </div>
            <button type="submit" class="btn btn-success">Submit Pembayaran</button>
        </form>
    </div>
</body>
</html>
