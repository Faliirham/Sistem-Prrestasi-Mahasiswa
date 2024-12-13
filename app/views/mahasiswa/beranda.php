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
            <?php if (!empty($data['leaderboard'])): ?>
                <?php foreach ($data['leaderboard'] as $index => $item): ?>
                    <div class="leaderboard-ranking-item">
                        <?php if ($index < 5): ?>
                            <img src="<?= BASEIMG ?>/juara<?= $index + 1 ?>.png" alt="juara<?= $index + 1 ?>" class="leaderboard-rank-number">
                        <?php else: ?>
                            <span class="leaderboard-rank-number"><?= $index + 1 ?></span>
                        <?php endif; ?>
                        <div class="leaderboard-rank-info">
                            <p><?= htmlspecialchars($item['nama_mahasiswa']) ?></p>
                            <p><?= htmlspecialchars($item['id_mhs']) ?></p>
                            <p><?= htmlspecialchars($item['program_studi']) ?></p>
                        </div>
                        <span class="leaderboard-rank-score"><?= htmlspecialchars($item['total_point']) ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Belum ada data leaderboard tersedia.</p>
            <?php endif; ?>
        </div>
        <section id="features" class="features">
            <h2>Fitur</h2>
            <div class="features-list">
            <div class="feature">
            <a href="formInputPrestasi_Mhs.php">
                <div class="feature-image">
                    <img src="../img/InputPrestasi-page.png" alt="Input Prestasi">
                </div>
                <h3>Input Prestasi</h3>
                <p>Catat setiap prestasi Anda dengan mudah! Jangan biarkan satu pun 
                    prestasi anda tidak diketahui oleh orang lain </p>
            </a>
            </div>
            <div class="feature">
            <a href="printPrestasi_Mhs.php">
                <div class="feature-image">
                    <img src="../img/CetakPrestasi-page.png" alt="Cetak Prestasi">
                </div>
                <h3>Cetak Prestasi</h3>
                <p>Hasilkan laporan prestasi resmi dari data yang telah diinput 
                    dan divalidasi! Laporan ini siap digunakan sebagai dokumentasi akademik</p>
            </a>
            </div>
            </div>
        </section>
        <div class="faq-content">
            <div class="faq-container">
                <h1>Pertanyaan Tentang SIPPMA</h1>
                <div class="faq-item">
                    <button onclick="toggleAnswer(this)">Apa itu Sistem Pencatatan Prestasi Mahasiswa?</button>
                    <div class="answer">SIPPMA adalah sistem yang digunakan untuk mencatat semua prestasi mahasiswa secara terpusat.</div>
                </div>
                <div class="faq-item">
                    <button onclick="toggleAnswer(this)">Bagaimana alur pencatatan prestasi mahasiswa?</button>
                    <div class="answer">Mahasiswa mengisi data prestasi di portal SIPPMA, diverifikasi oleh admin, dan diarsipkan.</div>
                </div>
                <div class="faq-item">
                    <button onclick="toggleAnswer(this)">Bagaimana cara menjadi leaderboard?</button>
                    <div class="answer">Mahasiswa dengan jumlah poin prestasi terbanyak akan masuk leaderboard.</div>
                </div>
                <div class="faq-item">
                    <button onclick="toggleAnswer(this)">Cetak Prestasi Berfungsi untuk apa?</button>
                    <div class="answer">Fitur ini digunakan untuk mencetak bukti prestasi yang dapat digunakan untuk keperluan administratif.</div>
                </div>
                <script src="js/faq.js" ></script>
            </div>
        </div>
    </div>
</main>