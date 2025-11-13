<?php
session_start();
$_SESSION["nim"] = $_POST["nim"] ?? "";
$_SESSION["Nama"] = $_POST["Nama"] ?? "";
$_SESSION["tempatlahir"] = $_POST["tempatlahir"] ?? "";
$_SESSION["tanggallahir"] = $_POST["tanggallahir"] ?? "";
$_SESSION["hobby"] = $_POST["hobby"] ?? "";
$_SESSION["pasangan"] = $_POST["pasangan"] ?? "";
$_SESSION["pekerjaan"] = $_POST["pekerjaan"] ?? "";
$_SESSION["namaorangtua"] = $_POST["namaorangtua"] ?? "";
$_SESSION["kakak"] = $_POST["kakak"] ?? "";
$_SESSION["adik"] = $_POST["adik"] ?? "";
$_SESSION["nama"] = $_GET["txtNama"];
$_SESSION["email"] = $_GET["txtEmail"];
$_SESSION["pesan"] = $_GET["txtPesan"];

echo $_SESSION["nama"] . $_SESSION["email"] . $_SESSION["pesan"] . $_SESSION["nim"] . $_SESSION["Nama"] . $_SESSION["tempatlahir"] . $_SESSION["hobby"] . $_SESSION["pasangan"] . $_SESSION["pekerjaan"] . $_SESSION["namaorangtua"] . $_SESSION["kakak"] . $_SESSION["adik"];
header("Location: index.php#about");
?>