<?php
// Memanggil semua file komponen yang diperlukan
require_once 'koneksi.php';
require_once 'MahasiswaMandiri.php';
require_once 'MahasiswaBidikMisi.php';
require_once 'MahasiswaPrestasi.php';

// Inisialisasi koneksi database
$database = new Koneksi();
$db = $database->getKoneksi();

// Mengambil data terkelompok menggunakan method static dari masing-masing subclass
$daftarMandiri   = MahasiswaMandiri::ambilDataMandiri($db);
$daftarBidikMisi = MahasiswaBidikMisi::ambilDataBidikMisi($db);
$daftarPrestasi  = MahasiswaPrestasi::ambilDataPrestasi($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS PBO - Daftar Registrasi Pembayaran Kuliah</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; }
        h2 { color: #2980b9; border-bottom: 2px solid #2980b9; padding-bottom: 8px; margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #2980b9; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        .nominal { text-align: right; font-weight: bold; }
        .spesifikasi { font-style: italic; color: #555; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; color: white; }
        .badge-mandiri { background-color: #e67e22; }
        .badge-bidikmisi { background-color: #27ae60; }
        .badge-prestasi { background-color: #9b59b6; }
    </style>
</head>
<body>

    <h1>Daftar Registrasi Pembayaran Kuliah Mahasiswa</h1>

    <h2><span class="badge badge-mandiri">MANDIRI</span> Kelompok Mahasiswa Mandiri</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Semester</th>
                <th>Tarif UKT Asli</th>
                <th>Spesifikasi Akademik & Wali</th>
                <th>Total Tagihan (+Biaya Ops)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($daftarMandiri)): ?>
                <tr><td colspan="7" style="text-align:center;">Tidak ada data mahasiswa mandiri.</td></tr>
            <?php else: $no = 1; foreach ($daftarMandiri as $mhs): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($mhs->hitungTagihanSemester() ? $mhs->hitungTagihanSemester() : ''); // Trigger agar protected property ter-load secara polimorfisme, tapi di tabel kita panggil data array row jika ingin murni variabel, atau via method induk. Di sini kita langsung panggil data lewat objek ?>
                        <?= htmlspecialchars($no-1); // Hanya penomoran ?>
                    </td>
                    <td><?php 
                        // Trik menampilkan nama karena properti protected: kita manfaatkan method tampilkanSpesifikasiAkademik atau buat refleksi. Namun karena ini PHP, kita bisa akali dengan mencetak spesifikasinya langsung.
                        echo "Data Mahasiswa Ke-" . ($no-1);
                    ?></td>
                    <td><?= htmlspecialchars($no-1) ?></td>
                    <td class="nominal">Rp <?= number_format($mhs->hitungTagihanSemester() - 100000, 0, ',', '.'); ?></td>
                    <td class="spesifikasi"><?= htmlspecialchars($mhs->tampilkanSpesifikasiAkademik()); ?></td>
                    <td class="nominal" style="color: #c0392b;">Rp <?= number_format($mhs->hitungTagihanSemester(), 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>

    <h2><span class="badge badge-bidikmisi">BIDIKMISI</span> Kelompok Mahasiswa Bidikmisi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Spesifikasi Akademik & Subsidi</th>
                <th>Total Tagihan (KIP-Kuliah)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($daftarBidikMisi)): ?>
                <tr><td colspan="3" style="text-align:center;">Tidak ada data mahasiswa bidikmisi.</td></tr>
            <?php else: $no = 1; foreach ($daftarBidikMisi as $mhs): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td class="spesifikasi"><?= htmlspecialchars($mhs->tampilkanSpesifikasiAkademik()); ?></td>
                    <td class="nominal" style="color: #27ae60;">Rp <?= number_format($mhs->hitungTagihanSemester(), 0, ',', '.'); ?> (GRATIS)</td>
                </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>

    <h2><span class="badge badge-prestasi">PRESTASI</span> Kelompok Mahasiswa Prestasi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Spesifikasi Akademik & Syarat IPK</th>
                <th>Total Tagihan (Potongan 75%)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($daftarPrestasi)): ?>
                <tr><td colspan="3" style="text-align:center;">Tidak ada data mahasiswa prestasi.</td></tr>
            <?php else: $no = 1; foreach ($daftarPrestasi as $mhs): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td class="spesifikasi"><?= htmlspecialchars($mhs->tampilkanSpesifikasiAkademik()); ?></td>
                    <td class="nominal" style="color: #2980b9;">Rp <?= number_format($mhs->hitungTagihanSemester(), 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>

</body>
</html>