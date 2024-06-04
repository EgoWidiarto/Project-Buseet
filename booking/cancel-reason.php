<?php
session_start();
require_once '../includes/connection.php';

$ticketID = $_SESSION["ticket-code"];

$refundItemQuery = mysqli_query($conn, "SELECT 
    pm.Id_pemesanan AS 'order-id',
    pb.total_bayar AS 'total-pay'
    FROM pemesanan pm
    JOIN pembayaran pb ON pm.Id_pemesanan = pb.Id_pemesanan
    WHERE pm.Id_tiket = '$ticketID';
");

$refundItem = mysqli_fetch_assoc($refundItemQuery);
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

      .reason-choice .col-5.form-check,
      .reason-choice textarea {
        border: 1px solid #bebebe;
        border-radius: 10px;
      }

      .reason-choice .col-5.form-check {
        cursor: pointer;
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
        <div class="mt-4 mb-5 bg-light m-auto text-black p-4 rounded" style="width: 55rem; color: #203f66 !important">
          <div class="rounded-2 mt-3">
            <div class="row text-start mb-5 mt-2 mx-2">
              <div class="card-section mt-2 text-start">
                <h6 class="fw-semibold py-3">Alasan Pembatalan Tiket</h6>
                <form action="" method="post" class="cansel-reason-form">
                  <!-- checkbox alasan batal tiket -->
                  <input type="hidden" name="orderId" value="<?= $refundItem["order-id"] ?>">
                  <input type="hidden" name="totalAmount" value="<?= $refundItem["total-pay"] ?>">
                  <div class="row mb-5 reason-choice" style="font-weight: 500">
                    <div class="col-5 form-check font-14 mx-4 mb-2 px-5 py-3">
                      <input class="form-check-input" type="radio" name="cancel-reason" value="Ingin mengubah jadwal perjalanan" id="changeDestination" />
                      <label class="form-check-label font-13" for="changeDestination"> Ingin mengubah jadwal perjalanan </label>
                    </div>

                    <div class="col-5 form-check font-14 mx-4 mb-2 px-5 py-3">
                      <input class="form-check-input" type="radio" name="cancel-reason" value="Agenda dibatalkan" id="canceled" />
                      <label class="form-check-label font-13" for="canceled"> Agenda dibatalkan </label>
                    </div>
                    <div class="col-5 form-check font-14 mx-4 mb-2 px-5 py-3">
                      <input class="form-check-input" type="radio" name="cancel-reason" value="Ingin mengganti bus" id="changeBus" />
                      <label class="form-check-label font-13" for="changeBus"> Ingin mengganti bus </label>
                    </div>

                    <div class="col-5 form-check font-14 mx-4 mb-2 px-5 py-3">
                      <input class="form-check-input" type="radio" name="cancel-reason" value="arga kurang bersahabat" id="priceToHigh" />
                      <label class="form-check-label font-13" for="priceToHigh"> Harga kurang bersahabat </label>
                    </div>

                    <div class="col-5 form-check font-14 mx-4 mb-2 px-5 py-3">
                      <input class="form-check-input" type="radio" name="cancel-reason" value="Tidak ingin memberitahu alasan" id="secretReason" />
                      <label class="form-check-label font-13" for="secretReason"> Tidak ingin memberitahu alasan </label>
                    </div>

                    <div class="col-5 form-check font-14 mx-4 mb-2 px-5 py-3">
                      <input class="form-check-input" type="radio" name="cancel-reason" value="" id="another-reason-button" />
                      <label class="form-check-label font-13" for="another-reason-button"> Lainnya </label>
                    </div>
                    <div class="d-flex justify-content-end mt-2" style="padding-right: 4rem">
                      <textarea class="rounded font-12 p-2" name="another-reason-text" id="another-reason-text" cols="51" rows="2" placeholder="Masukkan Alasan Lainnya" style="display: none"></textarea>
                    </div>
                  </div>
                  <!-- tombol batal tiket -->
                  <div class="col-12 text-end pe-5">
                    <button type="submit" class="btn px-5 batal-btn" id="submitButton" disabled style="background-color: gray; color: white">Batalkan Tiket</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- Main Content End -->
    </div>

    <!-- Cancel Reason Footer -->
    <?php include '../includes/footer.php' ?>
    <!-- Cancel Reason Footer -->

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time() ?>"></script>
    <script src="../assets/js/jquery-3.7.1.min.js?v=<?= time() ?>"></script>

    <script>
    navbarResponsive();

      // Change Button to Red If reason to cancel ticket is clicked
      // Mengambil semua elemen checkbox
    const checkboxes = document.querySelectorAll(".form-check-input");
      // Mengambil tombol submit
    const submitButton = document.getElementById("submitButton");

      // Menambahkan event listener untuk setiap kotak centang
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
          // Memeriksa apakah setidaknya satu kotak centang telah dipilih
          const isAnyChecked = Array.from(checkboxes).some((box) => box.checked);

          // Mengaktifkan atau menonaktifkan tombol submit berdasarkan apakah kotak centang dipilih
          submitButton.disabled = !isAnyChecked;
          submitButton.style.backgroundColor = isAnyChecked ? "red" : "gray";
        });
    });

    document.getElementById("another-reason-button").addEventListener("change", function () {
      // Ambil referensi ke textarea
      const textarea = document.getElementById("another-reason-text");

      // Jika tombol radio tidak dicentang, sembunyikan textarea
      if (!this.checked) {
        textarea.style.display = "none";
      } else {
        textarea.style.display = "block"; // Tampilkan textarea jika tombol radio dicentang
      }
    });

      // Tambahkan event listener ke checkbox
    let cancelTicket = document.querySelector(".batal-btn"); // Ganti dengan selector yang sesuai untuk tombol "Refund"
    cancelTicket.addEventListener("click", function () {
      if(confirm("Apakah Anda Yakin Ingin Membatalkan Pemberlian Tiket?")) {
        let cancelForm = document.querySelector(".cansel-reason-form");
        cancelForm.action = '../config/cancel-validation.php';
        cancelForm.submit();
      }
    });
    </script>
  </body>
</html>
