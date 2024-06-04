<?php
session_start();
require_once '../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_SESSION["user_id"];
    $newContact = mysqli_real_escape_string($conn, $_POST["contact"]);
    $newEmail = mysqli_real_escape_string($conn, $_POST["email"]);
    $newAddress = strtolower(mysqli_real_escape_string($conn, $_POST["user-address"]));
    $newIdentityNum = mysqli_real_escape_string($conn, $_POST["identity-num"]);
    $newIdentityType = $_POST["identity-type"];
    $newBDate = $_POST["birth-date"];

    // Cek apakah password diisi
    $password = $_POST["password-change"];
    $passwordChange = !empty($password);

    // Jika password diisi, hash password baru
    $newPassword = $passwordChange ? password_hash($password, PASSWORD_DEFAULT) : null;

    // Siapkan SQL tanpa password jika tidak ada perubahan password
    $sql = "UPDATE pengguna
            SET nomor_hp = '$newContact',
                nomor_identitas = '$newIdentityNum',
                tgl_lahir = '$newBDate',
                email = '$newEmail',
                alamat = '$newAddress',
                tipe_identitas = '$newIdentityType'
            ".($passwordChange ? ", password = '$newPassword'" : "")."
            WHERE Id_pengguna = '$userID'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["profile-update-message"] = 'Profile Berhasil Diperbarui';
        header('Location: profile.php');
    } else {
        $_SESSION["profile-update-message"] = 'Profile Gagal Diperbarui';
    }
    $conn->close();
}
?>