<?php
session_start();
require_once '../includes/connection.php';

$ticketID = '';
$userID = $_SESSION["user_id"];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION["ticket-id"] = strtoupper(mysqli_real_escape_string($conn, $_POST["ticket-code"]));
  $ticketID = $_SESSION["ticket-id"];
}

$ticketSearchQuery = mysqli_query($conn, "SELECT
        t.Id_tiket AS 'ticket-id',
        b.nama_bus AS 'bus-name',
        dt.nama_terminal AS 'depart-terminal',
        ta.nama_terminal AS 'arr-terminal',
        rp.waktu_perjalanan AS 'estimated-time',
        DATE_FORMAT(j.jam_keberangkatan, '%H:%i') AS 'departure-time',
        DATE_FORMAT(j.jam_kedatangan, '%H:%i') AS 'arrival-time',
        pb.total_bayar AS 'total-pay',
        pb.status_pembayaran AS 'pay-status'
    FROM tiket t
    JOIN pemesanan pm ON t.Id_tiket = pm.Id_tiket
    JOIN pembayaran pb ON pm.Id_pemesanan = pb.Id_pemesanan
    JOIN bus b ON t.Id_bus = b.Id_bus
    JOIN jadwal j ON b.Id_bus = j.Id_bus
    JOIN rute_perjalanan rp ON t.Id_rute = rp.Id_rute
    JOIN terminal dt ON rp.terminal_awal = dt.kode_terminal
    JOIN terminal ta ON rp.terminal_akhir = ta.kode_terminal
    WHERE pm.Id_pengguna = '$userID' AND t.Id_tiket = '$ticketID' AND pb.status_pembayaran = 'LUNAS';
");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title> Ubah Jadwal Tiket </title>
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
    <link rel="stylesheet" href="../assets/style/component.css?v=<?= time() ?>">

    <style>
      #ubah-jadwal {
        padding-top: 8rem !important;
      }
      .cari-btn {
        width: 11.25rem;
        height: 3rem;
        border-radius: 15px;
        line-height: 1.6rem;
      }

      .ubah-jadwal-btn {
        background-color: #203f66;
        color: white;
      }

      .cancel-jadwal-btn {
        background-color: #e11232;
        color: #fff;
      }
      
      .cancel-jadwal-btn:hover {
        background-color: #cc122e;
        color: #fff;
      }

      .ubah-jadwal-btn:hover {
        background-color: #295fa0;
        color: #fff;
      }

      footer {
        margin-top: 24rem !important;
      }
    </style>
  </head>

  <body id="pesan-tiket">
    <!-- Navigation Bar Tag Start -->
    <?php include '../includes/header.php' ?>
    <!-- Navigation Bar Tag End -->

    <!-- Searching ticket Start -->
    <form method="post" action="" class="ticket-id-form">
      <section class="container w-full" id="ubah-jadwal">
        <h4 class="ubah-jadwal text-center"> Perubahan Jadwal Tiket</h4>
        <p class="ubah-jadwal text-center">Verifikasi rincian Anda dan Ubah Jadwal Keberangkatan!</p>
          <!-- masukkan kode tiket -->
          <div class="col-12 kode-pesan">
            <h6 class="font-16">KODE TIKET</p>
            <div class="input-group mt-1">
            <span class="input-group-text curved" id="inputGroup-sizing-default"><img width="30" height="30" src="https://img.icons8.com/ios/100/ticket--v1.png" alt="ticket--v1"/></span>
            <input type="text" class="form-control curved font-16 fw-semibold" name="ticket-code" aria-label="STicket Search Input" aria-describedby="inputGroup-sizing-default" placeholder="Masukkan Kode Tiket Anda" >
          </div>
          <div class="text-end">
            <button type="submit" class="cari-btn btn btn-outline-primary btn-light btn-lg mt-3">Cari</button>
          </div>
      </section>
      <!-- Searching ticket End -->

      <main class="justify-content-start pt-3 ms-auto me-auto">
        <?php
        if (mysqli_num_rows($ticketSearchQuery) > 0):
          $ticket = mysqli_fetch_assoc($ticketSearchQuery);
          $_SESSION["ticket-code"] = $ticket["ticket-id"];
        ?>
        <h6 class="text-center mt-5 mb-3">Berikut adalah transaksi sesuai dengan data yang Anda masukkan</h6>
        <div class="container-tiket mt-6">
          <!-- Card Tiket -->
          <div class="card mb-5 bg-light m-auto text-black p-4" style="width: 70rem; border-radius: 15px;">
            <!-- Ticket Row Upper Start -->
            <div class="row px-5">
              <div class="col-10 kode-pesan font-15">Kode Tiket <span class="kode" style="font-weight: 600;"><?= $ticket["ticket-id"] ?></span></div>
              <div class="col-2 status" style="color: green;">
                <h5 style="font-weight: 700; margin-left: 7px;"><?= $ticket["pay-status"] ?></h5>
              </div>

              <div class="col-2 py-2">
                <img width="60" height="60" src="https://img.icons8.com/ios-filled/100/bus.png" alt="bus"/>
              </div>
              <div class="col-8 py-2" style="margin-left: -70px;">
                <h5 style="font-weight: 700;"><?= $ticket["bus-name"] ?></h5>
                <p style="font-size: 12px;"><?= $ticket["depart-terminal"] ?> > <?= $ticket["arr-terminal"] ?></p>
              </div>

              <div class="col-2 text-end mt-5">
                <p class="harga font-12">Total Harga</p>
                <p style="font-weight: 700; font-size: 20px; margin-top: -10px;">Rp <?= $ticket["total-pay"] ?></p>
              </div>
            </div>
            <!-- Ticket Row Upper Start -->

            <!-- Ticket Row Downside Start -->
            <div class="row d-flex align-items-center shadow-bottom" style="margin-left: 135px; margin-top: -3rem;">
              <div class="col-1">
                <p class="mb-0 fw-bold" style="font-size: 1rem"><?= $ticket["departure-time"] ?></p>
                <p class="mt-0" style="font-size: 0.6rem"><?= $ticket["depart-terminal"] ?></p>
              </div>
              <div class="col-1 ms-2 me-2">
                <p class="" style="font-size: 0.7rem"><?= $ticket["estimated-time"] ?></p>
              </div>
              <div class="col-1">
                <p class="mb-0 fw-bold" style="font-size: 1rem"><?= $ticket["arrival-time"] ?></p>
                <p class="mt-0" style="font-size: 0.6rem"><?= $ticket["arr-terminal"] ?></p>
              </div>
            </div>
            <div class="d-flex gap-2 col-12 mx-auto justify-content-end">
              <button type="submit" class="btn px-5 cancel-jadwal-btn">Batalkan Tiket</button>
              <button type="submit" class="btn px-5 ubah-jadwal-btn">Ubah Jadwal</button>
            </div>
          </div>
        </div>
        <?php else : ?>
          <h6 class="text-center mt-5 mb-3">Dimohon Untuk Memasukkan Kode Tiket Yang Sesuai</h6>
        <?php endif; ?>
      </main>
    </form>
        
  
    <!-- Footer Ticket Search -->
    <?php include '../includes/footer.php' ?>
    <!-- Footer Ticket Search -->

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time() ?>"></script>
    <script>
        navbarResponsive();

        const myForm = document.querySelector(".ticket-id-form");
        // Ambil referensi ke tombol "Batalkan Tiket" dan "Submit Tiket"
        const cancelBtn = document.querySelector(".cancel-jadwal-btn");
        const submitBtn = document.querySelector(".ubah-jadwal-btn");

        // Atur action formulir berdasarkan tombol yang ditekan
        cancelBtn.addEventListener("click", function () {
            myForm.action = "ticket-cancel.php";
            myForm.submit();
          });
          
        submitBtn.addEventListener("click", function () {
            myForm.action = "ticket-change.php";
            myForm.submit();
        });
    </script>
  </body>
</html>
