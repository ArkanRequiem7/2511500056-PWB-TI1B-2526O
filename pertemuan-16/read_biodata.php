<?php
session_start();

require 'koneksi.php';
require 'fungsi.php';

// Ambil semua data biodata pengunjung
$sql = "SELECT * FROM tblbiodata_pengunjung ORDER BY id DESC";
$q   = mysqli_query($conn, $sql);

if (!$q) {
    die('Query error: ' . mysqli_error($conn));
}

// Ambil flash message (jika ada), lalu bersihkan
$flashsukses = $_SESSION['flashsukses'] ?? '';
$flasherror  = $_SESSION['flasherror']  ?? '';
unset($_SESSION['flashsukses'], $_SESSION['flasherror']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Biodata Pengunjung</title>
</head>
<body>

<?php if (!empty($flashsukses)): ?>
    <div style="padding:10px;margin-bottom:10px;background:#d4edda;color:#155724;border-radius:6px;">
        <?= $flashsukses ?>
    </div>
<?php endif; ?>

<?php if (!empty($flasherror)): ?>
    <div style="padding:10px;margin-bottom:10px;background:#f8d7da;color:#721c24;border-radius:6px;">
        <?= $flasherror ?>
    </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>ID</th>
        <th>Kode Pengunjung</th>
        <th>Nama</th>
        <th>Alamat Rumah</th>
        <th>Tanggal Kunjungan</th>
        <th>Hobi</th>
        <th>Asal SLTA</th>
        <th>Pekerjaan</th>
        <th>Nama Ortu</th>
        <th>Nama Pacar</th>
        <th>Nama Mantan</th>
        <th>Created At</th>
    </tr>
    <?php $i = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($q)): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td>
                <a href="edit_biodata.php?id=<?= (int)$row['id'] ?>">Edit</a> |
                <a href="proses_delete_biodata.php?id=<?= (int)$row['id'] ?>"
                   onclick="return confirm('Hapus biodata <?= htmlspecialchars($row['nama_pengunjung'] ?? '') ?>?');">
                    Delete
                </a>
            </td>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['kode_pengunjung']) ?></td>
            <td><?= htmlspecialchars($row['nama_pengunjung']) ?></td>
            <td><?= htmlspecialchars($row['alamat_rumah']) ?></td>
            <td><?= htmlspecialchars($row['tanggal_kunjungan']) ?></td>
            <td><?= htmlspecialchars($row['hobi']) ?></td>
            <td><?= htmlspecialchars($row['asal_slta']) ?></td>
            <td><?= htmlspecialchars($row['pekerjaan']) ?></td>
            <td><?= htmlspecialchars($row['nama_ortu']) ?></td>
            <td><?= htmlspecialchars($row['nama_pacar']) ?></td>
            <td><?= htmlspecialchars($row['nama_mantan']) ?></td>
            <td><?= htmlspecialchars($row['created_at']) ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
