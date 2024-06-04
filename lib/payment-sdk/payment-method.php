<?php
// Tangani notifikasi HTTP POST dari Midtrans
$raw_notification = file_get_contents('php://input');
$notification = json_decode($raw_notification, true);

$payment_type = $notification['payment_type'];

session_start();
require_once '../../includes/connection.php';
require_once '../../includes/function.php';

$paymentID = mysqli_query($conn, "SELECT * FROM pembayaran");

date_default_timezone_set('Asia/Jakarta');
$dateNow = date('Y-m-d H:i:s');
$payStatus = 'LUNAS';
$orderID = $_SESSION['order-id'];

// Masukkan data transaksi ke database
$sql = "INSERT INTO pembayaran (Id_pembayaran, metode_pembayaran, waktu_pembayaran, status_pembayaran, Id_pemesanan, total_bayar) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sds", $paymentID, $payment_type, $dateNow, $payStatus, $orderID, $notification['gross_amount']);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

http_response_code(200);
?>