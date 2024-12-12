<?php 

class UserMahasiswa {
    private $username;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function getUserMhs() {
        // Periksa apakah variabel $_SESSION['Admin'] ada
        if (isset($_SESSION['mahasiswa'])) {
            $this->username = $_SESSION['mahasiswa'];
            $querry = "SELECT * FROM Mahasiswa WHERE id_mhs = :username";
            $this->db->query($querry);
            $this->db->bind(':username', $this->username);
            $result = $this->db->single();

            if ($result) {
                return $result; // Mengembalikan data pengguna
            } else {
                // Tangani kasus jika tidak ada data ditemukan
                echo "Data pengguna tidak ditemukan.";
                return null;
            }
        } 
    }
    public function getData($field) {
        $userData = $this->getUserMhs();
        if ($userData) {
            // Periksa apakah kolom yang diminta ada dalam hasil
            if (isset($userData[$field])) {
                return $userData[$field]; // Mengembalikan nilai dari kolom yang diminta
            } else {
                return 'Kolom tidak ditemukan'; // Jika kolom tidak ada
            }
        } else {
            return 'Pengguna tidak ditemukan'; // Alternatif jika tidak ada data
        }
    }

    public function getAgenda() {
        $query = "SELECT * FROM Agenda";
        $this->db->query($query);
        $result = $this->db->resultSet();
    
        return $result;
    }

    public function getPrestasiByMahasiswa($id_mhs) {
        $query = "SELECT p.nama_lomba, p.juara, k.nama_kategori
                  FROM Prestasi p
                  JOIN Kategori_prestasi k ON p.id_kategori = k.id_kategori
                  WHERE p.id_mhs = :id_mhs";
        $this->db->query($query);
        $this->db->bind(':id_mhs', (int)$id_mhs);
        $result = $this->db->resultSet();
    
        return $result;
    }

    public function getProdiMahasiswa($id_mhs) {
        $query = "SELECT p.id_mhs, p.nama_mhs, p.email_mhs, k.nama_prodi
                  FROM Mahasiswa p
                  JOIN prodi k ON p.id_prodi = k.id_prodi
                  WHERE p.id_mhs = :id_mhs";
        $this->db->query($query);
        $this->db->bind(':id_mhs', (int)$id_mhs);
        $result = $this->db->resultSet();
    
        return $result;
    }

    public function getLeaderboard (){
        $query = "WITH TotalPoints AS (
            SELECT 
                p.id_mhs, 
                SUM(pt.id_point) AS total_point
            FROM 
                Prestasi p
            JOIN 
                Point pt ON p.id_point = pt.id_point
            GROUP BY 
                p.id_mhs
        )
        SELECT TOP 5
            tp.id_mhs, 
            m.nama_mhs AS nama_mahasiswa, 
            ps.nama_Prodi AS program_studi, 
            tp.total_point, 
            RANK() OVER (ORDER BY tp.total_point DESC) AS ranking
        FROM 
            TotalPoints tp
        JOIN 
            Mahasiswa m ON tp.id_mhs = m.id_mhs
        JOIN 
            prodi ps ON m.id_prodi = ps.id_prodi;";

         $this->db->query($query);
         $result = $this->db->resultSet();
         if($result){
            return $result;
     
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
    
    public function savePrestasi($data)
    {
        // Ambil id mahasiswa berdasarkan nama mahasiswa
        $idMahasiswa = $this->getMahasiswaId($data['namaMahasiswa']);
        if (!$idMahasiswa) {
            throw new Exception("Mahasiswa dengan nama '{$data['namaMahasiswa']}' tidak ditemukan.");
        }
    
        // Ambil id kategori berdasarkan nama kategori
        $kategoriId = $this->getKategoriId($data['namaKategori']);
        if (!$kategoriId) {
            throw new Exception("Kategori dengan nama '{$data['namaKategori']}' tidak ditemukan.");
        }
    
        // Hitung id point berdasarkan kategori dan juara
        $idPoint = $this->calculatePoint($kategoriId, $data['juara']);
        if (!$idPoint) {
            throw new Exception("Poin untuk kategori '{$data['namaKategori']}' dengan juara '{$data['juara']}' tidak valid.");
        }
    
        // Query untuk menyimpan data ke tabel Prestasi
        $query = "
            INSERT INTO Prestasi (
                id_mhs, nama_lomba, id_Kategori, Juara, Tanggal_juara, Sertif, foto, surat_tgs, karya, id_point
            ) VALUES (
                :id_mhs, :nama_lomba, :id_Kategori, :Juara, :Tanggal_juara, :Sertif, :foto, :surat_tgs, :karya, :id_point
            )
        ";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_mhs', $idMahasiswa);
        $stmt->bindParam(':nama_lomba', $data['namaLomba']);
        $stmt->bindParam(':id_Kategori', $kategoriId);
        $stmt->bindParam(':Juara', $data['juara']);
        $stmt->bindParam(':Tanggal_juara', $data['tanggalJuara']);
        $stmt->bindParam(':Sertif', file_get_contents($data['sertifikat']['tmp_name']), PDO::PARAM_LOB);
        $stmt->bindParam(':foto', file_get_contents($data['foto']['tmp_name']), PDO::PARAM_LOB);
        $stmt->bindParam(':surat_tgs', file_get_contents($data['suratTugas']['tmp_name']), PDO::PARAM_LOB);
        $stmt->bindParam(':karya', file_get_contents($data['proposal']['tmp_name']), PDO::PARAM_LOB);
        $stmt->bindParam(':id_point', $idPoint);
    
        return $stmt->execute();
    }    
}