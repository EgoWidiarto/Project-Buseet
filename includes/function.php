<?php
require_once 'connection.php';

function generateIDNumbers($numberLength) {
    $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numbers = "0123456789";
    $randomLetter = $letters[rand(0, strlen($letters) - 1)];
    $randomNumbers = "";
    for ($i = 0; $i < $numberLength; $i++) {
        $randomNumbers .= $numbers[rand(0, strlen($numbers) - 1)];
    }
    return $randomLetter . $randomNumbers;
}

function updateSchedule($data) {
    global $conn;

    $routeID = $data["routeID"];
    $busID = $data["bus-name"];
    $scheduleID = $data["depart-time"];
    $departTerminal = $data["depart-terminal"];
    $arrTerminal = $data["arr-terminal"];
    $estimatedTime = $data["time-estimated"];

    // Prepared statement untuk rute_perjalanan
    $stmt = mysqli_prepare($conn, "UPDATE rute_perjalanan SET terminal_awal = ?, terminal_akhir = ?, waktu_perjalanan = ? WHERE Id_rute = ?");
    mysqli_stmt_bind_param($stmt, 'ssss', $departTerminal, $arrTerminal, $estimatedTime, $routeID);
    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if(!$success) {
        return false; // Gagal menjalankan query
    }

    // Prepared statement untuk jadwal
    $stmt = mysqli_prepare($conn, "UPDATE jadwal SET Id_bus = ? WHERE Id_jadwal = ?");
    mysqli_stmt_bind_param($stmt, 'ss', $busID, $scheduleID);
    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if(!$success) {
        return false; // Gagal menjalankan query
    }

    return true; // Semua query berhasil dijalankan
}

?>