<?php
session_start();
require "koneksi.php";
require "fungsi.php";

/* Validasi id dari GET */
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$id) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

/* Ambil data lama biodata */
$stmt = mysqli_prepare(
    $conn,
    "SELECT id, nim, nama_lengkap, tempat_lahir, tanggal_lahir,
            hobi, pasangan, pekerjaan, nama_ortu, nama_kakak, nama_adik
     FROM tblbiodata_mhs WHERE id = ? LIMIT 1"
);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read.php');
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read.php');
}

/* nilai awal */
$nim      = $row['nim'] ?? '';
$nama     = $row['nama_lengkap'] ?? '';
$tempat   = $row['tempat_lahir'] ?? '';
$tanggal  = $row['tanggal_lahir'] ?? '';
$hobi     = $row['hobi'] ?? '';
$pasangan = $row['pasangan'] ?? '';
$kerja    = $row['pekerjaan'] ?? '';
$ortu     = $row['nama_ortu'] ?? '';
$kakak    = $row['nama_kakak'] ?? '';
$adik     = $row['nama_adik'] ?? '';

$flash_error = $_SESSION['flash_error'] ?? '';
$old         = $_SESSION['old'] ?? [];
unset($_SESSION['flash_error'], $_SESSION['old']);

if (!empty($old)) {
    $nama     = $old['nama']     ?? $nama;
    $tempat   = $old['tempat']   ?? $tempat;
    $tanggal  = $old['tanggal']  ?? $tanggal;
    $hobi     = $old['hobi']     ?? $hobi;
    $pasangan = $old['pasangan'] ?? $pasangan;
    $kerja    = $old['kerja']    ?? $kerja;
    $ortu     = $old['ortu']     ?? $ortu;
    $kakak    = $old['kakak']    ?? $kakak;
    $adik     = $old['adik']     ?? $adik;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Ini Header</h1>
</header>
<main>
<section id="contact">
    <h2>Edit Biodata Sederhana Mahasiswa</h2>

    <?php if (!empty($flash_error)) : ?>
        <div style="padding:10px;margin-bottom:10px;background:#f8d7da;color:#721c24;border-radius:6px;">
            <?= $flash_error ?>
        </div>
    <?php endif; ?>

    <form action="proses_update_biodata.php" method="POST">
        <input type="hidden" name="id" value="<?= (int)$id ?>">

        <label for="txtNimEd"><span>NIM</span>
            <input type="text" id="txtNimEd" name="txtNimEd"
                   value="<?= htmlspecialchars($nim) ?>" readonly>
        </label>

        <label for="txtNmLengkapEd"><span>Nama Lengkap</span>
            <input type="text" id="txtNmLengkapEd" name="txtNmLengkapEd"
                   placeholder="Masukkan Nama Lengkap" required
                   value="<?= htmlspecialchars($nama) ?>">
        </label>

        <label for="txtT4LhrEd"><span>Tempat Lahir</span>
            <input type="text" id="txtT4LhrEd" name="txtT4LhrEd"
                   placeholder="Masukkan Tempat Lahir" required
                   value="<?= htmlspecialchars($tempat) ?>">
        </label>

        <label for="txtTglLhrEd"><span>Tanggal Lahir</span>
            <input type="text" id="txtTglLhrEd" name="txtTglLhrEd"
                   placeholder="Masukkan Tanggal Lahir" required
                   value="<?= htmlspecialchars($tanggal) ?>">
        </label>

        <label for="txtHobiEd"><span>Hobi</span>
            <input type="text" id="txtHobiEd" name="txtHobiEd"
                   placeholder="Masukkan Hobi" required
                   value="<?= htmlspecialchars($hobi) ?>">
        </label>

        <label for="txtPasanganEd"><span>Pasangan</span>
            <input type="text" id="txtPasanganEd" name="txtPasanganEd"
                   placeholder="Masukkan Pasangan" required
                   value="<?= htmlspecialchars($pasangan) ?>">
        </label>

        <label for="txtKerjaEd"><span>Pekerjaan</span>
            <input type="text" id="txtKerjaEd" name="txtKerjaEd"
                   placeholder="Masukkan Pekerjaan" required
                   value="<?= htmlspecialchars($kerja) ?>">
        </label>

        <label for="txtNmOrtuEd"><span>Nama Orang Tua</span>
            <input type="text" id="txtNmOrtuEd" name="txtNmOrtuEd"
                   placeholder="Masukkan Nama Orang Tua" required
                   value="<?= htmlspecialchars($ortu) ?>">
        </label>

        <label for="txtNmKakakEd"><span>Nama Kakak</span>
            <input type="text" id="txtNmKakakEd" name="txtNmKakakEd"
                   placeholder="Masukkan Nama Kakak" required
                   value="<?= htmlspecialchars($kakak) ?>">
        </label>

        <label for="txtNmAdikEd"><span>Nama Adik</span>
            <input type="text" id="txtNmAdikEd" name="txtNmAdikEd"
                   placeholder="Masukkan Nama Adik" required
                   value="<?= htmlspecialchars($adik) ?>">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
        <a href="read.php" class="reset">Kembali</a>
    </form>
</section>
</main>
</body>
</html>
