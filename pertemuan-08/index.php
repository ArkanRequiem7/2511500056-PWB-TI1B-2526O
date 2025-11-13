<?php
session_start();

$sesnama = "";
if (isset($_SESSION["sesnama"])):
  $sesnama = $_SESSION["sesnama"];
endif;

$sesemail = "";
if (isset($_SESSION["sesemail"])):
  $sesemail = $_SESSION["sesemail"];
endif;

$sespesan = "";
if (isset($_SESSION["sespesan"])):
  $sespesan = $_SESSION["sespesan"];
endif;
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
        <?php
        $nim = "2511500056";
        $nama = "Muhammad Arkan Ramadhan &#128526;";
        $tempatlahir = "Mentok";
        $tanggallahir = "30 September 2007";
        $hobby = "Mancing, Main game, Baca novel, Menggambar, Memasak &#127926;";
        $pasangan = "Tidak ada karena kurang beruntung &hearts;";
        $pekerjaaan = "Tidak ada";
        $namaorangtua = "Abdul Salam dan Meidia";
        $kakak = "Tidak ada";
        $adik = "Muhammad Abbas Khairan";
        ?>
        <h2>Tentang Saya</h2>
        <p><strong>NIM:</strong> <?php echo $nim ?></p>
        <p><strong>Nama Lengkap:</strong> <?php echo $nama ?></p>
        <p><strong>Tempat Lahir:</strong> <?php echo $tempatlahir ?></p>
        <p><strong>Tanggal Lahir:</strong> <?php echo $tanggallahir ?></p>
        <p><strong>Hobby:</strong> <?php echo $hobby ?></p>
        <p><strong>Pasangan:</strong> <?php echo $pasangan ?></p>
        <p><strong>Pekerjaan:</strong> <?php echo $pekerjaaan ?></p>
        <p><strong>Nama Orang Tua:</strong> <?php echo $namaorangtua ?></p>
        <p><strong>Nama Kakak:</strong> <?php echo $kakak ?></p>
        <p><strong>Nama Adik:</strong> <?php echo $adik ?></p>
        <p><strong>&#9786;</strong> Smiley!</p>
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