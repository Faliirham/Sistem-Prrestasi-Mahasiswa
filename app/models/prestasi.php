<?php

class Prestasi {
    private $db;
    private $query;

    public function __construct() {
        $this->db = new Database();
    }

    public function setPrestasi() {
        $namaMahasiswa = $_POST['nama_mahasiswa']; 
        $namaLomba = $_POST['nama_prestasi'];
        $namaKategori = $_POST['tingkat_kompetisi']; 
        $juara = $_POST['juara'];
        $tanggalJuara = $_POST['tanggal_juara'];
        $sertifikat = file_get_contents($_FILES['sertifikat']['tmp_name']);
        $foto = file_get_contents($_FILES['foto']['tmp_name']);
        $suratTugas = file_get_contents($_FILES['surat']['tmp_name']);
        $proposal = file_get_contents($_FILES['proposal']['tmp_name']);

    
        // Dapatkan id_mhs berdasarkan nama mahasiswa.
        $idMahasiswa = $this->getMahasiswaId($namaMahasiswa);
        // Dapatkan id_Kategori berdasarkan nama kategori prestasi.
        $kategoriId = $this->getKategoriId($namaKategori);
        // Dapatkan id_point berdasarkan id_Kategori dan juara.
        $idPoint = $this->calculatePoint($kategoriId, $juara);
    
        // Query untuk memasukkan data ke tabel Prestasi.
        $this->query = "
           INSERT INTO Prestasi (
                id_mhs, nama_lomba, id_Kategori, Juara, Tanggal_juara, Sertif, foto, surat_tgs, karya, id_point
            ) VALUES (
                :id_mhs, :nama_lomba, :id_Kategori, :Juara, :Tanggal_juara,
                CONVERT(varbinary(max), :Sertif), CONVERT(varbinary(max), :foto), 
                CONVERT(varbinary(max), :surat_tgs), CONVERT(varbinary(max), :karya), :id_point
            )
        ";
    
        // Parameter binding (untuk keamanan terhadap SQL Injection).
        $stmt = $this->db->query($this->query);
        $stmt->bind(':id_mhs', $idMahasiswa);
        $stmt->bind(':nama_lomba', $namaLomba);
        $stmt->bind(':id_Kategori', $kategoriId);
        $stmt->bind(':Juara', $juara);
        $stmt->bind(':Tanggal_juara', $tanggalJuara);
        $stmt->bind(':Sertif', $sertifikat, PDO::PARAM_LOB);
        $stmt->bind(':foto', $foto, PDO::PARAM_LOB);
        $stmt->bind(':surat_tgs', $suratTugas, PDO::PARAM_LOB);
        $stmt->bind(':karya', $proposal, PDO::PARAM_LOB);
        $stmt->bind(':id_point', $idPoint);
    
        // Eksekusi query.
        try {
            $stmt->execute();
            echo "<script> alert('Berhasil Menambahkan Prestasi') window.location.href = '" . BASEURL . "/admin/validasiinput';</script>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    private function getMahasiswaId($namaMahasiswa) {
        // Query untuk mendapatkan id_mhs berdasarkan nama mahasiswa.
        $query = "SELECT id_mhs FROM Mahasiswa WHERE nama_mhs = :nama_mhs";
        $stmt = $this->db->query($query);
        $stmt->bind(':nama_mhs', $namaMahasiswa);
        $stmt->execute();
        $result = $stmt->single();
        return $result ? $result['id_mhs'] : null;
    }
    
    private function getKategoriId($namaKategori) {
        // Query untuk mendapatkan id_Kategori berdasarkan nama kategori.
        $query = "SELECT id_Kategori FROM Kategori_prestasi WHERE nama_kategori = :nama_kategori";
        $stmt = $this->db->query($query);
        $stmt->bind(':nama_kategori', $namaKategori);
        $stmt->execute();
        $result = $stmt->single(PDO::FETCH_ASSOC);
        return $result ? $result['id_Kategori'] : null;
    }
    
    private function calculatePoint($kategoriId, $juara) {
        // Tentukan rentang id_point berdasarkan kategori.
        $pointRangeStart = 0;
    
        if ($kategoriId >= 1 && $kategoriId <= 4) {
            // Internasional
            $pointRangeStart = 1;
        } elseif ($kategoriId >= 5 && $kategoriId <= 8) {
            // Nasional
            $pointRangeStart = 5;
        } elseif ($kategoriId >= 9 && $kategoriId <= 12) {
            // Regional
            $pointRangeStart = 9;
        }elseif ($kategoriId >= 13 && $kategoriId <=16){
            // Provinsi
            $pointRangeStart = 13;
        }elseif ($kategoriId >= 17 && $kategoriId <=20){
            $pointRangeStart = 17;
        }
    
        // Mapping Juara ke Index (1 untuk Juara 1, 2 untuk Juara 2, dst.)
        $juaraIndex = 0;
        switch (strtolower($juara)) {
            case 'juara 1':
                $juaraIndex = 1;
                break;
            case 'juara 2':
                $juaraIndex = 2;
                break;
            case 'juara 3':
                $juaraIndex = 3;
                break;
            case 'juara harapan':
                $juaraIndex = 4;
                break;
        }
    
        if ($juaraIndex > 0) {
            return $pointRangeStart + $juaraIndex - 1;
        }
    
        return null; // Jika juara tidak valid.
    }    

}