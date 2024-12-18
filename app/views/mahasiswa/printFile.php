<div class="main-content-cetak">
    <div class="content-cetak">
        <div class="file-cetak" id="file">                    
            <div class="template-cetak">
                <img src="<?= BASEIMG ?>/Template_Cetak.png" alt="Template_Cetak">
            </div>
            <div class="data-overlay-cetak">
                <div class="user-data-cetak">
                    <p>Nim<span class="tab1-cetak"></span>: <?= htmlspecialchars($data['NIM']) ?></p>
                    <p>Nama<span class="tab2-cetak"></span>: <?= htmlspecialchars($data['namaMhs']) ?></p>
                    <p>Program Studi<span class="tab3-cetak"></span>: <?= htmlspecialchars($data['prodi']) ?></p>                            
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
            </div>
        </div>
        <div class="btn-cetak-print">
            <button class="btn_print"><img src="../img/Cetak_Icon.png" alt="cetak">Cetak</button>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
<script src="<?=BASEJS?>/print.js"></script>
</body>
</html>