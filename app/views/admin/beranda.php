<main class="main-content">
    <div class="welcome">
        <h2>SELAMAT DATANG <?= htmlspecialchars($data['nama']) ?></h2>
        
        <section class="agenda">
            <div class="agenda-header">
                <h2>Agenda Lomba Mahasiswa</h2>
                <button class="tambah-agenda">Tambah Data</button>
            </div>
            <div class="agenda-list">
                <?php if (!empty($data['agenda'])): ?>
                    <?php foreach ($data['agenda'] as $agenda): ?>
                        <div class="agenda-item">
                            <div class="edit-delete-icons">
                                <img class="edit-icon" src="<?= BASEIMG?>/Edit_icon.png" alt="Edit">
                                <img class="delete-icon" src="<?= BASEIMG?>/Delete_icon.png" alt="Delete">
                            </div>
                            <h3 class="agenda-title"><?= htmlspecialchars($agenda['nama_agenda'] ?? 'Nama agenda tidak tersedia') ?></h3>
                            <div class="agenda-item-content">
                                <img class="time-icon" src="<?= BASEIMG ?>/time.png" alt="Time">
                                <p><?= htmlspecialchars(trim($agenda['tanggal_agenda'] ?? 'Tanggal tidak tersedia')) ?></p>
                            </div>
                            <a href="<?= htmlspecialchars($agenda['link'] ?? '#') ?>">Lihat Agenda</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada agenda tersedia.</p>
                <?php endif; ?>
            </div>
        </section>
        
        <div id="popupAgenda" class="popup-agenda">
            <div class="popup-content-agenda">
                <span class="close-btn-agenda">&times;</span>
                <form class="input-agenda-form" action="<?= BASEURL?>/admin/addAgenda" method="post" enctype="multipart/form-data">
                    <div class="input-agenda-form-group">
                        <label for="nama-agenda">Nama Agenda</label>
                        <input type="text" id="nama-agenda" name="nama-agenda" placeholder="Nama Agenda" required>
                    </div>
                    <div class="input-agenda-form-group">
                        <label for="tanggal-agenda">Tanggal Agenda</label>
                        <input type="date" id="tanggal-agenda" name="tanggal-agenda" required>
                    </div>
                    <div class="input-agenda-form-group">
                        <label for="link-agenda">Link Agenda</label>
                        <input type="url" id="link-agenda" name="link-agenda" placeholder="Link Agenda" required>
                    </div>
                    <div class="input-agenda-form-actions">
                        <button type="submit" class="input-agenda-btn-unggah">Unggah</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="leaderboard-ranking">
            <h3>Ranking</h3>
            <?php foreach ($data['leaderboard'] as $item): ?>
                <div class="leaderboard-ranking-item">
                    <img src="<?= BASEIMG ?>/juara<?= htmlspecialchars($item['ranking']) ?>.png" alt="Ranking <?= htmlspecialchars($item['ranking']) ?>" class="leaderboard-rank-number">
                    <div class="leaderboard-rank-info">
                        <p><?= htmlspecialchars($item['nama_mahasiswa']) ?></p>
                        <p><?= htmlspecialchars($item['id_mhs']) ?></p>
                        <p><?= htmlspecialchars($item['program_studi']) ?></p>
                    </div>
                    <span class="leaderboard-rank-score"><?= htmlspecialchars($item['total_point']) ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <section id="features" class="features">
            <h2>Fitur Tambahan</h2>
            <div class="features-list">
                <div class="feature">
                    <div class="feature-image">
                        <img src="<?= BASEIMG ?>/InputPrestasi-page.png" alt="Input Prestasi">
                    </div>
                    <h3>Tambah User</h3>
                    <p>Ingin menambahkan pengguna baru? Kelola dengan mudah dan tambahkan data pengguna terbaru sekarang juga!</p>
                    <button id="tambah-user" class="tambah-data">Tambah</button>
                </div>

                <div class="feature">
                    <div class="feature-image">
                        <img src="<?= BASEIMG ?>/InputPrestasi-page.png" alt="Validasi Input">
                    </div>
                    <h3>Tambah Tingkat Prestasi</h3>
                    <p>Tambahkan tingkat prestasi baru untuk mencatat pencapaian yang lebih luar biasa.</p>
                    <button id="tambah-prestasi" class="tambah-data">Tambah</button>
                </div>
            </div>
        </section>
    </div>
</main>
<script src="<?= BASEJS ?>/adminAgenda.js"></script>
<script src="<?= BASEJS ?>/adminBeranda.js"></script>
</body>
</html>