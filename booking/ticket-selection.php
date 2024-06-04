<?php
session_start();
require_once '../includes/connection.php';

$departure = $_SESSION["search_departure"];
$arrival = $_SESSION["search_arrival"];
$departDate = $_SESSION["search_departure_date"];
$arrDate = $_SESSION["search_arrival_date"];

$infoTicket = mysqli_query($conn, "SELECT 
      b.nama_bus AS 'bus-name',
      b.tipe_bus AS 'bus-type',
      ta.nama_terminal AS 'depTerminal', 
      tb.nama_terminal AS 'arrTerminal',
      ta.lokasi AS 'departLocation',
      tb.lokasi AS 'arrLocation',
      DATE_FORMAT(j.jam_keberangkatan, '%H:%i') AS 'depTime',
      DATE_FORMAT(j.jam_kedatangan, '%H:%i') AS 'arrTime',
      rp.Id_rute AS 'route-id',
      rp.waktu_perjalanan AS 'time-estimated',
      rp.harga AS 'price',
      b.Id_bus AS 'bus-id'
  FROM 
      bus b
  INNER JOIN 
      jadwal j ON b.Id_bus = j.Id_bus
  INNER JOIN 
      rute_perjalanan rp ON j.Id_jadwal = rp.Id_jadwal
  INNER JOIN 
      terminal ta ON ta.kode_terminal = rp.terminal_awal
  INNER JOIN 
      terminal tb ON tb.kode_terminal = rp.terminal_akhir
  INNER JOIN 
      kursi k ON b.Id_bus = k.Id_bus
  WHERE 
      ta.nama_terminal = '$departure' AND 
      tb.nama_terminal = '$arrival'
  GROUP BY b.nama_bus;
");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title> BUSEET </title>
    <link rel="icon" href="../assets/icon/logo-buseet.png">
    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Link Font -->
    <link rel="stylesheet" href="../assets/style/font.css">
    <!-- css code file -->
    <link rel="stylesheet" href="../assets/style/global.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../assets/style/ticket-selector.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../assets/style/component.css?v=<?= time() ?>" />

    <style>
      .ticket-selection-container {
        position: relative;
        min-height: 100%;
        padding-top: 6rem;
      }

      aside {
        width: fit-content;
        padding-top: 8rem;
        padding-bottom: 4rem;
        background-color: white;
        color: #000;
        position: absolute;
        top: 0;
        bottom: 0;
      }

      aside h6 {
        margin-top: 2rem;
        font-weight: 500;
      }

      aside .form-check {
        font-size: 0.85rem;
      }

      main {
        margin-bottom: 220px;
        margin-left: auto;
        margin-right: auto;
      }

      main h5 {
        padding-top: 1.7rem;
        font-weight: 500;
        font-size: 1.3rem;
      }

      main p {
        font-weight: 300;
        font-size: 0.9rem;
      }

      main .container-tiket {
        margin-top: 4rem;
      }

      main .card {
        position: relative;
      }

      main .container-tiket .btn {
        background-color: #203f66;
        height: 35px;
        color: #fff !important;
      }

      main .logo-bus {
        height: 4rem;
        background-color: #d9d9d9;
        line-height: 4rem;
        border-radius: 8px;
      }

      main .collapse-shadow {
        box-shadow: 0px 8px 6px -4px rgba(0, 0, 0, 0.2);
        margin-left: -1.699999rem;
        margin-right: -1.599999rem;
      }
      footer {
        margin-top: 0;
      }
    </style>
  </head>

  <body id="detail-jadwal">
    <!-- Navigation Bar Tag Start -->
    <?php include ('../includes/header.php'); ?>
    <!-- Navigation Bar Tag End -->

    <div class="d-flex relative ticket-selection-container jus">
      <!-- Main Content Start -->
      <main class="text-center pt-3">
        <h5 class="fw-semibold">Menampilkan Daftar Bus</h5>
        <p>dari Terminal Keberangkatan ke Terminal Tujuan</p>
        <div class="container-tiket mt-6">
          <!-- Card Tiket -->
          <?php while($row = mysqli_fetch_assoc($infoTicket)): ?>
          <?php
            $busID = $row["bus-id"];
            $_SESSION["routeID"] = $row["route-id"];

            // Query untuk menghitung jumlah total kursi dalam bus
            $totalSeatsQuery = mysqli_query($conn, "SELECT COUNT(*) AS totalSeats FROM kursi WHERE Id_bus='$busID'");
            $totalSeatsRow = mysqli_fetch_assoc($totalSeatsQuery);
            $totalSeats = $totalSeatsRow['totalSeats'];

            // Query untuk menghitung jumlah kursi yang telah dipesan
            $bookedSeatsQuery = mysqli_query($conn, "SELECT COUNT(*) AS bookedSeats
                                                    FROM tiket t
                                                    WHERE DATE(t.tanggal_keberangkatan) BETWEEN '$departDate' AND '$arrDate'
                                                    AND t.Id_bus = '$busID';
                                                    ");
            $bookedSeatsRow = mysqli_fetch_assoc($bookedSeatsQuery);
            $bookedSeats = $bookedSeatsRow['bookedSeats'];

            // Menghitung jumlah kursi yang tersedia
            $availableSeats = $totalSeats - $bookedSeats;
            ?>
          <div class="card mb-5 bg-light mx-auto text-black p-4" style="width: 60rem">
            <!-- Ticket Row Upper Start -->
            <div class="row d-flex">
              <div class="col-3">
                <div class="row d-flex align-items-center">
                  <div class="col-12 ms-0">
                    <p class="d-block fw-bold mb-0" style="font-size: 1.1rem"><?= $row["bus-name"] ?></p>
                    <p class="d-block mt-0 mb-0" style="font-size: 0.8rem"><?= $row["bus-type"] ?></p>
                    <input type="hidden" name="busID" Value="<?= $busID; ?>">
                  </div>
                </div>
              </div>
              <div class="col-4 d-flex justify-content-between align-items-center">
                <div class="col-4">
                  <p class="mb-0 fw-bold" style="font-size: 1rem"><?= $row["depTime"] ?></p>
                  <p class="mt-0" style="font-size: 0.6rem"><?= $row["depTerminal"] ?></p>
                </div>
                <div class="col-4 ms-2 me-2">
                  <p class="fw-semibold" style="font-size: 0.7rem"><?= $row["time-estimated"] ?></p>
                </div>
                <div class="col-4">
                  <p class="mb-0 fw-bold" style="font-size: 1rem"><?= $row["arrTime"] ?></p>
                  <p class="mt-0" style="font-size: 0.6rem"><?= $row["arrTerminal"] ?></p>
                </div>
              </div>
              <div class="col-3">
                <p class="mb-0" style="font-size: 0.8rem">Harga</p>
                <p class="fw-bold mt-0 ticket-prices" style="font-size: 1.2rem">Rp. <?= $row["price"] ?></p>
              </div>
              <div class="col-2">
                <img src="../assets/icon/ballot.svg" width="38px" alt="" />
                <p class="d-block mt-1" style="font-size: 0.75rem"><?= $availableSeats ?> kursi tersedia</p>
              </div>
            </div>
            <!-- Ticket Row Upper Start -->

            <!-- Ticket Row Downside Start -->
            <div class="row d-flex align-items-center mt-4 shadow-bottom">
              <div class="col-2">
                <i class="bi bi-person-standing"></i>
                <i class="bi bi-wifi"></i>
                <i class="bi bi-tv"></i>
                <i class="bi bi-outlet"></i>
                <i class="bi bi-dice-4"></i>
              </div>
              <div class="col-3 text-end">
                <div class="star-container d-inline">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                </div>
                <p class="d-inline ms-2">4.8</p>
              </div>
              <div class="col-2 text-start">
                <i class="bi bi-person-fill-check"></i>
                <p class="d-inline">99+</p>
              </div>
              <div class="col-5 ms-0">
                <div class="d-grid gap-2 col-12 mx-auto">
                  <!-- Collapse Ticket Seat Button end -->
                  <button class="btn btn-primary collapse-btn" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $row["route-id"] ?>" aria-expanded="true" aria-controls="<?= $row["route-id"] ?>"> Lihat Tempat Duduk </button>
                  <!-- Collapse Ticket Seat Button End -->
                </div>
              </div>
            </div>
            <!-- Ticket Row Downside End -->

            <!-- Collapse Item Start -->
            <form action="" class="ticket-selection-form">
              <div class="collapse mt-4 row w-100 p-0 position-relative" id="<?= $row["route-id"] ?>">
                <div class="w-75 mt-3 mb-4 tutorial-container ms-auto me-auto">
                  <p class="text-center font-12">Klik pilihan kursi yang tersedia kemudian lanjut ke bagian pembayaran</p>
                </div>
                <!-- Price List Selector End -->

                <!-- Bus Seat Selection Start -->
                <div class="ticket-container col-7">
                  <div class="seats">
                    <div id="seats" class="all-seats">
                      <?php
                        $seats = mysqli_query($conn, "SELECT * FROM kursi WHERE Id_bus='$busID';");

                        // Prepare an array to hold booked seat numbers
                        $bookedSeats = [];

                        // Query to get booked seat numbers from the tiket table
                        $bookedSeatsQuery = mysqli_query($conn, "SELECT t.Id_kursi 
                                                          FROM tiket t JOIN jadwal j ON t.Id_bus = j.Id_bus 
                                                          WHERE DATE(t.tanggal_keberangkatan) BETWEEN '$departDate' AND '$arrDate'
                                                            AND t.Id_bus = '$busID';
                                                        ");

                        // Fill the array with booked seat numbers
                        while ($bookedSeat = mysqli_fetch_assoc($bookedSeatsQuery)) {
                            $bookedSeats[] = $bookedSeat['Id_kursi'];
                        }

                        // Initialize counters for total seats and available seats
                        while ($seat = mysqli_fetch_assoc($seats)):
                            $totalSeats++; // Increment total seats counter
                            $seatID = $seat['Id_kursi'];
                            $bookedClass = in_array($seatID, $bookedSeats) ? 'booked' : '';
                            if (!$bookedClass) {
                                $availableSeats++; // Increment available seats counter if not booked
                            }
                      ?>
                            <input type="radio" name="<?= $seat["Id_bus"] ?>" id="<?= $seat["Id_bus"] ?><?= $seat["no_kursi"] ?>" class="d-none <?= $bookedClass ?>" data-id="<?= $seat["no_kursi"] ?>" <?= $bookedClass ? 'disabled' : '' ?> />
                            <label for="<?= $seat["Id_bus"] ?><?= $seat["no_kursi"] ?>" class="seat d-inline-block font-12 <?= $bookedClass ?>"><?= $seat["no_kursi"]; ?></label>
                      <?php endwhile; ?>
                    </div>
                    <ul class="status list-unstyled">
                      <li class="item">Available</li>
                      <li class="item">Booked</li>
                      <li class="item">Selected</li>
                    </ul>
                  </div>
                </div>
                <!-- Bus Seat Selection End -->

                <!-- Detail Ticket Booked Start -->
                <div class="col-5 border-1 rounded-2">
                  <div class="card text-start booking-detail-container">
                    <h5 style="font-size: 16px" class="fw-bold mb-4">Detail Tempat Duduk</h5>
                    <div class="card-content d-flex flex-column">
                      <div style="border-left: 1px dotted #000" class="position-relative card-section text-start depart-arrival-info ps-2">
                        <div class="position-absolute top-0 left-03 bg-dark border border-secondary rounded-circle" style="width: 10px; height: 10px"></div>
                        <div class="position-absolute bottom-0 left-03 bg-dark border border-secondary rounded-circle" style="width: 10px; height: 10px"></div>
                        <h6 class="fw-bold font-13">Keberangkatan</h6>
                        <div class="d-flex justify-content-between ms-3 mt-1">
                          <p class="d-block font-13 fw-semibold dep-terminal"><?= $row["depTerminal"] ?></p>
                          <p class="d-blcok fw-semibold dep-time"><?= $row["depTime"] ?></p>
                        </div>
                        <p class="ms-3 font-12 dep-location"><?= $row["departLocation"] ?></p>
                        <h6 class="fw-bold font-13 mt-3">Kedatangan</h6>
                      </div>
                      <div class="card-section text-start depart-arrival-info ps-2">
                        <div class="d-flex justify-content-between ms-3 mt-1">
                          <p class="d-block font-13 fw-semibold arr-terminal"><?= $row["arrTerminal"] ?></p>
                          <p class="d-blcok fw-semibold arr-time"><?= $row["arrTime"] ?></p>
                        </div>
                        <p class="ms-3 font-12 arr-location"><?= $row["arrLocation"] ?></p>
                      </div>
                      <div class="card-section d-flex justify-content-between mt-3 border-top border-bottom pt-3 align-content-center">
                        <h6 class="font-13 fw-semibold">Nomor Tempat Duduk</h6>
                        <p class="seat-number fw-semibold"></p>
                      </div>
                      <div class="card-section mt-3">
                        <h6 class="font-13 fw-semibold">Detail Harga</h6>
                        <div class="d-flex justify-content-between">
                          <p>Jumlah</p>
                          <p class="fw-semibold price">Rp.<?= $row["price"] ?></p>
                        </div>
                      </div>
                    </div>
                    <a role="button" class="btn btn-lg font-13 next-btn" aria-label="Lanjutkan Pemesanan">Lanjutkan</a>
                  </div>
                </div>
                <!-- Detail Ticket Booked Start -->
              </div>
            </form>
            <!-- Collapse Item End -->
          </div>
          <?php endwhile; ?>
          <!-- End Card Tiket -->
        </div>
      </main>
      <!-- Main Content End -->
    </div>

    <?php  include '../includes/footer.php' ?>

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- javascript code file -->
    <script src="../assets/js/ticket-selector.js?v=<?= time() ?>"></script>
    <script src="../assets/js/function.js?v=<?= time() ?>"></script>
    <script src="../assets/js/jquery-3.7.1.min.js?v=<?=time()?>"></script>

    <!-- JavaScript Function Call -->
    <script>
      navbarResponsive();

      $(document).ready(function(event) {
        document.querySelectorAll('input[type="radio"]').forEach((radioButton) => {
          radioButton.addEventListener('change', (event) => {
            // Parent Element for Card Ticket
            let seatSection = event.target.closest('.card');

            // Get Element for Fill With Seat Number from Radio Value
            let bussSeatNumber = seatSection.querySelector(".seat-number");
            let busID = seatSection.querySelector('input[name="busID"]');

            // Get Price Element 
            let priceElement = seatSection.querySelector(".price");
            let price = priceElement.textContent.replace(/\D/g, ''); 

            // Get Departure Information Element
            let departTerminalElement = seatSection.querySelector(".dep-terminal");
            let departTimeElement = seatSection.querySelector(".dep-time");
            let departLocationElement = seatSection.querySelector(".dep-location");
            
            // Get Arrival Information Element
            let arrTerminalElement = seatSection.querySelector(".arr-terminal");
            let arrTimeElement = seatSection.querySelector(".arr-time");
            let arrLocationElement = seatSection.querySelector(".arr-location");

            // Set sessionStorage Data From Each Element
            sessionStorage.setItem("busID", busID.value);
            sessionStorage.setItem("ticketPrice", price);
            sessionStorage.setItem("departureTerminal", departTerminalElement.textContent);
            sessionStorage.setItem("departureTime", departTimeElement.textContent);
            sessionStorage.setItem("departureLocation", departLocationElement.textContent);
            sessionStorage.setItem("arrivalTerminal", arrTerminalElement.textContent);
            sessionStorage.setItem("arrivalTime", arrTimeElement.textContent);
            sessionStorage.setItem("arrivalLocation", arrLocationElement.textContent);

            if (event.target.checked) {
              bussSeatNumber.textContent = event.target.nextElementSibling.innerHTML;
              sessionStorage.setItem("bussSeatNumber", bussSeatNumber.textContent);
            }
          });
        });
      });

      // Collapse Button Controller
      document.addEventListener("DOMContentLoaded", function () {
        // Taing All of 'collapse-btn' class
        let collapseButtons = document.querySelectorAll(".collapse-btn");

        // iterate through each button
        collapseButtons.forEach(function (button) {
          // Add event listener for 'click' event for each button
          button.addEventListener("click", function () {
            // Mengecek apakah collapse terbuka atau tertutup
            let isExpanded = this.getAttribute("aria-expanded") === "true";

            // Changes text button besides collapse status
            this.textContent = isExpanded ? "Sembunyikan Tempat Duduk" : "Lihat Tempat Duduk";
          });
        });
      });

      document.addEventListener("DOMContentLoaded", () => {
        const nextButtons = document.querySelectorAll(".next-btn");

        // Menambahkan event listener ke setiap tombol
        nextButtons.forEach((button) => {
          button.addEventListener("click", (event) => {
            // Check whether a seat number has been selected
            let bussSeatNumber = sessionStorage.getItem("bussSeatNumber");

            if (!bussSeatNumber) {
              // If no seat number is selected, displays an error message and prevents navigation
              alert("Silakan pilih nomor tempat duduk sebelum melanjutkan.");
              event.preventDefault();
            } else {
              // If a seat number has been selected, continue to the next page
              event.preventDefault();
              window.location.href = "indentity-form.php";
            }
          });
        });
      });
    </script>
  </body>
</html>
