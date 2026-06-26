<?php
require_once 'Mahasiswa.php';
require_once 'koneksi.php';

class MahasiswaMandiri extends Mahasiswa {
    // Properti Tambahan Spesifik
    private $golonganUkt;
    private $namaWali;

    // Constructor untuk inisialisasi properti induk dan anak
    public function __construct($id, $nama, $nim, $semester, $tarifUkt, $jenis, $golonganUkt, $namaWali) {
        parent::__construct($id, $nama, $nim, $semester, $tarifUkt, $jenis);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // === TAHAP 5: OVERRIDING POLIMORFISME ===
    public function hitungTagihanSemester() {
        // Total Tagihan = tarifUktNominal + 100000 (biaya operasional flat)
        return $this->tarifUktNominal + 100000;
    }

    public function tampilkanSpesifikasiAkademik() {
        return "Mahasiswa Mandiri - Wali: " . $this->namaWali . ", Golongan UKT: " . $this->golonganUkt;
    }

    // Method dengan Query (SELECT WHERE) Khusus Mahasiswa Mandiri
    public static function ambilDataMandiri($db) {
        $query = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiayaan = 'mandiri'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarMahasiswa = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarMahasiswa[] = new MahasiswaMandiri(
                $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                $row['semester'], $row['tarif_ukt_nominal'], $row['jenis_pembiayaan'],
                $row['golongan_ukt'], $row['nama_wali']
            );
        }
        return $daftarMahasiswa;
    }
}