<?php
session_start();
require_once '../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticketID = $_POST["ticket-id"];
    $newDate = $_POST["update-date"];
    $busName = $_POST["bus-name"];
    $seatNumber = $_POST["seat-number"];

    $updateDepartureQuery = mysqli_query($conn, "UPDATE tiket t
        SET t.tanggal_keberangkatan = '$newDate'
        WHERE t.Id_tiket = '$ticketID'
        AND '$newDate' > CURDATE()
        AND NOT EXISTS (
            SELECT 1
            FROM tiket t2
            INNER JOIN bus b ON t2.Id_bus = b.Id_bus
            INNER JOIN kursi k ON t2.Id_kursi = k.Id_kursi
            INNER JOIN rute_perjalanan rp ON t2.Id_rute = rp.Id_rute
            WHERE t2.tanggal_keberangkatan = '$newDate'
            AND k.no_kursi = '$seatNumber'
            AND b.nama_bus = '$busName'
            AND rp.Id_rute = (SELECT Id_rute FROM rute_perjalanan WHERE Id_rute = t.Id_rute)
        );
    ");
    
    if ($updateDepartureQuery && mysqli_affected_rows($conn) > 0) {
        $_SESSION["update-message"] = 'Berhasil Merubah Tanggal Keberangatan';
        header('Location: ../booking/user-ticket.php');
        exit();
    } else {
        $_SESSION["update-message"] = 'Gagal Nomor Kursi Yang Sama Telah Dipesan Pada Tanggal Tersebut';
        header('Location: ../booking/ticket-change.php');
        exit();
    }
}
?>