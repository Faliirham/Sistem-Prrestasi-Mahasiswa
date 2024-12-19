<?php 

class Admin extends Controller {
    public function login (){
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
    // public function updateAgenda(){
    //     $agenda['nama'] = $this->model('UserAdmin')->getAgendaById('nama_agenda');
    //     $agenda['tanggal'] = $this->model('UserAdmin')->getAgendaById('tanggal_agenda');
    //     $agenda['link'] = $this->model('UserAdmin')->getAgendaById('link');
    //     $this->model('UserAdmin',$agenda)->editAgenda();
    // }
    public function delAgenda() {
        $this->model('UserAdmin')->deleteAgendaById();
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
        $this->view('admin/input', $data);
    }    

    public function updateStatus (){
        $this->model('UserAdmin')->updateStatus();
    }
    public function addUser (){
        $this->model('UserAdmin')->addUser();
    }
    public function addTingkatPrestasi(){
        $this->model('UserAdmin')->addTingkatPrestasi();
    }
    // public function setPrestasi(){
    //     $this->model('prestasi')->setPrestasi();
    //     $data['point']=$this->model('prestasi')->calculatePoints();
    // }
    public function input(){
        $data['judul'] = 'VALIDASI';
        $data['nama'] = $this->model('UserAdmin')->getData('nama_admin');
        $data['NIP'] = $this->model('UserAdmin')->getData('id_admin');
        $data['email'] = $this->model('UserAdmin')->getData('email_admin');
        // $data['sertifikat'] = !empty($_FILES['sertifikat']['name']) ? $_FILES['sertifikat']['name'] : ($data['sertifikat'] ?? null);
        // $data['foto'] = !empty($_FILES['foto']['name']) ? $_FILES['foto']['name'] : ($data['foto'] ?? null);
        // $data['surat'] = !empty($_FILES['surat']['name']) ? $_FILES['surat']['name'] : ($data['surat'] ?? null);
        // $data['proposal'] = !empty($_FILES['proposal']['name']) ? $_FILES['proposal']['name'] : ($data['proposal'] ?? null);        
        $this->view('templates/templateAdmin', $data);
        $this->view('admin/input', $data);
    }
    public function prestasi (){
        $data['judul'] = 'PRESTASI';
        $data['nama'] = $this->model('UserAdmin')->getData('nama_admin');
        $data['NIP'] = $this->model('UserAdmin')->getData('id_admin');
        $data['email'] = $this->model('UserAdmin')->getData('email_admin');
        $data['prestasi'] = $this->model('UserAdmin')->getValidasiPrestasi();
        $this->view('templates/templateAdmin',$data );
        $this->view('admin/prestasi',$data);
    }
}