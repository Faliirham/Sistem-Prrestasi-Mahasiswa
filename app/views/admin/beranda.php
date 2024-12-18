<main class="main-content">
    <div class="welcome">
        <h2>SELAMAT DATANG <?= htmlspecialchars($data['nama']) ?></h2>
    
        <section class="agenda">
            <div class="agenda-header">
                <h2>Agenda Lomba Mahasiswa</h2>
                <button class="tambah-agenda">Tambah Agenda</button>
            </div>
            <div class="agenda-list">
                <?php if (!empty($data['agenda'])): ?>
                    <?php foreach ($data['agenda'] as $agenda): ?>
                        <div class="agenda-item">
                            <div class="edit-delete-icons">
                                <div class="action-buttons">
                                    <!-- Tombol Edit -->
                                    <form style="display: inline;" method="POST" action="<?= BASEURL ?>/admin/editAgenda">
                                        <input type="hidden" name="id" value="<?= $agenda['id_agenda'] ?>">
                                        <button class="edit-button">
                                            <img src="<?= BASEIMG ?>/Edit_icon.png" alt="Edit" />
                                        </button>
                                    </form>
                                    <!-- Tombol Delete -->
                                    <form action="<?= BASEURL ?>/admin/delAgenda" method="POST" style="display: inline;" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="id" value="<?= $agenda['id_agenda'] ?>">
                                        <button class="delete-button" type="submit">
                                            <img src="<?= BASEIMG ?>/Delete_icon.png" alt="Delete" />
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <h3><?= htmlspecialchars($agenda['nama_agenda'] ?? 'Nama agenda tidak tersedia') ?></h3>
                            <div class="agenda-item-content">
                                <img class="time-icon" src="<?= BASEIMG ?>/time.png" alt="Time">
                                <p><?= htmlspecialchars(trim($agenda['tanggal_agenda'] ?? 'Tanggal tidak tersedia')) ?></p>
                            </div>
                            <a href="<?= htmlspecialchars($agenda['link'] ?? '#') ?>">Lihat Agenda</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="color: whitesmoke;">Tidak ada agenda tersedia.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Popup untuk menambahkan agenda -->
        <div id="popupAgenda" class="popup-agenda">
            <div class="popup-content-agenda">
                <span class="close-btn-agenda">&times;</span>
                <form class="input-agenda-form" action="<?= BASEURL ?>/admin/addAgenda" method="post" enctype="multipart/form-data">
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

        <!-- Popup untuk mengedit agenda -->
        <div class="popup-update-agenda">
            <div class="popup-update-content-agenda">
                <form action="<?= BASEURL ?>/admin/editAgenda" method="POST" enctype="multipart/form-data">
                    <div class="input-agenda-form-group">
                        <label for="nama-agenda">Nama Agenda</label>
                        <input type="text" id="nama-agenda" name="nama-agenda" value="<?= htmlspecialchars($agenda['nama_agenda'] ?? '') ?>" required>
                    </div>

                    <div class="input-agenda-form-group">
                        <label for="tanggal-agenda">Tanggal Agenda</label>
                        <input type="date" id="tanggal-agenda" name="tanggal-agenda" value="<?= htmlspecialchars($agenda['tanggal_agenda'] ?? '') ?>" required>
                    </div>

                    <div class="input-agenda-form-group">
                        <label for="link-agenda">Link Agenda</label>
                        <input type="url" id="link-agenda" name="link-agenda" value="<?= htmlspecialchars($agenda['link'] ?? '') ?>" required>
                    </div>

                    <div class="input-agenda-form-actions">
                        <button type="submit" class="edit-agenda-btn-unggah">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Ranking section -->
        <div class="leaderboard-ranking">
            <h1>Ranking</h1>
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

        <!-- Features section -->
        <section id="features" class="features">
            <h2>Fitur</h2>
            <div class="features-list">
                <div class="feature">
                    <div class="feature-image">
                        <img src="<?= BASEIMG ?>/InputPrestasi-page.png" alt="Input Prestasi">
                    </div>
                    <h3>Tambah User</h3>
                    <p>Ingin menambahkan pengguna baru? Kelola dengan mudah dan tambahkan data pengguna terbaru sekarang juga!</p>
                    <button id="tambah-user" class="tambah-data">Tambah</button>
                </div>

                <!-- Popup untuk menambah user -->
                <div id="popupUser" class="popup-user">
                    <div class="popup-content-user">
                        <span class="close-btn-user">&times;</span>
                        <form class="input-user-form" action="<?=BASEURL?>/admin/addUser" method="post" enctype="multipart/form-data">
                            <div class="input-user-form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" placeholder="Username" required>
                            </div>
                            <div class="input-user-form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="input-user-form-group">
                                <label for="role">Role</label>
                                <label>
                                    <input type="radio" name="role" value="mahasiswa">1. MAHASISWA
                                </label>
                                <label>
                                    <input type="radio" name="role" value="admin">2. ADMIN
                                </label>
                            </div>
                            <div class="input-user-form-actions">
                                <button type="submit" class="input-user-btn-unggah">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="feature">
                    <div class="feature-image">
                        <img src="<?= BASEIMG ?>/InputPrestasi-page.png" alt="Validasi Input">
                    </div>
                    <h3>Tambah Tingkat Prestasi</h3>
                    <p>Tambahkan tingkat prestasi baru untuk mencatat pencapaian yang lebih luar biasa.</p>
                    <button id="tambah-prestasi" class="tambah-data">Tambah</button>
                </div>

                <div id="popupPrestasi" class="popup-prestasi">
                    <div class="popup-content-prestasi">
                        <span class="close-btn-prestasi">&times;</span>
                        <form class="input-prestasi-form" action="<?=BASEURL?>/admin/addTingkatPrestasi" method="post" enctype="multipart/form-data">
                            <div class="input-prestasi-form-group">
                                <label for="nama-prestasi">Tingkat Prestasi</label>
                                <input type="text" id="nama-prestasi" name="nama-prestasi" placeholder="Tingkat Prestasi" required>
                            </div>
                            <div class="input-prestasi-form-actions">
                                <button type="submit" class="input-prestasi-btn-unggah">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
</main>

<script src="<?= BASEJS ?>/adminBeranda.js"></script>
<script src="<?= BASEJS ?>/adminAgenda.js"></script>
</body>
</html>