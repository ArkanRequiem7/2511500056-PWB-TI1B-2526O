<?php
session_start();

$arrContact = [
    "nama" => $_POST["txtNama"] ?? "",
    "email" => $_POST["txtEmail"] ?? "",
    "pesan" => $_POST["txtPesan"] ?? "",
];

$sesnama = $arrContact["nama"];
$sesemail = $arrContact["email"];
$sespesan = $arrContact["pesan"];
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;

$arrBiodata = [
    "nim" => $_POST["txtNim"] ?? "",
    "nama" => $_POST["txtNmLengkap"] ?? "",
    "tempat" => $_POST["txtT4Lhr"] ?? "",
    "tanggal" => $_POST["txtTglLhr"] ?? "",
    "hobi" => $_POST["txtHobi"] ?? "",
    "pasangan" => $_POST["txtPasangan"] ?? "",
    "pekerjaan" => $_POST["txtKerja"] ?? "",
    "ortu" => $_POST["txtNmOrtu"] ?? "",
    "kakak" => $_POST["txtNmKakak"] ?? "",
    "adik" => $_POST["txtNmAdik"] ?? ""
];

$_SESSION["biodata"] = $arrBiodata;

if (!empty($_POST["txtNama"])) {
    header("location: index.php#contact");
} else {
    header("location: index.php#about");
}
exit();
?>