<?php
session_start();

$_SESSION["nim"] = $_POST["nim"];
$_SESSION["nama"] = $_POST["nama"];
$_SESSION["tempatlahir"] = $_POST["tempatlahir"];
$_SESSION["tanggallahir"] = $_POST["tanggallahir"];
$_SESSION["hobby"] = $_POST["hobby"];
$_SESSION["pasangan"] = $_POST["pasangan"];
$_SESSION["pekerjaan"] = $_POST["pekerjaan"];
$_SESSION["namaorangtua"] = $_POST["namaorangtua"];
$_SESSION["kakak"] = $_POST["kakak"];
$_SESSION["adik"] = $_POST["adik"];

header("Location: index.php");
exit;
