<?php
session_start();
require_once '../includes/connection.php';

$driverID = $_GET["driver-id"];

mysqli_query($conn, "DELETE FROM sopir WHERE NIP = '$driverID';");

if(mysqli_affected_rows($conn) > 0) {
    $_SESSION["remove-message"] = 'Hapus Sopir Berhasil';
    header('Location: ../admin/driver-search.php');
} else {
    $_SESSION["remove-message"] = 'Hapus Sopir Gagal';
    header('Location: ../admin/driver-search.php');
}
?>