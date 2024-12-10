<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Prestasi Mahasiswa</title>
    <link rel="stylesheet" href="../style/styleIndexMahasiswa.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile">
                <img src="../img/profil.png" alt="Profile" class="profile-img">
                <h3>Alvino Valerian</h3>
                <p>23410100100</p>
                <p>D-IV Teknik Informatika</p>
            </div>
            <nav class="menu">
                <a href="index_mahasiswa.php" class="menu-item"> 
                    <img src="../img/Beranda_Icon.png" alt="Beranda Icon" class="menu-icon">Beranda
                </a>
                <a href="profil_mahasiswa.php" class="menu-item">
                    <img src="../img/Profile_Icon.png" alt="profile Icon" class="menu-icon">Profile Mahasiswa
                </a>
                <a href="input_prestasi.php" class="menu-item">
                    <img src="../img/InputAgenda_Icon.png" alt="Input Agenda Icon" class="menu-icon">Input Prestasi
                </a>
                <a href="cetak_prestasi.php" class="menu-item">
                    <img src="../img/Cetak_Icon.png" alt="Leaderboard Icon" class="menu-icon">Cetak Prestasi
                </a>
                <a href="#" class="menu-item">
                    <img src="../img/Help_Icon.png" alt="Validasi Icon" class="menu-icon">Bantuan
                </a>
            </nav>
            <footer>
                <p>© polinema.sch.id</p>
            </footer>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <header class="header">
                <div class="logo">
                    <img src="../img/logoSIPPMA.png" alt="Logo">
                </div>
                <h1 class="teks">
                    IPP<span class="highlight">MA</span>
                </h1>
                <div class="bell">
                    <a href="validasiMessage_mahasiswa.php"><img src="../img/Notification_Icon.png" alt="Notification"></a>
                </div>
                <div class="logout">
                    <button onclick="window.location.href='../login.php';">Logout</button>
                </div>
            </header>
            <section class="welcome">
                <h2>SELAMAT DATANG "Users"</h2>
            </section>
            <div class="content">
                <!-- Ranking Section -->
                <div class="ranking">
                    <h3>Ranking</h3>
                    <div class="ranking-item">
                        <span class="rank-number">1</span>
                        <div class="rank-info">
                            <p>Alvino Valerian</p>
                            <p>234720221</p>
                            <p>D-IV Teknik Informatika</p>
                        </div>
                        <span class="rank-score">98</span>
                    </div>
                    <div class="ranking-item">
                        <span class="rank-number">2</span>
                        <div class="rank-info">
                            <p>Alvino Valerian</p>
                            <p>234720220</p>
                            <p>D-IV Teknik Informatika</p>
                        </div>
                        <span class="rank-score">95</span>
                    </div>
                    <div class="ranking-item">
                        <span class="rank-number">3</span>
                        <div class="rank-info">
                            <p>Alvino Valerian</p>
                            <p>234720207</p>
                            <p>D-IV Teknik Informatika</p>
                        </div>
                        <span class="rank-score">90</span>
                    </div>
                    <div class="ranking-item">
                        <span class="rank-number">4</span>
                        <div class="rank-info">
                            <p>Alvino Valerian</p>
                            <p>234720204</p>
                            <p>D-IV Teknik Informatika</p>
                        </div>
                        <span class="rank-score">88</span>
                    </div>
                </div>

                <!-- Agenda Section -->
                <div class="agenda">
                    <h3>Agenda Lomba</h3>
                    <div class="agenda-item">
                        <p>Nama Kompetisi</p>
                        <p>22 Feb 2025</p>
                        <a href="#" class="agenda-link">Link</a>
                    </div>
                    <div class="agenda-item">
                        <p>Nama Kompetisi</p>
                        <p>24 Feb 2025</p>
                        <a href="#" class="agenda-link">Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
