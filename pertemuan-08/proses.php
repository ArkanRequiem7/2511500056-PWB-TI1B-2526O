<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["sesnama"] = $_POST["txtNama"] ?? "";
    $_SESSION["sesemail"] = $_POST["txtEmail"] ?? "";
    $_SESSION["sespesan"] = $_POST["txtPesan"] ?? "";
}

header("Location: index.php#contact");
exit;
?>
