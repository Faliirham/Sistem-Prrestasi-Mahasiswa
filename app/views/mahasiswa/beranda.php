<main class="main-content">
    <div class="welcome">
        <h2>SELAMAT DATANG <?= $data['namaMhs']?></h2>
        <section class="agenda">
            <div class="agenda-header">
                <h2>Agenda Lomba Mahasiswa</h2>
            </div>
            <div class="agenda-list">
                <?php if (!empty($data['agenda'])): ?>
                <?php foreach ($data['agenda'] as $item): ?>
                    <div class="agenda-item">
                        <h3><?= htmlspecialchars($item['nama_agenda']) ?></h3>
                        <div class="agenda-item-content">
                            <img class="time-icon" src="<?=BASEIMG?>/time.png" alt="time">
                            <p><?= htmlspecialchars($item['tanggal_agenda']) ?></p>
                        </div>
                        <a href="<?= $item['link'] ?>">Link</a>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Belum ada agenda yang tersedia.</p>
                <?php endif; ?>
            </div>
        </section>
        <div class="leaderboard-ranking">
            <h3>Ranking</h3>
            <div class="leaderboard-ranking-item">
                <img src="../img/juara1.png" alt="juara1" class="leaderboard-rank-number">
                <div class="leaderboard-rank-info">
                    <p>Alvino Valerian</p>
                    <p>234720221</p>
                    <p>D-IV Teknik Informatika</p>
                </div>
                <span class="leaderboard-rank-score">98</span>
            </div>
            <div class="leaderboard-ranking-item">
                <img src="../img/juara2.png" alt="juara2" class="leaderboard-rank-number">
                <div class="leaderboard-rank-info">
                    <p>Alvino Valerian</p>
                    <p>234720220</p>
                    <p>D-IV Teknik Informatika</p>
                </div>
                <span class="leaderboard-rank-score">95</span>
            </div>
            <div class="leaderboard-ranking-item">
                <img src="../img/juara3.png" alt="juara3" class="leaderboard-rank-number">
                <div class="leaderboard-rank-info">
                    <p>Alvino Valerian</p>
                    <p>234720207</p>
                    <p>D-IV Teknik Informatika</p>
                </div>
                <span class="leaderboard-rank-score">90</span>
            </div>
            <div class="leaderboard-ranking-item">
                <img src="../img/juara4.png" alt="juara4" class="leaderboard-rank-number">
                <div class="leaderboard-rank-info">
                    <p>Alvino Valerian</p>
                    <p>234720204</p>
                    <p>D-IV Teknik Informatika</p>
                </div>
                <span class="leaderboard-rank-score">88</span>
            </div>
            <div class="leaderboard-ranking-item">
                <img src="../img/juara5.png" alt="juara5" class="leaderboard-rank-number">
                <div class="leaderboard-rank-info">
                    <p>Alvino Valerian</p>
                    <p>234720204</p>
                    <p>D-IV Teknik Informatika</p>
                </div>
                <span class="leaderboard-rank-score">87</span>
            </div>
        </div>
        <section id="features" class="features">
            <h2>Fitur Utama</h2>
            <div class="features-list">
            <div class="feature">
                <div class="feature-image">
                    <img src="../img/Leaderboard-page.png" alt="Leaderboard">
                </div>
                <h3>Leaderboard</h3>
                <p>Jadilah yang terdepan! Fitur ini menampilkan peringkat prestasi Anda 
                    secara real-time, memotivasi untuk terus meningkatkan performa.</p>
            </div>
            <div class="feature">
                <div class="feature-image">
                    <img src="../img/InputPrestasi-page.png" alt="Input Prestasi">
                </div>
                <h3>Input Prestasi</h3>
                <p>Catat setiap prestasi Anda dengan mudah! Jangan biarkan satu pun 
                    prestasi anda tidak diketahui oleh orang lain </p>
            </div>
            <div class="feature">
                <div class="feature-image">
                    <img src="../img/ValidasiInput-page.png" alt="Validasi Input">
                </div>
                <h3>Validasi Input</h3>
                <p>Permudah proses validasi data prestasi mahasiswa! Fitur ini 
                    memastikan setiap pencatatan prestasi yang diinput sudah akurat dan sesuai.</p>
            </div>
            <div class="feature">
                <div class="feature-image">
                    <img src="../img/CetakPrestasi-page.png" alt="Cetak Prestasi">
                </div>
                <h3>Cetak Prestasi</h3>
                <p>Hasilkan laporan prestasi resmi dari data yang telah diinput 
                    dan divalidasi! Laporan ini siap digunakan sebagai dokumentasi akademik</p>
            </div>
            </div>
        </section>
    </div>
</main>