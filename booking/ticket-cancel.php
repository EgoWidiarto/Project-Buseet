<?php
session_start();
require_once '../includes/connection.php';

$userID = $_SESSION["user_id"];
$ticketID = $_SESSION["ticket-code"];

$ticketQuery = mysqli_query($conn, "SELECT 
                        ip.nama_pemesan AS 'orderer_name',
                        ip.tipe_identitas AS 'identity_type',
                        ip.nomor_identitas AS 'identity_num',
                        ip.usia AS 'age',
                        ip.nomor_hp AS 'contact', 
                        t.Id_tiket AS 'ticket_id', 
                        p.tanggal_pemesanan AS 'order_date', 
                        b.nama_bus AS 'bus_name',
                        DATE_FORMAT(j.jam_keberangkatan, '%H:%i') AS 'depart_time',
                        DATE_FORMAT(j.jam_kedatangan, '%H:%i') AS 'arr_time',
                        dt.nama_terminal AS 'depart_terminal',
                        dt.lokasi AS 'depart_location',
                        ta.nama_terminal AS 'arr_terminal',
                        ta.lokasi AS 'arr_location',
                        k.no_kursi AS 'seat_number',
                        t.Id_tiket AS 'ticket_id'
                    FROM 
                        identitas_pemesan ip
                    JOIN 
                        pemesanan p ON ip.id_pemesanan = p.Id_pemesanan
                    JOIN 
                        tiket t ON p.Id_tiket = t.Id_tiket
                    JOIN 
                        bus b ON t.Id_bus = b.Id_bus
                    JOIN 
                        kursi k ON t.Id_kursi = k.Id_kursi
                    JOIN 
                        jadwal j ON b.Id_bus = j.Id_bus
                    JOIN 
                        rute_perjalanan rp ON t.Id_rute = rp.Id_rute
                    JOIN 
                        terminal dt ON rp.terminal_awal = dt.kode_terminal                        
                    JOIN 
                        terminal ta ON rp.terminal_akhir = ta.kode_terminal
                    WHERE 
                        ip.id_pengguna = '$userID'
                        AND t.Id_tiket = '$ticketID'
                    ");
$ticket = mysqli_fetch_assoc($ticketQuery);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title> BUSEET </title>
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
    <link rel="stylesheet" href="../assets/style/ticket-selector.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../assets/style/component.css?v=<?= time() ?>" />

    <style>
      .booking-detail-container input {
        color: #203f66;
      }

      .cancel-ticket-btn {
        background-color: red !important;
      }

      .pay-price-mb {
        margin-bottom: -1rem;
      }

      footer {
        margin-top: 12rem;
      }
    </style>
  </head>
  <body>
    <!-- Navigation Bar Tag Start -->
    <?php include '../includes/header.php' ?>
    <!-- Navigation Bar Tag End -->

    <div class="d-flex flex-row justify-conten-around content-navbar-plus">
      <!-- Main Content Start -->
      <main class="text-center pt-3 ms-auto me-auto">
        <h5 class="fw-semibold">Pembatalan Tiket</h5>
        <!-- Form User Identity Start -->
        <form action="" method="post">
          <div class="mt-4 mb-5 bg-light m-auto text-black p-4 rounded" style="width: 55rem; color: #203f66 !important">
            <div class="d-flex justify-content-between">
              <h6 class="text-start d-block fw-bold font-15">Detail Pemesanan</h6>
              <h6 class="text-end d-block fw-bold font-15 no-tiket">Nomor Tiket: <?= $ticket["ticket_id"] ?></h6>
            </div>
            <div class="form-identity-container text-start mt-3 gap-0 font-color-primary ps-3 pe-3">
              <!--Full Name -->
              <div class="mb-2">
                <label for="staticName" class="form-label fw-semibold mb-0 no-outline">Nama</label>
                <div class="col-sm-10 mt-0">
                  <input type="text" readonly class="form-control-plaintext no-outline" id="staticName" value="<?= $ticket["orderer_name"] ?>" />
                </div>
              </div>

              <div class="mb-2">
                <div class="col-sm-10 d-flex justify-content-around mt-0">
                  <div class="col-5">
                    <!-- Identity Type -->
                    <label for="staticIdentity" class="form-label fw-semibold mb-0 no-outline id-type"><?= $ticket["identity_type"] ?></label>
                    <input type="text" readonly class="form-control-plaintext no-outline" id="staticIdentity" value="<?= $ticket["identity_num"] ?>" />
                  </div>

                  <div class="col-3">
                    <!-- Ages -->
                    <label for="staticAge" class="form-label fw-semibold mb-0">Umur</label>
                    <input type="text" readonly class="form-control-plaintext no-outline mt-0" id="staticAge" value="<?= $ticket["age"] ?>" />
                  </div>

                  <div>
                    <!-- Contact -->
                    <label for="staticContact" class="form-label fw-semibold mb-0 no-outline">Kontak</label>
                    <input type="text" class="form-control-plaintext no-outline" id="staticContact" value="<?= $ticket["contact"] ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="rounded-2 mt-3">
              <div class="text-start booking-detail-container">
                <h5 style="font-size: 16px" class="fw-bold mb-4">Detail e-Tiket</h5>
                <div>
                  <label for="staticNameBus" class="form-label fw-bold mb-0 font-15 no-outline">Nama Bus</label>
                  <input type="text" readonly class="form-control-plaintext no-outline" id="staticName" value="<?= $ticket["bus_name"] ?>" />
                  <div class="card-content d-flex flex-column">
                    <div style="border-left: 1px dotted #000" class="position-relative card-section text-start depart-arrival-info ps-2">
                      <div class="position-absolute top-0 left-03 bg-dark border border-secondary rounded-circle" style="width: 10px; height: 10px"></div>
                      <div class="position-absolute bottom-0 left-03 bg-dark border border-secondary rounded-circle" style="width: 10px; height: 10px"></div>
                      <h6 class="fw-bold font-13">Keberangkatan</h6>
                      <div class="d-flex justify-content-between ms-3 mt-1">
                        <p class="d-block font-13 fw-semibold"><?= $ticket["depart_terminal"] ?></p>
                        <p class="d-blcok fw-semibold font-13"><?= $ticket["depart_time"] ?></p>
                      </div>
                      <p class="ms-3 font-12"><?= $ticket["depart_location"] ?></p>
                      <h6 class="fw-bold font-13 mt-3">Kedatangan</h6>
                    </div>
                    <div class="card-section text-start depart-arrival-info ps-2">
                      <div class="d-flex justify-content-between ms-3 mt-1">
                        <p class="d-block font-13 fw-semibold"><?= $ticket["arr_terminal"] ?></p>
                        <p class="d-blcok fw-semibold font-13"><?= $ticket["arr_time"] ?></p>
                      </div>
                      <p class="ms-3 font-12"><?= $ticket["arr_terminal"] ?></p>
                    </div>
                    <div class="card-section d-flex justify-content-between mt-3 border-top pt-3 align-content-center">
                      <h6 class="font-13 fw-semibold">Nomor Tempat Duduk</h6>
                      <p class="seat-number"><?= $ticket["seat_number"] ?></p>
                    </div>
                  </div>
                  <div class="text-end mt-5">
                    <a href="cancel-reason.php" class="btn btn-lg cancel-ticket-btn font-13 w-40">Batalkan Tiket</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Collapse Item End -->
          </div>
        </form>
        <!-- Form User Identity Tiket -->
      </main>
      <!-- Main Content End -->
    </div>

    <!-- Ticket Cancel Footer -->
    <?php include '../includes/footer.php' ?>
    <!-- Ticket Cancel Footer -->

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time() ?>"></script>
    <script>
        navbarResponsive();
    </script>
  </body>
</html>