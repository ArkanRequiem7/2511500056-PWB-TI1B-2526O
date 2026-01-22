<?php
session_start();

require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flasherror'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
}

$kodepen    = bersihkan($_POST['txtKodePen']      ?? '');
$nama       = bersihkan($_POST['txtNmPengunjung'] ?? '');
$alamat     = bersihkan($_POST['txtAlRmh']        ?? '');
$tanggal    = bersihkan($_POST['txtTglKunjungan'] ?? '');
$hobi       = bersihkan($_POST['txtHobi']         ?? '');
$slta       = bersihkan($_POST['txtAsalSMA']      ?? '');
$pekerjaan  = bersihkan($_POST['txtKerja']        ?? '');
$ortu       = bersihkan($_POST['txtNmOrtu']       ?? '');
$pacar      = bersihkan($_POST['txtNmPacar']      ?? '');
$mantan     = bersihkan($_POST['txtNmMantan']     ?? '');

$errors = [];
if (!$kodepen)   $errors[] = 'Kode pengunjung wajib diisi.';
if (!$nama)      $errors[] = 'Nama pengunjung wajib diisi.';
if (!$alamat)    $errors[] = 'Alamat rumah wajib diisi.';
if (!$tanggal)   $errors[] = 'Tanggal kunjungan wajib diisi.';
if (!$hobi)      $errors[] = 'Hobi wajib diisi.';
if (!$slta)      $errors[] = 'Asal SLTA wajib diisi.';
if (!$pekerjaan) $errors[] = 'Pekerjaan wajib diisi.';
if (!$ortu)      $errors[] = 'Nama orang tua wajib diisi.';
if (!$pacar)     $errors[] = 'Nama pacar wajib diisi.';
if (!$mantan)    $errors[] = 'Nama mantan wajib diisi.';

if (mb_strlen($nama) < 3) {
    $errors[] = 'Nama pengunjung minimal 3 karakter.';
}

$dt = DateTime::createFromFormat('Y-m-d', $tanggal);
if (!$dt || $dt->format('Y-m-d') !== $tanggal) {
    $errors[] = 'Format tanggal kunjungan tidak valid. Gunakan format YYYY-MM-DD.';
}

if (!empty($errors)) {
    $_SESSION['old_biodata'] = [
        'kodepen'   => $kodepen,
        'nama'      => $nama,
        'alamat'    => $alamat,
        'tanggal'   => $tanggal,
        'hobi'      => $hobi,
        'slta'      => $slta,
        'pekerjaan' => $pekerjaan,
        'ortu'      => $ortu,
        'pacar'     => $pacar,
        'mantan'    => $mantan,
    ];

    $_SESSION['flasherror'] = implode('<br>', $errors);
    redirect_ke('index.php#biodata');
}

$sql = "INSERT INTO tblbiodata_pengunjung 
        (kode_pengunjung, nama_pengunjung, alamat_rumah, tanggal_kunjungan, hobi, asal_slta, pekerjaan, nama_ortu, nama_pacar, nama_mantan)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flasherror'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('index.php#biodata');
}

mysqli_stmt_bind_param(
    $stmt,
    'ssssssssss',
    $kodepen,
    $nama,
    $alamat,
    $tanggal,
    $hobi,
    $slta,
    $pekerjaan,
    $ortu,
    $pacar,
    $mantan
);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_biodata']);
    $_SESSION['flashsukses'] = 'Terima kasih, biodata Anda sudah tersimpan.';
    redirect_ke('index.php#biodata');
} else {
    $_SESSION['flasherror'] = 'Biodata gagal disimpan. Silakan coba lagi.';
    redirect_ke('index.php#biodata');
}

mysqli_stmt_close($stmt);
