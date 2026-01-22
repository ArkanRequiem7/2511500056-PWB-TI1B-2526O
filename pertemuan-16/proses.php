<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

# 1. Cek method POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('index.php');
}

# 2. Ambil dan Sanitasi data (Konsep Sanitasi)
$kodepen   = bersihkan($_POST['txtKodePen'] ?? '');
$nama      = bersihkan($_POST['txtNmPengunjung'] ?? '');
$alamat    = bersihkan($_POST['txtAlRmh'] ?? '');
$tanggal   = bersihkan($_POST['txtTglKunjungan'] ?? '');
$hobi      = bersihkan($_POST['txtHobi'] ?? '');
$slta      = bersihkan($_POST['txtAsalSMA'] ?? '');
$pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
$ortu      = bersihkan($_POST['txtNmOrtu'] ?? '');
$pacar     = bersihkan($_POST['txtNmPacar'] ?? '');
$mantan    = bersihkan($_POST['txtNmMantan'] ?? '');

# 3. Validasi sederhana
$errors = [];
if ($kodepen === '') $errors[] = 'Kode Pengunjung wajib diisi.';
if ($nama === '')    $errors[] = 'Nama Pengunjung wajib diisi.';
if ($alamat === '')  $errors[] = 'Alamat wajib diisi.';

# Jika ada error, simpan di session dan redirect (Konsep PRG)
if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#biodata');
}

# 4. Insert ke tabel baru (tbl_biodata) menggunakan Prepared Statement
$sql = "INSERT INTO tbl_biodata (kodepen, nama, alamat, tanggal, hobi, slta, pekerjaan, ortu, pacar, mantan) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssssssss", 
        $kodepen, $nama, $alamat, $tanggal, $hobi, $slta, $pekerjaan, $ortu, $pacar, $mantan
    );

    if (mysqli_stmt_execute($stmt)) {
        # 5. Konsep PRG: Simpan di session untuk ditampilkan di bagian 'About'
        $_SESSION['biodata'] = [
            "kodepen" => $kodepen,
            "nama" => $nama,
            "alamat" => $alamat,
            "tanggal" => $tanggal,
            "hobi" => $hobi,
            "slta" => $slta,
            "pekerjaan" => $pekerjaan,
            "ortu" => $ortu,
            "pacar" => $pacar,
            "mantan" => $mantan
        ];
        $_SESSION['flash_sukses'] = 'Data Biodata berhasil disimpan ke database.';
        redirect_ke('index.php#about');
    } else {
        $_SESSION['flash_error'] = 'Gagal menyimpan ke database.';
        redirect_ke('index.php#biodata');
    }
    mysqli_stmt_close($stmt);
} else {
    die("Gagal siapkan statement: " . mysqli_error($conn));
}