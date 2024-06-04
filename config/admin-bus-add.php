<?php
session_start();
require_once '../includes/connection.php';
require_once '../includes/function.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $busName = mysqli_real_escape_string($conn, $_POST["bus-name"]);
    $busType = $_POST["bus-type"];
    $busCapacity = mysqli_real_escape_string($conn, $_POST["capacity"]);
    $busID = generateIDNumbers(2);
    $num = 10;
    $codeArray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    $alphaRegex = '/^[a-zA-Z]+$/';
    $numRegex = '/^[0-9]+$/';
    
    if (!preg_match($alphaRegex, $busName) || !preg_match($numRegex, $busCapacity)) {
        $_SESSION["insert-message"] = "Masukkan Data Bus Dengan Benar!!";
        header('Location: ../admin/bus-add.php');
    }
    
    $stmt = mysqli_prepare($conn, "INSERT INTO bus (Id_bus, kapasitas, nama_bus, tipe_bus) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'siss', $busID, $busCapacity, $busName, $busType);
    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if(!$success) {
        $_SESSION["insert-message"] = "Data Bus Gagal Di Masukkan";
        header('Location: ../admin/bus-add.php');
    }

    $result = mysqli_query($conn, "SELECT MAX(Id_kursi) AS nilai_terbesar FROM kursi;");
    $row = mysqli_fetch_assoc($result);
    $maxNumID = $row['nilai_terbesar'];

    $stmt = mysqli_prepare($conn, "INSERT INTO kursi (Id_kursi, no_kursi, Id_bus) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "iss", $maxNumID, $seatNum, $busID);

    // Looping untuk meng-*insert* data nomor kursi
    for ($i = 0; $i < $num; $i++) {
        for ($j = 1; $j <= $busCapacity; $j++) {
            $maxNumID += $j;
            $seatNum = $codeArray[$i] . $j;
            if (!mysqli_stmt_execute($stmt)) {
                $_SESSION["insert-message"] = "Data Kursi Gagal Di Masukkan";
                header('Location: ../admin/bus-add.php');
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    $_SESSION["insert-message"] = "Data Bus ". $busName ." Berhasil Di Masukkan";
    header('Location: ../admin/bus-search.php');
}
?>