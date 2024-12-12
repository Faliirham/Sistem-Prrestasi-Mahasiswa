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
        // Query untuk tabel Login
        $query = "
        SELECT id_mhs, id_admin, password
        FROM Login
        WHERE password = :password;
        ";
        $this->db->query($query);
        $this->db->bind(':password', $this->password); 
        $result = $this->db->single();

        // Cek hasil query
        if (!$result) {
            echo "<script>alert('Username atau Password salah');
            window.location.href = '" . URL . "/login'</script>";
            exit;
        }

        // Verifikasi username secara manual
        if ($result['id_admin'] || $result['id_mhs']) {
            // Username ditemukan, simpan ke session berdasarkan role
            if (!empty($result['id_admin'])) {
                $_SESSION['admin'] = $this->username;
                header('Location: ' . URL . '/admin/beranda');
                exit;
            } elseif (!empty($result['id_mhs'])) {
                $_SESSION['mahasiswa'] = $this->username;
                header('Location: ' . URL . '/mahasiswa/beranda');
                exit;
            }
        } else {
            // Username tidak sesuai
            echo "<script>alert('User Tidak Ditemukan');
            window.location.href = '" . URL . "/login'</script>";
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . URL . '/login');
        exit;
    }

    public function reset() {
        $nomorinduk = isset($_POST['nim']) ? trim($_POST['nim']) : null;
        $role = isset($_POST['role']) ? trim($_POST['role']) : null;
        $email = isset($_POST['email']) ? trim($_POST['email']) : null;
        $newPass = isset($_POST['new_password']) ? trim($_POST['new_password']) : null;
        $confirmPass = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : null;
    
        // Validasi password baru dan konfirmasi password
        if ($newPass !== $confirmPass) {
            echo "<script>alert('Password baru dan konfirmasi password harus sama');
             window.location.href = '" . URL . "/login/forgot'</script>";
            exit;
        }
    
        // Validasi panjang password
        if (strlen($newPass) < 6) {
            echo "<script>alert('Password harus memiliki minimal 6 karakter');
            window.location.href = '" . URL . "/login/forgot'</script>";
        }
    
        if ($role === "mahasiswa") {
            // Cek email dan nomor induk mahasiswa
            $query1 = "SELECT id_mhs, email_mhs FROM Mahasiswa WHERE email_mhs = :email";
            $this->db->query($query1);
            $this->db->bind(':email', $email);
            $result = $this->db->single();
    
            if (!$result || $result['id_mhs'] != $nomorinduk) {
                echo "<script>alert('Harap Masukkan NIM / Email dengan benar'); 
                window.location.href = '" . URL . "/login/forgot'</script>";
                exit;
            }
    
            // Update password mahasiswa
            $query2 = "UPDATE Login SET password = :password WHERE id_mhs = :nim";
            $this->db->query($query2);
            $this->db->bind(':password', $newPass);
            $this->db->bind(':nim', $nomorinduk);
            $this->db->execute();
    
            echo "<script>alert('Password berhasil diubah') 
            window.location.href = '" . URL . "/login';</script>";
            exit;       
        } elseif ($role === "admin") {
            // Cek email dan nomor induk admin
            $query1 = "SELECT id_admin, email_admin FROM Admin WHERE email_admin = :email";
            $this->db->query($query1);
            $this->db->bind(':email', $email);
            $result = $this->db->single();
    
            if (!$result || $result['id_admin'] != $nomorinduk) {
                echo "<script>alert('Harap Masukkan ID Admin / Email dengan benar');
                 window.location.href = '" . URL . "/login/forgot'</script>";
                exit;
            }
    
            // Update password admin
            $query2 = "UPDATE Login SET password = :password WHERE id_admin = :id_admin";
            $this->db->query($query2);
            $this->db->bind(':password', $newPass);
            $this->db->bind(':id_admin', $nomorinduk);
            $this->db->execute();
    
            echo "<script>alert('Password berhasil diubah') 
            window.location.href = '" . URL . "/login';</script>";
            exit;
        } else {
            echo "<script>alert('Role tidak valid');
             window.location.href = '" . URL . "/login/forgot'</script>";
            exit;
        }
    }    
}