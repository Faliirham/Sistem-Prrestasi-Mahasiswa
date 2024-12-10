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

}