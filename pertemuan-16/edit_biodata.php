<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  // 1. Ambil dan validasi ID dari URL (Primary Key)
  $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$id) {
    $_SESSION['flash_error'] = 'ID tidak valid.';
    redirect_ke('read_biodata.php');
  }

  // 2. Ambil data lama dari database berdasarkan ID
  $stmt = mysqli_prepare($conn, "SELECT * FROM tbl_biodata WHERE id_biodata = ? LIMIT 1");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Data tidak ditemukan.';
    redirect_ke('read_biodata.php');
  }

  // 3. Menangani Flash Error dan Old Input (Jika ada error saat update)
  $flash_error = $_SESSION['flash_error'] ?? '';
  $old = $_SESSION['old'] ?? [];
  unset($_SESSION['flash_error'], $_SESSION['old']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Biodata Pengunjung</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main>
    <section id="contact">
      <h2>Edit Biodata Pengunjung</h2>

      <?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses_update_biodata.php" method="POST">

        <label for="txtId"><span>ID Biodata (Readonly):</span>
          <input type="text" id="txtId" name="txtId" value="<?= (int)$row['id_biodata']; ?>" readonly style="background-color: #eee;">
        </label>

        <label for="txtKodePen"><span>Kode Pengunjung:</span>
          <input type="text" id="txtKodePen" name="txtKodePen" 
            value="<?= htmlspecialchars($old['kodepen'] ?? $row['kodepen']); ?>" required>
        </label>

        <label for="txtNmPengunjung"><span>Nama Pengunjung:</span>
          <input type="text" id="txtNmPengunjung" name="txtNmPengunjung" 
            value="<?= htmlspecialchars($old['nama'] ?? $row['nama']); ?>" required>
        </label>

        <label for="txtAlRmh"><span>Alamat Rumah:</span>
          <input type="text" id="txtAlRmh" name="txtAlRmh" 
            value="<?= htmlspecialchars($old['alamat'] ?? $row['alamat']); ?>" required>
        </label>

        <label for="txtTglKunjungan"><span>Tanggal Kunjungan:</span>
          <input type="text" id="txtTglKunjungan" name="txtTglKunjungan" 
            value="<?= htmlspecialchars($old['tanggal'] ?? $row['tanggal']); ?>" required>
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" 
            value="<?= htmlspecialchars($old['hobi'] ?? $row['hobi']); ?>" required>
        </label>

        <label for="txtAsalSMA"><span>Asal SLTA:</span>
          <input type="text" id="txtAsalSMA" name="txtAsalSMA" 
            value="<?= htmlspecialchars($old['slta'] ?? $row['slta']); ?>" required>
        </label>

        <label for="txtKerja"><span>Pekerjaan:</span>
          <input type="text" id="txtKerja" name="txtKerja" 
            value="<?= htmlspecialchars($old['pekerjaan'] ?? $row['pekerjaan']); ?>" required>
        </label>

        <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNmOrtu" name="txtNmOrtu" 
            value="<?= htmlspecialchars($old['ortu'] ?? $row['ortu']); ?>" required>
        </label>

        <label for="txtNmPacar"><span>Nama Pacar:</span>
          <input type="text" id="txtNmPacar" name="txtNmPacar" 
            value="<?= htmlspecialchars($old['pacar'] ?? $row['pacar']); ?>" required>
        </label>

        <label for="txtNmMantan"><span>Nama Mantan:</span>
          <input type="text" id="txtNmMantan" name="txtNmMantan" 
            value="<?= htmlspecialchars($old['mantan'] ?? $row['mantan']); ?>" required>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
        <a href="read_biodata.php" style="margin-left:10px;">Kembali</a>
      </form>
    </section>
  </main>
</body>
</html>