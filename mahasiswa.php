<?php

// 1. Membuat sebuah abstract class bernama mahasiswa
abstract class Mahasiswa {
    
    // 2. Properti/Atribut Terenkapsulasi (Protected)
    // Nilai properti ini dipetakan secara pas dari kolom tabel database Tahap 1
    protected $id_mahasiswa;
    protected $nama_mahasiswa;
    protected $nim;
    protected $semester;
    protected $tarifUktNominal; // Atribut tarif_ukt_nominal dari database
    protected $jenis_pembiayaan;

    // Constructor untuk menginisialisasi data objek saat dipetakan dari database
    public function __construct($id, $nama, $nim, $semester, $tarifUkt, $jenis) {
        $this->id_mahasiswa = $id;
        $this->nama_mahasiswa = $nama;
        $this->nim = $nim;
        $this->semester = $semester;
        $this->tarifUktNominal = $tarifUkt;
        $this->jenis_pembiayaan = $jenis;
    }

    // 3. Metode Abstrak (Tanpa Isi/Body)
    // Wajib diimplementasikan oleh kelas anak (Mandiri, Bidikmisi, Prestasi)
    abstract public function hitungTagihanSemester();
    abstract public function tampilkanSpesifikasiAkademik();
}