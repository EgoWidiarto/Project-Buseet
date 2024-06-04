<?php
session_start();
require_once '../includes/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST["orderId"];

    $cancelQuery = mysqli_query($conn, "UPDATE pembayaran
        SET status_pembayaran ='DIBATALKAN'
        WHERE Id_pemesanan = '$order_id';
    ");

    if(mysqli_affected_rows($conn) > 0) {
        $_SESSION["cancel-message"] = 'Tiket Berhasil Dibatalkan';
        header('Location: ../pages/home.php');
    } else {
        $_SESSION["cancel-message"] = 'Tiket Gagal Dibatalkan';
        header('Location: ../pages/home.php');
    }
}
?>