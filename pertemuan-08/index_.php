<?php
session_start();

$nim = $_SESSION["nim"] ?? "2511500056";
$nama = $_SESSION["nama"] ?? "Muhammad Arkan Ramadhan";
$tempatlahir = $_SESSION["tempatlahir"] ?? "Mentok";
$tanggallahir = $_SESSION["tanggallahir"] ?? "2007-09-30";
$hobby = $_SESSION["hobby"] ?? "Mancing, Main game, Baca novel";
$pasangan = $_SESSION["pasangan"] ?? "Belum punya";
$pekerjaan = $_SESSION["pekerjaan"] ?? "Pelajar";
$namaorangtua = $_SESSION["namaorangtua"] ?? "Bpk. Dedi & Ibu Rini";
$kakak = $_SESSION["kakak"] ?? "1";
$adik = $_SESSION["adik"] ?? "1";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pribadi</title>
</head>
<body>
    <h2>Halo, <?php echo htmlspecialchars($nama); ?>!</h2>
    <p><strong>NIM:</strong> <?php echo htmlspecialchars($nim); ?></p>
    <p><strong>Tempat Lahir:</strong> <?php echo htmlspecialchars($tempatlahir); ?></p>
    <p><strong>Tanggal Lahir:</strong> <?php echo htmlspecialchars($tanggallahir); ?></p>
    <p><strong>Hobby:</strong> <?php echo htmlspecialchars($hobby); ?></p>
    <p><strong>Pasangan:</strong> <?php echo htmlspecialchars($pasangan); ?></p>
    <p><strong>Pekerjaan:</strong> <?php echo htmlspecialchars($pekerjaan); ?></p>
    <p><strong>Nama Orang Tua:</strong> <?php echo htmlspecialchars($namaorangtua); ?></p>
    <p><strong>Jumlah Kakak:</strong> <?php echo htmlspecialchars($kakak); ?></p>
    <p><strong>Jumlah Adik:</strong> <?php echo htmlspecialchars($adik); ?></p>

    <form action="proses_data.php" method="POST">
        <input type="text" name="nim" value="<?php echo htmlspecialchars($nim); ?>" placeholder="NIM"><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>" placeholder="Nama"><br>
        <input type="text" name="tempatlahir" value="<?php echo htmlspecialchars($tempatlahir); ?>" placeholder="Tempat Lahir"><br>
        <input type="date" name="tanggallahir" value="<?php echo htmlspecialchars($tanggallahir); ?>"><br>
        <input type="text" name="hobby" value="<?php echo htmlspecialchars($hobby); ?>" placeholder="Hobby"><br>
        <input type="text" name="pasangan" value="<?php echo htmlspecialchars($pasangan); ?>" placeholder="Pasangan"><br>
        <input type="text" name="pekerjaan" value="<?php echo htmlspecialchars($pekerjaan); ?>" placeholder="Pekerjaan"><br>
        <input type="text" name="namaorangtua" value="<?php echo htmlspecialchars($namaorangtua); ?>" placeholder="Nama Orang Tua"><br>
        <input type="text" name="kakak" value="<?php echo htmlspecialchars($kakak); ?>" placeholder="Jumlah Kakak"><br>
        <input type="text" name="adik" value="<?php echo htmlspecialchars($adik); ?>" placeholder="Jumlah Adik"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
