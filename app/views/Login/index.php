<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASECSS ?>/styleLogin.css">
    <title>SIPPMA</title>
    <link rel="icon" type="image/png" href="<?= BASEIMG ?>/Logo_SIPPMA.png">
</head>
<body>
    <div class="background">
        <div class="overlay">
            <div class="login-card">
                <div class="logo-container">
                    <img src="<?= BASEIMG ?>/Logo_SIPPMA.png" alt="Logo" class="logo">
                </div>
                <h2>LOGIN</h2>
                <p class="subtitle">SISTEM PENCATATAN PRESTASI MAHASISWA</p>
                <form action="<?= URL; ?>/Login/auth" method="post">
                    <input type="text" name="username" placeholder="USERNAME" required>
                    <input type="password" name="password" placeholder="PASSWORD" required>
                    <a href="<?= URL; ?>/Login/forgot" class="forgot-password">Forgot Password ?</a>
                    <button type="submit">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>