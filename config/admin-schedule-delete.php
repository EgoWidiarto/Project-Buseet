<?php
session_start();
require_once '../includes/connection.php';

$routeID = $_GET["id_rute"];

mysqli_query($conn, "DELETE FROM rute_perjalanan WHERE Id_rute = '$routeID';");

if(mysqli_affected_rows($conn) > 0) {
    $_SESSION["remove-message"] = 'Hapus Rute Perjalanan Berhasil';
    header('Location: ../admin/schedule-search.php');
} else {
    $_SESSION["remove-message"] = 'Hapus Rute Perjalanan Gagal';
    header('Location: ../admin/schedule-search.php');
}
?>