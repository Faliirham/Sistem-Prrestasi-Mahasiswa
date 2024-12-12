<?php
class Mahasiswa extends Controller{

    public function index (){
        $data['judul'] = 'Beranda';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['agenda'] = $this->model('UserMahasiswa')->getAgenda();
        $this->view('templates/headMhs', $data);  
        $this->view('mahasiswa/beranda', $data);
          
    }

    public function profil (){
        $data['judul'] = 'Profil';
        $data['namaMhs'] = $this->model('UserMahasiswa')->getData('nama_mhs');
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prodi'] = $this->model('UserMahasiswa')->getProdiMahasiswa($data['NIM']);
        $this->view('templates/headMhs', $data);  
        $this->view('mahasiswa/profil', $data);
          
    }

    public function input_prestasi (){
        $data['judul'] = 'input_prestasi';
        $data['NIM'] = $this->model('UserMahasiswa')->getData('id_mhs');
        $data['prestasi'] = $this->model('UserMahasiswa')->getPrestasiByMahasiswa($data['NIM']);
        $this->view('templates/headMhs', $data);  
        $this->view('mahasiswa/input_prestasi', $data);
          
    }
}