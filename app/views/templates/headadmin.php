<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPPMA <?= $data['judul'];?></title>
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/styleAdmin.css">
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="profile">
            <img src="<?= BASEURL ?>/img/Profile_icon.png" alt="Profile" class="profile-img">
            <h3 class="profile-name">Hallo <?= $data['nama'];?></h3>
            <p class="profile-name"><?= $data['NIP']?></p>
        </div>
        <nav class="menu">
            <a href="<?= BASEURL?>/admin" class="menu-item"> 
                <img src="<?= BASEURL ?>/img/Beranda_Icon.png" alt="Beranda Icon" class="menu-icon">Beranda
            </a>
            <a href="<?= BASEURL?>/admin/profile" class="menu-item">
                <img src="<?= BASEURL ?>/img/Profile_Icon.png" alt="Profile Icon" class="menu-icon">Profile
            </a>
            <a href="<?= BASEURL?>/admin/inputAgenda" class="menu-item">
                <img src="<?= BASEURL ?>/img/InputAgenda_Icon.png" alt="Input Agenda Icon" class="menu-icon">Input Agenda
            </a>
            <a href="<?= BASEURL?>/admin/leaderboard" class="menu-item">
                <img src="<?= BASEURL ?>/img/Leaderboard_Icon.png" alt="Leaderboard Icon" class="menu-icon">Leader Board
            </a>
            <a href="<?= BASEURL?>/admin/validasiInput" class="menu-item">
                <img src="<?= BASEURL ?>/img/Validasi_Icon.png" alt="Validasi Icon" class="menu-icon">Validasi Input
            </a>
            <a href="<?= BASEURL?>/admin/validasiMessage" class="menu-item">
                <img src="<?= BASEURL ?>/img/Validasi_Icon.png" alt="Validasi Icon" class="menu-icon">Validasi Message
            </a>
        </nav>
        <footer>
            <p>© polinema.sch.id</p>
        </footer>
    </aside>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <img src="<?= BASEURL ?>/img/logo_SIPPMA.png" alt="Logo">
        </div>
        <h1 class="teks">
            IPP<span class="highlight">MA</span>
        </h1>
        <div class="logout">
        <button onclick="window.location.href='<?= BASEURL ?>/login/logout'">Logout</button>
        </div>
    </header>