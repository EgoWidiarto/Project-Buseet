<?php
session_start();
require_once '../includes/connection.php';

$fullName = strtolower(stripslashes($_POST["full-name"]));
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn ,$_POST["password"]);
$rePassword = mysqli_real_escape_string($conn, $_POST["re-password"]);
$tempID = random_int(0, 999999);

// Cek Konfirmasi Password
if($password !== $rePassword) {
    $_SESSION["password-error_message"] = "Kata Sandi Tidak Sesuai";
    header("Location: ../auth/register-admin.php");
    exit;
} 

// Cek Username Is Register Or Not
$result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
if (mysqli_num_rows($result) > 0) {
    $_SESSION["email-usage-message"] = "Email Sudah Terdaftar";
    header('Location: ../auth/register-admin.php');
    exit;
}

// Enkripsi Password
$password = password_hash($password, PASSWORD_DEFAULT);

// Insert Data to Database
mysqli_query($conn, "INSERT INTO admin (id_admin, nama_admin, email, password) VALUES('$tempID', '$fullName', '$email', '$password')");

if(mysqli_affected_rows($conn) > 0) {
    header('Location: ../auth/login-admin.php');
    exit;
}
?>