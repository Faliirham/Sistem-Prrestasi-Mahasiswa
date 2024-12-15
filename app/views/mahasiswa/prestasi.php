<main class="main-content">
    <div class="validasi-message-title">
        <h2>Prestasi</h2>
    </div>
    <div class="sub-header">
        <p>Daftar Prestasi / Penghargaan yang di terima oleh mahasiswa, seperti juara lomba keahlian, juara lomba karya tulis, dan lain-lainnya</p>
        <p><span>*Maksimal Pengeditan 1 hari (lebih dari itu data tidak bisa diubah)</span></p>
    </div>
    <div class="validasi-message-container">
    <button class="tambah-data" onclick="window.location.href='<?= BASEURL ?>/mahasiswa/formInput'">Tambah Data</button>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA MAHASISWA</th>
                    <th>JUARA</th>
                    <th>KATEGORI</th>
                    <th>VALIDASI</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($data['prestasi'])): ?>
                    <?php foreach ($data['prestasi'] as $key => $prestasi): ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= htmlspecialchars($prestasi['nama_lomba']); ?></td>
                            <td><?= htmlspecialchars($prestasi['juara']); ?></td>
                            <td><?= htmlspecialchars($prestasi['nama_kategori']); ?></td>
                            <td class="status" data-status="<?= htmlspecialchars($prestasi['status_kategori'] ?? ''); ?>">
                                <p>
                                    <?= htmlspecialchars($prestasi['status_kategori'] ?? 'Status tidak tersedia'); ?>
                                </p>
                            </td>
                            <td class="action-buttons">
                            <a href="<?=BASEURL?>/mahasiswa/editPrestasi?id=<?= htmlspecialchars($prestasi['id_mhs'] ?? '#'); ?>" class="edit-button"><img src="<?=BASEIMG?>/Edit_Icon.png" alt="Edit"></a>
                                <a href="<?=BASEURL?>/mahasiswa/deletePrestasi?id=<?= htmlspecialchars($prestasi['id_mhs'] ?? '#'); ?>
                                " class="delete-button" onclick="return confirm('Yakin ingin menghapus data ini?');"><img src="<?=BASEIMG?>/Delete_Icon.png" alt="Delete"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Tidak ada data prestasi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
       
        <div class="sub-header-pesan">
            <p><span>*pesan validasi dari admin</span></p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>PESAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Data nama yang dimasukkan salah</td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>
</main>
<script src="<?=BASEJS?>/adminValidasiStatus.js"></script>
</body>
</html>