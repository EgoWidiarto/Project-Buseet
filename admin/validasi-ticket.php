<?php
session_start();
require_once '../includes/connection.php';

$ticketID = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $ticketID = strtoupper(mysqli_real_escape_string($conn, $_POST["ticket-code"]));
}
$ticketSearchQuery = mysqli_query($conn, "SELECT 
      ip.nama_pemesan AS 'orderer_name', 
      ip.id_pemesanan AS 'order_id', 
      ip.nomor_hp AS 'contact', 
      p.tanggal_pemesanan AS 'order_date', 
      b.nama_bus AS 'bus_name', 
      b.tipe_bus AS 'bus_type',
      t.tanggal_keberangkatan AS 'deparrt_date',
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
      t.Id_tiket = '$ticketID'
      AND EXISTS (
          SELECT 1
          FROM pembayaran pb
          WHERE pb.Id_pemesanan = p.Id_pemesanan
          AND pb.status_pembayaran = 'LUNAS'
      ) AND t.tanggal_keberangkatan >= CURRENT_DATE();
");
$userTicket = mysqli_fetch_assoc($ticketSearchQuery);
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
    <link rel="stylesheet" href="../assets/style/ticket-selector.css?v=<?= time() ?>">

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
      main {
            margin-top: 7rem;
        }

        .booking-detail-container input {
          color: #203f66;
        }

        .ticket-booked,
        .btn-container {
          width: 80%;
        }

        .ticket-head {
          border-radius: 6px 6px 0 0;
          box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .border-pemisah {
          width: 2px;
          height: 2.5rem;
          border: 1px solid #9b9b9b;
          margin-right: 1rem;
        }

        .code-ticket-head > *:not(:first-child) {
          color: #203f66;
        }

        table {
          width: 100%;
        }

        table th,
        table td {
          border: 5px solid #f8f9fa;
          padding: 8px;
          font-weight: normal;
          font-size: 14px;
        }

        .table-penumpang th {
          width: 33.33%;
        }

        .table-perjalanan th {
          width: 25%;
        }

        table thead th {
          background-color: #d9d9d9;
        }

        table tbody td {
          background-color: #ececec;
          height: 4rem;
        }

        .btn-container {
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 10rem;
        }

        .save-btn {
          background-color: #203f66;
          width: 12rem;
          color: #fff;
        }

        .save-btn:hover {
            background-color: transparent;
            border: 1px solid #203f66;
        }
    </style>
  </head>

  <body id="pesan-tiket">
    <!-- Navigation Bar Tag Start -->
    <?php include '../includes/admin-header.php' ?>
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
      </form>
      <!-- Searching ticket End -->

      <?php if(empty($userTicket)): ?>
        <div class="container text-center pt-3 ms-auto me-auto w-75" style="padding-bottom: 10rem; margin-top: 5rem">
          <p class="font-16 text-white" style="margin-top: 7rem;">Tiket Tidak Valid</p>
        </div>
      <?php else: ?>
      <main class="text-center pt-3 ms-auto me-auto w-75">
        <!-- Form User Identity Start -->
        <div class="ticket-booked mt-4 mb-5 bg-light m-auto rounded">
          <div class="ticket-head text-start text-white p-1 d-flex justify-content-start align-items-center">
            <img src="../assets/icon/logo-buseet.png" alt="Logo BUSEET" width="70px" />
            <div class="border-pemisah"></div>
            <h6>Tiket Bus Elektronik</h6>
          </div>
          <div class="ticket-body p-4 text-black">
            <div class="row text-start">
              <div class="col-8">
                <div class="code-ticket-head border-bottom mb-2">
                  <p class="mb-0 font-14">Kode Tiket</p>
                  <p class="mb-0 mt-0 fw-bold font-18"><?= $userTicket["ticket_id"] ?></p>
                  <p class="mt-0 font-10">diterbitkan oleh BUSEET</p>
                </div>
                <div class="head-info d-flex">
                  <div class="label-container col-7 d-flex flex-column gap-3">
                    <label for="order-id-head" class="font-14">ID Pemesanan:</label>
                    <label for="name-head" class="font-14">Nama:</label>
                    <label for="contact-head" class="font-14">Kontak:</label>
                    <label for="order-date-head" class="font-14">Tanggal Pemesanan:</label>
                  </div>
                  <div class="input-container col-5">
                    <input type="text" id="order-id-head" readonly class="form-control-plaintext no-outline mt-0 font-14 fw-semibold" value="<?= $userTicket["order_id"] ?>" />
                    <input type="text" id="name-head" readonly class="form-control-plaintext no-outline mt-0 font-14 fw-semibold" value="<?= $userTicket["orderer_name"] ?>" />
                    <input type="text" id="contac-head" readonly class="form-control-plaintext no-outline mt-0 font-14 fw-semibold" value="<?= $userTicket["contact"] ?>" />
                    <input type="text" id="order-date" readonly class="form-control-plaintext no-outline mt-0 font-14 fw-semibold" value="<?= $userTicket["order_date"] ?>" />
                  </div>
                </div>
              </div>
              <div class="col-4">
                <p class="font-14 fw-semibold mb-1">QR Code</p>
                <img src="../assets/qr-code/ticket-qr.svg" alt="Ticket QR Code" width="210px" />
              </div>
            </div>
            <div class="data-perjalanan mt-5">
              <h6 class="text-start">Data Perjalanan</h6>
              <div class="container border-top pt-3">
                <table cellspacing="10px" class="table-perjalanan">
                  <!-- Table Head Start -->
                  <thead>
                    <tr>
                      <th>Bus</th>
                      <th>Kelas</th>
                      <th>Keberangkatan</th>
                      <th>Tiba</th>
                    </tr>
                  </thead>
                  <!-- Table Head End -->

                  <!-- Table Body Start -->
                  <tbody>
                    <tr class="text-start">
                      <td class="text-center"><?= $userTicket["bus_name"] ?></td>
                      <td class="text-center"><?= $userTicket["bus_type"] ?></td>
                      <td>
                        <p class="mb-0"><?= $userTicket["deparrt_date"] ?>  <?= $userTicket["depart_time"] ?></p>
                        <p class="mt-0"><?= $userTicket["depart_location"] ?></p>
                      </td>
                      <td>
                        <p class="mb-0"><?= $userTicket["deparrt_date"] ?>  <?= $userTicket["arr_time"] ?></p>
                        <p class="mt-0"><?= $userTicket["arr_location"] ?></p>
                      </td>
                    </tr>
                  </tbody>
                  <!-- Table Body End -->
                </table>
              </div>
            </div>
            <div class="data-penumpang mt-5">
              <h6 class="text-start">Data Perjalanan</h6>
              <div class="container border-top pt-3">
                <table cellspacing="10px" class="table-penumpang">
                  <!-- Table Head Start -->
                  <thead>
                    <tr>
                      <th>Nama Penumpang</th>
                      <th>Nomor Kursi</th>
                      <th>Nomor Tiket</th>
                    </tr>
                  </thead>
                  <!-- Table Head End -->

                  <!-- Table Body Start -->
                  <tbody>
                    <tr class="text-center">
                      <td><?= $userTicket["orderer_name"] ?></td>
                      <td><?= $userTicket["seat_number"] ?></td>
                      <td><?= $userTicket["ticket_id"] ?></td>
                    </tr>
                  </tbody>
                  <!-- Table Body End -->
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Form User Identity Tiket -->
      </main>
      <?php endif; ?>     
  
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
