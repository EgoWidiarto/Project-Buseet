<?php
session_start();
require_once '../includes/connection.php';
require_once '../includes/function.php';

$orderNumber =  $_SESSION["order-number"];
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

    <!-- Midtrans -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-OBkhNGvbZWqq07CC"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <style>
      .booking-detail-container input {
        color: #203f66;
      }

      .pay-page-btn,
      .pay-method-btn {
        background-color: #203f66;
        color: #fff;
      }

      .pay-method-btn {
        width: 25%;
      }

      .pay-page-btn:hover,
      .pay-method-btn:hover {
        background-color: #2b61a3;
        color: #fff;
      }

      .pay-price-mb {
        margin-bottom: -1rem;
      }
    </style>
  </head>
  <body>
    <!-- Navigation Bar Tag Start -->
    <?php include '../includes/header.php'; ?>
    <!-- Navigation Bar Tag End -->

    <div class="d-flex flex-row justify-conten-around content-navbar-plus">
      <!-- Main Content Start -->
      <main class="text-center pt-3 ms-auto me-auto">
        <h5 class="fw-semibold">Menampilkan Detail Pemesanan</h5>
        <!-- Form User Identity Start -->
        <form action="" method="post" id="booking-detail-form">
          <div class="mt-4 mb-5 bg-light m-auto text-black p-4 rounded" style="width: 55rem; color: #203f66 !important">
            <div class="d-flex justify-content-between">
              <h6 class="text-start d-block fw-bold font-15">Detail Pemesanan</h6>
              <h6 class="text-end d-block fw-bold font-15 no-pemesanan"><?= $orderNumber ?></h6>
              <input type="hidden" id="routeID" name="order-number" value="<?= $orderNumber ?>">
              <input type="hidden" id="routeID" name="routeID" value="">
            </div>
            <div class="form-identity-container text-start mt-3 gap-0 font-color-primary ps-3 pe-3">
              <!--Full Name -->
              <div class="mb-2">
                <label for="staticName" class="form-label fw-semibold mb-0 no-outline">Nama</label>
                <div class="col-sm-10 mt-0">
                  <input type="text" readonly class="form-control-plaintext no-outline" id="staticName" name="fullName" value="" />
                </div>
              </div>

              <div class="mb-2">
                <div class="col-sm-10 d-flex justify-content-around mt-0">
                  <div class="col-5">
                    <!-- Identity Type -->
                    <label for="staticIdentity" class="form-label fw-semibold mb-0 no-outline id-type"></label>
                    <input type="hidden" name="identityType" value="">
                    <input type="text" readonly class="form-control-plaintext no-outline" id="staticIdentity" name="identityNumber" value="" />
                  </div>

                  <div class="col-3">
                    <!-- Ages -->
                    <label for="staticAge" class="form-label fw-semibold mb-0">Umur</label>
                    <input type="text" readonly class="form-control-plaintext no-outline mt-0" id="staticAge" name="age" value="" />
                  </div>

                  <div>
                    <!-- Contact -->
                    <label for="staticContact" class="form-label fw-semibold mb-0 no-outline">Kontak</label>
                    <input type="text" class="form-control-plaintext no-outline" id="staticContact" name="contact" value="" />
                  </div>
                </div>
              </div>
            </div>
            <div class="rounded-2 mt-3">
              <div class="text-start booking-detail-container">
                <h5 style="font-size: 15px" class="fw-bold mb-4">Detail Tempat Duduk</h5>
                <!-- Detail Tempat Duduk -->
                <div class="card-content d-flex flex-column">
                  <div style="border-left: 1px dotted #000" class="position-relative card-section text-start depart-arrival-info ps-2">
                    <div class="position-absolute top-0 left-03 bg-dark border border-secondary rounded-circle" style="width: 10px; height: 10px"></div>
                    <div class="position-absolute bottom-0 left-03 bg-dark border border-secondary rounded-circle" style="width: 10px; height: 10px"></div>
                    <!-- Detail Keberangkatan -->
                    <h6 class="fw-bold font-13">Keberangkatan</h6>
                    <div class="d-flex justify-content-between ms-3 mt-1">
                      <p class="d-block font-13 fw-semibold dep-terminal"></p>
                      <p class="d-blcok fw-semibold font-13 dep-time"></p>
                    </div>
                    <p class="ms-3 font-12 dep-location"></p>
                    <h6 class="fw-bold font-13 mt-3">Kedatangan</h6>
                  </div>
                  <!-- Detail Kedatangan -->
                  <div class="card-section text-start depart-arrival-info ps-2">
                    <div class="d-flex justify-content-between ms-3 mt-1">
                      <p class="d-block font-13 fw-semibold arr-terminal"></p>
                      <p class="d-blcok fw-semibold font-13 arr-time"></p>
                    </div>
                    <p class="ms-3 font-12 arr-location"></p>
                  </div>
                  <!-- Seat Number detail -->
                  <!-- use class .seat-number to full fill bus seat number -->
                  <div class="card-section d-flex justify-content-between mt-3 border-top pt-3 align-content-center">
                    <h6 class="font-13 fw-semibold">Nomor Tempat Duduk</h6>
                    <p class="seat-number"></p>
                    <input type="hidden" name="seatNumber" value="" />
                    <input type="hidden" name="busIDbus" value="" />
                  </div>
                  <!-- Detail Harga -->
                  <div class="card-section mt-3 border-top pt-3">
                    <h6 class="font-13 fw-semibold">Detail Harga</h6>
                    <div class="d-flex justify-content-between" style="margin-bottom: -1rem">
                      <p class="mb-0 font-12">Harga E-Tiket</p>
                      <p class="fw-semibold font-13 price"></p>
                      <input class="d-none" type="hidden" name="totalPrice" value="" />
                    </div>
                  </div>
                </div>
                <div class="text-center mt-5">
                  <a role="button" class="btn btn-lg font-13 pay-page-btn w-50 text-center">Bayar Sekarang</a>
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

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time() ?>"></script>
    <script src="../assets/js/ticket-selector.js?v=<?= time() ?>"></script>
    <script>
      navbarResponsive();

      // Fill Identity Ticket
      document.addEventListener("DOMContentLoaded", function () {
        // Memeriksa apakah ada data yang tersimpan di sessionStorage
        let storedData = sessionStorage.getItem("formData");

        if (storedData) {
          // Mengurai data yang tersimpan dan mengisinya ke dalam formulir
          let formData = JSON.parse(storedData);

          document.getElementById("staticName").value = formData.fullName;
          document.querySelector(".id-type").textContent = formData.identityType;
          document.querySelector('input[name="identityType"]').value = formData.identityType;
          document.getElementById("staticIdentity").value = formData.identityNumber;
          document.getElementById("staticAge").value = formData.age;
          document.getElementById("staticContact").value = formData.contact;
        }
      });

      // Fil Seat Number
      document.addEventListener("DOMContentLoaded", () => {
        // Take seat number from sessionStorage
        let bussSeatNumber = sessionStorage.getItem("bussSeatNumber");

        // Find element .seat-number on detail-ticket.html page
        let seatNumberElement = document.querySelector(".seat-number");
        let seatNumberValue = document.querySelector('input[name="seatNumber"]');
        let busIDElement = document.querySelector('input[name="busIDbus"]');
        let routeIDElement = document.querySelector('input[name="routeID"]');

        // Ticket Price Item
        let ticketPrice = sessionStorage.getItem("ticketPrice");
        let price = document.querySelector(".price");
        let inputPrice = document.querySelector('input[name="totalPrice"]')

        // Adding Price Item
        price.textContent = "Rp." + ticketPrice;
        inputPrice.value = ticketPrice;

        // Find Element Departure dan Arrival
        let departTerminalElement = document.querySelector(".dep-terminal");
        let departTimeElement = document.querySelector(".dep-time");
        let departLocationElement = document.querySelector(".dep-location");
        let arrTerminalElement = document.querySelector(".arr-terminal");
        let arrTimeElement = document.querySelector(".arr-time");
        let arrLocationElement = document.querySelector(".arr-location");

        // Find item Departure and Arrival
        let busID = sessionStorage.getItem("busID");
        let routeID = sessionStorage.getItem("routeID");
        let departureTerminal = sessionStorage.getItem("departureTerminal");
        let departureTime = sessionStorage.getItem("departureTime");
        let departureLocation = sessionStorage.getItem("departureLocation");
        let arrivalTerminal = sessionStorage.getItem("arrivalTerminal");
        let arrivalTime = sessionStorage.getItem("arrivalTime");
        let arrivalLocation = sessionStorage.getItem("arrivalLocation");

        // Adding Item To HTML Element
        busIDElement.value = busID;
        routeIDElement.value = routeID;
        departTerminalElement.textContent = departureTerminal;
        departTimeElement.textContent = departureTime;
        departLocationElement.textContent = departureLocation;
        arrTerminalElement.textContent = arrivalTerminal;
        arrTimeElement.textContent = arrivalTime;
        arrLocationElement.textContent = arrivalLocation;

        // input seat number onto .seat-number element in detail-ticket.html page
        if (seatNumberElement && bussSeatNumber) {
          seatNumberElement.textContent = bussSeatNumber;
          seatNumberValue.value = bussSeatNumber;
        }
      });
      
      document.querySelector(".pay-page-btn").addEventListener("click", async function () {
        const formData = new FormData();
        formData.append("totalPrice", document.querySelector('[name="totalPrice"]').value);
        formData.append("fullName", document.querySelector('[name="fullName"]').value);
        formData.append("contact", document.querySelector('[name="contact"]').value);
        formData.append("orderNumber", '<?= $orderNumber ?>');

        try {
          const RESPONSE = await fetch("../lib/payment-sdk/payment.php", {
            method: "POST",
            body: formData,
          });

          if (!RESPONSE.ok) throw new Error('Server responded with an error');
          const TOKEN = await RESPONSE.text();

          if (!TOKEN) throw new Error('Token is not received from the server');

          window.snap.pay(TOKEN, {
            onSuccess: function(result){
              // Redirect atau update UI
              let form = document.getElementById('booking-detail-form');
              form.action = '../config/update-pay-status.php';
              form.submit();
              sessionStorage.removeItem("orderId");
            },
            onError: function(result){
              // Terjadi kesalahan, tangani sesuai kebutuhan
              console.error(result);
              alert("payment failed!");
              sessionStorage.removeItem("orderId");
              window.location.href = '../pages/bus-search.php';
            },
            onClose: function(){
              // Pengguna menutup Snap Window tanpa menyelesaikan pembayaran
              alert('Kamu Belum Menyelesaikan Pembayaran');
              sessionStorage.removeItem("orderId");
            }
          });
        } catch (err) {
          console.error('Error:', err);
          alert('Terjadi kesalahan, silakan coba lagi.');
        }
      });
    </script>
  </body>
</html>
