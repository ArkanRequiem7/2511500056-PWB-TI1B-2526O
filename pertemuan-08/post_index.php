<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nim = $_POST["nim"] ?? "";
  $nama = $_POST["nama"] ?? "";
  $tempatlahir = $_POST["tempatlahir"] ?? "";
  $tanggallahir = $_POST["tanggallahir"] ?? "";
  $hobby = $_POST["hobby"] ?? "";
  $pasangan = $_POST["pasangan"] ?? "";
  $pekerjaan = $_POST["pekerjaan"] ?? "";
  $namaorangtua = $_POST["namaorangtua"] ?? "";
  $kakak = $_POST["kakak"] ?? "";
  $adik = $_POST["adik"] ?? "";

  $_SESSION["nim"] = $nim;
  $_SESSION["nama"] = $nama;
  $_SESSION["tempatlahir"] = $tempatlahir;
  $_SESSION["tanggallahir"] = $tanggallahir;
  $_SESSION["hobby"] = $hobby;
  $_SESSION["pasangan"] = $pasangan;
  $_SESSION["pekerjaan"] = $pekerjaan;
  $_SESSION["namaorangtua"] = $namaorangtua;
  $_SESSION["kakak"] = $kakak;
  $_SESSION["adik"] = $adik;
}

$nim = $_SESSION["nim"] ?? "2511500056";
$nama = $_SESSION["nama"] ?? "Muhammad Arkan Ramadhan &#128526;";
$tempatlahir = $_SESSION["tempatlahir"] ?? "Mentok";
$tanggallahir = $_SESSION["tanggallahir"] ?? "30 September 2007";
$hobby = $_SESSION["hobby"] ?? "Mancing, Main game, Baca novel, Menggambar, Memasak &#127926;";
$pasangan = $_SESSION["pasangan"] ?? "Tidak ada karena kurang beruntung &hearts;";
$pekerjaan = $_SESSION["pekerjaan"] ?? "Tidak ada";
$namaorangtua = $_SESSION["namaorangtua"] ?? "Abdul Salam dan Meidia";
$kakak = $_SESSION["kakak"] ?? "Tidak ada";
$adik = $_SESSION["adik"] ?? "Muhammad Abbas Khairan";
$sesnama = $_SESSION["sesnama"] ?? "";
$sesemail = $_SESSION["sesemail"] ?? "";
$sespesan = $_SESSION["sespesan"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
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
      <p>Ini contoh paragraf HTML.</p>
      <?php
      echo "Halo Dunia!<br>";
      echo "Muhammad Arkan Ramadhan";
      ?>
    </section>

    <section id="entrydata">
      <h2>Entry Data Mahasiswa</h2>
      <form action="proses_data.php" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>

        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>

        <label for="tempatlahir">Tempat Lahir:</label>
        <input type="text" id="tempatlahir" name="tempatlahir" placeholder="Masukkan tempat lahir" required>

        <label for="tanggallahir">Tanggal Lahir:</label>
        <input type="date" id="tanggallahir" name="tanggallahir" required>

        <label for="hobby">Hobi:</label>
        <input type="text" id="hobby" name="hobby" placeholder="Masukkan hobi" required>

        <label for="pasangan">Pasangan:</label>
        <input type="text" id="pasangan" name="pasangan" placeholder="Masukkan pasangan" required>

        <label for="pekerjaan">Pekerjaan:</label>
        <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan" required>

        <label for="namaorangtua">Nama Orang Tua:</label>
        <input type="text" id="namaorangtua" name="namaorangtua" placeholder="Masukkan nama orang tua" required>

        <label for="kakak">Nama Kakak:</label>
        <input type="text" id="kakak" name="kakak" placeholder="Masukkan nama kakak">

        <label for="adik">Nama Adik:</label>
        <input type="text" id="adik" name="adik" placeholder="Masukkan nama adik">

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

  <main>
<section id="home">
        <h2>Selamat Datang</h2>
        <p>Ini contoh paragraf HTML.</p>
        <?php
        echo "Halo Dunia!<br>";
        echo "Muhammad Arkan Ramadhan";
        ?>
      </section>

      <section id="about">
       <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> <?= htmlspecialchars($nim) ?></p>
      <p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($nama) ?></p>
      <p><strong>Tempat Lahir:</strong> <?= htmlspecialchars($tempatlahir) ?></p>
      <p><strong>Tanggal Lahir:</strong> <?= htmlspecialchars($tanggallahir) ?></p>
      <p><strong>Hobby:</strong> <?= htmlspecialchars($hobby) ?></p>
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


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Muhammad Arkan Ramadhan [2511500056]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>