<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$id) {
    $_SESSION['flash_error'] = 'ID Tidak Valid.';
    redirect_ke('read_biodata.php');
  }

  // Prepared statement untuk keamanan
  $stmt = mysqli_prepare($conn, "DELETE FROM tbl_biodata WHERE id_biodata = ?");
  
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    if (mysqli_stmt_execute($stmt)) {
      $_SESSION['flash_sukses'] = 'Data biodata berhasil dihapus.';
    } else {
      $_SESSION['flash_error'] = 'Gagal menghapus data.';
    }
    mysqli_stmt_close($stmt);
  }

  redirect_ke('read_biodata.php');