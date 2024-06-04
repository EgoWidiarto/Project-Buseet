<?php
session_start();

require_once '../includes/connection.php';

$schedule = mysqli_query($conn, "SELECT 
      b.nama_bus AS 'bus_name', 
      CONCAT(ta.nama_terminal, ' - ', tb.nama_terminal) AS 'route',
      DATE_FORMAT(j.jam_keberangkatan, '%H:%i') AS 'departure',
      rp.waktu_perjalanan AS 'estimated_time',
      rp.harga AS 'price',
      rp.Id_rute AS 'route_id'
  FROM 
      bus b
  INNER JOIN 
      jadwal j ON b.Id_bus = j.Id_bus
  INNER JOIN 
      rute_perjalanan rp ON j.Id_jadwal = rp.Id_jadwal
  INNER JOIN 
      terminal ta ON rp.terminal_awal = ta.kode_terminal
  INNER JOIN 
      terminal tb ON rp.terminal_akhir = tb.kode_terminal
  LIMIT 10;
");

if (isset($_POST["search"])) {
    $search = mysqli_real_escape_string($conn, $_POST["schedule-search"]);
    $schedule = mysqli_query($conn, "SELECT b.nama_bus AS 'bus_name', 
            CONCAT(ta.nama_terminal, ' - ', tb.nama_terminal) AS 'route',
            DATE_FORMAT(j.jam_keberangkatan, '%H:%i') AS 'departure',
            rp.waktu_perjalanan AS 'estimated_time',
            rp.Id_rute AS 'route_id'
        FROM 
            bus b
        INNER JOIN 
            jadwal j ON b.Id_bus = j.Id_bus
        INNER JOIN 
            rute_perjalanan rp ON j.Id_jadwal = rp.Id_jadwal
        INNER JOIN 
            terminal ta ON rp.terminal_awal = ta.kode_terminal
        INNER JOIN 
            terminal tb ON rp.terminal_akhir = tb.kode_terminal
        WHERE b.nama_bus LIKE '%$search%' OR ta.nama_terminal LIKE '%$search%' OR tb.nama_terminal LIKE '%$search%'
        ");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title> BUSEET - ADMIN </title>
    <link rel="icon" href="../assets/icon/logo-buseet.png">
    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Linnk Font -->
    <link rel="stylesheet" href="../assets/style/font.css">
    <!-- css code file -->
    <link rel="stylesheet" href="../assets/style/global.css?v=<?= time(); ?>" />
    <link rel="stylesheet" href="../assets/style/component.css?v=<?= time(); ?>" />

    <style>
        .search-bus-section .btn {
          width: 315px;
          height: 58px;
          border-radius: 30px;
          font-weight: 500;
          margin-top: -1.7rem;
        }

        .bus-img {
            height: 40vh;
        }

        table {
          border-collapse: collapse;
          width: 85%;
          margin-top: -3rem;
        }

        tr,
        td,
        th {
          border: 3px solid #0c206a;
          padding: 1rem;
        }

        thead {
          background-color: #3a4d93;
        }
    </style>
  </head>

  <body id="pesan-tiket">
    <!-- Navigation Bar Tag Start -->
    <?php include("../includes/admin-header.php") ?>
    <!-- Navigation Bar Tag End -->

    <!-- Image Header -->
    <img src="../assets/images/bus-banner.png" alt="Background Bus" class="bus-img" />

    <!-- Searching Bus Section Start -->
    <section class="container w-full text-center search-bus-section">
      <form action="" method="post">
        <div class="d-flex">
          <!-- Input Asal Bus -->
          <div class="input-group mb-3">
            <span class="input-group-text curved" id="basic-addon1"><i class="bi bi-map"></i></span>
            <input type="text" class="form-control curved" name="schedule-search" placeholder="Cari Jadwal" aria-label="Cari Rute Perjalanan" aria-describedby="input-rute-perjalanan" required />
          </div>
        </div>
        <button class="btn btn-outline-primary btn-light btn-lg" type="submit" name="search" aria-label="Cari Bus">Cari Jadwal</button>
      </form>
    </section>
    <!-- Searching Bus Section End -->

    <!-- Table Bus Route Section Start -->
    <section class="list-jadwal text-center">
      <div class="d-flex justify-content-center mt-4">
        <table class="bg-white text-black">
        <!-- Table Head Start -->
        <thead class="text-white">
            <tr>
                <th>No</th>
                <th class="font-14">Nama Bus</th>
                <th>Rute</th>
                <th>Keberangkatan</th>
                <th>Estimasi Waktu</th>
                <th></th>
            </tr>
        </thead>
        <!-- Table Head End -->

        <!-- Table Body Start -->
        <tbody>
            <?php $num = 1; ?>
            <?php while( $row = mysqli_fetch_assoc($schedule) ): ?>
            <tr>
              <td><?= $num; ?></td>
              <td class="font-13"><?= $row["bus_name"]; ?></td>
              <td class="font-13"><?= $row["route"]; ?></td>
              <td><?= $row["departure"]; ?></td>
              <td><?= $row["estimated_time"]; ?></td>
              <td>
                <a href="schedule-edit.php?id_rute=<?= $row['route_id'] ?>" class="text-decoration-none text-black me-3"><i class="bi bi-pencil-square"></i>Edit</a>
                <a href="#" class="text-decoration-none text-danger delete-btn" data-route-id="<?= $row['route_id'] ?>"><i class="bi bi-trash3-fill"></i>Hapus</a>
              </td>
          </tr>
            <?php $num++; ?>
            <?php  endwhile; ?>
        </tbody>
        <!-- Table Body End -->
        </table>
      </div>
    </section>
    <!-- Table Bus Route Section End -->

    <!-- Footer Bus Search -->
    <?php include('../includes/footer.php') ?>

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time(); ?>"></script>
    <script>
      navbarResponsive();
      // Ambil semua elemen dengan class "delete-btn"
      const deleteButtons = document.querySelectorAll('.delete-btn');

      // Tambahkan event listener untuk setiap tombol hapus
      deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const routeId = this.getAttribute('data-route-id');
            const confirmDelete = confirm('Apakah Anda yakin ingin menghapus data ini?');
            if (confirmDelete) {
                // Redirect ke halaman delete jika pengguna yakin
                window.location.href = `../config/admin-schedule-delete.php?id_rute=${routeId}`;
            }
        });
      });
    </script>
  </body>
</html>
<?php
if (isset($_SESSION["remove-message"])) {
  $msg = $_SESSION["remove-message"];
  echo "<script>alert('$msg')</script>";
  unset($_SESSION["remove-message"]);
}
if (isset($_SESSION["update-message"])) {
  $msg = $_SESSION["update-message"];
  echo "<script>alert('$msg')</script>";
  unset($_SESSION["update-message"]);
}
?>