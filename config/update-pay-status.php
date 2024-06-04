<?php
session_start();
require_once '../includes/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = $_POST["order-number"];

    $updateStatus = mysqli_query($conn, "UPDATE pembayaran SET status_pembayaran = 'LUNAS' WHERE Id_pemesanan = '$orderID';");

    if(mysqli_affected_rows($conn) > 0 ){
        $_SESSION["update-message"] = 'Pembayaran Berhasil';
        header('../booking/user-ticket.php');
    } else {
        $_SESSION["update-message"] = 'Pembayaran Gagal';
        header('../booking/booking-detail.php');
    }
}
?>