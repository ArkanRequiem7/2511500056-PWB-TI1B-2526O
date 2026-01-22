<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  // Mengambil data dari tabel biodata yang baru
  $sql = "SELECT * FROM tbl_biodata ORDER BY id_biodata DESC";
  $q = mysqli_query($conn, $sql);
  if (!$q) {
    die("Query error: " . mysqli_error($conn));
  }
?>

<?php
  $flash_sukses = $_SESSION['flash_sukses'] ?? ''; 
  $flash_error  = $_SESSION['flash_error'] ?? ''; 
  unset($_SESSION['flash_sukses'], $_SESSION['flash_error']); 
?>

<?php if (!empty($flash_sukses)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
      <?= $flash_sukses; ?>
    </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>Kode</th>
    <th>Nama Pengunjung</th>
    <th>Alamat</th>
    <th>Hobi</th>
    <th>Asal SLTA</th>
    <th>Pekerjaan</th>
    <th>Nama Ortu</th>
    <th>Nama Pacar</th>
    <th>Nama Mantan</th>
   </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit_biodata.php?id=<?= (int)$row['id_biodata']; ?>">Edit</a> | 
        <a onclick="return confirm('Hapus data <?= htmlspecialchars($row['nama']); ?>?')" 
           href="proses_delete_biodata.php?id=<?= (int)$row['id_biodata']; ?>">Hapus</a>
      </td>
      <td><?= htmlspecialchars($row['kodepen']); ?></td>
      <td><?= htmlspecialchars($row['nama']); ?></td>
      <td><?= htmlspecialchars($row['alamat']); ?></td>
      <td><?= htmlspecialchars($row['hobi']); ?></td>
      <td><?= htmlspecialchars($row['slta']); ?></td>
      <td><?= htmlspecialchars($row['pekerjaan']); ?></td>
      <td><?= htmlspecialchars($row['ortu']); ?></td>
      <td><?= htmlspecialchars($row['pacar']); ?></td>
      <td><?= htmlspecialchars($row['mantan']); ?></td>
    </tr>
  <?php endwhile; ?>
</table>
<br>
<a href="index.php">Kembali ke Form</a>