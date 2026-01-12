<?php
session_start();
require "koneksi.php";
require "fungsi.php";

/*
  proses delete biodata mahasiswa
  dipanggil dari read.php melalui link:
  proses_delete_biodata.php?id=...
*/

/* validasi id dari GET */
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$id) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

/* siapkan prepared statement DELETE */
$stmt = mysqli_prepare(
    $conn,
    "DELETE FROM tblbiodata_mhs WHERE id = ? LIMIT 1"
);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('read.php');
}

/* bind parameter (i = integer) dan eksekusi */
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $_SESSION['flash_sukses'] = 'Data biodata berhasil dihapus.';
    } else {
        $_SESSION['flash_error'] = 'Data biodata tidak ditemukan atau sudah dihapus.';
    }
} else {
    $_SESSION['flash_error'] = 'Data biodata gagal dihapus. Silakan coba lagi.';
}

mysqli_stmt_close($stmt);

/* PRG: selalu kembali ke file pembaca (read.php) */
redirect_ke('read.php');
