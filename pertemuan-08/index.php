<?php
session_start();

$nim = $_SESSION["nim"] ?? "2511500056";
$nama = $_SESSION["nama"] ?? "Muhammad Arkan Ramadhan";
$tempatlahir = $_SESSION["tempatlahir"] ?? "Mentok";
$tanggallahir = $_SESSION["tanggallahir"] ?? "2007-09-30";
$hobby = $_SESSION["hobby"] ?? "Mancing, Main game, Baca novel, Menggambar, Memasak";
$pasangan = $_SESSION["pasangan"] ?? "Tidak ada karena kurang beruntung";
$pekerjaan = $_SESSION["pekerjaan"] ?? "Tidak ada";
$namaorangtua = $_SESSION["namaorangtua"] ?? "Abdul Salam dan Meidia";
$kakak = $_SESSION["kakak"] ?? "Tidak ada";
$adik = $_SESSION["adik"] ?? "Muhammad Abbas Khairan";

$sesnama = $_SESSION["sesnama"] ?? "";
$sesemail = $_SESSION["sesemail"] ?? "";
$sespesan = $_SESSION["sespesan"] ?? "";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entry Data Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Data Mahasiswa</h1>
    <button class="menu-toggle" id="menuToggle">&#9776;</button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#entrydata">Entry Data</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <p>Halo Dunia! <br> <?= htmlspecialchars($nama) ?></p>
    </section>

    <section id="entrydata">
      <h2>Entry Data Mahasiswa</h2>
      <form action="proses_data.php" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?= htmlspecialchars($nim) ?>" required>

        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama) ?>" required>

        <label for="tempatlahir">Tempat Lahir:</label>
        <input type="text" id="tempatlahir" name="tempatlahir" value="<?= htmlspecialchars($tempatlahir) ?>" required>

        <label for="tanggallahir">Tanggal Lahir:</label>
        <input type="date" id="tanggallahir" name="tanggallahir" value="<?= htmlspecialchars($tanggallahir) ?>" required>

        <label for="hobby">Hobi:</label>
        <input type="text" id="hobby" name="hobby" value="<?= htmlspecialchars($hobby) ?>" required>

        <label for="pasangan">Pasangan:</label>
        <input type="text" id="pasangan" name="pasangan" value="<?= htmlspecialchars($pasangan) ?>" required>

        <label for="pekerjaan">Pekerjaan:</label>
        <input type="text" id="pekerjaan" name="pekerjaan" value="<?= htmlspecialchars($pekerjaan) ?>" required>

        <label for="namaorangtua">Nama Orang Tua:</label>
        <input type="text" id="namaorangtua" name="namaorangtua" value="<?= htmlspecialchars($namaorangtua) ?>" required>

        <label for="kakak">Nama Kakak:</label>
        <input type="text" id="kakak" name="kakak" value="<?= htmlspecialchars($kakak) ?>">

        <label for="adik">Nama Adik:</label>
        <input type="text" id="adik" name="adik" value="<?= htmlspecialchars($adik) ?>">

        <button type="submit">Simpan</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> <?= htmlspecialchars($nim) ?></p>
      <p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($nama) ?></p>
      <p><strong>Tempat Lahir:</strong> <?= htmlspecialchars($tempatlahir) ?></p>
      <p><strong>Tanggal Lahir:</strong> <?= htmlspecialchars($tanggallahir) ?></p>
      <p><strong>Hobi:</strong> <?= htmlspecialchars($hobby) ?></p>
      <p><strong>Pasangan:</strong> <?= htmlspecialchars($pasangan) ?></p>
      <p><strong>Pekerjaan:</strong> <?= htmlspecialchars($pekerjaan) ?></p>
      <p><strong>Nama Orang Tua:</strong> <?= htmlspecialchars($namaorangtua) ?></p>
      <p><strong>Nama Kakak:</strong> <?= htmlspecialchars($kakak) ?></p>
      <p><strong>Nama Adik:</strong> <?= htmlspecialchars($adik) ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">
        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>
</form>

      <?php if (!empty($sesnama)): ?>
        <hr>
        <h3>Yang Menghubungi Kami:</h3>
        <p><strong>Nama :</strong> <?= htmlspecialchars($sesnama) ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($sesemail) ?></p>
        <p><strong>Pesan :</strong> <?= htmlspecialchars($sespesan) ?></p>
      <?php endif; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Muhammad Arkan Ramadhan [2511500056]</p>
  </footer>

<script src="script.js"></script>
<script>
    document.getElementById("menuToggle").addEventListener("click", function() {
      document.querySelector("nav ul").classList.toggle("active");
    });
  </script>
</body>
</html>
