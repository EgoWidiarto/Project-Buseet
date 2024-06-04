<?php
session_start();

require_once '../includes/connection.php';
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
    <!-- Link Font -->
    <link rel="stylesheet" href="../assets/style/font.css">
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="../lib/AOS/node_modules/aos/dist/aos.css">
    <!-- css code file -->
    <link rel="stylesheet" href="../assets/style/global.css?v=<?= time() ?>" />

    <style>
        .hero-section {
          padding-top: 8rem !important;
        }

        .hero-section .btn {
          width: 315px;
          height: 58px;
          border-radius: 30px;
          font-weight: 500;
        }

        .hero-section p {
          text-align: center;
          font-family: "Poppins", sans-serif;
        }

        .hero-section .paragraf {
          font-size: 14px;
          font-weight: 300;
        }
    </style>
  </head>

  <body>
    <!-- Navigation Bar Tag Start -->
    <?php include("../includes/admin-header.php"); ?>
    <!-- Navigation Bar Tag End -->

    <!-- Image Header -->  
    <img src="../assets/images/bus-banner.png" alt="Background Bus" class="bus-img" />
    <div class="p-3 text-center" style="margin-top: -200px;">
        <p class="fw-bold text-stroke" style="font-size: 35px;">Selamat Datang di Buseet!!</p>
    </div>
    <div class="container p-5 w-full" style="margin-top: 100px;">
        <p class="fw-bold" style="font-size: 25px;">Menu Utama</p>
    </div>
    <div class="d-flex justify-content-center container w-full">
      <div class="bg-light mx-auto p-3 rounded text-center card-btn" style="width: 30rem">
        <img src="../assets/icon/adm-jadwal.png" width="120px"/>
        <div class="booking-detail-container mt-2 row w-15 p-0 position-relative">
          <p class="p-2 fw-bold text-center" style="color: #203B66">Jadwal</p>
        </div>
      </div>
      <div class="bg-light mx-auto p-3 rounded text-center card-btn" style="width: 30rem">
        <img src="../assets/icon/adm-ticket.png" width="135px"/>
        <div class="booking-detail-container mt-2 row w-15 p-0 position-relative">
          <p class="p-2 fw-bold text-center" style="color: #203B66">Tiket</p>
        </div>
      </div>
    </div>

    <div class="d-flex mt-3 p-5 justify-content-center container w-full">
      <div class="bg-light p-3 rounded text-center card-btn" style="width: 15rem; display: flex; align-items: center; margin: 30px">
        <img src="../assets/icon/adm-sopir.png" width="95px" alt="Sopir Icon" />
        <p class="p-2 fw-bold" style="color: #203B66; margin-left: 20px; margin-top: 20px">Sopir</p>
      </div>
      <div class="bg-light p-3 rounded text-center card-btn" style="width: 15rem; display: flex; align-items: center; margin: 30px">
        <img src="../assets/icon/adm-bus.png" width="80px" alt="Sopir Icon" />
        <p class="p-2 fw-bold" style="color: #203B66; margin-left: 20px; margin-top: 20px">Bus</p>
      </div>
      <div class="bg-light p-3 rounded text-center card-btn" style="width: 15.5rem; display: flex; align-items: center;margin: 30px">
        <img src="../assets/icon/adm-terminal.png" width="140px" alt="Sopir Icon" style="padding: 2px;" />
        <p class="p-2 fw-bold" style="color: #203B66; margin-left: 20px; margin-top: 20px">Terminal</p>
      </div>
    </div>
    <?php include ("../includes/footer.php"); ?>

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- AOS Animation JS -->
    <script src="../lib/AOS/node_modules/aos/dist/aos.js?v=<?= time(); ?>"></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time(); ?>"></script>
    <script>
        // Responsive NavBer
        navbarResponsive();

        let buttons = document.querySelectorAll(".card-btn");
        buttons.forEach((button) => {
          button.addEventListener("click", () => {
            if(button.querySelector("p").innerHTML == "Jadwal") {
              window.location.href = 'schedule-search.php';
            } else if(button.querySelector("p").innerHTML == "Tiket") {
              window.location.href = 'validasi-ticket.php';
            } else if(button.querySelector("p").innerHTML == "Sopir") {
              window.location.href = 'driver-search.php';
            } else if(button.querySelector("p").innerHTML == "Bus") {
              window.location.href = 'bus-search.php';
            } else {
              window.location.href = 'terminal-search.php';
            }
          })
        })
    </script>
  </body>
</html>
<?php
if (isset($_SESSION["cancel-message"])) {
  $msg = $_SESSION["cancel-message"];
  echo "<script>alert('$msg')</script>";
  unset($_SESSION["cancel-message"]);
}
?>