<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Prestasi Mahasiswa</title>
    <link rel="stylesheet" href="../style/styleProfilMahasiswa.css">
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
                <a href="#" class="menu-item">
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
            <div class="content">
                <!-- Ranking Section -->
                <div class="profile-card">
                    <h3> Data diri Mahasiswa</h3>
                    <div class="profile-info">
                        <div class="ubah-foto">
                        <img alt="Profile Picture" height="100" src="../img/profil.png" width="100"/>
                        <button>Ubah Foto</button>
                    </div>
                    <div class="info">
                        <div class="form-group">
                            <label for="name">
                                Nama
                            </label>
                            <input id="name" type="text" value="Alvino Valerian Daniswara Rahman"/>
                            <label for="nim">
                                NIM
                            </label>
                            <input id="nim" type="text" value="2204763888"/>
                            <label for="program">
                                Program Studi
                            </label>
                            <input id="program" type="text" value="D-IV Teknik Informatika"/>
                            <label for="email">
                                Email
                            </label>
                            <input id="email" type="email" value="alvinnooo00@gmail.com"/>
                        </div>
                        <div class="simpan-button">
                            <button>Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
