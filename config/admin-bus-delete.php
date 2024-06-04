<?php
session_start();
require_once '../includes/connection.php';

$busID = $_GET["bus-id"];

mysqli_query($conn, "DELETE FROM bus WHERE Id_bus = '$busID';");

if(mysqli_affected_rows($conn) > 0) {
    $_SESSION["remove-message"] = 'Hapus Bus Berhasil';
    header('Location: ../admin/bus-search.php');
} else {
    $_SESSION["remove-message"] = 'Hapus Bus Gagal';
    header('Location: ../admin/bus-search.php');
}
?>