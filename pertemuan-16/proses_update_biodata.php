<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

# 1. Cek method POST (Hanya izinkan akses via form)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('read_biodata.php');
}

# 2. Ambil ID (Primary Key) dan Data dari Form
$id = filter_input(INPUT_POST, 'txtId', FILTER_VALIDATE_INT);

# 3. Sanitasi Input (Menggunakan fungsi bersihkan() dari fungsi.php)
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

# 4. Validasi Sederhana
$errors = [];
if (!$id) $errors[] = "ID tidak valid.";
if ($kodepen === '') $errors[] = "Kode Pengunjung wajib diisi.";
if ($nama === '') $errors[] = "Nama wajib diisi.";

# Jika ada error, kembalikan ke form edit (Konsep PRG)
if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    $_SESSION['old'] = $_POST; // Simpan input lama agar user tidak mengetik ulang
    redirect_ke("edit_biodata.php?id=$id");
}

# 5. Proses Update ke Tabel Baru (tbl_biodata)
$sql = "UPDATE tbl_biodata SET 
            kodepen = ?, nama = ?, alamat = ?, tanggal = ?, 
            hobi = ?, slta = ?, pekerjaan = ?, ortu = ?, 
            pacar = ?, mantan = ? 
        WHERE id_biodata = ?";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // "ssssssssssi" berarti 10 string dan 1 integer (ID)
    mysqli_stmt_bind_param($stmt, "ssssssssssi", 
        $kodepen, $nama, $alamat, $tanggal, 
        $hobi, $slta, $pekerjaan, $ortu, 
        $pacar, $mantan, $id
    );

    if (mysqli_stmt_execute($stmt)) {
        # 6. Konsep PRG: Redirect ke halaman pembaca dengan pesan sukses
        $_SESSION['flash_sukses'] = "Data $nama berhasil diperbarui.";
        redirect_ke('read_biodata.php');
    } else {
        $_SESSION['flash_error'] = "Gagal memperbarui data di database.";
        redirect_ke("edit_biodata.php?id=$id");
    }
    mysqli_stmt_close($stmt);
} else {
    die("Gagal menyiapkan perintah update: " . mysqli_error($conn));
}