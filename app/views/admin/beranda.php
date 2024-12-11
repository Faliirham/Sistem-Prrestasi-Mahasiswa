            <main class="main-content">
                <div class="welcome">
                    <h2>SELAMAT DATANG <?= $data['nama']?></h2>
                    <section class="agenda">
                        <div class="agenda-header">
                            <h2>Agenda Lomba Mahasiswa</h2>
                            <button class="tambah-data">Tambah Data</button>
                        </div>
                        <div class="agenda-list">
                            <div class="agenda-item">
                                <div class="edit-delete-icons">
                                    <img class="edit-icon" src="../img/Edit_icon.png" alt="edit">
                                    <img class="delete-icon" src="../img/Delete_icon.png" alt="delete">
                                </div>
                                <h3>Nama Kompetisi</h3>
                                <div class="agenda-item-content">
                                    <img class="time-icon" src="../img/time.png" alt="time">
                                    <p>22 November 2024</p>
                                </div>
                                <a href="#">Link</a>
                            </div>
                            <div class="agenda-item">
                                <div class="edit-delete-icons">
                                    <img class="edit-icon" src="../img/Edit_icon.png" alt="edit">
                                    <img class="delete-icon" src="../img/Delete_icon.png" alt="delete">
                                </div>
                                <h3>Nama Kompetisi</h3>
                                <div class="agenda-item-content">
                                    <img class="time-icon" src="../img/time.png" alt="time">
                                    <p>22 November 2024</p>
                                </div>
                                <a href="#">Link</a>
                            </div>
                            <div class="agenda-item">
                                <div class="edit-delete-icons">
                                    <img class="edit-icon" src="../img/Edit_icon.png" alt="edit">
                                    <img class="delete-icon" src="../img/Delete_icon.png" alt="delete">
                                </div>
                                <h3>Nama Kompetisi</h3>
                                <div class="agenda-item-content">
                                    <img class="time-icon" src="../img/time.png" alt="time">
                                    <p>22 November 2024</p>
                                </div>
                                <a href="#">Link</a>
                            </div>
                            <div class="agenda-item">
                                <div class="edit-delete-icons">
                                    <img class="edit-icon" src="../img/Edit_icon.png" alt="edit">
                                    <img class="delete-icon" src="../img/Delete_icon.png" alt="delete">
                                </div>
                                <h3>Nama Kompetisi</h3>
                                <div class="agenda-item-content">
                                    <img class="time-icon" src="../img/time.png" alt="time">
                                    <p>22 November 2024</p>
                                </div>
                                <a href="#">Link</a>
                            </div>
                            <div class="agenda-item">
                                <div class="edit-delete-icons">
                                    <img class="edit-icon" src="../img/Edit_icon.png" alt="edit">
                                    <img class="delete-icon" src="../img/Delete_icon.png" alt="delete">
                                </div>
                                <h3>Nama Kompetisi</h3>
                                <div class="agenda-item-content">
                                    <img class="time-icon" src="../img/time.png" alt="time">
                                    <p>22 November 2024</p>
                                </div>
                                <a href="#">Link</a>
                            </div>
                            <div class="agenda-item">
                                <div class="edit-delete-icons">
                                    <img class="edit-icon" src="../img/Edit_icon.png" alt="edit">
                                    <img class="delete-icon" src="../img/Delete_icon.png" alt="delete">
                                </div>
                                <h3>Nama Kompetisi</h3>
                                <div class="agenda-item-content">
                                    <img class="time-icon" src="../img/time.png" alt="time">
                                    <p>22 November 2024</p>
                                </div>
                                <a href="#">Link</a>
                            </div>
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
                </div>
            </main>
        </div>
    </div>

    <div id="popupModal" class="popup-modal">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <form class="input-agenda-form" action="#" method="post" enctype="multipart/form-data">
            <div class="input-agenda-form-group">
                <label for="nama-agenda">Nama Agenda</label>
                <input type="text" id="nama-agenda" name="nama-agenda" placeholder="Nama Agenda" required>
            </div>
            <div class="input-agenda-form-group">
                <label for="tanggal-agenda">Tanggal Agenda</label>
                <input type="date" id="tanggal-agenda" name="tanggal-agenda" placeholder="DD/MM/YYYY" required>
            </div>
            <div class="input-agenda-form-group">
                <label for="link-agenda">Link Agenda</label>
                <input type="text" id="link-agenda" name="link-agenda" placeholder="Link Agenda" required>
            </div>
            <div class="input-agenda-form-actions">
                <button type="submit" class="input-agenda-btn-unggah">Unggah</button>
            </div>
            </form>
        </div>
    </div>

    <script>
    const modal = document.getElementById("popupModal");
    const tambahDataBtn = document.querySelector(".tambah-data");
    const closeBtn = document.querySelector(".close-btn");

    tambahDataBtn.addEventListener("click", (e) => {
        e.preventDefault();
        modal.style.display = "block";
    });

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) {
        modal.style.display = "none";
        }
    });
    </script>
</body>
</html>
