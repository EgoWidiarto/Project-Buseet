<?php
session_start();
require_once '../includes/connection.php';

$userID = $_SESSION["user_id"];

$ticketHistoryQuery = mysqli_query($conn, "SELECT 
    t.Id_tiket AS 'ticket-id',
    b.nama_bus AS 'bus-name',
    dt.nama_terminal AS 'depart-terminal',
    ta.nama_terminal AS 'arr-terminal',
    k.no_kursi AS 'seat-number',
    pb.status_pembayaran AS 'pay-status',
    pb.total_bayar AS 'total-pay',
    pm.Id_pengguna
    FROM 
        tiket t
    JOIN 
        pemesanan pm ON t.Id_tiket = pm.Id_tiket
    JOIN 
        pembayaran pb ON pm.Id_pemesanan = pb.Id_pemesanan
    JOIN 
        bus b ON t.Id_bus = b.Id_bus
    JOIN 
        kursi k ON t.Id_kursi = k.Id_kursi
    JOIN 
        rute_perjalanan rp ON t.Id_rute = rp.Id_rute
    JOIN 
        terminal dt ON rp.terminal_awal = dt.kode_terminal
    JOIN 
        terminal ta ON rp.terminal_akhir = ta.kode_terminal
    WHERE 
        pm.Id_pengguna = '$userID';
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title> Riwayar Transaksi </title>
    <link rel="icon" href="../assets/icon/logo-buseet.png">
    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Linnk Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!-- css code file -->
    <link rel="stylesheet" href="../assets/style/global.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../assets/style/profile.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../assets/style/component.css?v=<?= time() ?>" />

    <style>
        .font-primary {
            color: #203f66;
        }
    </style>
</head>

<body id="profile">
    <!-- Navigation Bar Tag Start -->
    <?php include '../includes/header.php' ?>
    <!-- Navigation Bar Tag End -->

    <!-- profile start -->
    <section class="profile-s w-100 d-flex justify-conten-center p-3">
        <div class="mt-4 mb-5 bg-light mx-auto text-black p-3 rounded d-block" style="width:60rem">
            <div class="booking-detail-container mt-3 row w-100 p-4 position-relative">
                <h6 class="text-center fw-bold mb-5 font-primary" style="font-size: 1.6rem">Riwayat Transaksi</h6>
                <?php while( $row = mysqli_fetch_assoc($ticketHistoryQuery) ) : ?>
                <div class="mt-3 mb-5 bg-light text-black p-3 rounded align-items-center" style="border: 1px solid #9B9B9B; width: 55rem; color: #203f66; border-radius: 10px;">
                    <div class="d-flex justify-content-between">
                        <h6 class="text-start d-block font-16 font-primary">Kode Ticket: <span class="fw-bold"><?= $row["ticket-id"] ?></span></h6>
                        <?php if( $row["pay-status"] == "LUNAS" ) : ?>
                        <h6 class="text-end d-block fw-bold text-uppercase" style="margin-left: 10px; color: #1D6D20; font-size: 1.5rem;"><?= $row["pay-status"] ?></h6>
                        <?php else : ?>
                        <h6 class="text-end d-block fw-bold text-danger text-uppercase" style="margin-left: 10px; font-size: 1.5rem;"><?= $row["pay-status"] ?></h6>
                        <?php endif; ?>
                    </div>
                    <div class="rounded-2 mt-3">
                        <div class="text-start booking-detail-container">
                            <div class="d-flex justify-content-between" style="margin: 20px;">
                                <div class="d-flex align-items-center mt-3">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="70" height="70" fill="url(#pattern0_719_177)"/>
                                                <defs>
                                                    <pattern id="pattern0_719_177" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                        <use xlink:href="#image0_719_177" transform="scale(0.0104167)"/>
                                                    </pattern>
                                                    <image id="image0_719_177" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAADPElEQVR4nO2dQUsVYRSGn9p6MaLctS1XkauyfkBBixZtgmoXFLRy708IgrSCFu0lwkVFv0BaRQuhtRBiIRUpEZrkiS++hQQ5c23me8/MPQ+8ICjX9zln5s4VuXMhCIIgCIIgCIIgCIIgCNpjAJwGrgAzwANgAXgNLAHLwArwdU92ABsyO389xkp+7KX8uxby757JXVKnsb4t/jBwHpgFXgBrBxikFc5a7jqbuyeHznEBeAqsOxio/WfWs0tycs0h4Go+za2nWc6OydUVk8AbBwOyQkmup3DCTeC7g6FY4STnG+rh3wJ+ORiGibIL3FUN/3IuYCOe3TyLokwAnxzIm5N8zDMpxn0H0uYs90oNfxz45kDYnGUTOFJiAdcdyJrTXCuxgCcORM1pHpdYwDsHouY0b0ssYNWBqDnNhxIL+OFA1JwmzaZ1qkr0HVP7ywuIkfvLC4iR+8sLiJH7ywuIkfvLC4iR+8sLiJH7ywuIkfvLC4iR+8sLiJH7ywuIkfvLC4iR+8sLiJH7ywuIkfvLC4iR+8sLiJH7ywuIkfvLC4iR+8sLiJH7ywuIkfvLC4iR+8sLiJH7ywuIkfvLC4iR+8sLiJH7ywuIkfvLC4iR+1cVGPW0jlrQnCcWQCxAfhRanAH6QVg8BemHYYLENYBYgPwotDgD9IOweArSD8MEiWsAsQD5UWhxBsBWvifbuXwvtrH89Vz+njlLU31dPAWlt7Ke2ecxppy93XW1wb6tU+dI2k9mr9SWg+E33bd1qgqk07gu8w4W0HTf1qkqcHaIx5p2sICm+7ZOVYF0Y9a6DBwsoOm+rdOk0HjHFlCnb+uUPqWt5XTuKWijokB63dyli/Bcg33TbFrnfUWJrfySrYopYNvBAprsm2bTOq9qSK1WSHn8Q2yqgb4vKcCdmlLb+ZSdzhe6Qb4b+byTI99a6Hu7xAImDng//75nBzhOIR45EDZneUhBjvbkswGsoXwGjlGYS8BPB/ImTro+XERE3MSVPzOQYiMeOTbikWMjHjmdK9w3n84V7ptP5wr3zadzhfvmszlE2fTJG97Z7JrP4hCFn+Ofxa75pE/R+1KjbPqZk/hnsos+J4Bn//h35UY+UtyUHUGfIAiCAH/8BhYr/NCYXwQCAAAAAElFTkSuQmCC"/>
                                                </defs>
                                            </svg>
                                    <div class="justify-content-between" style="margin-left: 10px;">
                                        <div class="text-start">
                                            <h6 class="fw-bold font-15"><?= $row["bus-name"] ?></h6>
                                            <p class="font-15 mb-0"><?= $row["depart-terminal"] ?> > <?= $row["arr-terminal"] ?></p>
                                            <p class="font-15 mt-0">Nomor Kursi: <span class="fw-semibold"><?= $row["seat-number"] ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-end font-15 text-end font-primary mb-0">Total Harga: <span class="fw-bold">Rp. <?= $row["total-pay"] ?></span></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- profile end -->

    <!-- Bootstrap5 JS -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz " crossorigin="anonymous "></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time() ?>"></script>

    <script>
        navbarResponsive();
    </script>
</body>

</html>