<?php
$serverName = "localhost";
$username = "root"; 
$password = ""; 
$database = "buseet_database";

$conn = mysqli_connect($serverName, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($rows, $row);
    }

    return $rows;
}
?>