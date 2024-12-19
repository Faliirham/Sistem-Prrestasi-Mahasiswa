<?php 

class UserAdmin {
    private $username;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function getUserAdmin() {
        // Periksa apakah variabel $_SESSION['Admin'] ada
        if (isset($_SESSION['admin'])) {
            $this->username = $_SESSION['admin'];
            $querry = "SELECT * FROM Admin WHERE id_admin = :username";
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
        $userData = $this->getUserAdmin();
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
    public function getAgendaById($field){
            $id = $_POST['id'];
            $stmt = $this->db->query("SELECT * FROM agenda WHERE id_agenda = :id");
            $stmt->bind(':id', $id);
            $agendaData = $stmt->single();
        if ($agendaData) {
            // Periksa apakah kolom yang diminta ada dalam hasil
            if (isset($agendaData[$field])) {
                return $agendaData[$field]; // Mengembalikan nilai dari kolom yang diminta
            } else {
                return 'Kolom tidak ditemukan'; // Jika kolom tidak ada
            }
        } else {
            return 'Pengguna tidak ditemukan'; // Alternatif jika tidak ada data
        }
    }

    public function showAgenda(){
        if (isset($_SESSION['admin'])) {
            $querry = "SELECT * FROM Agenda";
            $this->db->query($querry);
            $result = $this->db->resultSet();

            if($result){
                    return $result;
                }
            }
        }

        public function addAgenda() {
            if (isset($_SESSION['admin'])) {
                // Menyiapkan data agenda dari form
                $dataAgenda = [
                    'nama_agenda' => $_POST['nama-agenda'],
                    'tanggal_agenda' => $_POST['tanggal-agenda'],
                    'link_agenda' => $_POST['link-agenda'],
                    'id_admin' => $_SESSION['admin'],
                ];
        
                // Query untuk menambah data agenda
                $query = "INSERT INTO Agenda (nama_agenda, link, id_admin, tanggal_agenda)
                          VALUES (:nama_agenda, :link_agenda, :id_admin, :tanggal_agenda)";
                $this->db->query($query);
                $this->db->bind(':nama_agenda', $dataAgenda['nama_agenda']);
                $this->db->bind(':link_agenda', $dataAgenda['link_agenda']);
                $this->db->bind(':id_admin', $dataAgenda['id_admin']);
                $this->db->bind(':tanggal_agenda', $dataAgenda['tanggal_agenda']);
                $result=$this->db->execute();

                if ($result) {
                    echo "<script>
                            alert('Agenda berhasil ditambahkan!');
                            window.location.href = '". BASEURL ."/admin/beranda';
                          </script>";
                } else {
                    echo "<script>
                            alert('Gagal menambahkan agenda!');
                            window.location.href = '". BASEURL ."/login';
                          </script>";
                }                
           } 
        }
        public function deleteAgendaById() {
            // Pastikan data ID diterima dari POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                $id = $_POST['id'];
        
                $query = "DELETE FROM agenda WHERE id_agenda = :id";
                $this->db->query($query);
                $this->db->bind('id', $id);
                $result = $this->db->execute();
        
                // Menampilkan pesan sukses atau gagal
                if ($result) {
                    echo "<script>alert('Agenda berhasil dihapus!'); window.location.href = '" . BASEURL . "/admin/beranda';</script>";
                } else {
                    echo "<script>alert('Gagal menghapus agenda!'); window.location.href = '" . BASEURL . "/admin/beranda';</script>";
                }
            } else {
                // Jika data ID tidak ditemukan atau metode bukan POST
                echo "<script>alert('Akses tidak valid!'); window.location.href = '" . BASEURL . "/admin/beranda';</script>";
            }
        }
        public function editAgenda (){
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                $id = $_POST['id'];
                $nama_agenda = $_POST['nama-agenda'];
                $tanggal_agenda = $_POST['tanggal-agenda'];
                $link_agenda = $_POST['link-agenda'];

                $querry = "UPDATE agenda SET nama_agenda = :nama, tanggal_agenda = :tanggal, link = :link WHERE id_agenda = :id";
                $this->db->query($querry);
                $this->db->bind('id', $id);
                $this->db->bind('nama', $nama_agenda);
                $this->db->bind('tanggal', $tanggal_agenda);
                $this->db->bind('link', $link_agenda);
                $result = $this->db->execute();

                if ($result) {
                    echo "<script>alert('Agenda berhasil diubah!'); window.location.href = '". BASEURL. "/admin/beranda';</script>";
                }
            }
        }
        
        public function getValidasiPrestasi (){
                $query = "SELECT 
                    p.id_mhs,
                    m.nama_mhs,
                    p.nama_lomba, 
                    p.juara,
                    k.nama_kategori, 
                    s.status_validasi AS status_kategori
                FROM 
                    Prestasi p
                JOIN
                    Mahasiswa m ON p.id_mhs = m.id_mhs
                JOIN 
                    Kategori_prestasi k ON p.id_Kategori = k.id_Kategori
                JOIN 
                    Validasi v ON p.id_prestasi = v.id_prestasi
                JOIN 
                    Status_validasi s ON v.id_status = s.id_status;";
             $this->db->query($query);
             $result = $this->db->resultSet();
 
             if($result){
                     return $result;
              
                }
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

        public function updateStatus() {
            if (isset($_SESSION['admin'])) {
                // Gather form data
                $id_validasi = $_POST['id_validasi'];
                $diterima = isset($_POST['Terima']) ? 1 : 0;
                $ditolak = isset($_POST['Tolak']) ? 1 : 0;
        
                // Prepare query to update validation status
                $query = "UPDATE Validasi 
                          SET id_status = CASE 
                                          WHEN :diterima = 1 THEN 1  -- Accepted
                                          WHEN :ditolak = 1 THEN 3  -- Rejected
                                          ELSE id_status
                                        END,
                              tgl_validasi = GETDATE()
                          WHERE id_validasi = 2;";
        
                // Bind and execute query
                $this->db->query($query);
                $this->db->bind(':diterima', $diterima);
                $this->db->bind(':ditolak', $ditolak);
                $this->db->bind(':id_validasi', $id_validasi);
        
                return $this->db->execute();
            }
            return false; // Return false if admin session is not set
        }

        public function addUser() {
            if (isset($_SESSION['admin'])) {
                // Gather form data
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                $id_mhs = null;
                $id_admin = null;
        
                // Check role and insert into the correct table (Mahasiswa or Admin)
                if ($role == 'mahasiswa') {
                    $id_mhs = $username;  // Use username as id_mhs for mahasiswa
                    $id_admin = null;
                    $role = 1; // Set role to mahasiswa
        
                    // Insert into Mahasiswa table
                    $query1 = "INSERT INTO Mahasiswa (id_mhs, nama_mhs, id_prodi, Tahun_angkatan, email_mhs, id_role, foto_mhs) 
                              VALUES (:id_mhs, NULL, NULL, NULL, NULL, 1, NULL)";
                    $this->db->query($query1);
                    $this->db->bind('id_mhs', $id_mhs);
                    $result = $this->db->execute();
                } elseif ($role == 'admin') {
                    $id_admin = $username;  // Use username as id_admin for admin
                    $id_mhs = null;
                    $role = 2;  // Set role to admin
        
                    // Insert into Admin table
                    $query2 = "INSERT INTO Admin (id_admin, nama_admin, email_admin, id_role, foto_admin) 
                              VALUES (:id_admin, NULL, NULL, 2, NULL)";
                    $this->db->query($query2);
                    $this->db->bind('id_admin', $id_admin);
                    $result = $this->db->execute();
                }
        
                // Insert login data (only password) with WHERE condition
                if ($id_mhs) {
                    // For mahasiswa
                    $query = "UPDATE Login SET password = :password WHERE id_mhs = :id_mhs";
                    $this->db->query($query);
                    $this->db->bind('id_mhs', $id_mhs);
                } elseif ($id_admin) {
                    // For admin
                    $query = "UPDATE Login SET password = :password WHERE id_admin = :id_admin";
                    $this->db->query($query);
                    $this->db->bind('id_admin', $id_admin);
                }
        
                $this->db->bind('password', $password);  // Bind password (consider hashing)
                $result = $this->db->execute();

                if($result){
                    echo "<script>alert('User berhasil ditambahkan!'); window.location.href = '". BASEURL. "/admin/beranda';</script>";
                }
            }
        }     
        
        public function addTingkatPrestasi(){
            if (isset($_SESSION['admin'])) {
                // Gather form data
                $nama_tingkat = $_POST['nama-prestasi'];

                $querry = "INSERT INTO Kategori_prestasi (nama_kategori) VALUES
                (:nama_tingkat)";
                
                $this->db->query($querry);
                $this->db->bind('nama_tingkat', $nama_tingkat);
                $result = $this->db->execute();
                if ($result) {
                    echo "<script>alert('Tingkat prestasi berhasil ditambahkan!'); window.location.href = '". BASEURL. "/admin/beranda';</script>";
                }
            }
        }
    }