<?php 

class Admin extends Controller {
    public function index (){
        $data['judul'] = 'BERANDA';
        $data['nama'] = $this->model('UserAdmin')->getData('nama_admin');
        $data['NIP'] = $this->model('UserAdmin')->getData('id_admin');
        $data['agenda']=$this->model('UserAdmin')->showAgenda();
        $data['leaderboard']=$this->model('UserAdmin')->getLeaderboard();
        $this->view('templates/templateAdmin', $data);  
        $this->view('admin/beranda', $data);
          
    }
    public function addAgenda(){
        $this->model('UserAdmin')->addAgenda();
    }
    public function profile(){
        $data['judul'] = 'PROFILE';
        $data['nama'] = $this->model('UserAdmin')->getData('nama_admin');
        $data['NIP'] = $this->model('UserAdmin')->getData('id_admin');
        $data['email'] = $this->model('UserAdmin')->getData('email_admin');
        $this->view('templates/templateAdmin', $data);
        $this->view('admin/profile', $data);
    }

    public function viewPrestasi (){
        $data['judul'] = 'PRESTASI';
        $data['nama'] = $this->model('UserAdmin')->getData('nama_admin');
        $data['NIP'] = $this->model('UserAdmin')->getData('id_admin');
        $data['email'] = $this->model('UserAdmin')->getData('email_admin');
        $this->view('templates/templateAdmin', $data);
        $this->view('admin/validasiInput', $data);
    }    

    public function updateStatus (){
        $this->model('UserAdmin')->updateStatus();
    }

    // public function setPrestasi(){
    //     $this->model('prestasi')->setPrestasi();
    //     $data['point']=$this->model('prestasi')->calculatePoints();
    // }
    public function validasiInput(){
        $data['judul'] = 'VALIDASI';
        $data['nama'] = $this->model('UserAdmin')->getData('nama_admin');
        $data['NIP'] = $this->model('UserAdmin')->getData('id_admin');
        $data['email'] = $this->model('UserAdmin')->getData('email_admin');
        // $data['sertifikat'] = !empty($_FILES['sertifikat']['name']) ? $_FILES['sertifikat']['name'] : ($data['sertifikat'] ?? null);
        // $data['foto'] = !empty($_FILES['foto']['name']) ? $_FILES['foto']['name'] : ($data['foto'] ?? null);
        // $data['surat'] = !empty($_FILES['surat']['name']) ? $_FILES['surat']['name'] : ($data['surat'] ?? null);
        // $data['proposal'] = !empty($_FILES['proposal']['name']) ? $_FILES['proposal']['name'] : ($data['proposal'] ?? null);        
        $this->view('templates/templateAdmin', $data);
        $this->view('admin/validasiInput', $data);
    }
    public function prestasi (){
        $data['judul'] = 'PRESTASI';
        $data['nama'] = $this->model('UserAdmin')->getData('nama_admin');
        $data['NIP'] = $this->model('UserAdmin')->getData('id_admin');
        $data['email'] = $this->model('UserAdmin')->getData('email_admin');
        $data['prestasi'] = $this->model('UserAdmin')->getValidasiPrestasi();
        $this->view('templates/templateAdmin',$data );
        $this->view('admin/validasiPrestasi',$data);
    }
}