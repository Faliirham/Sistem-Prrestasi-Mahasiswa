<?php
class Mahasiswa extends Controller{

    public function login (){
        $data['judul'] = 'BERANDA';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prodi'] = $this->model('UserMahasiswa')->getDataProfil('nama_prodi');
        $data['agenda'] = $this->model('UserMahasiswa')->getAgenda();
        $data['leaderboard']=$this->model('UserMahasiswa')->getLeaderboard();
        $this->view('templates/templateMahasiswa', $data);  
        $this->view('mahasiswa/beranda', $data);
          
    }

    public function profile (){
        $data['judul'] = 'PROFILE';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getDataProfil('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getDataProfil('id_mhs');
        $data['prodi'] = $this->model('UserMahasiswa')->getDataProfil('nama_prodi');
        $data['email'] = $this->model('UserMahasiswa')->getDataProfil('email_mhs');
        $this->view('templates/templateMahasiswa', $data);  
        $this->view('mahasiswa/profile', $data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama_mhs = $_POST['nama'];
            $email_mhs = $_POST['email'];
            $nama_prodi = $_POST['studi'];
            
            // Memanggil method update di model
            $updateSuccess = $this->model('UserMahasiswa')->updateProfilMahasiswa($data['NIM'], $nama_mhs, $email_mhs, $nama_prodi);
            
            if ($updateSuccess) {
                // Jika update berhasil, beri pesan sukses
                $data['message'] = 'Data berhasil diperbarui!';
            } else {
                // Jika update gagal, beri pesan error
                $data['message'] = 'Gagal memperbarui data.';
            }
        }    
    }

    public function cetakprestasi (){
        $data['judul'] = 'CETAK PRESTASI';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prodi'] = $this->model('UserMahasiswa')->getDataProfil('nama_prodi');
        $data['prestasi'] = $this->model('UserMahasiswa')->getPrestasiByMahasiswa($data['NIM']);
        $this->view('templates/templateMahasiswa', $data);  
        $this->view('mahasiswa/cetakprestasi', $data);
          
    }

    public function prestasi (){
        $data['judul'] = 'PRESTASI';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prodi'] = $this->model('UserMahasiswa')->getDataProfil('nama_prodi');
        $data['prestasi'] = $this->model('UserMahasiswa')->getPrestasiByMahasiswa($data['NIM']);
        $this->view('templates/templateMahasiswa', $data);  
        $this->view('mahasiswa/prestasi', $data);
          
    }

    public function bantuan (){
        $data['judul'] = 'BANTUAN';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prodi'] = $this->model('UserMahasiswa')->getDataProfil('nama_prodi');
        $this->view('templates/templateMahasiswa', $data);  
        $this->view('mahasiswa/bantuan', $data);
          
    }

    public function printFile (){
        $data['judul'] = 'PRINT FILE';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prodi'] = $this->model('UserMahasiswa')->getDataProfil('nama_prodi');
        $data['prestasi'] = $this->model('UserMahasiswa')->getPrestasiByMahasiswa($data['NIM']);
        $this->view('templates/templateMahasiswa', $data);  
        $this->view('mahasiswa/printFile', $data);
          
    }

    public function formInput()
    {
        $data['judul'] = 'FORM INPUT PRESTASI';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prodi'] = $this->model('UserMahasiswa')->getDataProfil('nama_prodi');
    
        // Cek apakah form telah disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validasi input form
            if (
                !empty($_POST['nama-mahasiswa']) &&
                !empty($_POST['nama-prestasi']) &&
                !empty($_POST['tingkat-kompetisi']) &&
                !empty($_POST['juara']) &&
                !empty($_POST['tanggal-juara'])
            ) {
                try {
                    // Panggil model untuk menyimpan data
                    $result = $this->model('UserMahasiswa')->savePrestasi([
                        'namaMahasiswa' => $_POST['nama-mahasiswa'],
                        'namaLomba' => $_POST['nama-prestasi'],
                        'namaKategori' => $_POST['tingkat-kompetisi'],
                        'juara' => $_POST['juara'],
                        'tanggalJuara' => $_POST['tanggal-juara'],
                        'sertifikat' => $_FILES['sertifikat'] ?? null,
                        'foto' => $_FILES['foto'] ?? null,
                        'suratTugas' => $_FILES['surat'] ?? null,
                        'proposal' => $_FILES['proposal'] ?? null,
                    ]);
    
                    if ($result) {
                        header('Location: ' . BASEURL. '/mahasiswa/input_prestasi');
                        exit;
                    }
                } catch (Exception $e) {
                    echo('Terjadi kesalahan: ' . $e->getMessage() .  'danger');
                }
            } 
        }
    
        // Load view
        $this->view('templates/templateMahasiswa', $data);
        $this->view('mahasiswa/formInput', $data);
    }
    
}