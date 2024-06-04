<?php
session_start();
require_once '../includes/connection.php';
require_once '../includes/function.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title> BUSEET - ADMIN </title>
    <link rel="icon" type="image/png" href="../assets/icon/logo-buseet.png">
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
    .form-control,
    .form-select {
        padding: .4rem !important;
        background-color: #ececec;
        border: none;
      }

    .cta-btn {
        background-color: #203f66;
        color: #fff;
        border: 1px solid #203f66;
    }
    
    .cta-btn:hover {
        background-color: transparent;
        border: 1px solid #203f66;
        color: #000;
    }

    .cancel-btn:active {
        color: red !important;
    }
    </style>
  </head>

  <body id="profile">
    <!-- Navigation Bar Tag Start -->
    <?php include '../includes/admin-header.php'; ?>
    <!-- Navigation Bar Tag End -->

    <!-- profile start -->
    <section class="profile-s w-100 d-flex justify-content-center p-3">
      <form action="" method="post" class="mx-auto add-bus-form">
        <input type="hidden" name="routeID" value="<?= $routeID ?>">
        <div class="mt-4 mb-5 bg-light mx-auto text-black p-4 rounded" style="width: 55rem">
          <div class="booking-detail-container mt-3 row w-100 p-0 position-relative">
            <h6 class="text-start fw-bold font-16">Tambah Bus Baru</h6>
            <!-- Identity Form Start -->
            <div class="form-identity-container text-start mt-3 gap-0 font-13">
              <!--Full Name Input -->
              <div class="mb-3">
                <div class="row d-flex justify-content-around">
                  <div class="col-7 mt-2">
                    <label for="bus-name">Nama Bus</label>
                    <input type="text" class="form-control col-8 p-1 font-14" id="bus-name" name="bus-name" placeholder="Masukkan Nama Bus" value=""/>
                    <p id="input-bus-error" class="font-12 fw-semibold" style="color: #FF0060;"></p>
                  </div>
                  <div class="col-5 mt-1">
                    <label for="bus-type">Tipe Bus</label>
                    <select name="bus-type" class="form-select p-1 mt-1 font-14" aria-label="Default select example" id="bus-type">
                      <option class="font-13" selected>Pilih Tipe Bus</option>
                      <option class="font-13" value="Ekonomi AC">Ekonomi AC</option>
                      <option class="font-13" value="Patas">Patas</option>
                      <option class="font-13" value="Ekonomi Non AC">Ekonomi Non AC</option>
                      <option class="font-13" value="Bisnis/VIP">Bisnis/VIP</option>
                      <option class="font-13" value="Eksekutif">Eksekutif</option>
                      <option class="font-13" value="Super Eksekutif">Super Eksekutif</option>
                      <option class="font-13" value="Suites">Suites</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- Identity Id Input -->
              <div class="mb-3">
                <div class="col-6 mt-1">
                  <label for="capacity">Kapasitas Bus</label>
                  <input type="text" class="form-control col-8 p-1 font-14" id="capacity" name="capacity" placeholder="Masukkan Kapasitas" value=""/>
                  <p id="input-capacity-error" class="font-12 fw-semibold" style="color: #FF0060;"></p>
                </div>
              </div>
            </div>
            <div class="text-end mb-3 mt-5 col-12">
              <a href="bus-search.php" class="text-decoration-none text-danger me-3 fw-semibold">Kembali</a>
              <a role="button" class="btn btn-lg font-13 cta-btn w-25" name="edit">Tambah Bus</a>
            </div>
            <!-- Identity Form Start -->
          </div>
          <!-- Collapse Item End -->
        </div>
      </form>
      <!-- Form User Identity Tiket -->
    </section>

    <!-- profile end -->

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz " crossorigin="anonymous "></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time() ?>"></script>
      
    <script>
      function validateBusName() {
        const busNameInput = document.getElementById('bus-name').value;
        const inputError = document.querySelector("#input-bus-error");
        const hurufRegex = /^[a-zA-Z\s]+$/;

        if (hurufRegex.test(busNameInput)) {
          inputError.innerHTML = '';
        } else {
          inputError.innerHTML = 'Nama Bus Yang Dimasukkan Harus Berupa Huruf';
        }
      }

      // Fungsi untuk memeriksa apakah input adalah integer (angka)
      function validateCapacity() {
        const capacityInput = document.getElementById('capacity').value;
        const inputError = document.querySelector("#input-capacity-error");
        const angkaRegex = /^[0-9]+$/;

        if (angkaRegex.test(capacityInput)) {
          inputError.innerHTML = '';
        } else {
          inputError.innerHTML = 'Kapasitas Yang Dimasukkan Harus Berupa Angka';
        }
      }

      document.querySelector('#bus-name').addEventListener('keyup', validateBusName);
      document.querySelector('#capacity').addEventListener('keyup', validateCapacity);

      document.querySelector(".cta-btn").addEventListener("click", function() {
        let form =document.querySelector(".add-bus-form");
        form.action = '../config/admin-bus-add.php';
        form.submit();
      })
    </script>
  </body>
</html>
<?php
if (isset($_SESSION["insert-message"])) {
  $msg = $_SESSION["insert-message"];
  echo "<script>alert('$msg')</script>";
  unset($_SESSION["insert-message"]);
}
?>