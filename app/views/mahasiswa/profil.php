<main class="main-content">
    <div class="profile-container">
        <h1>Data diri Mahasiswa</h1>
        <div class="profile-content">
            <div class="profile-picture">
                <img src="../img/profil.png" alt="Profile Picture">
                <div>
                    <button class="profile-btn-ubah">Ubah Foto</button>
                </div>
            </div>
            <div class="profile-form">
                <form action="#" method="post">
                    <div class="profile-form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" value=""><?=$data['namaMhs']?>
                    </div>
                    <div class="profile-form-group">
                        <label for="nip">NIM</label>
                        <input type="text" id="nip" value=""><?=$data['NIM']?>
                    </div>
                    <div class="profile-form-group">
                        <label for="studi">Program Studi</label>
                        <input type="text" id="studi" value="D-IV Teknik Informatika">
                    </div>
                    <div class="profile-form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" value="alvinnooo00@gmail.com"">
                    </div>
                    <button type="submit" class="profile-btn-simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</main>