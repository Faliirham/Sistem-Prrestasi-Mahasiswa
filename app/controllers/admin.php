<?php 

class Admin extends Controller {
    public function index (){
        $data['judul'] = 'Beranda';
        $data['nama'] = $this->model('UserAdmin')->getData('nama_admin');
        $data['NIP'] = $this->model('UserAdmin')->getData('id_admin');
        $this->view('admin/beranda', $data);
        $this->view('templates/headadmin', $data);    
    }

    public function profile(){
        $data['judul'] = 'Profile';
        $data['nama'] = $this->model('UserAdmin')->getUserAdmin();
        $this->view('templates/headadmin', $data);
        $this->view('admin/profile', $data);
    }
    
    public function inputAgenda(){
        $data['judul'] = 'Input Agenda';
        $data['nama'] = $this->model('UserAdmin')->getUserAdmin();
        $this->view('templates/headadmin', $data);
        $this->view('admin/InputAgenda', $data);
    }

    public function leaderboard(){
        $data['judul'] = 'Leaderboard';
        $data['nama'] = $this->model('UserAdmin')->getUserAdmin();
        $this->view('templates/headadmin', $data);
        $this->view('admin/leaderboard', $data);
    }

    public function validasiInput (){
        $data['judul'] = 'Validasi Input';
        $data['nama'] = $this->model('UserAdmin')->getUserAdmin();
        $this->view('templates/headadmin', $data);
        $this->view('admin/validasiInput', $data);
    }    

    public function validasiMessage (){
        $data['judul'] = 'Validasi Message';
        $data['nama'] = $this->model('UserAdmin')->getUserAdmin();
        $this->view('templates/headadmin', $data);
        $this->view('admin/validasiMessage', $data);
    }
}