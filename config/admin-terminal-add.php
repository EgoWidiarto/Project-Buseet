<?php
session_start();
require_once '../includes/connection.php';
require_once '../includes/function.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $terminalName = mysqli_real_escape_string($conn, $_POST["terminal-name"]);
    $terminalLocation = mysqli_real_escape_string($conn, $_POST["terminal-address"]);
    $terminalID = generateIDNumbers(3);

    $alphaRegex = '/^[a-zA-Z]+$/';
    
    if (!preg_match($alphaRegex, $terminalName)) {
        $_SESSION["insert-message"] = "Masukkan Data Bus Dengan Benar!!";
        header('Location: ../admin/terminal-add.php');
    }
    
    $stmt = mysqli_prepare($conn, "INSERT INTO terminal (kode_terminal, lokasi, nama_terminal) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sss', $terminalID, $terminalLocation, $terminalName);
    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if(!$success) {
        $_SESSION["insert-message"] = "Data Bus Gagal Di Masukkan";
        header('Location: ../admin/terminal-add.php');
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    $_SESSION["insert-message"] = "Data Terminal ". $terminalName ." Berhasil Di Masukkan";
    header('Location: ../admin/terminal-search.php');
}
?>