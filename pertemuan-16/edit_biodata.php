<?php
session_start();
require 'koneksi.php'; // Sesuaikan path
$id = (int)($_GET['id'] ?? 0);
$sql = "SELECT * FROM tblbiodata WHERE id = $id";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($q) ?: die('Data tidak ditemukan.');
?>
<!DOCTYPE html>
<html>
<head><title>Edit Biodata</title><link rel="stylesheet" href="style.css"></head>
<body>
<form action="proses_update_biodata.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <label>kodepengunjung: <input type="text" name="kodepengunjung" value="<?= htmlspecialchars($row['kodepengunjung']) ?>"></label>
    <label>namapengunjung: <input type="text" name="namapengunjung" value="<?= htmlspecialchars($row['namapengunjung']) ?>"></label>
    <!-- Tambah field lain serupa: alamatrumah (textarea?), tanggalkunjungan (date), hobi, asalslta, pekerjaan, namaortu, namapacar, namamantan -->
    <button type="submit" name="kirim">Kirim</button>
    <button type="reset" onclick="location.href='read_biodata.php'">Batal</button>
</form>
</body>
</html>
