<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center mb-4">Login</h2>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= site_url('login') ?>">
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>

                    <p class="text-center mt-3">Belum punya akun? <a href="<?= site_url('register') ?>">Registrasi disini</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>