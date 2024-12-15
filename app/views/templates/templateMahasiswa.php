<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?=BASEIMG?>/logo_SIPPMA.png">
    <title>SIPPMA <?=$data['judul']?></title>   
    <link rel="stylesheet" href="<?= BASECSS?>/global.css">
    <link rel="stylesheet" href="<?= BASECSS?>/agenda.css">
    <link rel="stylesheet" href="<?= BASECSS?>/leaderboard.css">
    <link rel="stylesheet" href="<?= BASECSS?>/fitur.css">
    <link rel="stylesheet" href="<?= BASECSS?>/faq.css">
    <link rel="stylesheet" href="<?= BASECSS?>/profile.css">
    <link rel="stylesheet" href="<?= BASECSS?>/prestasi.css">
    <link rel="stylesheet" href="<?= BASECSS?>/cetakPrestasi.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <img src="<?=BASEIMG?>/logo_SIPPMA.png" alt="Logo">
            </div>
            <h1 class="teks">
                IPP<span class="highlight">MA</span>
            </h1>
            <div class="logout">
                <button onclick="window.location.href='<?= BASEURL ?>/login/logout'">Logout</button>
            </div>
        </header>
        <div class="main">
            <aside class="sidebar">
                <div class="profile">
                    <img src="<?=BASEIMG?>/profil.png" alt="Profile" class="profile-img">
                    <h3 class="profile-name"><?=$data['namaMhs']?></h3>
                    <p class="profile-name"><?=$data['NIM']?></p>
                    <p class="profile-name"><?=$data['prodi']?></p>
                </div>
                <nav class="menu">
                    <a href="<?=BASEURL?>/mahasiswa/beranda" class="menu-item"> 
                        <img src="<?=BASEIMG?>/Beranda_Icon.png" alt="Beranda Icon" class="menu-icon">Beranda
                    </a>
                    <a href="<?=BASEURL?>/mahasiswa/profile" class="menu-item">
                        <img src="<?=BASEIMG?>/Profile_Icon.png" alt="Profile Icon" class="menu-icon">Profile
                    </a>
                    <a href="<?=BASEURL?>/mahasiswa/prestasi" class="menu-item">
                        <img src="<?=BASEIMG?>/Leaderboard_Icon.png" alt="Validasi Icon" class="menu-icon">Prestasi
                    </a>
                    <a href="<?=BASEURL?>/mahasiswa/cetakprestasi" class="menu-item">
                        <img src="<?=BASEIMG?>/Cetak_Icon.png" alt="Cetak Icon" class="menu-icon">Cetak Prestasi
                    </a>
                    <a href="<?=BASEURL?>/mahasiswa/bantuan" class="menu-item">
                        <img src="<?=BASEIMG?>/Help_Icon.png" alt="bantuan Icon" class="menu-icon">Bantuan
                    </a>
                </nav>
                <footer>
                    <p>© polinema.sch.id</p>
                </footer>
            </aside>
       