<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASECSS ?>/forgot.css">
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
                <h2>CHANGE PASSWORD</h2>
                <form action="<?=BASEURL?>/login/reset" method="POST">
                    <div class="validasi-input-form-group">
                        <input type="text" name="nim" id="nim" placeholder="NIM / NIP" required>
                    </div> 
                    <div class="validasi-input-form-group">
                        <select name="role" id="role" required>
                            <option value=" ">ROLE</option>
                            <option value="admin">Admin</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                    <div class="validasi-input-form-group">
                        <input type="text" name="email" id="email" placeholder="EMAIL" required>
                    </div>
                    <div class="validasi-input-form-group">
                        <input type="password" name="new_password" id="new_password" placeholder="NEW PASSWORD" required>
                    </div>
                    <div class="validasi-input-form-group">
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="CONFIRM PASSWORD" required>
                    </div>
                   
                    <div class="button-container">
                        <button type="button" class="back-button" onclick="window.location.href='<?= BASEURL ?>/login/'">BACK</button>
                        <button type="submit">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>