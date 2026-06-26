<?php
require_once 'Mahasiswa.php';
require_once 'koneksi.php';

class MahasiswaBidikMisi extends Mahasiswa {
    // Properti Tambahan Spesifik
    private $nomorKipKuliah;
    private $danaSakuSubsidi;

    // Constructor untuk inisialisasi properti induk dan anak
    public function __construct($id, $nama, $nim, $semester, $tarifUkt, $jenis, $nomorKip, $danaSaku) {
        parent::__construct($id, $nama, $nim, $semester, $tarifUkt, $jenis);
        $this->nomorKipKuliah = $nomorKip;
        $this->danaSakuSubsidi = $danaSaku;
    }

    // === TAHAP 5: OVERRIDING POLIMORFISME ===
    public function hitungTagihanSemester() {
        // Total Tagihan = 0 (Gratis penuh ditanggung negara)
        return 0;
    }

    public function tampilkanSpesifikasiAkademik() {
        return "Mahasiswa Bidikmisi - No KIP: " . $this->nomorKipKuliah . ", Subsidi Saku: Rp " . number_format($this->danaSakuSubsidi, 0, ',', '.');
    }

    // Method dengan Query (SELECT WHERE) Khusus Mahasiswa Bidikmisi
    public static function ambilDataBidikMisi($db) {
        $query = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiayaan = 'bidikmisi'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarMahasiswa = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarMahasiswa[] = new MahasiswaBidikMisi(
                $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                $row['semester'], $row['tarif_ukt_nominal'], $row['jenis_pembiayaan'],
                $row['nomor_kip_kuliah'], $row['dana_saku_subsidi']
            );
        }
        return $daftarMahasiswa;
    }
}