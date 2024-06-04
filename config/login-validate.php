<?php
session_start();
require_once '../includes/connection.php'; // Sertakan file koneksi Anda di sini

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Buat query untuk memeriksa email dan password di database
    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE email = '$email'");
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        // Verifikasi password (asumsikan password disimpan sebagai hash)
        if (password_verify($password, $user["password"])) {
            // Setel sesi dan alihkan ke halaman home
            $_SESSION['user_id'] = $user['Id_pengguna'];
            $_SESSION['user-email'] = $user['email'];
            header('Location: ../pages/home.php');
            exit;
        } else {
            // Password salah, setel pesan kesalahan dan alihkan kembali ke login.php
            $_SESSION['error_message'] = "Email atau password salah.";
            header('Location: ../auth/login.php');
            exit;
        }
    } else {
        // Email tidak ditemukan atau query gagal
        $_SESSION['error_message'] = "Password atau Email salah.";
        header('Location: ../auth/login.php');
        exit;
    }
}
?>