<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  # 1. Ambil ID dari URL (GET) dan validasi harus angka > 0
  $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  # 2. Jika ID tidak valid, kembalikan ke halaman pembaca
  if (!$id) {
    $_SESSION['flash_error'] = 'ID tidak valid atau data tidak ditemukan.';
    redirect_ke('read_biodata.php');
  }

  /* 3. Gunakan Prepared Statement untuk keamanan (Anti SQL Injection)
     Menghapus data dari tabel baru (tbl_biodata) sesuai nomor 1
  */
  $stmt = mysqli_prepare($conn, "DELETE FROM tbl_biodata WHERE id_biodata = ?");
  
  if ($stmt) {
    # Bind parameter "i" (integer)
    mysqli_stmt_bind_param($stmt, "i", $id);

    # 4. Eksekusi penghapusan
    if (mysqli_stmt_execute($stmt)) {
      # 5. Konsep PRG: Beri pesan sukses dan redirect balik ke halaman pembaca
      $_SESSION['flash_sukses'] = 'Data biodata berhasil dihapus Yahahaha Hayyuk.';
    } else {
      $_SESSION['flash_error'] = 'Gagal menghapus data dari database, Coba lagi ya Sayanggg.';
    }
    
    # Tutup statement
    mysqli_stmt_close($stmt);
  } else {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  }

  # Redirect kembali (PRG)
  redirect_ke('read_biodata.php');