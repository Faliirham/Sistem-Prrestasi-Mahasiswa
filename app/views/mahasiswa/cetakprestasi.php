<div class="main-content">
    <div class="content">
        <div class="judul">
            <h1>Cetak Bukti</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Penghargaan</th>
                    <th>Juara</th>
                    <th>Kategori</th>
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
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Tidak ada data prestasi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="btn-cetak">
            <button  onclick="window.location.href='<?= BASEURL ?>/mahasiswa/printFile'"><img src="<?=BASEIMG?>/Cetak_Icon.png" alt="cetak">Cetak</button>
        </div>
    </div>
</div>
</body>
</html>