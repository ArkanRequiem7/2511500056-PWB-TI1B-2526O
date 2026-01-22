<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM tbl_biodata ORDER BY id_biodata DESC";
$q = mysqli_query($conn, $sql);

$flash_sukses = $_SESSION['flash_sukses'] ?? '';
unset($_SESSION['flash_sukses']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Database Biodata</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        .wrapper { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 1200px; }
        th { background: #3498db; color: white; padding: 12px; text-align: left; font-size: 13px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; font-size: 13px; }
        tr:hover { background: #f9f9f9; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 4px; color: white; font-size: 12px; }
        .btn-edit { background: #f1c40f; }
        .btn-delete { background: #e74c3c; }
        .alert { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Daftar Biodata Pengunjung</h2>
        <?php if($flash_sukses): ?> <div class="alert"><?= $flash_sukses ?></div> <?php endif; ?>
        
        <table>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal</th>
                <th>Hobi</th>
                <th>SLTA</th>
                <th>Kerja</th>
                <th>Ortu</th>
                <th>Pacar</th>
                <th>Mantan</th>
            </tr>
            <?php $i=1; while($row = mysqli_fetch_assoc($q)): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td style="white-space:nowrap">
                    <a href="edit_biodata.php?id=<?= $row['id_biodata'] ?>" class="btn btn-edit">Edit</a>
                    <a href="proses_delete_biodata.php?id=<?= $row['id_biodata'] ?>" class="btn btn-delete" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
                <td><?= htmlspecialchars($row['kodepen']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td><?= htmlspecialchars($row['tanggal']) ?></td>
                <td><?= htmlspecialchars($row['hobi']) ?></td>
                <td><?= htmlspecialchars($row['slta']) ?></td>
                <td><?= htmlspecialchars($row['pekerjaan']) ?></td>
                <td><?= htmlspecialchars($row['ortu']) ?></td>
                <td><?= htmlspecialchars($row['pacar']) ?></td>
                <td><strong><?= htmlspecialchars($row['mantan']) ?></strong></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <br><a href="index.php">Tambah Data Baru</a>
    </div>
</body>
</html>