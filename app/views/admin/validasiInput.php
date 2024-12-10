 <!-- Main Content -->
    <main class="main-content">
        <div class="welcome">
            <div class="validasi-input-container">
                <div class="title">
                    <h1>Input Prestasi</h1>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="validasi-input-form-group">
                            <label for="nama-mahasiswa">Nama Mahasiswa</label>
                            <input type="text" id="nama-mahasiswa" placeholder="Nama Mahasiswa">
                        </div>
                        <div class="validasi-input-form-group">
                            <label for="nama-prestasi">Nama Prestasi</label>
                            <input type="text" id="nama-prestasi" placeholder="Nama Prestasi">
                        </div>
                        <div class="validasi-input-form-group">
                            <label for="penyelenggara">Penyelenggara</label>
                            <input type="text" id="penyelenggara" placeholder="Penyelenggara">
                        </div>
                        <div class="validasi-input-form-group">
                            <label for="tanggal-juara">Tanggal Juara</label>
                            <input type="text" id="tanggal-juara" placeholder="DD/MM/YYYY">
                        </div>
                        <div class="validasi-input-form-group">
                            <label for="tingkat-kompetisi">Tingkat Kompetisi</label>
                            <input type="text" id="tingkat-kompetisi" placeholder="Nasional">
                        </div>

                        <h3>Upload 4 Bukti File</h3>

                        <div class="validasi-input-form-group">
                            <label for="sertifikat">Upload Sertifikat Lomba</label>
                            <input type="file" id="sertifikat">
                            <span class="validasi-input-file-info">Hanya file dengan format PDF (max 2MB)</span>
                        </div>
                        <div class="validasi-input-form-group">
                            <label for="foto">Upload Foto Kegiatan</label>
                            <input type="file" id="foto">
                            <span class="validasi-input-file-info">Hanya file dengan format JPG/PNG (max 2MB)</span>
                        </div>
                        <div class="validasi-input-form-group">
                            <label for="surat">Upload Surat Tugas</label>
                            <input type="file" id="surat">
                            <span class="validasi-input-file-info">Hanya file dengan format PDF (max 2MB)</span>
                        </div>
                        <div class="validasi-input-form-group">
                            <label for="proposal">Upload Proposal/Karya</label>
                            <input type="file" id="proposal">
                            <span class="validasi-input-file-info">Hanya file dengan format PDF (max 2MB)</span>
                        </div>
                        <div class="validasi-input-form-group">
                            <label for="point-sertifikat">Point Sertifikat</label>
                            <input type="text" id="point-sertifikat" placeholder="Point Sertifikat">
                        </div>
                        <div class="validasi-input-form-group">
                            <label for="pesan-validasi">Pesan Validasi</label>
                            <textarea id="pesan-validasi" placeholder="Pesan Validasi"></textarea>
                        </div>

                        <div class="validasi-input-form-actions">
                            <button type="reset" class="validasi-input-btn-batal">Batal</button>
                            <button type="submit" class="validasi-input-btn-unggah">Unggah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>