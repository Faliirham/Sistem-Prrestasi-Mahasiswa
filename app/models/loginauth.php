<?php
class LoginAuth {
    private $username;
    private $password;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function authLogin() {
        // Ambil input dari POST dan sanitasi
        $this->username = isset($_POST['username']) ? trim($_POST['username']) : null;
        $this->password = isset($_POST['password']) ? trim($_POST['password']) : null;

        if (empty($this->username) || empty($this->password)) {
            echo "<script>alert('Username dan Password tidak boleh kosong');</script>";
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // Query pertama untuk mendapatkan data user
        $query1 = "
        SELECT id_mhs, password, id_role
        FROM Mahasiswa
        WHERE id_mhs = :username;
        ";
        
        $this->db->query($query1);
        $this->db->bind(':username', $this->username);
        $result = $this->db->single();

        // Cek hasil query pertama
        if (!$result) {
            // Jika tidak ditemukan di query pertama, coba query kedua
            $query2 = "
            SELECT id_admin, password, id_role
            FROM Admin
            WHERE id_admin = :username;
            ";
            
            $this->db->query($query2);
            $this->db->bind(':username', $this->username);
            $result = $this->db->single();
        }

        // Debug jika terjadi error
        if (!$result) {
            echo "<script>alert('Username tidak ditemukan');</script>";
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // Verifikasi password
        if (is_array($result) && $result['password'] === $this->password) {
            // Redirect berdasarkan role
            if ((int)$result['id_role'] === 2) {
                header('Location: ' . BASEURL . '/admin/beranda');
                $_SESSION['admin'] = $this->username;
                exit;
            } elseif ((int)$result['id_role'] === 1) {
                header('Location: ' . BASEURL . '/mahasiswa/');
                $_SESSION['mahasiswa'] = $this->username;
                exit;
            }
        } else {
            // Login gagal
            echo "<script>alert('Username atau Password salah');</script>";
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout (){
        session_destroy();
        header('Location: '.BASEURL.'/login');
        exit;
    }
}
?>