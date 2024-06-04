<?php
session_start();
require_once '../includes/connection.php';
require_once '../includes/function.php';

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Ambil data dari form dan simpan dalam sesi 
    $seatNumber = $_POST["seatNumber"];
    $fullName = $_POST["fullName"];
    $identityType = $_POST["identityType"];
    $identityNumber = $_POST["identityNumber"];
    $age = $_POST["age"];
    $contact = $_POST["contact"];
    $busID = $_POST["busIDbus"];
    $routeID = $_SESSION["routeID"];
    $payStatus = 'LUNAS';
    $totalPay = $_POST["totalPrice"];
    
    // Take Item From Another Session
    $departureDate = $_SESSION["search_departure_date"];
    $userID = $_SESSION["user_id"];

    // Seat ID number
    $seatIDSearch = mysqli_query($conn, "SELECT * FROM kursi WHERE Id_bus = '$busID' AND no_kursi = '$seatNumber';");
    $seatIdArray = mysqli_fetch_assoc($seatIDSearch);
    $seatId = $seatIdArray["Id_kursi"];

    date_default_timezone_set('Asia/Jakarta');
    $dateNow = date('Y-m-d H:i:s'); // Output akan sesuai dengan zona waktu Asia/Jakarta
    
    // Gunakan nilai dari sesi
    $paymentID = generateIDNumbers(5);
    $ticketNumber = generateIDNumbers(5);
    $orderPersonId = generateIDNumbers(9);
    $orderNumber = generateIDNumbers(11);
    $_SESSION["order-number"] = $orderNumber;

    $conn->begin_transaction();

    try {
        $ticket = mysqli_query($conn, "INSERT INTO tiket (Id_tiket, Id_bus, Id_kursi, tanggal_keberangkatan, Id_rute) VALUES ('$ticketNumber', '$busID', '$seatId', '$departureDate', '$routeID')");
        if (!$ticket) {
            throw new Exception(mysqli_error($conn));
        }

        $order = mysqli_query($conn, "INSERT INTO pemesanan (Id_pemesanan, jumlah_pemesanan, Id_pengguna, Id_tiket, tanggal_pemesanan) VALUES ('$orderNumber', 1, '$userID', '$ticketNumber', '$dateNow')");
        if (!$order) {
            throw new Exception(mysqli_error($conn));
        }

        $orderIdentity = mysqli_query($conn, "INSERT INTO identitas_pemesan (id_identitas, id_pengguna, id_pemesanan, nama_pemesan, tipe_identitas, nomor_identitas, usia, nomor_hp) VALUES ('$orderPersonId', '$userID', '$orderNumber', '$fullName', '$identityType', '$identityNumber', $age, '$contact')");
        if (!$orderIdentity) {
            throw new Exception(mysqli_error($conn));
        }

        $payment = mysqli_query($conn, "INSERT INTO pembayaran (Id_pembayaran, metode_pembayaran, waktu_pembayaran, status_pembayaran, Id_pemesanan, total_bayar) VALUES ('$paymentID', 'E-Wallet', '$dateNow', '$payStatus', '$orderNumber', '$totalPay')");
        if (!$payment) {
            throw new Exception(mysqli_error($conn));
        }        

        $conn->commit();
        header('Location: ../booking/booking-detail.php');
    } catch (Exception $e) {
        $conn->rollback();
    }
}

echo json_encode($response);
?>