<?php
class Koneksi {
    // Sesuaikan dengan konfigurasi MySQL di laptop kamu
    private $host = "localhost";
    private $db_name = "DB_UAS_PBO_TRPL1A_NABILKUNDIHARTANTO";
    private $username = "root";
    private $password = "";
    private $conn;

    // Method untuk mendapatkan koneksi database
    public function getKoneksi() {
        $this->conn = null;

        try {
            // Membuat koneksi dengan PDO (Gaya OOP PHP)
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            
            // Mengatur mode error PDO ke Exception untuk memudahkan debugging
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Baris ini bisa diaktifkan untuk tes awal, hapus/komentari jika sudah masuk ke tampilan web
            // echo "Koneksi ke database BERHASIL!"; 
            
        } catch(PDOException $exception) {
            echo "Koneksi database GAGAL: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

// === CARA PENGETESAN KONEKSI ===
// Kamu bisa buka file ini di browser (ex: localhost/folder_uas/koneksi.php) untuk tes
$database = new Koneksi();
$db = $database->getKoneksi();
?>