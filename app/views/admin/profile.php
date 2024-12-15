    <!-- Main Content -->
    <main class="main-content">
        <div>
            <div class="profile-container">
                <h1>Data diri Admin</h1>
                <div class="profile-content">
                    <div class="profile-picture">
                        <img src="<?=BASEIMG?>/admin.jpg" alt="Profile Picture">
                        <div>
                        <button class="profile-btn-ubah">Ubah Foto</button>
                        </div>
                    </div>
                    <div class="profile-form">
                        <form action="#" method="POST">
                            <div class="profile-form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" value="<?= $data['nama']?>">
                            </div>
                            <div class="profile-form-group">
                                <label for="nip">NIP</label>
                                <input type="text" id="nip" value="<?= $data['NIP']?>">
                            </div>
                            <div class="profile-form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" value="<?= $data['email']?>">
                            </div>
                            <button type="submit" class="profile-btn-simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
