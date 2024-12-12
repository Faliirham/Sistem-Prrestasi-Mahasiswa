<main class="main-content">
    <div class="validasi-input-title">
        <h2>Input Prestasi</h2>
        <div class="validasi-input-container">
            <form action="<? URL ?>/mahasiswa/formInput" method="post" enctype="multipart/form-data">                
                <div class="validasi-input-form-group">
                    <label for="nama-mahasiswa">Nama Mahasiswa
                        <span style="color: red;">*</span>
                    </label>
                    <input type="text" id="nama-mahasiswa" name="nama-mahasiswa" placeholder="Nama Mahasiswa">
                </div>
                <div class="validasi-input-form-group">
                    <label for="nama-prestasi">Nama Prestasi
                        <span style="color: red;">*</span>
                    </label>
                    <input type="text" id="nama-prestasi" name="nama-prestasi" placeholder="Nama Prestasi">
                </div>
                <div class="validasi-input-form-group">
                    <label for="juara">Juara
                        <span style="color: red;">*</span>
                    </label>
                    <select id="juara" name="juara">
                        <option value="Juara 1">Juara 1</option>
                        <option value="Juara 2">Juara 2</option>
                        <option value="Juara 3">Juara 3</option>
                        <option value="Juara Harapan">Juara Harapan</option>
                    </select>
                </div>
                <div class="validasi-input-form-group">
                    <label for="tanggal-juara">Tanggal Juara
                        <span style="color: red;">*</span>
                    </label>
                    <input id="tanggal-juara" type="date" name="tanggal-juara" placeholder="DD/MM/YYYY">
                </div>
                <div class="validasi-input-form-group">
                    <label for="tingkat-kompetisi">Tingkat Kompetisi
                        <span style="color: red;">*</span>
                    </label>
                    <select id="tingkat-kompetisi" name="tingkat-kompetisi">
                        <option value="internasional">Internasional</option>
                        <option value="nasional">Nasional</option>
                        <option value="provinsi">Provinsi</option>
                        <option value="kota_kabupaten">Kota / Kabupaten</option>
                        <option value="kampus">Kampus</option>
                    </select>
                </div>
                <!-- Upload Fields -->
                <div class="validasi-input-form-group-file">
                    <label for="sertifikat">Upload Sertifikat Lomba
                        <span style="color: red;">*</span>
                    </label>
                    <div class="form-upload">
                        <div class="file-info">
                            <span class="file-name" id="sertifikat-name">Tidak ada file yang dipilih</span>
                            <button type="button" onclick="triggerFileInput('sertifikat')">Pilih File</button>
                        </div>
                        <input id="sertifikat" type="file" name="sertifikat" onchange="updateFileName('sertifikat', 'sertifikat-name')" required style="display: none;">
                        <div class="note">Max 2 MB | File berupa format PDF / IMG</div>
                    </div>
                </div>
                <div class="validasi-input-form-group-file">
                    <label for="foto">Upload Foto Kegiatan
                        <span style="color: red;">*</span>
                    </label>
                    <div class="form-upload">
                        <div class="file-info">
                            <span class="file-name" id="foto-name">Tidak ada file yang dipilih</span>
                            <button type="button" onclick="triggerFileInput('foto')">Pilih File</button>
                        </div>
                        <input id="foto" type="file" name="foto" onchange="updateFileName('foto', 'foto-name')" required style="display: none;">
                        <div class="note">Max 2 MB | File berupa format PDF / IMG</div>
                    </div>
                </div>
                <div class="validasi-input-form-group-file">
                    <label for="surat">Upload Surat Tugas
                        <span style="color: red;">*</span>
                    </label>
                    <div class="form-upload">
                        <div class="file-info">
                            <span class="file-name" id="surat-name">Tidak ada file yang dipilih</span>
                            <button type="button" name="surat" onclick="triggerFileInput('surat')">Pilih File</button>
                        </div>
                        <input id="surat" type="file" onchange="updateFileName('surat', 'surat-name')" required style="display: none;">
                        <div class="note">Max 2 MB | File berupa format PDF / IMG</div>
                    </div>
                </div>
                <div class="validasi-input-form-group-file">
                    <label for="proposal">Upload Proposal/Karya</label>
                    <div class="form-upload">
                        <div class="file-info">
                            <span class="file-name" id="proposal-name">Tidak ada file yang dipilih</span>
                            <button type="button" onclick="triggerFileInput('proposal')">Pilih File</button>
                        </div>
                        <input id="proposal" type="file" name="proposal" onchange="updateFileName('proposal', 'proposal-name')" style="display: none;">
                        <div class="note">Max 2 MB | File berupa format PDF / IMG</div>
                    </div>
                </div>
                <div class="validasi-input-form-actions">
                    <p>*Pastikan Data yang anda masukkan telah sesuai !</p>
                    <button type="reset" class="validasi-input-btn-batal" onclick="window.location.href='<?= URL ?>/mahasiswa/input_prestasi'">Batal</button>
                    <button type="submit" class="validasi-input-btn-unggah">Unggah</button>
                </div>
            </form>
        </div>
    </div>
</main>