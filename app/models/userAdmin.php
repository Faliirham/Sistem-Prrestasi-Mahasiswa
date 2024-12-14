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
        
    }