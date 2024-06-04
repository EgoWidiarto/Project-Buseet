<?php
session_start();
require_once '../includes/connection.php';
require_once '../includes/function.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $driverName = mysqli_real_escape_string($conn, $_POST["driver-name"]);
    $NIP = mysqli_real_escape_string($conn, $_POST["nip"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $phoneNum = mysqli_real_escape_string($conn, $_POST["phone"]);
    
    $stmt = mysqli_prepare($conn, "INSERT INTO sopir (NIP, nama_lengkap, alamat, nomor_hp) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $NIP, $driverName, $address, $phoneNum);
    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if(!$success) {
        $_SESSION["insert-message"] = "Data Sopir Gagal Di Masukkan";
        header('Location: ../admin/driver-add.php');
    }

    $_SESSION["insert-message"] = "Data Sopir ". $driverName ." Berhasil Di Masukkan";
    header('Location: ../admin/driver-search.php');
}
?>