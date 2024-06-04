<?php
session_start();
require_once '../includes/connection.php';

$userID = $_SESSION["user_id"];

$users = mysqli_query($conn, "SELECT * FROM pengguna WHERE Id_pengguna = '$userID';");
$user = mysqli_fetch_assoc($users);

// Identity
$fullName = $user["nama_lengkap"];
$identityNumber = $user["nomor_identitas"];
$contact = $user["nomor_hp"];
$identityType = $user["tipe_identitas"];
// AGES
$bornDate = new DateTime($user["tgl_lahir"]);
$nowTime = new DateTime();
$deferend = $nowTime->diff($bornDate);
$age = $deferend->y; 
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
    <link rel="stylesheet" href="../assets/style/font.css">
    <!-- css code file -->
    <link rel="stylesheet" href="../assets/style/global.css" />
    <link rel="stylesheet" href="../assets/style/ticket-selector.css" />
    <link rel="stylesheet" href="../assets/style/component.css" />

    <!-- Infile Style -->
    <style>
      .next-page-btn:hover {
        background-color: #2b61a3;
      }

      main {
        margin-top: 7.5rem;
      }
    </style>
  </head>
  <body id="detail-jadwal">
    <!-- Navigation Bar Tag Start -->
    <?php include('../includes/header.php') ?>
    <!-- Navigation Bar Tag End -->

    <div class="d-flex flex-row justify-conten-around">
      <!-- Main Content Start -->
      <main class="text-center pt-3 ms-auto me-auto">
        <h5 class="fw-semibold">Masukkan Data Diri Penumpang</h5>
        <!-- Form User Identity Start -->
        <form action="" method="post" class="input-form-ident">
          <div class="mt-4 mb-5 bg-light m-auto text-black p-4 rounded" style="width: 60rem">
            <div class="booking-detail-container mt-1 row w-100 p-0 position-relative">
              <h6 class="text-start fw-bold font-16">Penumpang</h6>
              <!-- Card Button Identity Start -->
              <div class="card card-btn position-relative">
                <div class="card-body text-start p-0">
                  <i class="bi bi-pencil-square"></i>
                  <h6 class="identity-number fw-semibold font-13 mb-0"><?= $user["nomor_identitas"]; ?></h6>
                  <p class="mt-0"><?= $user["nama_lengkap"]; ?></p>
                </div>
              </div>
              <!-- Card Button Identity End -->
              <!-- Identity Form Start -->
              <div class="form-identity-container text-start mt-3 gap-0 font-13">
                <!--Full Name Input -->
                <div class="mb-3">
                  <label for="full-name" class="form-label fw-semibold">Nama</label>
                  <input type="text" class="form-control p-1" id="full-name" placeholder="Masukkan Nama" name="fullName" required />
                </div>

                <!-- Identity Id Input -->
                <div class="mb-3">
                  <label for="identity" class="form-label fw-semibold">Pilih Tipe Identitas</label>
                  <div class="row d-flex justify-content-around">
                    <div class="col-4">
                      <select class="form-select p-1" aria-label="Default select example" name="identityType" id="identity-type" required>
                        <option selected>Pilih Tipe</option>
                        <option value="KTP">KTP</option>
                        <option value="Passport">Passport</option>
                        <option value="VISA">VISA</option>
                      </select>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control col-8 p-1" id="identity" name="identityNumber" placeholder="Masukkan Nomor Identitas" required>
                    </div>
                  </div>
                </div>

                <!-- Age Input -->
                <div class="mb-3">
                  <label for="age" class="form-label fw-semibold">Umur</label>
                  <input type="text" class="form-control p-1" id="age" name="age" placeholder="Masukkan Usia" required >
                </div>

                <!-- Contact Input -->
                <div class="mb-4">
                  <label for="contact" class="form-label fw-semibold">Kontak</label>
                  <input type="text" class="form-control p-1" id="contact" name="contact" placeholder="Masukkan Nomor Yang Dapat Dihubingi" required />
                </div>
                <div class="text-center">
                  <a class="btn btn-lg font-13 next-page-btn w-50">Lihat Detail Ticket</a>
                </div>
              </div>
              <!-- Identity Form Start -->
            </div>
            <!-- Collapse Item End -->
          </div>
          <input type="hidden" name="seatNumber">
          <input type="hidden" name="busIDbus">
          <input type="hidden" name="routeID">
          <input type="hidden" name="totalPrice">
        </form>
        <!-- Form User Identity Tiket -->
      </main>
      <!-- Main Content End -->
    </div>

    <!-- Identity Form Footer -->
    <?php include('../includes/footer.php') ?>

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- javascript code file -->
    <script src="../assets/js/ticket-selector.js?v=<?= time() ?>"></script>
    <script src="../assets/js/function.js?v=<?= time() ?>"></script>
    <script>
      navbarResponsive();
      // EventListener for fill Identity Form

      const USER_IDENTITY = {
        fullName: '<?= $fullName; ?>',
        identityNumber : '<?= $identityNumber; ?>',
        age: '<?= $age; ?>',
        contact: '<?= $contact; ?>',
        identityType: '<?= $identityType ?>',
      }

      let fullName = document.getElementById("full-name");
      let identityNumber = document.getElementById("identity");
      let age = document.getElementById("age");
      let contact = document.getElementById("contact");

      document.querySelector(".card.card-btn").addEventListener("click", function fillIdentityForm() {
        fullName.value = USER_IDENTITY.fullName;
        identityNumber.value = USER_IDENTITY.identityNumber;
        age.value = USER_IDENTITY.age;
        contact.value = USER_IDENTITY.contact;

        // Menemukan dan memilih opsi KTP di tag <select>
        let selectElement = document.getElementById("identity-type");
        for (var i = 0; i < selectElement.options.length; i++) {
          if (selectElement.options[i].text === USER_IDENTITY.identityType) {
            selectElement.selectedIndex = i;
            break;
          }
        }
      });

      document.addEventListener("DOMContentLoaded", () => {
        // Take seat number from sessionStorage
        let bussSeatNumber = sessionStorage.getItem("bussSeatNumber");

        // Find element .seat-number on detail-ticket.html page
        let seatNumberValue = document.querySelector('input[name="seatNumber"]');
        let busIDElement = document.querySelector('input[name="busIDbus"]');
        let routeIDElement = document.querySelector('input[name="routeID"]');

        // Ticket Price Item
        let ticketPrice = sessionStorage.getItem("ticketPrice");
        let inputPrice = document.querySelector('input[name="totalPrice"]')

        // Adding Price Item
        inputPrice.value = ticketPrice;

        // Find Element Departure dan Arrival

        // Find item Departure and Arrival
        let busID = sessionStorage.getItem("busID");
        let routeID = sessionStorage.getItem("routeID");

        // Adding Item To HTML Element
        busIDElement.value = busID;
        routeIDElement.value = routeID;
        seatNumberValue.value = bussSeatNumber;
      });
      

      // Capture Form Value
      document.querySelector(".next-page-btn").addEventListener("click", function () {
        function escapeSQLString(str) {
          return str.replace(/[\\'"]/g, '\\$&');
        }

        let fullNameEscape = escapeSQLString(fullName.value);
        let identityNumberEscape = escapeSQLString(identityNumber.value);
        let ageEscape = escapeSQLString(age.value);
        let contactEscape = escapeSQLString(contact.value);

        // Mengumpulkan data dari input
        let data = {
          fullName: fullNameEscape,
          identityType: document.getElementById("identity-type").value,
          identityNumber: identityNumberEscape,
          age: ageEscape,
          contact: contactEscape,
        }; 

        // Menyimpan data ke sessionStorage
        sessionStorage.setItem("formData", JSON.stringify(data));

        if(!fullNameEscape || !identityNumberEscape || !ageEscape || !contactEscape) {
          alert("Harap Isi Data Diri Terlebih Dahulu")
        } else {
          // Redirect ke halaman detail-ticket.html
          let form = document.querySelector(".input-form-ident");
          form.action = '../config/ticket-validation.php';
          form.submit();
        }
      });
    </script>
  </body>
</html>
