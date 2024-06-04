<?php
session_start();
require_once '../includes/connection.php';

$terminalID = $_GET["bus-id"];

mysqli_query($conn, "DELETE FROM terminal WHERE kode_terminal = '$terminalID';");

if(mysqli_affected_rows($conn) > 0) {
    $_SESSION["remove-message"] = 'Hapus Bus Berhasil';
    header('Location: ../admin/bus-search.php');
} else {
    $_SESSION["remove-message"] = 'Hapus Bus Gagal';
    header('Location: ../admin/bus-search.php');
}
?>