<?php
session_start();
require_once '../includes/connection.php';

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan simpan dalam sesi
    $_SESSION['search_departure'] = mysqli_real_escape_string($conn, $_POST['departure']);
    $_SESSION['search_arrival'] = mysqli_real_escape_string($conn, $_POST['arrival']);
    $_SESSION['search_departure_date'] = $_POST['departure-date'];
    $_SESSION['search_arrival_date'] = $_POST['arrival-date'];

    // Alihkan ke halaman ticket-selector.php
    header('Location: ../booking/ticket-selection.php');
    exit;
}
?>
