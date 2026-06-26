<?php
require_once 'Mahasiswa.php';
require_once 'koneksi.php';

class MahasiswaPrestasi extends Mahasiswa {
    // Properti Tambahan Spesifik
    private $namaInstansiBeasiswa;
    private $minimalIpkSyarat;

    // Constructor untuk inisialisasi properti induk dan anak
    public function __construct($id, $nama, $nim, $semester, $tarifUkt, $jenis, $instansi, $minIpk) {
        parent::__construct($id, $nama, $nim, $semester, $tarifUkt, $jenis);
        $this->namaInstansiBeasiswa = $instansi;
        $this->minimalIpkSyarat = $minIpk;
    }

    // === TAHAP 5: OVERRIDING POLIMORFISME ===
    public function hitungTagihanSemester() {
        // Total Tagihan = tarifUktNominal * 0.25 (Diskon beasiswa 75%)
        return $this->tarifUktNominal * 0.25;
    }

    public function tampilkanSpesifikasiAkademik() {
        return "Mahasiswa Prestasi - Beasiswa: " . $this->namaInstansiBeasiswa . ", Syarat IPK: " . $this->minimalIpkSyarat;
    }

    // Method dengan Query (SELECT WHERE) Khusus Mahasiswa Prestasi
    public static function ambilDataPrestasi($db) {
        $query = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiayaan = 'prestasi'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarMahasiswa = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarMahasiswa[] = new MahasiswaPrestasi(
                $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                $row['semester'], $row['tarif_ukt_nominal'], $row['jenis_pembiayaan'],
                $row['nama_instansi_beasiswa'], $row['minimal_ipk_syarat']
            );
        }
        return $daftarMahasiswa;
    }
}