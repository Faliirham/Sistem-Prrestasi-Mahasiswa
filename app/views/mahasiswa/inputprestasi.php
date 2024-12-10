<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Prestasi Mahasiswa</title>
    <link rel="stylesheet" href="../style/styleFormInput.css">
    <script>
    function triggerFileInput(id) {
                document.getElementById(id).click();
            }

            function updateFileName(inputId, fileNameId) {
                var input = document.getElementById(inputId);
                var fileName = input.files[0] ? input.files[0].name : "No file chosen";
                document.getElementById(fileNameId).innerText = fileName;
            }
    </script>
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
            <section class="welcome">
                <h2>Input Prestasi</h2>
            </section>
            <div class="content">
                <div class="form-container">
                <div class="form-group">
                <label for="nama-mahasiswa">
                Nama Mahasiswa
                <span style="color: red;">
                    *
                </span>
                </label>
                <input id="nama-mahasiswa" required="" type="text" placeholder="Nama Lengkap Anda"/>
                </div>
                <div class="form-group">
                <label for="nama-prestasi">
                Nama Prestasi
                <span style="color: red;">
                    *
                </span>
                </label>
                <input id="nama-prestasi" required="" type="text" placeholder="Nama Prestasi Anda"/>
                </div>
                <div class="form-group">
                <label for="juara">
                Juara
                <span style="color: red;">
                    *
                </span>
                </label>
                <select id="juara" required="">
                <option value="Juara 1">
                    Juara 1
                </option>
                <option value="Juara 2">
                    Juara 2
                </option>
                <option value="Juara 3">
                    Juara 3
                </option>
                </select>
                </div>
                <div class="form-group">
                <label for="tanggal-juara">
                Tanggal Juara
                <span style="color: red;">
                    *
                </span>
                </label>
                <input id="tanggal-juara" required="" type="date"/>
                </div>
                <div class="form-group">
                <label for="tingkat-kompetisi">
                Tingkat Kompetisi
                <span style="color: red;">
                    *
                </span>
                </label>
                <input id="tingkat-kompetisi" required="" type="text" placeholder="Tingkat Kompetisi Yang Anda Raih"/>
                </div>
                <div class="form-group">
                <label>
                Upload 4 Bukti file
                </label>
                </div>
                <div class="form-group file-upload-box">
                    <label for="sertifikat-lomba">
                        Upload Sertifikat Lomba
                        <span style="color: red;">*</span>
                    </label>
                    <div class="form-upload">
                        <div class="file-info">
                            <span class="file-name" id="sertifikat-lomba-name">Tidak ada file yang dipilih</span>
                            <button onclick="triggerFileInput('sertifikat-lomba')" type="button">
                                Pilih File
                            </button>
                        </div>
                        <input id="sertifikat-lomba" type="file" onchange="updateFileName('sertifikat-lomba', 'sertifikat-lomba-name')" required style="display: none;" />
                        <div class="note">
                            <p>Max 2MB | File berupa format PDF / JPG</p>
                        </div>
                    </div>
                </div>
                <div class="form-group file-upload-box">
                    <label for="foto-kegiatan">
                        Upload Foto Kegiatan
                        <span style="color: red;">*</span>
                    </label>
                    <div class="form-upload">
                        <div class="file-info">
                            <span class="file-name" id="foto-kegiatan-name">Tidak ada file yang dipilih</span>
                            <button onclick="triggerFileInput('foto-kegiatan')" type="button">
                                Pilih File
                            </button>
                        </div>
                        <input id="foto-kegiatan" type="file" onchange="updateFileName('foto-kegiatan', 'foto-kegiatan-name')" required style="display: none;" />
                        <div class="note">
                            <p>Max 2MB | File berupa format PDF / JPG</p>
                        </div>
                    </div>
                </div>
                <div class="form-group file-upload-box">
                    <label for="surat-tugas">
                        Upload Surat Tugas
                        <span style="color: red;">*</span>
                    </label>
                    <div class="form-upload">
                        <div class="file-info">
                            <span class="file-name" id="surat-tugas-name">Tidak ada file yang dipilih</span>
                            <button onclick="triggerFileInput('surat-tugas')" type="button">
                                Pilih File
                            </button>
                        </div>
                        <input id="surat-tugas" type="file" onchange="updateFileName('surat-tugas', 'surat-tugas-name')" required style="display: none;" />
                        <div class="note">
                            <p>Max 2MB | File berupa format PDF / JPG</p>
                        </div>
                    </div>
                </div>
                <div class="form-group file-upload-box">
                <label for="proposal">
                        Upload Proposal / Karya (Otional)
                        <span style="color: red;">*</span>
                    </label>
                    <div class="form-upload">
                        <div class="file-info">
                            <span class="file-name" id="proposal-name">Tidak ada file yang dipilih</span>
                            <button onclick="triggerFileInput('proposal')" type="button">
                                Pilih File
                            </button>
                        </div>
                        <input id="proposal" type="file" onchange="updateFileName('proposal', 'proposal-name')" required style="display: none;" />
                        <div class="note">
                            <p>Max 2MB | File berupa format PDF / JPG</p>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <p>*Pastikan Data yang anda masukkan telah sesuai !</p>
                    <button onclick="window.location.href='input_prestasi.php';" class="cancel">Batal</button>
                    <button>Unggah</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
