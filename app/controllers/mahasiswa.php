<?php
class Mahasiswa extends Controller{

    public function index (){
        $data['judul'] = 'Beranda';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['agenda'] = $this->model('UserMahasiswa')->getAgenda();
        $data['leaderboard']=$this->model('UserMahasiswa')->getLeaderboard();
        $this->view('templates/headMhs', $data);  
        $this->view('mahasiswa/beranda', $data);
          
    }

    public function profil (){
        $data['judul'] = 'Profil';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prodi'] = $this->model('UserMahasiswa')->getProdiMahasiswa($data['nama_prodi']);
        $this->view('templates/headMhs', $data);  
        $this->view('mahasiswa/profil', $data);
          
    }

    public function cetakprestasi (){
        $data['judul'] = 'cetakprestasi';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prestasi'] = $this->model('UserMahasiswa')->getPrestasiByMahasiswa($data['NIM']);
        $this->view('templates/headMhs', $data);  
        $this->view('mahasiswa/cetakprestasi', $data);
          
    }

    public function input_prestasi (){
        $data['judul'] = 'input_prestasi';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prestasi'] = $this->model('UserMahasiswa')->getPrestasiByMahasiswa($data['NIM']);
        $this->view('templates/headMhs', $data);  
        $this->view('mahasiswa/input_prestasi', $data);
          
    }

    public function formInput()
    {
        $data['judul'] = 'Form Input Prestasi';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
    
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
                        header('Location: ' . URL . '/mahasiswa/input_prestasi');
                        exit;
                    }
                } catch (Exception $e) {
                    echo('Terjadi kesalahan: ' . $e->getMessage() .  'danger');
                }
            } 
        }
    
        // Load view
        $this->view('templates/headMhs', $data);
        $this->view('mahasiswa/formInput', $data);
    }
    
}