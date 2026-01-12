<?php
session_start();
require "koneksi.php";
require_once "fungsi.php";

/* cek method */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

/* validasi id */
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$id) {
    $_SESSION['flash_error'] = 'ID Tidak Valid.';
    redirect_ke('read.php');
}

/* ambil & sanitasi */
$nama     = bersihkan($_POST['txtNmLengkapEd'] ?? '');
$tempat   = bersihkan($_POST['txtT4LhrEd'] ?? '');
$tanggal  = bersihkan($_POST['txtTglLhrEd'] ?? '');
$hobi     = bersihkan($_POST['txtHobiEd'] ?? '');
$pasangan = bersihkan($_POST['txtPasanganEd'] ?? '');
$kerja    = bersihkan($_POST['txtKerjaEd'] ?? '');
$ortu     = bersihkan($_POST['txtNmOrtuEd'] ?? '');
$kakak    = bersihkan($_POST['txtNmKakakEd'] ?? '');
$adik     = bersihkan($_POST['txtNmAdikEd'] ?? '');

$errors = [];

if ($nama === '')     $errors[] = 'Nama Lengkap wajib diisi.';
if ($tempat === '')   $errors[] = 'Tempat Lahir wajib diisi.';
if ($tanggal === '')  $errors[] = 'Tanggal Lahir wajib diisi.';
if ($hobi === '')     $errors[] = 'Hobi wajib diisi.';
if ($pasangan === '') $errors[] = 'Pasangan wajib diisi.';
if ($kerja === '')    $errors[] = 'Pekerjaan wajib diisi.';
if ($ortu === '')     $errors[] = 'Nama Orang Tua wajib diisi.';
if ($kakak === '')    $errors[] = 'Nama Kakak wajib diisi.';
if ($adik === '')     $errors[] = 'Nama Adik wajib diisi.';

if (mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
}

if (!empty($errors)) {
    $_SESSION['old'] = [
        'nama'     => $nama,
        'tempat'   => $tempat,
        'tanggal'  => $tanggal,
        'hobi'     => $hobi,
        'pasangan' => $pasangan,
        'kerja'    => $kerja,
        'ortu'     => $ortu,
        'kakak'    => $kakak,
        'adik'     => $adik,
    ];
    $_SESSION['flash_error'] = implode('', $errors);
    redirect_ke('edit_biodata.php?id=' . (int)$id);
}

/* UPDATE prepared statement */
$stmt = mysqli_prepare(
    $conn,
    "UPDATE tblbiodata_mhs
     SET nama_lengkap = ?, tempat_lahir = ?, tanggal_lahir = ?,
         hobi = ?, pasangan = ?, pekerjaan = ?, nama_ortu = ?,
         nama_kakak = ?, nama_adik = ?
     WHERE id = ?"
);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_biodata.php?id=' . (int)$id);
}

mysqli_stmt_bind_param(
    $stmt,
    "sssssssssi",
    $nama,
    $tempat,
    $tanggal,
    $hobi,
    $pasangan,
    $kerja,
    $ortu,
    $kakak,
    $adik,
    $id
);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old']);
    $_SESSION['flash_sukses'] = 'Data biodata sudah diperbaharui.';
    redirect_ke('read.php');  // PRG: kembali ke file pembaca
} else {
    $_SESSION['old'] = [
        'nama'     => $nama,
        'tempat'   => $tempat,
        'tanggal'  => $tanggal,
        'hobi'     => $hobi,
        'pasangan' => $pasangan,
        'kerja'    => $kerja,
        'ortu'     => $ortu,
        'kakak'    => $kakak,
        'adik'     => $adik,
    ];
    $_SESSION['flash_error'] = 'Data biodata gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit_biodata.php?id=' . (int)$id);
}

mysqli_stmt_close($stmt);