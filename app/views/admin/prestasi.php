    <main class="main-content">
        <div class="validasi-message-title">
            <h2> Prestasi</h2>
        </div>
        <div class="validasi-message-container">
            <button class="tambah-data" onclick="window.location.href='<?=BASEURL?>/admin/input'">Tambah Data</button>
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
                        <?php $no = 1; ?>
                        <?php foreach ($data['prestasi'] as $prestasi): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($prestasi['nama_mhs']); ?></td>
                                <td><?= htmlspecialchars($prestasi['juara']); ?></td>
                                <td><?= htmlspecialchars($prestasi['nama_kategori']); ?></td>
                                <td class="status" data-status="<?= htmlspecialchars($prestasi['status_kategori'] ?? ''); ?>">
                                    <p>
                                        <?= htmlspecialchars($prestasi['status_kategori'] ?? 'Status tidak tersedia'); ?>
                                    </p>
                                </td>
                                <td class="action-buttons">
                                    <a href="<?=BASEURL?>/admin/viewPrestasi?id=<?= htmlspecialchars($prestasi['id_mhs'] ?? '#'); ?>" class="validasi-message-btn-icon">👁</a>
                                    <a href="<?=BASEURL?>/admin/editPrestasi?id=<?= htmlspecialchars($prestasi['id_mhs'] ?? '#'); ?>" class="edit-button"><img src="<?=BASEIMG?>/Edit_Icon.png" alt="Edit"></a>
                                    <a href="<?=BASEURL?>/admin/deletePrestasi?id=<?= htmlspecialchars($prestasi['id_mhs'] ?? '#'); ?>
                                    " class="delete-button" onclick="return confirm('Yakin ingin menghapus data ini?');"><img src="<?=BASEIMG?>/Delete_Icon.png" alt="Delete"></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No agenda available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
  <script src="<?=BASEJS?>/adminValidasiStatus.js"></script>
</body>
</html>